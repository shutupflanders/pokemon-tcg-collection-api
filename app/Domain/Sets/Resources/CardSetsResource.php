<?php

    namespace App\Domain\Sets\Resources;

    use Illuminate\Http\Resources\Json\JsonResource;

    /**
     * @property string $id
     * @property string $name
     * @property string $series
     * @property string $total
     */
    class CardSetsResource extends JsonResource
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
                'series'=>$this->getSeries(),
                'total'=>$this->getTotal()
            ];
        }
    }
