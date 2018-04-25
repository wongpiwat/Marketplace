<?php

namespace App\Http\Controllers;

use App\Market;
use App\User;
use Illuminate\Http\Request;

class MarketsController extends Controller {

    public function index() {
        $markets = Market::all();
        $users = User::all();
        return view('markets.index', compact('markets','users'));
    }

    public function create() {
        return view('markets.create');
    }

    public function store(Request $request) {
      $request->validate(['name'=>'required|min:4|max:100|' , 'description' => 'required|min:10' ]);
      if ($request->hasFile('file')) {
        $file = $request->file('file');
        $name = $file->getClientOriginalName();
        $file->move(base_path('/storage/app/public'),$file->getClientOriginalName());
      }
      $market = new Market;
      $market->name = $request->input('name');
      $market->location = $request->input('location');
      $market->start_Time = $request->input('startTime');
      $market->close_Time = $request->input('closeTime');
      $market->day = "ds";
      $market->organizer_name = $request->input('organizer_name');
      $market->contact_name = $request->input('contact_name');
      $market->email = $request->input('email');
      $market->phone = $request->input('phone');
      $market->description = $request->input('description');
      $market->teaser = $request->input('teaser');
      $market->created_by = 1;
      // image
      // map

      $market->save();
      return redirect('/create/'.$market->id);
    }

    public function show(Market $market) {
      return view('markets.show',['market'=>$market]);
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
