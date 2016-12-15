<?php

use Illuminate\Database\Seeder;
use App\Query;
use App\User;

class QueriesTableSeeder extends Seeder
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

      $users = User::all();

      for($i=0; $i < 70; $i++) {

        Query::create([
            'queryContent'   =>  $faker->sentence(50),
            'name'           =>  $faker->sentence(3),
          ]);
      }
    }
}
