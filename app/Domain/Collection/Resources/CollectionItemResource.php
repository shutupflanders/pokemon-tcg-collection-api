<?php

    namespace App\Domain\Collection\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class CollectionItemResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id'=>$this->id,
                'variation'=>$this->variation,
                'count'=>$this->count
            ];
        }
    }
