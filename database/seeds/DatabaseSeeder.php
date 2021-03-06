<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);

        $this->call(GenresTableSeeder::class);

        $this->call(ProductsTableSeeder::class);

        $this->call(OrderTableSeeder::class);

        $this->call(QueriesTableSeeder::class);

        $this->call(PostsTableSeeder::class);
    }
}
