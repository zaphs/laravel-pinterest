<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Tag::class, 50)->create()->each(function($t){

        });

//        factory(App\Photo::class, 50)->create()->each(function($p){
//
//        });

    }
}
