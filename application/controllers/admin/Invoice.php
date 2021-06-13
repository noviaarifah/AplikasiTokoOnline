<?php

class Invoice extends CI_Controller{
    public function index()
    {
        $data['Invoice'] = $this->Model_invoice->tampil_data();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Invoice', $data);
        $this->load->view('templates_admin/Footer');
    }

    public function Detail($id_invoice)
    {
        $data['Invoice'] = $this->Model_invoice->Ambil_id_invoice($id_invoice);
        $data['Pesanan'] = $this->Model_invoice->Ambil_id_pesanan($id_invoice);
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Detail_Invoice', $data);
        $this->load->view('templates_admin/Footer');
    }
}