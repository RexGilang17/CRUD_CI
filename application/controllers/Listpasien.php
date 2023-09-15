<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listpasien extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Master', 'ms');
    }

    public function index()
    {
        $data = array(
            "base" => base_url(),
            "menu" => "lpasien",
            "page" => "laporan/pasien/data",
        );
        $data["datapasien"] = $this->ms->getAll('pasien')->result();

        $this->load->view('layout/layout', $data);
    }
}
