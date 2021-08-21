<?php

    namespace App\Helpers;

    use Illuminate\Support\Collection;
    use Pokemon\Pokemon;

    class PokeApiHelper
    {
        /**
         * @param string $apiKey
         */
        public function __construct(string $apiKey)
        {
            $this->apiKey = $apiKey;
            Pokemon::Options(['verify'=>true]);
            Pokemon::ApiKey($apiKey);
        }

        /**
         * @param array|string $params
         * @return Collection
         */
        public function card(array|string $params = []): Collection
        {
            if(is_string($params))
            {
                return collect(Pokemon::Card()->find($params));
            }
            elseif(!empty($params))
            {
                return collect(Pokemon::Card()->where($params)->all());
            }
            return collect(Pokemon::Card()->all());
        }

        /**
         * @param array|string $params
         * @return Collection
         */
        public function set(array|string $params = []): Collection
        {
            if(is_string($params))
            {
                return collect(Pokemon::Set()->find($params));
            }
            elseif(!empty($params))
            {
                return collect(Pokemon::Set()->where($params)->all());
            }
            return collect(Pokemon::Set()->all());
        }

        /**
         * @return Collection
         */
        public function type(): Collection
        {
            return collect(Pokemon::Type()->all());
        }

        /**
         * @return Collection
         */
        public function subtype(): Collection
        {
            return collect(Pokemon::Subtype()->all());
        }

        /**
         * @return Collection
         */
        public function supertype(): Collection
        {
            return collect(Pokemon::Supertype()->all());
        }

        /**
         * @return Collection
         */
        public function rarity(): Collection
        {
            return collect(Pokemon::Rarity()->all());
        }

    }
