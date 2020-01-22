<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {


	public function index()
	{
		$data['titel'] = "تسجيل الدخول";
		$this->load->view("Login/index");
	}

	public function login_post()
	{
		$email    = $this->input->post('email');
		$password = $this->input->post('password');

		$user = $this->db->get_where('users' , ['email' => $email , 'password' => $password])->row();
		
		if (isset($user)) {
			
		$this->session->set_userdata('user', $user);
			redirect(base_url('index.php/admin'));
		}
		else {
			$this->session->set_flashdata('Error_massege', 'عفوا اسم المستخدم او كلمه السر غير صحيحيه');
			// After that you need to used redirect function instead of load view such as 
		

			// Get Flash data on view 
			$this->session->flashdata('Error_massege');
			redirect($_SERVER['HTTP_REFERER']);
		}	

	}


	public function log_out()
	{
		redirect(base_url('index.php/login'));	
	}
	
}
