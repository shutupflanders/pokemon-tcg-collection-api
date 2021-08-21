<?php

    namespace App\Domain\Cards\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    /**
     * @property string $id
     * @property string $name
     * @property string $series
     * @property string $total
     */
    class CardResource extends JsonResource
    {
        /**
         * @param \Illuminate\Http\Request $request
         * @return array
         */
        public function toArray($request): array
        {
            return [
                'id'=>$this->getId(),
                'name'=>$this->getName(),
                'number'=>$this->getNumber(),
                'rarity'=>$this->getRarity()
            ];
        }
    }
