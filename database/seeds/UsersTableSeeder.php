<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      if(User::count() > 0 )
        throw new Exception("Ya hay usuarios en la tabla! Ejecutá php artisan migrate:refresh --seed si querés borrar todas tus tablas, volverlas a crear y seedearlas nuevamente");

      $nombres = collect(['Gervasio', 'Analía', 'Teresa', 'Florencia', 'Hernando', 'Esteban', 'Rodolfo', 'Roxana', 'María']);
      $apellidos = collect(['Hernández', 'Chávez', 'Pereyra', 'González', 'Mazzoccone', 'Farías', 'Bush', 'Smith', 'Black']);
      $dominios = collect(['hotmail.com', 'yahoo.com.ar', 'gmail.com', 'live.com', 'outlook.com', 'corp.com']);
      $telefonos = collect(['112321323', '3232323', '232323', '4543', '343434', '43434']);

      for($i=0; $i < 220; $i++) {
    		$nombre = $nombres->random(1);
    		$apellido = $apellidos->random(1);
    		$dominio = $dominios->random(1);
        $email = str_slug($nombre.$apellido).rand(1,10000)."@".$dominio; //Agrego un numero aleatorio despues del email para evitar que se repitan y me falle el seeder ya que el email es unique en la tabla users!
        $telefono = $telefonos->random(1);
        User::create([
	          'name'     => $nombre,
	          'lastName' => $apellido,
	          'email'    => $email,
            'phone'    => $telefono,
	          'password' => Hash::make('12345678'),
	        ]);
    }
}
