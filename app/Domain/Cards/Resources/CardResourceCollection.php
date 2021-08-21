<?php

    namespace App\Domain\Cards\Resources;

    use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
    use Illuminate\Http\Resources\Json\ResourceCollection;

    class CardResourceCollection extends ResourceCollection
    {
        /**
         * @param \Illuminate\Http\Request $request
         * @return AnonymousResourceCollection
         */
        public function toArray($request): AnonymousResourceCollection
        {
            return CardResource::collection($this->collection);
        }
    }
