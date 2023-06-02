<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\City;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function compact;
use function view;

class IndexController extends Controller
{
     public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
     {
         $users = User::all();
         $attractions = Attraction::all();
         $cities = City::all();


         return view('admin.index', compact('users', 'attractions', 'cities'));
     }
}
