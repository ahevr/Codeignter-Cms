<?php

class Product_model extends CI_Model{

    public $tableName = "products";

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

    public function kayit_sayisi()
    {
        return $this->db->select("count(*) as adet, site, SUM(urunAdet) as urunAdet")->from("members")->group_by('site')->get()->result();
    }



    function verileri_getir($sql)
    {
        $query = $this->db->query($sql);
        return $query->result();
    }

    function toplam_veri_sayisi()
    {
        $this->db->from('members');
        $query = $this->db->get();
        return $query->num_rows();
    }

    function arama_toplam_veri_sayisi($sql)
    {
        $query = $this->db->query($sql);
        return $query->num_rows();
    }












}