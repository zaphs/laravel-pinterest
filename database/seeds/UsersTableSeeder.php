<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('admin'),
            'description' => 'I am admin',
            'gender' => 'Female',
            'birthdate' => '1998-12-18',
            'avatar' => 'http://ow16/ow_userfiles/plugins/base/avatars/avatar_big_1_1446279851.jpg',
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => bcrypt('123456'),
            'description' => 'Hi! I am test user',
            'gender' => 'Male',
            'birthdate' => '1998-12-19',
            'avatar' => 'http://ow16/ow_userfiles/plugins/base/avatars/avatar_big_1_1446279851.jpg',
        ]);

        factory(App\User::class, 10)->create()->each(function($u){

            for($i=0; $i<rand(1, 10); $i++) {
                $u->photos()->save(factory(App\Photo::class)->make());
            }

        });

        factory(App\Tag::class, 50)->create()->each(function($t){

        });

        //TODO assign random tags to random photos
        $photos = App\Photo::all();
        foreach($photos as $photo) {

            for($i=0; $i<rand(1, 9); $i++) {
                $randomTag = App\Tag::query()
                    ->inRandomOrder()
                    ->first();
                try {
                    $photo->tags()->save($randomTag);
                } catch (\Illuminate\Database\QueryException $e){

                }
            }
        }

        DB::table('likes')->insert([
            'photo_id' => 1,
            'user_id' => 3,
            'created_at' => '2017-05-31 00:00:00',
        ]);

        DB::table('likes')->insert([
            'photo_id' => 1,
            'user_id' => 4,
            'created_at' => '2017-05-31 00:00:00',
        ]);

        DB::table('likes')->insert([
            'photo_id' => 1,
            'user_id' => 5,
            'created_at' => '2017-05-31 00:00:00',
        ]);
    }
}
