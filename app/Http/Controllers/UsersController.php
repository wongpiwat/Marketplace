<?php

namespace App\Http\Controllers;
use PDF;
use DB;
use Carbon\Carbon;
use App\User;
use App\Log;
use Auth;
use Illuminate\Http\Request;

class UsersController extends Controller {

    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $this->authorize('viewAll', User::class);

      $users = User::whereNull('deleted_at')->orderBy('updated_at','desc')->paginate(10);
      return view('users.index', ['users' => $users]);
    }

    public function create() {
      $this->authorize('create', User::class);

      $type = ['seller' => 'Seller',
              'organizer' => 'Organizer'];
      return view('users.create', compact('type'));
    }


    public function store(Request $request) {
      $this->authorize('create', User::class);

      $request->validate(['email'=>'required|min:5|max:100|unique:users,email' ,
       'password' => 'required|min:6',
       'location' => 'required|min:1',
        'first_name'=> 'required|min:1',
         'last_name' => 'required|min:1',
          'address'=> 'required|min:1',
       'birthday' => 'required',
        'phone'=> 'required|min:10|max:10',
         'type' => 'required']);

      $user = new User;
      $user->email = $request->input('email');
      $user->password = \Hash::make($request->input('password'));
      $user->first_name = $request->input('first_name');
      $user->last_name = $request->input('last_name');
      $user->address = $request->input('address');
      $user->birthday = $request->input('birthday');
      $user->phone = $request->input('phone');
      $user->type = $request->input('type');
      $user->is_enabled = true;
      $user->is_vertified = true;
      $user->save();

      return redirect('/users/'.$user->id);
    }

    public function show(User $user) {
      return view('users.show', ['user' => $user]);
    }

    public function edit(User $user) {
      $this->authorize('update', $user);

      $type = ['seller' => 'Seller', 'organizer' => 'Organizer', 'administrator' => 'Administrator'];
      return view('users.edit', compact('user', 'type'));
    }

    public function update(Request $request, User $user) {
      $this->authorize('update', $user);

      $request->validate([
        'first_name'=> 'required|min:1',
         'last_name' => 'required|min:1',
          'address'=> 'required|min:1',
        'phone'=> 'required|min:10|max:10']);

      $user->first_name = $request->input('first_name');
      $user->last_name = $request->input('last_name');
      $user->address = $request->input('address');
      $user->phone = $request->input('phone');
      $user->save();

      $log = new Log;
      $log->topic = 'EDIT USER';
      $log->event = 'USER: '.$user->first_name.' '.$user->last_name;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/users/'.$user->id);
    }

    public function destroy(User $user) {
      $this->authorize('ban', $user);

      // $user->delete();
      $log = new Log;
      if($user->is_enabled){
        $user->is_enabled = false;
        $log->topic = 'BAN USER';
      } else {
        $user->is_enabled = true;
        $log->topic = 'UNBAN USER';
      }
      $user->save();

      $log->event = 'USER: '.$user->first_name.' '.$user->last_name;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/users/'.$user->id);
    }

    public function setting() {
      // $this->authorize('update', $user);

      return view('users.settings');
    }

    public function updateSetting(Request $request) {
      // $this->authorize('update', $user);

      $request->validate([
        'first_name'=> 'required|min:1',
         'last_name' => 'required|min:1',
          'address'=> 'required|min:1',
        'phone'=> 'required|min:10|max:10']);

      $id_user = \Auth::user()->id;
      $user = \Auth::user();
      if ($request->hasFile('img_files')) {
        $file = $request->file('img_files');
        $mytime = Carbon::now();
        $path = 'img_files_'.$file->getClientOriginalName();
        $file->move(base_path('/storage/app/public/users/'.$id_user.'/profile'),$path);
        $user->image = $path;
        $user->save();
      }
      $user->first_name =  $request->input('first_name');
      $user->last_name =  $request->input('last_name');
      $user->phone =  $request->input('phone');
      $user->address =  $request->input('address');
      $user->save();

      $log = new Log;
      $log->topic = 'EDIT USER';
      $log->event = 'USER: '.$user->first_name.' '.$user->last_name;
      $log->created_by = \Auth::user()->id;
      $log->save();

      return redirect('/profile')->with('alert', 'Your account has been updated!!');
    }

    public function profile() {
      return view('users.profile');
    }

    public function form() {
      $this->authorize('getForm', User::class);

      $create_by = \Auth::user();
      $users = User::all();
      $pdf = PDF::loadView('users.form', compact('markets','users','create_by'));
      return $pdf->stream();
    }

    public function search(Request $request) {
      $str = $request->str;
      if(Auth::user()->type=="administrator"){
        $users = DB::table('users')->where('first_name','like','%'.$str.'%')->
        orWhere('last_name','like','%'.$str.'%')->paginate(10);
      }
      return view('users.index',compact('users'));
    }
}
