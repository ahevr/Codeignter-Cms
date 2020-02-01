<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public $viewFolder = "";

        public function __construct()
        {
            parent::__construct();

            $this->viewFolder = "users_v";
            $this->load->model("user_model");

            if (!get_active_user()){
                redirect(base_url("login"));
            }
        }

    public function index()
    {
        $viewData = new stdClass();

        $user = get_active_user();

        if ($user->user_role == "admin"){
            $where = array();
        } else {
            $where = array(
                "id"   => $user->id
            );
        }


        /** veritabanından verilerin model tablosunda yazıldıktan sonra ekrana basılması için */
        $items = $this->user_model->get_all(
            $where
        );

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
            $this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
            $this->form_validation->set_rules("full_name","Adı ve Soyadı","required|trim");
            $this->form_validation->set_rules("email","E-Posta Adresi","required|trim|valid_email|is_unique[users.email]");
            $this->form_validation->set_rules("password","Şifre","required|trim|min_length[5]|max_length[15]");



            /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
            $this->form_validation->set_message(
                array(
                    "required"      => "<b>{field}</b> Alanı Doldurulmalıdır",
                    "valid_email"   => "Lütfen Geçerli Bir eposta Adresi Girinizi",
                    "is_unique"      => "<b>{field}</b> Daha Önceden Kullanılmış",
                )
            );



            /** yazdığımız kuralları çalıştırm xd */
            $validate = $this->form_validation->run();

            if ($validate){

               $insert = $this->user_model->ekle(
                    array(
                        "user_name"         =>$this->input->post("user_name"),
                        "full_name"         =>$this->input->post("full_name"),
                        "email"             =>$this->input->post("email"),
                        "password"          =>md5($this->input->post("password")),
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

                redirect(base_url("users"));


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

        $item = $this->user_model->get(
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

    public function update_password_form($id){



        $viewData = new stdClass();

        $item = $this->user_model->get(
            array(
                "id"    => $id
            )
        );

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "password";
        $viewData->item = $item;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function permissions_form($id){


        $viewData = new stdClass();

        $item = $this->user_model->get(
            array(
                "id"    => $id
            )
        );

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "permissions";
        $viewData->item = $item;

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function update_permissions($id)
    {

        $permissions = json_encode($this->input->post("permissions"));

            $update = $this->user_model->guncelle(
                array("id" => $id),
                array(
                    "permissions" => $permissions
                )
            );

            /** alert sistemini buraya ekliyoruz canım benim */
            if ($update) {

                $alert = array(
                    "title" => "İşlem Başarılı",
                    "text" => "Yetkiler Güncellendi",
                    "type" => "success"
                );


            } else {

                $alert = array(
                    "title" => "İşlem Başarısız",
                    "text" => " Bir Hata Oluştu",
                    "type" => "error"
                );

            }

            $this->session->set_flashdata("alert", $alert);

            redirect(base_url("users/permissions_form/$id"));

        }

    public function guncelle($id){

        /** form kontrol verileri kuralları */
        $this->load->library("form_validation");

       $oldUser = $this->user_model->get(
            array(
                "id"    => $id
            )
        );

       if ($oldUser->user_name != $this->input->post("user_name")){
           $this->form_validation->set_rules("user_name","Kullanıcı Adı","required|trim|is_unique[users.user_name]");
       }
        if ($oldUser->email != $this->input->post("email")){
            $this->form_validation->set_rules("email","E-Posta Adresi","required|trim|valid_email|is_unique[users.email]");
        }



        /** kurallarını yazmak xd */
        $this->form_validation->set_rules("full_name","Adı ve Soyadı","required|trim");



        /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> Alanı Doldurulmalıdır",
                "valid_email"   => "Lütfen Geçerli Bir eposta Adresi Girinizi",
                "is_unique"      => "<b>{field}</b> Daha Önceden Kullanılmış"

            )
        );



        /** yazdığımız kuralları çalıştırm xd */
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->user_model->guncelle(
                array("id"=> $id),
                    array(
                        "user_name"         =>$this->input->post("user_name"),
                        "full_name"         =>$this->input->post("full_name"),
                        "email"             =>$this->input->post("email"),
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

            redirect(base_url("users"));


        } else {

            $viewData = new stdClass();

            $item = $this->user_model->get(
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


    public function guncelle_sifre($id){

        /** form kontrol verileri kuralları */
        $this->load->library("form_validation");



        /** kurallarını yazmak xd */
        $this->form_validation->set_rules("password","Şifre","required|trim|min_length[5]|max_length[15]");



        /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> Alanı Doldurulmalıdır",
            )
        );



        /** yazdığımız kuralları çalıştırm xd */
        $validate = $this->form_validation->run();

        if ($validate){

            $update = $this->user_model->guncelle(
                array("id"=> $id),
                array(
                    "password"         => md5($this->input->post("password")),
                )
            );

            /** alert sistemini buraya ekliyoruz canım benim */
            if ($update){

                $alert = array(
                    "title"      => "İşlem Başarılı",
                    "text"      => "Şifreniz Güncellendi",
                    "type"      => "success"
                );


            } else {

                $alert = array(
                    "title"      => "İşlem Başarısız",
                    "text"      => " Bir Hata Oluştu",
                    "type"      => "error"
                );

            }

            $this->session->set_flashdata("alert",$alert);

            redirect(base_url("users"));


        } else {

            $viewData = new stdClass();

            $item = $this->user_model->get(
                array(
                    "id"    =>  $id,
                )
            );



            /** view gönderileceklerin ekrana basılması */
            $viewData->viewFolder = $this->viewFolder;
            $viewData->subViewFolder = "password";
            $viewData->form_error = true;
            $viewData->item = $item;

            $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
        }
    }

    public function sil($id){

            $delete = $this->user_model->delete(
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

            redirect(base_url("users"));


    }

    public function aktifiade($id){

            if ($id){
                $iade = ($this->input->post("data") === "true") ? 1 : 0 ;

                $this->user_model->guncelle(
                    array(
                        "id" => $id
                    ),
                    array(
                        "iade" => $iade
                    )
                );
            }

        }

    public function view_form($id){



        $viewData = new stdClass();

        $item = $this->user_model->get(
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

    public function login(){

        $viewData = new stdClass();

        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }


}

