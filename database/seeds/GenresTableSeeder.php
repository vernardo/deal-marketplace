<?php

use Illuminate\Database\Seeder;
use App\Genre;

class GenresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(Genre::count() > 0 )
        throw new Exception("Ya hay géneros en la tabla! Ejecutá php artisan migrate:refresh --seed si querés borrar todas tus tablas, volverlas a crear y seedearlas nuevamente");

      $generos = ['Ciencia', 'Poesía', 'Novela', 'Cuentos', 'Matemática', 'Historia', 'Geografía', 'Fotografía'];

      for($i=0; $i < $generos.length; $i++) {
        $genero = $generos[i];
        Genre::create([
            'genreTitle'  =>  $genero,
          ]);
    }
}
