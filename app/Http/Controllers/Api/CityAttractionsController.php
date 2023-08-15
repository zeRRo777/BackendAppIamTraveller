<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use function dd;
use function response;

class CityAttractionsController extends Controller
{
    public function __invoke($cityId): JsonResponse
    {
        $city = City::find($cityId);

        $attractions = $city->attractions;

        return response()->json($attractions);
    }
}
