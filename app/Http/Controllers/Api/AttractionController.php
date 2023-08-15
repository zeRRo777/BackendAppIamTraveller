<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\City;
use Illuminate\Http\JsonResponse;
use function response;

class AttractionController extends Controller
{
    public function getAttraction($attractionId): JsonResponse
    {
        $attraction = Attraction::find($attractionId);

        return response()->json($attraction);
    }

    public function getAttractionImages($attractionId): JsonResponse
    {
        $attraction = Attraction::find($attractionId);
        $attractionImages = $attraction->images;

        return response()->json($attractionImages);
    }
}
