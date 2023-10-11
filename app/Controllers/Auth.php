<?php

namespace App\Controllers;

class Auth extends BaseController
{
  public function index()
  {
    $data = [
      'title' => "Login | Auth",
    ];
    return view('Auth/index', $data);
  }
  public function Registration()
  {
    $data = [
      'title' => "Registration | Auth"
    ];
    return view('Auth/Registration', $data);
  }
  public function ForgotPassword()
  {
    $data = [
      'title' => "Forgot Password | Auth"
    ];
    return view('Auth/Forgot_password', $data);
  }
}
