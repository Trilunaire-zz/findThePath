<?php

/**
* @author trilunaire
* @version 1.0
*/
defined('BASEPATH') OR exit('No direct script access allowed');
class UserM extends CI_Model{
  public function __construct(){
    parent::__construct();
    $this->load->database();
  }

  public function connect($userName,$password)
  {
	/* SELECT * FROM _user WHERE username= AND password= */
	return $this->db
				->select('*')
				->from('_users')
				->where('username',$userName)
				->where('password',$password)
				->get()->result_array();
  	}

  public function recordUser($username,$email,$password,$phone)
  {
	  $newUser = array(
		  'username' => $username,
		  'password' => $password,
		  'mail' => $email
	  );
	  if($phone!=null){
		  $newUser['tel'] = $phone;
	  }
	  return $this->db->insert('_users',$newUser);
  }
}
