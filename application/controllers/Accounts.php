<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Accounts extends CI_Controller
{


	public function index()
	{
		$data['start'] = $start = date("Y-m-d H:i:s");
		$data['end']   = $end   =  date_format(date_create(date("Y-m-d") . ' 23:59:59.999'), "Y-m-d H:i:s");
		$data['amunt'] = $this->db->query("SELECT sum(amunt) as amunt FROM accounts_log where created_at between '" . $start . "' AND   '" . $end . "'")->row()->amunt;

		$date = date_create(date('Y-m-d'));
		$from = date_format($date, "Y-m-d");
		$to = date_format($date, "Y-m-d");
		$data['amount'] = $this->db->query("SELECT sum(amount) as amount FROM trainees_payments where `created_at` >=  '$from'  AND `created_at` <=  '$to'  ")->row()->amount;
		$data['pocket'] = $this->system->find(1)->pocket;


		$data['titel'] = "الحسابات";
		$data['page'] = "accounts/index";
		$this->load->view('templet.php', $data);
	}




	public function revenue_period()
	{


		if ($this->input->post('account') == NULL) {

			$data['start'] = $start = date("Y-m-d H:i:s");
			$data['end']   = $end   =  date_format(date_create(date("Y-m-d") . ' 23:59:59.999'), "Y-m-d H:i:s");
			
		} else {
			$data['start'] = $start = date_format(date_create($this->input->post('start')), "Y-m-d H:i:s");
			$data['end']   = $end   = date_format(date_create($this->input->post('end') . '23:59:59.999'), "Y-m-d H:i:s");
		}

		// $data['accounts_log'] = $this->db->query("SELECT * FROM accounts_log where created_at >=  '" . $start . "' AND created_at <=  '" . $end . "'")->result();
		$data['accounts_log'] = $this->db->query("SELECT * FROM accounts_log where created_at between '" . $start . "' AND   '" . $end . "'")->result();

		$data['titel'] = "ايراد لفتره";
		$data['page'] = "accounts/revenue_period";
		$this->load->view('templet.php', $data);
	}
}
