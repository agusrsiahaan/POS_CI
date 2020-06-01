<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();

		if($this->session->userdata('group') != '1'){
			$this->session->set_flashdata('error','Sorry, You are not logged in !');
			redirect('login');	
		}
		//load model -> model_products
		$this->load->model('model_products');
	}

	public function index()
	{
		// $data['products'] = $this->model_products->all();
		// $this->load->view('backend/view_all_products',$data);

		$query = "SELECT * FROM products ORDER BY id DESC";

		$data['products'] = $this->_custom_query($query);
        $this->load->view('backend/view_all_products',$data);
	}

	function _custom_query($mysql_query) 
	{
	    $query = $this->model_products->_custom_query($mysql_query);
	    return $query;
	}


	public function view_product_admin()
	{
		$data['products'] = $this->model_products->all();
		$this->load->view('backend/view_product_for_admin',$data);
	}	
	

	public function create(){
		//form validation sebelum mengeksekusi QUERY INSERT
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		$this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');
		//$this->form_validation->set_rules('userfile', 'Product Image', 'required');

		if ($this->form_validation->run() == FALSE)
		{
			$this->load->view('backend/form_tambah_product');
		}else{

			if($_FILES['userfile']['name'] !=''){
			//form submit dengan gambar diisi

			//$gambar = $this->upload->data();
			//load uploading file library
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300'; //MB
			$config['max_width']  = '2000'; //pixels
			$config['max_height']  = '2000'; //pixels

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$data['product'] = $this->model_products->find($id);
				$this->load->view('backend/form_edit_product', $data);
			}else{
				$gambar = $this->upload->data();
				$data_product = array(
				'name'			=> set_value('name'),
				'description' 	=> set_value('description'),
				'price'			=> set_value('price'),
				'stock'			=> set_value('stock'),
				'image'			=> $gambar['file_name']

				);
				$this->_insert($data_product);
				redirect('admin/products');
			}
		  }
		}	
	}

	function _insert($data)
	{
	    $this->model_products->_insert($data);
	}

	public function update($id){
		$this->form_validation->set_rules('name', 'Product Name', 'required');
		$this->form_validation->set_rules('description', 'Product Description', 'required');
		$this->form_validation->set_rules('price', 'Product Price', 'required|integer');
		$this->form_validation->set_rules('stock', 'Available Stock', 'required|integer');

		if ($this->form_validation->run() == FALSE)
		{
			$data['product'] = $this->model_products->find($id);
			$this->load->view('backend/form_edit_product', $data);
		}else{
			if($_FILES['userfile']['name'] !=''){
			//form submit dengan gambar diisi

			//$gambar = $this->upload->data();
			//load uploading file library
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'jpg|png';
			$config['max_size']	= '300'; //MB
			$config['max_width']  = '2000'; //pixels
			$config['max_height']  = '2000'; //pixels

			$this->load->library('upload', $config);

			if ( ! $this->upload->do_upload())
			{
				$data['product'] = $this->model_products->find($id);
				$this->load->view('backend/form_edit_product', $data);
			}else{
				$gambar = $this->upload->data();
				$data_product = array(
				'name'			=> set_value('name'),
				'description' 	=> set_value('description'),
				'price'			=> set_value('price'),
				'stock'			=> set_value('stock'),
				'image'			=> $gambar['file_name']

				);
				$this->_update($id, $data_product);
				redirect('admin/products');
			}
		}else{
			//form submit dengan gambar di kosongkan
				$data_product = array(
				'name'			=> set_value('name'),
				'description' 	=> set_value('description'),
				'price'			=> set_value('price'),
				'stock'			=> set_value('stock'),
				

				);
				$this->_update($id, $data_product);
				redirect('admin/products');
			}	
		}
	}

	function _update($id, $data)
	{
	    if (!is_numeric($id)) {
	        die('Non-numeric variable!');
	    }
	    $this->model_products->_update($id, $data);
	}

	public function delete($id){
		$this->model_products->delete($id);
		redirect ('admin/products');
	}
}

