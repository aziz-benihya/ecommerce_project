<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use Flasher\Laravel\Facade\Flasher;

Route::get('/', [HomeController ::class,'home']); 
Route::get('/dashboard', [HomeController ::class,'login_home']) 
->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

route::get('admin/dashboard',[
    HomeController::class,'index'
]) ->middleware(['auth','admin']);

route::get('view_category',[
    AdminController::class,'view_category'
]) ->middleware(['auth','admin']);

route::post('add_category',[
    AdminController::class,'add_category'
]) ->middleware(['auth','admin']);


Route::get('/test', function () {
    Flasher::addSuccess('Test message from Toastr!');
    return redirect('/');
});

route::get('delete_category/{id}',[
    AdminController::class,'delete_category'
]) ->middleware(['auth','admin']);

route::get('edit_category/{id}',[
    AdminController::class,'edit_category'
]) ->middleware(['auth','admin']);
route::post('update_category/{id}',[
    AdminController::class,'update_category'
]) ->middleware(['auth','admin']);
route::get('add_product',[
    AdminController::class,'add_product'
]) ->middleware(['auth','admin']);
route::post('upload_product',[
    AdminController::class,'upload_product'
]) ->middleware(['auth','admin']);

route::get('view_product',[
    AdminController::class,'view_product'
]) ->middleware(['auth','admin']);
route::get('delete_product/{id}',[
    AdminController::class,'delete_product'
]) ->middleware(['auth','admin']);
route::get('update_product/{id}',[
    AdminController::class,'update_product'
]) ->middleware(['auth','admin']);
route::post('edit_product/{id}',[
    AdminController::class,'edit_product'
]) ->middleware(['auth','admin']);
route::get('search_product',[
    AdminController::class,'search_product'
]) ->middleware(['auth','admin']);

route::get('product_details/{id}',[HomeController::class,'product_details']);
route::get('add_cart/{id}',[HomeController::class,'add_cart'])->middleware(['auth', 'verified']);

route::get('mycart',[HomeController::class,'mycart'])->middleware(['auth', 'verified']);

Route::get('/remove_cart/{id}', [HomeController::class, 'remove_cart'])->name('remove.cart');

Route::post('/confirm_order', [HomeController::class, 'confirm_order'])->middleware('auth');