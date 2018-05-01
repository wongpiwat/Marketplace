<?php

namespace App\Http\Controllers;

use App\Webboard;
use App\User;
use App\Log;
use App\Market;
use App\WebboardReply;
use Illuminate\Http\Request;
use DB;
class WebboardsController extends Controller {

    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $type = ['general'=>'general', 'problems'=>'problems', 'markets'=>'markets'];
      $pointType='all';
      $webboard = Webboard::whereNull('deleted_at')->orderBy('updated_at','desc')->paginate(10);
      return view('webboards.index', ['webboards' => $webboard ,'type' => $type,'pointType' =>$pointType ]);
    }

    public function create($id_market) {
      $nameEvent = DB::table('markets')->where('id', $id_market)->value('name');
      return view('webboards.create',['nameEvent'=>$nameEvent,'id_market'=> $id_market]);
    }

    public function store(Request $request) {
      $request->validate(['name'=>'required|min:4|max:100|' , 'description' => 'required']);
      $webboard = new Webboard;
      $webboard->type = $request->input('type');
      $webboard->topic = $request->input('name');
      $webboard->details = $request->input('description');
      $webboard->created_by = \Auth::user()->id;
      $webboard->save();

      $log = new Log;
      $log->topic = 'CREATE TOPIC';
      $log->event = $webboard->topic .', TYPE: '.$webboard->type.', DETAILS: '.$webboard->details;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/webboards/'.$webboard->id);
    }

    public function show(Webboard $webboard) {
        $replys = WebboardReply::where('reply_to', $webboard->id)->get();
        return view('webboards.show',['webboard' => $webboard,'replys' => $replys]);
    }

    public function edit(Webboard $createMarket) {

    }
    public function editComment(Request $request, Webboard $webboard){
      // $this->authorize('update', $webboard);

        $request->validate(['commentEdit' => 'required|min:1|max:100|']);
        // dd($request->input('point'));
        $idComment=$request->input('point');
        $newComment =$request->input('commentEdit');


        DB::table('webboard_replies')->where('id', $idComment)->update(['comment' => $newComment]);

        $log = new Log;
        $log->topic = 'EDIT COMMENT';
        $log->event = 'TOPIC: '.$webboard->topic .', COMMENT: '.$newComment;
        $log->created_by = \Auth::user()->id;
        $log->save();

        return redirect('/webboards/'.$webboard->id);
    }

    public function editTopic(Webboard $webboard,Request $request){
      $this->authorize('update', $webboard);

        $request->validate(['topicEdit'=>'required|min:4|max:100|' , 'detailsEdit' => 'required|min:10']);
        $webboard->topic = $request->input('topicEdit');
        $webboard->details =$request->input('detailsEdit');
        $webboard->save();

        $log = new Log;
        $log->topic = 'EDIT TOPIC: ';
        $log->event = $webboard->topic .', TYPE: '.$webboard->type.', DETAILS: '.$webboard->details;
        $log->created_by = \Auth::user()->id;
        $log->save();

        return redirect('/webboards/'.$webboard->id);
    }

    public function addComment(Webboard $webboard,Request $request){
        $request->validate(['comment'=>'required']);
        $webboard_reply = new WebboardReply;
        $webboard_reply->comment =$request->input('comment');
        $webboard_reply->created_by = \Auth::user()->id;
        $webboard_reply->reply_to = $webboard->id;
        $webboard_reply->save();

        $log = new Log;
        $log->topic = 'CREATE COMMENT';
        $log->event = 'TOPIC: '.$webboard->topic .', TYPE: '.$webboard->type.', COMMENT: '.$webboard_reply->comment;
        $log->created_by = \Auth::user()->id;
        $log->save();

        return redirect('/webboards/'.$webboard->id);
    }

    public function update(Request $request, Webboard $webboard) {

    }

    public function destroy(Webboard $webboard) {
      $this->authorize('delete', $webboard);

        $webboard->delete();

        $log = new Log;
        $log->topic = 'DELETE TOPIC';
        $log->event = $webboard->topic .', TYPE: '.$webboard->type;
        $log->created_by = \Auth::user()->id;
        $log->save();

        return redirect('/webboards/');
    }


    public function destroyComment(Webboard $webboard,WebboardReply $webboardReply){
      // $this->authorize('deleteReply', $webboardReply);

        $webboardReply->delete();

        $log = new Log;
        $log->topic = 'DELETE COMMENT';
        $log->event = 'TOPIC: '.$webboard->topic.', COMMENT: '.$webboardReply->comment;
        $log->created_by = \Auth::user()->id;
        $log->save();

        return redirect('/webboards/'.$webboard->id);
    }

    public function general(Webboard $webboard){
        $pointType='general';
        $type = ['general'=>'general', 'problems'=>'problems', 'markets'=>'markets'];

    $webboard = Webboard::where('type', 'general')->orderBy('updated_at','desc')->paginate(10);
    return view('webboards.index', ['webboards' => $webboard ,'type' => $type,'pointType' =>$pointType ]);
    }

    public function markets(Webboard $webboard){
        $pointType='markets';
        $type = ['general'=>'general', 'problems'=>'problems', 'markets'=>'markets'];

    $webboard = Webboard::where('type', 'markets')->paginate(10);
    return view('webboards.index', ['webboards' => $webboard ,'type' => $type,'pointType' =>$pointType ]);
    }

    public function problems(Webboard $webboard){
        $type = ['general'=>'general', 'problems'=>'problems', 'markets'=>'markets'];
        $pointType='problems';
        $webboard = Webboard::where('type', 'problems')->paginate(10);
    return view('webboards.index', ['webboards' => $webboard ,'type' => $type,'pointType' =>$pointType ]);
    }

    public function search(Request $request) {
      $str = $request->str;
      $type = ['general'=>'general', 'problems'=>'problems', 'markets'=>'markets'];
      $pointType='all';
      $webboards = DB::table('webboards')->where('topic','like','%'.$str.'%')->paginate(10);
      return view('webboards.index',compact('webboards','pointType','type'));
    }

    public function storeSupport(Request $request,Market $market){
      // $this->authorize('delete', $webboard);

      $request->validate(['name'=>'required|min:4|max:100|' , 'description' => 'required']);
      $webboard = new Webboard;
      $webboard->topic = $request->input('name');
      $webboard->details = $request->input('description');
      $webboard->market_id = $market->id ;
      $webboard->created_by = \Auth::user()->id;
      $webboard->save();

      $log = new Log;
      $log->topic = 'CREATE Q&A';
      $log->event = 'Market: '.$market->name.', TOPIC: '.$request->input('name').', DETAILS: '.$request->input('description');  ;
      $log->created_by = \Auth::user()->id;
      $log->save();
      return redirect('/support/'.$market->id);
    }

    public function destroySupport(Webboard $webboard,Market $market) {
      $webboard->delete();

      $log = new Log;
      $log->topic = 'DELETE Q&A';
      $log->event = 'TOPIC: '.$webboard->topic ;
      $log->created_by = \Auth::user()->id;
      $log->save();
      return redirect('/support/'.$market->id);
    }

    public function addReplySupport(Market $market,Webboard $webboard,Request $request){
      $request->validate(['comment'=>'required']);
      $webboard_reply = new WebboardReply;
      $webboard_reply->comment =$request->input('comment');
      $webboard_reply->created_by = \Auth::user()->id;
      $webboard_reply->reply_to = $webboard->id;
      $webboard_reply->save();

      $log = new Log;
      $log->topic = 'CREATE Q&A COMMENT';
      $log->event = 'MARKET: '.$market->name.', COMMENT: '.$request->input('comment') ;
      $log->created_by = \Auth::user()->id;
      $log->save();
      return redirect('/support/'.$market->id.'/'.$webboard->id);
    }

    public function editTopicSupport(Market $market,Webboard $webboard,Request $request){
      $this->authorize('update', $webboard);

      $request->validate(['topicEdit'=>'required' , 'detailsEdit' => 'required']);
      $webboard->topic = $request->input('topicEdit');
      $webboard->details =$request->input('detailsEdit');
      $webboard->save();

      $log = new Log;
      $log->topic = 'EDIT Q&A TOPIC';
      $log->event = 'MARKET: '.$market->name.', TOPIC: '.$request->input('topicEdit').', COMMENT: '.$request->input('detailsEdit') ;
      $log->created_by = \Auth::user()->id;
      $log->save();
      return redirect('/support/'.$market->id.'/'.$webboard->id);
    }

    public function editCommentSupport(Market $market,Webboard $webboard,Request $request){
      $this->authorize('update', $webboard);

      $request->validate(['commentEdit' => 'required']);
      $idComment=$request->input('pointComment');
      $newComment =$request->input('commentEdit');
      DB::table('webboard_replies')->where('id', $idComment)->update(['comment' => $newComment]);

      $log = new Log;
      $log->topic = 'EDIT Q&A COMMENT';
      $log->event = 'MARKET: '.$market->name.', TOPIC: '.$webboard->topic.', COMMENT: '.$request->input('commentEdit') ;
      $log->created_by = \Auth::user()->id;
      $log->save();
      return redirect('/support/'.$market->id.'/'.$webboard->id);
    }

    public function destroySupportComment(Webboard $webboard,Market $market,WebboardReply $webboardReply){
      $this->authorize('delete', $webboard, $webboardReply);
      $webboardReply->delete();
      $log = new Log;
      $log->topic = 'DELETE Q&A';
      $log->event = 'MARKET: '.$market->name.', COMMENT: '. $webboardReply->comment;
      $log->created_by = \Auth::user()->id;
      $log->save();
      return redirect('/support/'.$market->id.'/'.$webboard->id);
    }
}
