<?php

class Model_auth extends CI_Model{
    public function Cek_login()
    {
        $username = set_value('username');
        $username = set_value('password');

        $result = $this->db->where('username', $username)
                            ->where('password', $password)
                            ->limit(1)
                            ->get('tb_user');
        if($result->num_rows() > 0){
            return $result->row();
        } else {
            return array();
        }
    }
}