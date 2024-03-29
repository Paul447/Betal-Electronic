<?php

use App\Http\Controllers\CategoryViewController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FetchVariationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\VariationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\VariationoptionController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\ApproverequestController;
use App\Http\Controllers\Admin\BannerController;
use Illuminate\Routing\RouteGroup;
use App\Http\Controllers\Ui\ProductviewController;
use App\Http\Controllers\Ui\CustomerRegController;
use App\Http\Controllers\Ui\CartViewController;
use App\Http\Controllers\Ui\CheckoutController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\Admin\AssignAttribute;
use App\Http\Controllers\Ui\ChangePasswordController;

use App\Http\Controllers\viewprofileController;

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

// Broadcast::channel('orders', function ($user, $data) {
//     return [
//         'id' => $data['id'],
//         'name' => $data['name'],
//     ];
// }, ['middleware' => ['auth:api', function (Request $request, $next) {
//     $request->headers->set('Access-Control-Allow-Origin', 'http://127.0.0.1:8000');
//     return $next($request);
// }]]);

Route::get('/buy/{quantity},{product_id}', [CheckoutController::class, 'index']);
Route::post('/buy/confirm', [CheckoutController::class, 'confirm']);
Route::post('/buy/confirm/{id}', [CheckoutController::class, 'store_buy_data']);
Route::get('/categorySearch/{id}/{slug}', [ProductviewController::class, 'categorySearch']);
Route::get('/fetchbyBrand/{id}', [ProductviewController::class, 'fetchbyBrand']);
Route::get('/', [ProductviewController::class, 'index']);
Route::get('/productdetails/{id}/{slug}', [ProductviewController::class, 'viewdetails']);
Route::get('/categories', [CategoryViewController::class, 'viewCatos']);

Route::get('/customerlogin', function () {
    return view('/login');
});
Route::get('/customerlogout/{id}', [CustomerRegController::class, 'logout']);
Route::get('/googleauth', [CustomerRegController::class, 'google_auth']);
// Route::get('/googleauth', 'CustomerRegController@handleCookieRequest');

// Route::get('/', function () {
//     return view('/welcome');
// });

Route::get('/products/search', [ProductviewController::class, 'search'])->name('products.search');

Route::get('/viewprofile', [viewprofileController::class, 'viewProfile']);
Route::get('/myorder', [viewprofileController::class, 'myorder']);
Route::get('/mydataView', [viewprofileController::class, 'mydataView']);
Route::get('/categorychoice', [CategoryViewController::class, 'viewBychoice']);
Route::get('/newarrivals', [ProductviewController::class, 'newarrivals']);


Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', function () {
        return view('admin/login');
    });
    Route::post('/login', [UserController::class, 'login']);
});

Route::get('/home', [HomePageController::class, 'homeView'])->name('home')->middleware('admin');

Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function () {
    Route::get('/profile/{id}', [UserController::class, 'viewprofile']);
    Route::get('/edit', [UserController::class, 'editprofile']);
    Route::get('product/unfeature/{id}', [ProductController::class, 'unfeature']);
    Route::get('/product/feature/{id}', [ProductController::class, 'feature']);
    Route::get('/product/enable/{id}', [ProductController::class, 'EnableProduct']);
    Route::get('/product/disable/{id}', [ProductController::class, 'DisableProduct']);

    Route::get('/category/visible/{id}', [CategoryController::class, 'showcategory']);
    Route::get('/category/invisible/{id}', [CategoryController::class, 'hidecategory']);
    Route::resources([
        '/product' => ProductController::class,
        // '/order' => OrderController::class,
        '/brand' => BrandController::class,
        '/category' => CategoryController::class,
        '/batch' => BatchController::class,
        '/delivery' => DeliveryController::class,
        '/variation' => VariationController::class,
        '/variationoption' => VariationoptionController::class,
        '/banner' => BannerController::class,
        '/assign' => AssignAttribute::class,
    ]);

    Route::post('/batch/add/', [BatchController::class, 'add']);
    Route::post('/delivery/add/', [DeliveryController::class, 'add']);
    Route::post('/delivery/confirm/', [DeliveryController::class, 'confirm']);

    // Route::resource('/product',ProductController::class);
    // Route::resource('/brand',BrandController::class);
    // Route::resource('/category', CategoryController::class);
    // Route::resource('/variation',VariationController::class);
    // Route::resource('/variationoption',VariationoptionController::class);

    Route::get('/order/', [OrderController::class, 'index']);
    Route::get('/order/create', [OrderController::class, 'create']);
    Route::get('/order/pendingOrder', [OrderController::class, 'pendingOrder']);
    Route::get('/order/completeOrder', [OrderController::class, 'completeOrder']);
    Route::get('/order/calculation', [OrderController::class, 'calculation']);
    Route::get('/order/viewAllProductProfit/{id}', [OrderController::class, 'viewAllProductProfit']);
    Route::get('/order/orderProductDetailView/', [OrderController::class, 'orderPDV']);
});

Route::get('/changepass', [ChangePasswordController::class, 'index']);
Route::post('/changepass', [ChangePasswordController::class, 'store']);

Route::get('/CartView/', [CartViewController::class, 'index']);
Route::delete('/cart/{id}', [CartViewController::class, 'destroy']);
Route::get('/CartVieww/{id}/{quantity}/{reset?}', [CartViewController::class, 'storedata']);
Route::get('/CartViewww/{id},{hel}', [CartViewController::class, 'storedataa']);
Route::get('/CheckOutDetail/{inpvalue},{productId}', [CartViewController::class, 'inc']);

Route::get('/check/{qty},{idd}', [CheckoutController::class, 'store']);
Route::get('/viewCategories/{catoid}/{slug}', [CategoryViewController::class, 'viewCategories']);

Route::post('/confirm/', [CheckoutController::class, 'store']);
Route::post('/storeorderInfo/{id}', [CheckoutController::class, 'datastore']);

Route::get('/postCartData', [CartViewController::class, 'fetchDataForCart']);
Route::get('/termncondition', [CartViewController::class, 'termncondition']);
Route::get('/aboutbetal', [CartViewController::class, 'aboutbetal']);



Route::resource('/customerAdd', CustomerRegController::class);
Route::post('/customerAdd', [CustomerRegController::class, 'store']);
Route::post('/otpverify', [CustomerRegController::class, 'otpverify']);
Route::post('/customerlogin', [CustomerRegController::class, 'login']);
Route::get('/customerLogin/forgot', [CustomerRegController::class, 'forgot']);
Route::post('/customerLogin/forgot', [CustomerRegController::class, 'generateOTP']);
Route::post('/customerLogin/verify', [CustomerRegController::class, 'changepassconfirm']);
Route::post('/customerLogin/resetpassword', [CustomerRegController::class, 'resetPassword']);

Route::get('/logout', [UserController::class, 'logout']);

Route::get('/getBatchAssociatedProduct/{id}', [BatchController::class, 'fetchBatchAssociatesProduct']);

Route::get('/getDistrict/{id}', [AddressController::class, 'district']);
Route::get('/getMunicipality/{id}', [AddressController::class, 'municipality']);
Route::get('/getCatValue/{id}', [CategoryViewController::class, 'readCategory']);
Route::get('/getVarValue/', [CategoryViewController::class, 'readVarition']);
Route::get('/getVarOptValue/{id}', [CategoryViewController::class, 'readVaritionOption']);
