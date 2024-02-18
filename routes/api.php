<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CoursesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post("register", [AuthController::class, "register"]);
Route::post("login", [AuthController::class, "login"]);
//Route::get("students", [StudentController::class, "index"]);
//Route::post("students", [StudentController::class, "store"]);

Route::middleware('auth')->get('/user', function (Request $request) {

    return $request->user();
});

Route::group([
    "middleware" => ["auth:api"]
], function(){

    Route::get("profile", [AuthController::class, "profile"]);
    Route::get("refresh", [AuthController::class, "refreshToken"]);
    Route::get("logout", [AuthController::class, "logout"]);

    Route::get("students", [StudentController::class, "index"]);
    Route::get("students/{id}", [StudentController::class, "show"]);
    Route::post("students", [StudentController::class, "create"]);

    Route::get("teachers", [TeacherController::class, "index"]);
    Route::get("teachers/{id}", [TeacherController::class, "show"]);
    Route::post("teachers", [TeacherController::class, "store"]);

    Route::get("classes", [ClassesController::class, "index"]);
    Route::get("classes/{id}", [ClassesController::class, "show"]);

    Route::get("courses", [CoursesController::class, "index"]);
    Route::get("courses/{id}", [CoursesController::class, "show"]);

});

Route::middleware(["auth:api", "admin"])->group(function(){
    Route::get('users', [UsersController::class, "index"]);
});




/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
