<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

        public function __construct()
        {
            parent::__construct();

            $this->viewFolder = "dashboard_v";

            if (!get_active_user()){
                redirect(base_url("login"));
            }


        }

    public function index()
    {
        $this->load->model('Content_model');

        $viewData = new stdClass();
        $viewData->viewFolder = $this->viewFolder;
        $viewData->subViewFolder = "list";
        $viewData->kayit_sayisi = $this->Content_model->kayit_sayisi();
        $viewData->site_fiyat = $this->Content_model->site_fiyat();
        $viewData->toplam_fiyat = $this->Content_model->toplam_fiyat();
        $viewData->province_sayar = $this->Content_model->province_sayar();

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }
}
