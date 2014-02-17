<?php

class Authentication_Model extends CI_Model {

    public function __construct()
    {
        $this->load->database(); 
    }
    
    public function login($username, $password) {
        $this->db->select('id','username','password');
        $this->db->from('users');
        $this->db->where('username',$username);
        $this->db->where('password',$password);
        $this->db->limit(1);
        
        return $this->db->get();
    }
    
}

?>