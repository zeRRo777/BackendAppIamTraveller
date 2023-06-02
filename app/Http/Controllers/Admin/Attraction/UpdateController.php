<?php

namespace App\Http\Controllers\Admin\Attraction;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Attraction\UpdateRequest;
use App\Models\Attraction;
use Exception;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use function abort;
use function compact;
use function redirect;
use function route;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Attraction $attraction): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();


        if (isset($data['main_image']))
        {
            Storage::disk('public')->delete($attraction->main_image);
            $data['main_image'] = Storage::disk('public')->put('/images/attractions', $data['main_image']);
        }


        try {
            DB::beginTransaction();
            $attraction->update($data);
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
            abort('500');
        }

        return redirect(route('admin.attractions.show', compact('attraction')));
    }
}
