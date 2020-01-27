<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

// *************************************************************************
// *                                                                       *
// * OPTIMUM LINKUP SCHOOL MANAGEMENT SYSTEM                               *
// * Copyright (c) OPTIMUM LINKUP. All Rights Reserved                     *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * Email: optimumproblemsolver@gmail.com                                 *
// * Website: https://optimumlinkup.com.ng								   *
// * 		  https://optimumlinkupsoftware.com							   *
// *                                                                       *
// *************************************************************************
// *                                                                       *
// * This software is furnished under a license and may be used and copied *
// * only  in  accordance  with  the  terms  of such  license and with the *
// * inclusion of the above copyright notice.                              *
// *                                                                       *
// *************************************************************************

//LOCATION : application - controller - Teacher.php


class Teacher extends CI_Controller
{
    
    
    function __construct()
    {
        parent::__construct();
		$this->load->database();
        $this->load->library('session');
        /*cache control*/
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
    }
    
    /***default functin, redirects to login page if no teacher logged in yet***/
    public function index()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($this->session->userdata('teacher_login') == 1)
            redirect(base_url() . 'teacher/dashboard', 'refresh');
    }
    
    /***TEACHER DASHBOARD***/
    function dashboard()
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'dashboard';
        $page_data['page_title'] = get_phrase('teacher_dashboard');
        $this->load->view('backend/index', $page_data);
    }
    
    
    /*ENTRY OF A NEW STUDENT*/
    
    
    /****MANAGE STUDENTS CLASSWISE*****/
    function student_add()
	{
		if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
			
		$page_data['page_name']  = 'student_add';
		$page_data['page_title'] = get_phrase('add_student');
		$this->load->view('backend/index', $page_data);
	}
	
	function student_information($class_id = '') {
       if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
			
			 if ($this->input->post('operation') == 'selection') 
	{
        $page_data['class_id'] = $this->input->post('class_id');

        if ($page_data['class_id'] > 0 ) 
		{
            redirect(base_url() . 'teacher/student_information/' . $page_data['class_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'teacher/student_information/', 'refresh');
        }
    }
	
	 $page_data['page_name'] = 'student_information';
        $page_data['page_title'] = get_phrase('student_information') . " - " . get_phrase('class') . " : " .
                $this->crud_model->get_class_name($class_id);
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/index', $page_data);
    }

	
	function student_marksheet($student_id = '') {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        $class_id     = $this->db->get_where('student' , array('student_id' => $student_id))->row()->class_id;
        $student_name = $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;
        $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;
        $page_data['page_name']  =   'student_marksheet';
        $page_data['page_title'] =   get_phrase('marksheet_for') . ' ' . $student_name . ' (' . get_phrase('class') . ' ' . $class_name . ')';
        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
        $this->load->view('backend/index', $page_data);
    }

    function student_marksheet_print_view($student_id , $exam_id) {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        $class_id     = $this->db->get_where('student' , array('student_id' => $student_id))->row()->class_id;
        $class_name   = $this->db->get_where('class' , array('class_id' => $class_id))->row()->name;

        $page_data['student_id'] =   $student_id;
        $page_data['class_id']   =   $class_id;
        $page_data['exam_id']    =   $exam_id;
        $this->load->view('backend/teacher/student_marksheet_print_view', $page_data);
    }
	
    function student($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
    }

    function get_class_section($class_id)
    {
        $sections = $this->db->get_where('section' , array(
            'class_id' => $class_id
        ))->result_array();
        foreach ($sections as $row) {
            echo '<option value="' . $row['section_id'] . '">' . $row['name'] . '</option>';
        }
    }
    
	
	
	/* * ****VIEW STUDENT INFORMATION PAGE** */

	function view_student($student_id = '') {
    if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
		
		
   
	$class_id = $this->db->get_where('student', array('student_id' => $student_id))->row()->class_id;
    $student_name = $this->db->get_where('student', array('student_id' => $student_id))->row()->name;
    $class_name = $this->db->get_where('class', array('class_id' => $class_id))->row()->name;    
	$page_data['page_name'] = 'view_student';
        $page_data['page_title'] = get_phrase('student_information_page');
        $page_data['student_id'] = $student_id;
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/index', $page_data);
}
	
    /****MANAGE TEACHERS*****/
    function teacher_list($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'personal_profile') {
            $page_data['personal_profile']   = true;
            $page_data['current_teacher_id'] = $param2;
        }
        $page_data['teachers']   = $this->db->get('teacher')->result_array();
        $page_data['page_name']  = 'teacher';
        $page_data['page_title'] = get_phrase('teacher_list');
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	// ACADEMIC SYLLABUS
    function academic_syllabus($class_id = '')
    {
       if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
			
        if ($this->input->post('operation') == 'selection') 
	{
        $page_data['class_id'] = $this->input->post('class_id');

        if ($page_data['class_id'] > 0 ) 
		{
            redirect(base_url() . 'teacher/academic_syllabus/' . $page_data['class_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'teacher/academic_syllabus/', 'refresh');
        }
    }
	
	 $page_data['page_name'] = 'academic_syllabus';
        $page_data['page_title'] = get_phrase('academic_syllabus') . " - " . get_phrase('class') . " : " .
                $this->crud_model->get_class_name($class_id);
        $page_data['class_id'] = $class_id;
        $this->load->view('backend/index', $page_data);
    }

    function download_academic_syllabus($academic_syllabus_code)
    {
        $file_name = $this->db->get_where('academic_syllabus', array(
            'academic_syllabus_code' => $academic_syllabus_code
        ))->row()->file_name;
        $this->load->helper('download');
        $data = file_get_contents("uploads/syllabus/" . $file_name);
        $name = $file_name;

        force_download($name, $data);
    }
    
    /****MANAGE SUBJECTS*****/
    function subject($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

		$page_data['class_id']   = $param1;
        $page_data['subjects']   = $this->db->get_where('subject', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
        $page_data['page_name']  = 'subject';
        $page_data['page_title'] = get_phrase('manage_subject');
        $this->load->view('backend/index', $page_data);
    }
	
	 /****ALL GALLERIES*****/
    function gallery($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

		$page_data['class_id']   = $param1;
        $page_data['page_name']  = 'gallery';
        $page_data['page_title'] = get_phrase('all_galleries');
        $this->load->view('backend/index', $page_data);
    }
	
	function viewGalleryImages($gallery_id)
	{
		  
        $page_data['page_name'] = 'viewGalleryImages';
        $page_data['page_title'] = get_phrase('Gallery Images');
		$page_data['image'] 	= $this->db->get_where('gallery' , array('gallery_id' => $gallery_id))->result_array();
        $this->load->view('backend/index',$page_data);
    }
	
	
	 /****STAFF ATTENDANCE*****/
    function staff_attendance($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');

		
        $page_data['page_name']  = 'staff_attendance';
        $page_data['page_title'] = get_phrase('staff_attendance');
        $this->load->view('backend/index', $page_data);
    }
    
    
    
   /****MANAGE EXAM MARKS*****/
    function marks($exam_id = '', $class_id = '', $student_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = $this->input->post('exam_id');
            $page_data['class_id']   = $this->input->post('class_id');
            $page_data['student_id'] = $this->input->post('student_id');
            
            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['student_id'] > 0) {
                redirect(base_url() . 'teacher/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['student_id'], 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
                redirect(base_url() . 'teacher/marks/', 'refresh');
            }
        }
        if ($this->input->post('operation') == 'update') {
            $subjects = $this->db->get_where('subject' , array('class_id' => $class_id))->result_array();
            foreach($subjects as $row) {
                $data['mark_obtained'] = $this->input->post('mark_obtained_' . $row['subject_id']);
                $data['class_score'] = $this->input->post('class_score_' . $row['subject_id']);
				$data['class_score2'] = $this->input->post('class_score2_' . $row['subject_id']);
				$data['class_score3'] = $this->input->post('class_score3_' . $row['subject_id']);
				$data['class_score4'] = $this->input->post('class_score4_' . $row['subject_id']);
                $data['comment']      = $this->input->post('comment_' . $row['subject_id']);
                
                $this->db->where('mark_id', $this->input->post('mark_id_' . $row['subject_id']));
                $this->db->update('mark', array('mark_obtained' => $data['mark_obtained'] , 'comment' => $data['comment'] , 'class_score' => $data['class_score'], 'class_score2' => $data['class_score2'], 'class_score3' => $data['class_score3'], 'class_score4' => $data['class_score4']));
            }
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'teacher/marks/' . $this->input->post('exam_id') . '/' . $this->input->post('class_id') . '/' . $this->input->post('student_id'), 'refresh');
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;
        $page_data['student_id'] = $student_id;
        $page_data['subject_id'] = $section_id;
        $page_data['page_info'] = 'Exam marks';
        
        $page_data['page_name']  = 'marks';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }

    function manage_marks()
    {  
        $page_data['exam_id']    = $this->input->post('exam_id');
        $page_data['class_id']   = $this->input->post('class_id');
        $page_data['student_id'] = $this->input->post('student_id');
        if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['student_id'] > 0) {
            redirect(base_url() . 'teacher/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['student_id'], 'refresh');
        } else {
            $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
            redirect(base_url() . 'teacher/marks/', 'refresh');
        }
    }
	
	
	
	/****MANAGE EXAM MARKS*****/
    function student_marksheet_subject($exam_id = '', $class_id = '', $subject_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($this->input->post('operation') == 'selection') {
            $page_data['exam_id']    = $this->input->post('exam_id');
            $page_data['class_id']   = $this->input->post('class_id');
            $page_data['subject_id'] = $this->input->post('subject_id');
            
            if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['subject_id'] > 0) {
                redirect(base_url() . 'teacher/student_marksheet_subject/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['subject_id'], 'refresh');
            } else {
                $this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
                redirect(base_url() . 'teacher/student_marksheet_subject/', 'refresh');
            }
        }
        if ($this->input->post('operation') == 'update') {
            $students = $this->db->get_where('student' , array('class_id' => $class_id))->result_array();
            foreach($students as $row) {
                $data['mark_obtained'] = $this->input->post('mark_obtained_' . $row['student_id']);
				$data['class_score'] = $this->input->post('class_score_' . $row['student_id']);
				$data['class_score2'] = $this->input->post('class_score2_' . $row['student_id']);
				$data['class_score3'] = $this->input->post('class_score3_' . $row['student_id']);
				$data['class_score4'] = $this->input->post('class_score4_' . $row['student_id']);
                $data['comment']       = $this->input->post('comment_' . $row['student_id']);
                
                $this->db->where('mark_id', $this->input->post('mark_id_' . $row['student_id']));
                $this->db->update('mark', array('mark_obtained' => $data['mark_obtained'] , 'comment' => $data['comment'] , 'class_score' => $data['class_score'], 'class_score2' => $data['class_score2'], 'class_score3' => $data['class_score3'], 'class_score4' => $data['class_score4']));
            }
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'teacher/student_marksheet_subject/' . $this->input->post('exam_id') . '/' . $this->input->post('class_id') . '/' . $this->input->post('subject_id'), 'refresh');
        }
        $page_data['exam_id']    = $exam_id;
        $page_data['class_id']   = $class_id;
        $page_data['subject_id'] = $subject_id;
		$page_data['student_id'] = $section_id;
        
        $page_data['page_info'] = 'Exam marks';
        
        $page_data['page_name']  = 'student_marksheet_subject';
        $page_data['page_title'] = get_phrase('manage_exam_marks');
        $this->load->view('backend/index', $page_data);
    }
	
    
    /******MANAGE OWN PROFILE AND CHANGE PASSWORD***/
    function manage_profile($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        if ($param1 == 'update_profile_info') {
            $data['name']        = $this->input->post('name');
            $data['email']       = $this->input->post('email');
            
            $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
            $this->db->update('teacher', $data);
            move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/teacher_image/' . $this->session->userdata('teacher_id') . '.jpg');
            $this->session->set_flashdata('flash_message', get_phrase('account_updated'));
            redirect(base_url() . 'teacher/manage_profile/', 'refresh');
        }
       if ($param1 == 'change_password') {
            $data['password']             = sha1($this->input->post('password'));
            $data['new_password']         = sha1($this->input->post('new_password'));
            $data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));
            
            $current_password = $this->db->get_where('teacher', array(
                'teacher_id' => $this->session->userdata('teacher_id')
            ))->row()->password;
            if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
                $this->db->where('teacher_id', $this->session->userdata('teacher_id'));
                $this->db->update('teacher', array(
                    'password' => $data['new_password']
                ));
                $this->session->set_flashdata('flash_message', get_phrase('password_updated'));
            } else {
                $this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
            }
            redirect(base_url() . 'teacher/manage_profile/', 'refresh');
        }
        $page_data['page_name']  = 'manage_profile';
        $page_data['page_title'] = get_phrase('manage_profile');
        $page_data['edit_data']  = $this->db->get_where('teacher', array(
            'teacher_id' => $this->session->userdata('teacher_id')
        ))->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
   
   
   /**********MANAGING CLASS ROUTINE******************/
    function class_routine($class_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        $page_data['page_name']  = 'class_routine';
        $page_data['class_id']  =   $class_id;
        $page_data['page_title'] = get_phrase('class_routine');
        $this->load->view('backend/index', $page_data);
    }
	
	function class_routine_print_view($class_id , $section_id)
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        $page_data['class_id']   =   $class_id;
        $page_data['section_id'] =   $section_id;
        $this->load->view('backend/teacher/class_routine_print_view' , $page_data);
    }

   
	
	/****** DAILY ATTENDANCE *****************/
    function manage_attendance($date='',$month='',$year='',$class_id='')
    {
        if($this->session->userdata('teacher_login')!=1)redirect('login' , 'refresh');

        $active_sms_service = $this->db->get_where('settings' , array('type' => 'active_sms_service'))->row()->description;
        
         if ($_POST) {
        // Loop all the students of $class_id
        $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
        foreach ($students as $row) {
            $attendance_status = $this->input->post('status_' . $row['student_id']);
            $full_date = $year . "-" . $month . "-" . $date;
            $this->db->where('student_id', $row['student_id']);
            $this->db->where('date', $full_date);

            $this->db->update('attendance', array('status' => $attendance_status));

            // if ($attendance_status == 2) {
            //     if ($active_sms_service != '' || $active_sms_service != 'disabled') {
            //         $student_name   = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->name;
            //         $receiver_phone = $this->db->get_where('parent' , array('parent_id' => $row['parent_id']))->row()->phone;
            //         $message        = 'Your child' . ' ' . $student_name . 'is absent today.';
            //         $this->sms_model->send_sms($message,$receiver_phone);
            //     }
            // }
        }

        $this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        redirect(base_url() . 'teacher/manage_attendance/' . $date . '/' . $month . '/' . $year . '/' . $class_id . '/' . $section_id, 'refresh');
    }
    $page_data['date'] = $date;
    	$page_data['month'] = $month;
    		$page_data['year'] = $year;
    			$page_data['class_id'] = $class_id;
    				$page_data['section_id'] = $section_id;
    					$page_data['page_name'] = 'manage_attendance';
    						$page_data['page_title'] = get_phrase('manage_daily_attendance');
    							$this->load->view('backend/index', $page_data);
}

	
function attendance_report($class_id = '', $section_id = '', $month = '', $year = '') {
    if ($this->session->userdata('teacher_login') != 1)
        redirect(base_url(), 'refresh');

    			$active_sms_service = $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;


    if ($_POST) {
        redirect(base_url() . 'teacher/attendance_report/' . $class_id . '/' . $section_id . '/' . $month . '/' . $year, 'refresh');
    }
    		$classes = $this->db->get('class')->result_array();
    			foreach ($classes as $row) {
        			if (isset($class_id) && $class_id == $row['class_id'])
            			$calss_name = $row['name'];
    }
    $sections = $this->db->get('section')->result_array();
    	foreach ($sections as $row) {
        	if (isset($section_id) && $section_id == $row['section_id'])
            	$section_name = $row['name'];
    }

    				$page_data['month'] = $month;
    					$page_data['year'] = $year;
    						$page_data['class_id'] = $class_id;
    							$page_data['section_id'] = $section_id;
    								$page_data['page_name'] = 'attendance_report';
    									$page_data['page_title'] = "Attendance Report Of Class " . $calss_name . " : Section " . $section_name;
    										$this->load->view('backend/index', $page_data);
}

function attendance_report_print_view($class_id = '', $section_id = '', $month = '', $year = '') {
    $page_data['month'] = $month;
    	$page_data['year'] = $year;
    			$page_data['class_id'] = $class_id;
    				$page_data['section_id'] = $section_id;
    						$this->load->view('backend/attendance_report_print_view.php', $page_data);
}

function attendance_selector() {
    $date = $this->input->post('timestamp');
    	$date = date_create($date);
    		$date = date_format($date, "d/m/Y");
    			redirect(base_url() . 'teacher/manage_attendance/' . $date . '/' . $this->input->post('class_id') . '/' . $this->input->post('section_id'), 'refresh');
}

function attendance_report_view() {
    redirect(base_url() . 'teacher/attendance_report/' . $this->input->post('class_id') . '/' . $this->input->post('section_id') . '/' . $this->input->post('month') . '/' . $this->input->post('year'), 'refresh');
}
    
    
    /**********MANAGE LIBRARY / BOOKS********************/
    function book($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['books']      = $this->db->get('book')->result_array();
        $page_data['page_name']  = 'book';
        $page_data['page_title'] = get_phrase('manage_library_books');
        $this->load->view('backend/index', $page_data);
        
    }
	
	
	 /**********MANAGE HOLIDAY ********************/
    function holiday($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['holidays']      = $this->db->get('holiday')->result_array();
        $page_data['page_name']  = 'holiday';
        $page_data['page_title'] = get_phrase('manage_holidays');
        $this->load->view('backend/index', $page_data);
        
    }
	
	
	 /**********MANAGE todays_thought ********************/
    function todays_thought($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['todays_thoughts']      = $this->db->get('todays_thought')->result_array();
        $page_data['page_name']  = 'todays_thought';
        $page_data['page_title'] = get_phrase('manage_todays_thought');
        $this->load->view('backend/index', $page_data);
        
    }
	


/**********MANAGE LOAN APPLICATIONS *******************/
    function loan_applicant($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
		if ($param1 == 'create') {
		
		    $data['staff_name']     	= $this->input->post('staff_name');
		    $data['name']     			= $this->input->post('name');
            $data['amount']        	 	= $this->input->post('amount');
            $data['purpose']    	  	= $this->input->post('purpose');
            $data['l_duration']       	= $this->input->post('l_duration');
			//$data['file_name'] 			= $_FILES["file_name"]["name"];
            $data['mop']       			= $this->input->post('mop');
			
			$data['g_name']     		= $this->input->post('g_name');
            $data['g_relationship']     = $this->input->post('g_relationship');
            $data['g_number']     		= $this->input->post('g_number');
			
			$data['g_address']     		= $this->input->post('g_address');
            $data['g_country']         	= $this->input->post('g_country');
            $data['c_name']     		= $this->input->post('c_name');
			
			$data['c_type']     		= $this->input->post('c_type');
            $data['model']         		= $this->input->post('model');
            $data['make']     			= $this->input->post('make');
			
			$data['serial_number']     	= $this->input->post('serial_number');
            $data['value']   			= $this->input->post('value');
            $data['condition']     		= $this->input->post('condition');
			$data['date']         		= $this->input->post('date');
            $data['status']     		= $this->input->post('status');
			
            $this->db->insert('loan', $data);
            $loan_id = $this->db->insert_id();
			
			$data['file_name'] 			= $_FILES["file_name"]["name"];
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/loan_applicant/" . $_FILES["file_name"]["name"]);
			$this->session->set_flashdata('flash_message' , get_phrase('loan_application_submitted_successfully'));
            redirect(base_url() . 'teacher/loan_applicant' , 'refresh');
        }
		
        $page_data['page_name']  = 'loan_applicant';
        $page_data['page_title'] = get_phrase('loan_application');
        $page_data['loan_applicants']  = $this->db->get('loan')->result_array();
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	/**********MANAGE LOAN APPLICATIONS *******************/
    function loan_approval($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
       
		
        $page_data['page_name']  = 'loan_approval';
        $page_data['page_title'] = get_phrase('view_approval');
        $page_data['loan_approvals']  = $this->db->get('loan')->result_array();
        $this->load->view('backend/index', $page_data);
    }
	
	
	
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function transport($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['transports'] = $this->db->get('transport')->result_array();
        $page_data['page_name']  = 'transport';
        $page_data['page_title'] = get_phrase('manage_transport');
        $this->load->view('backend/index', $page_data);
        
    }
	
	
	
	/**********MANAGE DOCUMENT / home work FOR A SPECIFIC CLASS or ALL*******************/
    function assignment($param1 = '', $param2 = '' , $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
			
        if ($param1 == 'create') {
		
		    $data['timestamp']     = $this->input->post('timestamp');
            $data['subject_id']         = $this->input->post('subject_id');
            $data['description']     = $this->input->post('description');
			$data['file_name'] 	= $_FILES["file_name"]["name"];
            $data['class_id']       = $this->input->post('class_id');
            $data['teacher_id']       = $this->input->post('teacher_id');
            $data['file_type']       = $this->input->post('file_type');
            $this->db->insert('assignment', $data);
            $assignment_id = $this->db->insert_id();
			
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/assignment/" . $_FILES["file_name"]["name"]);
            redirect(base_url() . 'teacher/assignment' , 'refresh');
        }
		if ($param1 == 'do_update') {
             $data['timestamp']     = $this->input->post('timestamp');
            $data['subject_id']         = $this->input->post('subject_id');
            $data['description']     = $this->input->post('description');
            $data['class_id']       = $this->input->post('class_id');
            $data['file_type']       = $this->input->post('file_type');
            
            $this->db->where('assignment_id', $param2);
            $this->db->update('assignment', $data);
			 $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'teacher/assignment/'.$data['assignment_id'], 'refresh');
			}
			
       if ($param1 == 'delete') {
            $this->db->where('assignment_id' , $param2);
            $this->db->delete('assignment');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'teacher/assignment' , 'refresh');
        }
		
        $page_data['page_name']  = 'assignment';
        $page_data['page_title'] = get_phrase('manage_assignment');
        $page_data['assignments']  = $this->db->get('assignment')->result_array();
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	
	
	/**********MANAGE AASIGNMENTS *******************/
    function examquestion($param1 = '', $param2 = '' , $param3 = '')
    {
      if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
			
        if ($param1 == 'create') {
		
		    $data['timestamp']     = $this->input->post('timestamp');
            $data['teacher_id']         = $this->input->post('teacher_id');
            $data['subject_id']         = $this->input->post('subject_id');
            $data['description']     = $this->input->post('description');
			$data['file_name'] 	= $_FILES["file_name"]["name"];
            $data['class_id']       = $this->input->post('class_id');
            $data['file_type']       = $this->input->post('file_type');
	        $data['status']         = $this->input->post('status');
            $this->db->insert('examquestion', $data);
            $examquestion_id = $this->db->insert_id();
			
            move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/examquestion/" . $_FILES["file_name"]["name"]);
            redirect(base_url() . 'teacher/examquestion' , 'refresh');
        }
		if ($param1 == 'do_update') {
             $data['timestamp']     = $this->input->post('timestamp');
            $data['subject_id']         = $this->input->post('subject_id');
            $data['description']     = $this->input->post('description');
            $data['class_id']       = $this->input->post('class_id');

            
            $this->db->where('examquestion_id', $param2);
            $this->db->update('examquestion', $data);
			 $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'teacher/examquestion'.$data['examquestion_id'], 'refresh');
			}
			
       if ($param1 == 'delete') {
            $this->db->where('examquestion_id' , $param2);
            $this->db->delete('examquestion');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'teacher/examquestion' , 'refresh');
        }
		
        $page_data['page_name']  = 'examquestion';
        $page_data['page_title'] = get_phrase('manage_examquestion');
        $page_data['examquestions']  = $this->db->get('examquestion')->result_array();
        $this->load->view('backend/index', $page_data);
    }
	
	
	
    /**********MANAGE TRANSPORT / VEHICLES / ROUTES********************/
    function news($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        
        $page_data['newss'] = $this->db->get('news')->result_array();
        $page_data['page_name']  = 'news';
        $page_data['page_title'] = get_phrase('manage_news');
        $this->load->view('backend/index', $page_data);
        
    }
    
    /***MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD**/
    function noticeboard($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->insert('noticeboard', $data);
            redirect(base_url() . 'teacher/noticeboard/', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['notice_title']     = $this->input->post('notice_title');
            $data['notice']           = $this->input->post('notice');
            $data['create_timestamp'] = strtotime($this->input->post('create_timestamp'));
            $this->db->where('notice_id', $param2);
            $this->db->update('noticeboard', $data);
            $this->session->set_flashdata('flash_message', get_phrase('notice_updated'));
            redirect(base_url() . 'teacher/noticeboard/', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('noticeboard', array(
                'notice_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('notice_id', $param2);
            $this->db->delete('noticeboard');
            redirect(base_url() . 'teacher/noticeboard/', 'refresh');
        }
        $page_data['page_name']  = 'noticeboard';
        $page_data['page_title'] = get_phrase('manage_noticeboard');
        $page_data['notices']    = $this->db->get('noticeboard')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
	
	
	/****MANAGE HELPFUL LINK*****/
    function help_link($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
			
        if ($param1 == 'create') {
            
			$data['title']         = $this->input->post('title');
            $data['link'] 			= $this->input->post('link');
            $data['class_id'] 		= $this->input->post('class_id');
			$data['type'] 		= $this->input->post('type');
            
            $this->db->insert('help_link', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            redirect(base_url() . 'teacher/help_link', 'refresh');
        }
        if ($param1 == 'do_update') {
            $data['title']         = $this->input->post('title');
            $data['link'] = $this->input->post('link');
			$data['class_id'] 		= $this->input->post('class_id');
			$data['type'] 		= $this->input->post('type');
            
            $this->db->where('helplink_id', $param2);
            $this->db->update('help_link', $data);
            $this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            redirect(base_url() . 'teacher/help_link', 'refresh');
        } else if ($param1 == 'edit') {
            $page_data['edit_data'] = $this->db->get_where('help_link', array(
                'helplink_id' => $param2
            ))->result_array();
        }
        if ($param1 == 'delete') {
            $this->db->where('helplink_id', $param2);
            $this->db->delete('help_link');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(base_url() . 'teacher/help_link', 'refresh');
        }
        $page_data['help_links']    = $this->db->get('help_link')->result_array();
        $page_data['page_name']  = 'help_link';
        $page_data['page_title'] = get_phrase('manage_help_link');
        $this->load->view('backend/index', $page_data);
    }
	
	
    
    /**********MANAGE DOCUMENT / home work FOR A SPECIFIC CLASS or ALL*******************/
    function document($do = '', $document_id = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect('login', 'refresh');
        if ($do == 'upload') {
            move_uploaded_file($_FILES["userfile"]["tmp_name"], "uploads/document/" . $_FILES["userfile"]["name"]);
            $data['document_name'] = $this->input->post('document_name');
            $data['file_name']     = $_FILES["userfile"]["name"];
            $data['file_size']     = $_FILES["userfile"]["size"];
            $this->db->insert('document', $data);
            redirect(base_url() . 'teacher/manage_document', 'refresh');
        }
        if ($do == 'delete') {
            $this->db->where('document_id', $document_id);
            $this->db->delete('document');
            redirect(base_url() . 'teacher/manage_document', 'refresh');
        }
        $page_data['page_name']  = 'manage_document';
        $page_data['page_title'] = get_phrase('manage_documents');
        $page_data['documents']  = $this->db->get('document')->result_array();
        $this->load->view('backend/index', $page_data);
    }
    
    /*********MANAGE STUDY MATERIAL************/
    function study_material($task = "", $document_id = "")
    {
        if ($this->session->userdata('teacher_login') != 1)
        {
            $this->session->set_userdata('last_page' , current_url());
            redirect(base_url(), 'refresh');
        }
                
        if ($task == "create")
        {
            $this->crud_model->save_study_material_info();
            $this->session->set_flashdata('flash_message' , get_phrase('study_material_info_saved_successfuly'));
            redirect(base_url() . 'teacher/study_material' , 'refresh');
        }
        
        if ($task == "update")
        {
            $this->crud_model->update_study_material_info($document_id);
            $this->session->set_flashdata('flash_message' , get_phrase('study_material_info_updated_successfuly'));
            redirect(base_url() . 'teacher/study_material' , 'refresh');
        }
        
        if ($task == "delete")
        {
            $this->crud_model->delete_study_material_info($document_id);
            redirect(base_url() . 'teacher/study_material');
        }
        
        $data['study_material_info']    = $this->crud_model->select_study_material_info();
        $data['page_name']              = 'study_material';
        $data['page_title']             = get_phrase('study_material');
        $this->load->view('backend/index', $data);
    }
    
    /* private messaging */

    function message($param1 = 'message_home', $param2 = '', $param3 = '') {
        if ($this->session->userdata('teacher_login') != 1)
        {
            $this->session->set_userdata('last_page' , current_url());
            redirect(base_url(), 'refresh');
        }
		$max_size = 2097152;

        if ($param1 == 'send_new') {
		
		if (!file_exists('uploads/private_messaging_attached_file/')) 
			{
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ('uploads/private_messaging_attached_file/', 0777);
            }
            if ($_FILES['attached_file_on_messaging']['name'] != "") 
			{
                if($_FILES['attached_file_on_messaging']['size'] > $max_size)
				{
                    $this->session->set_flashdata('error_message' , get_phrase('file_size_can_not_be_larger_that_2_Megabyte'));
                    redirect(base_url() . 'teacher/message/message_new/', 'refresh');
                }
                else
				{
                    $file_path = 'uploads/private_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }
			
            $message_thread_code = $this->crud_model->send_new_private_message();
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'teacher/message/message_read/' . $message_thread_code, 'refresh');
        }

        if ($param1 == 'send_reply') {
		
		if (!file_exists('uploads/private_messaging_attached_file/')) 
			{
                $oldmask = umask(0);  // helpful when used in linux server
                mkdir ('uploads/private_messaging_attached_file/', 0777);
            }
            if ($_FILES['attached_file_on_messaging']['name'] != "") 
			{
                if($_FILES['attached_file_on_messaging']['size'] > $max_size)
				{
                    $this->session->set_flashdata('error_message' , get_phrase('file_size_can_not_be_larger_that_2_Megabyte'));
                    redirect(base_url() . 'teacher/message/message_read/' . $param2, 'refresh');
                }
                else
				{
                    $file_path = 'uploads/private_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }
			
            $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
            $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
            redirect(base_url() . 'teacher/message/message_read/' . $param2, 'refresh');
        }

        if ($param1 == 'message_read') {
            $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
            $this->crud_model->mark_thread_messages_read($param2);
        }

        $page_data['message_inner_page_name']   = $param1;
        $page_data['page_name']                 = 'message';
        $page_data['page_title']                = get_phrase('private_messaging');
        $this->load->view('backend/index', $page_data);
    }
	
	
	  // AWARD
    function award($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        $page_data['page_name']     = 'award';
        $page_data['page_title']    = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }
	
	
	/**************** PAYROLL LIST PAGE ***************/
	function payroll_list()
    {
        $page_data['page_name']     = 'payroll_list';
        $page_data['page_title']    = get_phrase('payslip_list');
        $this->load->view('backend/index', $page_data);
    }
	
	 // LEAVE
    function leave($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('teacher_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $leave = $this->crud_model->create_leave();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'teacher/leave', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'teacher/leave', 'refresh');
        }
        
        if ($param1 == 'delete') {
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'teacher/leave', 'refresh');
        }
        
        $page_data['page_name']     = 'leave';
        $page_data['page_title']    = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	
	
	 /**********INSERT ATTENDANCE FOR TEACHER IMAGE********************/
    function save_atten($param1 = '', $param2 = '', $param3 = '')
    {
        
		$data['staff_id'] 	= $this->session->userdata('login_user_id');
		$data['account'] 	= 'teacher'; 
		$data['time_in'] 	= date("Y-m-d");
		$data['time'] 		= date("h:i:sa");
		$data['status'] 	= 'half';
		$a = substr(md5(uniqid(rand(), true)), 0, 7);
		$data['webcam'] = $this->session->userdata('login_user_id').$a.$_FILES["webcam"]["name"];
		
		 $this->db->insert('staff_attendance', $data);
        	$staff_attendance_id = $this->db->insert_id();
        		move_uploaded_file($_FILES["webcam"]["tmp_name"], "uploads/staff_attendance/".$this->session->userdata('login_user_id').$a.$_FILES["webcam"]["name"]);
        			$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        					redirect(base_url() . 'teacher/staff_attendance/'. $this->session->userdata('login_user_id'), 'refresh');
							
		
		 
    }
	
	 /**********UPDATE ATTENDANCE FOR TEACHER  IMAGE********************/
	 function clockout($staff_attendance_id)
    	{
		$data['time_out'] 	= date("Y-m-d");
		$data['time2'] 		= date("h:i:sa");
		$data['status'] 	= 'full';
		$a = substr(md5(uniqid(rand(), true)), 0, 7);
		$data['webcam2'] = $this->session->userdata('login_user_id').$a.$_FILES["webcam"]["name"];
			
			$this->db->where('staff_attendance_id', $staff_attendance_id);
        	$this->db->update('staff_attendance', $data);
			
        		move_uploaded_file($_FILES["webcam"]["tmp_name"], "uploads/staff_attendance/".$this->session->userdata('login_user_id').$a.$_FILES["webcam"]["name"]);
        			$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        					redirect(base_url() . 'teacher/staff_attendance/'. $this->session->userdata('login_user_id'), 'refresh');
						
		
		 
    }
	
	
	
	//GROUP MESSAGE
    function group_message($param1 = "group_message_home", $param2 = ""){
      if ($this->session->userdata('teacher_login') != 1)
          redirect(base_url(), 'refresh');
      $max_size = 2097152;

      if ($param1 == 'group_message_read') {
        $page_data['current_message_thread_code'] = $param2;
      }
      else if($param1 == 'send_reply'){
        if (!file_exists('uploads/group_messaging_attached_file/')) {
          $oldmask = umask(0);  // helpful when used in linux server
          mkdir ('uploads/group_messaging_attached_file/', 0777);
        }
        if ($_FILES['attached_file_on_messaging']['name'] != "") {
          if($_FILES['attached_file_on_messaging']['size'] > $max_size){
            $this->session->set_flashdata('error_message' , get_phrase('file_size_can_not_be_larger_that_2_Megabyte'));
              redirect(site_url('teacher/group_message/group_message_read/'.$param2), 'refresh');
          }
          else{
            $file_path = 'uploads/group_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
            move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
          }
        }

        $this->crud_model->send_reply_group_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
          redirect(site_url('teacher/group_message/group_message_read/'.$param2), 'refresh');
      }
      $page_data['message_inner_page_name']   = $param1;
      $page_data['page_name']                 = 'group_message';
      $page_data['page_title']                = get_phrase('group_messaging');
      $this->load->view('backend/index', $page_data);
    }
	
	
	/**********INSERT ATTENDANCE FOR TEACHER WITHOUT IMAGE********************/
    function withnoimageInsert($param1 = '', $param2 = '', $param3 = '')
    {
        
		$data['staff_id'] 	= $this->session->userdata('login_user_id');
		$data['account'] 	= 'teacher';  
		$data['time_in'] 	= date("Y-m-d");
		$data['time'] 		= date("h:i:sa");
		$data['status'] 	= 'half';
		 $this->db->insert('staff_attendance', $data);
        	$staff_attendance_id = $this->db->insert_id();
        			$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        					redirect(base_url() . 'teacher/staff_attendance/'. $this->session->userdata('login_user_id'), 'refresh');
    }
	
	/**********INSERT ATTENDANCE FOR TEACHER WITHOUT IMAGE********************/
    function withnoimageUpdate($staff_attendance_id)
    {
        
		
		$data['time_out'] 	= date("Y-m-d");
		$data['time2'] 		= date("h:i:sa");
		$data['status'] 	= 'full';
		
		$this->db->where('staff_attendance_id', $staff_attendance_id);
        		$this->db->update('staff_attendance', $data);
        	
        			$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        					redirect(base_url() . 'teacher/staff_attendance/'. $this->session->userdata('login_user_id'), 'refresh');
    }
	
	// This function call from AJAX
	function generalMessageDelete($general_message_id) {
	$this->db->where('general_message_id', $general_message_id);
        	$this->db->delete('general_message');
        			redirect(base_url() . 'teacher/dashboard', 'refresh');
	
	}
	
	// This function call from AJAX
	function deleteMessageFunction($message_id, $message_thread_code) {
	$this->db->where('message_id', $message_id);
        	$this->db->delete('message');
        			redirect(base_url() . 'teacher/message/message_read/'.$message_thread_code , 'refresh');
	
	}

	
	
	// This function call from AJAX
	function deleteMessageFunctionGroup($group_message_id, $group_message_thread_code) {
	$this->db->where('group_message_id', $group_message_id);
        	$this->db->delete('group_message');
        			redirect(base_url() . 'teacher/group_message/group_message_read/'.$group_message_thread_code , 'refresh');
	
	}
	
	
}