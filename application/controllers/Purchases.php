<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Purchases extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		if (isset($this->session->userdata('user')->id) and $this->session->userdata('user')->id > 0) {
			# code...
		} else {
			redirect(base_url('index.php/login'));
		}
		// die($_SERVER['PHP_SELF']);
	}

	public function index()
	{
		// 	$this->db->select('SUM(amount) AS amount', FALSE);
		// 	$data['amount'] = $this->db->get('trainees_payments')->row()->amount;

		$data['title'] = "المتشريات";
		$data['page'] = "Purchases/index";
		$this->load->view('templet.php', $data);
	}

	public function suppliers()
	{

// 		$data['suppliers'] = $this->suppliers->all();
		$data['suppliers'] = $this->db->get('suppliers')->result();
		$data['title'] = "جميع الموردين";
		$data['page'] = "Purchases/suppliers/index";
		$this->load->view('templet.php', $data);
	}


	public function supplier_add()
	{

		$data['title'] = "اضافة مورد";
		$data['page'] = "Purchases/suppliers/supplier_add";
		$this->load->view('templet.php', $data);
	}

	public function supplier_add_post()
	{
		// suppliers `name`, `phone`
		$name = $this->input->post('name');;
		$phone = $this->input->post('phone');

		$this->suppliers->create(compact('name', 'phone'));
		redirect('/purchases/suppliers');
	}
	public function supplier($id)
	{

		$data['supplier'] = $supplier = $this->suppliers->find($id);
		$data['title'] = " -  مورد" . $supplier->name;
		$data['page'] = "Purchases/suppliers/supplier";
		$this->load->view('templet.php', $data);
	}


	public function stocks()
	{

		$data['stocks'] = $this->stocks->all();

		$data['title'] = "ادارة المخازن";
		$data['page'] = "Purchases/stocks/index";
		$this->load->view('templet', $data);
	}

	public function stock($id)
	{

		$stoks = $this->db->get_where('stocks', ['id' => $id])->row();
		$data['stock_prodcts'] = $this->db->get_where('stock_prodcts', ['id' => $id])->result();

		$data['title'] = "ادارة المخزن" . $stoks->name;
		$data['page'] = "admin/stock/index";
		$this->load->view('templet', $data);
	}

	public function stock_add()
	{
		$data['stock_cat'] = $this->db->get('stock_cat')->result();


		$data['title'] = "اضافة منتج جديد";
		$data['page'] = "Purchases/stocks/stock_add";
		$this->load->view('templet', $data);
	}

	public function post_add_stock()
	{
		$stock_cat_id =  $this->input->post('stock_cat_id');
		$name         =  $this->input->post('name');

		$this->db->insert('stock_prodcts', ['stock_cat_id' => $stock_cat_id, 'name' => $name]);
		redirect('admin/stock');
		echo "post_add_stock";
	}
}
