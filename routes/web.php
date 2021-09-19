<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\AdminProfileController;
use App\Http\Controllers\Backend\BrandsController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\CouponController;
use App\Http\Controllers\Backend\OrderController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\SiteSettingController;
use App\Http\Controllers\Backend\SeoSettingController;
use App\Http\Controllers\Backend\AdminRoleController;

use App\Http\Controllers\Frontend\IndexController;
use App\Http\Controllers\Frontend\LanguageController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\MyCartController;
use App\Http\Controllers\Frontend\MyOrderController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\StripeController;
use App\Http\Controllers\Frontend\CashController;


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


Route::group(['prefix' => 'admin', 'middleware' => ['admin:admin']], function () {
    Route::get('/login', [AdminController::class, 'loginForm']);
    Route::post('/login', [AdminController::class, 'store'])->name('admin.login');
});
Route::middleware(['auth:admin'])->group(function () {

    Route::middleware(['auth:sanctum,admin', 'verified'])->get('/admin/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');

    //Logout
    Route::get('/admin/logout', [AdminController::class, 'destroy'])->name('admin.logout');

    //Admin Profile
    Route::get('/admin/profile', [AdminProfileController::class, 'adminProfile'])->name('admin.profile');
    Route::get('/admin/profile/edit', [AdminProfileController::class, 'adminProfileEdit'])->name('admin.profile.edit');
    Route::post('/admin/profile/store', [AdminProfileController::class, 'adminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminProfileController::class, 'adminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminProfileController::class, 'adminUpdatePassword'])->name('admin.update.password');
});
//Admin Brands
Route::prefix('brands')->group(function () {
    Route::get('/list', [BrandsController::class, 'listBrands'])->name('list.brands');
    Route::post('/store', [BrandsController::class, 'storeBrands'])->name('brands.store');
    Route::get('/edit/{id}', [BrandsController::class, 'editBrands'])->name('brands.edit');
    Route::post('/update/{id}', [BrandsController::class, 'updateBrands'])->name('brands.update');
    Route::get('/delete/{id}', [BrandsController::class, 'deleteBrands'])->name('brands.delete');
});

//Admin Category
Route::prefix('category')->group(function () {
    Route::get('/list', [CategoryController::class, 'listCategory'])->name('list.category');
    Route::post('/store', [CategoryController::class, 'storeCategory'])->name('category.store');
    Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
    Route::post('/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');
});

//Admin Product
Route::prefix('product')->group(function () {
    Route::get('/add', [ProductController::class, 'addProduct'])->name('product.add');
    Route::get('/list', [ProductController::class, 'listProduct'])->name('list.product');
    Route::post('/store', [ProductController::class, 'storeProduct'])->name('product.store');
    Route::get('/edit/{id}', [ProductController::class, 'editProduct'])->name('product.edit');
    Route::post('/data/update', [ProductController::class, 'updateDataProduct'])->name('product.update.data');
    Route::get('/delete/{id}', [ProductController::class, 'deleteProduct'])->name('product.delete');
    Route::post('/image/update', [ProductController::class, 'MultiImageProduct'])->name('product.update.image');
    Route::get('/image/delete/{id}', [ProductController::class, 'DeleteMultiImageProduct'])->name('product.delete.image');
    Route::post('/thumbnail/update', [ProductController::class, 'ImageProduct'])->name('product.update.thumbnail');
    Route::get('/inactive/{id}', [ProductController::class, 'inActiveProduct'])->name('product.inactive');
    Route::get('/active/{id}', [ProductController::class, 'activeProduct'])->name('product.active');
});

//Admin Sliders
Route::prefix('sliders')->group(function () {
    Route::get('/list', [SliderController::class, 'listSliders'])->name('list.sliders');
    Route::post('/store', [SliderController::class, 'storeSliders'])->name('sliders.store');
    Route::get('/edit/{id}', [SliderController::class, 'editSliders'])->name('sliders.edit');
    Route::post('/update/{id}', [SliderController::class, 'updateSliders'])->name('sliders.update');
    Route::get('/delete/{id}', [SliderController::class, 'deleteSliders'])->name('sliders.delete');
    Route::get('/inactive/{id}', [SliderController::class, 'inActiveSliders'])->name('sliders.inactive');
    Route::get('/active/{id}', [SliderController::class, 'activeSliders'])->name('sliders.active');
});

//Admin Coupons
Route::prefix('coupons')->group(function () {
    Route::get('/list', [CouponController::class, 'listCoupons'])->name('list.coupons');
    Route::post('/store', [CouponController::class, 'storeCoupons'])->name('coupons.store');
    Route::get('/edit/{id}', [CouponController::class, 'editCoupons'])->name('coupons.edit');
    Route::post('/update/{id}', [CouponController::class, 'updateCoupons'])->name('coupons.update');
    Route::get('/delete/{id}', [CouponController::class, 'deleteCoupons'])->name('coupons.delete');
});

//Admin Orders
Route::prefix('orders')->group(function () {
    Route::get('/pending', [OrderController::class, 'ordersPending'])->name('orders.pending');
    Route::get('/detail/{order_id}', [OrderController::class, 'ordersDetail'])->name('orders.detail');
    Route::get('/confirmed', [OrderController::class, 'ordersConfirmed'])->name('orders.confirmed');
    Route::get('/processing', [OrderController::class, 'ordersProcessing'])->name('orders.processing');
    Route::get('/picked', [OrderController::class, 'ordersPicked'])->name('orders.picked');
    Route::get('/shipped', [OrderController::class, 'ordersShipped'])->name('orders.shipped');
    Route::get('/delivered', [OrderController::class, 'ordersDelivered'])->name('orders.delivered');
    Route::get('/cancel', [OrderController::class, 'ordersCancel'])->name('orders.cancel');
    Route::get('/return', [OrderController::class, 'ordersReturn'])->name('orders.return');
    Route::get('/accept/return/{order_id}', [OrderController::class, 'acceptReturn'])->name('accept.return');
    Route::get('/return/success', [OrderController::class, 'acceptReturnSuccess'])->name('orders.return.success');
});

//Admin Update Orders
Route::get('/orders/pending-to-confirm/{order_id}', [OrderController::class, 'ordersPendingToConfirm'])->name('pending.to.confirm');
Route::get('/orders/pending-to-cancel/{order_id}', [OrderController::class, 'ordersPendingToCancel'])->name('pending.to.cancel');
Route::get('/orders/confirm-to-processing/{order_id}', [OrderController::class, 'ordersConfirmToProcessing'])->name('confirm.to.processing');
Route::get('/orders/processing-to-picked/{order_id}', [OrderController::class, 'ordersProcessingToPicked'])->name('processing.to.picked');
Route::get('/orders/picked-to-shipped/{order_id}', [OrderController::class, 'ordersPickedToShipped'])->name('picked.to.shipped');
Route::get('/orders/shipped-to-delivered/{order_id}', [OrderController::class, 'ordersShippedToDelivered'])->name('shipped.to.delivered');
Route::get('/orders/invoice_download/{order_id}', [OrderController::class, 'AdminInvoiceDownload'])->name('invoice.download');

//Admin Reports
Route::prefix('reports')->group(function () {
    Route::get('/all', [ReportController::class, 'reportsAll'])->name('all.reports');
    Route::post('/by/date', [ReportController::class, 'reportsSearchByDate'])->name('search.date');
    Route::post('/by/month', [ReportController::class, 'reportsSearchByMonth'])->name('search.month');
    Route::post('/by/year', [ReportController::class, 'reportsSearchByYear'])->name('search.year');
});

//Admin Manage Users
Route::prefix('users')->group(function () {
    Route::get('/all', [UserController::class, 'usersAll'])->name('all.users');
});

//Admin Manage Setting
Route::get('/site/setting', [SiteSettingController::class, 'siteSetting'])->name('manage.setting');
Route::post('update/site/setting', [SiteSettingController::class, 'updateSiteSetting'])->name('update.site_setting');
Route::get('/seo/setting', [SeoSettingController::class, 'seoSetting'])->name('seo.setting');
Route::post('update/seo/setting/{id}', [SeoSettingController::class, 'updateSeoSetting'])->name('update.seo_setting');

//Admin User
Route::prefix('adminrole')->group(function () {
    Route::get('/all', [AdminRoleController::class, 'allRole'])->name('admin.role');
    Route::get('/add', [AdminRoleController::class, 'addAdminRole'])->name('add.admin');
    Route::post('/store', [AdminRoleController::class, 'storeAdminRole'])->name('admin.role.store');
    Route::get('/edit/{id}', [AdminRoleController::class, 'editAdminRole'])->name('edit.admin.role');
    Route::post('/update/{id}', [AdminRoleController::class, 'updateAdminRole'])->name('update.admin.role');
    Route::get('/delete/{id}', [AdminRoleController::class, 'deleteAdminRole'])->name('delete.admin.role');
});

//==============================================//
//Multi Language
Route::get('/language/vn', [LanguageController::class, 'Vietnam'])->name('language.vn');
Route::get('/language/english', [LanguageController::class, 'English'])->name('language.english');


//User
Route::middleware(['auth:sanctum,web', 'verified'])->get('/dashboard', function () {
    $id = Auth::user()->id;
    $users = User::find($id);
    return view('/dashboard', compact('users'));
})->name('dashboard');


Route::get('/', [IndexController::class, 'index'])->name('/');
Route::get('/user/logout', [IndexController::class, 'userLogout'])->name('user.logout');
Route::get('/user/profile', [IndexController::class, 'userProfile'])->name('user.profile');
Route::post('/user/profile/store', [IndexController::class, 'userProfileStore'])->name('user.profile.store');
Route::get('/user/change/password', [IndexController::class, 'userChangePassword'])->name('user.change_password');
Route::post('/user/update/password', [IndexController::class, 'userUpdatePassword'])->name('user.update.password');
Route::get('/user/orders', [MyOrderController::class, 'myOrders'])->name('my.order');
Route::get('/user/orders_detail/{order_id}', [MyOrderController::class, 'ordersDetail']);
Route::get('/user/invoice_dowload/{order_id}', [MyOrderController::class, 'invoiceDowload']);
Route::post('/user/return_order/{order_id}', [MyOrderController::class, 'ordersReturn'])->name('order.return');
Route::get('/user/return_order', [MyOrderController::class, 'ordersReturnView'])->name('return.order_view');
Route::get('/user/cancel_order', [MyOrderController::class, 'ordersCancelView'])->name('cancel.order_view');

//User Product
Route::get('/product/detail/{id}/{slug}', [IndexController::class, 'detailProduct']);

//Tags
Route::get('/product/tag/{slug}', [IndexController::class, 'tagProduct']);

//Category
Route::get('/categories/product/{cat_id}/{slug}', [IndexController::class, 'categoriesProduct']);

//Product view modal
Route::get('/product/view/modal/{id}', [IndexController::class, 'modalProduct']);

//Add to cart
Route::post('/cart/store/{id}', [CartController::class, 'addToCart']);

//Mini cart
Route::get('/product/minicart/', [CartController::class, 'miniCart']);
Route::get('/product/minicart-remove/{rowId}', [CartController::class, 'removeMiniCart']);

//Wishlist
Route::group(['prefix' => 'user', 'middleware' => ['user', 'auth'], 'namespace' => 'user'], function () {
    Route::get('product/wishlist/', [WishlistController::class, 'wishlist'])->name('wishlist');
    Route::get('getwishlist/', [WishlistController::class, 'getWishlist']);
    Route::get('wishlist/remove/{id}', [WishlistController::class, 'removeWishlist']);
    Route::post('/stripe/order', [StripeController::class, 'stripeOrder'])->name('stripe.order');
    Route::post('/cash/order', [CashController::class, 'cashOrder'])->name('cash.order');
});
Route::post('/user/product/add-wishlist/{product_id}', [WishlistController::class, 'addWishlist']);

//My cart
Route::get('/mycart', [MyCartController::class, 'MyCart'])->name('mycart');
Route::get('/get-mycart', [MyCartController::class, 'getMyCart']);
Route::get('/mycart/remove/{rowId}', [MyCartController::class, 'removeMyCart']);
Route::get('/mycart/process/{rowId}', [MyCartController::class, 'processMyCart']);
Route::get('/mycart/decrement/{rowId}', [MyCartController::class, 'decrementMyCart']);

//Coupon
Route::post('/coupon-apply', [CartController::class, 'couponApply']);
Route::get('/coupon-cal', [CartController::class, 'couponCal']);
Route::get('/coupon-remove', [CartController::class, 'couponRemove']);

//Checkout
Route::get('/checkout', [CartController::class, 'checkout'])->name('checkout');
Route::post('/checkout/store', [CheckoutController::class, 'storeCheckout'])->name('store.checkout');

//Product Search
Route::post('/search', [IndexController::class, 'productSearch'])->name('product.search');
