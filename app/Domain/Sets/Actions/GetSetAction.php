<?php

    namespace App\Domain\Sets\Actions;

    use App\Domain\Sets\Requests\GetSetRequest;
    use App\Domain\Sets\Resources\CardSetsResourceCollection;
    use App\Helpers\PokeApiHelper;

    class GetSetAction
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
         * @param GetSetRequest $request
         * @return CardSetsResourceCollection
         */
        public function handle(GetSetRequest $request): CardSetsResourceCollection
        {
            $sets = $this->helper->set(['name'=>$request->getSetName()]);

            return new CardSetsResourceCollection($sets);
        }
    }
