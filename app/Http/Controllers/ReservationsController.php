<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use App\Market;
class ReservationsController extends Controller {

    public function index() {
      $reservations = Reservation::all();
      $users = User::all();
      $markets = Market::all();
      return view('reservations.index', compact('reservations','users','markets'));
    }

    public function create() {

    }

    public function store(Request $request) {

    }

    public function show($id) {

    }


    public function edit($id) {
        //
    }

    public function update(Request $request, $id) {
        //
    }

    public function destroy($id) {
        //
    }
}
