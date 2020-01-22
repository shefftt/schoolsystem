<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        if (isset($this->session->userdata('user')->id) and $this->session->userdata('user')->id > 0) {
            # code...
        } else {
            redirect(base_url('index.php/login'));
        }
        // die($_SERVER['PHP_SELF']);
    }

    public function index() {

        $data['loans'] = $this->db->get_where('loans', ['status' => 0])->result();
        $data['page'] = "admin/index";
        $this->load->view('templet.php', $data);
    }

//////////////////////////////////////////// بدايه السيارات ///////////////////////////////////////////////////////

    public function cars() {
        
        $data['cars'] = $this->db->get('cars')->result();
        $data['titel'] = "عرض كافة السيارات";
        $data['page'] = "admin/cars/cars";
        $this->load->view('templet', $data);
    }

    public function car($id) {

        $data['car'] = $car = $this->db->get_where('cars', ['id' => $id])->row();
        $data['fuel_history'] = $this->db->get_where('fuel_history', ['car_id' => $id])->result();

        $data['titel'] = "عرض بيانات  " . $car->car_nmuber;
        $data['page'] = "admin/cars/car";
        $this->load->view('templet', $data);
    }

    public function car_edit($id) {


        $data['car'] = $car = $this->db->get_where('cars', ['id' => $id])->row();

        $data['titel'] = "تعديل بيانات  " . $car->car_nmuber;
        $data['page'] = "admin/cars/car_edit";
        $this->load->view('templet', $data);
    }

    public function car_edit_post() {
        echo "car_edit";
    }

    public function car_add() {
        $data['titel'] = "اضافة سياره  ";
        $data['page'] = "admin/cars/car_add";
        $this->load->view('templet', $data);
    }

    public function car_add_post() {

        $name = $this->input->post('name');
        $model = $this->input->post('model');
        $car_nmuber = $this->input->post('car_nmuber');
        $insurance_starting_date = $this->input->post('insurance_starting_date');
        $insurance_ending_date = $this->input->post('insurance_ending_date');
        $license_date = $this->input->post('license_date');
        $manufacturing = $this->input->post('manufacturing');




        $this->db->insert('cars', compact('name', 'model', 'car_nmuber', 'insurance_starting_date', 'insurance_ending_date', 'license_date', 'manufacturing'));

        $this->session->set_flashdata('success_message', 'تمت اضافة بيانات السياره بنجاح');
        redirect(base_url() . 'index.php/admin/cars');
    }

    //////////////////////////////////////////// نهايه السيارت ///////////////////////////////////////////////////////
    //////////////////////////////////////////// بدايه السابات ///////////////////////////////////////////////////////


    public function account($id) {

        $data['account'] = $account = $this->db->get_where('accounts', ['id' => $id])->row();
        $data['account_id'] = $account->id;
        $data['account_name'] = $account->name;
        $data['accounts_log'] = $this->db->get_where('accounts_log', ['accounts_id' => $account->id])->result();

        $data['titel'] = "تفاصيل حساب - " . $account->name;
        $data['page'] = "admin/accounts/index";
        $this->load->view('templet', $data);
    }

    public function account_log_post() {
        // accounts_log `amunt`, `note`, `accounts_id`
        $amunt = $this->input->post('amunt');
        $note = $this->input->post('note');
        $accounts_id = $this->input->post('accounts_id');

        $pocket = $this->db->get_where('system', ['id' => 1])->row();
        if (!isset($pocket->pocket) or $pocket->pocket < $amunt) {

            $this->session->set_flashdata('success_message', 'عفوا النثريه غير كافيه');
            redirect(base_url() . 'index.php/admin/account/' . $accounts_id);
        } else {
            if ($amunt < 1) {

                $this->session->set_flashdata('error_message', 'عفوا المبلغ اجبارى ');
                redirect(base_url() . 'index.php/admin/account/' . $accounts_id);
            }

            $this->db->insert('accounts_log', compact('amunt', 'note', 'accounts_id'));

            $x = $pocket->pocket - $amunt;
            $this->db->query('UPDATE `system` SET `pocket` = ' . $x . ' WHERE `system`.`id` = 1');

            $this->session->set_flashdata('success_message', 'تمت اضافة المبلغ بنجاح');
            redirect(base_url() . 'index.php/admin/account/' . $accounts_id);
        }
    }

    public function account_add() {

        $data['accounts'] = $this->db->get_where('accounts', ['sub_id' => 0])->result();
        $data['titel'] = "الحسابات";
        $data['page'] = "admin/accounts/account_add";
        $this->load->view('templet', $data);
    }

    public function account_add_post() {
        // accounts `id`, `name`, `sub_id`
        $name = $this->input->post('name');
        $sub_id = $this->input->post('sub_id');

        $this->db->insert('accounts', compact('name', 'sub_id'));

        $this->session->set_flashdata('success_message', 'تمت اضافة بيانات الحساب بنجاح');
        redirect(base_url() . 'index.php/admin/account_add');
    }

    //////////////////////////////////////////// نهايه الحسابات ///////////////////////////////////////////////////////
    ////////////////////////////////////////////  بدايه الوقود ///////////////////////////////////////////////////////

    public function fuel() {
        $balance = 0;
        $number_of_tickets = 0;


        $data['fuel_tickets'] = $fuel_tickets = $this->db->get('fuel_tickets')->result();

        foreach ($fuel_tickets as $fuel)
            $balance += $fuel->balance;



        $data['fuel_history'] = $fuel_history = $this->db->get('fuel_history')->result();

        foreach ($fuel_history as $history)
            $number_of_tickets += $history->number_of_tickets;



        $data['fuel_balance'] = $balance - $number_of_tickets;
        $data['titel'] = "الوقود";
        $data['page'] = "admin/fuel/fuel";
        $this->load->view('templet', $data);
    }

    public function fuel_post() {
        // fuel_tickets `balance`
        $balance = $this->input->post('balance');
        $this->db->insert('fuel_tickets', compact('balance'));

        $this->session->set_flashdata('success_message', 'تمت اضافة بيانات السياره بنجاح');
        redirect(base_url() . 'index.php/admin/fuel');
    }

    ////////////////////////////////////////////  نهايه الوقود ///////////////////////////////////////////////////////
//////////////////////////////////////////// بدايه المدربين ///////////////////////////////////////////////////////

    public function trainers() {
        $data['trainers'] = $this->db->get('trainers')->result();


        $data['titel'] = "عرض كل المدربين";
        $data['page'] = "admin/trainers/index";
        $this->load->view('templet', $data);
    }

    public function trainer($id) {

        $sum = 0;
        $price = 0;

        $classes = $this->db->get_where('classes', ['trainer_id' => $id, 'stratus' => 0])->result();
        // echo $this->db->last_query();
        // die;
        foreach ($classes as $classe) {
            $course_id = $this->db->get_where('trainees_course', ['id' => $classe->trainees_course_id])->row()->course_id;
            $courses = $this->db->get_where('courses', ['id' => $course_id])->row();
            $sum += $courses->allowance;
        }
        // echo $sum;
        // die;
        $today = date("Y-m-d");

        $data['sum'] = $sum;
        $data['trainer_id'] = $id;
        $data['trainer'] = $this->db->get_where('trainers', ['id' => $id])->row();

        $this->db->select('*');
        $this->db->where('class_date >= ', $today);
        $this->db->where('trainer_id ', $id);
        $this->db->where('stratus ', 0);
        $this->db->order_by("class_date asc");
        $this->db->distinct();
        $this->db->from('classes');
        $data['class_date'] = $class_date = $this->db->get()->result();



        $this->db->select('class_date');
        $this->db->where('class_date >= ', $today);
        $this->db->where('trainer_id = ', $id);
        $this->db->where('stratus ', 0);
        $this->db->order_by("class_date asc");
        $this->db->from('classes');
        $data['all_class_data'] = $class_date = $this->db->get()->result();

        $data['titel'] = "عرض كافة ";
        $data['page'] = "admin/trainer";
        $this->load->view('templet', $data);
    }

    /**
     * القروش لمتدرب معين
     *
     * @return void
     */
    public function trainer_loans($id) {
        $data['trainer'] = $trainer = $this->db->get_where('trainers', ['id' => $id])->row();
        $data['deductions'] = $trainer = $this->db->get_where('deductions', ['user_id' => $id])->result();

        $data['titel'] = "عرض كافة ";
        $data['page'] = "admin/trainers/trainer_loans";
        $this->load->view('templet', $data);
    }

    /**
     * القروش لمتدرب معين
     *
     * @return void
     */
    public function trainer_deductions($id) {
        $data['trainer'] = $trainer = $this->db->get_where('trainers', ['id' => $id])->row();
        $data['deductions'] = $trainer = $this->db->get_where('deductions', ['user_id' => $id])->result();

        $data['titel'] = "عرض كافة ";
        $data['page'] = "admin/trainers/trainer_deductions";
        $this->load->view('templet', $data);
    }

    public function Certificates() {


        $data['titel'] = "استخراج شهاده";
        $data['page'] = "admin/certificates/index";
        $this->load->view('templet', $data);
    }

    public function certificates_post() {
        // print_r($_POST);


        $data['name'] = $_POST['name'];

        $gender = $this->input->post('gender');
        if ($gender == "male") {
            $data['gender'] = "اكمل";
        } else {
            $data['gender'] = "اكملت";
        }





        // رخصه ملاكى
        if ($this->input->post('license') == "license_1") {
            $data['titel'] = "رخصه ملاكي";

            $this->load->view('admin/certificates/license_1', $data);
        } else {
            $data['titel'] = "رخصه  عامه";

            $this->load->view('admin/certificates/license_2', $data);
        }
    }

    public function trainer_edit($id) {
        $data['trainer'] = $course = $this->db->get_where('trainers', ['id' => $id])->row();

        $data['cars'] = $cars = $this->db->get('cars')->result();


        $data['titel'] = "تعديل بيانات مدرب";
        $data['page'] = "admin/trainers/trainer_edit";

        $this->load->view('templet', $data);
    }

    public function trainer_edit_post() {

        // courses `id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at`
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');

        $car_id = $this->input->post('car_id');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');



        $this->db->where('id', $id);
        $this->db->update('trainers', compact('name', 'phone', 'car_id', 'address', 'gender'));

        $this->session->set_flashdata('success_message', 'تمت تعديل بيانات المدرب بنجاح');
        redirect(base_url() . 'index.php/admin/trainers');
    }

    public function trainer_add() {
        $data['cars'] = $cars = $this->db->get('cars')->result();
        $data['schols'] = $cars = $this->db->get('schols')->result();


        $data['titel'] = "اضافة مدرب";
        $data['page'] = "admin/trainers/trainer_add";

        $this->load->view('templet', $data);
    }

    public function trainer_add_post() {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');

        $car_id = 1; //$this->input->post('car_id');
        $address = $this->input->post('address');
        $gender = $this->input->post('gender');




        $this->db->insert('trainers', compact('name', 'phone', 'car_id', 'address', 'gender'));

        $this->session->set_flashdata('success_message', 'تمت اضافة بيانات المدرب بنجاح');
        redirect(base_url() . 'index.php/admin/trainers');
    }

    public function trainer_deactivate($id) {
        $status = $this->db->get_where('trainers', ['id' => $id])->row()->status;
        if ($status == 0) {
            $status = 1;
        } else {
            $status = 0;
        }

        $this->db->where('id', $id);
        $this->db->update('trainers', ['status' => $status]);

        $this->session->set_flashdata('success_message', 'تمت ايقاف  المدرب ');
        redirect(base_url() . 'index.php/admin/trainers');
    }

//////////////////////////////////////////// نهايه المدربين ///////////////////////////////////////////////////////


    public function class_start($id) {
        $this->db->where('id', $id);
        $this->db->update('classes', ['stratus' => 1, 'color_style' => 'var(--indigo)']);
        redirect('Admin/current_course');
    }

    public function stock($id) {

        $stoks = $this->db->get_where('stocks', ['id' => $id])->row();
        $data['stock_prodcts'] = $this->db->get_where('stock_prodcts', ['id' => $id])->result();

        $data['titel'] = "ادارة المخزن" . $stoks->name;
        $data['page'] = "admin/stock/index";
        $this->load->view('templet', $data);
    }

    public function add_stock() {
        $data['stock_cat'] = $this->db->get('stock_cat')->result();


        $data['titel'] = "اضافة منتج جديد";
        $data['page'] = "admin/stock/add_stock";
        $this->load->view('templet', $data);
    }

    public function post_add_stock() {
        $stock_cat_id = $this->input->post('stock_cat_id');
        $name = $this->input->post('name');

        $this->db->insert('stock_prodcts', ['stock_cat_id' => $stock_cat_id, 'name' => $name]);
        redirect('admin/stock');
        echo "post_add_stock";
    }

    public function current_course() {
        $data['trainers'] = $this->db->get('trainers')->result();
        $data['current_date'] = $current_date = date('Y-m-d');


        $data['titel'] = "عرض الدورات الحاله ليوم " . $current_date;
        $data['page'] = "current_course";
        $this->load->view('templet', $data);
    }

    public function current_course2() {

        $class_date = date('Y-m-d');
        $data['class_time'] = $class_time = date('H') * 1;



        $data['classes'] = $classes = $this->db->get_where('classes', ['class_date' => $class_date, 'class_time' => $class_time, 'stratus' => 0])->result();
        $data['titel'] = "عرض الدورات الحاله ليوم ";
        $data['page'] = "admin/current_course2";
        $this->load->view('templet', $data);
    }

    /////////////////////////////////////////// بدايه اعداد الدورات التدربيبه /////////////////////////////////////////// 


    public function courses() {
        $data['courses'] = $classes = $this->db->get('courses')->result();
        $data['titel'] = "عرض كل الكورسات";
        $data['page'] = "admin/courses/courses";
        $this->load->view('templet', $data);
    }

    /**
     * @param int $id this id of user
     */
    public function course($id) {
        $data['titel'] = "عرض الدورات الحاله ليوم ";
        $data['page'] = "admin/courses/course";
        $this->load->view('templet', $data);
    }

    public function course_add() {

        $data['category_courses'] = $this->db->get('category_courses')->result();
        $data['titel'] = "عرض الدورات الحاله ليوم ";
        $data['page'] = "admin/courses/course_add";

        $this->load->view('templet', $data);
    }

    public function course_add_post() {

        // courses `id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at`
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $category_id = $this->input->post('category_id');
        $allowance = $this->input->post('allowance');
        $number_of_days = $this->input->post('number_of_days');
        $vip = $this->input->post('vip');

        $this->db->insert('courses', compact('price', 'name', 'allowance', 'category_id', 'number_of_days', 'vip'));

        $this->session->set_flashdata('success_message', 'تمت اضافة الدورة بنجاح');
        redirect(base_url() . 'index.php/admin/courses');
    }

    public function course_edit($id) {

        $data['category_courses'] = $this->db->get('category_courses')->result();
        $data['course'] = $course = $this->db->get_where('courses', ['id' => $id])->row();

        $data['titel'] = "تعديل كورس";
        $data['page'] = "admin/courses/course_edit";

        $this->load->view('templet', $data);
    }

    public function course_edit_post() {
        // courses `id`, `price`, `name`, `allowance`, `category_id`, `number_of_days`, `vip`, `created_at`
        $category_id = $this->input->post('category_id');
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $price = $this->input->post('price');
        $allowance = $this->input->post('allowance');
        $number_of_days = $this->input->post('number_of_days');
        $vip = $this->input->post('vip');

        $this->db->where('id', $id);


        $this->db->update('courses', compact('id', 'category_id', 'price', 'name', 'allowance', 'category_id', 'number_of_days', 'vip'));

        $this->session->set_flashdata('success_message', 'تمت تعديل الدورة بنجاح');
        redirect(base_url() . 'index.php/admin/courses');
    }

    ///////////////////////////////////////////نهايه اعداد الدورات التدربيبه /////////////////////////////////////////// 
    ////////////////////////////////////////// بدايه المتدربين /////////////////////////////////////////// 

    public function trainees() {


        $data['trainees'] = $this->db->get('trainees')->result();

        $data['titel'] = "المتدربين";
        $data['page'] = "admin/trainees/trainees";

        $this->load->view('templet', $data);
    }

    public function trainee($id, $course_id = 0) {
        if ($course_id > 0) {

            $data['trainee'] = $trainees = $this->db->get_where('trainees', ['id' => $id])->row();
            $data['trainees_course'] = $trainees_course = $this->db->get_where('trainees_course', ['trainee_id' => $id, 'id' => $course_id])->result();
            $data['trainees_payments'] = $trainees_payments = $this->db->get_where('trainees_payments', ['course_id' => $course_id])->result();
            $sum = 0;
            foreach ($trainees_payments as $payments) {
                $sum += $payments->amount;
            }

            $data['sum'] = $sum;
            $data['titel'] = " - ملف المتدرب " . $trainees->name;
            $data['page'] = "admin/trainees/trainee_course";
            $this->load->view('templet', $data);
        } else {

			$data['trainee'] = $trainees = $this->db->get_where('trainees', ['id' => $id])->row();
			$data['banks'] = $this->db->get('banks')->result();
			
            $data['trainees_course'] = $trainees_course = $this->db->get_where('trainees_course', ['trainee_id' => $id])->result();


            $data['titel'] = " - ملف المتدرب " . $trainees->name;
            $data['page'] = "admin/trainees/index";
            $this->load->view('templet', $data);
        }
    }

    public function freeze($id) {
        $this->db->where('id', $id);
        $this->db->update('classes', ['stratus' => 3]);

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function freeze_all($id) {
        $this->db->query("UPDATE classes SET `stratus` = 3  WHERE `trainees_course_id` = '" . $id . "' AND `stratus` = 0 ");

        redirect($_SERVER['HTTP_REFERER']);
    }

    public function transformation($id) {
        $data['classes'] = $classes = $this->db->get_where('classes', ['id' => $id])->row();
        $data['course'] = $trainees_course = $this->db->get_where('trainees_course', ['id' => $classes->trainees_course_id])->row();
        $data['trainee'] = $trainees = $this->db->get_where('trainees', ['id' => $trainees_course->course_id])->row();



        $data['titel'] = " - ملف تحول - فك تجميد ";
        $data['page'] = "admin/trainees/transformation";
        $this->load->view('templet', $data);
    }

    public function transformation_post() {
        // trainees_course ``, ``, `price`, ``, `end_date`, ``, `course_id`, `number_of_days`
        $id = $this->input->post('id');
        $trainer_id = $this->input->post('trainer_id');
        $class_date = $this->input->post('class_date');
        $class_time = $this->input->post('class_time');
        $trainee_id = $this->input->post('trainee_id');

        $format_start_date = new DateTime($class_date);




        if ($trainer_id == null) {

            $this->session->set_userdata('techer_error', "الرجاء اختيار الاستاذ");
            $_SESSION['some_name'] = "الرجاء اختيار الاستاذ";
            // unset($_SESSION['some_name']);
            redirect($_SERVER['HTTP_REFERER']);
        }

        $now = date('d.m.Y', strtotime("-1 days"));



        if (strtotime($format_start_date->format('Y-m-d')) <= $now) {
            $_SESSION['some_name'] = "لايمكن اختيار تاريخ او زمن  سابق";
            // unset($_SESSION['some_name']);
            redirect($_SERVER['HTTP_REFERER']);
        }
        // echo $id;
        // die;
        $trainees_course_id = $this->db->get_where('classes', ['id' => $id])->row()->trainees_course_id;
        $this->db->where('id', $id);
        $this->db->update('classes', [
            'class_date' => $class_date,
            'stratus' => 0,
            'class_time' => $class_time,
            'trainer_id' => $trainer_id,
        ]);


        redirect(base_url('index.php/admin/trainee/' . $trainee_id . '/' . $trainees_course_id));
    }

    public function tip_class($id) {

        $data['course'] = $trainees_course = $this->db->get_where('trainees_course', ['id' => $id])->row();
        $data['trainee'] = $trainees = $this->db->get_where('trainees', ['id' => $trainees_course->course_id])->row();



        $data['titel'] = " - ملف تحول - فك تجميد ";
        $data['page'] = "admin/trainees/tip_class";
        $this->load->view('templet', $data);
    }

    public function tip_class_post() {
        print_r($_POST);

        // trainees_course ``, ``, `price`, ``, `end_date`, ``, `course_id`, `number_of_days`
        $trainer_id = $this->input->post('trainer_id');
        $class_date = $this->input->post('class_date');
        $class_time = $this->input->post('class_time');
        $trainee_id = $this->input->post('trainee_id');
        $trainees_course_id = $this->input->post('trainees_course_id');

        $format_start_date = new DateTime($class_date);




        if ($trainer_id == null) {

            $this->session->set_userdata('techer_error', "الرجاء اختيار الاستاذ");
            $_SESSION['some_name'] = "الرجاء اختيار الاستاذ";
            // unset($_SESSION['some_name']);
            redirect($_SERVER['HTTP_REFERER']);
        }

        $now = time();


        if (strtotime($format_start_date->format('Y-m-d')) <= $now) {
            $_SESSION['some_name'] = "لايمكن اختيار تاريخ او زمن  سابق";
            // unset($_SESSION['some_name']);
            redirect($_SERVER['HTTP_REFERER']);
        }
        // echo $id;
        // die;

        $this->db->insert('classes', [
            'class_date' => $class_date,
            'stratus' => 0,
            'class_time' => $class_time,
            'trainer_id' => $trainer_id,
            'trainees_course_id' => $trainees_course_id,
            'type' => 1,
        ]);


        redirect(base_url('index.php/admin/trainee/' . $trainee_id . '/' . $trainees_course_id));
    }

    public function add_trainee() {

        $data['category_courses'] = $this->db->get('category_courses')->result();
        $data['banks'] = $this->db->get('banks')->result();
        $data['titel'] = "اضافة متدرب جديد";


        $data['page'] = "admin/add_trainee";
        $data['title'] = "اضافة متدرب جديد";
        $this->load->view('templet.php', $data);
    }

    public function print_table($id) {
        $data['course'] = $trainees_cours = $this->db->get_where('trainees_course', ['id' => $id])->row();
        // $data['classes'] = $classes = $this->db->get_where('classes' ,['trainees_course_id' => $id])->result();

        $data['classes'] = $classes = $this->db->query("SELECT * FROM classes WHERE trainees_course_id = '" . $id . "' ORDER BY class_date ASC")->result();

// print_r($classes);

        $this->load->view('admin/print_table.php', $data);
    }

    public function add_single_class() {

        $data['category_courses'] = $this->db->get_where('category_courses', ['type' => 1])->result();
        $data['titel'] = "اضافة متدرب جديد";

        $data['banks'] = $this->db->get('banks')->result();

        $data['page'] = "admin/add_single_class";
        $data['title'] = "اضافة متدرب جديد";
        $this->load->view('templet.php', $data);
    }

    public function new_trainees() {

        $data['category_courses'] = $this->db->get('category_courses')->result();
        $data['titel'] = "اضافة متدرب جديد";


        $data['page'] = "admin/new_trainees";
        $data['title'] = "عرض الطلاب الجدد";
        $this->load->view('templet.php', $data);
    }

    public function class_add($id) {

        $data['category_courses'] = $this->db->get('category_courses')->result();


        $data['page'] = "admin/trainees/class_add";
        $data['title'] = "اختيار كلاس";
        $this->load->view('templet.php', $data);
    }

    public function trainees_course() {

        $data['trainees_course'] = $this->db->get_where('trainees_course', ['start_date' => ""])->result();


        $data['page'] = "admin/trainees/trainees_course";
        $data['title'] = "اختيار الكورس للمتدربين";
        $this->load->view('templet.php', $data);
    }

    /**
     * اختيار الكورس المتسلسل 
     */
    public function sieral($id) {

        $data['course'] = $trainees_course = $this->db->get_where('trainees_course', ['id' => $id])->row();

        if (!isset($trainees_course->start_date))
            redirect('admin');

        if ($trainees_course->start_date != "")
            redirect('admin');

        $data['page'] = "admin/trainees/sieral";
        $data['title'] = "كورس متسلسل";
        $this->load->view('templet.php', $data);
    }

    public function sieral_post() {
        // trainees_course ``, ``, `price`, ``, `end_date`, ``, `course_id`, `number_of_days`
        $trainee_id = $this->input->post('trainee_id');
        $trainer_id = $this->input->post('trainer_id');
        $start_date = $this->input->post('start_date');
        $course_id = $this->input->post('course_id');
        $number_of_days = $this->input->post('number_of_days');
        $start_date = $this->input->post('start_date');

        // تحويل التاريخ من ن عدى الى تاريخ لكى يتم اضافة عدد الايام
        $format_start_date = new DateTime($this->input->post('start_date'));



        if ($trainer_id == null) {

            $this->session->set_userdata('techer_error', "الرجاء اختيار الاستاذ");
            $_SESSION['some_name'] = "الرجاء اختيار الاستاذ";
            // unset($_SESSION['some_name']);
            redirect($_SERVER['HTTP_REFERER']);
        }

        $now = time();

        if (strtotime($format_start_date->format('Y-m-d')) < date('d.m.Y', strtotime("-1 days"))) {
            $_SESSION['some_name'] = "لايمكن اختيار تاريخ سابق";
            // unset($_SESSION['some_name']);
            redirect($_SERVER['HTTP_REFERER']);
        }




        // classes `trainees_course_id`, `class_date`, `class_time`, ``, ``, `color_style`

        $trainees_course_id = $this->input->post('trainees_course_id');
        $class_time = $this->input->post('class_time');


        $this->db->insert('classes', ['trainees_course_id' => $trainees_course_id,
            'class_date' => $format_start_date->format('Y-m-d'),
            'class_time' => $class_time,
            'trainer_id' => $trainer_id
        ]);
        for ($i = 1; $i < $number_of_days; $i++) {
            // اذا كان اليوم جمعه اضافة يوم اضافى
            if ($format_start_date->format('D') == "Thu") {
                $format_start_date->modify('+2 day');
            } else {

                $format_start_date->modify('+1 day');
            }

            // classes `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `color_style`
            $this->db->insert('classes', [
                'trainees_course_id' => $trainees_course_id,
                'class_date' => $format_start_date->format('Y-m-d'),
                'class_time' => $class_time,
                'trainer_id' => $trainer_id
            ]);
        }
        $end_date = $format_start_date->format('Y-m-d');


        //  trainees_course تحديث جدول الكورس 
        // trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, `end_date`, `created_at`, `course_id`, `number_of_days`

        $course_id = $this->db->get_where('trainees_course', ['id' => $trainees_course_id])->row()->course_id;
        $price = $this->db->get_where('courses', ['id' => $course_id])->row()->price;
        $this->db->where('id', $trainees_course_id);
        $this->db->update('trainees_course', compact('start_date', 'price', 'end_date', 'trainer_id'));

        redirect(base_url('index.php/admin/print_table/' . $trainees_course_id));
    }

    public function not_sequential($id) {

        $data['trainees_course'] = $trainees_course = $this->db->get_where('trainees_course', ['id' => $id])->row();
        $data['course'] = $course = $this->db->get_where('courses', ['id' => $trainees_course->course_id])->row();

        $data['trainers'] = $this->db->get_where('trainers')->result();
        $data['course_id'] = $id;


        $data['page'] = "admin/trainees/not_sequential";
        $data['title'] = "اختيار كورس غير متسلسل";
        $this->load->view('templet.php', $data);
    }

    public function not_sequential_setup_2() {

        // [trainer_id] => 1 [course_id] => 2
        $data['number_of_dayes'] = $number_of_dayes = $this->input->post('number_of_dayes');
        $data['trainer_id'] = $trainer_id = $this->input->post('trainer_id');
        $data['course_id'] = $course_id = $this->input->post('course_id');
        $data['end_date'] = $end_date = $this->input->post('end_date');

        $today = date("Y-m-d");

        $data['trainer'] = $this->db->get_where('trainers', ['id' => $trainer_id])->row();
        // classes `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`


        $data['page'] = "admin/trainees/not_sequential_setup_2";
        $data['title'] = "اختيار كورس غير متسلسل";
        $this->load->view('templet.php', $data);
    }

    public function not_sequential_setup_post() {
        $trainees_course_id = $course_id = $this->input->post('course_id');
        $trainer_id = $this->input->post('trainer_id');
        $class_time = $this->input->post('class_time');
        $class_date = $this->input->post('class_date');
        $end_date = "";

        $course_id_courses = $this->db->get_where('trainees_course', ['id' => $trainees_course_id])->row()->course_id;
        $courses = $this->db->get_where('courses', ['id' => $course_id_courses])->row();


        // 1 - insert data into class curses

        for ($i = 0; $i < sizeof($_POST['class_date']); $i++) {
            // classes `id`, `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `type`, `color_style`, `created_at`
            $this->db->insert('classes', ['trainees_course_id' => $trainees_course_id, 'class_date' => $class_date[$i], 'class_time' => $class_time[$i], 'trainer_id' => $trainer_id]);
            $end_date = $class_date[$i];
        }
        // 2 - update course information 
        // trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, `end_date`, `created_at`, `course_id`, `payment_status`, `number_of_days`
        $this->db->where('id', $trainees_course_id);
        $this->db->update('trainees_course', ['trainer_id' => $trainer_id, 'start_date' => $class_date[0], 'end_date' => $end_date, 'price' => $courses->price]);
        redirect(base_url() . 'index.php/admin/print_table/' . $trainees_course_id);
    }

    public function start_class_post($id) {
        // current_course2
        $this->db->where('id', $id);
        $this->db->update('classes', ['stratus' => 1]);

        $this->session->set_flashdata('success_message', 'تم بداء الحصه بنجاح');
        redirect(base_url() . 'index.php/admin/print_start_class/' . $id);
    }

    public function print_start_class($id) {

        $data['classes'] = $classes = $this->db->get_where('classes', ['id' => $id])->row();
        $data['trainer'] = $this->db->get_where('trainers', ['id' => $classes->trainer_id])->row()->name;


        $trainee_id = $this->db->get_where('trainees_course', ['id' => $classes->trainees_course_id])->row()->trainee_id;


        $data['trainee'] = $this->db->get_where('trainees', ['id' => $trainee_id])->row()->name;
        $data['title'] = "طبتعه بيانات تزكره";
        $this->load->view('admin/classes/print_start_class', $data);
    }

    // تعديل حاله الكورس من الدفع بحيث لايقبل دفع 
    public function payment_status($course_id) {
        $this->db->where('id', $course_id);
        $this->db->update('trainees_course', ['payment_status' => 1]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // دفعيات لمتدرب معين
    public function trainees_payments() {
        // trainees_payments `id`, `course_id`, `amount`, `trainees_course_id`
        $trainees_course_id = $this->input->post('course_id');
        $amount = $this->input->post('amount');
		$bank_account = $this->input->post('bank_account');
		
        $type = $this->input->post('type');
        // جاى من جول الترينى كورس اى دى يعنى الجدول البربط بين المتدرب والكورس 
		$course_id = $this->input->post('course_id');
		
		if ($bank_account > 0) {

			$current_balance = $this->db->get_where('banks', ['id' => $bank_account])->row()->balance;
			$sum = $current_balance + $amount;
			$this->db->insert('bank_log' , ['balance' => $amount , 'transaction' => 'in' , 'bank_id' => $bank_account , 'user_id' => auth_user()->id]);


			$this->db->query('UPDATE `banks` SET `balance` = ' . $sum . ' WHERE `id` = ' . $bank_account);
		}


        $this->db->insert('trainees_payments', ['type' => $type, 'amount' => $amount, 'course_id' => $course_id]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    ////////////////////////////////////////// نهايه المتدربين /////////////////////////////////////////// 
    ////////////////////////////////////////// الرخصه الدوليه /////////////////////////////////////////// 

    public function international_license() {
        $qyt = 0;

        $qyt1 = $this->db->query('SELECT sum(qyt) as qyt1 FROM `international_license_log`')->row()->qyt1;
        $qyt2 = $this->db->query('SELECT count(id) as qyt2 FROM `international_license_trainees`')->row()->qyt2;


        $data['qyt'] = $qyt1 - $qyt2;

        $data['international_license_log'] = $this->db->get('international_license_log')->result();
        $data['page'] = "admin/international_license/index";
        $data['title'] = "الرخصه الدوليه";
        $this->load->view('templet.php', $data);
    }

    public function international_license_log_post() {

        $qyt = $this->input->post('qyt');

        $this->db->insert('international_license_log', compact('qyt'));
        redirect($_SERVER['HTTP_REFERER']);
    }

    public function add_international_license() {



        $qyt1 = $this->db->query('SELECT sum(qyt) as qyt1 FROM `international_license_log`')->row()->qyt1;
        $qyt2 = $this->db->query('SELECT sum(trainer) as qyt2 FROM `international_license_trainees`')->row()->qyt2;

        $data['qyt'] = $qyt1 - $qyt2;

        $data['trainers'] = $this->db->get_where('trainers', ['status' => 1])->result();
        $data['page'] = "admin/international_license/add_international_license";
        $data['title'] = "الرخصه الدوليه";
        $this->load->view('templet.php', $data);
    }

    public function add_international_license_post() {

        $name = $this->input->post('name');
        $user_id = auth_user()->id;
        $school_id = get_school_info(auth_user()->school_id)->name;
        $phone = $this->input->post('phone');
        $pay = $this->input->post('pay');
        $price = 2100;

        $this->db->insert('international_license_trainees', compact('school_id', 'user_id', 'name', 'price', 'phone', 'pay'));
        $id = $this->db->insert_id();
        $data['print'] = $this->db->get_where('international_license_trainees', ['id' => $id])->row();
        $this->load->view('admin/international_license/license_print', $data);
    }

    public function license() {

        $data['licenses'] = $this->db->get('international_license_trainees')->result();
        $data['page'] = "admin/international_license/licenses";
        $data['title'] = "عرض كافه الرخص الدوليه";
        $this->load->view('templet.php', $data);
    }

    public function ahmedhmed() {
        $query = $this->db->query('SHOW TABLES')->result();
        echo "<pre>";
        // print_r($query);
        var_dump($query);
        echo "<br><br><br><br><br><br><br><br>";
        echo "<hr>";
        echo "<br><br><br><br><br><br><br><br>";
        $i = 0;
        foreach ($query as $q) {
            // echo $q->Tables_in_drivingschool[$i];
            echo "<hr";
            $i++;
        }
    }

    // السلفيات 




    public function loans() {

        $data['all_loans'] = $this->db->get_where('loans')->result();
        $data['page'] = "admin/loans/loans";
        $data['title'] = "السلفيات";
        $this->load->view('templet.php', $data);
    }

    public function add_loan() {

        $data['trainers'] = $this->db->get_where('trainers', ['status' => 1])->result();
        $data['page'] = "admin/loans/add_loan";
        $data['title'] = "اضافة سلفيه";
        $this->load->view('templet.php', $data);
    }

    public function add_loan_post() {
        // loans `id`, `amunt`, `user_type`, `status`, `user_id`, `created_at`
        $amunt = $this->input->post('amunt');
        $user_type = $this->input->post('user_type');
        $user_id = $this->input->post('user_id');
        $this->db->insert('loans', compact('amunt', 'user_type', 'user_id'));
        redirect(base_url() . "index.php/admin/pending_loans");
    }

    public function pending_loans() {
        $data['loans'] = $this->db->get_where('loans', ['status' => 0])->result();

        $data['page'] = "admin/loans/pending_loans";
        $data['title'] = "قروض غير مصدقه";
        $this->load->view('templet.php', $data);
    }

    public function approve_loan($id) {
        $this->db->where('id', $id);
        $this->db->update('loans', ['status' => 1]);

        // redirect(base_url()."index.php/admin");
        redirect(base_url() . "index.php/admin/pending_loans");
    }

    public function reject_loan($id) {
        $this->db->where('id', $id);
        $this->db->update('loans', ['status' => 2]);

        // redirect(base_url()."index.php/admin");
        redirect(base_url() . "index.php/admin/pending_loans");
    }

    public function approve_loans() {

        $data['loans'] = $this->db->get_where('loans', ['status' => 1])->result();

        $data['page'] = "admin/loans/loans";
        $data['title'] = "قروض مصدقه";
        $this->load->view('templet.php', $data);
    }

    public function reject_loans() {

        $data['loans'] = $this->db->get_where('loans', ['status' => 2])->result();

        $data['page'] = "admin/loans/loans";
        $data['title'] = "قروض مرفوضه";
        $this->load->view('templet.php', $data);
    }

    // Loans pending ratification

    /**
     * كشف مدربين لفتره
     */
    public function trainers_for_period() {

        if (isset($_POST['date_from'])) {

            $data['date_from'] = $date_from = $this->input->post('date_from');
            $data['date_to'] = $date_to = $this->input->post('date_to');

            $data['trainers'] = $this->db->get_where('trainers', ['status' => 1])->result();

            $data['page'] = "admin/trainers/trainers_for_period_post";
        } else {
            $data['page'] = "admin/trainers/trainers_for_period";
        }



        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    //   اضافة خصم الخصم يكون هنالك ثلاث 

    public function add_deduction() {
        $user_id = $this->input->post('user_id');
        $amount = $this->input->post('amount');
        $note = $this->input->post('note');
        $type = "trainers";
        // deductions `amount`, `user_id`, `note`
        $this->db->insert('deductions', compact('amount', 'user_id', 'note', 'type'));
        redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * كورسات الجمعه
     */
    public function friday_courses() {


        $data['page'] = "admin/friday_courses/index";
        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    public function friday_course($id) {
        $data['friday_courses'] = $this->db->get_where('friday_courses', ['id' => $id])->row();


        $data['page'] = "admin/friday_courses/friday_course";
        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    public function friday_courses_post() {

        $address = $this->input->post('address');
        $name = $this->input->post('name');
        $phone = $this->input->post('phone');
        $school_id = auth_user()->school_id;
        $emplyee_id = auth_user()->id;

        $trainee_id = 0; // القيمه المبدئيه ليه صفر عشان لمن يتم اضافة المتدر يحصل تحديث للقيمه دى 
        $friday_courses_id = 0;


        $amount = $this->input->post('amount');
        $course_id = $this->input->post('course_id');
        $class_date = $this->input->post('class_date');
        $trainer_id = $this->input->post('trainer_id');
        $class_time = $this->input->post('class_time');

        $user = $this->db->get_where('trainees', ['phone' => $phone])->row();
        if (!isset($user->id)) {
            $this->db->insert('trainees', compact('name', 'phone', 'address', 'school_id', 'emplyee_id'));
            $trainee_id = $this->db->insert_id();
        } else {
            // ادخال بيانات الكورس والدفيعات 
            $trainee_id = $user->id;
        }
        // trainees_course_friday `trainee_id`, `trainer_id`, `price`, `course_id``, `emplyee_id`, `school_id`
        $price = $this->db->get_where('friday_courses', ['id' => $course_id])->row()->price;
        $this->db->insert('trainees_course_friday', compact('emplyee_id', 'trainee_id', 'trainer_id', 'class_time', 'class_date', 'price', 'course_id', 'school_id'));
        $friday_courses_id = $this->db->insert_id();


        // course_id == 200 that mean friday course
        // trainees_payments `course_id`, `amount`, `trainees_course_id`, `type`
        $this->db->insert('trainees_payments', ['amount' => $amount, 'course_id' => 2000, 'trainees_course_id' => 0, 'friday_courses_id' => $friday_courses_id]);

        redirect('admin');
    }

    /**
     * عرض اختيار كورس الجعه هل يوجد كورسات ام لا 
     *
     * @return void
     */
    public function friday_course_view() {

        $data['empalyees'] = $this->db->get('users')->result();

        $data['page'] = "admin/friday_courses/friday_course_view";
        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    public function friday_course_view_get() {
        $day = $this->input->post('day');
        // $data['trainees_course_friday']  = $this->db->get_where('trainees_course_friday' , ['class_date' => $day])->result();
        $data['trainees_course_friday'] = $this->db->get('trainees_course_friday')->result();


        $data['page'] = "admin/friday_courses/friday_course_view_get";

        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    /**
     * تحديث حاله الكورس الى تم التدريس
     *
     * @param [type] $id
     * @return void
     */
    public function course_friday_status($id) {
        $this->db->where('id', $id);
        $this->db->update('trainees_course_friday', ['status' => 1]);
        redirect($_SERVER['HTTP_REFERER']);
    }

    // revenue الايرادات

    public function revenues() {
        // revenue `amount`, `department`, `note`, `day`
        $data['revenue'] = $this->db->query("SELECT day ,SUM(amount) as amount  FROM revenue GROUP BY day")->result();

        $data['page'] = "admin/revenues/index";

        $data['title'] = "الايراد";
        $this->load->view('templet.php', $data);
    }

    public function revenue_add() {

        $data['page'] = "admin/revenues/revenue_add";

        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    public function revenue_add_post() {

        $amount = $this->input->post('amount');
        $department = $this->input->post('department');
        $note = $this->input->post('note');
        $day = date('Y-m-d');


        $this->db->insert('revenue', compact('amount', 'department', 'note', 'day'));
        redirect(base_url() . 'index.php/admin');
    }

    public function revenue($day = null) {
        if (isset($day)) {
            $data['day'] = $day;
        } else {

            $data['day'] = $day = $this->input->post('day');
        }
        $data['revenue'] = $this->db->get_where('revenue', ['day' => $day])->result();

        $data['page'] = "admin/revenues/revenue";

        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

// الموظفين 
    /**
     * يمكن ادارة الموظفين عرض كل الموظفين عرض موظف واحد او التعديل على الموظفين
     */
    public function employees() {

        $data['users'] = $this->db->get('users')->result();

        $data['page'] = "admin/employees/index";
        $data['title'] = "عرض كافه الموظفين";
        $this->load->view('templet.php', $data);
    }

    public function employee_add() {

        $data['page'] = "admin/employees/employee_add";
        $data['title'] = "اضافة موظف";
        $this->load->view('templet.php', $data);
    }

    public function employee_add_post() {
        //  `email`, `password`, `name`, `school_id`, `salary`
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $name = $this->input->post('name');
        $school_id = $this->input->post('school_id');
        $salary = $this->input->post('salary');
        $weekly_salary = $this->input->post('weekly_salary');


        $this->db->insert('users', compact('email', 'password', 'weekly_salary', 'name', 'school_id', 'salary'));

        redirect('admin/employees');
    }

    // المرتبات

    public function payrolls() {
        $data['payrolls'] = $this->db->get_where('payrolls', ['payroll_type' => 1])->result();

        $data['page'] = "admin/payrolls/index";
        $data['title'] = "كشف كافه المرتبات";
        $this->load->view('templet.php', $data);
    }

    public function payroll_add() {
        $data['month'] = $month = date('m') - 1;
        $data['users'] = $this->db->get('users')->result();
        $payroll = $this->db->get_where('payrolls', ['month' => $month])->row();
        if (!isset($payroll->month)) {
            echo "تم استخراج الكشف";
        } else {

            $data['page'] = "admin/payrolls/payroll_add";
            $data['title'] = "مرتبات";
            $this->load->view('templet.php', $data);
        }
    }

    public function payroll_post() {


        // payrolls `payroll_type`, `form_date`, `to_date`, `month`, `user_id`, `status`, `note`

        $payroll_type = 1;
        $month = $this->input->post('month');
        $note = $this->input->post('note');
        $user_id = auth_user()->id;


        $this->db->insert('payrolls', compact('payroll_type', 'user_id', 'month', 'note'));

        $payroll_id = $this->db->insert_id();


        $salary = $this->input->post('salary');
        $employee_id = $this->input->post('employee_id');

        for ($i = 0; $i < sizeof($employee_id); $i++) {
            $this->db->insert('payroll_details', ['employee_id' => $employee_id[$i],
                'salary' => $salary[$i],
                'payroll_id' => $payroll_id,
            ]);
        }
        // payroll_details `id`, `employee_id`, `salary`, `payroll_id`, `status`, `created_at`
    }

    public function payroll($id) {


        $data['payrolls'] = $payrolls = $this->db->get_where('payrolls', ['id' => $id])->row();
        $data['payroll_details'] = $this->db->get_where('payroll_details', ['payroll_id' => $payrolls->id])->result();


        $data['page'] = "admin/payrolls/payroll";
        $data['title'] = "مرتبات";
        $this->load->view('templet.php', $data);
    }

    public function payroll_details_update($id) {
        $payroll_details = $this->db->get_where('payroll_details', ['id' => $id])->row();
        $sum = $payroll_details->salary;
        // payroll_details `employee_id`, `salary`, `payroll_id`, `status`
        $pocket = $this->db->get_where('system', ['id' => 1])->row();
        if (!isset($pocket->pocket) or $pocket->pocket < $sum) {

            $this->session->set_flashdata('error_message', 'عفوا النثريه غير كافيه');
            redirect(base_url() . 'index.php/admin/payroll/' . $payroll_details->payroll_id);
        } else {

            $x = $pocket->pocket - $sum;
            $this->db->query('UPDATE `system` SET `pocket` = ' . $x . ' WHERE `system`.`id` = 1');

            $this->db->where('id', $id);
            $this->db->update('payroll_details', ['status' => 1]);

            redirect($_SERVER['HTTP_REFERER']);
        }
    }

    public function payroll_update($id) {
        $this->db->where('id', $id);
        $this->db->update('payrolls', ['status' => 1]);

        redirect($_SERVER['HTTP_REFERER']);
    }

    // ضبط النثريه

    public function pocket() {
        $data['start'] = $start = date("Y-m-d H:i:s");
        $data['end'] = $end = date_format(date_create(date("Y-m-d") . ' 23:59:59.999'), "Y-m-d H:i:s");
        $data['amunt'] = $this->db->query("SELECT sum(amunt) as amunt FROM accounts_log where created_at between '" . $start . "' AND   '" . $end . "'")->row()->amunt;

        $data['pocket'] = $payrolls = $this->db->get_where('system', ['id' => 1])->row()->pocket;
        $data['pockets'] = $payrolls = $this->db->get('pockets')->result();



        $data['page'] = "admin/pocket/index";
        $data['title'] = "الثريه";
        $this->load->view('templet.php', $data);
    }

    public function pocket_post() {
        $user_id = auth_user()->id;
        $name = auth_user()->name;
        $balance = $this->input->post('balance');

        $pocket = $this->db->get_where('system', ['id' => 1])->row()->pocket;
        $sum = $pocket + $balance;

        $this->db->query('UPDATE `system` SET `pocket` = ' . $sum . ' WHERE `system`.`id` = 1');


        // pockets `user_id`, `balance`
        $this->db->insert('pockets', compact('user_id', 'name', 'balance'));
        redirect($_SERVER['HTTP_REFERER']);
    }

    // الحسابات البنكيه

    public function banks() {

        $data['banks'] = $this->db->get('banks')->result();

        $data['page'] = "admin/banks/index";
        $data['title'] = "الحسابات البنكيه";
        $this->load->view('templet.php', $data);
    }

    public function bank($bank_id) {

		$data['bank'] = $bank = $this->db->get_where('banks', ['id' => $bank_id])->row();
		
        $data['bank_log'] = $this->db->get_where('bank_log', ['bank_id' => $bank_id])->result();
        // bank_log `id`, `amount`, `transaction`, `bank_id`, `user_id`, `created_at`


        $data['page'] = "admin/banks/bank";
        $data['title'] = "كشف حساب";
        $this->load->view('templet.php', $data);
    }

    public function bank_add() {

        $data['banks'] = $this->db->get('banks')->result();
        // bank_log `id`, `amount`, `transaction`, `bank_id`, `created_at`
        $data['page'] = "admin/banks/bank_add";
        $data['title'] = "الحسابات البنكيه";
        $this->load->view('templet.php', $data);
    }

    public function bank_add_post() {
        // bank_log `id`, `amount`, `transaction`, `bank_id`, `user_id`, `created_at`
        $user_id = auth_user()->id;
        $bank_id = $this->input->post('bank_id');
        $balance = $this->input->post('balance');
        $transaction = "in";

        $current_balance = $this->db->get_where('banks', ['id' => $bank_id])->row()->balance;
        $sum = $current_balance + $balance;

        $this->db->query('UPDATE `banks` SET `balance` = ' . $sum . ' WHERE `id` = ' . $bank_id);


        // pockets `user_id`, `balance`
        $this->db->insert('bank_log', compact('user_id', 'transaction', 'bank_id', 'balance'));
        redirect('admin/banks');
    }

    public function print_billing($id) {
        // <!-- trainees_course `trainee_id`, `trainer_id`, `price`, `start_date`, `end_date`, `created_at`, `course_id`, ``, `number_of_days`, `emplyee_id`, `paid`, `school_id` -->

        $data['trainees_course'] = $trainees_course = $this->db->get_where('trainees_course', ['id' => $id])->row();
        $data['trainee'] = $this->db->get_where('trainees', ['id' => $trainees_course->trainee_id])->row();
        $data['emplyee'] = $this->db->get_where('users', ['id' => $trainees_course->emplyee_id])->row()->name;
        $data['course'] = $this->db->get_where('courses', ['id' => $trainees_course->course_id])->row()->name;


        $data['page'] = "admin/print_billing/print_billing";
        $data['title'] = "طباعه ايصال";
        $this->load->view('admin/print_billing/print_billing', $data);
    }

    public function create_model_file() {
        $data = '';

        $tables = $this->db->query("SELECT table_name FROM information_schema.tables WHERE table_schema = 'drivingschool'")->result();
        $path = FCPATH . 'application\models';

        foreach ($tables as $table) {
            $data .= "'" . $table->table_name . "', ";

            $model_file = fopen($path . "/" . $table->table_name . ".php", "w") or die("Unable to open file!");
            $contents = "<?php
			class  " . $table->table_name . " extends CI_Model {
			
				public \$table = '" . $table->table_name . "';
			
			
			}";
            fwrite($model_file, $contents);
            fclose($model_file);
        }
        echo $data;
    }

}
