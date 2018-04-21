<?php

use Illuminate\Database\Seeder;

class WebboardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $market1 = App\Market::where('name', 'KU Fest')->value('id');
        $user1 = App\User::where('username', 'admin')->value('id');        
        
        $web1 = new App\Webboard;
        $web1->market_id = $market1;
        $web1->topic ='สอบถามสถานที่';
        $web1->details ="อยากสอบถามว่าอาหารไทยอยู่ตรงไหนครับ";
        $web1->created_by =$user1;
        $web1->save();

        $market2 = App\Market::where('name', 'Apache Ser')->value('id');
        $user2 = App\User::where('username', 'Sunut')->value('id');        
       
        $web2 = new App\Webboard;
        $web2->market_id = $market2;
        $web2->topic ='สอบถามอาหารแถวในเมืองลพบุรี';
        $web2->details ="ร้านอาหารใกล้สถานที่ท่องเที่ยวที่มีวิวสวยๆอยู่ตรงไหนบ้างครับ";
        $web2->created_by =$user2;
        $web2->save();
    }
}
