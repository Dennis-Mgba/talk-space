<?php

use Illuminate\Database\Seeder;
use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reply_1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium'
        ];

        $reply_2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium'
        ];

        $reply_3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content' => 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium'
        ];

        Reply::create($reply_1);
        Reply::create($reply_2);
        Reply::create($reply_3);
    }
}
