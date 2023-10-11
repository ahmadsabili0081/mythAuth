<?php

namespace App\Controllers;

use \App\Models\User_model;

class Admin extends BaseController
{
  protected  $userModel;
  public function __construct()
  {
    helper(['form', 'url']); // Aktifkan helper 'form' dan 'url'
    $this->userModel = new User_model();
  }
  public function index()
  {
    $data = [
      'title' => "Dashboard Admin",
      'userAll' => $this->userModel->getAllUsers(),
    ];
    return view('admin/index', $data);
  }
  public function Detail($nama)
  {
    $data = [
      'title' => "Halaman Detail",
      'userDetail' => $this->userModel->getAllUsers($nama)
    ];
    if (empty($data['userDetail'])) {
      redirect()->to('/Admin');
    }
    return view('admin/detail', $data);
  }
  public function Edit($data)
  {
    $data = [
      'title' => "Halaman Edit User",
      'userDetail' => $this->userModel->getAllUsers($data),
      'errors' => session()->getFlashdata('errors') ?? \Config\Services::validation(),
    ];
    return view('Admin/edit', $data);
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
      return redirect()->to('/Admin/Edit/' . ($this->request->getPost('username') == null ? $this->request->getPost('usernameHidden') : $this->request->getPost('username')))->withInput();
    } else {
      $file = $this->request->getFile('userImage');
      if ($file->getError() == 4) {
        $namaGambar = $this->request->getPost('userImageHidden');
      } else {
        $namaGambar = $file->getRandomName();
        $file->move('images/profile/', $namaGambar);
        if ($this->request->getPost('userImageHidden') !== 'default.svg') {
          unlink('images/profile/' . $this->request->getPost('userImageHidden'));
        }
      }
      $this->userModel->save([
        'id' => $this->request->getPost('userid'),
        'email' => $this->request->getPost('email'),
        'username' => $this->request->getPost('username'),
        'fullname' => $this->request->getPost('fullname'),
        'userImage' => $namaGambar
      ]);
      session()->setFlashdata('pesan', 'Data Berhasil Di Update');
      return redirect()->to('/Admin');
    }
  }
}
