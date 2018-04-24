<?php

use Illuminate\Database\Seeder;

class WebboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        $user1 = App\User::where('username', 'admin')->value('id');
        $web1 = new App\Webboard;
        $web1->topic ='สอบถามสถานที่';
        $web1->details ="อยากสอบถามว่าอาหารไทยอยู่ตรงไหนครับ";
        $web1->created_by =$user1;
        $web1->save();

        $user2 = App\User::where('username', 'Sunut')->value('id');
        $web2 = new App\Webboard;
        $web2->topic ='สอบถามอาหารแถวในเมืองลพบุรี';
        $web2->details ="ร้านอาหารใกล้สถานที่ท่องเที่ยวที่มีวิวสวยๆอยู่ตรงไหนบ้างครับ";
        $web2->created_by =$user2;
        $web2->save();

        $user3 = App\User::where('username', 'Lek')->value('id');
        $web3 = new App\Webboard;
        $web3->topic ='สวัสดีครับ';
        $web3->details ="มีใครอยู่ไหม?";
        $web3->created_by =$user3;
        $web3->save();
    }
}
