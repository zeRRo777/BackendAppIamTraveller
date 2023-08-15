<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Prize\PrizeRequest;
use App\Models\Attraction;
use App\Models\City;
use App\Models\User;
use App\Models\User_attraction_history;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use function response;

class PrizeController extends Controller
{
    public function __invoke(PrizeRequest $request): ?JsonResponse
    {
        $data = $request->validated();
        $user = User::find($data['userId']);
        $attraction = Attraction::find($data['attrId']);

        $history = User_attraction_history::where('user_id', '=', $user->id)->where('attraction_id', '=', $attraction->id)->first();

        if (!$history)
        {
            $user->scores += $attraction->score;
            ++$user->count_attractions;
            try {
                DB::beginTransaction();
                $user->update();
                $user_attr_history = User_attraction_history::create(['user_id' => $user->id, 'attraction_id' => $attraction->id]);
                $dataResponse = ['status' => true];
                DB::commit();
                return response()->json($dataResponse);
            }catch (\Exception $e) {
                DB::rollBack();
                $dataResponse = ['status' => false];
                return response()->json($dataResponse);
            }

        }else {
            $dataResponse = ['status' => 'alreadyHave'];
            return response()->json($dataResponse);
        }
    }
}
