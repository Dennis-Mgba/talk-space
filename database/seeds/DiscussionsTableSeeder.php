<?php

use Illuminate\Database\Seeder;
use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $title_1 = 'Implementing OAuth2 with laravel passport';
        $title_2 = 'Vue listeners for child components';
        $title_3 = 'Advantage of have a mentor in dev journey';

        $discuss_1 = [
            'title' => $title_1,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'channel_id' => 5,
            'user_id' => 2,
            'slug' => str_slug($title_1)
        ];

        $discuss_2 = [
            'title' => $title_2,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'channel_id' => 5,
            'user_id' => 2,
            'slug' => str_slug($title_2)
        ];

        $discuss_3 = [
            'title' => $title_3,
            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.',
            'channel_id' => 3,
            'user_id' => 1,
            'slug' => str_slug($title_3)
        ];


        // the codes below runs to create the seed data
        Discussion::create($discuss_1);
        Discussion::create($discuss_2);
        Discussion::create($discuss_3);

    }
}
