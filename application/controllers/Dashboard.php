<?php

class Dashboard extends CI_Controller {
    public function index()
    {
        $data['Barang'] = $this->Model_barang->Tampil_data()->result();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('Dashboard', $data);
        $this->load->view('templates/Footer');

    }

    public function Tambah_ke_keranjang($id)
    {
        $Barang = $this->Model_barang->find($id);

        $data = array(
            'id'      => $Barang->id_barang,
            'qty'     => 1,
            'price'   => $Barang->harga,
            'name'    => $Barang->nama_barang
    );
    
    $this->cart->insert($data);
    redirect('Dashboard');
    }

    public function Detail_keranjang()
    {
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('Keranjang');
        $this->load->view('templates/Footer');
    }

    public function Hapus_keranjang()
    {
        $this->cart->destroy();
        redirect('Dashboard/index');
    }

    public function Pembayaran()
    {
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('Pembayaran');
        $this->load->view('templates/Footer');
    }

    public function Proses_pesanan()
    {
        $is_processed = $this->Model_invoice->index();
        if($is_processed) {
        $this->cart->destroy();
        $this->load->view('templates/Header');
        $this->load->view('templates/Sidebar');
        $this->load->view('Proses_pesanan');
        $this->load->view('templates/Footer');
    } else {
        echo "Maaf, Pesanan anda gagal diproses!";
    }
}

public function Detail($id_barang)
{
    $data['Barang'] = $this->Model_barang->Detail_barang($id_barang);
    $this->load->view('templates/Header');
    $this->load->view('templates/Sidebar');
    $this->load->view('Detail_barang', $data);
    $this->load->view('templates/Footer');
    
}


}