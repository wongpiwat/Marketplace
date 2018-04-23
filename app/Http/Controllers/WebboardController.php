<?php

namespace App\Http\Controllers;

use App\Webboard;
use App\WebboardReply;
use Illuminate\Http\Request;
use DB;
class WebboardController extends Controller {

    public function index($id) {
        // $webboard = Webboard::findOrFail($id);
    //    $webboard = Webboard::all($id);

    $webboard = DB::table('webboards')->where('market_id', $id)->get(); 
    $nameEvent = DB::table('markets')->where('id', $id)->value('name'); 
    $id_market = DB::table('markets')->where('id', $id)->value('id'); 
    return view('webboards.index', ['webboards' => $webboard,'nameEvent' => $nameEvent,'id_market' => $id_market ]);
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
        $webboard = new  Webboard;
        $webboard->market_id =$request->input('id');  
        $webboard->topic = $request->input('name');        
        $webboard->details =$request->input('description');
        $webboard->created_by= "1";
        $webboard->save();

        return redirect('/webboard/'.$request->input('id'));
    }

    public function show($id,Webboard $webboard) {
        $reply = DB::table('webboard_replies')->where('reply_to', $webboard->id)->get(); 
        return view('webboards.show',['webboard' => $webboard,'reply' => $reply,'id' => $id]);
    }

    public function edit(Webboard $createMarket) {

    }
    public function addComment($id,Webboard $webboard,Request $request){
        $webboard_reply= new  WebboardReply;
        $reply = DB::table('webboard_replies')->where('reply_to', $webboard->id)->get(); 
        $webboard_reply->comment =$request->input('comment');
        // $webboard_reply->comment ='asasa';
        $webboard_reply->created_by = "1";
        $webboard_reply->reply_to = $webboard->id;
        $webboard_reply->save();
        return redirect('/webboard/'.$id.'/reply/'.$webboard->id);
        // return view('webboards.show',['webboard' => $webboard,'reply' => $reply,'id' => $id]);
    }
    
    public function take() {
        return view('webboards.list');
    }
    public function update(Request $request, Webboard $webboard) {

    }

    public function destroy(Webboard $web) {
        $dir=$web->market_id;
        $web->delete();   
        
        return redirect('/webboard/'.$dir);
    }

    public function destroyReply(Webboard $web) {
        $dir=$web->market_id;
        $web->delete();   
        
        return redirect('/webboard/'.$dir);
    }
}