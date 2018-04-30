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
      $market_img->path ='m11.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='m12.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='layout1.jpg';
      $market_img->type='layout';
      $market_img->save();


      $market = App\Market::where('id', '2')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='layout2.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='rat.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='poom.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='nut.jpg';
      $market_img->type='screenshot';
      $market_img->save();


      $market = App\Market::where('id', '3')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='layout3.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='m31.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='m32.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_กก.jpg';
      $market_img->type='screenshot';
      $market_img->save();


      $market = App\Market::where('id', '4')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_layout_2018-04-30 14-36-00_layoud.jpg';
      $market_img->type='layout';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_4.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_11.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_nn.jpg';
      $market_img->type='screenshot';
      $market_img->save();

      $market = App\Market::where('id', '5')->value('id');
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_3วว.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_layout_2018-04-30 14-36-00_layoutaw.jpg';
      $market_img->type='layout';
      $market_img->save();

      $market = App\Market::where('id', '6')->value('id');

      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_3พพ.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_screenshot_2018-04-30 14-36-00_3ออ.jpg';
      $market_img->type='screenshot';
      $market_img->save();
      $market_img = new App\MarketImage;
      $market_img->market_id = $market;
      $market_img->path ='img_layout_2018-04-30 14-36-00_layoutฟ.jpg';
      $market_img->type='layout';
      $market_img->save();

        // factory(App\MarketImage::class, 10)->create();
    }
}
