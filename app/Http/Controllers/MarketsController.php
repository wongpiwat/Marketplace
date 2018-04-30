<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Log;
use App\Market;
use App\User;
use App\Zone;
use App\MarketImage;
use App\Reservation;
use App\Webboard;
use App\WebboardReply;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;

class MarketsController extends Controller {

  public function index() {
      if(Auth::user()->type=="administrator"){
          $markets = Market::whereNull('deleted_at')->orderBy('updated_at','desc')->paginate(10);
      }
      elseif (Auth::user()->type=="organizer") {
          $markets = Market::where('created_by','=',Auth::user()->id)->paginate(10);
      } else if (Auth::user()->type=="seller") {
         $markets = DB::table('reservations')
                    ->join('zones','reservations.zone_id','=','zones.id')
                    ->join('markets','zones.market_id','=','markets.id')
                    ->select('markets.id','markets.name','markets.organizer_name','markets.created_by')
                    ->where('reservations.reserved_by','=',Auth::user()->id)
                    ->paginate(10);
      }
      $users = User::all();
      return view('markets.index', compact('markets','users'));
  }

    public function create() {
        return view('markets.create');
    }

    public function store(Request $request) {
      $this->authorize('create', Market::class);

      $request->validate(['name'=>'required|min:4|max:100|' ,
       'description' => 'required|min:10',
       'location' => 'required',
        'latitude'=> 'required',
         'longitude' => 'required',
          'start_day'=> 'required',
       'close_day' => 'required',
        'start_time'=> 'required',
         'close_time' => 'required',
         'market_layout' => 'required',
         'market_screenshot' => 'required',
         'zoneName' => 'required',
      'numberOfZone' => 'required',
      'priceOfZone' => 'required']);

      $market = new Market;
      $market->name = $request->input('name');
      $market->location = $request->input('location');
      $market->start_day = $request->input('start_day');
      $market->close_day = $request->input('close_day');
      $market->start_time = $request->input('start_time');
      $market->close_time = $request->input('close_time');
      $market->organizer_name = $request->input('organizer_name');
      $market->contact_name = $request->input('contact_name');
      $market->email = $request->input('email');
      $market->phone = $request->input('phone');
      $market->description = $request->input('description');
      $split = explode("/", $request->input('teaser'));
      if (sizeof($split) == 3) {
        $market->teaser = $split[3];
      } else {
        $market->teaser = null;
      }
      $market->view = 0;
      $market->created_by = \Auth::user()->id;
      $market->is_enabled = true;
      $market->latitude = $request->input('latitude');
      $market->longitude = $request->input('longitude');
      $market->save();

      $zoneNames = $request->input('zoneName');
      $numberOfZones = $request->input('numberOfZone');
      $priceOfZone = $request->input('priceOfZone');

      for($i = 0; $i < sizeof($zoneNames); $i++){
        $zone = new Zone;
        $zone->market_id = $market->id;
        $zone->name = $zoneNames[$i];
        $zone->price = $priceOfZone[$i];
        $zone->save();

        for($j = 0; $j < $numberOfZones[$i]; $j++){
          $reservaion = new Reservation;
          $reservaion->zone_id = $zone->id;
          $reservaion->number = $j;
          $reservaion->is_paid = false;
          $reservaion->save();
        }
      }

      $mytime = Carbon::now();
      $id_user = \Auth::user()->id;
      $id_market = Market::where('id','>',0)->max('id');

      if ($request->hasFile('market_layout')) {
        $file = $request->file('market_layout');
        $path = 'img_layout_'.$mytime->toDateTimeString().'_'.$file->getClientOriginalName();
        $file->move(base_path('/storage/app/public/users/'.$id_user.'/markets/'.$id_market),$path);
        DB::insert('insert into market_images (market_id, path, type) values (?, ?, ?)', [$id_market, $path, 'layout']);
      }

      if ($request->hasFile('market_screenshot')) {
        $files = $request->file('market_screenshot');
        foreach($files as $file) {
          $path = 'img_screenshot_'.$mytime->toDateTimeString().'_'.$file->getClientOriginalName();
          $file->move(base_path('/storage/app/public/users/'.$id_user.'/markets/'.$id_market),$path);
          DB::insert('insert into market_images (market_id, path, type) values (?, ?, ?)', [$id_market, $path, 'screenshot']);
        }
      }

      $log = new Log;
      $log->topic = 'CREATE MARKET';
      $log->event = 'MARKET: '.$market->name;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/markets/'.$market->id);
    }

    public function show(Market $market) {
      $users = User::all();
      $reservations = [];
      $reserve = null;
      $zones = Zone::where('market_id','=',$market->id)->get();
      foreach($zones as $zone) {
        $reserve = Reservation::where('zone_id','=',$zone->id)->get();
        if (!$reserve->isEmpty()) {
          foreach($reserve as $value) {
            array_push($reservations,$value);
          }
        }
      }
      return view('markets.show',compact('market','reservations','users','zones'));
    }

    public function edit(Market $market) {
        return view('markets.edit',['market'=>$market]);
    }

    public function update(Request $request, Market $market) {
      $this->authorize('update', $market);

      $request->validate(['name'=>'required|min:4|max:100|' ,
       'description' => 'required|min:10',
       'location' => 'required',
        'latitude'=> 'required',
         'longitude' => 'required',
          'start_day'=> 'required',
       'close_day' => 'required',
        'start_time'=> 'required',
         'close_time' => 'required',
         'market_layout' => 'required',
         'market_screenshot' => 'required',
         'zoneName' => 'required',
      'numberOfZone' => 'required',
      'priceOfZone' => 'required']);

      $market->name = $request->input('name');
      $market->location = $request->input('location');
      $market->start_day = $request->input('start_day');
      $market->close_day = $request->input('close_day');
      $market->start_time = $request->input('start_time');
      $market->close_time = $request->input('close_time');
      $market->organizer_name = $request->input('organizer_name');
      $market->contact_name = $request->input('contact_name');
      $market->email = $request->input('email');
      $market->phone = $request->input('phone');
      $market->description = $request->input('description');
      if ($request->input('teaser')) {
        $split = explode("/", $request->input('teaser'));
        $market->teaser = $split[3];
      }

      $market->view = 0;
      $market->is_enabled = true;
      $market->latitude = $request->input('latitude');
      $market->longitude = $request->input('longitude');

      foreach ($market->marketImages as $image) {
        $image->delete();
      }

      $mytime = Carbon::now();
      $id_user = \Auth::user()->id;
      $id_market = Market::where('id','>',0)->max('id');

      if ($request->hasFile('market_layout')) {
        $file = $request->file('market_layout');
        $path = 'img_layout_'.$mytime->toDateTimeString().'_'.$file->getClientOriginalName();
        $file->move(base_path('/storage/app/public/users/'.$id_user.'/markets/'.$id_market),$path);
        DB::insert('insert into market_images (market_id, path, type) values (?, ?, ?)', [$id_market, $path, 'layout']);
      }

      if ($request->hasFile('market_screenshot')) {
        $files = $request->file('market_screenshot');
        foreach($files as $file) {
          $path = 'img_screenshot_'.$mytime->toDateTimeString().'_'.$file->getClientOriginalName();
          $file->move(base_path('/storage/app/public/users/'.$id_user.'/markets/'.$id_market),$path);
          DB::insert('insert into market_images (market_id, path, type) values (?, ?, ?)', [$id_market, $path, 'screenshot']);
        }
      }

      $market->save();

      $zoneNames = $request->input('zoneName');
      $numberOfZones = $request->input('numberOfZone');
      $priceOfZone = $request->input('priceOfZone');

      for($i = 0; $i < sizeof($zoneNames); $i++){
        if ($i >= sizeof($market->zones)){
          $zone = new Zone;
          $zone->market_id = $market->id;
          $zone->name = $zoneNames[$i];
          $zone->price = $priceOfZone[$i];
          $zone->save();
        } else {
          $market->zones[$i]->name = $zoneNames[$i];
          $market->zones[$i]->price = $priceOfZone[$i];
          $market->zones[$i]->save();
        }
        for($j = 0; $j < $numberOfZones[$i]; $j++){
          if ($i >= sizeof($market->zones)){
            $reservaion = new Reservation;
            $reservaion->zone_id = $zone->id;
            $reservaion->number = $j;
            $reservaion->is_paid = false;
            $reservaion->save();
          } else {
            if ($j >= sizeof($market->zones[$i]->reservations)){
              $reservaion = new Reservation;
              $reservaion->zone_id = $market->zones[$i]->id;
              $reservaion->number = $j;
              $reservaion->is_paid = false;
              $reservaion->save();
            } else {
              $market->zones[$i]->reservations[$j]->number = $j;
              $market->zones[$i]->reservations[$j]->save();
            }
          }
        }
      }

      $log = new Log;
      $log->topic = 'EDIT MARKET';
      $log->event = 'MARKET: '.$market->name;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/markets/'.$market->id);
    }

    public function destroy(Market $market) {
      $this->authorize('delete', $market);
        $market->delete();
        return redirect('/markets');
    }

    public function page(Market $market) {
      DB::table('markets')->where('id', '=', $market->id)->increment('view');
      $count = 0;
      $layout = MarketImage::where('market_id','=', $market->id)->Where('type','=','layout')->get();
      $screenshots = MarketImage::where('market_id','=', $market->id)->Where('type','=','screenshot')->get();
      return view('markets.page',compact('market','layout','screenshots','count'));
    }

    public function form() {
      $this->authorize('getForm', Market::class);

      $create_by = \Auth::user();
      $markets = Market::all();
      $users = User::all();
      $pdf = PDF::loadView('markets.form', compact('markets','users','create_by'));
      return $pdf->stream();
    }

    public function search(Request $request) {
      $str = $request->str;
      $users = User::all();
      if(Auth::user()->type=="administrator"){
        $markets = DB::table('markets')->where('name','like','%'.$str.'%')->paginate(10);
      } else{
        $markets =  DB::table('markets')->where('is_enabled', '=', '1')->where(function ($query) use ($str) {
          $query->where('name','like','%'.$str.'%');
        })->paginate(10);
      }
      return view('markets.index',compact('markets','users'));
    }

    public function reservationsForm(Market $market) {
      $this->authorize('getForm', Market::class);

      $users = User::all();
      $reservations = [];
      $reserve = null;
      $zones = Zone::where('market_id','=',$market->id)->get();
      foreach($zones as $zone) {
        $reserve = Reservation::where('zone_id','=',$zone->id)->get();
        if (!$reserve->isEmpty()) {
          foreach($reserve as $value) {
            array_push($reservations,$value);
          }
        }
      }
      $pdf = PDF::loadView('Reservations.form', compact('reservations','users','markets','zones'));
      return $pdf->stream();
    }

    public function support(Market $market){
      $webboards = Webboard::where('market_id', $market->id)->get();
      return view('markets.support',['market'=> $market,'webboards'=>$webboards]);
    }

    public function supportShow(Market $market,Webboard $webboard){
      $replys = WebboardReply::where('reply_to', $webboard->id)->get();
      return view('markets.supportReply',['market'=> $market,'webboard'=>$webboard,'replys' => $replys]);
    }

    public function deleteZone(Market $market, Zone $zone){
      $this->authorize('delete', $market);

      $zone->delete();
      return redirect('/markets/'. $market->id .'/edit');
    }

    public function cancelReservation(Market $market, Reservation $reservation){
      $this->authorize('update', $reservation);

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
