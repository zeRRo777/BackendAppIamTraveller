<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attraction\StoreRequest;
use App\Models\Attraction;
use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function abort;
use function dd;
use function redirect;
use function route;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();

        $data['main_image'] = Storage::disk('public')->put('/images/attractions', $data['main_image']);


        try {
            DB::beginTransaction();
            $attraction = Attraction::firstOrCreate($data);
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
            abort('500');
        }

        return redirect(route('admin.attractions.index'));
    }
}
