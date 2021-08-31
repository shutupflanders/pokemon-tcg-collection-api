<?php

    namespace App\Domain\Collection\Actions;

    use App\Domain\Collection\Requests\SearchCardRequest;
    use App\Domain\Collection\Resources\CardSearchResultResource;
    use App\Models\Cards;
    use App\Models\Sets;
    use Illuminate\Database\Eloquent\ModelNotFoundException;

    class SearchCardAction
    {
        public function handle(SearchCardRequest $request)
        {
            $number = $request->getNumber();
            $split = explode('/', $number);

            try{
                $sets = Sets::where('total', ltrim($split[1], "0"))->get();
            }
            catch (ModelNotFoundException $e){
                // @TODO friendly error
                throw $e;
            }

            $term = $request->getName();

            try{
                $card = Cards::with(['collectionReference', 'set'])
                    ->whereIn('set_id', $sets->pluck('id'))
                    ->where('number', ltrim($split[0], "0"))
                    ->whereRaw('match(name) against(? WITH QUERY EXPANSION)',["%$term%"])
                    ->firstOrFail();
            }
            catch (ModelNotFoundException $e){
                // @TODO friendly error
                throw $e;
            }

            return new CardSearchResultResource($card);

        }
    }
