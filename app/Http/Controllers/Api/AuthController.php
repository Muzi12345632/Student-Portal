<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    //
    // User Register (POST, formdata)
    public function register(Request $request){
        
        // data validation
        $request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "role_id"=> "required",
            /*"contact_phone"=> "required",*/
            "age"=> "required",
            "sex"=> "required",
            "address"=>"required"
        ]);

        // User Model
        User::create([
            "name" => $request->name,
            "email" => $request->email,
            "password" => Hash::make($request->password),
            "role_id" => $request->role_id,
            /*"contact_phone"=> $request->contact_phone,*/
            "age"=> $request->age,
            "sex"=> $request->sex,
            "address"=> $request->address
        ]);

        // Response
        return response()->json([
            "status" => true,
            "message" => "User registered successfully"
        ], 200);
    }

    // User Login (POST, formdata)
    public function login(Request $request){
        
        // data validation
        $request->validate([
            "email" => "required|email",
            "password" => "required",
            /*"user_type" => "required"*/
        ]);

        // JWTAuth
        $token = JWTAuth::attempt([
            "email" => $request->email,
            "password" => $request->password,
            /*"user_type" => $request->user_type*/
        ]);

        if(!empty($token)){

            return response()->json([
                "status" => true,
                "message" => "User logged in succcessfully",
                "token" => $token
            ]);
        }

        return response()->json([
            "status" => false,
            "message" => "Invalid details"
        ]);
    }

    // User Profile (GET)
    public function profile(){

        $userdata = auth()->user();

        return response()->json([
            "status" => true,
            "message" => "Profile data",
            "data" => $userdata
        ]);
    } 

    // To generate refresh token value
    public function refreshToken(){
        
        $newToken = auth()->refresh();

        return response()->json([
            "status" => true,
            "message" => "New access token",
            "token" => $newToken
        ]);
    }

    // User Logout (GET)
    public function logout(){
        
        auth()->logout();

        return response()->json([
            "status" => true,
            "message" => "User logged out successfully"
        ]);
    }


}
