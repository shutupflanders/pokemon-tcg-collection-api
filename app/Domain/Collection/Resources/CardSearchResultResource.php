<?php

    namespace App\Domain\Collection\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    /**
     * @property $id
     * @property $card_id
     * @property $set_id
     * @property $name
     * @property $number
     * @property $rarity
     */
    class CardSearchResultResource extends JsonResource
    {
        /**
         * @param $request
         * @return array
         */
        public function toArray($request): array
        {
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'number'=>$this->number,
                'rarity'=>$this->rarity,
                'set'=>new CardSetResource($this->whenLoaded('set')),
                'collection_details'=>CollectionItemResource::collection($this->whenLoaded('collectionReference')),
            ];
        }
    }
