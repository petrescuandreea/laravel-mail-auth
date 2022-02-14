<?php

use Illuminate\Database\Seeder;

use App\Videogame;

class VideogameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Videogame::class, 10) -> create();
    }
}
