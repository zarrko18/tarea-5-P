<?php

  // file: controllers/LoginController.php
  require_once('models/UserModel.php');

  class LoginController extends Controller {

    public function showLoginForm() {
      return view('login',
        ['error'=>false,'login'=>Auth::check()]);
    }

    public function login() {
      $email = Input::get('email');   
      $password = Input::get('password');
      if (Auth::attempt(['email' => $email,
        'password' => $password])) {
        return redirect('/');
      }
      return redirect('/loginFails');
    }

    public function loginFails() {
      return view('login',
        ['error'=>true,'login'=>Auth::check()]);
    }

    public function logout() {
      Auth::logout();
      return redirect('/');
    }
  }
?>