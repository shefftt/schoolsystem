<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Api extends CI_Controller
{


	public function index()
	{
		echo json_encode($this->session->userdata('user'));
		die;
		$data['page'] = "admin/index";
		$this->load->view('templet.php', $data);
	}


	public function get_all_courses()
	{
		$category_courses = $this->db->get_where('category_courses', ['type' => 0])->result();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($category_courses));
	}

	public function get_all_single_class()
	{
		$category_courses = $this->db->get_where('category_courses', ['type' => 1])->result();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($category_courses));
	}


	public function get_course($id)
	{
		$category_courses = $this->db->get_where('courses', ['category_id' => $id])->result();
		$this->output
			->set_content_type('application/json')
			->set_output(json_encode($category_courses));
	}


	function add_single_class_post()
	{

		$school_id       =  auth_user()->school_id;
		$emplyee_id      =  auth_user()->id;
		$name            =  $this->input->get('name');
		$distance_cost  =  $this->input->get('distance_cost');
		$bank_account   =  $this->input->get('bank_account');

		$phone           =  $this->input->get('phone');
		$address         =  $this->input->get('address');
		$invited_from    =  $this->input->get('invited_from');
		$amount          =  $this->input->get('amount');
		$number_of_days  =  $this->input->get('number_of_days');
		$course_id       =  $this->input->get('course_id');
		$resgistration_type =  $this->input->get('resgistration_type');
		
		// المبلغ المدفوع بعد خصم فرق المسافه
		$amount_distance_cost         =  0;
		$amount_distance_cost         =  $amount - $distance_cost;
		// 

		$trainee = $this->db->query('SELECT count(id) as id FROM trainees WHERE phone = ' . $phone)->row()->id;

		if ($trainee > 0) {
			if ($resgistration_type === 'new') {
				return $this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode(array('message' => 'عفوا بيانات الطالب موجوده مسبقا', 'erorr' => 'true')));
			} else {
				$trainee_id = $this->db->get_where('trainees', ['phone' => $phone])->row()->id;
			}
		} else {
			$this->db->insert('trainees', array(
				'school_id'     => $school_id,
				'emplyee_id'    => $emplyee_id,
				'name'          => $name,
				'phone'         => $phone,
				'address'       => $address,
				'invited_from'  => $invited_from,
			));
			$trainee_id = $this->db->insert_id();
		}
		if ($bank_account > 0) {

			$current_balance = $this->db->get_where('banks', ['id' => $bank_account])->row()->balance;
			$sum = $current_balance + $amount;
			$this->db->insert('bank_log' , ['balance' => $amount , 'transaction' => 'in' , 'bank_id' => $bank_account , 'user_id' => auth_user()->id]);


			$this->db->query('UPDATE `banks` SET `balance` = ' . $sum . ' WHERE `id` = ' . $bank_account);
		}


		//		Enter the trainee data in the class schedule : trainees_course
		// سعر الحصه تكون ضرب سعر الحصه فى عدد الايام
		$price =  $this->db->get_where('courses', ['id' => $course_id])->row()->price * $number_of_days;

	
		$this->db->insert('trainees_course', array(
			'trainee_id'     => $trainee_id,
			'school_id'      => $school_id,
			'emplyee_id'     => $emplyee_id,
			'number_of_days' => $number_of_days,
			'course_id'      => $course_id,
			'price'          => $price,
			'paid'           => $amount_distance_cost,
			'distance_cost'  => $distance_cost,
		));

		$course_id2 = $this->db->insert_id();

		//		Enter payment information : trainees_payments
		$this->db->insert('trainees_payments', array(
			'course_id' => $course_id2,
			'amount' => $amount,
		));

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			->set_output(json_encode(array('message' => 'تمت اضافة المتدرب بنجاح ', 'course_id' => $course_id2, 'erorr' => false)));

			
	}

	public function ahmedhmed()
	{

		print_r($this->db->query('SELECT sum(id) as id FROM trainees')->row());
	}
	function add_trainee_post()
	{
		//		trainees `name`, `phone`, `address`, `invited_from`
		$school_id      =  auth_user()->school_id;
		$emplyee_id     =  auth_user()->id;
		$name           =  $this->input->get('name');
		$distance_cost  =  $this->input->get('distance_cost');

		$bank_account   =  $this->input->get('bank_account');
		$phone          =  $this->input->get('phone');
		$address        =  $this->input->get('address');
		$invited_from   =  $this->input->get('invited_from');
		$amount         =  $this->input->get('amount');
		$number_of_days =  $this->input->get('number_of_days');
		$course_id      =  $this->input->get('course_id');
		$resgistration_type =  $this->input->get('resgistration_type');

		// المبلغ المدفوع بعد خصم فرق المسافه
		$amount_distance_cost         =  0;
		$amount_distance_cost         =  $amount - $distance_cost;
		// 

		$trainee = $this->db->query('SELECT count(id) as id FROM trainees WHERE phone = ' . $phone)->row()->id;

		if ($trainee > 0) {
			if ($resgistration_type === 'new') {
				return $this->output
					->set_status_header(200)
					->set_content_type('application/json')
					->set_output(json_encode(array('message' => 'عفوا بيانات الطالب موجوده مسبقا', 'erorr' => 'true')));
			} else {
				$trainee_id = $this->db->get_where('trainees', ['phone' => $phone])->row()->id;
			}
		} else {
			$this->db->insert('trainees', array(
				'school_id'     => $school_id,
				'emplyee_id'    => $emplyee_id,
				'name'          => $name,
				'phone'         => $phone,
				'address'       => $address,
				'invited_from'  => $invited_from,
			));
			$trainee_id = $this->db->insert_id();
		}

		if ($bank_account > 0) {

			$current_balance = $this->db->get_where('banks', ['id' => $bank_account])->row()->balance;
			$sum = $current_balance + $amount;
			$this->db->insert('bank_log' , ['balance' => $amount , 'transaction' => 'in' , 'bank_id' => $bank_account , 'user_id' => auth_user()->id]);

			$this->db->query('UPDATE `banks` SET `balance` = ' . $sum . ' WHERE `id` = ' . $bank_account);
		}


		//		Enter the trainee data in the class schedule : trainees_course
		$price =  $this->db->get_where('courses', ['id' => $course_id])->row()->price;

		$this->db->insert('trainees_course', array(
			'trainee_id'     => $trainee_id,
			'school_id'      => $school_id,
			'emplyee_id'     => $emplyee_id,
			'number_of_days' => $number_of_days,
			'course_id'      => $course_id,
			'price'          => $price,
			'paid'           => $amount_distance_cost,
			'distance_cost'  => $distance_cost,
		));

		$course_id2 = $this->db->insert_id();

		//		Enter payment information : trainees_payments
		$this->db->insert('trainees_payments', array(
			'course_id' => $course_id2,
			'amount' => $amount,
		));

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode(array('message' => 'تمت اضافة المتدرب بنجاح ', 'course_id' => $course_id2, 'erorr' => false)));
	}

	public function get_new_trainees()
	{
		$trainees_course = $this->db->select('*')
			->from('trainees_course')
			->where('trainees.complete', 0)
			->join('trainees', 'trainees.id = trainees_course.trainee_id')
			->join('courses', 'courses.id = trainees_course.trainee_id')
			// ->join('companies', 'companies.id = trips.company_id', 'LEFT')
			->get()->result();
		return $this->output
			->set_status_header(200)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($trainees_course));
	}



	public function cars()
	{
		$cars = $this->db->get('cars')->result();

		return $this->output
			->set_status_header(200)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($cars));
	}



	function add_car_post()
	{

		// cars `name`, `model`, ``
		$name         =  $this->input->get('name');
		$model        =  $this->input->get('model');
		$car_nmuber   =  $this->input->get('car_nmuber');

		$this->db->insert('cars', array(
			'name' => $name,
			'model' => $model,
			'car_nmuber' => $car_nmuber,
		));


		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode(array('message' => 'تمت اضافة السياره بنجاح ')));
	}



	function pay()
	{

		$course_id  =  $this->input->get('course_id');
		$amount     =  $this->input->get('amount');
		$trainees_course_id     =  $this->input->get('trainees_course_id');
		$auth = $this->input->request_headers()['username'];

		if (isset($auth)) {
			$this->db->insert('trainees_payments', array(
				'course_id' => $course_id,
				'amount'    => $amount,
				'trainees_course_id'    => $trainees_course_id,
			));


			return $this->output
				->set_status_header(201)
				->set_content_type('application/json')
				// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
				->set_output(json_encode(array('message' => 'تم الدفع بنجاح')));
		} else {
			return $this->output
				->set_status_header(201)
				->set_content_type('application/json')
				// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
				->set_output(json_encode(array('message' => 'عفوا لي لديك الصلاحيه لاضافة العنصر')));
		}
	}

	public function add_class_post()
	{

		// trainees_course `id`, `trainee_id`, `trainer_id`, `price`, `start_date`, `end_date`, `created_at`, `course_id`, `number_of_days`

		$trainees_course_id = $this->input->get('id');
		$price              =  $this->input->get('price');
		$start_date         =  $this->input->get('start_date');
		$end_date           =  $this->input->get('end_date');
		$course_id          =  $this->input->get('course_id');
		$trainer_id         =  $this->input->get('trainer_id');
		$number_of_days     =  $this->input->get('number_of_days');
		$class_time         =  $this->input->get('class_time');

		$this->db->where('id', $trainees_course_id);
		$this->db->update('trainees_course', compact('start_date', 'end_date', 'trainer_id'));

		// classes `id`, `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `created_at`


		$start_date_formtated = new DateTime($start_date);


		for ($i = 0; $i < $number_of_days; $i++) {

			$start_date_formtated->add(new DateInterval('P1D'));
			$this->db->insert('classes', [
				'class_time' => $class_time,
				'trainer_id' => $trainer_id,
				'trainees_course_id' => $trainees_course_id,
				'class_date' => $start_date_formtated->format('Y-m-d'),
			]);
		}
		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			// ->set_output(json_encode(array('message' => 'تمت اضافة السياره بنجاح ')));	
			->set_output(json_encode(array('message' => $trainees_course_id)));
	}


	public function get_trainer_info()
	{

		$trainer_id =  1; //$this->input->get('trainer');
		$today   = date("Y/m/d");

		$classes = $this->db->get_where('classes', ['class_date <' => $today, 'trainer_id' => $trainer_id])->result();

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($classes));
	}

	/**
	 * get_techaers_transformation function
	 * جلب الاستاذه عند تحويل حصه يتم ارسال تاريخ الحصه وزمن الحصه
	 *
	 * @return void
	 */
	public function get_techaers_transformation()
	{


		$start_date   = "('" . $this->input->get('class_date') . "')";
		$format_start_date = new DateTime($this->input->post('class_date'));
		$class_time   = $this->input->get('class_time');

		$dayes = [];



		$trainers = $this->db->get_where('trainers')->result();
		$busy_trainers = $this->db->query("SELECT distinct  `trainer_id` FROM classes WHERE class_time = '" . $class_time . "' and `class_date`  IN " . $start_date)->result();

		$trainers_array = [];
		$i = 0;
		foreach ($busy_trainers as $trainers) {
			$trainers_array[$i] = $trainers->trainer_id;
			$i++;
		}


		$in_trainers = "('" . implode("','", $trainers_array) . "')";
		$trainers = $this->db->query("SELECT distinct  * FROM trainers WHERE   `id` NOT  IN " . $in_trainers . " and `status` = '1'")->result();

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($trainers));
	}

	public function get_techaers()
	{


		$start_date   = $this->input->get('start_date');
		$format_start_date = new DateTime($this->input->post('start_date'));
		$course_id    = $this->db->get_where('trainees_course', ['id' =>  $this->input->get('course_id')])->row()->course_id;
		$class_time   = $this->input->get('class_time');

		$dayes = [];


		$number_of_days = $this->db->get_where('courses', ['id' => $course_id])->row()->number_of_days;

		$trainers = $this->db->get_where('trainers')->result();

		for ($i = 1; $i < $number_of_days; $i++) {
			// اذا كان اليوم جمعه اضافة يوم اضافى
			if ($format_start_date->format('D')  == "Thu") {
				$format_start_date->modify('+2 day');
				$dayes[$i] = $format_start_date->format('Y-m-d');
			} else {

				$format_start_date->modify('+1 day');
				$dayes[$i] = $format_start_date->format('Y-m-d');
			}
		}



		$in = "('" . implode("','", $dayes) . "')";
		$busy_trainers = $this->db->query("SELECT distinct  `trainer_id` FROM classes WHERE class_time = '" . $class_time . "' and `class_date`  IN " . $in)->result();

		$trainers_array = [];
		$i = 0;
		foreach ($busy_trainers as $trainers) {
			$trainers_array[$i] = $trainers->trainer_id;
			$i++;
		}


		$in_trainers = "('" . implode("','", $trainers_array) . "')";
		$trainers = $this->db->query("SELECT distinct  * FROM trainers WHERE   `id` NOT  IN " . $in_trainers . " and `status` = '1'")->result();

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($trainers));
	}

	public function get_all_techaers()
	{
		$trainers = $this->db->get_where('trainers')->result();

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($trainers));
	}

	public function get_users()
	{
		$table = $this->input->get('table');
		$users = $this->db->get_where($table)->result();

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode($users));
	}






	public function get_techaer_course()
	{

		$start_date         =  $this->input->get('start_date');

		$trainers = $this->db->get_where('trainers')->result();

		return $this->output
			->set_status_header(201)
			->set_content_type('application/json')
			// ->set_output(json_encode(array('message' => 'Trainee data successfully added ')));
			->set_output(json_encode(rand(1000, 10000000)));
	}
}
