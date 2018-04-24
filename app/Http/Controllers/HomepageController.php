<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Market;


class HomepageController extends Controller
{
      public function index()
      {
          $market = Market::all();
          


          return view('home.index',['markets'=>$market]);
      }

}
