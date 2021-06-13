<?php

class Model_barang extends CI_Model{
    public function Tampil_data(){
        return $this->db->get('tb_barang'); 
    }

    public function Tambah_barang($data,$table){
        $this->db->insert($table,$data);
    }

    public function Edit_barang($where,$table){
        return $this->db->get_where($table,$where);
    }

    public function Update_data($where,$data,$table){
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function Hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id_barang', $id)
                            ->limit(1)
                            ->get('tb_barang');
        if($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function Detail_barang($id_barang)
    {
        $result = $this->db->where('id_barang', $id_barang)->get('tb_barang');
        if($result->num_rows() > 0){
            return $result->result();
        } else {
            return false;
        }
    }

}