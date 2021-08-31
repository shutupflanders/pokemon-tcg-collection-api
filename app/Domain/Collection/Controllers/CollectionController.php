<?php

    namespace App\Domain\Collection\Controllers;

    use App\Domain\Collection\Actions\SearchCardAction;
    use App\Domain\Collection\Requests\SearchCardRequest;

    class CollectionController
    {
        public function index(SearchCardAction $action, SearchCardRequest $request)
        {
            $response = $action->handle($request);

            return response()->json($response);
        }
    }
