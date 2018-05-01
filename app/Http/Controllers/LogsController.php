<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Log;
use App\User;
use PDF;

class LogsController extends Controller {

  public function __construct() {
    $this->middleware('auth');
  }

    public function index() {
      $this->authorize('viewAll', Log::class);

      $logs = Log::whereNull('deleted_at')->orderBy('updated_at','desc')->paginate(10);
      $users = User::all();
      return view('logs.index', compact('logs','users'));
    }

    public function create() {
        //
    }

    public function store(Request $request) {
        //
    }

    public function show(Log $log) {
      $this->authorize('view', $log);

      $users = User::all();
      return view('logs.show',compact('log','users'));
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

    public function form() {
      $this->authorize('getForm', Log::class);

      $create_by = \Auth::user();
      $logs = Log::all();
      $users = User::all();
      $pdf = PDF::loadView('logs.form', compact('logs','users','create_by'));
      return $pdf->stream();
    }

    public function search(Request $request) {
      $this->authorize('getForm', Log::class);

      $str = $request->str;
      $users = User::all();
      $logs = DB::table('logs')
              ->join('users','logs.created_by','=','users.id')
              ->select('logs.id','logs.topic','logs.created_by','logs.event','logs.created_at')
              ->where('users.first_name','like','%'.$str.'%')
              ->orWhere('users.last_name','like','%'.$str.'%')
              ->orWhere('logs.event','like','%'.$str.'%')
              ->orWhere('logs.created_at','like','%'.$str.'%')
              ->paginate(10);
      return view('logs.index',compact('logs','users'));
    }
}
