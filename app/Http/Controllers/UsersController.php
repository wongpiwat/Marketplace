<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UsersController extends Controller {
    public function index() {
      $users = User::all();
      return $users;
    }

    public function show($id) {
      $users = User::findOrFail($id);
      return $users;
    }

    public function showName($name) {
        return 'Name: '.$name;
    }

    public function showWelcome($name) {
        return view('welcome');
    }
}
