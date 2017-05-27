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
        ]);

        DB::table('users')->insert([
            'name' => 'user1',
            'email' => 'user1@example.com',
            'password' => bcrypt('123456'),
            'description' => 'Hi! I am test user',
            'gender' => 'Male',
            'birthdate' => '1998-12-19',
        ]);

        factory(App\User::class, 10)->create()->each(function($u){

            for($i=0; $i<rand(1, 10); $i++) {
                $u->photos()->save(factory(App\Photo::class)->make());
            }

        });
    }
}
