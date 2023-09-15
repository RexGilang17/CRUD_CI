<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapoli extends CI_Controller
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
            "menu" => "poli",
            "page" => "master/poli/data",
        );
        $data["datapoli"] = $this->ms->getAll('poli')->result();
        $this->load->view('layout/layout', $data);
    }

    // End Tabel View
    public function add()
    {
        $data = array(
            "base" => base_url(),
            "menu" => "poli",
            "page" => "master/poli/add",
        );

        $nomor_urut = $this->ms->generate_auto_number('poli', 'poli_id', 'PL');
        $data['poli_id'] = $nomor_urut;
        $data['url_post'] = 'tambah_aksi';
        $this->load->view('layout/layout', $data);
    }

    // End Tabel View
    public function edit($id)
    {
        $data = array(
            "base" => base_url(),
            "menu" => "poli",
            "page" => "master/poli/edit",
        );

        $row = $this->ms->getby_id('poli', $id, 'poli_id')->row();
        $data['poli_id'] = $row->poli_id;
        $data['nama_poli'] = $row->nama_poli;
        $data['url_post'] = '../edit_aksi';
        $this->load->view('layout/layout', $data);
    }

    function tambah_aksi()
    {
        $poli_id = $this->input->post('poli_id');
        $nama_poli = $this->input->post('nama_poli');
        $data = array(
            'poli_id' => $poli_id,
            'nama_poli' => $nama_poli,
        );
        $this->ms->input_data('poli', $data);
        redirect('Datapoli/add');
    }
    function edit_aksi()
    {
        $poli_id = $this->input->post('poli_id');
        $nama_poli = $this->input->post('nama_poli');
        $data = array(
            'nama_poli' => $nama_poli,
        );

        $this->ms->update_data('poli', $data, $poli_id, 'poli_id');
        redirect('Datapoli/edit/' . $poli_id);
    }
    public function delete($id)
    {
        $this->ms->delete('poli', $id, 'poli_id');
        redirect('Datapoli');
    }
}
