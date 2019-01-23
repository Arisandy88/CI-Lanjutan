<?php
defined('BASEPATH') OR EXIT('No direct script access allowed');

class login_model extends CI_Model {
    
public function get_login()
{
    return $this->db->where('username',$this->input->post('username'))
    ->where ('password',$this->input->post('password'))
    ->get('admin');
}
}