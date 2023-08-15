<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use function response;

class CityController extends Controller
{
    public function getCities(): JsonResponse
    {
        $cities = City::all();

        return response()->json($cities);
    }

    public function getCity($cityId): JsonResponse
    {
        $city = City::find($cityId);

        return response()->json($city);
    }
}
