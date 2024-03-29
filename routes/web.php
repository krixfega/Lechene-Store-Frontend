<?php
use App\Http\Controllers\admin\AdminPagesController;
use App\Http\Controllers\admin\customers\CustomersController;
use App\Http\Controllers\admin\staff\StaffController;
use App\Http\Controllers\admin\tailor\TailorController;
use App\Http\Controllers\admin\product\ProductController;
use App\Http\Controllers\admin\shop\shopController;
use App\Http\Controllers\admin\account\accountController;
use App\Http\Controllers\admin\shop\bookingController;
use App\Http\Controllers\admin\shop\fibricsController;
use App\Http\Controllers\admin\product\ProductCategoryController;
use App\Http\Controllers\admin\customers\MeasurementController;
use App\Http\Controllers\user\UserPagesController;
use App\Http\Controllers\user\SearchController;
use App\Http\Controllers\user\PaymentController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\product\UserProductController;
use App\Http\Controllers\user\product\UserShopController;
use App\Http\Controllers\user\account\UserAccountController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


// Auth Routes
Auth::routes();


/**
 * normal routes
 */
Route::get('/', [UserPagesController::class, 'index'])->name('home');
Route::get('/contact', [UserPagesController::class, 'contact'])->name('contact');
Route::get('/about', [UserPagesController::class, 'about'])->name('about');
Route::get('/product/{id}', [UserPagesController::class, 'singleProduct'])->name('product.show');
Route::get('/shoplist', [UserShopController::class, 'index'])->name('user.shop.index');
Route::get('/bespoke', [UserPagesController::class, 'bespoke'])->name('user.bespoke.index');
Route::get('/shoplist/filter', [UserShopController::class, 'filter'])->name('user.shop.filter');
Route::get('/shoplist/category/{id}', [UserShopController::class, 'category'])->name('user.shop.category');
Route::get('/search/autocomplete', [SearchController::class, 'autoComplete'])->name('search.autocomplete');
Route::post('/search', [SearchController::class, 'search'])->name('search');

/**
 * authenticated routes
 */
Route::middleware('auth')->group(function () {
    Route::post('/cart', [CartController::class, 'create'])->name('cart.create');
    Route::get('/cart', [CartController::class, 'show'])->name('cart.show');
    Route::put('/cart', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/{id}', [CartController::class, 'delete'])->name('cart.delete');
    Route::get('/cart/count', [CartController::class, 'count'])->name('cart.count');
    Route::get('/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
    Route::get('account', [UserAccountController::class, 'index'])->name('user.account.index');
    Route::put('account/profile', [UserAccountController::class, 'EditProfile'])->name('profile');
    Route::put('account', [UserAccountController::class, 'ChangePassword'])->name('user.account.password.update');
    Route::get('account/booking/{id}', [UserAccountController::class, 'showBooking'])->name('user.account.booking.show');
    Route::get('account/orders/{id}', [UserAccountController::class, 'showOrder'])->name('user.account.order.show');
    Route::get('/product/booking/{id}', [UserPagesController::class, 'booking'])->name('product.booking');
    Route::post('/product/booking/create', [UserPagesController::class, 'booking_create'])->name('product.booking.create');
    Route::post('/pay', [PaymentController::class, 'redirectToGateway'])->name('pay');
    Route::get('/payment/callback', [PaymentController::class, 'handleGatewayCallback']);
});




/*
 * admin routes and Subadmin Route
 *
 */
Route::middleware(['auth', 'isAdmin'])->group(function () {



    Route::get('/admin', [AdminPagesController::class, 'index']);
    Route::get('/admin/profile', [AdminPagesController::class, 'profile'])->name('admin.profile');
    Route::put('/admin/profile/{id}', [AdminPagesController::class, 'updateProfile'])->name('admin.updateProfile');
    Route::resource('/admin/customers', CustomersController::class);
    Route::resource('admin/customer/measurement', MeasurementController::class)->except('index');
    Route::resource('/admin/staffs', StaffController::class);
    Route::resource('/admin/products', ProductController::class);
    Route::resource('/admin/productsCategory', ProductCategoryController::class);
    Route::resource('/admin/shop', shopController::class);
    Route::get('/admin/orders', [shopController::class, 'orders'])->name('orders.index');
    Route::get('/admin/orders/history', [shopController::class, 'history'])->name('orders.history');
    Route::put('/admin/orders/status/{id}', [shopController::class, 'updateStatus'])->name('orders.update.status');
    Route::get('/admin/orders/view/{id}', [shopController::class, 'show'])->name('orders.view');
    Route::delete('/admin/orders/{id}', [shopController::class, 'delete'])->name('orders.delete');
    Route::get('/admin/orders/invoice/{id}', [shopController::class, 'invoice'])->name('orders.invoice');

    Route::resource('/admin/booking', bookingController::class);
    Route::get('/admin/bookings/history', [bookingController::class, 'history'])->name('booking.history');
    Route::get('/admin/bookings/invoice/{id}', [bookingController::class, 'invoice'])->name('booking.invoice');

    Route::resource('/admin/fibrics', fibricsController::class);
    Route::post('/admin/shop/add_to_cart/{id}', [shopController::class, 'addToCart'])->name('shop.addToCart');
    Route::patch('/admin/shop/update-cart', [shopController::class, 'updateCart'])->name('shop.updateCart');
    Route::delete('/admin/shop/delete-cart', [shopController::class, 'deleteCart'])->name('shop.deleteCart');
    Route::get('/admin/sell', [shopController::class, 'sell'])->name('shop.sell');
    //account
    Route::get('/admin/account', [accountController::class, 'shop'])->name('account.index');
    Route::resource('/admin/tailor', TailorController::class);
});
