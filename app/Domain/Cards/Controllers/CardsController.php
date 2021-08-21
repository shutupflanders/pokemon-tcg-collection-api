<?php

    namespace App\Domain\Cards\Controllers;

    use App\Domain\Cards\Actions\ListCardsPerSetAction;
    use App\Domain\Cards\Requests\ListCardsPerSetRequest;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\JsonResponse;

    class CardsController extends Controller
    {
        /**
         * @param ListCardsPerSetAction $action
         * @param ListCardsPerSetRequest $request
         * @return JsonResponse
         */
        public function index(ListCardsPerSetAction $action, ListCardsPerSetRequest $request): JsonResponse
        {
            $response = $action->handle($request);

            return response()->json($response);
        }
    }
