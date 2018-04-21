<?php

use Illuminate\Database\Seeder;

class WebboardRepliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $web1 = App\Webboard::where('topic', 'สอบถามสถานที่')->value('id');
        $user1 = App\User::where('username', 'Lek')->value('id');        

        $web1replie = new App\WebboardReply;
        $web1replie->comment = 'สวัสดีครับ';
        $web1replie->created_by = $user1;
        $web1replie->reply_by =$web1;
        $web1replie->save();

        $web2 = App\Webboard::where('topic', 'สอบถามอาหารแถวในเมืองลพบุรี')->value('id');
        $user2 = App\User::where('username', 'admin')->value('id');  

        $web2replie = new App\WebboardReply;
        $web2replie->comment ='ไม่ทราบครับ';
        $web2replie->created_by = $user2;
        $web2replie->reply_by =$web2;
        $web2replie->save();
    }
}
