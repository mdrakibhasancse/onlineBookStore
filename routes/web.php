<?php

use App\Http\Controllers\Admin\AuthorController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\PublisherController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SubscribeController as AdminSubscribeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\CustomerController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\PaymentController;
use App\Http\Controllers\Frontend\ShippingController;
use App\Http\Controllers\frontend\SubscribeController;
use App\Http\Middleware\OnlyAdmin;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index']);
Route::get('/single_book/{id}',[HomeController::class,'single_book']);
Route::get('/category/{name}',[HomeController::class,'category']);
Route::get('/featured',[HomeController::class,'AllBook']);
Route::get('/author',[HomeController::class,'totalAuthor']);
Route::get('/author/{id}',[HomeController::class,'authorBook']);
Route::get('/search',[HomeController::class,'search']);
Route::post('/search_book',[HomeController::class,'searchBook']);
Route::get('/customer-login',[CustomerController::class,'customerLogin']);
Route::get('/customer-signup',[CustomerController::class,'customerSignup']);
Route::post('/customer-signup/store',[CustomerController::class,'SignupStore']);

Route::get('/dashboard',[CustomerController::class,'Dashboard']);
Route::post('/dashboard/profile',[CustomerController::class,'profileUpdate']);
Route::post('/dashboard/password',[CustomerController::class,'updatePassword']);

Route::post('/subscribe',[SubscribeController::class,'store']);
Route::get('/contact',[ContactController::class,'contact']);
Route::post('/contact',[ContactController::class,'addContact']);


Route::get('/book/{id}',[HomeController::class,'book']);

Route::post('review/store',[ReviewController::class,'store']);


Route::prefix('/cart')->group(function(){
    Route::get('/add/{id}',[CartController::class,'cartAdd']);
    Route::post('/add',[CartController::class,'cartSingleBook']);
    Route::get('/check_out',[CartController::class,'check_out']);
    Route::get('/remove/{id}',[CartController::class,'cartRemove']);
    Route::post('/update/{id}',[CartController::class,'cartUpdate']);
    Route::get('/add_one_book/{id}',[CartController::class,'add_one_book']);
    Route::get('/remove_one_book/{id}',[CartController::class,'remove_one_book']);
    Route::get('/shipping',[ShippingController::class,'shipping']);
    Route::post('/shipping/store',[ShippingController::class,'shippingStore']);
    Route::get('/payment',[PaymentController::class,'payment']);
    Route::post('/payment/store',[PaymentController::class,'paymentStore']);
    Route::get('/order_list',[PaymentController::class,'order_list']);
    Route::get('/order/details/{id}',[PaymentController::class,'orderDetails']);
    Route::get('/order/print/{id}',[PaymentController::class,'orderPrint']);

});



Route::prefix('admin')->middleware(['auth','verified',OnlyAdmin::class])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
    Route::get('/customers',[DashboardController::class,'showCustomer']);
    Route::delete('/customers/{id}',[DashboardController::class,'destroy']);
    Route::get('/customers/list',[DashboardController::class,'list']);
    Route::resource('/categories',CategoryController::class);
    Route::resource('/publishers',PublisherController::class);
    Route::resource('/authors',AuthorController::class);
    Route::get('/books/list',[BookController::class,'list']);
    Route::resource('/books',BookController::class);
    Route::resource('/subscribes',AdminSubscribeController::class);

    Route::get('/profile',[ProfileController::class,'index']);
    Route::post('/profile/update',[ProfileController::class,'profileUpdate']);
    Route::post('/update/password',[ProfileController::class,'updatePassword']);


    Route::get('/setting',[SettingController::class,'edit']);
    Route::post('/setting',[SettingController::class,'update']);


    Route::prefix('/review')->group(function(){
        Route::get('/manage',[ReviewController::class,'index']);
        Route::get('/update/{id}',[ReviewController::class,'updateStatus']);
        Route::delete('/delete/{id}',[ReviewController::class,'deleteStatus']);
     });

     Route::prefix('/orders')->group(function(){
        Route::get('/pending',[OrderController::class,'pendingList']);
        Route::get('/approved',[OrderController::class,'approvedList']);
        Route::get('/details/{id}',[OrderController::class,'orderDetails']);
        Route::post('/approve/{id}',[OrderController::class,'approve']);
     });

});





require __DIR__.'/auth.php';
