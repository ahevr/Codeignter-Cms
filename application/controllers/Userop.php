<?php

class Userop extends CI_Controller {

    public $viewFolder = "";


    public function __construct()
    {
        parent::__construct();

        $this->viewFolder = "users_v";

        $this->load->model("user_model");

    }

    public function login(){

        if (get_active_user()){
            redirect(base_url(""));
        }

        $viewData = new stdClass();
        /** view gönderileceklerin ekrana basılması */
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "login";

        $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);
    }

    public function do_login(){

        if (get_active_user()){
            redirect(base_url(""));
        }

        $this->load->library("form_validation");



        /** kurallarını yazmak xd */
        $this->form_validation->set_rules("user_email","Email","required|trim|valid_email");
        $this->form_validation->set_rules("user_password","Şifre","required|trim");



        /** kuralların kabul olmadığı zaman ekrana basılacak olan mesaj kodunu yazma*/
        $this->form_validation->set_message(
            array(
                "required"      => "<b>{field}</b> Alanı Doldurulmalıdır",
                "valid_email"   => "Lütfen Geçerli Bir eposta Adresi Girinizi",
            )
        );



        /** yazdığımız kuralları çalıştırm xd */

             if($this->form_validation->run() == FALSE){


                 $viewData = new stdClass();
                 /** view gönderileceklerin ekrana basılması */
                 $viewData->viewFolder = $this->viewFolder;
                 $viewData->subViewFolder = "login";
                 $viewData->form_error = true;

                 $this->load->view("{$this->viewFolder}/{$viewData->subViewFolder}/index",$viewData);

             } else {

               $user =  $this->user_model->get(
                   array(
                       "email"     => $this->input->post("user_email"),
                       "password"  => md5($this->input->post("user_password"))
                   )
               );

               if ($user){



                   $alert = array(
                       "title"      => "İşlem Başarılı",
                       "text"       => "$user->full_name Hoşgeldiniz",
                       "type"       =>"success"
                   );

                   $this->session->set_userdata("user",$user);
                   $this->session->set_flashdata("alert", $alert);

                   redirect(base_url());

               } else {

                   $alert = array(
                       "title"      => "İşlem Başarısız",
                       "text"       => "Lütfen Giriş Bilgilerini Kontrol Ediniz",
                       "type"       =>"error"
                   );

                   $this->session->set_flashdata("alert", $alert);

                   redirect(base_url("login"));



               }


             }


    }

    public function logout(){

        $this->session->unset_userdata("user");
        redirect(base_url("login"));

    }

}