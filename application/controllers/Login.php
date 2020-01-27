<?php

if (!defined('BASEPATH'))

	exit('No direct script access allowed');



class Login extends CI_Controller

{


	 function __construct() {
        parent::__construct();
        $this->load->model('crud_model');
        $this->load->database();
        $this->load->library('session');
        /* cache control */
        $this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
        $this->output->set_header("Expires: Mon, 26 Jul 2010 05:00:00 GMT");
    }
	

	/***default functin, redirects to login page if no admin logged in yet***/

	public function index()

	{

		if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');

        if ($this->session->userdata('teacher_login') == 1)
            redirect(base_url() . 'teacher/dashboard', 'refresh');
			
		if ($this->session->userdata('librarian_login') == 1)
            redirect(base_url() . 'librarian/dashboard', 'refresh');
			
			if ($this->session->userdata('accountant_login') == 1)
            redirect(base_url() . 'accountant/dashboard', 'refresh');
			
			if ($this->session->userdata('hostel_login') == 1)
            redirect(base_url() . 'hostel/dashboard', 'refresh');

        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'student/dashboard', 'refresh');
			
		if ($this->session->userdata('hrm_login') == 1)
            redirect(base_url() . 'hrm/dashboard', 'refresh');

        if ($this->session->userdata('parent_login') == 1)
            redirect(base_url() . 'parents/dashboard', 'refresh');

		$config = array(

			array(

				'field' => 'login_type',

				'label' => 'Account Type',

				'rules' => 'required|xss_clean'

			),

			array(

				'field' => 'email',

				'label' => 'Email',

				'rules' => 'required|xss_clean|valid_email'

			),

			array(

				'field' => 'password',

				'label' => 'Password',

				'rules' => 'required|xss_clean|callback__validate_login'

			)

		);

		

		$this->form_validation->set_rules($config);

		$this->form_validation->set_message('_validate_login', ucfirst($this->input->post('login_type')) . ' Login failed!');

		$this->form_validation->set_error_delimiters('<div class="alert alert-danger">

		<button type="button" class="close" data-dismiss="alert">×</button>', '</div>');

		

		if ($this->form_validation->run() == FALSE) {

        $this->load->view('backend/login');
		

		} else {

			if ($this->session->userdata('admin_login') == 1)
            redirect(base_url() . 'admin/dashboard', 'refresh');

        if ($this->session->userdata('teacher_login') == 1)
            redirect(base_url() . 'teacher/dashboard', 'refresh');
			
		if ($this->session->userdata('librarian_login') == 1)
            redirect(base_url() . 'librarian/dashboard', 'refresh');
			
			if ($this->session->userdata('accountant_login') == 1)
            redirect(base_url() . 'accountant/dashboard', 'refresh');
			
			if ($this->session->userdata('hostel_login') == 1)
            redirect(base_url() . 'hostel/dashboard', 'refresh');

        if ($this->session->userdata('student_login') == 1)
            redirect(base_url() . 'student/dashboard', 'refresh');
			
		if ($this->session->userdata('hrm_login') == 1)
            redirect(base_url() . 'hrm/dashboard', 'refresh');

        if ($this->session->userdata('parent_login') == 1)
            redirect(base_url() . 'parents/dashboard', 'refresh');
			
		}
	}

	

	/***validate login****/

	function _validate_login($str)
	{
		if ($this->input->post('login_type') == '') {

			$this->session->set_flashdata('flash_message', get_phrase('login_failed'));

			return FALSE;

		}

		$query = $this->db->get_where($this->input->post('login_type'), array(

			'email' => $this->input->post('email'),

			'password' => sha1($this->input->post('password'))

		));

		if ($query->num_rows() > 0) {

			$row = $query->row();

			if ($this->input->post('login_type') == 'admin') {

				$this->session->set_userdata('login_type', 'admin');

				$this->session->set_userdata('admin_login', '1');

				$this->session->set_userdata('admin_id', $row->admin_id);
				
				$this->session->set_userdata('login_user_id', $row->admin_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));

			}

			if ($this->input->post('login_type') == 'teacher') {

				$this->session->set_userdata('login_type', 'teacher');

				$this->session->set_userdata('teacher_login', '1');

				$this->session->set_userdata('teacher_id', $row->teacher_id);
				
				$this->session->set_userdata('login_user_id', $row->teacher_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));
				


			}

			if ($this->input->post('login_type') == 'librarian') {

				$this->session->set_userdata('login_type', 'librarian');

				$this->session->set_userdata('librarian_login', '1');

				$this->session->set_userdata('librarian_id', $row->librarian_id);
				
				$this->session->set_userdata('login_user_id', $row->librarian_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));


			}

			if ($this->input->post('login_type') == 'hostel') {

				$this->session->set_userdata('login_type', 'hostel');

				$this->session->set_userdata('hostel_login', '1');

				$this->session->set_userdata('hostel_id', $row->hostel_id);
				
				$this->session->set_userdata('login_user_id', $row->hostel_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));


			}

			if ($this->input->post('login_type') == 'student') {

				$this->session->set_userdata('login_type', 'student');

				$this->session->set_userdata('student_login', '1');

				$this->session->set_userdata('student_id', $row->student_id);
				
				$this->session->set_userdata('login_user_id', $row->student_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));


			}
			
			
			if ($this->input->post('login_type') == 'hrm') {

				$this->session->set_userdata('login_type', 'hrm');

				$this->session->set_userdata('hrm_login', '1');

				$this->session->set_userdata('hrm_id', $row->hrm_id);
				
				$this->session->set_userdata('login_user_id', $row->hrm_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));


			}

			if ($this->input->post('login_type') == 'parent') {

				$this->session->set_userdata('login_type', 'parent');

				$this->session->set_userdata('parent_login', '1');

				$this->session->set_userdata('parent_id', $row->parent_id);
				
				$this->session->set_userdata('login_user_id', $row->parent_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));

			}

			if ($this->input->post('login_type') == 'accountant') {

				$this->session->set_userdata('login_type', 'accountant');

				$this->session->set_userdata('accountant_login', '1');

				$this->session->set_userdata('accountant_id', $row->accountant_id);
				
				$this->session->set_userdata('login_user_id', $row->accountant_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));


			}
			
			if ($this->input->post('login_type') == 'receptionist') {

				$this->session->set_userdata('login_type', 'receptionist');

				$this->session->set_userdata('receptionist_login', '1');

				$this->session->set_userdata('receptionist_id', $row->receptionist_id);
				
				$this->session->set_userdata('login_user_id', $row->receptionist_id);
				
				$this->session->set_flashdata('flash_message', get_phrase('Successfully Login'));


			}

			return TRUE;

		} else {
		
		//redirect(base_url(). 'login', 'refresh');
		$this->session->set_flashdata('flash_message', get_phrase('invalid_login_details'));
      	return FALSE;

		}

	}

	/*******LOGOUT FUNCTION 

	function logout()

	{

		$this->session->unset_userdata();

		$this->session->sess_destroy();

		$this->session->set_flashdata('flash_message', get_phrase('logged_out'));

		redirect(base_url(). 'login', 'refresh');

	}*******/
	
	
	/*******LOGOUT FUNCTION *******/

	function logout()

	{

		$this->session->unset_userdata();

		$this->session->sess_destroy();

		$data = array();
		
        $data['page'] = 'login';

		$this->load->view('backend/login', $data);

	}


	

	/***DEFAULT NOR FOUND PAGE*****/

	function four_zero_four()

	{

		$this->load->view('four_zero_four');

	}

	

	/***RESET AND SEND PASSWORD TO REQUESTED EMAIL****/

	function reset_password()
	{
		$account_type = $this->input->post('account_type');
		if ($account_type == "") 
		{
			redirect(base_url(), 'refresh');
		}
		$email  = $this->input->post('email');
		$result = $this->email_model->password_reset_email($account_type, $email); //SEND EMAIL ACCOUNT OPENING EMAIL
		if ($result == true) 
		{
			$this->session->set_flashdata('email_message', get_phrase('password_sent'));
			redirect(base_url(), 'refresh');
		}
		else if ($result == false) 
		
		{
			$this->session->set_flashdata('error_message', get_phrase('account_not_found'));
			redirect(base_url(), 'refresh');
		}
	}

	

	/***LOGIN AS ANOTHER USER LIKE TEACHER,STUDENT,LIBRARIAN,ACOUNTANT, HOSTEL MANAGER, ETC******/

	function login_as($user_type = '', $user_id = '')

	{

		$this->session->set_userdata('login_type', $user_type);

		$this->session->set_userdata($user_type . '_login', '1');

		$this->session->set_userdata($user_type . '_id', $user_id);

		redirect(base_url() . '' . $user_type . '/dashboard', 'refresh');

	}

	

}
