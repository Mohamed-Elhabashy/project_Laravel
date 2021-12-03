<?php

use App\Http\Controllers\admin\DashboardController;
use App\Http\Controllers\admin\MessageController;
use App\Http\Controllers\admin\SocialMediaController;
use App\Http\Controllers\admin\SubscribeMailController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\admin\WebsiteInformationController;
use App\Models\SocialMedia;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
*/
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
/*
 Route::fallback(function () {
|    return abort(404);
|    // return view('errors.404');  // incase you want to return view
| });
*/
Route::middleware('auth')->group(function () {
    Route::middleware('role:admin')->prefix('dashboard')->as('admin.')->group(function () {
        /*
        Route::resource('social-media', SocialMediaController::class)
        ->parameter('social-media', 'socialMedia')
        ->except(['show']);
        */
        Route::prefix('social-media')->as('social-media.')->group(function () {
            Route::get('/index', [SocialMediaController::class, 'index'])->name('index');
            Route::get('/create', [SocialMediaController::class, 'create'])->name('create');
            Route::post('/store', [SocialMediaController::class, 'store'])->name('store');
            Route::get('/edit/{socialMedia}', [SocialMediaController::class, 'edit'])->name('edit');
            Route::put('/update/{socialMedia}', [SocialMediaController::class, 'update'])->name('update');
            Route::get('/destroy/{socialMedia}', [SocialMediaController::class, 'destroy'])->name('destroy');
        });

        Route::prefix('website-information')->as('website-information.')->group(function () {
            Route::get('/edit', [WebsiteInformationController::class, 'edit'])->name('edit');
            Route::post('/update/{websiteInformation}', [WebsiteInformationController::class, 'update'])->name('update');
        });

        Route::prefix('subscribe-mail')->as('subscribe.mail.')->group(function () {
            Route::get('/index', [SubscribeMailController::class, 'index'])->name('index');
            Route::get('/create', [SubscribeMailController::class, 'create'])->name('create');
            Route::post('/store', [SubscribeMailController::class, 'store'])->name('store');
            Route::get('/edit/{subscribeMail}', [SubscribeMailController::class, 'edit'])->name('edit');
            Route::post('/update/{subscribeMail}', [SubscribeMailController::class, 'update'])->name('update');
            Route::get('/destroy/{subscribeMail}', [SubscribeMailController::class, 'destroy'])->name('destroy');
            Route::get('/trashed', [SubscribeMailController::class, 'trashed'])->name('trashed');
            Route::get('/restore/{id}', [SubscribeMailController::class, 'restore'])->name('restore');
            Route::get('/delete/{id}', [SubscribeMailController::class, 'ForceDelete'])->name('force.delete');
            Route::get('/send/index', [SubscribeMailController::class, 'SendMail'])->name('send.email.index');
        });

        Route::get('/index', [DashboardController::class, 'index'])->name('index');
        Route::get('/admins', [UserController::class, 'admins'])->name('admins');
        Route::resource('users', UserController::class);
        Route::get('/show_messages', [MessageController::class, 'index'])->name('message.index');
        Route::get('/messages/delete/{message}', [MessageController::class, 'delete'])->name('message.delete');
    });
});
