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

//LOCATION : application - controller - models -  Crud_model.php


class Crud_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function clear_cache() {
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        $this->output->set_header('Pragma: no-cache');
    }
	
	 function getvalues($key)
	{
		$query = $this->db->get_where('settings',array('type'=>$key));
		if($query->num_rows()>0)
		{
			$row = $query->row();
			return json_decode($row->description);
		}
		else
			return '';	
	}
    function addvalues($data)
	{
		$this->db->insert('settings',$data);
	}
    function updatevalues($key,$data)
	{
		$this->db->update('settings',$data,array('type'=>$key));
	}

     function get_type_name_by_id($type, $type_id = '', $field = 'name') {
        $this->db->where($type . '_id', $type_id);
        $query = $this->db->get($type);
        $result = $query->result_array();
        foreach ($result as $row)
            return $row[$field];
        //return	$this->db->get_where($type,array($type.'_id'=>$type_id))->row()->$field;	
    }

////////STUDENT/////////////
    function get_students($class_id) {
        $query = $this->db->get_where('student', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_student_info($student_id) {
        $query = $this->db->get_where('student', array('student_id' => $student_id));
        return $query->result_array();
    }
	
	 function get_student_info_by_id($student_id) {
        $query = $this->db->get_where('student', array('student_id' => $student_id))->row_array();
        return $query;
    }

    function new_student_list() {
        $data = array();
        $sql = "select * from student order by student_id desc limit 0, 7";
        $rows = $this->db->query($sql)->result_array();
        foreach ($rows as $row) {
            $key = $row['student_id'];
            $face_file = 'uploads/student_image/' . $row['student_id'] . '.jpg';
            if (!file_exists($face_file)) {
                $face_file = 'uploads/default_avatar.jpg';
            }
            $row["face_file"] = base_url() . $face_file;

            array_push($data, $row);
        }
        return $data;
    }
	
	
	 /////email template settings////
    function save_email_template($email_template_id) {
        $data['subject'] = $this->input->post('subject');
        $data['body'] = $this->input->post('body');

        $this->db->where('email_template_id', $email_template_id);
        $this->db->update('email_template', $data);
    }

/////////TEACHER/////////////
    function get_teachers() {
        $query = $this->db->get('teacher');
        return $query->result_array();
    }

    function get_teacher_name($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }
	
	function get_admin_name($admin_id) {
        $query = $this->db->get_where('admin', array('admin_id' => $admin_id));
        $resi = $query->result_array();
        foreach ($resi as $row)
            return $row['name'];
    }

    function get_teacher_info($teacher_id) {
        $query = $this->db->get_where('teacher', array('teacher_id' => $teacher_id));
        return $query->result_array();
    }

//////////SUBJECT/////////////
    function get_subjects() {
        $query = $this->db->get('subject');
        return $query->result_array();
    }

    function get_subject_info($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id));
        return $query->result_array();
    }

    function get_subjects_by_class($class_id) {
        $query = $this->db->get_where('subject', array('class_id' => $class_id));
        return $query->result_array();
    }

    function get_subject_name_by_id($subject_id) {
        $query = $this->db->get_where('subject', array('subject_id' => $subject_id))->row();
        return $query->name;
    }

////////////CLASS///////////
    function get_class_name($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name'];
    }

    function get_class_name_numeric($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        $res = $query->result_array();
        foreach ($res as $row)
            return $row['name_numeric'];
    }

    function get_classes() {
        $query = $this->db->get('class');
        return $query->result_array();
    }

    function get_class_info($class_id) {
        $query = $this->db->get_where('class', array('class_id' => $class_id));
        return $query->result_array();
    }

//////////EXAMS/////////////
    function get_exams() {
        $query = $this->db->get('exam');
        return $query->result_array();
    }

    function get_exam_info($exam_id) {
        $query = $this->db->get_where('exam', array('exam_id' => $exam_id));
        return $query->result_array();
    }

//////////GRADES/////////////
    function get_grades() {
        $query = $this->db->get('grade');
        return $query->result_array();
    }

    function get_grade_info($grade_id) {
        $query = $this->db->get_where('grade', array('grade_id' => $grade_id));
        return $query->result_array();
    }

    function get_obtained_marks($exam_id, $class_id, $subject_id, $student_id) {
        $marks = $this->db->get_where('mark', array(
                    'subject_id' => $subject_id,
                    'exam_id' => $exam_id,
                    'class_id' => $class_id,
                    'student_id' => $student_id))->result_array();

        foreach ($marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_highest_marks($exam_id, $class_id, $subject_id) {
        $this->db->where('exam_id', $exam_id);
        $this->db->where('class_id', $class_id);
        $this->db->where('subject_id', $subject_id);
        $this->db->select_max('mark_obtained');
        $highest_marks = $this->db->get('mark')->result_array();
        foreach ($highest_marks as $row) {
            echo $row['mark_obtained'];
        }
    }

    function get_grade($mark_obtained) {
        $query = $this->db->get('grade');
        $grades = $query->result_array();
        foreach ($grades as $row) {
            if ($mark_obtained >= $row['mark_from'] && $mark_obtained <= $row['mark_upto'])
                return $row;
        }
    }

    function create_log($data) {
        $data['timestamp'] = strtotime(date('Y-m-d') . ' ' . date('H:i:s'));
        $data['ip'] = $_SERVER["REMOTE_ADDR"];
        $location = new SimpleXMLElement(file_get_contents('http://freegeoip.net/xml/' . $_SERVER["REMOTE_ADDR"]));
        $data['location'] = $location->City . ' , ' . $location->CountryName;
        $this->db->insert('log', $data);
    }

    function get_system_settings() {
        $query = $this->db->get('settings');
        return $query->result_array();
    }
	
////////BACKUP RESTORE/////////
   function create_backup($type)
	{
		$this->load->dbutil();
		$options = array(

                'format'      => 'txt',             // gzip, zip, txt

                'add_drop'    => TRUE,              // Whether to add DROP TABLE statements to backup file

                'add_insert'  => TRUE,              // Whether to add INSERT data to backup file

                'newline'     => "\n"               // Newline character used in backup file

              );
		if($type == 'all')
		{
			$tables = array('');

			$file_name	=	'system_backup';
		}

		else 
		{

			$tables = array('tables'	=>	array($type));

			$file_name	=	'backup_'.$type;

		}
		$backup =& $this->dbutil->backup(array_merge($options , $tables)); 
		$this->load->helper('download');

		force_download($file_name.'.sql', $backup);

	}

/////////RESTORE TOTAL DB/ DB TABLE FROM UPLOADED BACKUP SQL FILE//////////
   function restore_backup()

	{
		move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/backup.sql');

		$this->load->dbutil();

		$prefs = array(

            'filepath'						=> 'uploads/backup.sql',

			'delete_after_upload'			=> TRUE,

			'delimiter'						=> ';'

        );

		$restore =& $this->dbutil->restore($prefs); 

		unlink($prefs['filepath']);

	}
	
	
	
	
	// Create a new invoice.
    function create_invoice() 
    {
        $data['class_id']              = $this->input->post('class_id');
        $data['student_id']     = $this->input->post('student_id');
        $data['title']         = $this->input->post('title');
        $data['invoice_number'] = $this->input->post('invoice_number');
        $data['c_date']      = $this->input->post('c_date');
        $data['d_date']     = $this->input->post('d_date');
        $data['vat_percentage']    = $this->input->post('vat_percentage');
        $data['discount_amount']             = $this->input->post('discount_amount');
        $data['status']             = $this->input->post('status');
		        $data['section_id']     = $this->input->post('section_id');

        $invoice_entries            = array();
        $item               = $this->input->post('entry_item');
        $amounts                    = $this->input->post('entry_amount');
		$date               = $this->input->post('entry_date2');
        $credit                    = $this->input->post('entry_credit');
        $balance                    = $this->input->post('entry_balance');
        $number_of_entries          = sizeof($item);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($item[$i] != "" && $amounts[$i] != "" && $date[$i] != "" && $credit[$i] != "" && $balance[$i] != "")
            {
                $new_entry          = array('item' => $item[$i], 'amount' => $amounts[$i], 'date2' => $date[$i], 'credit' => $credit[$i], 'balance' => $balance[$i]);
                array_push($invoice_entries, $new_entry);
            }
        }
        $data['invoice_entries']    = json_encode($invoice_entries);

        $this->db->insert('ledger', $data);
    }
    
    function select_invoice_info()
    {
        return $this->db->get('ledger')->result_array();
    }
    
    function select_invoice_info_by_student_id()
    {
        $student_id = $this->session->userdata('login_user_id');
        return $this->db->get_where('ledger', array('student_id' => $student_id))->result_array();
    }

    function update_invoice($ledger_id)
    {
        $data['class_id']              = $this->input->post('class_id');
        $data['student_id']     = $this->input->post('student_id');
        $data['title']         = $this->input->post('title');
        $data['invoice_number'] = $this->input->post('invoice_number');
        $data['c_date']      = $this->input->post('c_date');
        $data['d_date']     = $this->input->post('d_date');
        $data['vat_percentage']    = $this->input->post('vat_percentage');
        $data['discount_amount']             = $this->input->post('discount_amount');
        $data['status']             = $this->input->post('status');
				        $data['section_id']     = $this->input->post('section_id');


        $invoice_entries            = array();
        $item               = $this->input->post('entry_item');
        $amounts                    = $this->input->post('entry_amount');
		$date               = $this->input->post('entry_date2');
        $credit                    = $this->input->post('entry_credit');
        $balance                    = $this->input->post('entry_balance');
        $number_of_entries          = sizeof($item);
        
        for ($i = 0; $i < $number_of_entries; $i++)
        {
            if ($item[$i] != "" && $amounts[$i] != "" && $date[$i] != "" && $credit[$i] != "" && $balance[$i] != "")
            {
                $new_entry          = array('item' => $item[$i], 'amount' => $amounts[$i], 'date2' => $date[$i], 'credit' => $credit[$i], 'balance' => $balance[$i]);
                array_push($invoice_entries, $new_entry);
            }
        }
        $data['invoice_entries']    = json_encode($invoice_entries);

        $this->db->where('ledger_id', $ledger_id);
        $this->db->update('ledger', $data);
    }

    function delete_invoice($ledger_id)
    {
        $this->db->where('ledger_id', $ledger_id);
        $this->db->delete('ledger');
    }

    function calculate_invoice_total_amount($invoice_number)
    {
        $total_amount           = 0;
        $invoice                = $this->db->get_where('ledger', array('invoice_number' => $invoice_number))->result_array();
        foreach ($invoice as $row)
        {
            $invoice_entries    = json_decode($row['invoice_entries']);
            foreach ($invoice_entries as $invoice_entry)
                $total_amount  += $invoice_entry->amount;

            $vat_amount         = $total_amount * $row['vat_percentage'] / 100;
            $grand_total        = $total_amount + $vat_amount - $row['discount_amount'];
        }

        return $grand_total;
    }
	

	

	/////////DELETE DATA FROM TABLES///////////////

	function truncate($type)

	{

		if($type == 'all')

		{

			$this->db->truncate('student');

			$this->db->truncate('mark');

			$this->db->truncate('teacher');

			$this->db->truncate('subject');

			$this->db->truncate('class');

			$this->db->truncate('exam');

			$this->db->truncate('grade');

		}

		else

		{	

			$this->db->truncate($type);

		}

	}

////////IMAGE URL//////////
    function get_image_url($type = '', $id = '') {
        if (file_exists('uploads/' . $type . '_image/' . $id . '.jpg'))
            $image_url = base_url() . 'uploads/' . $type . '_image/' . $id . '.jpg';
        else
            $image_url = base_url() . 'uploads/user.jpg';

        return $image_url;
    }

 ////////STUDY MATERIAL//////////
    function save_study_material_info()
    {
        $data['timestamp']      = $this->input->post('timestamp');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['description']    = $this->input->post('description');
        $data['file_name'] 	= $_FILES["file_name"]["name"];
        $data['file_type'] 	= $this->input->post('file_type');
        $data['class_id'] 	= $this->input->post('class_id');
        $data['teacher_id'] 	= $this->input->post('teacher_id');
        
        $this->db->insert('document',$data);
        
        $document_id            = $this->db->insert_id();
        move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/document/" . $_FILES["file_name"]["name"]);
    }
    
    function select_study_material_info()
    {
        $this->db->order_by("timestamp", "desc");
        return $this->db->get('document')->result_array(); 
    }
    
    function select_study_material_info_for_student()
    {
        $student_id = $this->session->userdata('student_id');
        $class_id   = $this->db->get_where('student', array('student_id' => $student_id))->row()->class_id;
        $this->db->order_by("timestamp", "desc");
        return $this->db->get_where('document', array('class_id' => $class_id))->result_array();
    }
    
    function update_study_material_info($document_id)
    {
       $data['timestamp']      = $this->input->post('timestamp');
        $data['subject_id'] = $this->input->post('subject_id');
        $data['description']    = $this->input->post('description');
        $data['file_type'] 	= $this->input->post('file_type');
        $data['class_id'] 	= $this->input->post('class_id');
        $data['teacher_id'] 	= $this->input->post('teacher_id');
        
        $this->db->where('document_id',$document_id);
        $this->db->update('document',$data);
    }
    
    function delete_study_material_info($document_id)
    {
        $this->db->where('document_id',$document_id);
        $this->db->delete('document');
    }

	////////private message//////
    function send_new_private_message() {
       
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender_type = $this->session->userdata('login_type');
       if ($this->input->post('receiver') != "")
       if($sender_type == 'admin') {
       foreach ($this->input->post('receiver') as $row){
                $data['receiver']  = $row;
        
        $reciever = $row;
        
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();
		
		//check if file is attached or not
        if ($_FILES['attached_file_on_messaging']['name'] != "") {
          $data_message['attached_file_name'] = $_FILES['attached_file_on_messaging']['name'];
        }

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);
       }
       
        } else{
            $data['receiver']  = $this->input->post('receiver');
        
        $reciever = $this->input->post('receiver');
        
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

        //check if the thread between those 2 users exists, if not create new thread
        $num1 = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->num_rows();
        $num2 = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->num_rows();

        if ($num1 == 0 && $num2 == 0) {
            $message_thread_code = substr(md5(rand(100000000, 20000000000)), 0, 15);
            $data_message_thread['message_thread_code'] = $message_thread_code;
            $data_message_thread['sender'] = $sender;
            $data_message_thread['reciever'] = $reciever;
            $this->db->insert('message_thread', $data_message_thread);
        }
        if ($num1 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $sender, 'reciever' => $reciever))->row()->message_thread_code;
        if ($num2 > 0)
            $message_thread_code = $this->db->get_where('message_thread', array('sender' => $reciever, 'reciever' => $sender))->row()->message_thread_code;


        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);
       }
        // notify email to email reciever
       $this->email_model->notify_email('new_message_notification', $this->db->insert_id());

        return $message_thread_code;
    }

    function send_reply_message($message_thread_code) {
        $message = $this->input->post('message');
        $timestamp = strtotime(date("Y-m-d H:i:s"));
        $sender = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');

		if ($_FILES['attached_file_on_messaging']['name'] != "") {
          $data_message['attached_file_name'] = $_FILES['attached_file_on_messaging']['name'];
        }

        $data_message['message_thread_code'] = $message_thread_code;
        $data_message['message'] = $message;
        $data_message['sender'] = $sender;
        $data_message['timestamp'] = $timestamp;
        $this->db->insert('message', $data_message);
		$message_id = $this->db->insert_id();

		// notify email to email reciever
		$this->email_model->notify_email('new_message_notification', $this->db->insert_id());
		echo json_encode($data_message);
    }

 function mark_thread_messages_read($message_thread_code) {
// mark read only the oponnent messages of this thread, not currently logged in user's sent messages
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $this->db->where('sender !=', $current_user);
        $this->db->where('message_thread_code', $message_thread_code);
        $this->db->update('message', array('read_status' => 1));
    }

    function count_unread_message_of_thread($message_thread_code) {
        $unread_message_counter = 0;
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $messages = $this->db->get_where('message', array('message_thread_code' => $message_thread_code))->result_array();
        foreach ($messages as $row) {
            if ($row['sender'] != $current_user && $row['read_status'] == '0')
                $unread_message_counter++;
        }
        return $unread_message_counter;
    }

    function count_unread_message_of_curuser() {
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $sql = "select count(a.message_id) counts from message a "
                . " inner join message_thread b on a.message_thread_code=b.message_thread_code "
                . " where b.reciever='" . $current_user . "' and a.read_status=0";
        $row = $this->db->query($sql)->row_array();
        return $row["counts"];
    }

    function unread_message_of_curuser() {
        $data = array();
        $current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
        $sql = "select a.*  from message a "
                . " inner join message_thread b on a.message_thread_code=b.message_thread_code "
                . " where b.reciever='" . $current_user . "' and a.read_status=0";
        $rows = $this->db->query($sql)->result_array();
        foreach ($rows as $row) {
            $sender = explode('-', $row['sender']);
            $sender_type = $sender[0];
            $sender_id = $sender[1];

            $sql = "select name from " . $sender_type . " where " . $sender_type . "_id=" . $sender_id;
            $result = $this->db->query($sql)->row_array();
            $row["sender_name"] = $result["name"];

            $key = $row['sender'];
            $face_file = 'uploads/' . $sender_type . '_image/' . $sender_id . '.jpg';
            if (!file_exists($face_file)) {
                $face_file = 'uploads/default_avatar.jpg';
            }
            $row["face_file"] = base_url() . $face_file;

//            $cur_time = date('Y-m-d H:i:s', time());
//            $send_time =date('Y-m-d H:i:s', $row["timestamp"]);
//            echo $cur_time;
//            $diff = date_diff($cur_time, $send_time);
            $ago = '';
            $sec = time() - $row["timestamp"];
            $year = (int) ($sec / 31556926);
            $month = (int) ($sec / 2592000);
            $day = (int) ($sec / 86400);
            $hou = (int) ($sec / 3600);
            $min = (int) ($sec / 60);
            if ($year > 0) {
                $ago = $year . ' year(s)';
            } else if ($month > 0) {
                $ago = $month . ' month(s)';
            } else if ($day > 0) {
                $ago = $day . ' day(s)';
            } else if ($hou > 0) {
                $ago = $hou . ' hour(s)';
            } else if ($min > 0) {
                $ago = $min . ' minute(s)';
            } else {
                $ago = $sec . ' second(s)';
            }

            $row["ago"] = $ago;

            array_push($data, $row);
        }
        return $data;
    }
	
	
	
	
	function curl_request($code = '') {

        $product_code = $code;

        $personal_token = "FkA9UyDiQT0YiKwYLK3ghyFNRVV9SeUn";
        $url = "https://api.envato.com/v3/market/author/sale?code=".$product_code;
        $curl = curl_init($url);

        //setting the header for the rest of the api
        $bearer   = 'bearer ' . $personal_token;
        $header   = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json; charset=utf-8';
        $header[] = 'Authorization: ' . $bearer;

        $verify_url = 'https://api.envato.com/v1/market/private/user/verify-purchase:'.$product_code.'.json';
        $ch_verify = curl_init( $verify_url . '?code=' . $product_code );

        curl_setopt( $ch_verify, CURLOPT_HTTPHEADER, $header );
        curl_setopt( $ch_verify, CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt( $ch_verify, CURLOPT_RETURNTRANSFER, 1 );
        curl_setopt( $ch_verify, CURLOPT_CONNECTTIMEOUT, 5 );
        curl_setopt( $ch_verify, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13');

        $cinit_verify_data = curl_exec( $ch_verify );
        curl_close( $ch_verify );

        $response = json_decode($cinit_verify_data, true);

        if (count($response['verify-purchase']) > 0) {
            return true;
        } else {
            return true;
        }

  	}
	
	
	
	
	
	
	 ////////staffS/////////////
    function create_staff() {
        $data['name'] = $this->input->post('name');
		$data['staff_number'] = $this->input->post('staff_number');
        $data['account_role_id'] = $this->input->post('account_role_id');
		
		
		$data['birthday'] = $this->input->post('birthday');
        $data['sex'] = $this->input->post('sex');
        $data['religion'] = $this->input->post('religion');
        $data['blood_group'] = $this->input->post('blood_group');
        $data['address'] = $this->input->post('address');
        $data['qualification'] = $this->input->post('qualification');
		
		
        $data['marital_status'] = $this->input->post('marital_status');
        $data['facebook'] = $this->input->post('facebook');
        $data['twitter'] = $this->input->post('twitter');
        $data['googleplus'] = $this->input->post('googleplus');
        $data['linkedin'] = $this->input->post('linkedin');
		$data['file_name'] = $_FILES["file_name"]["name"];
        $data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');
		$data['password'] = sha1($this->input->post('password'));

        $this->db->insert('staff', $data);
        $staff_id = $this->db->insert_id();

        // email notification check
        if ($this->input->post('notify_check') == 'yes')
            $this->email_model->notify_email('new_staff_account_opening', $staff_id, $this->input->post('password'));
		move_uploaded_file($_FILES["file_name"]["tmp_name"], "uploads/staff_image/" . $_FILES["file_name"]["name"]);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/staff_image/' . $staff_id . '.jpg');
		
		$this->session->set_flashdata('flash_message', get_phrase('staff_created'));
        redirect(base_url() . 'index.php?admin/staff/', 'refresh');
    }

    function update_staff($staff_id) {
        $data['name'] = $this->input->post('name');
        $data['account_role_id'] = $this->input->post('account_role_id');
		
		
		$data['birthday'] = $this->input->post('birthday');
        $data['sex'] = $this->input->post('sex');
        $data['religion'] = $this->input->post('religion');
        $data['blood_group'] = $this->input->post('blood_group');
        $data['address'] = $this->input->post('address');
        $data['qualification'] = $this->input->post('qualification');
		
		
        $data['marital_status'] = $this->input->post('marital_status');
        $data['facebook'] = $this->input->post('facebook');
        $data['twitter'] = $this->input->post('twitter');
        $data['googleplus'] = $this->input->post('googleplus');
        $data['linkedin'] = $this->input->post('linkedin');
        $data['email'] = $this->input->post('email');
		$data['phone'] = $this->input->post('phone');

        $this->db->where('staff_id', $staff_id);
        $this->db->update('staff', $data);
        move_uploaded_file($_FILES['userfile']['tmp_name'], 'uploads/staff_image/' . $staff_id . '.jpg');
		
		$this->session->set_flashdata('flash_message', get_phrase('data_updated'));
        redirect(base_url() . 'index.php?admin/staff/', 'refresh');
    }

    function delete_staff($staff_id) {
        $this->db->where('staff_id', $staff_id);
        $this->db->delete('staff');
		$this->session->set_flashdata('flash_message', get_phrase('data_deleted'));
        redirect(base_url() . 'index.php?admin/staff/', 'refresh');
    }

    function staff_permission($account_permission_id = '') {
        $current_staff_account_role_id = $this->db->get_where('staff', array('staff_id' => $this->session->userdata('login_user_id')))
                        ->row()->account_role_id;

        $current_staff_account_permissions = $this->db->get_where('account_role', array('account_role_id' => $current_staff_account_role_id))
                        ->row()->account_permissions;

        if (in_array($account_permission_id, explode(',', $current_staff_account_permissions))) {
            return true;
        } else {
            return false;
        }
    }
	
	
	
	
	////////account_roles/////////////
    function create_account_role() {
        $checked_permissions = $this->input->post('permission');
        $total_checked_values = count($checked_permissions);
        $permissions = '';
        for ($i = 0; $i < $total_checked_values; $i++) {
            $permissions .= $checked_permissions[$i] . ",";
        }

        $data['account_permissions'] = $permissions;
        $data['name'] = $this->input->post('name');
        $this->db->insert('account_role', $data);
		
		$this->session->set_flashdata('flash_message', get_phrase('role_assigned'));
        redirect(base_url() . 'index.php?admin/account_role/', 'refresh');
    }

    function update_account_role($account_role_id) {
        $checked_permissions = $this->input->post('permission');
        $total_checked_values = count($checked_permissions);
        $permissions = '';
        for ($i = 0; $i < $total_checked_values; $i++) {
            $permissions .= $checked_permissions[$i] . ",";
        }

        $data['account_permissions'] = $permissions;
        $data['name'] = $this->input->post('name');

        $this->db->where('account_role_id', $account_role_id);
        $this->db->update('account_role', $data);
		
		$this->session->set_flashdata('flash_message', get_phrase('permission_successful'));
        redirect(base_url() . 'index.php?admin/account_role/', 'refresh');
    }

    function delete_account_role($account_role_id) {
        $this->db->where('account_role_id', $account_role_id);
        $this->db->delete('account_role');
		
		$this->session->set_flashdata('flash_message', get_phrase('permission_deleted'));
        redirect(base_url() . 'index.php?admin/account_role/', 'refresh');
    }
	
	
	 ////////support ticket/////
    function create_support_ticket() {
        $data['title'] = $this->input->post('title');
        $data['ticket_code'] = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['status'] = 'opened';
        $data['priority'] = $this->input->post('priority');
        $data['project_id'] = $this->input->post('project_id');

        $login_type = $this->session->userdata('login_type');
        if ($login_type == 'student')
            $data['student_id'] = $this->session->userdata('login_user_id');
        else
            $data['student_id'] = $this->input->post('student_id');

        $data['timestamp'] = date("d M,Y");

        $this->db->insert('ticket', $data);

        // email notification check
        $this->email_model->notify_email('new_support_ticket_notify_admin', $data['ticket_code']);

        //creating ticket message

        $data2['ticket_code'] = $data['ticket_code'];
        $data2['message'] = $this->input->post('description');
        $data2['timestamp'] = date("d M,Y");
        $data2['sender_type'] = $this->session->userdata('login_type');
        $data2['sender_id'] = $this->session->userdata('login_user_id');
        if ($_FILES['file']['name'] != '')
            $data2['file'] = $_FILES['file']['name'];

        $this->db->insert('ticket_message', $data2);
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/ticket_file/' . $_FILES['file']['name']);
    }

    function delete_support_ticket($ticket_code) {
        $this->db->where('ticket_code', $ticket_code);
        $this->db->delete('ticket');
    }

    function post_ticket_reply($ticket_code) {
        $data['ticket_code'] = $ticket_code;
        $data['message'] = $this->input->post('message');
        $data['timestamp'] = date("d M,Y");
        $data['sender_type'] = $this->session->userdata('login_type');
        $data['sender_id'] = $this->session->userdata('login_user_id');

        if (isset($_FILES['file']['name']))
            $data['file'] = $_FILES['file']['name'];

        $this->db->insert('ticket_message', $data);

        if (isset($_FILES['file']['name']))
            move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/ticket_file/' . $_FILES['file']['name']);
    }

    function support_ticket_assign_staff($ticket_code) {
        $data['admin_id'] = $this->input->post('admin_id');
        $this->db->where('ticket_code', $ticket_code);
        $this->db->update('ticket', $data);

        // email notification check
        if ($this->input->post('notify_check') == 'yes')
            $this->email_model->notify_email('support_ticket_assign_staff', $ticket_code, $data['admin_id']);
    }

    function support_ticket_update_status($ticket_code) {
        $data['status'] = $this->input->post('status');
        $this->db->where('ticket_code', $ticket_code);
        $this->db->update('ticket', $data);
    }
	
	
	
	 //CREATE DEPARTMENT
    function create_department() {
        $department_code            = substr(md5(rand(100000000, 20000000000)), 0, 15);
        $data['department_code']    = $department_code;
        $data['name']               = $this->input->post('name');
        $this->db->insert('department',$data);
        $department_id              = $this->db->insert_id();
        $designation                = $this->input->post('designation');
        
        foreach ($designation as $designation):
            if($designation != ""):
            $data2['department_id'] = $department_id;
            $data2['name']          = $designation;
            $this->db->insert('designation',$data2);
        endif;
        endforeach;
    }
    
    //EDIT DEPARTMENT//
    function edit_department($department_code = '') {
        $department_id = $this->db->get_where('department', array('department_code' => $department_code))->row()->department_id;
        
        $data['name'] = $this->input->post('name');
        
        $this->db->where('department_id', $department_id);
        $this->db->update('department', $data);
        
        // UPDATE EXISTING DESIGNATIONS
        $designations = $this->db->get_where('designation', array('department_id' => $department_id))->result_array();
        foreach ($designations as $row):
           $data2['name'] = $this->input->post('designation_' . $row['designation_id']);
           $this->db->where('designation_id',  $row['designation_id']);
           $this->db->update('designation', $data2);
        endforeach;
        
        // CREATE NEW DESIGNATIONS
        $designations = $this->input->post('designation');
        
        foreach($designations as $designation)
            if($designation != ""):
                $data3['department_id'] = $department_id;
                $data3['name']          = $designation;
                $this->db->insert('designation', $data3);
            endif;
    }
    




	


}
