<?php

use Illuminate\Database\Seeder;

class UserstableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name' => 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@talk-space.dev',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png') // this says, in the public directory search for the avatar folder and inside the avatar folder look for the avatar.png file.
        ]);

        App\User::create([
            'name' => 'Deni',
            'password' => bcrypt('password'),
            'email' => 'me@mail.dev',
            // 'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}
