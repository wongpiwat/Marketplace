<?php

use Illuminate\Database\Seeder;

class MarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_id1 = App\User::where('username', 'admin')->value('id');
        $marker = new App\Market;       
        $marker->name ="KU Fest";
        $marker->location ="Kasetsart University";
        $marker->start_time = "09.00";
        $marker->close_time = "20.00";
        $marker->date = '14/2/2018';
        $marker->details="งานเทศกาล Ku Fest งานขายของOTOPต่างๆที่รวมอาหารมากมายไว้";
        $marker->teaser='URL';
        $marker->created_by=$user_id1;
        $marker->save();

        $user_id2 = App\User::where('username', 'Sunut')->value('id');
        $marker2 = new App\Market;       
        $marker2->name ="Apache Ser";
        $marker2->location ="Lopburi Festival";
        $marker2->start_time = "10.00";
        $marker2->close_time = '17.00';
        $marker2->date = '28/6/2017';
        $marker2->details="งานเทศกาลสินค้าและโชว์ต่างๆที่ลพบุรี";
        $marker2->teaser='URL';
        $marker2->created_by=$user_id2;
        $marker2->save();
    }
}
