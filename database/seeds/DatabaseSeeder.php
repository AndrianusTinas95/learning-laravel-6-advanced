<?php

use App\Chanel;
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
        factory(Chanel::class,20)->create();
        factory(Post::class,20)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
