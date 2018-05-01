<?php

use Illuminate\Database\Seeder;

class FeedbacksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $fed = new App\Feedback;
      $user = App\User::where('id', '4')->value('id');
      $fed->topic ='ความสะดวก';
      $fed->comment ='ควรจะทำหลายๆจุดให้เข้าถึงง่ายกว่านี้นะครับ เช่น การแก้ไข การเข้าถึง';
      $fed->created_by =$user;
      $fed->save();

      $user = App\User::where('id', '5')->value('id');
      $feedback = new App\Feedback;
      $feedback->topic = 'สร้างตลาดยังไงครับ';
      $feedback->comment = 'คือผมหาปุ่มไม่เจออะครับ';
      $feedback->created_by =$user;
      $feedback->save();

      $user = App\User::where('id', '6')->value('id');
      $feedback = new App\Feedback;
      $feedback->topic = 'สร้างตลาดไม่สำเร๊จแต่จ่ายตังไปแล้วครับ';
      $feedback->comment = 'จ่ายเงินไปแล้วตลาดไม่ขึ้นหน้าเว็ปครับ ผมกดสร้างไปแล้วเรียบร้อยทุกขั้นตอนอะครับแต่ว่ามันไม่ขึ้นหน้าเวปอะครับช่วยตรวจสอบด้วยครับ';
      $feedback->created_by =$user;
      $feedback->save();


      $user = App\User::where('id', '7')->value('id');
      $feedback = new App\Feedback;
      $feedback->topic = 'มีซื้อ ad เพื่อให้ตลาดขึ้นไปหน้าแรกไหมครับ';
      $feedback->comment = 'ผมอยากให้ทุกคนเห็นตลาดผมครับ';
      $feedback->created_by =$user;
      $feedback->save();

        // factory(App\Feedback::class, 10)->create();
    }
}
