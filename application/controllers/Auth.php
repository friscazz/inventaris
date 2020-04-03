<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

     /**
      * Index Page for this controller.
      *
      * Maps to the following URL
      * 		http://example.com/index.php/welcome
      *	- or -
      * 		http://example.com/index.php/welcome/index
      *	- or -
      * Since this controller is set as the default controller in
      * config/routes.php, it's displayed at http://example.com/
      *
      * So any other public methods not prefixed with an underscore will
      * map to /index.php/welcome/<method_name>
      * @see https://codeigniter.com/user_guide/general/urls.html
      */

     public function index()
     {
          $this->form_validation->set_rules('username', 'username', 'required');
          $this->form_validation->set_rules('password', 'password', 'required');
          if ($this->form_validation->run() == FALSE) {
               $this->load->view('login');
          } else {
               $this->loadlogin();
          }
     }
     
     public function loadlogin()
     {
               $post = $this->input->post(null, TRUE);
               $this->load->model('auth_m');
               $query = $this->auth_m->cek_login($post);
               if ($query->num_rows() > 0) {
                    $row = $query->row();
                    $sesi = array(
                         'user_id' => $row->id,
                         'username' => $row->username,
                    );
                    $this->session->set_userdata($sesi);
                    redirect(base_url('inventaris/dashboard'));
               } else {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                            Password dan Username Tidak Ada!
                                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                            </button>
                                                            </div>');
               }
     }
     public function logOut(){
          $this->session->sess_destroy();
          redirect(base_url());
     }
    
}
