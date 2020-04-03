<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_m extends CI_Model{

     function cek_login($post){
          $this->db->select('*');
          $this->db->from('login');
          $this->db->where('username', $post['username']);
          $this->db->where('password', md5(sha1($post['password'])));
           $query = $this->db->get();
          return $query;
     }
     public function get($id = null)
     {
          $this->db->from('login');
          if ($id != null) {
               $this->db->where('id', $id);
          }
          $query = $this->db->get();
          return $query;
     }
}
