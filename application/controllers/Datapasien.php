<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Datapasien extends CI_Controller
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
			"menu" => "pasien",
			"page" => "master/pasien/data",
		);
		$data["datapasien"] = $this->ms->getAll('pasien')->result();
		$this->load->view('layout/layout', $data);
	}

	// End Tabel View
	public function add()
	{

		$data = array(
			"base" => base_url(),
			"menu" => "pasien",
			"page" => "master/pasien/add",
		);
		$nomor_urut = $this->ms->generate_auto_number('pasien', 'pasien_id', 'PS');
		$data['pasien_id'] = $nomor_urut;
		$data['url_post'] = 'tambah_aksi';
		$this->load->view('layout/layout', $data);
	}
	function tambah_aksi()
	{
		$pasien_id = $this->input->post('pasien_id');
		$nama_pasien = $this->input->post('nama_pasien');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$data = array(
			'pasien_id' => $pasien_id,
			'nama_pasien' => $nama_pasien,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat,
		);
		$this->ms->input_data('pasien', $data);
		redirect('Datapasien/add');
	}
	// End Tabel View
	public function edit($id)
	{
		$data = array(
			"base" => base_url(),
			"menu" => "pasien",
			"page" => "master/pasien/edit",
		);

		$row = $this->ms->getby_id('pasien', $id, 'pasien_id')->row();
		$data['pasien_id'] = $row->pasien_id;
		$data['nama_pasien'] = $row->nama_pasien;
		$data['tanggal_lahir'] = $row->tanggal_lahir;
		$data['jenis_kelamin'] = $row->jenis_kelamin;
		$data['alamat'] = $row->alamat;
		$data['url_post'] = '../edit_aksi';
		$this->load->view('layout/layout', $data);
	}
	function edit_aksi()
	{
		$pasien_id = $this->input->post('pasien_id');
		$nama_pasien = $this->input->post('nama_pasien');
		$tanggal_lahir = $this->input->post('tanggal_lahir');
		$jenis_kelamin = $this->input->post('jenis_kelamin');
		$alamat = $this->input->post('alamat');
		$data = array(
			'pasien_id' => $pasien_id,
			'nama_pasien' => $nama_pasien,
			'tanggal_lahir' => $tanggal_lahir,
			'jenis_kelamin' => $jenis_kelamin,
			'alamat' => $alamat,
		);
		$this->ms->update_data('pasien', $data, $pasien_id, 'pasien_id');
		redirect('Datapasien/edit/' . $pasien_id);
	}

	public function delete($id)
	{
		$this->ms->delete('pasien', $id, 'pasien_id');
		redirect('Datapasien');
	}
}
