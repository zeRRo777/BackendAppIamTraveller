<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Models\Attraction;
use App\Models\City;
use App\Models\User;
use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use function abort;
use function redirect;
use function route;

class DestroyController extends Controller
{
    public function __invoke(Attraction $attraction): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {

        try {
            DB::beginTransaction();
            foreach ($attraction->images as $image) {
                $image->delete();
            }
            $attraction->delete();
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
            abort('500');
        }

        return redirect(route('admin.attractions.index'));
    }
}
