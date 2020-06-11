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
        $channel1 = ['title' => 'Developers\' Learning habit'];
        $channel2 = ['title' => 'Beginners\' Journey'];
        $channel3 = ['title' => 'Mentorship'];
        $channel4 = ['title' => 'Imposter Syndrome'];
        $channel5 = ['title' => 'Tutorials'];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
