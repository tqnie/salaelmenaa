<?php

use App\Livewire\Home;
use Illuminate\Support\Facades\Route;
use App\Livewire\Notify;
use App\Livewire\Subscription;
use App\Livewire\ProductUsers;
use App\Livewire\Offers;
use App\Livewire\Offer\ShowOffer;
use App\Livewire\Offer\CreateOffer;
use App\Livewire\Page\PageShow;
use App\Livewire\Post\PostShow;
use App\Livewire\Post\Posts;
use Livewire\Volt\Volt;


Route::get('/', Home::class)->name('home');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');
Route::get('posts/{category:slug?}', Posts::class)->name('posts.index');
Route::get('post/{post:slug}', PostShow::class)
    ->name('posts.show');
Route::get('page/{page:slug}', PageShow::class)
    ->name('page.show');
 
Route::get('product/{slug}', ProductUsers::class)
    ->name('product-users');


Volt::route('users', 'profile_users')->name('users.show');

Route::middleware('auth')->group(function () {

    Route::get('subscription/{packege?}', Subscription::class)
        ->name('subscription');

    //notify
    Route::get('notify', Notify::class)
        ->name('notify');
    // offers
    Route::get('offers', Offers::class)
        ->name('offers');
    Route::get('offer/create/{product?}/{type?}/{user?}', CreateOffer::class)
        ->name('offer.create');
    Route::get('offer/show/{offer}', ShowOffer::class)
        ->name('offer.show');
    Route::get('offers/{product}/{type}/{userId}', Offers::class)
        ->name('offers.user');
});
 require __DIR__ . '/auth.php';
