<?php

namespace App\Models;

use CodeIgniter\Model;

class User_model extends Model
{
  protected $table = 'users';
  protected $primaryKey = 'id';
  protected $useAutoIncrement =  true;
  protected $useTimestamp = true;
  protected $createdField  = true;
  protected $updatedField  = true;
  protected $deletedField  = true;
  protected $allowedFields = ['email', 'username', 'fullname', 'userImage', 'password_hash'];
  public function getAllUsers($nama = false)
  {
    if ($nama == false) {
      $this->select('users.id as userid, userImage,username,email,name');
      $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
      $this->join('auth_groups', 'auth_groups.id  = auth_groups_users.group_id');
      return $this->find();
    } else {
      $this->select('users.id as userid,users .*,auth_groups_users .*,auth_groups.*');
      $this->join('auth_groups_users', 'auth_groups_users.user_id = users.id');
      $this->join('auth_groups', 'auth_groups.id  = auth_groups_users.group_id');
      return $this->where(['username' => $nama])->first();
    }
  }
}
