<?php

class Data_barang extends CI_Controller{
    public function index()
    {
        $data['Barang'] = $this->Model_barang->Tampil_data()->result();    
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Data_barang', $data);
        $this->load->view('templates_admin/Footer');
    }

    public function Tambah_aksi()
    {
        $nama_barang    = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok            = $this->input->post('stok');
        $gambar         = $_FILES['gambar']['name'];
         if ($gambar =''){} else {
            $config ['upload_path'] = './uploads';
            $config ['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('gambar')){
                echo "Gambar gagal diupload";
            } else {
                $gambar=$this->upload->data('file_name');
            }

         }

         $data = array (
            'nama_barang'      => $nama_barang,
            'keterangan'       => $keterangan,
            'kategori'         => $kategori,
            'harga'            => $harga,
            'stok'             => $stok,
            'gambar'           => $gambar
         );

         $this->Model_barang->Tambah_barang($data, 'tb_barang');
         redirect('admin/Data_barang/Index');
    }

    public function edit($id)
    {
        $where = array('id_barang' =>$id);
        $data['Barang'] = $this->Model_barang->Edit_barang($where, 'tb_barang')->result();
        $this->load->view('templates_admin/Header');
        $this->load->view('templates_admin/Sidebar');
        $this->load->view('admin/Edit_barang', $data);
        $this->load->view('templates_admin/Footer');
    }

    public function update()
    {
        $id             = $this->input->post('id_barang');
        $nama_barang    = $this->input->post('nama_barang');
        $keterangan     = $this->input->post('keterangan');
        $kategori       = $this->input->post('kategori');
        $harga          = $this->input->post('harga');
        $stok           = $this->input->post('stok');    
        
        $data = array (
            'nama_barang'      => $nama_barang,
            'keterangan'       => $keterangan,
            'kategori'         => $kategori,
            'harga'            => $harga,
            'stok'             => $stok
        );

        $where = array (
           'id_barang' => $id
        );

        $this->Model_barang->update_data($where,$data,'tb_barang');
        redirect('admin/Data_barang/index');
    }

    public function hapus($id)
    {
        $where = array('id_barang' => $id);
        $this->Model_barang->Hapus_data($where, 'tb_barang');
        redirect('admin/Data_barang/index');
    }
}