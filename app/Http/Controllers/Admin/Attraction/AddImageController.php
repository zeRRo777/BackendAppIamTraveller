<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function view;

class AddImageController extends Controller
{
    public function __invoke(Attraction $attraction): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        return view('admin.attractions.addImage', compact('attraction'));
    }
}
