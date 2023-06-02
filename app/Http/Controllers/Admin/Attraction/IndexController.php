<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function view;

class IndexController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {

        $attractions = Attraction::all();

        return view('admin.attractions.index', compact('attractions'));
    }
}
