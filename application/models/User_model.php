<?php

class User_model extends CI_Model{

    public $tableName = "users";

    public function __construct()
    {
        parent::__construct();

    }


    public function get($where = array()){
        return $this->db->where($where)->get($this->tableName)->row();
    }

    /** veritabanındaki verileri çekmek için gerekli olan method ( method: function (yani kabaca dbden veri çekmek için gerekli olan kodlar)) */
    public function get_all($where = array()){

        return $this->db->where($where)->get($this->tableName)->result();
    }

    public function ekle($data = array()){

        return $this->db->insert($this->tableName,$data);
    }

    public function guncelle($where = array(), $data = array()){

        return $this->db->where($where)->update($this->tableName,$data);
    }

    public function delete($where = array())
    {
        return $this->db->where($where)->delete($this->tableName);
    }




}