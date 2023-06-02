<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function compact;
use function view;

class CreateCityAttractionController extends Controller
{
    public function __invoke(City $city): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        return view('admin.cities.cityAttractionsCreate', compact('city'));
    }
}
