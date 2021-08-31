<?php

namespace App\Console\Commands;

use App\Helpers\PokeApiHelper;
use App\Models\Cards;
use App\Models\CollectionItems;
use App\Models\Sets;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Pokemon\Models\Card;
use Pokemon\Models\Set;

class SyncCollectionCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'collection:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronises Collection information from a local csv file';


    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $sets = Sets::all();

        if(!file_exists(storage_path('app/data/collection.csv')))
        {
            throw new \InvalidArgumentException('app/data/collection.csv does not exist.');
        }

        $file_n = storage_path('app/data/collection.csv');
        $file = fopen($file_n, "r");

        $line = 1;
        $lines = collect();

        $errors = collect();

        while ( ($data = fgetcsv($file, 200, ",")) !==FALSE) {

            if($line == 1 && $data[0] !== "Region")
            {
                throw new \InvalidArgumentException('Cannot understand CSV file.');
            }
            if($line>1)
            {
                $series = null;
                switch ($data[1])
                {
                    case "Base Set":
                        $setName = "Base";
                        break;

                    case "Hidden Fates":
                        $setName = $data[1];
                        if(str_contains($data[2], 'SV'))
                        {
                            $setName = "Shiny Vault";
                            $series = "Sun & Moon";
                        }
                        break;

                    case "Shining Fates":
                        $setName = $data[1];
                        if(str_contains($data[2], 'SV'))
                        {
                            $setName = "Shiny Vault";
                            $series = "Sword & Shield";
                        }
                        break;

                    default;
                        $setName = $data[1];
                        break;
                }
                $set = $sets->filter(function (Sets $set) use($setName, $series){
                   return Str::slug($set->name) == Str::slug($setName)
                       && (!isset($series) || $set->series == $series);
                })->first();

                if(!isset($set))
                {
                    $this->error('Set not found - '.$setName);
                }
                else
                {
                    $cardNumber = explode('/', $data[2])[0];
                    try{
                        $card = Cards::where([
                            'set_id' => $set->id,
                            'card_id' => $set->set_id.'-'.ltrim($cardNumber, '0')
                        ])->firstOrFail();

                        $variation = $data[6] ?? 'Unknown';
                        $count = $data[9] ?? 1;

                        $lines->add([
                            'card_id'=>$card->id,
                            'count'=>$count,
                            'variation'=>$variation
                        ]);

                        $this->info('Card found: '.$set->name.' - '.$card->name.' - '.$variation.' x'.$count);
                    }
                    catch (ModelNotFoundException $e){

                        $errors->push('Card not found - Set #'.$set->id.' Card Search: '.$set->set_id.'-'.ltrim($cardNumber, '0'));
                    }
                }
            }

            $line++;
        }

        DB::table(CollectionItems::getTableName())->update(['count'=>0]);

        $updated = CollectionItems::upsert($lines->toArray(), ['card_id', 'variation'], ['count']);

        $this->info('Collection synchronised, '.$updated.' updated.');

        if($errors->count()>0){
            $this->error('Errors: ');
            $this->newLine();
            foreach($errors->toArray() as $error){
                $this->error($error);
            }
        }

        $this->info('Done.');


    }
}
