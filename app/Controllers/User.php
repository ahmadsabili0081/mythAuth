<?php

namespace App\Controllers;

use App\Models\User_model;

class User extends BaseController
{
  protected $UserModel;
  public function __construct()
  {
    helper(['form', 'url']);
    $this->UserModel = new User_model();
  }
  public function index()
  {
    $data = [
      'title' => "Dashboard | User",
      'userDetail' => $this->UserModel->getAllUsers(user()->username),
    ];
    return view('Home/User/index', $data);
  }
  public function Edit($data)
  {
    $data = [
      'title' => "Halaman Edit User",
      'userDetail' => $this->UserModel->getAllUsers($data),
      'errors' => session()->getFlashdata('errors') ?? \Config\Services::validation(),
    ];
    return view('Home/User/Edit', $data);
  }
  public function save($data)
  {
    if (!$this->validate([
      'email' => [
        'rules'  => 'required|max_length[30]',
        'errors' => [
          'required' => 'Kolom Email Harus Terisi!',
        ],
      ],
      'username' => [
        'rules'  => 'required|max_length[30]',
        'errors' => [
          'required' => 'Kolom Username Harus Terisi!',
        ],
      ],
      'fullname' => [
        'rules'  => 'required|max_length[30]',
        'errors' => [
          'required' => 'Kolom Fullname Harus Terisi!',
        ],
      ],
      'userImage' => [
        'rules'  => 'max_size[userImage,2048]|mime_in[userImage,image/png,image/jpg,image/jpeg]',
        'errors' => [
          'max_size' => "Gambar Minimal Max 2 MB!",
          'mime_in' => "Kolom Gambar Bukan Bertipe JPG/PNG/JPEG !"
        ],
      ],
    ])) {
      session()->setFlashdata('errors', $this->validator->getErrors());
      return redirect()->to('/User/Edit/' . ($this->request->getPost('username') == null ? $this->request->getPost('usernameHidden') : $this->request->getPost('username')))->withInput();
    } else {

      $fileGambar = $this->request->getFile('userImage');
      if ($fileGambar->getError() == 4) {
        $namaGambar = $this->request->getPost('userImageHidden');
      } else {
        $namaGambar = $fileGambar->getRandomName();
        $fileGambar->move('images/profile/', $namaGambar);
        if ($namaGambar != 'default.svg') {
          if ($this->request->getPost('userImageHidden') !== 'default.svg') {
            unlink('images/profile/' . $this->request->getPost('userImageHidden'));
          }
        }
      }
      $data = [
        'id' => $this->request->getPost('userid'),
        'email' => $this->request->getPost('email'),
        'username' => $this->request->getPost('username'),
        'fullname' => $this->request->getPost('fullname'),
        'userImage' => $namaGambar,
      ];
      $this->UserModel->save($data);
      session()->setFlashdata('pesan', 'Data Berhasil Di Edit!');
      return redirect()->to('/User');
    }
  }
}
