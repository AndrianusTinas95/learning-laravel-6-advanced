<?php

use App\Chanel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        factory(Chanel::class,20)->create();
        // $this->call(UsersTableSeeder::class);
    }
}
