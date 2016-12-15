<?php
use App\Product;
use App\Genre;
use Illuminate\Support\Facades\DB; // para que funcione el 'paginate'
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
  $products = Product::paginate(20);
  $genres = Genre::all();
  if (Auth::user()) {
    return view('/home')->with('products', $products)->with('genres', $genres);
  } else {
    return view('/welcome')->with('products', $products)->with('genres', $genres);
  }
});

// Route::get('/welcome', function () {
//   if (Auth::user()) {
//     $products = Product::all();
//     $genres = Genre::all();
//     return view('/home')->with('products', $products);
//   } else {
//     return view('/welcome')->with('genres', $genres);
//   }
// });

// Route::get('/mindspace', function () {
//     return view('index');
// });

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('queries', 'QueryController');//->name("contact");

Route::get('/myOrders/{id}', 'UserController@showUserOrders');
Route::resource('users', 'UserController');

Route::get('/faq', function() { return view('/faq'); })->name('faq');

//Route::patch('/update-Product-Img', 'ProductController@postProductImg')->name('updateProductImg');//->where('id','[$product->id]');

Route::get('/products-by-genre', 'ProductController@filterByGenre');
Route::get('/add-to-cart/{id}', 'ProductController@getAddToCart')->name('product.addToCart');
Route::get('/reduce/{id}', 'ProductController@getReduceByOne')->name('product.reduceByOne');
Route::get('/remove/{id}', 'ProductController@getRemoveItem')->name('product.remove');
Route::get('/shopping-cart', 'ProductController@getCart')->name('product.shoppingCart');
Route::get('/checkout', 'ProductController@getCheckout')->name('checkout')->middleware('auth');
Route::post('/checkout', 'ProductController@postCheckout')->name('checkout')->middleware('auth');
Route::resource('products', 'ProductController');

Route::resource('genres', 'GenreController');

Route::resource('orders', 'OrderController');
