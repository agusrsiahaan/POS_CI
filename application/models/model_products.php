<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_products extends CI_Model {

	function get_table() 
	{
	    $table = "products";
	    return $table;
	}


	public function all(){
		//query semua record di tabel products
		$hasil = $this->db->get('products');
		if($hasil->num_rows() > 0){
			return $hasil->result();
		}else{
			return array();
		}	
	}


	function _custom_query($mysql_query) 
	{
	    $query = $this->db->query($mysql_query);
	    if($query->num_rows() > 0){
			return $query->result();
		}else{
			return array();
		}
	    // return $query;
	}


	function _insert($data)
	{
	    $table = $this->get_table();
	    $this->db->insert($table, $data);
	}

	function _update($id, $data)
	{
	    $table = $this->get_table();
	    $this->db->where('id', $id);
	    $this->db->update($table, $data);
	}

	public function find($id){
		//Query mencari record berdasarkan ID nya
		$hasil = $this->db->where('id', $id)
						  ->limit(1)
						  ->get('products');
		if ($hasil->num_rows()>0){
			return $hasil->row();
		}else{
			return array();
		}
	}

	public function create($data_products){
		//Query INSERT INTO
		$this->db->insert('products',$data_products);
	}

	public function update($id, $data_products){
		//QUERY UPDATE FROM... WHERE id
		$this->db->where('id',$id)
				 ->	update('products', $data_products);

	}

	public function delete($id){
		//QUERY DELETE..... WHERE id=.....
		$this->db->where('id', $id)
				 ->delete('products');

	}


	function pdfall()
	{
		$query = $this->db->query('Select * from orders');
		return $query;
	}

	function pdf($id)
	{
		$query = $this->db->query('Select * from orders where invoice_id = "'.$id.'"');
		return $query;
	}



}