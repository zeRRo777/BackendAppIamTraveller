<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function array_push;
use function dd;
use function json_encode;
use function response;
use function usort;
use function view;

class StatisticController extends Controller
{
    public function __invoke(): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        /*$data = [];
        $attractions = Attraction::all();

        foreach ($attractions as $attraction) {
            $count = $attraction->histories->count();
            $temp = [$attraction->name, $count];
            $data[] = $temp;
        }

        usort($data, [$this, 'sortByCount']);

        array_unshift($data, ['Название', 'Колво посещений']);*/

        /*return view('admin.attractions.statistic')->with('data', $data);*/

        $data = [];

        $cities = City::all();

        foreach ($cities as $city) {
            $attractions = $city->attractions;
            $sum = 0;
            foreach ($attractions as $attraction) {
                $count = $attraction->histories->count();
                $sum += $count;
            }
            $temp = [$city->name, $sum];
            $data[] = $temp;
        }

        usort($data, [$this, 'sortByCount']);

        array_unshift($data, ['Город', 'Колво посещений']);

        return view('admin.cities.statistic')->with('data', $data);
    }

    public function sortByCount($a, $b) {
        return $a[1] - $b[1];
    }
}
