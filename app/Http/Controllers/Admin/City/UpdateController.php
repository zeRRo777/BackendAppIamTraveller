<?php

namespace App\Http\Controllers\Admin\City;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\City;
use App\Models\User;
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
    public function __invoke(\App\Http\Requests\Admin\City\UpdateRequest $request, City $city): Application|Redirector|RedirectResponse|\Illuminate\Contracts\Foundation\Application
    {
        $data = $request->validated();

        if (isset($data['image']))
        {
            Storage::disk('public')->delete($city->image);
            $data['image'] = Storage::disk('public')->put('/images/cities', $data['image']);
        }

        try {
            DB::beginTransaction();
            $city->update($data);
            DB::commit();
        }catch (Exception $e) {
            DB::rollBack();
            abort('500');
        }

        return redirect(route('admin.cities.show', compact('city')));
    }
}
