<?php

namespace App\Http\Controllers;

use App\Market;
use Illuminate\Http\Request;

class MarketsController extends Controller {

    public function index() {
        return view('markets.index');
    }

    public function create() {
        return view('Markets.create');
    }

    public function store(Request $request) {
      // $request->validate(['name'=>'required|min:4|max:255|unique:projects,name' , 'description' => 'required|min:10' , 'view_status' => 'required']);
      if ($request->hasFile('file')) {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $file->move(base_path('/storage/app/public'),$file->getClientOriginalName());
      }
      $market = new Market;
      $market->name = $request->input('name');
      $market->location = $request->input('location');
      $market->save();
      return redirect('/create/'.$market->id);
    }

    public function show(Market $market) {
        //
    }

    public function edit(Market $market) {
        //
    }

    public function update(Request $request, Market $market) {
        //
    }

    public function destroy(Market $market) {
        //
    }
}
