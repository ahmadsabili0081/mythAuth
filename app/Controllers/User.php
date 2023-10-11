<?php

namespace App\Controllers;

use App\Models\User_model;

class User extends BaseController
{
  protected $UserModel;
  public function __construct()
  {
    $this->UserModel = new User_model();
  }
  public function index()
  {
    $data = [
      'title' => "Dashboard | User"
    ];
    return view('Home/User/index', $data);
  }
}
