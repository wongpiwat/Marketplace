<?php

use Illuminate\Database\Seeder;

class MarketImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $market = App\Market::where('id', '1')->value('id');

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_m11.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_m12.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layout1.jpg';
      $market_img->type='layout';
      $market_img->save();


      $market = App\Market::where('id', '2')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layout2.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_rat.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_poom.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_nut.jpg';
      $market_img->type='screenshot';
      $market_img->save();


      $market = App\Market::where('id', '3')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layout3.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_m31.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_m32.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_กก.jpg';
      $market_img->type='screenshot';
      $market_img->save();


      $market = App\Market::where('id', '4')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layoud.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_4.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_11.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_nn.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market = App\Market::where('id', '5')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_3.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layoutaw.jpg';
      $market_img->type='layout';
      $market_img->save();

      $market = App\Market::where('id', '6')->value('id');

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_3พพ.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_3ออ.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layoutฟ.jpg';
      $market_img->type='layout';
      $market_img->save();

        // factory(App\MarketImage::class, 10)->create();
    }
}
