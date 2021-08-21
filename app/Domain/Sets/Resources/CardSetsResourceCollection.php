<?php

    namespace App\Domain\Sets\Resources;

    use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
    use Illuminate\Http\Resources\Json\ResourceCollection;

    class CardSetsResourceCollection extends ResourceCollection
    {
        /**
         * @param \Illuminate\Http\Request $request
         * @return AnonymousResourceCollection
         */
        public function toArray($request): AnonymousResourceCollection
        {
            return CardSetsResource::collection($this->collection);
        }
    }
