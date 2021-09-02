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
            if(str_contains($number, "SWSH") || str_contains($number, "SM") || str_contains($number, "XY"))
            {
                // Presume promo sets here
                try{
                    $sets = Sets::where('name', 'like', '%Black Star Promos');
                }
                catch (ModelNotFoundException $e){
                    // @TODO friendly error
                    throw $e;
                }
            }
            else
            {
                $split = explode('/', $number);

                try{
                    $sets = Sets::where('total', ltrim($split[1], "0"))->get();
                }
                catch (ModelNotFoundException $e){
                    // @TODO friendly error
                    throw $e;
                }
                $number = ltrim($split[0], "0");
            }

            $term = $request->getName();

            try{
                $card = Cards::with(['collectionReference', 'set'])
                    ->whereIn('set_id', $sets->pluck('id'))
                    ->where('number', $number)
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
