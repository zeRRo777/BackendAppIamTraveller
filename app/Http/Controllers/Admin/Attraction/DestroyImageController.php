<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Models\Attraction_image;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use function abort;
use function view;

class DestroyImageController extends Controller
{
    public function __invoke(Attraction_image $image): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $attraction = $image->attraction;

        try {
            DB::beginTransaction();
            $image->delete();
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
            abort('500');
        }

        return view('admin.attractions.show', compact('attraction'));
    }
}
