<?php

namespace App\Console\Commands;

use App\Helpers\PokeApiHelper;
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
        $sets = $this->apiHelper->set();

        $sets->map(function(Set $set){
            return [
                'set_id'=>$set->getId(),
                'name'=>$set->getName(),
                'series'=>$set->getSeries(),
                'total'=>$set->getTotal()
            ];
        });


    }
}
