<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Berobat extends CI_Controller
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
            "menu" => "berobat",
            "page" => "master/berobat/data",
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
    public function add()
    {
        $data = array(
            "base" => base_url(),
            "menu" => "berobat",
            "page" => "master/berobat/add",
        );
        $query = array(
            "select" => " a.* ",
            "table" => " poli a order by a.poli_id ASC ",
            "join" => "",
            "where" => ""
        );
        $query_pasien = array(
            "select" => " a.* ",
            "table" => " pasien a order by a.pasien_id ASC ",
            "join" => "",
            "where" => ""
        );
        $query_dokter = array(
            "select" => " a.* ",
            "table" => " dokter a order by a.dokter_id ASC ",
            "join" => "",
            "where" => ""
        );
        $res_query = $this->ms->getAlljoin($query)->result_array();
        $res_query2 = $this->ms->getAlljoin($query_pasien)->result_array();
        $res_query3 = $this->ms->getAlljoin($query_dokter)->result_array();

        $e = 0;
        foreach ($res_query as $rowunit) {
            $data['default']['poli_id'][$e]['value'] = $rowunit['poli_id'];
            $data['default']['poli_id'][$e]['display'] = $rowunit['nama_poli'];
            $e++;
        }
        foreach ($res_query2 as $rowunit2) {
            $data['default']['pasien'][$e]['value'] = $rowunit2['pasien_id'];
            $data['default']['pasien'][$e]['display'] = $rowunit2['nama_pasien'];
            $e++;
        }
        foreach ($res_query3 as $rowunit3) {
            $data['default']['dokter'][$e]['value'] = $rowunit3['dokter_id'];
            $data['default']['dokter'][$e]['display'] = $rowunit3['nama_dokter'];
            $e++;
        }
        $nomor_urut = $this->ms->generate_auto_number('berobat', 'no_transaksi', 'TR');
        $data['id'] = $nomor_urut;
        $data['url_post'] = 'tambah_aksi';
        $this->load->view('layout/layout', $data);
    }
    function tambah_aksi()
    {
        $input = $this->input->post();
        $tgl = $input['tahun'] . '-' . $input['bulan'] . '-' . $input['tanggal'];
        $data = array(
            'no_transaksi' => $input['notrans'],
            'pasien_id' => $input['pasien'],
            'tanggal_berobat' => $tgl,
            'dokter_id' => $input['dokter'],
            'keluhan' => $input['keluhan'],
            'biaya_adm' => $input['biaya_adm'],
        );
        $this->ms->input_data('berobat', $data);
        redirect('Berobat/add');
    }
    // End Tabel View
    public function edit($id)
    {
        $data = array(
            "base" => base_url(),
            "menu" => "berobat",
            "page" => "master/berobat/edit",
        );
        $query = array(
            "select" => " b.*,p.nama_pasien,TIMESTAMPDIFF(YEAR,p.tanggal_lahir,curdate()) usia,if(p.jenis_kelamin='L','Laki-laki','Perempuan') jk,pl.poli_id,pl.nama_poli,d.nama_dokter,YEAR(b.tanggal_berobat) tahun,MONTH(b.tanggal_berobat) bulan,DAY(b.tanggal_berobat) tanggal ",
            "table" => " berobat b ",
            "join" => " INNER JOIN pasien p ON p.pasien_id=b.pasien_id
			INNER JOIN dokter d ON d.dokter_id=b.dokter_id
			INNER JOIN poli pl ON pl.poli_id=d.poli_id ",
            "where" => " b.no_transaksi='$id'"
        );
        $row = $this->ms->getAlljoin($query)->row();
        $data['id'] = $row->no_transaksi;
        $data['nama'] = $row->nama_pasien;
        $data['tgl'] = $row->tanggal;
        $data['tahun'] = $row->tahun;
        $data['bln'] = $row->bulan;
        $data['keluhan'] = $row->keluhan;
        $data['biaya_adm'] = $row->biaya_adm;

        $query_poli = array(
            "select" => " a.* ",
            "table" => " poli a order by a.poli_id ASC ",
            "join" => "",
            "where" => ""
        );
        $query_pasien = array(
            "select" => " a.* ",
            "table" => " pasien a order by a.pasien_id ASC ",
            "join" => "",
            "where" => ""
        );
        $query_dokter = array(
            "select" => " a.* ",
            "table" => " dokter a order by a.dokter_id ASC ",
            "join" => "",
            "where" => ""
        );
        $res_query = $this->ms->getAlljoin($query_poli)->result_array();
        $res_query2 = $this->ms->getAlljoin($query_pasien)->result_array();
        $res_query3 = $this->ms->getAlljoin($query_dokter)->result_array();
        $e = 0;
        foreach ($res_query as $rowunit) {
            $data['default']['poli_id'][$e]['value'] = $rowunit['poli_id'];
            $data['default']['poli_id'][$e]['display'] = $rowunit['nama_poli'];
            if ($row->poli_id == $rowunit['poli_id']) {
                $data['default']['poli_id'][$e]['selected'] = "SELECTED";
            }
            $e++;
        }
        foreach ($res_query2 as $rowunit2) {
            $data['default']['pasien'][$e]['value'] = $rowunit2['pasien_id'];
            $data['default']['pasien'][$e]['display'] = $rowunit2['nama_pasien'];
            if ($row->pasien_id == $rowunit2['pasien_id']) {
                $data['default']['pasien'][$e]['selected'] = "SELECTED";
            }
            $e++;
        }
        foreach ($res_query3 as $rowunit3) {
            $data['default']['dokter'][$e]['value'] = $rowunit3['dokter_id'];
            $data['default']['dokter'][$e]['display'] = $rowunit3['nama_dokter'];
            if ($row->dokter_id == $rowunit3['dokter_id']) {
                $data['default']['dokter'][$e]['selected'] = "SELECTED";
            }
            $e++;
        }

        $data['url_post'] = '../edit_aksi';
        $this->load->view('layout/layout', $data);
    }
    function edit_aksi()
    {
        $input = $this->input->post();
        $tgl = $input['tahun'] . '-' . $input['bulan'] . '-' . $input['tanggal'];
        $no_transaksi             = $input['notrans'];
        $data = array(
            'no_transaksi' => $input['notrans'],
            'pasien_id' => $input['pasien'],
            'tanggal_berobat' => $tgl,
            'dokter_id' => $input['dokter'],
            'keluhan' => $input['keluhan'],
            'biaya_adm' => $input['biaya_adm'],
        );
        $this->ms->update_data('berobat', $data, $no_transaksi, 'no_transaksi');
        redirect('Berobat/edit/' . $no_transaksi);
    }

    public function delete($id)
    {
        $this->ms->delete('berobat', $id, 'no_transaksi');
        redirect('Berobat');
    }
}
