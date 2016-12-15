<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use Gate;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      abort_unless(Gate::allows('index-genre'), 403);
      // abort_unless(Auth::user()->isAdmin(), 403);

      $genres = Genre::all();
      return view('admin/genres')->with('genres', $genres);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      abort_unless(Gate::allows('create-genre'), 403);

      return view('admin/genres');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      abort_unless(Gate::allows('store-genre'), 403);

      Genre::create([
        'genreTitle'  =>  $request->genreTitle,
      ]);

      $genres = Genre::all();
      return view('admin/genres')->with("GenreCreationSuccess_Msj", "Género creado. Ya está disponible en la lista.")->with('genres', $genres);;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        abort_unless(Gate::allows('show-genre'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      abort_unless(Gate::allows('edit-genre'), 403);

      $genre = Genre::find($id);
      return view('admin/editGenre')->with('genre', $genre);
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
      abort_unless(Gate::allows('update-genre'), 403);

      Genre::find($id)->update([
        'genreTitle'    =>  $request->genreTitle,
      ]);
      // save();
      $genres = Genre::all();
      return redirect('genres')->with('GenreUpdateSuccess_Msj', 'Género modificado exitosamente.')->with('genres', $genres);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        abort_unless(Gate::allows('destroy-genre'), 403);

        $genre = Genre::find($id);
        $genre->delete();
        $genres = Genre::all();
        return redirect('genres')->with("GenreDeletionSuccess_Msj", "Género eliminado. Ya fue quitado de la lista.")->with('genres', $genres);
    }
}
