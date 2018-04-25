<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller {

    public function __construct() {
      $this->middleware('auth');
    }

    public function index() {
      $users = User::all();
      return view('users.index', ['users' => $users]);
    }

    public function create() {

    }


    public function store(Request $request) {

    }

    public function show(User $user) {
      return view('users.show', ['user' => $user]);
    }

    public function edit(User $user) {


    }

    public function update(Request $request, User $user) {

    }

    public function destroy(User $user) {
      $user->delete();
      return redirect('/users');
    }

}
