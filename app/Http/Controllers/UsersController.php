<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {

    public function index() {
      $users = User::all();
      return view('pages.users', ['users' => $users]);
    }

    public function getID($id) {
      $user = User::findOrFail($id);
      return view('pages.user', ['user' => $user]);
    }

    public function getName($name) {
        return 'Name: '.$name;
    }
}
