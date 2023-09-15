<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Info extends CI_Controller
{

	public function index()
	{
		$data = array(
			"base" => base_url(),
			"menu" => "info",
			"nama" => "Erwin Pradita",
			"notlp" => "0857 1193 0485",
			"alamat" => "Jl. Bhayangkara Blok H 8 no. 6 Tangerang Selatan",
			"page" => "info",
		);

		$this->load->view('layout/layout', $data);
	}
	public function Biodata()
	{
		$data = array(
			"nama" => 'Erwin',
			"notlp" => "0857 1193 0485",
			"alamat" => "Jl. Bhayangkara Blok H 8 no. 6 Tangerang Selatan",
		);

		$this->load->view('biodata', $data);
	}
	public function kalkulator($angka1, $angka2)
	{
		$data = array(
			"angka1" => $angka1,
			"angka2" => $angka2,
		);

		$this->load->view('kalkulator', $data);
	}
}
