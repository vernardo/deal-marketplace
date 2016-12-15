<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Genre;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $products = Product::all();
      $genres = Genre::all();
      if(Session::has('oldUrl')) {
        $oldUrl = Session::get('oldUrl');
        Session::forget('oldUrl');
        return redirect()->to($oldUrl);
      }
      return view('home')->with('products', $products)->with('genres', $genres);
    }
}
