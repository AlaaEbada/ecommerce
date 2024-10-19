<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/redirect', HomeController::class . '@redirect')->middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
]);

//For Admin

Route::middleware(['auth', 'usertype:1'])->group(function () {

    Route::get("/view_category", AdminController::class . '@view_category');

    Route::post("/add_category", AdminController::class . "@add_category");

    Route::get("/delete_category/{id}", AdminController::class . "@delete_category");

    Route::get("/view_product", AdminController::class . "@view_product");

    Route::post("/add_product", AdminController::class . "@add_product");

    Route::get("/show_product", AdminController::class . "@show_product");

    Route::get("/delete_product/{id}", AdminController::class . "@delete_product");

    Route::get("/update_product/{id}", AdminController::class . "@update_product");

    Route::post("/update_product_confirm/{id}", AdminController::class . "@update_product_confirm");

    Route::get("/view_order", AdminController::class . '@view_order');

    Route::get("/delivered/{id}", AdminController::class . '@delivered');

    Route::get("/print_pdf/{id}", AdminController::class . '@print_pdf');

    Route::get("/send_email/{id}", AdminController::class . '@send_email');

    Route::post("/send_user_email/{id}", AdminController::class . '@send_user_email')->name('send.notification');

    Route::get('/search', AdminController::class . '@searchdata');

    Route::get('/add_post', AdminController::class . '@add_post_page');

    Route::get('/post_category', AdminController::class . '@post_category');

    Route::post('/add_post_category', AdminController::class . '@add_post_category');

    Route::post('/add_new_post', AdminController::class . '@add_new_post');

    Route::get('/show_posts', [AdminController::class, 'show_posts'])->name('posts.index');

    Route::get('/posts/edit/{id}', [AdminController::class, 'edit_post'])->name('posts.edit');

    Route::get('/posts/delete/{id}', [AdminController::class, 'destroy'])->name('posts.destroy');

    Route::post("/update_post/{id}", AdminController::class . "@update_post");

    Route::get('/post/{id}', [HomeController::class, 'single_post']);

    Route::get('/view_users', [AdminController::class, 'view_users']);

    Route::get('/add_user', [AdminController::class, 'add_user']);

    Route::post('/store_user', [AdminController::class, 'store_user']);

    Route::get('/edit_user/{id}', [AdminController::class, 'edit_user']);

    Route::post('/update_user/{id}', [AdminController::class, 'update_user']);

    Route::get('/delete_user/{id}', [AdminController::class, 'delete_user'])->name('user.destroy');


});

Route::get("/product_details/{id}", HomeController::class . "@product_details");

Route::post("/add_cart/{id}", HomeController::class . "@add_cart");

Route::get("/show_cart", HomeController::class . "@show_cart");

Route::get("/remove_cart/{id}", HomeController::class . "@remove_cart");

Route::get("/cash_order", HomeController::class . "@cash_order");

Route::get("/stripe/{totalprice}", HomeController::class . "@stripe");

Route::post('stripe/{totalprice}', HomeController::class . '@stripePost')->name('stripe.post');

Route::get('/show_order', HomeController::class . '@show_order');

Route::get('/cansel_order/{id}', HomeController::class . '@cansel_order');

Route::post('/add_comment', HomeController::class . '@add_comment');

Route::post('/add_reply', HomeController::class . '@add_reply');

Route::get('/delete_comment/{id}', HomeController::class . '@delete_comment');

Route::get('/delete_reply/{id}', HomeController::class . '@delete_reply');

Route::get('/product_search', HomeController::class . '@product_search');

Route::get('/products', HomeController::class . '@products')->name('products');;

Route::get('/search_product', HomeController::class . '@search_product');

Route::get('/blog', HomeController::class . '@blog');

Route::get('/contact', HomeController::class . '@contact');











