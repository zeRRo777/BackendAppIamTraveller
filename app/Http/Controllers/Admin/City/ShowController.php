<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function compact;
use function dd;
use function view;

class ShowController extends Controller
{
    public function __invoke(City $city): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $countAttractions = $city->attractions()->count();

        return view('admin.cities.show', compact('city', 'countAttractions'));
    }
}
