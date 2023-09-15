<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi extends CI_Controller
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
			"menu" => "transaksi",
			"page" => "transaksi/data",
		);
		$data["datatransaksi"] = $this->ms->getAll('transaksi_h')->result();
		$this->load->view('layout/layout', $data);
	}

	// End Tabel View
	public function add()
	{
		$data = array(
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "transaksi/add",
		);
		$nomor_urut = $this->ms->generate_auto_number('transaksi_h', 'id_trans', 'TR');

		$data['kode'] = $nomor_urut;

		$query_cust = array(
			"select" => " a.* ",
			"table" => " customer a order by a.id ASC ",
			"join" => "",
			"where" => ""
		);
		$res_cust = $this->ms->getAlljoin($query_cust)->result_array();
		$e = 0;
		foreach ($res_cust as $rowcust) {
			$data['default']['customer'][$e]['value'] = $rowcust['id'];
			$data['default']['customer'][$e]['display'] = $rowcust['nm_cust'];
			$e++;
		}

		$query_supp = array(
			"select" => " a.* ",
			"table" => " supplier a order by a.id ASC ",
			"join" => "",
			"where" => ""
		);
		$res_supp = $this->ms->getAlljoin($query_supp)->result_array();
		$e = 0;
		foreach ($res_supp as $rowsupp) {
			$data['default']['supplier'][$e]['value'] = $rowsupp['id'];
			$data['default']['supplier'][$e]['display'] = $rowsupp['nm_supp'];
			$e++;
		}

		$data['url_post'] = 'tambah_aksi';
		$this->load->view('layout/layout', $data);
	}
	function tambah_aksi()
	{
		$id_trans = $this->input->post('id_trans');
		$jns_transaksi = $this->input->post('jns_transaksi');
		$tgl_trans = $this->input->post('tgl_trans');
		$ref_id = $this->input->post('ref_id');
		$supp_id = $this->input->post('supp_id');
		$cust_id = $this->input->post('cust_id');
		$data = array(
			'id_trans' => $id_trans,
			'jns_trans' => $jns_transaksi,
			'tgl_trans' => $tgl_trans,
			'ref_id' => $ref_id,
			'supplier_id' => $supp_id,
			'customer_id' => $cust_id,
		);
		$this->ms->input_data('transaksi_h', $data);
		redirect('Transaksi/edit/' . $id_trans);
	}
	// End Tabel View
	public function edit($id)
	{
		$data = array(
			"base" => base_url(),
			"menu" => "transaksi",
			"page" => "transaksi/edit",
		);
		$row = $this->ms->getby_id('transaksi_h', $id, 'id_trans')->row();

		$data['kode'] = $row->id_trans;
		$data['jns_trans'] = $row->jns_trans;
		$data['tgl_trans'] = $row->tgl_trans;
		$data['ref_id'] = $row->ref_id;

		$query_cust = array(
			"select" => " a.* ",
			"table" => " customer a order by a.id ASC ",
			"join" => "",
			"where" => ""
		);
		$res_cust = $this->ms->getAlljoin($query_cust)->result_array();
		$e = 0;
		foreach ($res_cust as $rowcust) {
			$data['default']['customer'][$e]['value'] = $rowcust['id'];
			$data['default']['customer'][$e]['display'] = $rowcust['nm_cust'];
			if ($row->customer_id == $rowcust['id']) {
				$data['default']['customer'][$e]['selected'] = "SELECTED";
			}
			$e++;
		}

		$query_supp = array(
			"select" => " a.* ",
			"table" => " supplier a order by a.id ASC ",
			"join" => "",
			"where" => ""
		);
		$res_supp = $this->ms->getAlljoin($query_supp)->result_array();
		$e = 0;
		foreach ($res_supp as $rowsupp) {
			$data['default']['supplier'][$e]['value'] = $rowsupp['id'];
			$data['default']['supplier'][$e]['display'] = $rowsupp['nm_supp'];
			if ($row->supplier_id == $rowsupp['id']) {
				$data['default']['supplier'][$e]['selected'] = "SELECTED";
			}
			$e++;
		}

		$query_barang = array(
			"select" => " a.* ",
			"table" => " barang a order by a.kdbarang ASC ",
			"join" => "",
			"where" => ""
		);
		$res_barang = $this->ms->getAlljoin($query_barang)->result_array();
		$e = 0;
		foreach ($res_barang as $rowbarang) {
			$data['default']['kdbarang'][$e]['value'] = $rowbarang['kdbarang'];
			$data['default']['kdbarang'][$e]['display'] = $rowbarang['nmbarang'];
			$e++;
		}
		$query_detail = array(
			"select" => " d.*,b.nmbarang ",
			"table" => " transaksi_d d  ",
			"join" => " LEFT JOIN barang b on b.kdbarang=d.kdbarang ",
			"where" => " header_id='$id' order by b.kdbarang ASC"
		);
		$data["datadetail"] = $this->ms->getAlljoin($query_detail)->result();



		$data['url_post'] = '../edit_aksi';
		$data['url_post_detil'] = '../editdetail_aksi';
		$data['url_getdetail'] = '../grid_detail';
		$this->load->view('layout/layout', $data);
	}

	function grid_detail()
	{
		$id = $this->input->post('id');
		$row = $this->ms->getby_id('transaksi_d', $id, 'id')->row();
		$jsonmsg = array(
			"hasil" => 'true',
			"qty" => $row->qty,
			"harga" => $row->harga,
			"detail_id" => $row->id,
			"kdbarang" => $row->kdbarang,
			"header_id" => $row->header_id
		);
		echo json_encode($jsonmsg);
	}
	function edit_aksi()
	{
		$id_trans = $this->input->post('id_trans');
		$jns_transaksi = $this->input->post('jns_transaksi');
		$tgl_trans = $this->input->post('tgl_trans');
		$ref_id = $this->input->post('ref_id');
		$supp_id = $this->input->post('supp_id');
		$cust_id = $this->input->post('cust_id');
		$data = array(
			'id_trans' => $id_trans,
			'jns_trans' => $jns_transaksi,
			'tgl_trans' => $tgl_trans,
			'ref_id' => $ref_id,
			'supplier_id' => $supp_id,
			'customer_id' => $cust_id,
		);

		$this->ms->update_data('transaksi_h', $data, $id_trans, 'id_trans');
		redirect('Transaksi/edit/' . $id_trans);
	}
	function editdetail_aksi()
	{
		$header_id = $this->input->post('header_id');
		$detail_id = $this->input->post('detail_id');
		$kdbarang = $this->input->post('kdbarang');
		$qty = $this->input->post('qty');
		$harga = $this->input->post('harga');


		$data = array(
			'header_id' => $header_id,
			'qty' => $qty,
			'harga' => $harga,
			'total' => $harga * $qty,
			'kdbarang' => $kdbarang,
		);
		if ($detail_id) {
			$this->ms->update_data('transaksi_d', $data, $detail_id, 'id');
		} else {
			$this->ms->input_data('transaksi_d', $data);
		}
		redirect('Transaksi/edit/' . $header_id);
	}
	public function delete($id)
	{
		$this->ms->delete('transaksi_h', $id, 'id_trans');
		redirect('Transaksi');
	}
	public function delete_d($id_header, $id)
	{
		$this->ms->delete('transaksi_d', $id, 'id');
		redirect('Transaksi/edit/' . $id_header);
	}
	public function print($id)
	{

		$this->load->library('pdfgenerator');
		$this->data['title'] = 'Form Transaksi';
		$file_pdf = 'form_bayar_';
		$paper = 'A4';
		$orientation = "potrait";
		$this->data['base'] 			= base_url();
		$query = array(
			"select" => " d.*,b.nmbarang,format(d.harga,2) hargaunit,format(d.total,2) totalharga ",
			"table" => " transaksi_d d  ",
			"join" => " LEFT JOIN barang b on b.kdbarang=d.kdbarang ",
			"where" => " header_id='$id' order by b.kdbarang ASC"
		);
		$rowdetail = $this->ms->getAlljoin($query)->result();


		$querytotal = array(
			"select" => " FORMAT(SUM(d.qty),2) qtytotal,FORMAT(SUM(d.total),2) sumtotal ",
			"table" => " transaksi_d d  ",
			"join" => " LEFT JOIN barang b on b.kdbarang=d.kdbarang ",
			"where" => " header_id='$id'  GROUP BY d.header_id "
		);
		$rowtotal = $this->ms->getAlljoin($querytotal)->row();


		$queryheader = array(
			"select" => " h.*, c.nm_cust,s.nm_supp ",
			"table" => " transaksi_h h  ",
			"join" => " LEFT JOIN customer c on h.customer_id=c.id 
			LEFT JOIN supplier s on h.supplier_id=s.id ",
			"where" => " id_trans='$id' "
		);
		$rowheader = $this->ms->getAlljoin($queryheader)->row();

		$this->data["id"] 		= $id;
		$this->data["header"] 		= $rowheader;
		$this->data["total"] 		= $rowtotal;
		$this->data["bayar"] 		= $rowdetail;
		$html = $this->load->view('transaksi/print', $this->data, true);
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);

		//$this->load->view('transaksi/print', $this->data);
	}
}
