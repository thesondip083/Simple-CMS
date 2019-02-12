<?php

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user=App\User::create([
            'name'=> 'Sondip Poul Singh',
            'email'=>'sondip083@gmail.com',
            'password'=>bcrypt('laravel'),
            'admin'=>1
        ]);

        App\Profile::create([
           'user_id'=>$user->id,
           'avatar'=>'/uploads/avatars/1.png',
           'about'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dicta consequatur doloribus nisi fugiat provident saepe earum similique voluptates, reprehenderit iure et temporibus libero velit atque odio, adipisci at illo! Suscipit?',
           'youtube'=>'https://www.youtube.com',
           'facebook'=>'https://www.facebook.com',

        ]);
    }
}
