<?php

class Auth extends CI_Controller {

    public function Login()
    {
        $this->form_validation->set_rules('username','Username','required',['required' => 'Username wajib diisi']);
        $this->form_validation->set_rules('password','Password','required',['required' => 'Password wajib diisi']);
        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/Header');
            $this->load->view('Form_login');
            $this->load->view('templates/Footer');

        } else {
            $auth = $this->Model_auth->Cek_login();
            if($auth == FALSE)
            {
                $this->session->set_flashdata('pesan','<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Username dan Password anda salah!
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
              </div>');
              
              redirect('Auth/Login');
            } else {
                $this->session->set_userdata('username',$auth->username);
                $this->session->set_userdata('role_id',$auth->role_id);

                switch($auth->role_id){
                    case 1 : redirect('admin/Dashboard_admin'); 
                    break;
                    case 2 : redirect('Dashboard');
                    break;
                    default : break;
                }
            }
        }
    }
}