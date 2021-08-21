<?php

    namespace App\Domain\Sets\Controllers;

    use App\Domain\Sets\Actions\GetSetAction;
    use App\Domain\Sets\Actions\ListSetsAction;
    use App\Domain\Sets\Requests\GetSetRequest;
    use App\Domain\Sets\Requests\ListSetsRequest;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\JsonResponse;

    class SetsController extends Controller
    {
        /**
         * @param ListSetsAction $action
         * @param ListSetsRequest $request
         * @return JsonResponse
         */
        public function index(ListSetsAction $action, ListSetsRequest $request): JsonResponse
        {
            $response = $action->handle($request);

            return response()->json($response);
        }

        public function view(GetSetAction $action, GetSetRequest $request): JsonResponse
        {
            $response = $action->handle($request);

            return response()->json($response);
        }
    }
