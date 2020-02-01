<?php

class Content_model extends CI_Model
{


    public function __construct()
    {
        parent::__construct();

    }

    public function kayit_sayisi()
    {
        return $this->db->select("count(*) as adet, site, SUM(urunAdet) as urunAdet")->from("members")->group_by('site')->get()->result();

    }


    public function site_fiyat(){

        return $this->db->select("count(*) as adet, site, SUM(urunFiyat) as urunFiyat ")->from("members")->group_by('site')->get()->result();

    }

    public function toplam_fiyat(){

        return $this->db->select("SUM(urunFiyat) as urunFiyat")->from("members")->group_by('site')->get()->result();
    }

    public function province_sayar(){

        return $this->db->select("count(*) as adet, province, SUM(urunAdet) as urunAdet ")->from("members")->group_by('province')->get()->result();

    }







}


