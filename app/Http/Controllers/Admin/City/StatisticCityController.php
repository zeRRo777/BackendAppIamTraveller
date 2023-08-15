<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use function array_push;
use function compact;
use function dd;
use function json_encode;
use function response;
use function usort;
use function view;

class StatisticCityController extends Controller
{
    public function __invoke(City $city): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data = [];

        $attractions = $city->attractions;


        foreach ($attractions as $attraction){
            $count = $attraction->histories->count();
            $temp = [$attraction->name, $count];
            $data[] = $temp;
        }

        usort($data, [$this, 'sortByCount']);

        array_unshift($data, ['Достопримечательность', 'Колво посещений']);

        return view('admin.cities.statisticCity')->with('data', $data)->with('city', $city);
    }

    public function sortByCount($a, $b) {
        return $a[1] - $b[1];
    }
}
