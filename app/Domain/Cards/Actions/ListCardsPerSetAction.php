<?php

    namespace App\Domain\Cards\Actions;

    use App\Domain\Cards\Requests\ListCardsPerSetRequest;
    use App\Domain\Cards\Resources\CardResourceCollection;
    use App\Helpers\PokeApiHelper;

    class ListCardsPerSetAction
    {
        /** @var PokeApiHelper */
        protected $helper;

        /**
         * @param PokeApiHelper $helper
         */
        public function __construct(PokeApiHelper $helper)
        {
            $this->helper = $helper;
        }

        /**
         * @param ListCardsPerSetRequest $request
         * @return CardResourceCollection
         */
        public function handle(ListCardsPerSetRequest $request): CardResourceCollection
        {
            $cards = $this->helper->card(['set.id'=>$request->getSetId()]);

            return new CardResourceCollection($cards);
        }
    }
