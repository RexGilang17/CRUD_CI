<?php

class Master extends CI_Model
{
	private $table;
	// membuat encapsulation untuk properties table
	public function __construct()
	{
		parent::__construct();
	}
	function getAlljoin($query)
	{
		$table = $query['table'];
		$select = $query['select'];
		$join = $query['join'];

		$sql = "SELECT $select FROM $table $join ";

		$this->db->query($sql);
		if ($query['where'] != '') {
			$sql .= 'where ' . $query['where'];
		}
		return $this->db->query($sql);
	}
	function getAll($table)
	{
		$query = "SELECT * FROM $table ";
		return $this->db->query($query);
	}
	function input_data($table, $data)
	{
		$this->db->insert($table, $data);
	}
	function getby_id($table, $id, $idfield)
	{
		$query = "SELECT * FROM $table where $idfield='$id'";
		return $this->db->query($query);
	}
	function update_data($table, $data, $id, $idfield)
	{
		$this->db->where($idfield, $id);
		$this->db->update($table, $data);
	}
	function delete($table, $id, $idfield)
	{
		$this->db->delete(
			$table,
			array($idfield => $id)
		);
	}

	function generate_auto_number($table, $kode, $tipe)
	{
		$sql = "SELECT IFNULL(CONCAT('$tipe',LPAD(MAX(RIGHT($kode,4))+1,4,'0')), CONCAT('$tipe',LPAD(1,4,'0'))) AS nomor 
				FROM $table WHERE $kode= (SELECT MAX($kode) FROM $table ORDER BY $kode DESC) ";
		return $this->db->query($sql)->row()->nomor;
	}
}
