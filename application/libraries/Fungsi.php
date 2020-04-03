<?php class Fungsi {
    protected $ci;
     function __construct(){
          $this->ci =& get_instance();
     }
     function user_login(){
          $this->ci->load->model('auth_m');
          $user_id = $this->ci->session->userdata('user_id');
          $user_data = $this->ci->auth_m->get($user_id)->row();
          return $user_data;
     }

}
?>