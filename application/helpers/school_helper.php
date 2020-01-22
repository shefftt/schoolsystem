<?php

if (!function_exists('get_class_info')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     */
    function get_class_info($class_date , $class_time , $trainer_id) {
        $CI = & get_instance();
		$data =  $CI->db->get_where("classes" , ['stratus' => 0, 'class_time' => $class_time , 'trainer_id' => $trainer_id, 'class_date' => $class_date])->row();
		if(isset($data) and $data->id > 0)
		return 1;
		else {
			return 0;
		}
    }

}



if (!function_exists('get_current_course_sataus')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     */
    function get_current_course_sataus($class_date , $class_time , $trainer_id , $option= false) {
        $CI = & get_instance();
        $data =  $CI->db->get_where("classes" , ['class_time' => $class_time ,'trainer_id' => $trainer_id ,'class_date' => $class_date])->row();

        if ($option == true) {
            return $data;
        }
        if(isset($data) and $data->id > 0)
        return false;
        else {
            return true;
        }
    }

}

if (!function_exists('get_trainee_info')) {

    /**
     * Form Declaration
     *
     * Creates the opening portion of the form.
     *
     */
    function get_trainee_info($id ) {
		$CI = & get_instance();
		
      $trainees_course = $CI->db->get_where("trainees_course" , ['id' => $id])->row();
     return $CI->db->get_where("trainees" , ['id' => $trainees_course->trainee_id])->row();
        
    }

}



if (!function_exists('get_trainer_info')) {

    /**
     * Form Declaration
     *
	 * جلب اسم المتدرب عن طريق الاى دى 
     *
     */
    function get_trainer_info($id) {
        $CI = & get_instance();
        
		return  $CI->db->get_where("trainers" , ['id' => $id])->row();
    }

}


if (!function_exists('get_trainee_info')) {

    /**
     * Form Declaration
     *
     * جلب اسم المتدرب عن طريق الاى دى 
     *
     */
    function get_trainee_info($id) {
        $CI = & get_instance();
        return  $CI->db->get_where("trainees" , ['id' => $id])->row();
    }

}


if (!function_exists('get_traine_payments')) {

    /**
     * trainees_payments
     *
	 * جلب اسم المتدرب عن طريق الاى دى 
     *
     */
    function get_traine_payments($id) {
		$CI = & get_instance();
		$sum = 0;
		$results =   $CI->db->get_where("trainees_payments" , ['trainees_course_id' => $id])->result();
		foreach($results as $result){
			$sum += $result->amount;
		}

		return $sum;
    }

}



if (!function_exists('category_courses')) {

    /**
     * trainees_payments
     *
	 * جلب جلب تصنيف الكورس  
     *
     */
    function category_courses($id) {
		$CI = & get_instance();
		return $CI->db->get_where("category_courses" , ['id' => $id])->row();
	
    }

}



if (!function_exists('courses')) {

    /**
     * trainees_payments
     *
	 * جلب جلب تصنيف الكورس  
     *
     */
    function courses($id) {
		$CI = & get_instance();
		$trainees_course =  $CI->db->get_where("trainees_course" , ['id' => $id])->row();
		return $CI->db->get_where("courses" , ['id' => $trainees_course->course_id])->row();
	
    }

}



if (!function_exists('get_table_info')) {

    /**
     * trainees_payments
     *
	 * جلب جلب تصنيف الكورس  
     *
     */
    function get_table_info($table_name , $id ) {
		$CI = & get_instance();
		return $CI->db->get_where($table_name , ['id' => $id])->row();
	
    }

}






if (!function_exists('get_car_driver')) {

    /**
     * trainees_payments
     *
	 * جلب جلب تصنيف الكورس  
     *
     */
    function get_car_driver($car_id ) {
		$CI = & get_instance();
		$trainer =  $CI->db->get_where('trainers' , ['car_id' => $car_id])->row();
		if (isset($trainer->id) and $trainer->id > 0) {
			return $trainer->name;
		}
		else {
			return "لايوجد سائق";
		}
	
    }

}


if (!function_exists('trainer')) {

    function trainer($trainer_id ) {
		$CI = & get_instance();
		$trainer =  $CI->db->get_where('trainers' , ['id' => $trainer_id])->row();
		if (isset($trainer->id) and $trainer->id > 0) {
			return $trainer->name;
		}
		else {
			return "لايوجد سائق";
		}
	
    }

}





if (!function_exists('accounts')) {

    function accounts($sub_id = 0) {
		$CI = & get_instance();
		return  $CI->db->get_where('accounts' , ['sub_id' => $sub_id])->result();	
    }

}




if (!function_exists('accounts_balnce')) {

    function accounts_balnce($id = 0) {
		$CI = & get_instance();
		return  $CI->db->get_where('accounts' , ['sub_id' => $sub_id])->result();	
    }

}


/**
اسم الحساب 

accounts_id
*/


if (!function_exists('account_name')) {

    function account_name($id) {
		$CI = & get_instance();
		return  $CI->db->get_where('accounts' , ['id' => $id])->row();	
    }

}



if (!function_exists('accounts_log_sum')) {

    function accounts_log_sum($accounts_id) {
		$CI = & get_instance();

			
		$sum = 0;
		$accounts_array = [];

		$accounts = $CI->db->get_where('accounts' , ['sub_id' => $accounts_id])->result();	

		foreach($accounts as $account)
		$accounts_array[] = $account->id;

		
		if (sizeof($accounts_array) > 0) {

		$accounts_log = $CI->db->select('amunt')
                        ->from('accounts_log')
                        ->where_in('accounts_id', $accounts_array)
                        ->get()->result();
		
		foreach($accounts_log as $account)
		$sum += $account->amunt;


		return $sum;
		}
		else {
			return $sum;
		}
    }

}





if (!function_exists('table_info')) {

    function table_info($table_name) {
		$CI = & get_instance();
		return  $CI->db->get_where($table_name)->result();	
    }

}




if (!function_exists('classes')) {

    function classes($trainees_course_id) {
		$CI = & get_instance();
		return  $CI->db->get_where('classes' , ['trainees_course_id' => $trainees_course_id])->result();	
    }

}



if (!function_exists('days_class_left')) {

    function days_class_left($trainees_course_id) {
		$CI = & get_instance();
	 $CI->db->select('*');  
		$CI->db->where('trainees_course_id', $trainees_course_id);		
		$CI->db->where('class_date >= ', date('Y-m-d'));		
		$CI->db->order_by("class_date asc");
		$CI->db->distinct();
		$CI->db->from('classes');
		$class_date =  $class_date = $CI->db->get()->result(); 
		echo sizeof($class_date);
	
	}

}


if (!function_exists('get_std_info')) {

    function get_std_info($class_date, $class_time , $trainer_id) {
		$CI = & get_instance();
	 $trainees_course_id  = $CI->db->get_where('classes',compact('class_date','class_time' ,'trainer_id'))->row()->trainees_course_id;
	 $trainee_id  = $CI->db->get_where('trainees_course',['id' => $trainees_course_id])->row()->trainee_id;
	 return $CI->db->get_where('trainees',['id' => $trainee_id])->row();
	
	}

}


/**
 * جلب متبقى الكورسات من المبالغ
 * 1 - جلب سعر الكورس 
 * 2 - جلب المفوعات وفقا لسعر الكورس
 * 3 - خسم المدفوع من سعر الكورس 
 * لكى يتم جلب المتبقى 
 */

if (!function_exists('remaining_balance')) {

    function remaining_balance($course_id) {
			
		$CI = & get_instance();
		$sum = 0;
		$remaining = 0;
		$price = $CI->db->get_where('trainees_course' , ['id' => $course_id])->row()->price;
		$trainees_payments = $CI->db->get_where('trainees_payments' , ['course_id' => $course_id])->result();

	foreach ($trainees_payments as  $payments) {
		$sum += $payments->amount;
	}
	$remaining =  $price - $sum;
	return ['sum' => $sum , 'remaining' => $remaining];
	
	}

}



/**
 * اولا جلب عدد الحصص 
 * جلب المبلغ  المدفوع 
 * ضرب الحصص للايام السابقة كلها فى 350
 * اذا كان المبلغ الدفوع لايساوى قيمه الكورس
*/

if (!function_exists('class_balance')) {

    function class_balance($trainees_course_id) {
			// classes `trainees_course_id`, `class_date`, `class_time`, `trainer_id`, `stratus`, `type`, `color_style`

		$CI = & get_instance();
		$number_of_class = 0;
		$sum = 0;
		$total = 0;

		$price = $CI->db->get_where('trainees_course' , ['id' => $trainees_course_id ])->row()->price;

		$CI->db->select('*');  
		$CI->db->where('trainees_course_id', $trainees_course_id);		
		$CI->db->where('class_date >= ', date('Y-m-d'));
		$CI->db->distinct();
		$CI->db->from('classes');
		$class_date =  $class_date = $CI->db->get()->result(); 

		$trainees_payments = $CI->db->get_where('trainees_payments' , ['course_id' => $trainees_course_id])->result();

		foreach ($trainees_payments as  $payments) {
			$sum += $payments->amount;
		}
		$total =  $price - $sum;
		
		// return sizeof($class_date);
		// اذا كان المبلغ اكبر من صفر جيب لى اضرب لى عدد الايام فى 350 لو كان المبلغ المدفوع اكبر من المبلغ بعد الضرب 
		if ($total > 0) {
			// 1 - جلب عدد الحصص
			$number_of_class = sizeof($class_date);
		
			// 2 - ضرب الحصص فى 350
			
			$number_of_class *= 350;
			// 2 - 
		return 0;
		}
		else {
			return 1;
		}
	

	}

}




/**
 * جلب بيانات المدرسه عن طريق ال ID
 */

if (!function_exists('get_school_info')) {

    function get_school_info($school_id) {
			
		$CI = & get_instance();
		$school = $CI->db->get_where('schols' , ['id' => $school_id])->row();

	return $school;
	
	}

} 

/**
 * تسجيل الدخول 
 */

if (!function_exists('auth_user')) {

    function auth_user() {
			
		$CI = & get_instance();
		// return $CI->session->set_userdata('user', $user);
		return $CI->session->userdata('user');
	
	}

}
/**
 * تسجيل الدخول 
 */

if (!function_exists('user_info')) {

    function user_info($id) {
			
		$CI = & get_instance();
		return $CI->db->get_where('users' , ['id' => $id])->row();
	
	}

}

/**
 * عرض حاله الحصه تكون الحصه غيباب اذا تم تحديدها كغياب او لم يتم تعديل حالتها والزمن فات 
 */

if (!function_exists('class_status')) {

    function class_status($id) {
		$tody = date('Y-m-d');
		$time = date('H');
		$CI = & get_instance();
		// $result = $CI->db->query("UPDATE `classes` SET `stratus`= 2 WHERE `class_date` < '".$tody."' AND `stratus` = 0")->result();
	
		$CI->db->where(['`class_date` <' => $tody , 'stratus' => 0  ]);
		$CI->db->update('classes', ['stratus' => 2]);

		
		$CI->db->where(['`class_date` <' => $tody  , '`class_time` <' => $time , 'stratus' => 0  ]);
		$CI->db->update('classes', ['stratus' => 2]);


		$stratus = $CI->db->get_where('classes', ['id' => $id])->row()->stratus;
		if ($stratus == 0) {
			// echo "لم تدرس بعد";
			return 0;
		}
		elseif ($stratus == 1) {
			// echo "دورست";
			return 1;
		}
		elseif ($stratus == 2) {
			// echo "غياب";
			return 2;
		}
	}

}




/**
 * الحصص المتبقيه 
 */

if (!function_exists('remaining_class')) {

    function remaining_class($trainees_course_id) {
		$tody = date('Y-m-d');
		$time = date('H');
		$CI = & get_instance();
		$result = $CI->db->query("SELECT * FROM `classes` WHERE `trainees_course_id` = '".$trainees_course_id."' AND `class_date` >= '".$tody."' ")->result();
	
		// $size = 0;
		// $result = $CI->db->get_where('classes' ,['trainees_course_id' => $trainees_course_id , 'class_date >' => $tody ])->result();
		// $r2 = $CI->db->get_where('classes' ,['trainees_course_id' => $trainees_course_id])->result();
		if (isset($result)) {
			echo sizeof($result);
		}else {
			echo 0;
		}
		// echo $CI->db->last_query();
		echo "<hr>";

		// echo json_encode($r2);
	}

}



/**
 * الحصص المتبقيه 
 */

if (!function_exists('friday_courses')) {

    function friday_courses() {
		$CI = & get_instance();
		return $CI->db->get('friday_courses')->result();
		
	}

}



/**
 * الحصص الحصص التى تم تدريسها لمدرب فى فتره 
 */

if (!function_exists('trainer_pay')) {

    function trainer_pay($id , $start , $end) {
		$tody = date('Y-m-d');
		$time = date('H');
		$CI = & get_instance();
	   return $CI->db->query("SELECT COUNT('id') as id FROM `classes` WHERE `trainer_id` = '".$id."' AND `type` = 0 AND `stratus` = 1 AND `class_date` BETWEEN '".$start."' AND '".$end."' ")->row()->id;
	
	}

}



/**
 * الحصص الحصص التى تم التى لم يتم تدرسيها لمدرب فى فتره 
 */

if (!function_exists('trainer_absence')) {

    function trainer_absence($id , $start , $end) {
		$tody = date('Y-m-d');
		$time = date('H');
		$CI = & get_instance();
	   return $CI->db->query("SELECT COUNT('id') as id FROM `classes` WHERE `trainer_id` = '".$id."' AND `type` = 0 AND `stratus` = 2 AND `class_date` BETWEEN '".$start."' AND '".$end."' ")->row()->id;
	
	}

}


/**
 * السلفيات لفتره
 */

if (!function_exists('trainer_loans')) {

    function trainer_loans($id , $transaction_type , $user_type) {

		
		$CI = & get_instance();
		$rsult =  $CI->db->query("SELECT SUM(amunt) as amunt FROM `loans` WHERE `user_id` = '{$id}' AND `status` = 1  AND `transaction_type` = '{$transaction_type}' AND `pay` = 1 AND `user_type` = '{$user_type}' ")->row();
		// $rsult =  $CI->db->query("SELECT SUM(amunt) as amunt FROM `loans` WHERE `user_id` = '".$id."' ")->row()->amunt;
		
		if ($rsult == null) {
			return 0;
		}
		else{
			return $rsult->amunt;

		}


		// return $CI->db->last_query();
	}

}


/**
 * السلفيات لمدرب واحد
 */

if (!function_exists('tr_loans')) {

    function tr_loans($id  , $user_type) {
		$CI = & get_instance();
		return  $CI->db->query("SELECT * FROM `loans` WHERE `user_id` = '{$id}'  AND  `user_type` = '{$user_type}' ")->result();

	}

}


?>
