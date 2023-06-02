<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attraction\AddImageRequest;
use App\Models\Attraction;
use App\Models\Attraction_image;
use App\Models\City;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function abort;
use function view;

class AddImageStoreController extends Controller
{
    public function __invoke(AddImageRequest $request): View|Application|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $data  = $request->validated();

        $data['image'] = Storage::disk('public')->put('/images/attractions', $data['image']);
        $attraction = Attraction::find($data['attraction_id']);

        try {
            DB::beginTransaction();
            $attr_image = Attraction_image::firstOrCreate($data);
            DB::commit();
        }catch (\Exception $e) {
            DB::rollBack();
            abort('500');
        }

        return view('admin.attractions.show', compact('attraction'));
    }
}
