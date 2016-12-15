<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Gate;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_unless(Gate::allows('index-user'), 403);

      $users = User::all();
      return view('admin/users')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      abort_unless(Gate::allows('show-user', $id), 403); // el admin puede ver * y un user solo puede verse él

      // abort_unless(Auth::user()->isAdmin == true || Auth::user()->id == $id, 403);

      $user = User::find($id);
      if ($user) {
        return view('profile')->with('user', $user);
      } else {
        return("No existe tal usuario");
      }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_unless(Gate::allows('edit-user'), 403);
        //
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
      abort_unless(Gate::allows('update-user'), 403);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      abort_unless(Gate::allows('destroy-user'), 403);
        //
    }

    public function showUserOrders($id)
    {
        //
        abort_unless(Gate::allows('showUserOrders-user', $id), 403);

        $userOrders = Auth::user()->orders; // usando relations
        //$userOrders = Order::where('user_id', $id); // reemplazar la anterior línea con esta no funcionaría

        $userOrders->transform(function($order, $key) {
          $order->cart = unserialize($order->cart); // reconvertimos el string a objeto
          return $order;
        });

        return view('myOrders')->with('userOrders', $userOrders);
    }
}
