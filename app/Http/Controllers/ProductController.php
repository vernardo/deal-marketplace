<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Genre;
use App\Cart;
use App\Order; // in order to be able to use the 'Order' object
use Gate;
use Session;
use Auth; // in order to be able to use the 'Auth' facade
// use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_unless(Gate::allows('index-product'), 403);

      $products = Product::all();
      $genres = Genre::all();
      return view('admin/products')->with('products', $products)->with('genres', $genres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_unless(Gate::allows('create-product'), 403);

      $genres = Genre::all();
      return view('admin/products')->with('genres', $genres);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      abort_unless(Gate::allows('store-product'), 403);

      Product::create([
        'title'         =>  $request->title,
        'author'        =>  $request->author,
        'condition'     =>  $request->condition,
        'format'        =>  $request->format,
        'publisher'     =>  $request->publisher,
        'genre_id'      =>  $request->genre_id,
        'language'      =>  $request->language,
        'isbn'          =>  $request->isbn,
        'description'   =>  $request->description,
        'price'         =>  $request->price,
        'thumbnail'     =>  $request->file('thumbnail')->store('img/products', 'public'),
        // 'thumbnail'     =>  Storage::putFile('img/products', $request->file('thumbnail')),
      ]);

      $products = Product::all();
      $genres = Genre::all();
      return view('admin/products')->with("ProductCreationSuccess_Msj", "Producto creado. Ya está disponible en la lista.")->with('products', $products)->with('genres', $genres);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      //abort_unless(Gate::allows('show-product'), 403);

      $product = Product::find($id);
      return view('productDetail')->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_unless(Gate::allows('edit-product'), 403);

      $product = Product::find($id);
      $genres = Genre::all();
      return view('admin/editProduct')->with('product', $product)->with('genres', $genres);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      abort_unless(Gate::allows('update-product'), 403);

      //dd($request);

      // $product = Product::find($id);
      Product::find($id)->update(
      //   [
      //   'title'         =>  $request->title,
      //   'author'        =>  $request->author,
      //   'condition'     =>  $request->condition,
      //   'format'        =>  $request->format,
      //   'publisher'     =>  $request->publisher,
      //   'language'      =>  $request->language,
      //   'isbn'          =>  $request->isbn,
      //   'description'   =>  $request->description,
      //   'price'         =>  $request->price,
      //   'thumbnail'     =>  $request->file('thumbnail')->store('img/products', 'public'),
      // ]
      $request->all()
      );
      // Product::find($id)->update(['thumbnail' => $request->file('thumbnail')->store('img/products', 'public')]);

        // save();
        $products = Product::all();
        $genres = Genre::all();
        return redirect('products')->with("ProductUpdateSuccess_Msj", "Producto modificado exitosamente.")->with('products', $products)->with('genres', $genres);
    }

      // protected function removeProductImageIfExists($product) {
      //   if($product->thumbnail) {
      //   /*
      //    * Storage::disk('public') va a buscar los archivos a la carpeta
      //    * storage/app/public, esto viene por defecto en config/filesystems.php
      //    *
      //    * https://laravel.com/docs/5.3/filesystem
      //    */
      //    Storage::disk('public/img')->delete($product->thumbnail);
      //   }
      // }
      //
      // public function postProductImg(Request $request) {
      //   $product = Product::where('id', $request->id);
      //   if($request->hasFile('thumbnail')) {
    	// 	    $this->removeAvatarIfExists($product);
      //
      //   Product::find($request->id)->thumbnail = $request->file('thumbnail')->store('img/products', 'public');
      //   $products = Product::all();
      //   $genres = Genre::all();
      //   return redirect('products')->with('products', $products)->with('genres', $genres);
      // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      abort_unless(Gate::allows('destroy-product'), 403);

      $product = Product::find($id);
      $product->delete();
      $products = Product::all();
      $genres = Genre::all();
      return redirect('products')->with("ProductDeletionSuccess_Msj", "Producto eliminado. Ya fue quitado de la lista.")->with('products', $products)->with('genres', $genres);
    }

    public function getAddToCart(Request $request, $id) {
      $product = Product::find($id); // fetcheamos el producto de la db a través de la facade de producto
      $oldCart = Session::has('cart') ? Session::get('cart') : null; // fetcheamos el carrito si es que ya tenemos uno inicializado en la sesión, caso contrario pasamos 'null' a la variable
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id); // comentario

      $request->session()->put('cart', $cart); // pasamos el nuevo carrito (con el prod recién agregado) a la sesión
      //dd($request->session()->get('cart')); // quit out of our program to see if the sending of products to the cart session actually works
      return redirect('/');//->route('product.index');
    }

    public function getReduceByOne($id) {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

      if (count($cart->items) > 0) { // si sigue habiendo productos en el carrito
        Session::put('cart', $cart);  // guarda en la sesión el carrito recreado con 1 unidad menos de ese producto
      } else {
        Session::forget('cart'); // destruyo la variable 'carrito' de la sesión
      }

      return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id) {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0) {
        Session::put('cart', $cart);
      } else {
        Session::forget('cart'); // destruyo la variable 'carrito' de la sesión
      }

      return redirect()->route('product.shoppingCart');
    }

    public function getCart() {
      if (!Session::has('cart')) { // si NO hay productos en el carrito
        return view('shopping-cart'); // lo mando a una vista que arrojará un mensaje específico dado que se cumplió esta condición
      }
      $oldCart = Session::get('cart'); // si SÍ hay productos en el carrito, guardo el mismo en una variable
      $cart = new Cart($oldCart); // instancio un objeto con el modelo
      return view('shopping-cart', ['products' => $cart->items], ['totalPrice' => $cart->totalPrice]); // voy a la misma vista pero mostraré el carrito
    }

    public function getCheckout() {
      if (Auth::user()->isAdmin == true) {
        return redirect('/home');
      }
      if (!Session::has('cart')) { // si no tiene productos en el carrito pero trata de entrar a la pág de checkout vía la barra de navegación
        $products = Product::all();
        return view('shopping-cart')->with('products', $products); // mandarlo a la view del carrito donde recibirá un mensaje
        //redirect()->back();
      }
      $oldCart = Session::get('cart'); // si tiene un carrito, lo fetcheo de la sesión
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('checkout')->with('total', $total);
    }

    public function postCheckout(Request $request) {
      // if (Auth::user()->isAdmin == true) {
      //   redirect('/home');
      // }
      if (!Session::has('cart')) {
        return redirect()->route('product.shoppingCart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      // ...
      try {
        //$charge = ["amount" => $cart->totalPrice];
        $order = new Order();
        $order->cart = serialize($cart); // takes my PHP object, converts it into a string, and stores it into the db
        //$order->address = $request->address;
        //$order->name = $request->name;

        Auth::user()->orders()->save($order); // save the related object to the db: (1st) access the user, (2nd) access the orders of the user, (3rd) save a new order on the 'orders' connection
      } catch (Exception $e) {
        return redirect()->route('/')-with('error', $e->getMessage());
      }

      Session::forget('cart'); // elimina el carrito de la sesión
      return redirect('/')->with('success', 'Compra exitosa! Podés verificarlo en MIS COMPRAS.');
    }

    public function filterByGenre(Request $request) {
      $products = Product::where('genre_id', $request->genre)->paginate(20);
      // dd($products);
      $genres = Genre::all();
      if (Auth::user()) {
        return view('home')->with('products', $products)->with('genres', $genres);
      } else {
        return view('welcome')->with('products', $products)->with('genres', $genres);
      }

    }
}
