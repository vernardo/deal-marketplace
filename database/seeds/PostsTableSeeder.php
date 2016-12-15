<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(Post::count() > 0 )
        throw new Exception("Ya hay posts en la tabla! Ejecutá php artisan migrate:refresh --seed si querés borrar todas tus tablas, volverlas a crear y seedearlas nuevamente");

      $faker = Faker\Factory::create();

      for($i=0; $i < 30; $i++) {

        Post::create([
            'postTitle'     =>  $titulo,
            'postContent'   =>  $autor,
          ]);
      }
    }
}
