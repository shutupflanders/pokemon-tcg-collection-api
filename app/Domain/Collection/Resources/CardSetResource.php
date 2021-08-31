<?php

    namespace App\Domain\Collection\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    class CardSetResource extends JsonResource
    {
        public function toArray($request)
        {
            return [
                'id'=>$this->id,
                'name'=>$this->name,
                'series'=>$this->series,
                'total'=>$this->total
            ];
        }
    }
