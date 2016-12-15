<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Query;
use Gate;

class QueryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_unless(Gate::allows('index-query'), 403);

      $queries = Query::all();
      return view('admin/queries')->with('queries', $queries);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_unless(Gate::allows('create-query'), 403);

      return view('contact');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      abort_unless(Gate::allows('store-query'), 403);

        // $query = new Query;
        // $query->user_id = $request->user_id;
        // $query->name = $request->name;
        // $query->lastName = $request->lastName;
        // $query->email = $request->email;
        // $query->queryContent = $request->queryContent;
        // $query->save();

        Query::create([
          'user_id'       =>  $request->user_id,
          'name'          =>  $request->name,
          'lastName'      =>  $request->lastName,
          'email'         =>  $request->email,
          'queryContent'  =>  $request->queryContent
        ]);

        return view('contact')->with("querySuccess_Msj", "Tu consulta fue enviada. Contestaremos a la brevedad.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      abort_unless(Gate::allows('show-query'), 403);

        $query = Query::find($id);
        return view('admin/query')->with('query', $query);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_unless(Gate::allows('edit-query'), 403);
        // vista para editar una query
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
      abort_unless(Gate::allows('update-query'), 403);

        // ejecuta la edición de la query mandada desde la vista de 'edit'
        // return "Form submitted. Query '.$id.' updated in the database";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      abort_unless(Gate::allows('destroy-query'), 403);
        //
    }
}
