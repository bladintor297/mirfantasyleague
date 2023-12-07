<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ImportExportController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


    Route::get('welcome', [AuthController::class, 'dashboard']);
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('process-login', [AuthController::class, 'customLogin'])->name('login.custom');
    Route::get('register', [AuthController::class, 'registration'])->name('register');
    Route::post('process-register', [AuthController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/about', function () {
        return view('about');
    });

    Route::get('/privacypolicy', function () {
        return view('privacypolicy');
    });

    Route::get('/prize', function () {
        return view('prize.main-prize');
    });

    Route::post('/scores-import', [ScoreController::class, 'import'])->name('scores.import');
    
    // Resource Controllers
    Route::resources([
        'league' => LeagueController::class,
        'team' => TeamController::class,
        'myTeam' => MyTeamController::class,
        'player' => PlayerController::class,
        'profile' => ProfileController::class,
        'scoreboard' => ScoreController::class,
    ]);

    Route::controller(ImportExportController::class)->group(function(){
        Route::get('import_export', 'importExport');
        Route::post('import', 'import')->name('import');
        Route::get('export', 'export')->name('export');
    });
    