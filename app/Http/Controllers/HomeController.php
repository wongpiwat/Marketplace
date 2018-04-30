<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Market;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller {

  public function __construct() {
    date_default_timezone_set('Asia/Bangkok');
  }

  public function index() {
    $markets = Market::whereNull('deleted_at')->where('is_enabled','1')->whereDate('close_day','>',date('Y-m-d'))->get();
    $recommend = Market::whereNull('deleted_at')->where('is_enabled','1')->whereDate('close_day','>',date('Y-m-d'))->orderByRaw('view DESC')->get();
    $webboard  = \App\Webboard::whereNull('market_id')->whereNull('deleted_at')->orderBy('created_at','desc')->get();
    $upcome =  Market::whereNull('deleted_at')->where('start_day','>',date("Y-m-d"))->orderBy('start_day','asc')->get();
    $recent = Market::whereNull('deleted_at')->where('is_enabled','1')->orderBy('created_at','desc')->get();
    return view('home.index', compact('markets','recommend','webboard','upcome','recent'));
  }

  public function  display(Request $request) {
    $recent = Market::whereNull('deleted_at')->where('is_enabled','1')->orderBy('created_at','desc')->get();
    $text = $request->str;
    $action =  $request->action;
    $webboard  = \App\Webboard::whereNull('market_id')->whereNull('deleted_at')->orderBy('created_at','desc')->get();

    if ($text == null) {
        $text = "";
    }

    $searhFromDB =  DB::table('markets')->where('is_enabled', '=', '1')->whereNull('deleted_at')->where(function ($query) use ($text) {
      $query->where('name','like','%'.$text.'%')->orWhere('location','like','%'.$text.'%');
    })->paginate(5);

    $text = strtoupper($text);
    return view('home.search',['search'=>$searhFromDB,'action'=>$action,'recent'=>$recent,'text'=>$text,'webboard'=>$webboard]);
    }
}
