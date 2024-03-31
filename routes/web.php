<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\HeroController;
use App\Http\Controllers\LeagueController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PrizeController;
use App\Http\Controllers\MyTeamController;
use App\Http\Controllers\ReserveController;
use App\Http\Controllers\CaptainController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
use App\Http\Controllers\ImportExportController;
use App\Http\Controllers\ForgetPasswordController;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication Routes
Route::middleware('guest')->group(function () {
    Route::get('login', [AuthController::class, 'index'])->name('login');
    Route::post('login', [AuthController::class, 'customLogin'])->name('login.custom');
    Route::get('register', [AuthController::class, 'registration'])->name('register');
    Route::post('register', [AuthController::class, 'customRegistration'])->name('register.custom');
});
Route::get('signout', [AuthController::class, 'signOut'])->name('signout');
Route::get('welcome', [AuthController::class, 'dashboard'])->name('dashboard');

// Forgot and Reset Password Routes
Route::get('forget-password', [ForgetPasswordController::class, 'showForgetPasswordForm'])->name('forget.password.get');
Route::post('forget-password', [ForgetPasswordController::class, 'submitForgetPasswordForm'])->name('forget.password.post');
Route::get('reset-password/{token}', [ForgetPasswordController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::post('reset-password', [ForgetPasswordController::class, 'submitResetPasswordForm'])->name('reset.password.post');

// Static Pages
Route::view('/about', 'about')->name('about');
Route::view('/faq', 'faq')->name('faq');
Route::view('/privacypolicy', 'privacypolicy')->name('privacypolicy');

//  Resource Routes
Route::resources([
    '/home' => HomeController::class,
    '/score' => ScoreController::class,
    '/game' => GameController::class,
    '/prize' => PrizeController::class,
    '/test' => TestController::class,
]);

// Protected Routes (Require Authentication)
Route::middleware('authenticate')->group(function () {
    Route::resource('hero', HeroController::class);
    Route::resource('league', LeagueController::class);
    Route::resource('game', GameController::class);
    Route::resource('myteam', MyTeamController::class);
    Route::resource('reserve', ReserveController::class);
    Route::resource('captain', CaptainController::class);
    Route::resource('profile', ProfileController::class);
    Route::resource('post', PostController::class);
});
    // Admin Routes
Route::middleware('admin')->group(function () {

    Route::get('/score/create', [ScoreController::class, 'create']);
    Route::get('league/{league}/edit', [LeagueController::class, 'edit']);

    Route::resource('/player', PlayerController::class);
    Route::resource('/team', TeamController::class);
    Route::resource('/game', GameController::class);

    // Excel Routes
    Route::controller(ImportExportController::class)->group(function(){
        Route::get('import_export', 'importExport');
        Route::post('import', 'import')->name('import');
        Route::post('import-player', 'importPlayer')->name('import-player');
        Route::post('import-team', 'importTeam')->name('import-team');
        Route::get('export', 'export')->name('export');
        Route::get('export-teams', 'exportTeams')->name('export-teams');
    });

});
