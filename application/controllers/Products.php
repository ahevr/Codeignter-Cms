<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    public $viewFolder = "";

    public function __construct()
        {
            parent::__construct();

            $this->viewFolder = "product_v";
            $this->load->model("product_model");

            if (!get_active_user()){
                redirect(base_url("login"));
            }
        }

    public function index()
    {
        $viewData = new stdClass();
        /** veritabanından verilerin model tablosunda yazıldıktan sonra ekrana basılması için */
        $items = $this->product_model->get_all();

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->items = $items;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function yeni_ekle(){

        $viewData = new stdClass();

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "add";

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

    }

    public function kaydet(){

            /** form kontrol verileri kuralları */
            $this->load->library("form_validation");



            /** kurallarını yazmak xd */
            $this->form_validation->set_rules("full_name","Adı ve Soyadı","required|trim");
            $this->form_validation->set_rules("site","Site Bilgisi","required|trim");
            $this->form_validation->set_rules("faturaNo","Fatura Numarası","required|trim");
            $this->form_validation->set_rules("urunAdi","Ürün Adı","required|trim");
            $this->form_validation->set_rules("urunAdet","Ürün Adet","required|trim");
            $this->form_validation->set_rules("urunFiyat","Ürün Fiyat","required|trim");



            /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
            $this->form_validation->set_message(
                array(
                    "required"  => "<b>{field}</b> Alanı Doldurulmalıdır"
                )
            );



            /** yazdığımız kuralları çalıştırm xd */
            $validate = $this->form_validation->run();

            if ($validate){

               $insert = $this->product_model->ekle(
                    array(
                        "full_name"         =>$this->input->post("full_name"),
                        "province"          =>$this->input->post("province"),
                        "district"          =>$this->input->post("district"),
                        "phone"             =>$this->input->post("phone"),
                        "site"              =>$this->input->post("site"),
                        "siparisNo"         =>$this->input->post("siparisNo"),
                        "siparisTarihi"     =>$this->input->post("siparisTarihi"),
                        "faturaNo"          =>$this->input->post("faturaNo"),
                        "urunAdi"           =>$this->input->post("urunAdi"),
                        "urunAdet"          =>$this->input->post("urunAdet"),
                        "urunFiyat"         =>$this->input->post("urunFiyat"),
                        "stock_code"        =>$this->input->post("stock_code"),
                        "iade"              =>0,
                        "kargo_firmasi"     =>$this->input->post("kargo_firmasi"),
                        "hizmet_bedeli"     =>$this->input->post("hizmet_bedeli"),
                        "komisyon_bedeli"   =>$this->input->post("komisyon_bedeli"),
                        "iade_faturasi"     =>$this->input->post("iade_faturasi"),
                        "desc"              =>$this->input->post("desc"),
                        "createdAt"         =>date("Y-m-d H:i:s")
                    )
                );

               /** alert sistemini buraya ekliyoruz canım benim */
                if ($insert){

                    $alert = array(
                        "title"      => "İşlem Başarılı",
                        "text"      => "Kayıt Başarılı Bir Şekilde Eklendi",
                        "type"      => "success"
                    );


                } else {

                    $alert = array(
                        "title"      =>"İşlem Başarısız",
                        "text"      => "Kayıt Eklenirken Bir Hata Oluştu",
                        "type"      => "error"
                    );

                }

                $this->session->set_flashdata("alert",$alert);

                redirect(base_url("member"));


            } else {

                $viewData = new stdClass();

                /** view gönderileceklerin ekrana basılması */
                $viewData->viewFolder = $this->viewFolder;
                $viewData->subViewFolder = "add";
                $viewData->form_error = true;

                $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
            }
    }

    public function update_form($id){



        $viewData = new stdClass();

        $item = $this->product_model->get(
            array(
                "id"    => $id
            )
        );

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "update";
        $viewData->item = $item;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function guncelle($id){

        /** form kontrol verileri kuralları */
        $this->load->library("form_validation");



        /** kurallarını yazmak xd */
        $this->form_validation->set_rules("full_name","Adı ve Soyadı","required|trim");
        $this->form_validation->set_rules("site","Site Bilgisi","required|trim");
        $this->form_validation->set_rules("faturaNo","Fatura Numarası","required|trim");
        $this->form_validation->set_rules("urunAdi","Ürün Adı","required|trim");
        $this->form_validation->set_rules("urunAdet","Ürün Adet","required|trim");
        $this->form_validation->set_rules("urunFiyat","Ürün Fiyat","required|trim");



        /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> Alanı Doldurulmalıdır"
            )
        );



        /** yazdığımız kuralları çalıştırm xd */
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->product_model->guncelle(
                array(
                    "id"    => $id
                ),
                array(
                    "full_name"         =>$this->input->post("full_name"),
                    "province"          =>$this->input->post("province"),
                    "district"          =>$this->input->post("district"),
                    "phone"             =>$this->input->post("phone"),
                    "site"              =>$this->input->post("site"),
                    "siparisNo"         =>$this->input->post("siparisNo"),
                    "siparisTarihi"     =>$this->input->post("siparisTarihi"),
                    "faturaNo"          =>$this->input->post("faturaNo"),
                    "urunAdi"           =>$this->input->post("urunAdi"),
                    "urunAdet"          =>$this->input->post("urunAdet"),
                    "urunFiyat"         =>$this->input->post("urunFiyat"),
                    "stock_code"        =>$this->input->post("stock_code"),
                    "iade"              =>$this->input->post("iade"),
                    "kargo_firmasi"     =>$this->input->post("kargo_firmasi"),
                    "hizmet_bedeli"     =>$this->input->post("hizmet_bedeli"),
                    "komisyon_bedeli"   =>$this->input->post("komisyon_bedeli"),
                    "iade_faturasi"     =>$this->input->post("iade_faturasi"),
                    "desc"              =>$this->input->post("desc"),
                    "createdAt"         =>date("Y-m-d H:i:s")
                )
            );

            /** alert sistemini buraya ekliyoruz canım benim */
            if ($update){

                $alert = array(
                    "title"      => "İşlem Başarılı",
                    "text"      => "Güncelleme İşlemi Tamamlandı",
                    "type"      => "success"
                );


            } else {

                $alert = array(
                    "title"      => "İşlem Başarısız",
                    "text"      => "Güncelleme İşlemi Yaparken Bir Hata Oluştu",
                    "type"      => "error"
                );

            }

            $this->session->set_flashdata("alert",$alert);

            redirect(base_url("member"));


        } else {

            $viewData = new stdClass();

            $item = $this->product_model->get(
                array(
                    "id"    =>  $id,
                )
            );



            /** view gönderileceklerin ekrana basılması */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "update";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
        }
    }

    public function sil($id){

            $delete = $this->product_model->delete(
                array(
                        "id"    => $id
                )
            );

            if ($delete){

                $alert = array(
                    "title"      => "İşlem Başarılı",
                    "text"      => "Silme İşlemi Tamamlandı",
                    "type"      => "success"
                );


            } else {

                $alert = array(
                    "title"      => "İşlem Başarısız",
                    "text"      => "Silme İşlemi Yaparken Bir Hata Oluştu",
                    "type"      => "error"
                );

            }

            $this->session->set_flashdata("alert",$alert);

            redirect(base_url("member"));


    }

    public function view_form($id){



        $viewData = new stdClass();

        $item = $this->product_model->get(
            array(
                "id"    => $id
            )
        );

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "view";
        $viewData->item = $item;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

   public function datatables_data()
    {
        // burası
        $kolonlar = array(
            'id',
            'full_name',
            'site',
            'siparisNo',
            'urunAdi',
            'urunAdet',
            'faturaNo',
            'iade'

        );

        $post = $this->input->post();

        $arama_kelime = isset($post["search"]["value"]) ? $post["search"]["value"] : '';
        $siralama = isset($post["order"]) ? $post["order"] : '';
        $length = isset($post["length"]) ? $post["length"] : '10';
        $limit = isset($post["start"]) ? $post["start"] : '0';
        $draw = (isset($post["draw"])) ? $post["draw"] : 1;

        //burası
        $toplam_veri_sayisi = $this->product_model->toplam_veri_sayisi(); // gittigi tablo

        $sql = "SELECT * FROM members "; // burada tablo name
        if (!empty($arama_kelime)) {
            $arama_sql = "WHERE ";
            $arama_index = 0;
            foreach ($kolonlar as $kolon) {
                if ($arama_index == 0) {
                    $arama_sql .= "{$kolon} LIKE '%{$arama_kelime}%' ";
                } else {
                    $arama_sql .= "OR {$kolon} LIKE '%{$arama_kelime}%' ";
                }
                $arama_index++;
            }
            $sql .= $arama_sql;
            $toplam_veri_sayisi = $this->product_model->arama_toplam_veri_sayisi($sql);
        }

        if (!empty($siralama)) {
            $sql .= "ORDER BY {$kolonlar[$siralama['0']['column']]} " . strtoupper($siralama['0']['dir']) . " ";
        } else {
            $sql .= "ORDER BY ID ASC "; // order yaptıgı sutun
        }

        if ($length != 1) {
            $sql .= "LIMIT " . $limit . ", " . $length;
        }

        $veriler = $this->product_model->verileri_getir($sql);

        $data = array();
        foreach ($veriler as $key => $veri) {
            $veriDizi = array();
            foreach ($kolonlar as $kolon) {
                $veriDizi[] = $veri->$kolon;
            }
            $veriDizi[] = "<a href='" . base_url("member/view_form/{$veri->id}")."' class='btn btn-sm btn-purple btn-outline'><i class='fa fa-info'> Detaylar</i></a>";
            $veriDizi[] = "<a href='" . base_url("member/update_form/{$veri->id}")."' class='btn btn-sm btn-success btn-outline'><i class='fa fa-edit'> Düzenle</i></a>";
          //  $veriDizi[] = "<a href='" . base_url("member/sil/{$veri->id}")."'  class='btn btn-sm btn-danger btn-outline delete '><i class='fa fa-trash'> Sil</i></a>";
            $veriDizi[] = "<button data-url='" . base_url("member/sil/{$veri->id}")."'  class='btn btn-sm btn-danger btn-outline delete'><i class='fa fa-trash'> Sil</i></a>";


            $data[] = $veriDizi;
        }

        $output = array(
            "draw"            => intval($draw),
            "recordsTotal"    => $this->product_model->toplam_veri_sayisi(),
            "recordsFiltered" => $toplam_veri_sayisi,
            "data"            => $data
        );

        echo json_encode($output);

    }



}





