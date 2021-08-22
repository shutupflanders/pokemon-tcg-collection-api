<?php

namespace App\Console\Commands;

use App\Helpers\PokeApiHelper;
use App\Models\Cards;
use App\Models\Sets;
use Illuminate\Console\Command;
use Pokemon\Models\Card;
use Pokemon\Models\Set;

class SyncCardsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cards:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Synchronises Cards from sets with the remote API';

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
        $sets = Sets::all();

        foreach($sets as $set)
        {
            $this->info('Set: '.$set->name.' - getting cards from remote API...');
            $cards = $this->apiHelper->card(['set.id'=>$set->set_id]);

            $formattedCards = $cards->map(function(Card $card, $key) use($set){
                return [
                    'set_id'=>$set->id,
                    'card_id'=>$card->getId(),
                    'name'=>$card->getName(),
                    'number'=>$card->getNumber(),
                    'rarity'=>$card->getRarity() ?? "Unknown"
                ];
            });

            $this->info('Syncing '.$formattedCards->count().' cards with local database...');
            Cards::upsert($formattedCards->toArray(), ['set_id', 'card_id'], ['name', 'number', 'rarity']);
        }

        $this->info('Done.');


    }
}
