<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datadokter extends CI_Controller
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
            "menu" => "dokter",
            "page" => "master/dokter/data",
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

    // End Tabel View
    public function add()
    {
        $data = array(
            "base" => base_url(),
            "menu" => "dokter",
            "page" => "master/dokter/add",
        );
        $query = array(
            "select" => " a.* ",
            "table" => " poli a order by a.poli_id ASC ",
            "join" => "",
            "where" => ""
        );
        $res_query = $this->ms->getAlljoin($query)->result_array();

        $e = 0;
        foreach ($res_query as $rowunit) {
            $data['default']['poli_id'][$e]['value'] = $rowunit['poli_id'];
            $data['default']['poli_id'][$e]['display'] = $rowunit['nama_poli'];
            $e++;
        }
        $nomor_urut = $this->ms->generate_auto_number('dokter', 'dokter_id', 'DK');
        $data['dokter_id'] = $nomor_urut;
        $data['url_post'] = 'tambah_aksi';
        $this->load->view('layout/layout', $data);
    }
    function tambah_aksi()
    {
        $dokter_id = $this->input->post('dokter_id');
        $nama_dokter = $this->input->post('nama_dokter');
        $poli_id = $this->input->post('poli_id');
        $data = array(
            'dokter_id' => $dokter_id,
            'nama_dokter' => $nama_dokter,
            'poli_id' => $poli_id,
        );
        $this->ms->input_data('dokter', $data);
        redirect('Datadokter/add');
    }
    // End Tabel View
    public function edit($id)
    {
        $data = array(
            "base" => base_url(),
            "menu" => "dokter",
            "page" => "master/dokter/edit",
        );

        $row = $this->ms->getby_id('dokter', $id, 'dokter_id')->row();
        $query = array(
            "select" => " a.* ",
            "table" => " poli a order by a.poli_id ASC ",
            "join" => "",
            "where" => ""
        );
        $res_query = $this->ms->getAlljoin($query)->result_array();

        $e = 0;
        foreach ($res_query as $rowunit) {
            $data['default']['poli_id'][$e]['value'] = $rowunit['poli_id'];
            $data['default']['poli_id'][$e]['display'] = $rowunit['nama_poli'];
            if ($row->poli_id == $rowunit['poli_id']) {
                $data['default']['poli_id'][$e]['selected'] = "SELECTED";
            }
            $e++;
        }
        $data['dokter_id'] = $row->dokter_id;
        $data['nama_dokter'] = $row->nama_dokter;
        $data['poli_id'] = $row->poli_id;
        $data['url_post'] = '../edit_aksi';
        $this->load->view('layout/layout', $data);
    }
    function edit_aksi()
    {
        $dokter_id = $this->input->post('dokter_id');
        $nama_dokter = $this->input->post('nama_dokter');
        $poli_id = $this->input->post('poli_id');
        $data = array(
            'dokter_id' => $dokter_id,
            'nama_dokter' => $nama_dokter,
            'poli_id' => $poli_id,
        );
        $this->ms->update_data('dokter', $data, $dokter_id, 'dokter_id');
        redirect('Datadokter/edit/' . $dokter_id);
    }

    public function delete($id)
    {
        $this->ms->delete('dokter', $id, 'dokter_id');
        redirect('Datadokter');
    }
}
