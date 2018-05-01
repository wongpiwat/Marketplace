<?php

use Illuminate\Database\Seeder;

class MarketsTableSeeder extends Seeder {

    public function run() {
      $user = App\User::where('id', '1')->value('id');
      $market = new App\Market;
      $market->name = 'ตลาดสุรัติ';
      $market->location = '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900';
      $market->start_day = '2018-04-30';
      $market->close_day = '2018-05-03';
      $market->start_time = '17:00:00';
      $market->close_time = '02:00:00';
      $market->organizer_name = 'SuratCorparation';
      $market->contact_name = 'Surat';
      $market->email = 'surat_going@hotmail.com';
      $market->phone = '0968122727';
      $market->description = 'ทำเลทองสำหรับค้าขายเพื่อพ่อค้าแม่ค้าทั้งหลายที่สนใจขายของตามตลาดนัด เป็นอีกหนึ่งสถานที่ขายน่าสนใจ เปิดขายในเวลากลางคืน เป็นแหล่งช้อปปิ้งที่ถูกใจทุกเพศทุกวัย มีสินค้าหลากหลายไม่ว่าจะของกิน เสื้อผ้า หรือของใช้ต่างๆ เหมาะสำหรับแม่ค้าที่ขายสินค้าทุกประเภท';
      $market->teaser = 'rgvfKvl7zWA';
      $market->view = '25';
      $market->created_by =  $user;
      $market->is_enabled = true;
      $market->latitude = '13.846677';
      $market->longitude = '100.569209';
      $market->save();




      $user = App\User::where('id', '2')->value('id');
      $market = new App\Market;
      $market->name = 'ตลาดเสรีมาร์เก็ต';
      $market->location = 'ขวง เสนานิคม เขต จตุจักร กรุงเทพมหานคร 10900';
      $market->start_day = '2018-05-01';
      $market->close_day = '2018-06-01';
      $market->start_time = '11:00:00';
      $market->close_time = '17:00:00';
      $market->organizer_name = 'Gundam';
      $market->contact_name = 'คุณแต้ว่';
      $market->email = 'taweecc@hotmail.com';
      $market->phone = '0907811712';
      $market->description = 'ทำเลทองสำหรับค้าขายเพื่อพ่อค้าแม่ค้าทั้งหลายที่สนใจขายของตามตลาดนัด เป็นอีกหนึ่งสถานที่ขายน่าสนใจ เปิดขายในเวลากลางคืน เป็นแหล่งช้อปปิ้งที่ถูกใจทุกเพศทุกวัย มีสินค้าหลากหลายไม่ว่าจะของกิน เสื้อผ้า หรือของใช้ต่างๆ เหมาะสำหรับแม่ค้าที่ขายสินค้าทุกประเภท';
      $market->teaser = 'pk8HzIO_j3w';
      $market->view = '35';
      $market->created_by =  $user;
      $market->is_enabled = true;
      $market->latitude = '13.841535';
      $market->longitude = '100.585973';
      $market->save();


      $user = App\User::where('id', '3')->value('id');
      $market = new App\market;
      $market->name = 'ตลาดนัดสวนจตุจักร';
      $market->location = 'Kamphaeng Phet 2 Rd, Khwaeng Chatuchak, Khet Chatuchak, กรุงเทพมหานคร 10900';
      $market->start_day = '2018-06-30';
      $market->close_day = '2018-11-03';
      $market->start_time = '18:00:00';
      $market->close_time = '01:00:00';
      $market->organizer_name = 'Jatuka';
      $market->contact_name = 'jukrit';
      $market->email = 'jukrit@hotmail.com';
      $market->phone = '026634354';
      $market->description = 'ตลาดนัดสวนจตุจักร เป็นตลาดนัดที่ใหญ่ที่สุดในประเทศไทย ตลาดนัดแห่งนี้เป็นสถานที่ที่นักท่องเที่ยว ที่มาเที่ยวกรุงเทพฯ ทุกคนควรมา โดยเฉพาะนักช็อปทั้งหลาย เวลาเปิดปิดของตลาดนัดนั้น ';
      $market->teaser = 'ORa7Pxo5xOQ';
      $market->view = '40';
      $market->created_by = $user;
      $market->is_enabled = true;
      $market->latitude = '13.800101';
      $market->longitude = '100.568266';
      $market->save();



      $user = App\User::where('id', '7')->value('id');
      $market = new App\market;
      $market->name = 'ตลาดนัดรถไฟ รัชดา';
      $market->location = '50 ถนน งามวงศ์วาน แขวง ลาดยาว เขต จตุจักร กรุงเทพมหานคร 10900';
      $market->start_day = '2018-04-30';
      $market->close_day = '2010-05-03';
      $market->start_time = '17:00:00';
      $market->close_time = '02:00:00';
      $market->organizer_name = 'SuratCorparation';
      $market->contact_name = 'Surat';
      $market->email = 'surat_going@hotmail.com';
      $market->phone = '0968122727';
      $market->description = 'ทำเลทองสำหรับค้าขายเพื่อพ่อค้าแม่ค้าทั้งหลายที่สนใจขายของตามตลาดนัด เป็นอีกหนึ่งสถานที่ขายน่าสนใจ เปิดขายในเวลากลางคืน เป็นแหล่งช้อปปิ้งที่ถูกใจทุกเพศทุกวัย มีสินค้าหลากหลายไม่ว่าจะของกิน เสื้อผ้า หรือของใช้ต่างๆ เหมาะสำหรับแม่ค้าที่ขายสินค้าทุกประเภท';
      $market->teaser = 'mIQtWbwAb3A';
      $market->view = '25';
      $market->created_by = $user;
      $market->is_enabled = true;
      $market->latitude = '13.846677';
      $market->longitude = '100.569209';
      $market->save();


      $user = App\User::where('id', '10')->value('id');
      $market = new App\Market;
      $market->name = 'ตลาดกัช';
      $market->location = 'ตำบล ปากแพรก อำเภอเมืองกาญจนบุรี กาญจนบุรี 71000';
      $market->start_day = '2018-05-10';
      $market->close_day = '2018-05-13';
      $market->start_time = '12:00:00';
      $market->close_time = '24:00:00';
      $market->organizer_name = 'Teangone';
      $market->contact_name = 'Mr.Teangkun';
      $market->email = 'teangteang@hotmail.com';
      $market->phone = '0901547819';
      $market->description = 'ตลาดนี้มีทั้งร้านค้าปลีกและแผงลอยด้านนอกซึ่งเน้นไปที่ลูกค้าซึ่งเป็นนักท่องเที่ยว ตลาดนี้ตั้งอยู่ตรงแยกราชปรารภและถนนเพชรบุรีในเขตราชเทวี ที่นี่ถือว่าเป็นหนึ่งในที่ซึ่งขายเสื้อผ้าในราคาที่ถูกที่สุดในใจกลางกรุงเทพมหานคร นอกจากเสื้อผ้าแล้วของที่ขายยังมีนาฬิกาข้อมือ หัตถกรรม และอื่น ๆ';
      $market->teaser = '94wONqG3iDQ';
      $market->view = '108';
      $market->created_by =  $user;
      $market->is_enabled = true;
      $market->latitude = '14.044891';
      $market->longitude = '99.577637';
      $market->save();





      $user = App\User::where('id', '12')->value('id');
      $market = new App\Market;
      $market->name = 'ตลาด4มุมเมือง';
      $market->location = 'หมู่บ้าน ไวท์เครน อำเภอ ธัญบุรี ปทุมธานี 12110';
      $market->start_day = '2018-05-10';
      $market->close_day = '2018-07-03';
      $market->start_time = '06:00:00';
      $market->close_time = '18:00:00';
      $market->organizer_name = 'fakedata@hotmail.com';
      $market->contact_name = 'Mr.Fake';
      $market->email = 'fakeyub@hotmail.com';
      $market->phone = '09012345432';
      $market->description = 'ตลาดเสื้อผ้าและเครื่องประดับ ของไทยที่สามารถนำสินค้าไปขาย โดยเปิดหน้าร้านขายของ หรือขายแบบออนไลน์ได้และเป็นตลาดที่รู้จักกันดีทั้งคนไทยและชาวต่างชาติก็คือ 4มุมเมือง';
      $market->teaser = 'jkJ2bLYj_OY';
      $market->view = '25';
      $market->created_by =  $user;
      $market->is_enabled = true;
      $market->latitude = '13.841010';
      $market->longitude = '100.593992';
      $market->save();

        // factory(App\Market::class, 10)->create();
    }
}
