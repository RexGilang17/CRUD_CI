<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listdokter extends CI_Controller
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
            "menu" => "ldokter",
            "page" => "laporan/dokter/data",
        );
        $query = array(
            "select" => " a.*,b.nama_poli ",
            "table" => " dokter a ",
            "join" => " INNER JOIN poli b ON b.poli_id=a.poli_id order by a.dokter_id ASC ",
            "where" => ""
        );
        $data["datadokter"]  = $this->ms->getAlljoin($query)->result();

        $this->load->view('layout/layout', $data);
    }
}
