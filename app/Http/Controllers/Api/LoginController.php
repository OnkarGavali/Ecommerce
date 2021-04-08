<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Validator;

class LoginController extends Controller
{
    function login(Request $request) {

        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
            'device_name' =>'required'
        ]);

        if ($validator->fails()) {

            $responseArr['error'] = $validator->errors()->first();
            return response()->json($responseArr, 400);
        }
        $user = User::where('email', $request->email)->first();

        if (! $user || ! Hash::check($request->password, $user->password)) {
          $resData = [
              'error' => 'Email or Password is Wrong',
              'code' => 400
          ];

          return response($resData,400);
        }

        $token = $user->createToken($request->device_name)->plainTextToken;
        $resData = [
            'user' => $user,
            'token' => $token,
            'code' => 200
        ];

        return response($resData);
    }

    function registration(Request $request) {

        $request->validate([
            "name" => "required",
            'email' => 'required|email', //|unique: users',
           // 'Phonenumber'=>'required',//|unique: users',
            'password' => 'required ',
        ]);
        // return $request;
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        $response = [
            'message' => "success",
            'code' => 200
        ];

        return response($response);
    }

    function profile(Request $request) {

        $user = $request->user();

            if ($user->tokenCan('role:list'))
            {

            $response = [
            'user' => $user,
            ];
            return response($response, 201);
            }
            return "nooo";
    }
   

}
