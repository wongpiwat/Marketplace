<?php

namespace App\Http\Controllers;

use App\CreateMarket;
use Illuminate\Http\Request;

class CreateMarketController extends Controller {

    public function index() {
      return view('createMarket.index');
    }

    public function create() {

    }

    public function store(Request $request) {
      // $request->validate(['name'=>'required|min:4|max:255|unique:projects,name' , 'description' => 'required|min:10' , 'view_status' => 'required']);
      $market = new Market;
      $market->username = $request->input('name');
      $market->save();
      return redirect('/create/'.$market->id);
    }

    public function show(CreateMarket $createMarket) {

    }


    public function edit(CreateMarket $createMarket) {

    }


    public function update(Request $request, CreateMarket $createMarket) {

    }

    public function destroy(CreateMarket $createMarket) {

    }
}
