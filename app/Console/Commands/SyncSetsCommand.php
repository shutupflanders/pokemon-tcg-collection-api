<?php

namespace App\Console\Commands;

use App\Helpers\PokeApiHelper;
use App\Models\Sets;
use Illuminate\Console\Command;
use Pokemon\Models\Set;

class SyncSetsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sets:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronises Card sets with the remote API';

    /** @var PokeApiHelper */
    protected PokeApiHelper $apiHelper;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(PokeApiHelper $apiHelper)
    {
        parent::__construct();
        $this->apiHelper = $apiHelper;
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Getting sets from remote API...');
        $sets = $this->apiHelper->set();

        $formattedSets = $sets->map(function(Set $set, $key){
            return [
                'id'=>($key + 1),
                'set_id'=>$set->getId(),
                'name'=>$set->getName(),
                'series'=>$set->getSeries(),
                'total'=>$set->getPrintedTotal()
            ];
        });

        $this->info('Syncing '.$formattedSets->count().' sets with local database...');
        Sets::upsert($formattedSets->toArray(), ['id', 'set_id']);

        $this->info('Done.');


    }
}
