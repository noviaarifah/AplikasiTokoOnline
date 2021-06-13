<?php

class Dashboard_admin extends CI_Controller{
    public function index()
    {
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Dashboard');
        $this->load->view('templates_admin/Footer');


    }
}