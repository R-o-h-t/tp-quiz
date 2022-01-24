<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChoiceController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\UserController;


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

Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'auth'
    ],
    function ($router) {
        Route::post('login', [AuthController::class, 'login']);
        Route::post('register', [AuthController::class, 'register']);
        Route::post('logout', [AuthController::class, 'logout']);
    }
);

Route::apiResource("choice", ChoiceController::class);
Route::apiResource("question", QuestionController::class);
Route::apiResource("quiz", QuizController::class);
Route::apiResource("score", ScoreController::class);
Route::apiResource("user", UserController::class);
Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'quiz'
    ],
    function ($router) {
        Route::post('{id}/publish', [QuizController::class, 'publish']);
        Route::post('{id}/unpublish', [QuizController::class, 'unpublish']);
        Route::get('{id}/questions', [QuizController::class, 'getQuestions']);
    }
);
Route::group(
    [
        'middleware' => 'api',
        'prefix' => 'question'
    ],
    function ($router) {
        Route::get('{id}/choices', [QuestionController::class, 'getChoices']);
    }
);
