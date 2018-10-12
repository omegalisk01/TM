<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class AccountsModel extends CI_Model
{
  public function signup($data){
    return $this->db->insert('users',$data);
  }

  public function edit($data, $username){
  	$where = "username ='".$username."'";
    return $this->db->update('users',$data, $where);
  }

  public function find_user($user){
    return $this->db->get_where('users',['username'=>$user]);
  }

}
?>
