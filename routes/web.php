<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\CaptainController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
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

Route::get('/league', function () {
    return view('league.league-card');
});


// Static Pages
Route::get('/about', function () {
    return view('about');
});

Route::get('/faq', function () {
    return view('faq');
});

Route::get('/privacypolicy', function () {
    return view('privacypolicy');
});


Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');

Route::resources([
    '/home' => HomeController::class,
    '/score' => ScoreController::class,
    '/hero' => HeroController::class,
    '/league' => LeagueController::class,
    '/game' => GameController::class,
    '/prize' => PrizeController::class,
    '/myteam' => MyTeamController::class,
    '/reserve' => ReserveController::class,
    '/captain' => CaptainController::class,
    '/player' => PlayerController::class,
    '/team' => TeamController::class,
    '/prize' => PrizeController::class,
    '/profile' => ProfileController::class,
    '/post' => PostController::class,
]);


Route::get('welcome', [AuthController::class, 'dashboard']);
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('process-login', [AuthController::class, 'customLogin'])->name('login.custom');
Route::get('register', [AuthController::class, 'registration'])->name('register');
Route::post('process-register', [AuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');

// Route::get('/', 'App\Http\Controllers\HomeController@show');
Route::get('instagram-get-auth', 'App\Http\Controllers\InstagramController@show');

Route::controller(ImportExportController::class)->group(function(){
    Route::get('import_export', 'importExport');
    Route::post('import', 'import')->name('import');
    Route::post('import-player', 'importPlayer')->name('import-player');
    Route::post('import-team', 'importTeam')->name('import-team');
    Route::get('export', 'export')->name('export');
    Route::get('export-teams', 'exportTeams')->name('export-teams');
});

Route::get('forget-password', [App\Http\Controllers\ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [App\Http\Controllers\ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post'); 
Route::get('reset-password/{token}', [App\Http\Controllers\ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [App\Http\Controllers\ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');