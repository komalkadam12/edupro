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

//LOCATION : application - controller - Admin.php


class Admin extends CI_Controller { 

    function __construct() {
        parent::__construct();
        	$this->load->database();
        		$this->load->library('session');
				$this->load->model('Barcode_model');
				$this->load->library('phpqrcode/qrlib');

        /* cache control */
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        	$this->output->set_header('Pragma: no-cache');
    }

    /*     * *default functin, redirects to login page if no admin logged in yet** */

    public function index() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url() . 'login', 'refresh');
        		if ($this->session->userdata('admin_login') == 1)
            		redirect(base_url() . 'admin/dashboard', 'refresh');
    }

    /*ADMIN DASHBOARD** */
    function dashboard() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        		$page_data['page_name'] = 'dashboard';
        			$page_data['page_title'] = get_phrase('admin_dashboard');
        				$this->load->view('backend/index', $page_data);
    }

    /*     * **MANAGE STUDENTS CLASSWISE**** */

    function new_student() {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

        				$page_data['page_name'] = 'new_student';
        					$page_data['page_title'] = get_phrase('student_admission_form');
        						$this->load->view('backend/index', $page_data);
    }

   
	
	

/* * **MANAGE PARENTS **** */

 function parent($param1 = '', $param2 = '', $param3 = '')
 {
    if($this->  session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
		
		
    $page_data['page_title'] = get_phrase('all_parents');
    	$page_data['page_name'] = 'parent';
    		$this->load->view('backend/index', $page_data);
}



/* * **MANAGE TEACHERS**** */
function teacher($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   
    							$page_data['teachers'] = $this->db->get('teacher')->result_array();
    								$page_data['page_name'] = 'teacher';
    									$page_data['page_title'] = get_phrase('manage_teacher');
    										$this->load->view('backend/index', $page_data);
							}



	
	
	
	
	
	/* * **MANAGE HRM **** */
function hrm($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    if ($param1 == 'create') {
	
		$data = array(
        'name' => $this->input->post('name'),
        		'hrm_number' => $this->input->post('hrm_number'),
					'birthday' => $this->input->post('birthday'),
        				'sex' => $this->input->post('sex'),
							'religion' => $this->input->post('religion'),
        						'blood_group' => $this->input->post('blood_group'),
        							'address' => $this->input->post('address'),
										'phone' => $this->input->post('phone'),
		
		
        	'facebook' => $this->input->post('facebook'),
        		'twitter' => $this->input->post('twitter'),
					'googleplus' => $this->input->post('googleplus'),
        				'linkedin' => $this->input->post('linkedin'),
							'qualification' => $this->input->post('qualification'),
        						'marital_status' => $this->input->post('marital_status'),
									'password' => sha1($this->input->post('password'))
    	);
        
	$data['file_name'] = $_FILES["file_name"]["name"];
		$data['email'] = $this->input->post('email');
			$check_email = $this->db->get_where('hrm', array('email' => $data['email']))->row()->email;
				if($check_email != null) 
				{
					$this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        					redirect(base_url() . 'admin/hrm/', 'refresh');
				}
						else
						{
        $this->db->insert('hrm', $data);
        	$hrm_id = $this->db->insert_id();

		
				move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/hrm_image/" . $_FILES["file_name"]["name"]);
       				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hrm_image/' . $hrm_id . '.jpg');
					
// INSERT INTO hrm TABLE PERMISSION STARTS FROM HERE//				
	/*$data2['hrm_id'] = $hrm_id;		
		$data2['dashboard'] = 'yes';
        	$data2['department'] = 'yes';
        		$data2['recruitment'] = 'yes';
        			$data2['leave'] = 'yes';
        				$data2['payroll'] = 'yes';
        					$data2['award'] = 'yes';
        						$data2['view_users'] = 'yes';
									$data2['loans'] = 'yes';
        								$data2['information'] = 'yes';
											$data2['transportation'] = 'yes';
												$data2['message'] = 'yes';
													$data2['profile'] = 'yes';

                $this->db->insert('hrmpermission' , $data2);
					// INSERT INTO hrm TABLE PERMISSION ENDS FROM HERE//	
			*/
        				$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        					$this->email_model->account_opening_email('hrm', $data['email']); //SEND EMAIL ACCOUNT OPENING EMAIL
        						redirect(base_url() . 'admin/hrm/', 'refresh');
    					}
			 	}
    if ($param1 == 'do_update') {
	$data = array(
        'name' => $this->input->post('name'),
        			'birthday' => $this->input->post('birthday'),
        				'sex' => $this->input->post('sex'),
							'religion' => $this->input->post('religion'),
        						'blood_group' => $this->input->post('blood_group'),
        							'address' => $this->input->post('address'),
										'phone' => $this->input->post('phone'),
		
		'email' => $this->input->post('email'),
        	'facebook' => $this->input->post('facebook'),
        		'twitter' => $this->input->post('twitter'),
					'googleplus' => $this->input->post('googleplus'),
        				'linkedin' => $this->input->post('linkedin'),
							'qualification' => $this->input->post('qualification'),
        						'marital_status' => $this->input->post('marital_status')
    	);
		
        		$this->db->where('hrm_id', $param2);
        			$this->db->update('hrm', $data);
        				move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/hrm_image/' . $param2 . '.jpg');
        					$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        						redirect(base_url() . 'admin/hrm/', 'refresh');
    } else if ($param1 == 'personal_profile') {
        $page_data['personal_profile'] = true;
        $page_data['current_hrm_id'] = $param2;
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('hrm', array(
                    'hrm_id' => $param2
                ))->result_array();
    }
    if ($param1 == 'delete') {
        	$this->db->where('hrm_id', $param2);
        		$this->db->delete('hrm');
        			$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        				redirect(base_url() . 'admin/hrm/', 'refresh');
    						}
    							$page_data['hrms'] = $this->db->get('hrm')->result_array();
    								$page_data['page_name'] = 'hrm';
    									$page_data['page_title'] = get_phrase('manage_hrm');
    										$this->load->view('backend/index', $page_data);
							}


 /**********EDIT DATA********************/
	function editHrm($hrm_id)
    {
        if ($this->session->userdata('admin_login') != 1)
        		redirect(base_url(), 'refresh');
		
        				$page_data['hrms'] 	 =	$this->db->get_where('hrm' , array('hrm_id' => $hrm_id))->result_array();
        					$page_data['page_name']  = 'editHrm';
        						$page_data['page_title'] = get_phrase('edit_hrm');
        							$this->load->view('backend/index', $page_data);
        
    }
	
	/**********hrm PROFILE********************/
	function hrm_profile($hrm_id)
    {
        if ($this->session->userdata('admin_login') != 1)
        		redirect(base_url(), 'refresh');
		
        				$page_data['hrms'] 	 =	$this->db->get_where('hrm' , array('hrm_id' => $hrm_id))->result_array();
        					$page_data['page_name']  = 'hrm_profile';
        						$page_data['page_title'] = get_phrase('hrm_profile');
        							$this->load->view('backend/index', $page_data);
        
    }
	

	
	

/* * **MANAGE ALUMNI**** */
function alumni($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   

  
    	$page_data['alumni'] = $this->db->get('alumni')->result_array();
    		$page_data['page_name'] = 'alumni';
    			$page_data['page_title'] = get_phrase('manage_alumni');
    				$this->load->view('backend/index', $page_data);
}


/* * **MANAGE LIBRARIANS**** */
function librarian($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   
      
  
		
    				$page_data['librarians'] = $this->db->get('librarian')->result_array();
    						$page_data['page_name'] = 'librarian';
    								$page_data['page_title'] = get_phrase('manage_librarian');
    										$this->load->view('backend/index', $page_data);
					}
					
	
	
/* * **MANAGE BANNER **** */

function banar($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
			

    $page_data['banars'] = $this->db->get('banar')->result_array();
    	$page_data['page_name'] = 'banar';
    		$page_data['page_title'] = get_phrase('manage_banar');
    			$this->load->view('backend/index', $page_data);
}


/* * **MANAGE GALLERY **** */

function gallery($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
	
        $page_data['page_name'] = 'upload_gallery_image';
        $page_data['page_title'] = get_phrase('Upload Gallery Images');
		$page_data['image'] 	= $this->db->get_where('gallery' , array('gallery_id' => $gallery_id))->result_array();
        $this->load->view('backend/index',$page_data);
    }

// ACADEMIC SYLLABUS
function academic_syllabus($class_id = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    // detect the first class
    if ($class_id == '')
        $class_id = $this->db->get('class')->first_row()->class_id;

    $page_data['page_name'] = 'academic_syllabus';
    	$page_data['page_title'] = get_phrase('academic_syllabus');
    		$page_data['class_id'] = $class_id;
    			$this->load->view('backend/index', $page_data);
}

function upload_academic_syllabus() {
    $data['academic_syllabus_code'] = substr(md5(rand(0, 1000000)), 0, 7);
    	$data['title'] = $this->input->post('title');
    		$data['description'] = $this->input->post('description');
    			$data['class_id'] = $this->input->post('class_id');
    				$data['subject_id'] = $this->input->post('subject_id');
    					$data['uploader_type'] = $this->session->userdata('login_type');
    						$data['uploader_id'] = $this->session->userdata('login_user_id');
    							$data['session'] = $this->db->get_where('settings', array('type' => 'session'))->row()->description;
    								$data['timestamp'] = strtotime(date("Y-m-d H:i:s"));
    //uploading file using codeigniter upload library
    $files = $_FILES['file_name'];
    	$this->load->library('upload');
    		$config['upload_path'] = 'uploads/syllabus/';
    			$config['allowed_types'] = '*';
    				$_FILES['file_name']['name'] = $files['name'];
    					$_FILES['file_name']['type'] = $files['type'];
    						$_FILES['file_name']['tmp_name'] = $files['tmp_name'];
    							$_FILES['file_name']['size'] = $files['size'];
    								$this->upload->initialize($config);
    									$this->upload->do_upload('file_name');

    $data['file_name'] = $_FILES['file_name']['name'];
    	$this->db->insert('academic_syllabus', $data);
    		$this->session->set_flashdata('flash_message', get_phrase('syllabus_uploaded'));
    			redirect(base_url() . 'admin/academic_syllabus/' . $data['class_id'], 'refresh');
}

function delete($id) {
    $this->db->where('id', $id);
    	$this->db->delete('academic_syllabus');
    		$this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
    			redirect(base_url() . 'admin/academic_syllabus', 'refresh');
}

function download_academic_syllabus($academic_syllabus_code) {
    $file_name = $this->db->get_where('academic_syllabus', array(
                'academic_syllabus_code' => $academic_syllabus_code
            ))->row()->file_name;
    $this->load->helper('download');
    	$data = file_get_contents("uploads/syllabus/" . $file_name);
    		$name = $file_name;
    			force_download($name, $data);
}

/* * **MANAGE ACCOUNTANT**** */

function accountant($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
 
        		
    	$page_data['accountants'] = $this->db->get('accountant')->result_array();
    		$page_data['page_name'] = 'accountant';
    				$page_data['page_title'] = get_phrase('manage_accountant');
    					$this->load->view('backend/index', $page_data);
}


 function searchStudent($search_key = '') 
    {
        if ($this->session->userdata('admin_login') != 1) 
		{
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ( $_POST ) 
		{
            redirect(base_url() . 'admin/searchStudent/' . $this->input->post('search_key') , 'refresh');
        }
        $page_data['search_key']    =   $search_key;
        $page_data['page_name']     =   'searchStudent';
        $page_data['page_title']    =   get_phrase('search_students');
        $this->load->view('backend/index', $page_data);
    }



	
	
	
	
/* * **MANAGE HOSTEL**** */
function hostel($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   
					
    		$page_data['hostels'] = $this->db->get('hostel')->result_array();
    			$page_data['page_name'] = 'hostel';
    					$page_data['page_title'] = get_phrase('manage_hostel');
    							$this->load->view('backend/index', $page_data);
}



	
	
/* * **MANAGE SUBJECTS**** */
function subject($param1 = '', $param2 = '', $param3 = '') 
{
    if ($this->session->userdata('admin_login') != 1)
        	redirect(base_url(), 'refresh');
    			
    	$page_data['class_id'] = $param1;
    		$page_data['subjects'] = $this->db->get_where('subject', array('class_id' => $param1))->result_array();
    			$page_data['page_name'] = 'subject';
    				$page_data['page_title'] = get_phrase('manage_subject');
    						$this->load->view('backend/index', $page_data);
}

/* * **MANAGE CLASSES**** */
function classes($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        	redirect(base_url(), 'refresh');
   	 			
    $page_data['classes'] = $this->db->get('class')->result_array();
    	$page_data['page_name'] = 'class';
    		$page_data['page_title'] = get_phrase('manage_class');
    			$this->load->view('backend/index', $page_data);
}



/* * **MANAGE SESSION HERE **** */

function session($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['sessions'] = $this->db->get('session')->result_array();
    	$page_data['page_name'] = 'session';
    		$page_data['page_title'] = get_phrase('manage_session');
    			$this->load->view('backend/index', $page_data);
}

/* * **MANAGE HELPFUL LINK**** */

function help_link($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['help_links'] = $this->db->get('help_link')->result_array();
    	$page_data['page_name'] = 'help_link';
    		$page_data['page_title'] = get_phrase('manage_help_link');
    			$this->load->view('backend/index', $page_data);
}

/* * **MANAGE CLUB**** */

function club($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['club'] = $this->db->get('club')->result_array();
    $page_data['page_name'] = 'club';
    $page_data['page_title'] = get_phrase('manage_club');
    $this->load->view('backend/index', $page_data);
}


/* * **MANAGE TESTIMONY**** */

function testimony($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['testimony'] = $this->db->get('testimony')->result_array();
    	$page_data['page_name'] = 'testimony';
    		$page_data['page_title'] = get_phrase('manage_testimony');
    			$this->load->view('backend/index', $page_data);
}



/* * **MANAGE HELP DESK**** */

function help_desk($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['help_desk'] = $this->db->get('project')->result_array();
    	$page_data['page_name'] = 'help_desk';
    		$page_data['page_title'] = get_phrase('manage_help_desk');
    			$this->load->view('backend/index', $page_data);
}

/* * **MANAGE HOLIDAY**** */

function holiday($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['holiday'] = $this->db->get('holiday')->result_array();
    	$page_data['page_name'] = 'holiday';
    		$page_data['page_title'] = get_phrase('manage_holiday');
    			$this->load->view('backend/index', $page_data);
}

/* * **MANAGE circular**** */

function circular($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['circular'] = $this->db->get('circular')->result_array();
    	$page_data['page_name'] = 'circular';
    		$page_data['page_title'] = get_phrase('manage_circular');
   				 $this->load->view('backend/index', $page_data);
}


/* * **MANAGE REQUEST BOOK**** */
function request_book($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
		
			$page_data['select_book']   = $this->db->get('request_book')->result_array();
    			$page_data['page_name'] = 'request_book';
    				$page_data['page_title'] = get_phrase('request_book');
   				 		$this->load->view('backend/index', $page_data);
}

/* * **MANAGE TASK MANAGER**** */

function task_manager($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
			
    $page_data['task_managers'] = $this->db->get('task_manager')->result_array();
    	$page_data['page_name'] = 'task_manager';
    		$page_data['page_title'] = get_phrase('manage_task_manager');
    				$this->load->view('backend/index', $page_data);
}

/* * **MANAGE TODAY'S THOUGHT**** */

function todays_thought($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   	 							redirect(base_url() . 'admin/todays_thought', 'refresh');

    $page_data['todays_thought'] = $this->db->get('todays_thought')->result_array();
    	$page_data['page_name'] = 'todays_thought';
    		$page_data['page_title'] = get_phrase('manage_todays_thought');
    			$this->load->view('backend/index', $page_data);
}


/* * **ADMISSION GENERATOR CODE**** */

function formcode($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   	 		if ($param1 == 'create') {
        		$data['name'] = $this->input->post('name');
				$data['amount'] = $this->input->post('amount');

		$check_code = $this->db->get_where('formcode', array('name' => $data['name']))->row()->name;
				if($check_code != null) 
				{
					$this->session->set_flashdata('error_message', get_phrase('code_already_exist'));
        					redirect(base_url() . 'admin/formcode/', 'refresh');
				}
						else
						{
        $this->db->insert('formcode', $data);
        	$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        		redirect(base_url() . 'admin/formcode', 'refresh');
    }
	}
	
	if ($param1 == 'delete') {
        				$this->db->where('id', $param2);
        					$this->db->delete('formcode');
        						$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        							redirect(base_url() . 'admin/formcode', 'refresh');
    }
   
    $page_data['formcode'] = $this->db->get('formcode')->result_array();
    	$page_data['page_name'] = 'formcode';
    		$page_data['page_title'] = get_phrase('Admission Code');
    			$this->load->view('backend/index', $page_data);
}



/* * **ADMISSION GENERATOR CODE**** */

function checker($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   	 		if ($param1 == 'create') {
        		$data['pin'] = $this->input->post('pin');
				$data['serial'] = $this->input->post('serial');
				$data['student_id'] = $this->input->post('student_id');
				$data['status'] = 'unuse';
				

		$check_code = $this->db->get_where('checker', array('pin' => $data['pin']))->row()->pin;
				if($check_code != null) 
				{
					$this->session->set_flashdata('error_message', get_phrase('pin_already_exist'));
        					redirect(base_url() . 'admin/checker/', 'refresh');
				}
				$check_code = $this->db->get_where('checker', array('serial' => $data['serial']))->row()->serial;
				if($check_code != null) 
				{
					$this->session->set_flashdata('error_message', get_phrase('serial_already_exist'));
        					redirect(base_url() . 'admin/checker/', 'refresh');
				}
						else
						{
        $this->db->insert('checker', $data);
        	$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        		redirect(base_url() . 'admin/checker', 'refresh');
    }
	}
	
	if ($param1 == 'delete') {
        				$this->db->where('checker_id', $param2);
        					$this->db->delete('checker');
        						$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        							redirect(base_url() . 'admin/checker', 'refresh');
    }
   
    $page_data['checker'] = $this->db->get('checker')->result_array();
    	$page_data['page_name'] = 'checker';
    		$page_data['page_title'] = get_phrase('PIN Generator');
    			$this->load->view('backend/index', $page_data);
}




/* * **MANAGE ENQUIRY SETTINGS**** */

function enquiry_setting($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['enquiry_setting'] = $this->db->get('enquiry_category')->result_array();
    	$page_data['page_name'] = 'enquiry_setting';
    		$page_data['page_title'] = get_phrase('manage_enquiry_category');
    			$this->load->view('backend/index', $page_data);
}

/* * **MANAGE ALL ENQUIRY SETTINGS**** */

function enquiry($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    $page_data['enquiry_setting'] = $this->db->get('enquiry')->result_array();
    	$page_data['page_name'] = 'enquiry';
    		$page_data['page_title'] = get_phrase('manage_enquiries');
    			$this->load->view('backend/index', $page_data);
}




/* * **MANAGE EXAMS**** */
function submit_exam($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
    										$page_data['exams'] = $this->db->get('exam')->result_array();
    											$page_data['page_name'] = 'submit_exam';
    												$page_data['page_title'] = get_phrase('manage_exam');
    															$this->load->view('backend/index', $page_data);
}

/* * **MANAGE NEWS**** */

function news($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		

    $page_data['page_name'] = 'news';
    	$page_data['page_title'] = get_phrase('manage_news');
    		$page_data['news'] = $this->db->get('news')->result_array();
    			$this->load->view('backend/index', $page_data);
}

/* * ********MANAGE AASIGNMENTS ****************** */

function assignment($param1 = '', $param2 = '', $param3 = '') 
{
    if ($this->session->userdata('admin_login') != 1)
        	redirect(base_url(), 'refresh');
    			
    		$page_data['page_name'] = 'assignment';
    			$page_data['page_title'] = get_phrase('manage_assignment');
    				$page_data['assignments'] = $this->db->get('assignment')->result_array();
    					$this->load->view('backend/index', $page_data);
}

/* * ********MANAGE AASIGNMENTS ****************** */

function examquestion($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
   		 	if ($param1 == 'create') {

        		$data['timestamp'] = $this->input->post('timestamp');
        			$data['teacher_id'] = $this->input->post('teacher_id');
        				$data['subject_id'] = $this->input->post('subject_id');
        					$data['description'] = $this->input->post('description');
       							 $data['file_name'] = $_FILES["file_name"]["name"];
        							$data['class_id'] = $this->input->post('class_id');
        								$data['file_type'] = $this->input->post('file_type');
        									$data['status'] = $this->input->post('status');
        										$this->db->insert('examquestion', $data);
        												$examquestion_id = $this->db->insert_id();

        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/examquestion/" . $_FILES["file_name"]["name"]);
        	redirect(base_url() . 'admin/examquestion', 'refresh');
    		}
if ($param1 == 'do_update') {
    $data['timestamp'] = $this->input->post('timestamp');
		$data['teacher_id'] = $this->input->post('teacher_id');
        		$data['subject_id'] = $this->input->post('subject_id');
					$data['description'] = $this->input->post('description');
        				$data['description'] = $this->input->post('description');
        					$data['class_id'] = $this->input->post('class_id');
        						$data['status'] = $this->input->post('status');


        $this->db->where('examquestion_id', $param2);
        		$this->db->update('examquestion', $data);
        			$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        				redirect(base_url() . 'admin/examquestion' . $data['examquestion_id'], 'refresh');
    }

    if ($param1 == 'delete') {
        $this->db->where('examquestion_id', $param2);
        	$this->db->delete('examquestion');
        		$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        			redirect(base_url() . 'admin/examquestion', 'refresh');
    }

    $page_data['page_name'] = 'examquestion';
    	$page_data['page_title'] = get_phrase('manage_exam_questions');
    		$page_data['examquestions'] = $this->db->get('examquestion')->result_array();
    			$this->load->view('backend/index', $page_data);
}

/* * ********MANAGE LOAN ****************** */
function loan_applicant($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        	redirect(base_url(), 'refresh');
    			
    	$page_data['page_name'] = 'loan_applicant';
    		$page_data['page_title'] = get_phrase('add_loan_page');
    			$page_data['loan_applicants'] = $this->db->get('loan')->result_array();
    				$this->load->view('backend/index', $page_data);
}

/* * ********MANAGE LOAN ****************** */

function loan_approval($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        	redirect(base_url(), 'refresh');
   
    			

    	$page_data['page_name'] = 'loan_approval';
    		$page_data['page_title'] = get_phrase('manage_loan_approval');
    			$page_data['loan_approvals'] = $this->db->get('loan')->result_array();
    				$this->load->view('backend/index', $page_data);
}



/* * ***FRONT_END ******** */
function front_end($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'login', 'refresh');

    if ($param1 == 'do_update') {

        	$data['description'] = $this->input->post('about_us');
        		$this->db->where('type', 'about_us');
        			$this->db->update('front_end', $data);

        				$data['description'] = $this->input->post('vission');
        					$this->db->where('type', 'vission');
        						$this->db->update('front_end', $data);

        $data['description'] = $this->input->post('mission');
        	$this->db->where('type', 'mission');
        		$this->db->update('front_end', $data);

        			$data['description'] = $this->input->post('goal');
        				$this->db->where('type', 'goal');
        					$this->db->update('front_end', $data);

        						$data['description'] = $this->input->post('services');
        							$this->db->where('type', 'services');
        								$this->db->update('front_end', $data);
		
											$data['description'] = $this->input->post('youtube');
        										$this->db->where('type', 'youtube');
        											$this->db->update('front_end', $data);
		
														$data['description'] = $this->input->post('news');
        													$this->db->where('type', 'news');
        														$this->db->update('front_end', $data);
		
																	$data['description'] = $this->input->post('teacher');
        																$this->db->where('type', 'teacher');
        																	$this->db->update('front_end', $data);
		
																				$data['description'] = $this->input->post('event');
        																			$this->db->where('type', 'event');
        																				$this->db->update('front_end', $data);
		
		$data['description'] = $this->input->post('testimonies');
        	$this->db->where('type', 'testimonies');
        		$this->db->update('front_end', $data);
		
					$data['description'] = $this->input->post('map');
       					 $this->db->where('type', 'map');
        						$this->db->update('front_end', $data);
		
									$data['description'] = $this->input->post('facebook');
        								$this->db->where('type', 'facebook');
        									$this->db->update('front_end', $data);
		
												$data['description'] = $this->input->post('twitter');
        											$this->db->where('type', 'twitter');
        												$this->db->update('front_end', $data);
		
															$data['description'] = $this->input->post('linkedin');
        														$this->db->where('type', 'linkedin');
        															$this->db->update('front_end', $data);
		
																		$data['description'] = $this->input->post('instagram');
        																	$this->db->where('type', 'instagram');
        																		$this->db->update('front_end', $data);
		
		$data['description'] = $this->input->post('full_about');
        	$this->db->where('type', 'full_about');
        		$this->db->update('front_end', $data);
		
					$data['description'] = $this->input->post('footer_text');
        				$this->db->where('type', 'footer_text');
        					$this->db->update('front_end', $data);
		
									$data['description'] = $this->input->post('reg');
        								$this->db->where('type', 'reg');
        										$this->db->update('front_end', $data);

        											$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        													redirect(base_url() . 'admin/front_end/', 'refresh');
    }


    $page_data['page_name'] = 'front_end';
    $page_data['page_title'] = get_phrase('front_ends');
    $page_data['settings'] = $this->db->get('front_end')->result_array();
    $this->load->view('backend/index', $page_data);
}


    function manage_marks()
    {  
        $page_data['exam_id']    = $this->input->post('exam_id');
        	$page_data['class_id']   = $this->input->post('class_id');
        		$page_data['student_id'] = $this->input->post('student_id');
        				if ($page_data['exam_id'] > 0 && $page_data['class_id'] > 0 && $page_data['student_id'] > 0) {
            				redirect(base_url() . 'admin/marks/' . $page_data['exam_id'] . '/' . $page_data['class_id'] . '/' . $page_data['student_id'], 'refresh');
        } 					else {
            						$this->session->set_flashdata('mark_message', 'Choose exam, class and subject');
            							redirect(base_url() . 'admin/marks/', 'refresh');
        }
    }
	
	
	
	

// TABULATION SHEET
function tabulation_sheet($class_id = '', $exam_id = '', $student_id = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    		
    $page_data['page_name'] = 'tabulation_sheet';
    	$page_data['page_title'] = get_phrase('tabulation_sheet');
    		$this->load->view('backend/index', $page_data);
}



/* * **MANAGE GRADES**** */

function grade($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
			
   
    $page_data['grades'] = $this->db->get('grade')->result_array();
   	 	$page_data['page_name'] = 'grade';
    			$page_data['page_title'] = get_phrase('manage_grade');
    				$this->load->view('backend/index', $page_data);
}

/**********MANAGING CLASS ROUTINE******************/
    function class_routine($param1 = '', $param2 = '', $param3 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        		if ($param1 == 'create') 
			{
            		if($this->input->post('class_id') != null)
					{
                		$data['class_id']       = $this->input->post('class_id');
            		}

            	$data['section_id']     = $this->input->post('section_id');
            		$data['subject_id']     = $this->input->post('subject_id');

            // 12 AM for starting time
            if ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 1) 
			{
                $data['time_start'] = 24;
            }
            // 12 PM for starting time
            elseif ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 2) 
			{
                $data['time_start'] = 12;
            }
            // otherwise for starting time
            else
			{
                $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            }
            // 12 AM for ending time
            if ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 1) 
			{
                $data['time_end'] = 24;
            }
            // 12 PM for ending time
            elseif ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 2) 
			{
                $data['time_end'] = 12;
            }
            // otherwise for ending time
            else
			{
                $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            }

            	$data['time_start_min'] = $this->input->post('time_start_min');
            		$data['time_end_min']   = $this->input->post('time_end_min');
            			$data['day']            = $this->input->post('day');
            				$data['year']           = $this->db->get_where('settings', array('type' => 'session'))->row()->description;
            // checking duplication
            $array = array(
                'section_id'    => $data['section_id'],
                	'class_id'      => $data['class_id'],
                		'time_start'    => $data['time_start'],
                			'time_end'      => $data['time_end'],
                				'time_start_min'=> $data['time_start_min'],
                					'time_end_min'  => $data['time_end_min'],
                						'day'           => $data['day'],
                							'year'          => $data['year']
            );
            /*$validation = duplication_of_class_routine_on_create($array);
            	if ($validation == 1) 
				{
                	$this->db->insert('class_routine', $data);
                		$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
            	}
            else
			{
                $this->session->set_flashdata('error_message' , get_phrase('time_conflicts'));
            }*/
			
			$this->db->insert('class_routine', $data);
              	$this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));

            	redirect(base_url() . 'admin/class_routine_add/', 'refresh');
        }
        if ($param1 == 'do_update') 
			{
            $data['class_id']       = $this->input->post('class_id');
            	if($this->input->post('section_id') != '') {
                	$data['section_id'] = $this->input->post('section_id');
            }
            		$data['subject_id']     = $this->input->post('subject_id');

            // 12 AM for starting time
            if ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 1) 
			{
                $data['time_start'] = 24;
            }
            // 12 PM for starting time
            elseif ($this->input->post('time_start') == 12 && $this->input->post('starting_ampm') == 2) 
			{
                $data['time_start'] = 12;
            }
            // otherwise for starting time
            else{
                $data['time_start']     = $this->input->post('time_start') + (12 * ($this->input->post('starting_ampm') - 1));
            }
            // 12 AM for ending time
            if ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 1) 
			{
                $data['time_end'] = 24;
            }
            // 12 PM for ending time
            elseif ($this->input->post('time_end') == 12 && $this->input->post('ending_ampm') == 2) 
			{
                $data['time_end'] = 12;
            }
            // otherwise for ending time
            else
			{
                $data['time_end']       = $this->input->post('time_end') + (12 * ($this->input->post('ending_ampm') - 1));
            }

            $data['time_start_min'] = $this->input->post('time_start_min');
            	$data['time_end_min']   = $this->input->post('time_end_min');
            		$data['day']            = $this->input->post('day');
            			$data['year']           = $this->db->get_where('settings' , array('type' => 'session'))->row()->description;
            				if ($data['subject_id'] != '') {
                // checking duplication
                $array = array(
                    'section_id'    => $data['section_id'],
                    	'class_id'      => $data['class_id'],
                    		'time_start'    => $data['time_start'],
                    			'time_end'      => $data['time_end'],
                    				'time_start_min'=> $data['time_start_min'],
                    					'time_end_min'  => $data['time_end_min'],
                    						'day'           => $data['day'],
                    							'year'          => $data['year']
                );
               /* $validation = duplication_of_class_routine_on_edit($array, $param2);

                if ($validation == 1) 
				{
                    $this->db->where('class_routine_id', $param2);
                    	$this->db->update('class_routine', $data);
                    		$this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
                }
                else
				{
                    $this->session->set_flashdata('error_message' , get_phrase('time_conflicts'));
                }
            	}
            else
			{
                	$this->session->set_flashdata('error_message' , get_phrase('subject_is_not_found'));
            }*/
						$this->db->where('class_routine_id', $param2);
                    		$this->db->update('class_routine', $data);
                    			$this->session->set_flashdata('flash_message' , get_phrase('data_updated'));
            }						redirect(base_url() . 'admin/class_routine_view/' . $data['class_id'], 'refresh');
        }
        else if ($param1 == 'edit') 
		{
            $page_data['edit_data'] = $this->db->get_where('class_routine', array('class_routine_id' => $param2))->result_array();
        }
        if ($param1 == 'delete') 
		{
            $class_id = $this->db->get_where('class_routine' , array('class_routine_id' => $param2))->row()->class_id;
            	$this->db->where('class_routine_id', $param2);
            		$this->db->delete('class_routine');
            			$this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            				redirect(base_url() . 'admin/class_routine_view/' . $class_id, 'refresh');
        }

    }
	
	

 
	
	
	
	function get_class_section_subject($class_id)
    {
        $page_data['class_id'] = $class_id;
        	$this->load->view('backend/admin/class_routine_section_subject_selector' , $page_data);
    }

    function section_subject_edit($class_id , $class_routine_id)
    {
        	$page_data['class_id']          =   $class_id;
        		$page_data['class_routine_id']  =   $class_routine_id;
        			$this->load->view('backend/admin/class_routine_section_subject_edit' , $page_data);
    }


/* * **** DAILY ATTENDANCE **************** */

function manage_attendance($date = '', $month = '', $year = '', $class_id = '', $section_id = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    		$active_sms_service = $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;


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
        		redirect(base_url() . 'admin/manage_attendance/' . $date . '/' . $month . '/' . $year . '/' . $class_id . '/' . $section_id, 'refresh');
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
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    			$active_sms_service = $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;


    if ($_POST) {
        redirect(base_url() . 'admin/attendance_report/' . $class_id . '/' . $section_id . '/' . $month . '/' . $year, 'refresh');
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
    			redirect(base_url() . 'admin/manage_attendance/' . $date . '/' . $this->input->post('class_id') . '/' . $this->input->post('section_id'), 'refresh');
}

function attendance_report_view() {
    redirect(base_url() . 'admin/attendance_report/' . $this->input->post('class_id') . '/' . $this->input->post('section_id') . '/' . $this->input->post('month') . '/' . $this->input->post('year'), 'refresh');
}




/* * ****MANAGE BILLING / INVOICES WITH STATUS**** */

function invoice($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

   
    $page_data['page_name'] = 'invoice';
    	$page_data['page_title'] = get_phrase('manage_invoice/payment');
    		$this->db->order_by('creation_timestamp', 'desc');
    			$page_data['invoices'] = $this->db->get('invoice')->result_array();
    				$this->load->view('backend/index', $page_data);
}


/*  INVOICE CODE HERE */
	function invoice_add($param1 = '', $param2 = '', $param3 = '')
	 {
       if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'login', 'refresh');
   
       
        	$data['page_name'] = 'invoice_add';
        		$data['page_title'] = get_phrase('invoice');
        			$this->load->view('backend/index', $data);
    }



    function list_invoice($task = "", $ledger_id = "") {
       if ($this->session->userdata('admin_login') != 1)
			redirect(base_url() . 'login', 'refresh');
			{
        }

       
        $data['select_all'] = $this->crud_model->select_invoice_info();
        	$data['page_name'] = 'list_invoice';
        		$data['page_title'] = get_phrase('list_invoice');
        			$this->load->view('backend/index', $data);
    }
	
	
	

	

/* * ********ACCOUNTING******************* */

function income($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		$page_data['page_name'] = 'income';
    			$page_data['page_title'] = get_phrase('student_payments');
    				$this->db->order_by('creation_timestamp', 'desc');
    					$page_data['invoices'] = $this->db->get('invoice')->result_array();
    						$this->load->view('backend/index', $page_data);
}

function student_payment($param1 = '', $param2 = '', $param3 = '') {

    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		$page_data['page_name'] = 'student_payment';
    			$page_data['page_title'] = get_phrase('create_student_payment');
    				$this->load->view('backend/index', $page_data);
}

function expense($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		

    $page_data['page_name'] = 'expense';
    	$page_data['page_title'] = get_phrase('expenses');
    		$this->load->view('backend/index', $page_data);
}

function expense_category($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
   
   
    $page_data['page_name'] = 'expense_category';
    	$page_data['page_title'] = get_phrase('expense_category');
    		$this->load->view('backend/index', $page_data);
}

/* * ********MANAGE LIBRARY / BOOKS******************* */

function book($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
    $page_data['books'] = $this->db->get('book')->result_array();
    	$page_data['page_name'] = 'book';
    		$page_data['page_title'] = get_phrase('manage_library_books');
    			$this->load->view('backend/index', $page_data);
}

/* * ********MANAGE TRANSPORT / VEHICLES / ROUTES******************* */

function transport($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
  
    	$page_data['transports'] = $this->db->get('transport')->result_array();
    		$page_data['page_name'] = 'transport';
    			$page_data['page_title'] = get_phrase('manage_transport');
    				$this->load->view('backend/index', $page_data);
}



/* * *MANAGE TRANSPORT ROUTES* */

function transport_route($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        	redirect('login', 'refresh');
    			
    
    $page_data['transport_routes'] = $this->db->get('transport_route')->result_array();
    	$page_data['page_name'] = 'transport_route';
    		$page_data['page_title'] = get_phrase('manage_transport_route');
    			$this->load->view('backend/index', $page_data);
}


/* * *MANAGE VEHICLE INFORMATION * */

function vehicle($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    		
   
   
    $page_data['vehicles'] = $this->db->get('vehicle')->result_array();
    	$page_data['page_name'] = 'vehicle';
    		$page_data['page_title'] = get_phrase('manage_vehicle');
    			$this->load->view('backend/index', $page_data);
}


/* * ********MANAGE BOOK PUBLISHER ******************* */

function publisher($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
  
    $page_data['publishers'] = $this->db->get('publisher')->result_array();
    	$page_data['page_name'] = 'publisher';
    		$page_data['page_title'] = get_phrase('manage_publisher');
    			$this->load->view('backend/index', $page_data);
}

	

/* * ********MANAGE BOOK CATEGORY ******************* */

function book_category($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
   
   
    $page_data['book_categorys'] = $this->db->get('book_category')->result_array();
    	$page_data['page_name'] = 'book_category';
    		$page_data['page_title'] = get_phrase('manage_book_category');
    			$this->load->view('backend/index', $page_data);
}


/* * ********MANAGE BOOK AUTHOR ******************* */

function author($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
   
    
    	$page_data['authors'] = $this->db->get('author')->result_array();
    			$page_data['page_name'] = 'author';
    					$page_data['page_title'] = get_phrase('manage_authors');
    							$this->load->view('backend/index', $page_data);
}


/* * ********MANAGE DORMITORY / HOSTELS / ROOMS ******************* */

function dormitory($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
   
    		
    
   
    $page_data['dormitories'] = $this->db->get('dormitory')->result_array();
    	$page_data['page_name'] = 'dormitory';
    		$page_data['page_title'] = get_phrase('manage_dormitory');
    			$this->load->view('backend/index', $page_data);
}


/* * *MANAGE HOSTEL CATEGPRY* */

function hostel_category($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
   
    $page_data['hostel_categorys'] = $this->db->get('hostel_category')->result_array();
    	$page_data['page_name'] = 'hostel_category';
    		$page_data['page_title'] = get_phrase('manage_hostel_category');
    				$this->load->view('backend/index', $page_data);
}


/* * *MANAGE ROOM TYPE PAGE* */

function room_type($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
   
    
    $page_data['room_types'] = $this->db->get('room_type')->result_array();
    	$page_data['page_name'] = 'room_type';
   		 	$page_data['page_title'] = get_phrase('manage_room_type');
    			$this->load->view('backend/index', $page_data);
}

/* * *MANAGE HOSTEL ROOM PAGE* */

	function hostel_room($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		
	
    $page_data['hostel_rooms'] = $this->db->get('hostel_room')->result_array();
    	$page_data['page_name'] = 'hostel_room';
    		$page_data['page_title'] = get_phrase('manage_hostel_room');
    			$this->load->view('backend/index', $page_data);
}


/* * *MANAGE EVENT / NOTICEBOARD, WILL BE SEEN BY ALL ACCOUNTS DASHBOARD* */

function noticeboard($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        	redirect(base_url(), 'refresh');

    			
    $page_data['page_name'] = 'noticeboard';
    	$page_data['page_title'] = get_phrase('manage_noticeboard');
    		$page_data['notices'] = $this->db->get('noticeboard')->result_array();
    			$this->load->view('backend/index', $page_data);
}

/* private messaging */

function message($param1 = 'message_home', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
		
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
                    redirect(base_url() . 'admin/message/message_new/', 'refresh');
                }
                else
				{
                    $file_path = 'uploads/private_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }
        		$message_thread_code = $this->crud_model->send_new_private_message();
        			$this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        				redirect(base_url() . 'admin/message/message_read/' . $message_thread_code, 'refresh');
						
						
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
                    redirect(base_url() . 'admin/message/message_read/' . $param2, 'refresh');
                }
                else
				{
                    $file_path = 'uploads/private_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
                    move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
                }
            }
			
        $this->crud_model->send_reply_message($param2);  //$param2 = message_thread_code
        	$this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        		redirect(base_url() . 'admin/message/message_read/' . $param2, 'refresh');
				
				
    }

    if ($param1 == 'message_read') {
        $page_data['current_message_thread_code'] = $param2;  // $param2 = message_thread_code
        	$this->crud_model->mark_thread_messages_read($param2);
    }

    $page_data['message_inner_page_name'] = $param1;
    	$page_data['page_name'] = 'message';
    		$page_data['page_title'] = get_phrase('private_messaging');
    			$this->load->view('backend/index', $page_data);
}


 // email template settings
    function email_settings($param1 = 1, $param2 = '') {
        

        if ($param1 == 'do_update') {
            $this->crud_model->save_email_template($param2);
            $this->session->set_flashdata('flash_message', get_phrase('email_template_updated'));
            redirect(base_url() . 'admin/email_settings/' . $param2, 'refresh');
        }

        $page_data['current_email_template_id'] = $param1;
        $page_data['page_name'] = 'email_settings';
        $page_data['page_title'] = get_phrase('email_template_settings');
        $this->load->view('backend/index', $page_data);
    }
    //SMTP settings
     function smtpemailsettings()
     {
	$page_data['page_name'] = 'smtp_email_settings';
        $page_data['page_title'] = get_phrase('smtp_settings');
        $this->load->view('backend/index', $page_data);		
        
     }
     function save_smtp_settings() {
         
         
            foreach($_POST as $key=>$value)
		{
			$this->form_validation->set_rules($key,$key,'required');
		}
		
			
			
				$key = 'smtp_settings';
				$data['description'] 	= json_encode($_POST);	
                                
				$res = $this->crud_model->getvalues($key);
                                
				if($res=='')
				{
					$data['key']	= $key;			
					$this->crud_model->addvalues($data);
				}
				else
					$this->crud_model->updatevalues($key,$data);
				
				if($this->input->post('smtp_email')=='Enable')
				{
					$this->load->helper('file');
					$data = 	'<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");'."\n".''
								 .'$config["protocol"]="smtp";'."\n".''
								 .'$config["smtp_host"]="'.$this->input->post('smtp_host').'";'."\n".''
								 .'$config["smtp_port"]="'.$this->input->post('smtp_port').'";'."\n".''
								 .'$config["smtp_timeout"]="'.$this->input->post('smtp_timeout').'";'."\n".''
								 .'$config["smtp_user"]="'.$this->input->post('smtp_user').'";'."\n".''
								 .'$config["smtp_pass"]="'.$this->input->post('smtp_pass').'";'."\n".''
								 .'$config["charset"]="'.$this->input->post('char_set').'";'."\n".''
								 .'$config["newline"]="'.$this->input->post('new_line').'";'."\n".''
								 .'$config["mailtype"]="'.$this->input->post('mail_type').'";'."\n".'';
 
					if ( ! write_file('./application/config/email.php', $data))
					{
					     $this->session->set_flashdata('msg', '<div class="alert alert-danger">Unable to write file[ROOT/application/config/email.php]</div>');
					}
					else
					{
					     $this->session->set_flashdata('msg', '<div class="alert alert-success">'.get_phrase('email_settings_updated_successfully').'</div>');
					}
				}	
				else
				{
					unlink('./application/config/email.php');
				}	


			 redirect(base_url() . 'admin/smtpemailsettings', 'refresh');	
		
      }
	  
	  
	  
	  function changeSidebar($param1 = '', $param2 = '', $param3 = '') 
	{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'login', 'refresh');

    		if ($param1 == 'change') 
			{
			$data['description'] = $this->input->post('text_align');
        	$this->db->where('type', 'text_align');
        		$this->db->update('settings', $data);
				
			$this->session->set_flashdata('flash_message', get_phrase('sidebar_changed_successfully'));
        	redirect(base_url() . 'admin/system_settings', 'refresh');
    		}
			
	}
	
			
			

/* * ***SITE/SYSTEM SETTINGS******** */

function system_settings($param1 = '', $param2 = '', $param3 = '') 
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'login', 'refresh');

    		
	
    $page_data['page_name'] = 'system_settings';
    	$page_data['page_title'] = get_phrase('system_settings');
    		$page_data['settings'] = $this->db->get('settings')->result_array();
    			$this->load->view('backend/index', $page_data);
}



/* * ***SMS SETTINGS******** */

function sms_settings($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'login', 'refresh');
    
    $page_data['page_name'] = 'sms_settings';
    $page_data['page_title'] = get_phrase('sms_gateway_information');
    $page_data['settings'] = $this->db->get('settings')->result_array();
    $this->load->view('backend/index', $page_data);
}



/* * ********MANAGE SIDEBAR ACTIONS ******************* */

function actions($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    		if ($param1 == 'create') {
        		$data['action_name'] 		= $this->input->post('action_name');
        			$data['display']		 	= $this->input->post('display');
        				$data['parent_name'] 		= $this->input->post('parent_name');
        					$data['parent_key'] 		= $this->input->post('parent_key');
       
        						$this->db->insert('actions', $data);
									$action_id = $this->db->insert_id();
        								$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        									redirect(base_url() . 'admin/actions', 'refresh');
    }
    if ($param1 == 'do_update') {
        $data['action_name'] 		= $this->input->post('action_name');
        	$data['display']		 	= $this->input->post('display');
        		$data['parent_name'] 		= $this->input->post('parent_name');
        			$data['parent_key'] 		= $this->input->post('parent_key');

        				$this->db->where('action_id', $param2);
        					$this->db->update('actions', $data);
        						$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        							redirect(base_url() . 'admin/actions', 'refresh');
    } else if ($param1 == 'edit') {
        $page_data['edit_data'] = $this->db->get_where('actions', array(
                    'action_id' => $param2
                ))->result_array();
    }
    if ($param1 == 'delete') {
        $this->db->where('action_id', $param2);
        	$this->db->delete('actions');
        		$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        			redirect(base_url() . 'admin/actions', 'refresh');
    }
    	$page_data['actionss'] = $this->db->get('actions')->result_array();
    		$page_data['page_name'] = 'actions';
    			$page_data['page_title'] = get_phrase('manage_actions');
    				$this->load->view('backend/index', $page_data);
}







/* * ****MANAGE OWN PROFILE AND CHANGE PASSWORD** */

function manage_profile($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url() . 'login', 'refresh');
    		if ($param1 == 'update_profile_info') {
        		$data['name'] = $this->input->post('name');
        			$data['email'] = $this->input->post('email');

        			$this->db->where('admin_id', $this->session->userdata('admin_id'));
        				$this->db->update('admin', $data);
        					move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $this->session->userdata('admin_id') . '.jpg');
        						$this->session->set_flashdata('flash_message', get_phrase('account_updated'));
        							redirect(base_url() . 'admin/manage_profile/', 'refresh');
    }
    if ($param1 == 'change_password') {
        $data['password'] = sha1($this->input->post('password'));
        	$data['new_password'] = sha1($this->input->post('new_password'));
        		$data['confirm_new_password'] = sha1($this->input->post('confirm_new_password'));

        $current_password = $this->db->get_where('admin', array(
                    'admin_id' => $this->session->userdata('admin_id')
                ))->row()->password;
        			if ($current_password == $data['password'] && $data['new_password'] == $data['confirm_new_password']) {
            			$this->db->where('admin_id', $this->session->userdata('admin_id'));
            				$this->db->update('admin', array(
                'password' => $data['new_password']
            ));
            		$this->session->set_flashdata('flash_message', get_phrase('password_updated'));
        } else {
            			$this->session->set_flashdata('error_message', get_phrase('password_mismatch'));
        }
        				redirect(base_url() . 'admin/manage_profile/', 'refresh');
    }
    $page_data['page_name'] = 'manage_profile';
    		$page_data['page_title'] = get_phrase('manage_profile');
    			$page_data['edit_data'] = $this->db->get_where('admin', array(
                'admin_id' => $this->session->userdata('admin_id')
            ))->result_array();
    				$this->load->view('backend/index', $page_data);
}










/* * ****MANAGE SEARCH STUDENT PAGE** */
function studentList($class_id = '', $param2 = '', $sparam3 = '') {
   
    if ($this->session->userdata('admin_login') != 1)
        
		redirect(base_url(), 'refresh');

    		
		$page_data['class_id'] = $class_id;
    		$page_data['page_info'] = 'list_students';
    			$page_data['page_name'] = 'studentList';
    				$page_data['page_title'] = get_phrase('list_students');
    					$this->load->view('backend/index', $page_data);
}



/* * ****MANAGE SEARCH STUDENT PAGE** */
function student_report($class_id = '', $param2 = '', $sparam3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['class_id'] = $this->input->post('class_id');

        if ($page_data['class_id'] > 0 ) 
		{
            redirect(base_url() . 'admin/student_report/' . $page_data['class_id'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('info', 'please_select_class');
            redirect(base_url() . 'admin/student_report/', 'refresh');
        }
    }
	
	$page_data['class_id'] = $class_id;
    $page_data['page_info'] = 'student_report';

    $page_data['page_name'] = 'student_report';
    $page_data['page_title'] = get_phrase('student_reports');
    $this->load->view('backend/index', $page_data);
}
	

/* * ****MANAGE LOAN REPORT** */
function loan_report($from = '', $to = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    if ($this->input->post('operation') == 'selection') 
	{
        $page_data['from'] = $this->input->post('from');
        $page_data['to'] = $this->input->post('to');

        if ($page_data['from'] > 0 && $page_data['to'] > 0 ) 
		{
            redirect(base_url() . 'admin/loan_report/' . $page_data['from'] . '/' . $page_data['to'], 'refresh');
        } 
		else 
		{
            $this->session->set_flashdata('expense_info', 'please_select_date_range');
            redirect(base_url() . 'admin/loan_report/', 'refresh');
        }
    }
	
	$page_data['from'] = $from;
    $page_data['to'] = $to;
    $page_data['page_info'] = 'Expense Report';

    $page_data['page_name'] = 'loan_report';
    $page_data['page_title'] = get_phrase('loan_report');
    $this->load->view('backend/index', $page_data);
}

// CBT CUSTOMISATION STARTS FROM HERE
function exam_list($class_id, $subject_id, $duration, $date, $session = '', $mode = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');

    if ($mode == 'delete') {
        if ($session == '%null')
            $session = '';
        $sql = "select question_id from question where class_id=" . $class_id . " and subject_id=" . $subject_id . " and duration='" . $duration . "' and date='" . $date . "' and session='" . $session . "'";
        $result = $this->db->query($sql)->result_array();

        $sql = "delete from answer where question_id in (";
        foreach ($result as $row) {
            $in_sql .= "," . $row["question_id"];
        }
        $in_sql = substr($in_sql, 1);
        $sql .= $in_sql . ")";
        $this->db->query($sql);

        $sql = "delete from question where class_id=" . $class_id . " and subject_id=" . $subject_id . " and duration='" . $duration . "' and date='" . $date . "' and session='" . $session . "'";
        $this->db->query($sql);
    }

    $page_data['page_name'] = 'exam_list';
    $page_data['page_title'] = get_phrase('exam_list');

    $query = "select a.*, b.name class_name, c.name subject_name from question a "
            . "inner join class b on a.class_id=b.class_id "
            . "inner join subject c on a.subject_id=c.subject_id "
            . "group by a.class_id, a.subject_id, a.date, a.duration, a.session "
            . "order by a.class_id, a.subject_id, a.date, a.question_id";
    $question_data = $this->db->query($query)->result();
    $page_data['question_data'] = $question_data;
    $this->load->view('backend/index', $page_data);
}

function exam_view($class_id, $subject_id, $duration, $date, $session = '', $mode = '', $question_id = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');

    $mode1 = $this->input->post('mode1');

    if ($session == '%null') {
        $session = '';
    }
    if ($mode == 'save') {
//        $question_id = $this->input->post('question_id');
        $data = array();
        $data['question'] = $this->input->post('question');
        $data["correct_answers"] = $this->input->post('correct_answers');
        $this->db->where('question_id', $question_id);
        $this->db->update('question', $data);

        $answers = $this->input->post('answers');
        for ($i = 0; $i < sizeof($answers); $i++) {
            $data = array();
            $this->db->where('question_id', $question_id);
            $ascii_A = ord('A');
            $this->db->where('label', chr($ascii_A + $i));
            $data["content"] = $answers[$i];
            $this->db->update('answer', $data);
        }
    } else if ($mode == 'delete') {
        $this->db->where('question_id', $question_id);
        $this->db->delete('question');
    } else if ($mode1 == 'save_exam') {
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');
        $duration = $this->input->post('duration');
        $date = date("Y-m-d", strtotime($this->input->post('date')));
        $session = $this->input->post('session');
        $question_count = $this->input->post('question_count');

        $usersession = $this->session->userdata('exam_data');

        $this->db->where('class_id', $usersession['class_id']);
        $this->db->where('subject_id', $usersession['subject_id']);
        $this->db->where('duration', $usersession['duration']);
        $this->db->where('date', $usersession['date']);
        $this->db->where('session', $usersession['session']);
        $this->db->update('question', array('class_id' => $class_id, 'subject_id' => $subject_id, 'duration' => $duration, 'date' => $date, 'session' => $session, 'question_count' => $question_count));
    }

    if ($session == '%null')
        $session = '';
    $sql = "select max(b.label) as max_label from question a "
            . "inner join answer b on a.question_id=b.question_id "
            . "where a.class_id=" . $class_id . " and a.subject_id=" . $subject_id . " and a.session='" . $session . "' and a.duration='" . $duration . "' and a.date='" . $date . "'";
    $result = $this->db->query($sql)->result_array();
    $page_data['max_label'] = $result[0]['max_label'];

    $sql = "select * from question "
            . "where class_id=" . $class_id . " and subject_id=" . $subject_id . " and session='" . $session . "' and duration='" . $duration . "' and date='" . $date . "'";
    $exam_list = $this->db->query($sql)->result_array();
    $exam_data = array();
    $question_count = 0;
    foreach ($exam_list as $row) {
        $exam = array();
        $exam['question_id'] = $row['question_id'];
        $exam['class_id'] = $row['class_id'];
        $exam['subject_id'] = $row['subject_id'];
        $exam['date'] = $row['date'];
        $exam['session'] = $row['session'];
        $exam['duration'] = $row['duration'];
        $exam['question'] = $row['question'];
        $exam['correct_answers'] = $row['correct_answers'];
        $question_count = $row['question_count'];

        $sql = "select * from answer where question_id=" . $row['question_id'] . " order by label";
        $result = $this->db->query($sql)->result_array();
        foreach ($result as $row1) {
            $exam[$row1['label']] = $row1['content'];
        }
        array_push($exam_data, $exam);
    }
    $page_data['class_id'] = $class_id;
    $page_data['subject_id'] = $subject_id;
    $page_data['duration'] = $duration;

    $dates = explode('-', $date);
    $y = $dates[0];
    $m = $dates[1];
    $d = $dates[2];
    $page_data['date'] = $m . '/' . $d . '/' . $y;

    $page_data['session'] = $session;
    $page_data['question_count'] = $question_count;
    $page_data['classes'] = $this->db->get('class')->result_array();
    $page_data['subjects'] = $this->db->get_where('subject', array('class_id' => $class_id))->result_array();
    $page_data['exam_data'] = $exam_data;

    $session_data = $page_data;
    $session_data['date'] = $date;

    $page_data['page_name'] = 'exam_view';
    $page_data['page_title'] = get_phrase('view_exam');
    $this->session->set_userdata('exam_data', $session_data);
    $this->load->view('backend/index', $page_data);
}

function exam_add($param1 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    $page_data['error'] = 0;
    if ($param1 == 'error') {
        $page_data['error'] = 1;
    }
    $page_data['page_name'] = 'exam_add';
    $page_data['page_title'] = get_phrase('add_exam');
    $page_data['classes'] = $this->db->get('class')->result_array();
    $page_data['sections'] = $this->db->get('section')->result_array();
    $page_data['subjects'] = $this->db->get_where('subject', array('class_id' => $param1))->result_array();
    $this->load->view('backend/index', $page_data);
}

function exams($param1 = '') {
    if ($param1 == 'create') {
        $date = date("Y-m-d", strtotime($this->input->post('date')));
        $sql = "select if(count(question_id)>0,true,false) isExam from question where class_id=" . $this->input->post('class_id') . " and subject_id=" . $this->input->post('subject_id') . " and date='$date'";
        $result = $this->db->query($sql)->result_array();
        $isExam = $result[0]['isExam'];
        if (!$isExam) {
            $this->session->set_userdata('exams_header_data', array(
                'class_id' => $this->input->post('class_id'),
                'subject_id' => $this->input->post('subject_id'),
				'section_id' => $this->input->post('section_id'),
                'date' => $date,
                'session' => $this->input->post('session'),
                'question_count' => $this->input->post('question_count'),
                'duration' => $this->input->post('duration')
            ));
        } else {
            redirect(base_url() . 'admin/exam_add/error', 'refresh');
        }
    } else if ($param1 == 'add') {
        $date = date("Y-m-d", strtotime($this->input->post('date')));
        $this->session->set_userdata('exams_header_data', array(
            'class_id' => $this->input->post('class_id'),
            'subject_id' => $this->input->post('subject_id'),
			 'section_id' => $this->input->post('section_id'),
            'date' => $date,
            'session' => $this->input->post('session'),
            'question_count' => $this->input->post('question_count'),
            'duration' => $this->input->post('duration')
        ));
    } else if ($param1 == 'save') {
        $data = array();
        $userdatasession = $this->session->userdata('exams_header_data');
        $data["class_id"] = $userdatasession['class_id'];
        $data["subject_id"] = $userdatasession['subject_id'];
		 $data["section_id"] = $userdatasession['section_id'];
        $data["date"] = $userdatasession['date'];
        $data["session"] = $userdatasession['session'];
        $data["question_count"] = $userdatasession['question_count'];
        $data["duration"] = $userdatasession['duration'];
        $data["question"] = $this->input->post('question');
        $data["correct_answers"] = $this->input->post('correct_answers');
        $result = $this->db->query("select max(question_id) max_id from question")->result();
        $question_id = $result[0]->max_id;
        $data["question_id"] = $question_id + 1;
        $this->db->insert('question', $data);
        $answers = $this->input->post('answers');
        for ($i = 0; $i < sizeof($answers); $i++) {
            $data = array();
            $data["question_id"] = $question_id + 1;
            $data["content"] = $answers[$i];
            $ascii_A = ord('A');
            $data["label"] = chr($ascii_A + $i);
            $this->db->insert('answer', $data);
        }
    }

    $page_data['page_name'] = 'exam_create';
    $page_data['page_title'] = get_phrase('add_exam');
    $this->load->view('backend/index', $page_data);
}

function exam_result_list() {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');

    $mode = $this->input->post('mode');
    if ($mode == 'get_list') {
        $class_id = $this->input->post('class_id');
        $subject_id = $this->input->post('subject_id');

        $sql = "select b.class_id, b.name class, a.student_id, a.name student, c.subject_id, c.name subject, d.date, d.duration, d.session, "
                . "d.question_count, sum(if(e.answer=d.correct_answers, 1, 0)) marks from student a "
                . "left join class b on a.class_id=b.class_id "
                . "left join subject c on b.class_id=c.class_id "
                . "left join question d on a.class_id=d.class_id and c.subject_id=d.subject_id "
                . "LEFT JOIN exam_result e ON d.question_id=e.question_id AND a.`student_id`=e.`student_id` "
                . "where a.class_id=" . $class_id . " and c.subject_id=" . $subject_id . " "
                . "GROUP BY a.`student_id`, c.subject_id, d.date, d.duration, d.session "
                . "order by b.class_id, a.student_id, c.subject_id";
        $result = $this->db->query($sql)->result_array();
        exit(json_encode($result));
    }

    $page_data['classes'] = $this->db->get('class')->result_array();
    $page_data['page_name'] = 'exam_result_list';
    $page_data['page_title'] = get_phrase('exam_result');
    $this->load->view('backend/index', $page_data);
}

function exam_result_detail() {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');

    if (!$this->input->post('class_id') || !$this->input->post('subject_id') || !$this->input->post('student_id') || !$this->input->post('date')) {
        redirect(base_url() . 'admin/exam_result_list', 'refresh');
    }

    $class_id = $this->input->post('class_id');
    $subject_id = $this->input->post('subject_id');
    $student_id = $this->input->post('student_id');
    $duration = $this->input->post('duration');
    $session = $this->input->post('session');
    $date = $this->input->post('date');

    $sql = "select a.*, e.name student,f.name class, g.name subject,b.date, b.question, b.correct_answers, c.content as answer_content, d.content as correct_content, if(c.content=d.content, 1, 0) marks, b.question_count "
            . "from exam_result a "
            . "inner join question b on a.question_id=b.question_id "
            . "inner join answer c on a.question_id=c.question_id and a.answer=c.label "
            . "inner join answer d on b.question_id=d.question_id and b.correct_answers=d.label "
            . "inner join student e on e.student_id=a.student_id "
            . "inner join class f on f.class_id=b.class_id "
            . "inner join subject g on g.subject_id=b.subject_id "
            . "where b.class_id=" . $class_id . " and b.subject_id=" . $subject_id
            . " and b.date='" . $date . "' and b.duration='" . $duration . "' "
            . "and b.session='" . $session . "' and a.student_id=" . $student_id;
    $page_data['detail_list'] = $this->db->query($sql)->result_array();

    $page_data['page_name'] = 'exam_result_detail';
    $page_data['page_title'] = get_phrase('exam_result');
    $this->load->view('backend/index', $page_data);
}

function admin_list() {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
    $sql = "select * from admin order by admin_id";
    $page_data['admin_list'] = $this->db->query($sql)->result_array();

    $sql = "select * from actions order by action_id";
    $page_data['actions'] = $this->db->query($sql)->result_array();

    $sql = "select * from admin where admin_id=" . ($this->session->userdata('login_user_id'));
    $info = $this->db->query($sql)->result_array();
    $page_data['admin_info'] = $info[0];

    $page_data['page_name'] = 'admin_list';
    $page_data['page_title'] = get_phrase('admin_list');
    $this->load->view('backend/index', $page_data);
}

function admin_add() {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');

    $page_data['page_name'] = 'admin_add';
    $page_data['page_title'] = get_phrase('add_admin');
    $this->load->view('backend/index', $page_data);
}

function admins($param1 = '', $param2 = '', $param3 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');
    if ($param1 == 'create') {
        	$data['name'] = $this->input->post('name');
        		$data['email'] = $this->input->post('email');
        			$data['password'] = sha1($this->input->post('password'));
        				$data['level'] = $this->input->post('level');
						
				$check_email = $this->db->get_where('admin', array('email' => $data['email']))->row()->email;
				if($check_email != null) 
				{
					$this->session->set_flashdata('error_message', get_phrase('email_already_exist'));
        					redirect(base_url() . 'admin/admin_list/', 'refresh');
				}
						else
						{
        					$this->db->insert('admin', $data);
        						$admin_id = $this->db->insert_id();
        							move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $admin_id . '.jpg');
									
									
	//********************INSERT INTO ADMIN PERMISSION TABLE STARTS FROM HERE**********************************//
	$data2['dashboard'] = yes;
		$data2['admin_id'] = $admin_id;
        	$data2['enquiry_setting'] = yes;
        		$data2['enquiry'] = yes;
        			$data2['club'] = yes;
        				$data2['circular'] = yes;
        					$data2['task_manager'] = yes;
        						$data2['help_link'] = yes;
        							$data2['help_desk'] = yes;
        								$data2['holiday'] = yes;
        										$data2['todays_thought'] = yes;
				
														$data2['academic_syllabus'] = yes;
        													$data2['teacher'] = yes;
        														$data2['librarian'] = yes;
        															$data2['accountant'] = yes;
       	 																$data2['hostel'] = yes;
        																	$data2['hrm'] = yes;
												
						$data2['new_student'] = yes;
       	 					$data2['student_information'] = yes;
        						$data2['student_promotion'] = yes;
			
	$data2['manage_attendance'] = yes;
		$data2['staff_attendance'] = yes;
        	$data2['attendance_report'] = yes;
        		$data2['support_ticket_create'] = yes;
        			$data2['support_ticket_view'] = yes;
        				$data2['assignment'] = yes;
        					$data2['study_material'] = yes;
        						$data2['parent'] = yes;
        							$data2['alumni'] = yes;
        								$data2['loan_applicant'] = yes;
       	 									$data2['loan_approval'] = yes;
        										$data2['class'] = yes;
				
														$data2['section'] = yes;
        													$data2['class_routine'] = yes;
        														$data2['subject'] = yes;
        															$data2['exam_list'] = yes;
       	 																$data2['exam_add'] = yes;
        																	$data2['exam_view'] = yes;
												
						$data2['submit_exam'] = yes;
       	 					$data2['grade'] = yes;
        						$data2['examquestion'] = yes;
								
								
	$data2['marks'] = yes;
		$data2['exam_marks_sms'] = yes;
        	$data2['tabulation_sheet'] = yes;
        		$data2['income'] = yes;
        			$data2['student_payment'] = yes;
        				$data2['invoice_add'] = yes;
        					$data2['list_invoice'] = yes;
        						$data2['invoice'] = yes;
        							$data2['department'] = yes;
        								$data2['recruitment'] = yes;
       	 									$data2['leave'] = yes;
        										$data2['payroll'] = yes;
				
														$data2['award'] = yes;
        													$data2['expense'] = yes;
        														$data2['expense_category'] = yes;
        															$data2['book'] = yes;
       	 																$data2['publisher'] = yes;
        																	$data2['search_student'] = yes;
												
						$data2['book_category'] = yes;
       	 					$data2['author'] = yes;
        						$data2['request_book'] = yes;
								
								
								$data2['dormitory'] = yes;
		$data2['hostel_category'] = yes;
        	$data2['room_type'] = yes;
        		$data2['hostel_room'] = yes;
        			$data2['noticeboard'] = yes;
        				$data2['message'] = yes;
        					$data2['transport'] = yes;
        						$data2['transport_route'] = yes;
        							$data2['vehicle'] = yes;
        								$data2['system_settings'] = yes;
       	 									$data2['email_settings'] = yes;
        										$data2['backup_restore'] = yes;
				
														$data2['manage_language'] = yes;
        													$data2['sms_settings'] = yes;
        														$data2['smtpemailsettings'] = yes;
        															$data2['studentReport'] = yes;
       	 																$data2['expenseReport'] = yes;
        																	$data2['incomeExpense'] = yes;
												
						$data2['searchStudent'] = yes;
       	 					$data2['front_end_settings'] = yes;
        						$data2['role_managements'] = yes;
									$data2['manage_profile'] = yes;
										$data2['level'] = 2;

                $this->db->insert('adminpermission' , $data2);
									
       	$this->session->set_flashdata('flash_message', get_phrase('data_added_successfully'));
        redirect(base_url() . 'admin/admin_list', 'refresh');
    }
	}
    if ($param1 == 'do_update') {
        $data['name'] = $this->input->post('name');
        	$data['email'] = $this->input->post('email');
        		$data['password'] = sha1($this->input->post('password'));
        			$this->db->where('admin_id', $param2);
        				$this->db->update('admin', $data);
        					move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/admin_image/' . $param2 . '.jpg');
        						$this->crud_model->clear_cache();
        							$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        								redirect(base_url() . 'admin/admin_list/', 'refresh');
    }

    if ($param1 == 'delete') {
        $this->db->where('admin_id', $param2);
        	$this->db->delete('admin');
			
			$this->db->where('admin_id', $param2);
        	$this->db->delete('adminpermission');
        		$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        			redirect(base_url() . 'admin/admin_list', 'refresh');
    }
}

function setPermission() {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');

    $admin_id = $this->input->post('admin_id');
    $action_ids = $this->input->post('action_id');

    if (sizeof($action_ids) > 0) {
        $this->db->where('admin_id', $admin_id);
        $this->db->delete('admin_permission');

        $values = '';
        foreach ($action_ids as $action_id) {
            $values.=",('" . $admin_id . "', '" . $action_id . "')";
        }
        $values = substr($values, 1);
        $sql = "insert into admin_permission(admin_id, action_id) values " . $values;
        $this->db->query($sql);
        redirect(base_url() . 'admin/admin_list', 'refresh');
    }
}

function getPermission() {
    if ($this->session->userdata('admin_login') != 1)
        redirect('login', 'refresh');

    $admin_id = $this->input->post('admin_id');
    $sql = "select a.*, b.parent_key from admin_permission a"
            . " inner join actions b on a.action_id=b.action_id "
            . " where a.admin_id=" . $admin_id;
    $data = $this->db->query($sql)->result_array();
    echo json_encode($data);
}



 // manage staffs or team members
    function staff($param1 = '', $param2 = '') {

        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        
        if ($param1 == 'create')
            $this->crud_model->create_staff();
			

        if ($param1 == 'edit')
            $this->crud_model->update_staff($param2);
			

        if ($param1 == 'delete')
            $this->crud_model->delete_staff($param2);

        $page_data['page_name'] = 'staff';
        $page_data['page_title'] = get_phrase('manage_staff');
        $this->load->view('backend/index', $page_data);
		
		
    }
	
	
	
	//manage account roles (staff account permissions)
    function account_role($param1 = '', $param2 = '') {

        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        
        if ($param1 == 'create')
            $this->crud_model->create_account_role();

        if ($param1 == 'edit')
            $this->crud_model->update_account_role($param2);

        if ($param1 == 'delete')
            $this->crud_model->delete_account_role($param2);

        $page_data['page_name'] = 'account_role';
        $page_data['page_title'] = get_phrase('manage_account_role');
        $this->load->view('backend/index', $page_data);
    }
	
	
	/**********EDIT DATA********************/
	function staff_edit($staff_id)
    {
        if ($this->session->userdata('admin_login') != 1)
        		redirect(base_url(), 'refresh');
		
        				$page_data['edit_data'] 	 =	$this->db->get_where('staff' , array('staff_id' => $staff_id))->result_array();
        					$page_data['page_name']  = 'staff_edit';
        						$page_data['page_title'] = get_phrase('edit_staff');
        							$this->load->view('backend/index', $page_data);
        
    }
	
	
	// support tickets management
    function support_ticket($param1 = '', $param2 = '', $param3 = '') {

        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        
        if ($param1 == 'create'){
            $this->crud_model->create_support_ticket();
			$this->session->set_flashdata('flash_message', get_phrase('created_successfully'));
			redirect(base_url() . 'admin/support_ticket', 'refresh');
			}

        if ($param1 == 'delete'){
            $this->crud_model->delete_support_ticket($param2);   //param2 = ticket_code
			$this->session->set_flashdata('flash_message', get_phrase('deleted_successfully'));
			redirect(base_url() . 'admin/support_ticket', 'refresh');
			}

        if ($param1 == 'assign_staff'){
            $this->crud_model->support_ticket_assign_staff($param2); //param2 = ticket_code
			$this->session->set_flashdata('flash_message', get_phrase('assigned_successfully'));
			redirect(base_url() . 'admin/support_ticket', 'refresh');
			}

        if ($param1 == 'update_status'){
            $this->crud_model->support_ticket_update_status($param2); //param2 = ticket_code
			$this->session->set_flashdata('flash_message', get_phrase('updated_successfully'));
			redirect(base_url() . 'admin/support_ticket', 'refresh');
			}

        $page_data['page_title'] =   get_phrase('support_ticket');
        $page_data['page_name']  = 'support_ticket';
        $this->load->view('backend/index', $page_data);
    }

    function support_ticket_view($ticket_code = '') {

        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        
        $page_data['ticket_code'] = $ticket_code;
        $page_data['page_name'] = 'support_ticket_view';
        $page_data['page_title'] = get_phrase('support_ticket');
        $this->load->view('backend/index', $page_data);
    }
	

    function support_ticket_post_reply($ticket_code = '') {
        $this->crud_model->post_ticket_reply($ticket_code);
    }

    function reload_support_ticket_list( ) {
        $this->load->view('backend/admin/support_ticket_list');
    }

    function reload_support_ticket_view_body($ticket_code = '') {
        $page_data['ticket_code'] = $ticket_code;
        $this->load->view('backend/admin/support_ticket_view_body', $page_data);
    }

    function support_ticket_create() {

        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        
        $page_data['page_name'] = 'support_ticket_create';
        $page_data['page_title'] = get_phrase('create_new_ticket');
        $this->load->view('backend/index', $page_data);
    }


/* * **MANAGE PERMISSION FOR STUDENTS**** */
function saveErrPermission($param1 = '', $param2 = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
										
			if ($param1 == 'savePermission') {
			
        $data['dashboard'] = $this->input->post('dashboard');
        	$data['view_users'] = $this->input->post('view_users');
        		$data['academics'] = $this->input->post('academics');
        			$data['payments'] = $this->input->post('payments');
        				$data['online_exam'] = $this->input->post('online_exam');
        					$data['request_book'] = $this->input->post('request_book');
        						$data['information'] = $this->input->post('information');
        							$data['transportation'] = $this->input->post('transportation');
        								$data['support_ticket'] = $this->input->post('support_ticket');
       	 									$data['internal_message'] = $this->input->post('internal_message');
        										$data['personal_details'] = $this->input->post('personal_details');
        											$data['student_id'] = $this->input->post('student_id');
        	
        				$this->db->where('student_id', $param2);
        					$this->db->update('student_permission', $data);
        						$this->session->set_flashdata('flash_message', get_phrase('successfully_updated'));
        							redirect(base_url() . 'admin/studentErrPermission/'.$data['student_id'], 'refresh');
    							} 
}




/**********TEACHER  PERMISSION ********************/
	function errPermissionteacher($teacher_id)
    {
        if ($this->session->userdata('admin_login') != 1)
        		redirect(base_url(), 'refresh');
		
        					$page_data['page_name']  = 'errPermissionteacher';
								$page_data['select_teacher'] 	=	$this->db->get_where('teacher' , array('teacher_id' => $teacher_id))->result_array();
        							$page_data['page_title'] 	= get_phrase('teacher_permission');
        								$this->load->view('backend/index', $page_data);
        
    }
	
	/**********TEACHER  PERMISSION ********************/
	function permissionTeacher()
    {
        if ($this->session->userdata('admin_login') != 1)
        		redirect(base_url(), 'refresh');
		
        					$page_data['page_name']  = 'permissionTeacher';
								$page_data['getteacher'] 	=	$this->db->get('teacher')->result_array();
        							$page_data['page_title'] 	= get_phrase('teacher_permission');
        								$this->load->view('backend/index', $page_data);
        
    }
	
	
	
/* * **MANAGE PERMISSION FOR TEACHER**** */
function setTeacherPermission($param1 = '', $param2 = '') 
{
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
										
			if ($param1 == 'setPermission') 
			{
			
   $data['dashboard'] = $this->input->post('dashboard');
		$data['teacher_id'] = $this->input->post('teacher_id');
        	$data['study_material'] = $this->input->post('study_material');
        		$data['assignment'] = $this->input->post('assignment');
        			$data['book'] = $this->input->post('book');
        				$data['examquestion'] = $this->input->post('examquestion');
        					$data['academic_syllabus'] = $this->input->post('academic_syllabus');
        						$data['view_users'] = $this->input->post('view_users');
        							$data['time_table'] = $this->input->post('time_table');
        								$data['marksheeta'] = $this->input->post('marksheeta');
       	 									$data['loans'] = $this->input->post('loans');
        										$data['staff_attendance'] = $this->input->post('staff_attendance');
				
						$data['subject'] = $this->input->post('subject');
        					$data['manage_attendance'] = $this->input->post('manage_attendance');
        							$data['information'] = $this->input->post('information');
        								$data['transportation'] = $this->input->post('transportation');
       	 									$data['message'] = $this->input->post('message');
        										$data['profile'] = $this->input->post('profile');
												
								$data['leave'] = $this->input->post('leave');
       	 							$data['payroll'] = $this->input->post('payroll');
        								$data['award'] = $this->input->post('award');
        	
        				$this->db->where('teacher_id', $param2);
        					$this->db->update('teacherpermission', $data);
        						$this->session->set_flashdata('flash_message', get_phrase('successfully_updated'));
        							redirect(base_url() . 'admin/errPermissionteacher/'.$data['teacher_id'], 'refresh');
    							} 
}



/**********ADMIN  PERMISSION ********************/
	function errPermissionadmin($admin_id)
    {
        if ($this->session->userdata('admin_login') != 1)
        		redirect(base_url(), 'refresh');
		
        					$page_data['page_name']  = 'errPermissionadmin';
								$page_data['select_admin'] 	=	$this->db->get_where('admin' , array('admin_id' => $admin_id))->result_array();
        							$page_data['page_title'] 	= get_phrase('admin_permission');
        								$this->load->view('backend/index', $page_data);
        
    }
	


 /* ------------------DEPARTMENT--------------------- */

    function department($param1 = '', $param2 = '') {
        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        if ($param1 == 'create') {
            $this->crud_model->create_department();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'admin/department/list', 'refresh');
        }

        if ($param1 == 'edit') {
            $department = $this->crud_model->edit_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updted_successfully'));
            redirect(base_url() . 'admin/department/list', 'refresh');
        }
        if ($param1 == 'delete') {
            $department = $this->crud_model->delete_department($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'admin/department/list', 'refresh');
        }
        if ($param1 == 'list') {
            $page_data['page_name'] = 'department';
            $page_data['page_title'] = get_phrase('department');
            $this->load->view('backend/index', $page_data);
        }
    }
    function delete_designation($designation_id = '')
    {
        $this->db->where('designation_id', $designation_id);
        $this->db->delete('designation');
        
        echo 'success';
    }
	
	
	
	// VACANCY
    function vacancy($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $vacancy = $this->crud_model->create_vacancy();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'admin/vacancy', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/vacancy', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_vacancy($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'admin/vacancy', 'refresh');
        }
        
        $page_data['page_name']     = 'vacancy';
        $page_data['page_title']    = get_phrase('vacancy_list');
        $this->load->view('backend/index', $page_data);
    }

    // APPLICATION
    function application($param1 = 'applied', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $status = $this->input->post('status');
            $this->crud_model->create_application();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'admin/application/' . $status, 'refresh');
        }

        if ($param1 == 'update') {
            $status = $this->input->post('status');
            $this->crud_model->update_application($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/application/' . $status, 'refresh');
        }
        if ($param1 == 'delete') {
            $status = $this->db->get_where('application', array('application_id' => $param2))->row()->status;
            $this->crud_model->delete_application($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'admin/application/' . $status, 'refresh');
        }
        
        if($param1 != 'applied' && $param1 != 'on_review' && $param1 != 'interview' && $param1 != 'offered' && $param1 != 'hired' && $param1 != 'declined')
            $param1 = 'applied';

        $page_data['status']        = $param1;
        $page_data['page_name']     = 'application';
        $page_data['page_title']    = get_phrase('application_list');
        $this->load->view('backend/index', $page_data);
    }
	
	
	
	// LEAVE
    function leave($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'approve') {
            $data['status'] = 1;
        
            $this->db->update('leave', $data, array('leave_id' => $param2));
            
            $this->session->set_flashdata('flash_message', get_phrase('leave_approved_successfully'));
            redirect(base_url() . 'admin/leave', 'refresh');
        }

        if ($param1 == 'decline') {
            $data['status'] = 2;
        
            $this->db->update('leave', $data, array('leave_id' => $param2));
            
            $this->session->set_flashdata('flash_message', get_phrase('leave_declined_successfully'));
            redirect(base_url() . 'admin/leave', 'refresh');
        }
        
        if ($param1 == 'delete') {
            $this->crud_model->delete_leave($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'admin/leave', 'refresh');
        }
        
        $page_data['page_name']     = 'leave';
        $page_data['page_title']    = get_phrase('leave_list');
        $this->load->view('backend/index', $page_data);
    }
	
	
	function payroll()
    {
        $page_data['page_name']     = 'payroll_add';
        $page_data['page_title']    = get_phrase('create_payslip');
        $this->load->view('backend/index', $page_data);
    }
    
    function get_employees($department_id = '')
    {
        $employees = $this->db->get_where('teacher',
            array('department_id' => $department_id))->result_array();
        
        foreach($employees as $row)
            echo '<option value="' . $row['teacher_id'] . '">' . $row['name'] . '</option>';
    }

    function payroll_selector()
    {
        $department_id  = $this->input->post('department_id');
        $employee_id    = $this->input->post('employee_id');
        $month          = $this->input->post('month');
        $year           = $this->input->post('year');
        
        redirect(base_url() . 'admin/payroll_view/' . $department_id
            . '/' . $employee_id . '/' . $month . '/' . $year, 'refresh');
    }
    
    function payroll_view($department_id = '', $employee_id = '', $month = '', $year = '')
    {
        $page_data['department_id'] = $department_id;
        $page_data['employee_id']   = $employee_id;
        $page_data['month']         = $month;
        $page_data['year']          = $year;
        $page_data['page_name']     = 'payroll_add_view';
        $page_data['page_title']    = get_phrase('create_payslip');
        $this->load->view('backend/index', $page_data);
    }
    
    function create_payroll()
    {
        $data['payroll_code']   = substr(md5(rand(100000000, 20000000000)), 0, 7);
        $data['teacher_id']        = $this->input->post('teacher_id');
        
        $allowances             = array();
        $allowance_types        = $this->input->post('allowance_type');
        $allowance_amounts      = $this->input->post('allowance_amount');
        $number_of_entries      = sizeof($allowance_types);
        
        for($i = 0; $i < $number_of_entries; $i++)
        {
            if($allowance_types[$i] != "" && $allowance_amounts[$i] != "")
            {
                $new_entry = array('type' => $allowance_types[$i], 'amount' => $allowance_amounts[$i]);
                array_push($allowances, $new_entry);
            }
        }
        $data['allowances']     = json_encode($allowances);
        
        $deductions             = array();
        $deduction_types        = $this->input->post('deduction_type');
        $deduction_amounts      = $this->input->post('deduction_amount');
        $number_of_entries      = sizeof($deduction_types);
        
        for($i = 0; $i < $number_of_entries; $i++)
        {
            if($deduction_types[$i] != "" && $deduction_amounts[$i] != "")
            {
                $new_entry = array('type' => $deduction_types[$i], 'amount' => $deduction_amounts[$i]);
                array_push($deductions, $new_entry);
            }
        }
        $data['deductions']     = json_encode($deductions);
        $data['date']           = $this->input->post('month') . ',' . $this->input->post('year');
        $data['status']         = $this->input->post('status');
        
        $this->db->insert('payroll', $data);
        
        $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
        redirect(base_url() . 'admin/payroll_list/filter2/' . $this->input->post('month') . '/' . $this->input->post('year'), 'refresh');
    }
    
    function payroll_list($param1 = '', $param2 = '', $param3 = '', $param4 = '')
    {
        if($param1 == 'mark_paid') {
            $data['status'] = 1;
            
            $this->db->update('payroll', $data, array('payroll_id' => $param2));
            
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/payroll_list/filter2/' . $param3 . '/' . $param4, 'refresh');
        }

        if($param1 == 'filter') {
            $page_data['month'] = $this->input->post('month');
            $page_data['year']  = $this->input->post('year');
        } else {
            $page_data['month'] = date('n');
            $page_data['year']  = date('Y');
        }

        if($param1 == 'filter2') {
            $page_data['month'] = $param2;
            $page_data['year']  = $param3;
        }
        
        $page_data['page_name']     = 'payroll_list';
        $page_data['page_title']    = get_phrase('payslip_list');
        $this->load->view('backend/index', $page_data);
    }

    function get_employee($department_id) {
        $page_data['department_id'] = $department_id;
        $this->load->view('backend/admin/payroll_employee_select', $page_data);
    }
	
	/* ---------------GET DESIGNATION------------ */

    function get_designation($department_id = '')
    {
        $designation = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach($designation as $row)
            echo '<option value="' . $row['designation_id'] . '">' . $row['name'] . '</option>';
    }
	
	
	 // AWARD
    function award($param1 = '', $param2 = '')
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');
        
        if ($param1 == 'create') {
            $award = $this->crud_model->create_award();
            $this->session->set_flashdata('flash_message', get_phrase('data_created_successfully'));
            redirect(base_url() . 'admin/award', 'refresh');
        }

        if ($param1 == 'update') {
            $this->crud_model->update_award($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_updated_successfully'));
            redirect(base_url() . 'admin/award', 'refresh');
        }
        if ($param1 == 'delete') {
            $this->crud_model->delete_award($param2);
            $this->session->set_flashdata('flash_message', get_phrase('data_deleted_successfully'));
            redirect(base_url() . 'admin/award', 'refresh');
        }
        
        $page_data['page_name']     = 'award';
        $page_data['page_title']    = get_phrase('awards_list');
        $this->load->view('backend/index', $page_data);
    }
	
	
	/****STAFF ATTENDANCE*****/
    function staff_attendance()
    {
        if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

		
        $page_data['page_name']  = 'staff_attendance';
        $page_data['page_title'] = get_phrase('staff_attendance');
        $this->load->view('backend/index', $page_data);
    }
	
	
	// reports
    function report($param1 = '') {

        if ($this->session->userdata('admin_login') != 1) {
            $this->session->set_userdata('last_page', current_url());
            redirect(base_url(), 'refresh');
        }
        
        if (isset($_POST['date_range'])) {
            $date_range = $this->input->post('date_range');
            $date_range = explode(" - ", $date_range);

            $page_data['timestamp_start']   = strtotime($date_range[0]);
            $page_data['timestamp_end']     = strtotime($date_range[1]);
        } else {
            $page_data['timestamp_start']   = strtotime('-29 days', time());
            $page_data['timestamp_end']     = strtotime(date("m/d/Y"));
        }
        $page_data['page_name']             = 'report';
        $page_data['report_type']           = $param1;

        if ( $param1 == 'project' )
            $page_data['page_title']            = get_phrase('project_income_report');
        else if ( $param1 == 'studentReport' )
            $page_data['page_title']            = get_phrase('student_payment_report');
        else if ( $param1 == 'expenseReport' )
            $page_data['page_title']            = get_phrase('expense_report');
        else if ( $param1 == 'incomeExpense' )
            $page_data['page_title']            = get_phrase('income_expense_comparison_report');

        $this->load->view('backend/index', $page_data);
    }

    function reload_report_project_body() {
        $date_range = $this->input->post('date_range');
        $date_range = explode(" - ", $date_range);

        $page_data['timestamp_start'] = strtotime($date_range[0]);
        $page_data['timestamp_end'] = strtotime($date_range[1]);
        $this->load->view('backend/admin/report_project_body', $page_data);
    }
	
	
	function group_message($param1 = "group_message_home", $param2 = ""){
      if ($this->session->userdata('admin_login') != 1)
          redirect(site_url('login'), 'refresh');
      $max_size = 2097152;
      if ($param1 == "create_group") {
        $this->crud_model->create_group();
      }
      elseif ($param1 == "edit_group") {
        $this->crud_model->update_group($param2);
      }
      elseif ($param1 == 'group_message_read') {
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
            redirect(site_url('admin/group_message/group_message_read/' . $param2), 'refresh');
          }
          else{
            $file_path = 'uploads/group_messaging_attached_file/'.$_FILES['attached_file_on_messaging']['name'];
            move_uploaded_file($_FILES['attached_file_on_messaging']['tmp_name'], $file_path);
          }
        }

        $this->crud_model->send_reply_group_message($param2);  //$param2 = message_thread_code
        $this->session->set_flashdata('flash_message', get_phrase('message_sent!'));
        redirect(site_url('admin/group_message/group_message_read/' . $param2), 'refresh');
      }
      $page_data['message_inner_page_name']   = $param1;
      $page_data['page_name']                 = 'group_message';
      $page_data['page_title']                = get_phrase('group_messaging');
      $this->load->view('backend/index', $page_data);
    }

 public function update_phrase_with_ajax() {
      $checker['phrase_id']                = $this->input->post('phraseId');
      $updater[$this->input->post('currentEditingLanguage')] = $this->input->post('updatedValue');

      $this->db->where('phrase_id', $checker['phrase_id']);
      $this->db->update('language', $updater);

      echo $checker['phrase_id'].' '.$this->input->post('currentEditingLanguage').' '.$this->input->post('updatedValue');
    }
	
	// This function call from AJAX
	function generalMessage() {
	$data = array(
	'message' => $this->input->post('message'),
	'user_id'=>$this->input->post('user_id')
	);
		$this->db->insert('general_message', $data);
			$general_message_id = $this->db->insert_id();
			//Either you can print value or you can send value to database
				echo json_encode($data);
}









 // online exam
    function manage_online_exam($param1 = "", $param2 = ""){
       if ($this->session->userdata('admin_login') != 1)
            redirect(base_url(), 'refresh');

      		$running_year = get_settings('session');

        
       

        if ($param1 == 'create') {
            if ($this->input->post('class_id') > 0 && $this->input->post('section_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->create_online_exam();
                $this->session->set_flashdata('flash_message' , get_phrase('data_added_successfully'));
                redirect(site_url('admin/manage_online_exam'), 'refresh');
            }
            else {
                $this->session->set_flashdata('error_message' , get_phrase('make_sure_to_select_valid_class_').','.get_phrase('_section_and_subject'));
                redirect(site_url('admin/manage_online_exam'), 'refresh');
            }
        }
        if ($param1 == 'edit') {
            if ($this->input->post('class_id') > 0 && $this->input->post('section_id') > 0 && $this->input->post('subject_id') > 0) {
                $this->crud_model->update_online_exam();
                $this->session->set_flashdata('flash_message' , get_phrase('data_updated_successfully'));
                redirect(site_url('admin/manage_online_exam'), 'refresh');
            }
            else{
                $this->session->set_flashdata('error_message' , get_phrase('make_sure_to_select_valid_class_').','.get_phrase('_section_and_subject'));
                redirect(site_url('admin/manage_online_exam'), 'refresh');
            }
        }
        if ($param1 == 'delete') {
            $this->db->where('online_exam_id', $param2);
            $this->db->delete('online_exam');
            $this->session->set_flashdata('flash_message' , get_phrase('data_deleted'));
            redirect(site_url('admin/manage_online_exam'), 'refresh');
        }
        $page_data['page_name'] = 'manage_online_exam';
        $page_data['page_title'] = get_phrase('manage_online_exam');
        $this->load->view('backend/index', $page_data);
    }

   

   

   

   

    function manage_online_exam_question($online_exam_id = "", $task = "", $type = ""){
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');

        if ($task == 'add') {
            if ($type == 'multiple_choice') {
                $this->crud_model->add_multiple_choice_question_to_online_exam($online_exam_id);
            }
            elseif ($type == 'true_false') {
                $this->crud_model->add_true_false_question_to_online_exam($online_exam_id);
            }
            elseif ($type == 'fill_in_the_blanks') {
                $this->crud_model->add_fill_in_the_blanks_question_to_online_exam($online_exam_id);
            }
            redirect(site_url('admin/manage_online_exam_question/'.$online_exam_id), 'refresh');
        }

        $page_data['online_exam_id'] = $online_exam_id;
        $page_data['page_name'] = 'manage_online_exam_question';
        $page_data['page_title'] = $this->db->get_where('online_exam', array('online_exam_id'=>$online_exam_id))->row()->title;
        $this->load->view('backend/index', $page_data);
    }

    function update_online_exam_question($question_id = "", $task = "", $online_exam_id = "") {
        if ($this->session->userdata('admin_login') != 1)
            redirect(site_url('login'), 'refresh');
        $online_exam_id = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->online_exam_id;
        $type = $this->db->get_where('question_bank', array('question_bank_id' => $question_id))->row()->type;
        if ($task == "update") {
            if ($type == 'multiple_choice') {
                $this->crud_model->update_multiple_choice_question($question_id);
            }
            elseif($type == 'true_false'){
                $this->crud_model->update_true_false_question($question_id);
            }
            elseif($type == 'fill_in_the_blanks'){
                $this->crud_model->update_fill_in_the_blanks_question($question_id);
            }
            redirect(site_url('admin/manage_online_exam_question/'.$online_exam_id), 'refresh');
        }
        $page_data['question_id'] = $question_id;
        $page_data['page_name'] = 'update_online_exam_question';
        $page_data['page_title'] = get_phrase('update_question');
        $this->load->view('backend/index', $page_data);
    }

   

    
   
	
	function admissionFormPage($param1 = '', $admission_id = '') {
    if ($this->session->userdata('admin_login') != 1)
        redirect(base_url(), 'refresh');
		
		 if ($param1 == "approve")
        {
            $this->crud_model->approve_pending_student($admission_id);
            $this->session->set_flashdata('flash_message' , get_phrase('data_approved_successfuly'));
            redirect('admin/admissionFormPage');
        }
			
    	$page_data['page_name'] = 'admissionFormPage';
    		$page_data['page_title'] = get_phrase('Admission Page');
    			$this->load->view('backend/index', $page_data);
}


function marketPlace($param1 = "", $param2 = ""){


if ($param1 == 'do_update') {
        $data['status'] = $this->input->post('status');
		
        $this->db->where('product_id', $param2);
        	$this->db->update('products', $data);
        		$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        			redirect(base_url() . 'admin/marketPlace/', 'refresh');
    }

if ($param1 == 'delete') {
        $this->db->where('product_id', $param2);
        	$this->db->delete('products');
        		$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        			redirect(base_url() . 'admin/marketPlace/', 'refresh');
    }

        $page_data['page_name'] = 'marketPlace';
        $page_data['page_title'] = get_phrase('list_product');
        $this->load->view('backend/index',$page_data);
    	
		}




}
