<?php

namespace App\Http\Controllers;

use App\Webboard;
use Illuminate\Http\Request;
use DB;
class WebboardController extends Controller {

    public function index($id) {
        // $webboard = Webboard::findOrFail($id);
    //    $webboard = Webboard::all($id);

    $webboard = DB::table('webboards')->where('market_id', $id)->get(); 
    return view('webboards.index', ['webboards' => $webboard]);
    }

    public function create() {

    }

    public function store(Request $request) {

    }

    public function show(Webboard $webboard) {

    }


    public function edit(Webboard $createMarket) {

    }


    public function update(Request $request, Webboard $webboard) {

    }

    public function destroy(Webboard $webboard) {

    }
}