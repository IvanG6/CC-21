<?php

use App\Http\Controllers\Api\Client\Authentication\AuthenticationController;
use App\Http\Controllers\Api\Coach\Authentication\AuthenticationController as CoachAuth;
use App\Nova\PrivacyPolicy;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Admin\AdminPagesController;

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

Route::group(['prefix' => 'v1'], function () {
    Route::group(['prefix' => 'client'], function () {

        /**
         * @api                {post} /api/v1/client/login Login for client
         * @apiGroup           v1/client
         * @apiName            Login for client
         * @apiDescription     Login for client
         *
         * @apiVersion         1.0.0
         *
         * @apiParam           {String}  email  client email
         * @apiParam           {String}  [code] code from mail
         *
         */
        Route::post('login', [AuthenticationController::class, 'login']);
    });

    Route::group(['prefix' => 'coach'], function () {
        /**
         * @api                {post} /api/v1/coach/login Login for coach
         * @apiGroup           v1/coach
         * @apiName            Login for coach
         * @apiDescription     Login for coach
         *
         * @apiVersion         1.0.0
         *
         * @apiParam           {String}  email  coach email
         * @apiParam           {String}  password  coach password
         *
         */
        Route::post('login', [CoachAuth::class, 'login']);

        /**
         * @api                {post} /api/v1/coach/register_step_1
         * @apiGroup           v1/coach
         * @apiName            Registration for coach
         * @apiDescription     First step of registration that only validates bypassed fileds
         *
         * @apiVersion         1.0.0
         *
         * @apiParam           {String}  email  coach email
         * @apiParam           {String}  password  coach password
         * @apiParam           {String}  password_confirm  password confirmation
         *
         */
        Route::post('register_step_1', [CoachAuth::class, 'register']);

        /**
         * @api                {post} /api/v1/coach/register_step_2
         * @apiGroup           v1/coach
         * @apiName            Registration for coach
         * @apiDescription     Second step of registration, validates all addition fieilds and returns coach object with access token
         *
         * @apiVersion         1.0.0
         *
         * @apiParam           {String}  email  coach email
         * @apiParam           {String}  password  coach password
         * @apiParam           {String}  password_confirmation  coach password again
         * @apiParam           {String}  first_name  coach first name
         * @apiParam           {String}  last_name  coach last name
         * @apiParam           {Integer}  currency_id  number with id from static currency list
         * @apiParam           {Integer}  timezone_id  number with id from static timezone list
         *
         */
        Route::post('register_step_2', [CoachAuth::class, 'registerStepTwo']);
    });

    Route::group(['prefix' => 'admin'], function () {
        Route::post('pages', [AdminPagesController::class, 'getPages']);
    });
});
