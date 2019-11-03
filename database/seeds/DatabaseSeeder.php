<?php

use App\Chanel;
use App\Customer;
use App\Post;
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
        factory(Chanel::class,10)->create();
        factory(Post::class,10)->create();
        factory(Customer::class,100)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
