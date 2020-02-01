<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Site extends CI_Controller {

    public $viewFolder = "";

        public function __construct()
        {
            parent::__construct();

            $this->viewFolder = "site_v";
            $this->load->model("site_model");

            if (!get_active_user()){
                redirect(base_url("login"));
            }
        }

    public function index()
    {
        $viewData = new stdClass();
        /** veritabanından verilerin model tablosunda yazıldıktan sonra ekrana basılması için */
        $items = $this->site_model->get_all();

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
            $this->form_validation->set_rules("title","Site Adı","required|trim");


            /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
            $this->form_validation->set_message(
                array(
                    "required"  => "<b>{field}</b> Alanı Doldurulmalıdır"
                )
            );



            /** yazdığımız kuralları çalıştırm xd */
            $validate = $this->form_validation->run();

            if ($validate){

               $insert = $this->site_model->ekle(
                    array(
                        "title"         =>$this->input->post("title"),
                        "site_code"     =>$this->input->post("site_code"),
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

                redirect(base_url("site"));


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

        $item = $this->site_model->get(
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
        $this->form_validation->set_rules("title","Site Adı","required|trim");



        /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
        $this->form_validation->set_message(
            array(
                "required"  => "<b>{field}</b> Alanı Doldurulmalıdır"
            )
        );



        /** yazdığımız kuralları çalıştırm xd */
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->site_model->guncelle(
                array(
                    "id"    => $id
                ),
                array(
                        "title"         =>$this->input->post("title"),
                        "site_code"     =>$this->input->post("site_code"),
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

            redirect(base_url("site"));


        } else {

            $viewData = new stdClass();

            $item = $this->site_model->get(
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

            $delete = $this->site_model->delete(
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

            redirect(base_url("site"));


    }
    

    public function view_form($id){



        $viewData = new stdClass();

        $item = $this->site_model->get(
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



}





