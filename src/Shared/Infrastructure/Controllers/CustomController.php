<?php

declare(strict_types=1);

namespace Src\Shared\Infrastructure\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Src\Shared\Infrastructure\Helper\ResponseHelper;

abstract class CustomController extends Controller
{
    use ResponseHelper;

    /**
     * @var mixed
     */
    private mixed $api;

    public function __construct()
    {
        $this->api = env("API_ROUTE");
    }

    /**
     * @param int $status
     * @param bool $error
     * @param array|string|int|bool $response
     * @param array|null $dependencies
     * @return JsonResponse
     */
    public function defaultJsonResponse(
        int $status,
        bool $error,
        array|string|int|bool $response,
        ?array $dependencies
    ): JsonResponse
    {
        return response()->json(
            $this->json(
                $status,
                $error,
                $response,
                $this->api,
                $dependencies
            ),
            $status
        );
    }
}
