<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Master', 'ms');
        $this->is_logged();
    }

    function is_logged()
    {
        $this->load->library('session');
        if ($this->session->userdata('ses_statuslogin') != TRUE) {
            redirect('Login', 'refresh');
        }
    }
    public function index()
    {
        $data = array(
            "base" => base_url(),
            "menu" => "lap",
            "page" => "laporan/data",
            'url_post'  => 'Laporan',
        );
        if ($this->input->post('cari') != null) {
            $cari = $this->input->post('cari');
        } else {
            $cari = '';
        }
        $data["cari"] = $cari;

        $query = array(
            "select" => " h.id_trans,h.jns_trans
                            ,h.tgl_trans,SUM(d.qty) jmlqty,COUNT(d.kdbarang)barang
                            ,SUM(d.total)totalall ",
            "table" => " transaksi_h h ",
            "join" => " INNER JOIN transaksi_d d ON d.header_id=h.id_trans ",
            "where" => "  ((h.tgl_trans IS NULL) OR (h.tgl_trans LIKE '%$cari%')) 
                         GROUP BY h.id_trans order by h.id_trans "
        );
        $data["data_count"] = $this->ms->getAlljoin($query)->num_rows();
        $data["datatransaksi"] = $this->ms->getAlljoin($query)->result();
        $this->load->view('layout/layout', $data);
    }
    public function print($id)
    {
        $this->load->library('pdfgenerator');
        $this->data['title'] = 'Laporan Transaksi';
        $file_pdf = 'laporan_bayar_';
        $paper = 'A4';
        $orientation = "potrait";
        $this->data['base']             = base_url();
        $query = array(
            "select" => " h.id_trans,h.jns_trans
                            ,h.tgl_trans,SUM(d.qty) jmlqty,COUNT(d.kdbarang)barang
                            ,SUM(d.total)totalall ",
            "table" => " transaksi_h h ",
            "join" => " INNER JOIN transaksi_d d ON d.header_id=h.id_trans ",
            "where" => "  ((h.tgl_trans IS NULL) OR (h.tgl_trans LIKE '%$id%')) 
                         GROUP BY h.id_trans order by h.id_trans "
        );


        $this->data["lap"] = $this->ms->getAlljoin($query)->result();


        $query2 = array(
            "select" => " SUM(d.qty) qtytotal 
                            ,SUM(d.total)totalall ",
            "table" => " transaksi_h h ",
            "join" => " INNER JOIN transaksi_d d ON d.header_id=h.id_trans ",
            "where" => "  ((h.tgl_trans IS NULL) OR (h.tgl_trans LIKE '%$id%')) 
                        order by h.id_trans "
        );


        $this->data["total"] = $this->ms->getAlljoin($query2)->row();
        $this->data["id"]         = $id;
        $html = $this->load->view('laporan/print', $this->data, true);
        $this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

        //$this->load->view('laporan/print', $this->data);
    }
}
