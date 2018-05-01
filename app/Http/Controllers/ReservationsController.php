<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use App\Market;
use App\Zone;
use App\Log;
use App\CheckIn;
use App\MarketImage;
use PDF;

class ReservationsController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

    public function index() {

    }

    public function create(Market $market) {
      $this->authorize('create', Reservation::class);

      $layout = MarketImage::where('market_id','=', $market->id)->Where('type','=','layout')->get();

      $getZones = Zone::where('market_id', '=', $market->id)->get();
      $zones = array();

      for($i = 0; $i < sizeof($getZones); $i++){
        foreach ($getZones[$i]->reservations as $value) {
          if($value->reserved_by == null){
            array_push($zones, $getZones[$i]);
            break;
          }
        }
      }
      return view('reservations.create', compact('market', 'zones','layout'));
      }

    public function store(Request $request) {

    }

    public function show(Market $market, Reservation $reservation) {
      $this->authorize('view', $market, $reservation);
      return view('reservations.show',compact('reservation','market'));
    }


    public function edit(Reservation $reservation) {
        //
    }

    public function update(Request $request, Reservation $reservation) {
      $this->authorize('reserve', $reservation);

      $reservation->reserved_by = \Auth::user()->id;
      $reservation->save();

      $log = new Log;
      $log->topic = 'RESERVATION';
      $log->event = 'ID:'.$reservation->id;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/markets');
    }

    public function destroy(Reservation $reservation) {
        //
    }

    public function payReservation(Request $request, Market $market, Reservation $reservation){
      $this->authorize('reserve', $reservation);

      $reservation->is_paid = true;
      $reservation->save();

      return redirect('/markets/'. $market->id);
    }

    public function checkIn(Market $market, Reservation $reservation) {
      return view('reservations.checkin', compact('market','reservation'));
    }

    public function storeCheckIn(Request $request, Market $market, Reservation $reservation) {
      // dd($market);

      $checkIn = new CheckIn();
      $checkIn->reservation_id = $reservation->id;
      $checkIn->path = $request->input('camera-image');
      $checkIn->save();

      $log = new Log;
      $log->topic = 'CHECK IN';
      $log->event = 'ID: '.$reservation->id;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/markets/'.$market->id);

    }

    public function paymentForm(Request $request, Market $market, Reservation $reservation){
      $this->authorize('reserve', $reservation);

      return view('markets.payment', compact('market','reservation'));
    }

    public function cancelReservation(Market $market, Reservation $reservation){
      $this->authorize('update', $reservation, $market);

      $reservation->is_paid = false;
      $reservation->reserved_by = null;
      $reservation->save();

      $log = new Log;
      $log->topic = 'CANCEL RESERVATION';
      $log->event = 'ID: '.$reservation->id;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/markets/'. $market->id);
    }

}
