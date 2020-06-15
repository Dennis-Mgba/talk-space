<?php

use Illuminate\Database\Seeder;
use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Developers\' Learning habit', 'slug' => str_slug('Developers\' Learning habit')];
        $channel2 = ['title' => 'Beginners\' Journey', 'slug' => str_slug('Beginners\' Journey')];
        $channel3 = ['title' => 'Mentorship', 'slug' => str_slug('Mentorship')];
        $channel4 = ['title' => 'Imposter Syndrome', 'slug' => str_slug('Imposter Syndrome')];
        $channel5 = ['title' => 'Tutorials', 'slug' => str_slug('Tutorials')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
