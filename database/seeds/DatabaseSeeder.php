<?php

use Illuminate\Database\Seeder;
use App\PostCache;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(PostCache::class,20)->create();
    }
}
