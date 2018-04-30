<?php

namespace App\Http\Controllers;
use DB;
use PDF;
use App\Market;
use App\User;
use App\Feedback;
use App\Log;
use Illuminate\Http\Request;

class FeedbacksController extends Controller {

    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $this->authorize('viewAll', Feedback::class);

      $feedbacks = Feedback::paginate(10);
      $users = User::all();
      return view('feedbacks.index', compact('feedbacks','users'));
    }

    public function create(Request $request) {
      $this->authorize('create', Feedback::class);

      return view('feedbacks.create');
    }


    public function store(Request $request) {
      $this->authorize('create', Feedback::class);

          $request->validate(['topic'=>'required' , 'comment' => 'required']);
          $feedback = new Feedback;
          $feedback->topic = $request->input('topic');
          $feedback->comment = $request->input('comment');
          $feedback->created_by = \Auth::user()->id; ;
          $feedback->save();

          $log = new Log;
          $log->topic = 'CREATE FEEDBACK';
          $log->event = $feedback->topic .', COMMENT: '.$feedback->comment;
          $log->created_by = \Auth::user()->id;
          $log->save();
          return redirect('/feedbacks/create')->with('alert', 'Complete!!');
        }

    public function show(Feedback $feedback) {
      $this->authorize('view', $feedback);

      $users = User::all();
      return view('feedbacks.show', compact('feedback','users'));
    }

    public function edit(Feedback $feedback) {


    }

    public function update(Request $request, Feedback $feedback) {

    }

    public function destroy(Feedback $feedback) {
      $this->authorize('delete', $feedback);


      $feedback->delete();

      $log = new Log;
      $log->topic = 'DELETE FEEDBACK';
      $log->event = $feedback->topic .', COMMENT: '.$feedback->comment;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/feedbacks');
    }

    public function form() {
      $this->authorize('getForm', Feedback::class);


      $create_by = \Auth::user();
      $feedbacks = Feedback::all();
      $users = User::all();
      $pdf = PDF::loadView('feedbacks.form', compact('feedbacks','users','create_by'));
      return $pdf->stream();
    }

    public function search(Request $request) {
      $this->authorize('getForm', Feedback::class);


      $str = $request->str;
      $users = User::all();
     $feedbacks = DB::table('feedbacks')
     ->join('users','feedbacks.created_by','=','users.id')
     ->select('feedbacks.created_by','feedbacks.topic','feedbacks.comment','feedbacks.created_at')
     ->where('users.first_name','like','%'.$str.'%')
     ->orWhere('users.last_name','like','%'.$str.'%')
     ->orWhere('feedbacks.topic','like','%'.$str.'%')
     ->orWhere('feedbacks.created_at','like','%'.$str.'%')
     ->paginate(10);
      return view('feedbacks.index',compact('feedbacks','users'));
    }

}
