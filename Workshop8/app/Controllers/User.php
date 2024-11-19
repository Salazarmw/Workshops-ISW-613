<?php

namespace App\Controllers;

use App\Models\ProvinceModel;
use App\Models\UserModel;

class User extends BaseController
{
  private $db;
  private $provinceModel;
  private $userModel;

  public function __construct()
  {
    // $this->userModel = model(User::class);
    $this->db = \Config\Database::connect();
    $this->provinceModel = model(ProvinceModel::class);
    $this->userModel = model(UserModel::class);
  }

  public function signup(): string
  {

    $provinces = $this->provinceModel->findAll();

    $user = isset($_SESSION['user']) ? $_SESSION['user'] : null;
    $error_msg = isset($_GET['error']) ? $_GET['error'] : '';
    $data['user'] = $user;
    $data['error_msg'] = $error_msg;
    $data['provinces'] = $provinces;
    $data['title'] = 'Registro de Usuario - Home';
    return view('shared/header', $data) . view('users/signup', $data) . view('shared/footer');
  }

  public function create()
  {
    $data = [
      'name' => $this->request->getPost('name'),
      'lastname' => $this->request->getPost('last-name'),
      'username'    => $this->request->getPost('email'),
      'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
      'role' => 'admin'
    ];

    $this->userModel->insert($data);
    return view('shared/header', $data) . view('users/signup', $data) . view('shared/footer');
  }
}
