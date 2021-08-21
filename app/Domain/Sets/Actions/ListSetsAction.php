<?php

    namespace App\Domain\Sets\Actions;

    use App\Domain\Sets\Requests\ListSetsRequest;
    use App\Domain\Sets\Resources\CardSetsResourceCollection;
    use App\Helpers\PokeApiHelper;

    class ListSetsAction
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
         * @param ListSetsRequest $request
         * @return CardSetsResourceCollection
         */
        public function handle(ListSetsRequest $request): CardSetsResourceCollection
        {
            $sets = $this->helper->set();

            return new CardSetsResourceCollection($sets);
        }
    }
