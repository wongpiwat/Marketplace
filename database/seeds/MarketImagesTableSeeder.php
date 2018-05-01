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
      $market_img->path ='ss_3.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layout.jpg';
      $market_img->type='layout';
      $market_img->save();


      $market = App\Market::where('id', '2')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layout.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_1.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_2.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_3.jpg';
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
      $market_img->path ='ss_m33.jpg';
      $market_img->type='screenshot';
      $market_img->save();


      $market = App\Market::where('id', '4')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_ss.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_1.jpg';
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
      $market_img->path ='lo_layoutaw.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_3.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market = App\Market::where('id', '6')->value('id');

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_31.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='ss_32.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='lo_layout.jpg';
      $market_img->type='layout';
      $market_img->save();

        // factory(App\MarketImage::class, 10)->create();
    }
}
