<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Talent extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_Talent');
    }

    public function index()
    {
        $dataKategori = $this->M_Talent->getDataKategori();
        echo "<pre>";
        print_r($dataKategori);
        echo "</pre>";
        // $this->load->view('talent/index');
    }

    public function kategori()
    {
        $this->load->view('talent/kategori');
    }
}