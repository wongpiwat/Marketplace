<?php

namespace App\Http\Controllers;

use App\Webboard;
use App\User;
use App\WebboardReply;
use Illuminate\Http\Request;
use DB;
class WebboardController extends Controller {

    public function __construct() {
      $this->middleware('auth');
    }
    
    public function index() {
        // $webboard = Webboard::findOrFail($id);
    //    $webboard = Webboard::all($id);

    $webboard = Webboard::all();
    return view('webboards.index', ['webboards' => $webboard ]);
    }

    public function create($id_market) {
        // $view_status=[
        //     'public' => 'Public',
        //     'private' => 'Private'
        // ];

        $nameEvent = DB::table('markets')->where('id', $id_market)->value('name');

        return view('webboards.create',['nameEvent'=>$nameEvent,'id_market'=> $id_market]);
    }

    public function store(Request $request) {
        // $request->validate(['topic'=>'required|min:4|max:255','details|min:10'=>'required']);

        $webboard = new Webboard;
        $webboard->topic = $request->input('name');
        $webboard->details = $request->input('description');
        $webboard->created_by = \Auth::user()->id;
        $webboard->save();

        return redirect('/webboards/'.$webboard->id);
    }

    public function show(Webboard $webboard) {
        // $replys = DB::table('webboard_replies')->where('reply_to', $webboard->id)->get();
        $replys = WebboardReply::where('reply_to', $webboard->id)->get();
         return view('webboards.show',['webboard' => $webboard,'replys' => $replys]);
    }

    public function edit(Webboard $createMarket) {

    }
    public function editComment(Webboard $webboard,Request $request){

        $idComment=$request->input('pointComment');

        $newComment =$request->input('commentEdit');


        DB::table('webboard_replies')->where('id', $idComment)->update(['comment' => $newComment]);
        // $webboard_reply = DB::table('webboard_replies')->where('id', $idComment)->first();
        // // $webboard_reply = WebboardReply::where('id', $idComment);
        // $webboard_reply->comment =$request->input('commentEdit');
        // $webboard_reply->save();


        return redirect('/webboards/'.$webboard->id);
    }

    public function editTopic(Webboard $webboard,Request $request){
        $webboard->topic = $request->input('topicEdit');
        $webboard->details =$request->input('detailsEdit');
        $webboard->save();
        return redirect('/webboards/'.$webboard->id);
    }

    public function addComment(Webboard $webboard,Request $request){
        $webboard_reply = new WebboardReply;

        $webboard_reply->comment =$request->input('comment');
        // $webboard_reply->comment ='asasa';
        $webboard_reply->created_by = \Auth::user()->id;
        $webboard_reply->reply_to = $webboard->id;
        $webboard_reply->save();
        return redirect('/webboards/'.$webboard->id);
        // return view('webboards.show',['webboard' => $webboard,'reply' => $reply,'id' => $id]);
    }

    public function take() {
        return view('webboards.list');
    }

    public function update(Request $request, Webboard $webboard) {

    }

    public function destroy(Webboard $webboard) {
        $webboard->delete();
        return redirect('/webboards/');
    }


    public function destroyComment(Webboard $webboard,WebboardReply $webboardReply){
        $webboardReply->delete();
        return redirect('/webboards/'.$webboard->id);
    }
}
