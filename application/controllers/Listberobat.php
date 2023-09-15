<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Listberobat extends CI_Controller
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
            "menu" => "lberobat",
            "page" => "laporan/berobat/data",
        );
        $query = array(
            "select" => " b.*,p.nama_pasien,TIMESTAMPDIFF(YEAR,p.tanggal_lahir,curdate()) usia,if(p.jenis_kelamin='L','Laki-laki','Perempuan') jk,pl.nama_poli,d.nama_dokter ",
            "table" => " berobat b ",
            "join" => " INNER JOIN pasien p ON p.pasien_id=b.pasien_id
			INNER JOIN dokter d ON d.dokter_id=b.dokter_id
			INNER JOIN poli pl ON pl.poli_id=d.poli_id ",
            "where" => ""
        );
        $data["databerobat"]  = $this->ms->getAlljoin($query)->result();

        $this->load->view('layout/layout', $data);
    }

    // End Tabel View

}
