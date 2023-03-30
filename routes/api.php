<?php

use App\Http\Controllers\API\Auth\AuthController;
use App\Http\Controllers\API\Auth\OtpverifyController;
use App\Http\Controllers\API\ListapiController;
use App\Http\Controllers\API\NoticeController;
use App\Http\Controllers\API\OptionapiController;
use App\Http\Controllers\API\User\BuydaimondController;
use App\Http\Controllers\API\User\DepositController;
use App\Http\Controllers\API\User\ProfileController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);


Route::middleware('auth:sanctum')->group(function () {
    // Profile
    Route::prefix('user')->group(function () {
        // User
        Route::post('/deposit', [DepositController::class, 'store']);
        Route::get('/deposits', [DepositController::class, 'index']);
        // OTP
        Route::post('/send-otp', [OtpverifyController::class, 'sendOTP']);
        Route::post('/otp-verify/{otp}', [OtpverifyController::class, 'otpVerify']);
        Route::post('/change-number/{number}', [ProfileController::class, 'changeNumber']);
        Route::post('buy-daimond', [BuydaimondController::class, 'buyDaimond']);
        // Update
        Route::post('/avatar', [ProfileController::class, 'avatar']);
        Route::post('/change-name', [ProfileController::class, 'changeName']);
        Route::post('/change-password', [ProfileController::class, 'changePassword']);
    });

});

Route::get('/clubs', [ListapiController::class, 'clubList']);
Route::get('/matches', [ListapiController::class, 'matchList']);
Route::get('/games', [ListapiController::class, 'gameList']);

Route::get('/paymentmethod', [ListapiController::class, 'paymentMethodList']);
Route::get('/headernotice', [NoticeController::class, 'headerNotice']);
Route::get('/footernotice', [NoticeController::class, 'footerNotice']);

