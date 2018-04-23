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
        $marker->day = '14/2/2018';
        $marker->description="งานเทศกาล Ku Fest งานขายของOTOPต่างๆที่รวมอาหารมากมายไว้";
        $marker->teaser='URL';
        $marker->phone='0871191123';
        $marker->email='0871191123';
        $marker->contact_name='Test1';
        $marker->organizer_name='ADMIN';
        $marker->created_by=$user_id1;
        $marker->save();


        $user_id2 = App\User::where('username', 'Sunut')->value('id');
        $marker2 = new App\Market;
        $marker2->name ="Apache Ser";
        $marker2->location ="Lopburi Festival";
        $marker2->start_time = "10.00";
        $marker2->close_time = '17.00';
        $marker2->day = '28/6/2017';
        $marker2->description="งานเทศกาลสินค้าและโชว์ต่างๆที่ลพบุรี";
        $marker2->teaser='URL';
        $marker2->phone='0871191123';
        $marker2->email='0871191123';
        $marker2->contact_name='Test2';
        $marker2->organizer_name='ADNUT';
        $marker2->created_by=$user_id2;
        $marker2->save();

        factory(App\Market::class, 5)->create();

    }
}
