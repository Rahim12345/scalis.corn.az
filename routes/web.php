<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BrendController;
use App\Http\Controllers\Career;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainMenuController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\profileController;
use App\Http\Controllers\sign\sign_in_upController;
use App\Http\Controllers\SubOneMenuController;
use App\Http\Controllers\SubTwoMenuController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;

Route::group(['middleware'=>'locale'], function (){
    Route::get('/', [PagesController::class,'home'])->name('front.home');
    Route::post('/subscribe', [PagesController::class,'subscribe'])->name('front.about');
    Route::get('/about', [PagesController::class,'about'])->name('front.about');
    Route::get('/brends', [PagesController::class,'brends'])->name('front.brends');
    Route::get('/career', [PagesController::class,'career'])->name('front.career');
    Route::post('/career', [PagesController::class,'careerPost'])->name('front.career.post');
    Route::get('/contact', [PagesController::class,'contact'])->name('front.contact');
    Route::post('/contact', [PagesController::class,'contactPost'])->name('front.contact.post');

    Route::group(['prefix'=>'products'],function (){
        Route::get('{main_menu}', [PagesController::class,'productsMain_menu'])->name('front.products.main_menu');
        Route::get('{main_menu}/{sub_menu_1}', [PagesController::class,'productsMain_menuSubMenu_1'])->name('front.products.main_menu.sub_menu_1');
    });

    Route::get('langs/{locale}',[profileController::class,'langSwitcher'])
        ->name('lang.swithcher');

    Route::get('daxil-ol',[sign_in_upController::class,'login'])
        ->middleware('locale')
        ->name('login');

    Route::post('daxil-ol',[sign_in_upController::class,'loginPost'])
        ->middleware('locale')
        ->middleware('throttle:5,60')
        ->name('login.post');

    Route::get('cixis-et',[sign_in_upController::class,'logout'])
        ->middleware( 'auth' )
        ->name( 'logout' );

    Route::post('avatar-upload',[ profileController::class,'avatarUpload' ])
        ->name('front.avatar.upload')
        ->middleware('auth');

    Route::post('profile',[ profileController::class,'profileUpdate' ])
        ->name('front.profile.update')
        ->middleware('auth');
});

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web']], function () {
    Lfm::routes();
});

Route::group(['prefix'=>'admin','middleware'=>['auth', 'locale']],function (){
    Route::get('/',[AdminController::class,'index'])
        ->name('back.dashboard');

    Route::get('profile',[profileController::class,'profile'])
        ->name('back.profile');

    Route::resource('option',OptionController::class);
    Route::resource('home', HomeController::class);
    Route::resource('about', AboutController::class);
    Route::resource('brend', BrendController::class);
    Route::post('brend-loader',[BrendController::class,'loader'])
        ->name('brend.loader');
    Route::resource('career', Career::class);
    Route::resource('contact', ContactController::class);


    Route::group(['prefix'=>'mehsullar'],function (){
        Route::resource('esas-menu', MainMenuController::class);
        Route::resource('sub-one-menu', SubOneMenuController::class);
        Route::resource('sub-two-menu', SubTwoMenuController::class);
        Route::resource('product', ProductController::class);
        Route::get('product-files/{action}/{id}', [ProductController::class,'productFiles'])->name('back.product.files');
        Route::post('product-files-post', [ProductController::class,'productFilesPost'])->name('back.product.files.post');
        Route::get('product-files-delete/{action}/{id}', [ProductController::class,'productFilesDelete'])->name('back.product.files.delete');
    });
});
