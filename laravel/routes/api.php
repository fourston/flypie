<?php
use App\Category;
use App\Product;
use App\Banner;
use App\Order;
use App\OrderProducts;
use App\Http\Resources\CategoryResource;
use App\Http\Resources\ProductResource;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('categories', 'CategoryController');
Route::apiResource('products', 'ProductController');
Route::apiResource('banner', 'BannerController');
Route::apiResource('order', 'OrderController');
Route::apiResource('order_products', 'OrderProductsController');
Route::get('products/category/{category_id}/', function (Request $request) {
    $category_id = substr(strrchr(url()->current(), "/"), 1);
    $products = Product::orderBy('title', 'desc')->where('category_id', $category_id)->get();
	return response([ 'products' => $products], 200);		
});
Route::get('orders/{order_id}/', function (Request $request) {
    $order_id = substr(strrchr(url()->current(), "/"), 1);
    $order = Order::where('id', $order_id)->first();
    $products = array();
    $orderProducts = OrderProducts::where('order_id', $order_id)->get();
    foreach ($orderProducts as &$value) {
        $product = Product::where('id', $value->product_id)->first();
        array_push($products, $product);
    }
    return response([ 'order' => $order, 
                      'products' => $products,
                      'orderProducts' => $orderProducts], 
                       200);
		
});

