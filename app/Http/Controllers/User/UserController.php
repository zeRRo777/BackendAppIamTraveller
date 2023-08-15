<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserLoginRequest;
use App\Http\Requests\User\UserRegisterRequest;
use App\Http\Requests\User\UserUpdateInfoRequest;
use App\Models\City;
use App\Models\User;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use function response;


class UserController extends Controller
{
    public function register(UserRegisterRequest $request): ?JsonResponse
    {
        $data = $request->validated();
        $data['password'] = Hash::make($data['password']);
        $deviceName = $data['deviceName'];
        unset($data['deviceName']);
        try{
            $user = User::firstOrCreate($data);
            $token = $user->createToken($deviceName)->plainTextToken;
            $dataResponse = ['status' => true, 'token' => $token, 'user' => $user];
            return response()->json($dataResponse);
        }catch (Exception $e){
            DB::rollBack();
            $dataResponse = ['status' => false];
            return response()->json($dataResponse);
        }
    }

    public function login(UserLoginRequest $request): JsonResponse
    {
        $data = $request->validated();

        $user = User::where('email', $data['email'])->first();

        if (Hash::check($data['password'], $user->password))
        {
            $token = $user->createToken($data['deviceName'])->plainTextToken;
            $dataResponse = ['status' => 200, 'token' => $token, 'user' => $user];
            return response()->json($dataResponse);
        }

        $dataResponse = ['status' => 422, 'errors'=>['password' =>'неправильный пароль']];
        return response()->json($dataResponse);
    }

    public function getUser($userId): JsonResponse
    {
        $user = User::find($userId);

        return response()->json($user);
    }

    public function updateUser(UserUpdateInfoRequest $request, $userId): JsonResponse
    {
        $data = $request->validated();

        try{
            DB::beginTransaction();
            $user = User::find($userId);
            $user->update($data);
            $dataResponse = ['status' => true,  'user' => $user];
            DB::commit();
            return response()->json($dataResponse);
        }catch (\Exception $e){
            $dataResponse = ['status' => false];
            DB::rollBack();
            return response()->json($dataResponse);
        }
    }

}
