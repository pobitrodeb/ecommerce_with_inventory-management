<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashbaordController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\CustomerAuthController;
use App\Http\Controllers\CustomerDashboarController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/',[HomeController::class,'index'])->name('home');
Route::get('/product-category-detail/{id}',[HomeController::class,'category'])->name('category.detail');
Route::get('/product-view-detail/{id}',[HomeController::class,'productDetail'])->name('product.detailPage');

Route::post('/product-add/{id}',[CartController::class,'index'])->name('add.to.cart');
Route::get('/show-cart',[CartController::class,'show'])->name('show');
Route::post('/update-cart-product/{id}',[CartController::class,'update'])->name('update.cart.product');
Route::get('/remove-product-form-cart/{id}',[CartController::class,'removeCart'])->name('remove.product.form-cart');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout');
Route::post('/new-order',[CheckoutController::class,'newOrder'])->name('new.order');

Route::get('/complete-order',[CheckoutController::class,'completeOrder'])->name('complete.order');
Route::get('/customer-logout',[CustomerAuthController::class,'logout'])->name('customer.logout');

Route::get('/customer-login',[CustomerAuthController::class,'login'])->name('customer.login');
Route::post('/customer-singIn',[CustomerAuthController::class,'singIn'])->name('customer.singIn');

Route::get('/customer-register',[CustomerAuthController::class,'register'])->name('customer.register');
Route::post('/customer-new',[CustomerAuthController::class,'newCustomer'])->name('new.customer');
Route::get('/customer-dashboard',[CustomerDashboarController::class,'index'])->name('customer.dashboard');



//###################### ADMIN DASHBOAR ########################
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashbaordController::class,'index'])->name('dashboard');


    Route::get('/category-add', [CategoryController::class,'index'])->name('category.add');
    Route::post('/category-create', [CategoryController::class,'create'])->name('category.new');
    Route::get('/category-manage', [CategoryController::class,'manage'])->name('category.manage');

    Route::get('/sub-category-add', [SubCategoryController::class,'index'])->name('subcategory.add');
    Route::post('/sub-category-new', [SubCategoryController::class,'create'])->name('sub-category.new');
    Route::get('/sub-category-manage', [SubCategoryController::class,'manage'])->name('subcategory.manage');

    Route::get('/brand-add', [BrandController::class,'index'])->name('brand.add');
    Route::post('/brand-new', [BrandController::class,'create'])->name('brand.new');
    Route::get('/brand-manage', [BrandController::class,'manage'])->name('brand.manage');

    Route::get('/unit-add', [UnitController::class,'index'])->name('unit.add');
    Route::post('/unit-create', [UnitController::class,'create'])->name('unit.new');
    Route::get('/unit-manage', [UnitController::class,'manage'])->name('unit.manage');

    Route::get('/product-add', [ProductController::class,'index'])->name('product.add');
    Route::post('/product-new', [ProductController::class,'create'])->name('product.new');
    Route::get('/product-manage', [ProductController::class,'manage'])->name('product.manage');
    Route::get('/product-detail/{id}', [ProductController::class,'detail'])->name('product.detail');


    Route::get('/order-manage', [OrderController::class,'manage'])->name('order.manage');
    Route::get('/order-view-detail/{id}', [OrderController::class,'detail'])->name('admin-order.detail');
    Route::get('/order-view-invoice/{id}', [OrderController::class,'viewInvoice'])->name('admin-order.view-invoice');
    Route::get('/order-download-invoice/{id}', [OrderController::class,'downloadInvoice'])->name('admin-order.download-invoice');
    Route::get('/order-edit/{id}', [OrderController::class,'edit'])->name('admin-order.edit');
    Route::get('/order-delete/{id}', [OrderController::class,'delete'])->name('admin-order.delete');


    Route::get('/user-add', [UserController::class,'index'])->name('user.add');
    Route::get('/user-manage', [UserController::class,'manage'])->name('user.manage');
});
