<?php

use Illuminate\Database\Seeder;

<<<<<<< HEAD
class MarketsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $user_id1 = App\User::where('username', 'admin')->value('id');
        // $marker = new App\Market;
        // $marker->name ="KU Fest";
        // $marker->location ="Kasetsart University";
        // $marker->start_time = "09.00";
        // $marker->close_time = "20.00";
        // $marker->day = '14/2/2018';
        // $marker->description="งานเทศกาล Ku Fest งานขายของOTOPต่างๆที่รวมอาหารมากมายไว้";
        // $marker->teaser='URL';
        // $marker->phone='0871191123';
        // $marker->email='suphawit.kh@ku.th';
        // $marker->contact_name='Test1';
        // $marker->organizer_name='ADMIN';
        // $marker->created_by=$user_id1;
        // $marker->save();
        //
        //
        // $user_id2 = App\User::where('username', 'Sunut')->value('id');
        // $marker2 = new App\Market;
        // $marker2->name ="Winter Market";
        // $marker2->location ="Lopburi Festival";
        // $marker2->start_time = "10.00";
        // $marker2->close_time = '17.00';
        // $marker2->day = '28/6/2017';
        // $marker2->description="งานเทศกาลสินค้าและโชว์ต่างๆที่ลพบุรี";
        // $marker2->teaser='URL';
        // $marker2->phone='0871191123';
        // $marker2->email='supanut.kh@ku.th';
        // $marker2->contact_name='Test2';
        // $marker2->organizer_name='ADNUT';
        // $marker2->created_by=$user_id2;
        // $marker2->save();
        //
        // $admin = App\User::where('username', 'admin')->value('id');
        // $market3 = new App\Market;
        // $market3->name ="Kong Tom";
        // $market3->location ="Central World";
        // $market3->start_time = "18.00";
        // $market3->close_time = '24.00';
        // $market3->day = '25/8/2017';
        // $market3->description="ตลาดนัอคลองถม ของกินอร่อยคนเดินเยอะมากกกกก";
        // $market3->teaser='URL';
        // $market3->phone='0906262726';
        // $market3->email='supanut.kh@ku.th';
        // $market3->contact_name='Test3';
        // $market3->organizer_name='ADPoom';
        // $market3->created_by=$admin;
        // $market3->save();
        //
        // $admin = App\User::where('username', 'admin')->value('id');
        // $market4 = new App\Market;
        // $market4->name ="Changmai Walking";
        // $market4->location ="Maya";
        // $market4->start_time = "16.00";
        // $market4->close_time = '21.00';
        // $market4->day = '3/5/2017';
        // $market4->description="ถนนคนเดินสาวสวย ณ เชียงใหม่";
        // $market4->teaser='URL';
        // $market4->phone='0906262726';
        // $market4->email='supanut.kh@ku.th';
        // $market4->contact_name='Test4';
        // $market4->organizer_name='ADJudge';
        // $market4->created_by=$admin;
        // $market4->save();
        //
        // $user_id1 = App\User::where('username', 'admin')->value('id');
        // $market5 = new App\Market;
        // $market5->name ="Train Rachada Market";
        // $market5->location ="รัชดา";
        // $market5->start_time = "17.00";
        // $market5->close_time = "1.00";
        // $market5->day = '15/3/2018';
        // $market5->description="ตลาดนัดรถไฟรัชดา เงาะอร่อย หอยใหญ่ ต้องตลาดนัตลาดนัดรถไฟรัชดา";
        // $market5->teaser='URL';
        // $market5->phone='0871191123';
        // $market5->email='suphawit.kh@ku.th';
        // $market5->contact_name='Test5';
        // $market5->organizer_name='ADFluke';
        // $market5->created_by=$user_id1;
        // $market5->save();
        factory(App\Market::class,10)->create();
=======
class MarketsTableSeeder extends Seeder {

    public function run() {
>>>>>>> e037eb3b96d3b45e45033524033fc90a97d56562

        factory(App\Market::class,10)->create();
        
    }
}
