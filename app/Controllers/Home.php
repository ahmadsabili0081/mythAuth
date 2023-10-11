<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    $data = [
      'title' => "Dashboard | User"
    ];
    return view('Home/User/index', $data);
  }
}
