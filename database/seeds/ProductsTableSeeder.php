<?php

use Illuminate\Database\Seeder;

use App\Product;
use App\Genre;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(Product::count() > 0 )
        throw new Exception("Ya hay productos en la tabla! Ejecutá php artisan migrate:refresh --seed si querés borrar todas tus tablas, volverlas a crear y seedearlas nuevamente");

      $faker = Faker\Factory::create();

      $genres = Genre::all();

      $titulos = collect(['El rey Lear', 'Amalia', 'Martín Fierro', 'El diario', 'Las Eneidas', 'El ratón Pérez', 'Historia Argentina', 'Historia de Europa', '1984', 'Rebelión en la granja', 'El príncipe', 'Caperusita Roja', 'El Kremlin por dentro', 'Philosophy lectures', 'Multivariate Analysis']);
      $autores = collect(['Juan Hernández', 'Octavio Chávez', 'Josefa Pereyra', 'Shakespeare', 'Maquiavelo', 'Saint-Exupery', 'John Bush', 'Charles Smith', 'Bukowski']);
      $condiciones = collect(['Nuevo', 'Usado']);
      $formatos = collect(['Tapa dura', 'Tapa blanda']);
      $editoriales = collect(['Tolemia', 'Edhasa', 'Agebe', 'Libertador', 'Planeta', 'Alstand', 'McHill']);

      for($i=0; $i < 220; $i++) {
        $titulo = $titulos->random(1);
        $autor = $autores->random(1);
        $condicion = $condiciones->random(1);
        $formato = $formatos->random(1);
        $editorial = $editoriales->random(1);
        // $genero_id
        // $descripcion
        // $precio
        Product::create([
            'title'       =>  $titulo,
            'author'      =>  $autor,
            'condition'   =>  $condicion,
            'format'      =>  $formato,
            'publisher'   =>  $editorial,
            'genre_id'	  =>  $genres->random(1)->id,
            'language'    =>  'Español',
            'isbn'        =>  '1234321',
            'description' =>  $faker->sentence(6),
            'price'       =>  '100',
            'thumbnail'   =>  'img/products/c9b6e645d4652dd3040579bf67c6415d.png',
          ]);
      }
    }
}
