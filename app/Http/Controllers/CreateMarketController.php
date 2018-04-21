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
      $market->username = $request->input('username');
      $market->first_name = $request->input('first_name');
      $market->last_name = $request->input('last_name');
      $market->password = $request->input('password');
      $market->email = $request->input('email');
      $market->address = $request->input('address');
      $market->birthday = $request->input('birthday');
      $market->phone = $request->input('phone');
      $market->image = $request->input('image');
      $market->type = $request->input('type');
      $market->is_enabled = $request->input('is_enabled');
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
