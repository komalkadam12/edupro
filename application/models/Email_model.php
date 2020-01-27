<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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

//LOCATION : application - controller - models -  Email_model.php

class Email_model extends CI_Model { 
	
	function __construct()
    {
        parent::__construct();
    }
	
	function notify_email($task = '' , $param2 = '' , $param3 = '' , $param4 = '' , $param5 = '')
    {
    	$email_sub		=	$this->db->get_where('email_template' , array('task' => $task))->row()->subject;
    	$email_msg		=	$this->db->get_where('email_template' , array('task' => $task))->row()->body;

    	
		 // email notification for student account opening by admin
        if ($task == 'new_student_account_opening')
        {
            $student_id      =   $param2;
            $STUDENT_PASSWORD=   $param3;
            $STUDENT_NAME    =   $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;
            $STUDENT_EMAIL   =   $this->db->get_where('student' , array('student_id' => $student_id))->row()->email;
            $SYSTEM_URL     =   base_url();

            $email_msg      =   str_replace('[STUDENT_NAME]' , $STUDENT_NAME , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);
            $email_msg      =   str_replace('[STUDENT_EMAIL]' , $STUDENT_EMAIL , $email_msg);
            $email_msg      =   str_replace('[STUDENT_PASSWORD]' , $STUDENT_PASSWORD , $email_msg);
            
            $email_to       =   $STUDENT_EMAIL;
            $this->do_email($email_msg , $email_sub , $email_to);
        }

        // email notification for admin account opening by admin
        if ($task == 'new_admin_account_creation')
        {
            $admin_id       =   $param2;
            $ADMIN_PASSWORD =   $param3;
            $ADMIN_NAME     =   $this->db->get_where('admin' , array('admin_id' => $admin_id))->row()->name;
            $ADMIN_EMAIL    =   $this->db->get_where('admin' , array('admin_id' => $admin_id))->row()->email;
            $SYSTEM_URL     =   base_url();

            $email_msg      =   str_replace('[ADMIN_NAME]' , $ADMIN_NAME , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);
            $email_msg      =   str_replace('[ADMIN_EMAIL]' , $ADMIN_EMAIL , $email_msg);
            $email_msg      =   str_replace('[ADMIN_PASSWORD]' , $ADMIN_PASSWORD , $email_msg);
            
            $email_to       =   $ADMIN_EMAIL;
            $this->do_email($email_msg , $email_sub , $email_to);
        }

        // email notification for confirmation of student account signup outside adminpanel 
        if ($task == 'new_student_account_confirm')
        {
            $student_id      =   $param2;
            $STUDENT_NAME    =   $this->db->get_where('student' , array('student_id' => $student_id))->row()->name;
            $STUDENT_EMAIL   =   $this->db->get_where('student' , array('student_id' => $student_id))->row()->email;
            $SYSTEM_URL     =   base_url();

            $email_msg      =   str_replace('[STUDENT_NAME]' , $STUDENT_NAME , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);
            
            $email_to       =   $student_EMAIL;
            $this->do_email($email_msg , $email_sub , $email_to);
        }

    	// email notification for staff account opening by admin
    	if ($task == 'new_staff_account_opening')
    	{
    		$staff_id		=	$param2;
    		$STAFF_PASSWORD	=	$param3;
    		$STAFF_NAME		=	$this->db->get_where('staff' , array('staff_id' => $staff_id))->row()->name;
    		$STAFF_EMAIL	=	$this->db->get_where('staff' , array('staff_id' => $staff_id))->row()->email;
    		$SYSTEM_URL		=	base_url();

    		$email_msg		=	str_replace('[STAFF_NAME]' , $STAFF_NAME , $email_msg);
    		$email_msg		=	str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);
    		$email_msg		=	str_replace('[STAFF_EMAIL]' , $STAFF_EMAIL , $email_msg);
    		$email_msg		=	str_replace('[STAFF_PASSWORD]' , $STAFF_PASSWORD , $email_msg);
    		
    		$email_to		=	$STAFF_EMAIL;
            $this->do_email($email_msg , $email_sub , $email_to);
    	}
		
		
		 // email notification for new support ticket submission to admin
        if ($task == 'new_support_ticket_notify_admin')
        {

            $TICKET_CODE    =   $param2;
            $ADMIN_NAME     =   $this->db->get_where('admin' , array('admin_id' => 1))->row()->name;
            $SYSTEM_OPENED_TICKET_URL=    base_url().'index.php?admin/support_ticket/';

            $email_msg      =   str_replace('[TICKET_CODE]' , $TICKET_CODE , $email_msg);
            $email_msg      =   str_replace('[ADMIN_NAME]' , $ADMIN_NAME , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_OPENED_TICKET_URL]' , $SYSTEM_OPENED_TICKET_URL , $email_msg);

            $admins = $this->db->get('admin')->result_array();
            foreach($admins as $row) {
                $email_to = $row['email'];
                $this->do_email($email_msg , $email_sub , $email_to);
            }
        }

        // email notification for support ticket assign to staff
        if ($task == 'support_ticket_assign_staff')
        {

            $TICKET_CODE    =   $param2;
            $staff_id       =   $param3;
            $STAFF_NAME     =   $this->db->get_where('staff' , array('staff_id' => $staff_id))->row()->name;
            $SYSTEM_OPENED_TICKET_URL=    base_url().'index.php?staff/support_ticket/';

            $email_msg      =   str_replace('[TICKET_CODE]' , $TICKET_CODE , $email_msg);
            $email_msg      =   str_replace('[STAFF_NAME]' , $STAFF_NAME , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_OPENED_TICKET_URL]' , $SYSTEM_OPENED_TICKET_URL , $email_msg);

            $email_to       =   $this->db->get_where('staff' , array('staff_id' => $staff_id))->row()->email;
            $this->do_email($email_msg , $email_sub , $email_to);
        }
		
		
		
		 // email notification for new message notification
        if ($task == 'new_message_notification')
        {

            $message_id     =   $param2;
            $message_thread_code    =   $this->db->get_where('message' , array('message_id' => $message_id))->row()->message_thread_code;
            $message_thread_detail  =   $this->db->get_where('message_thread' , array('message_thread_code' => $message_thread_code))->row();

            $sender         =   $this->db->get_where('message' , array('message_id' => $message_id))->row()->sender;

            if ($message_thread_detail->sender == $sender)
                $reciever   =   $message_thread_detail->reciever;
            else if ($message_thread_detail->reciever == $sender)
                $reciever   =   $message_thread_detail->sender;

            $sender         =   explode('-' , $sender);
            $sender_type    =   $sender[0];
            $sender_id      =   $sender[1];
            $SENDER_NAME    =   $this->db->get_where($sender_type , array($sender_type.'_id' => $sender_id))->row()->name;
            $MESSAGE        =   $this->db->get_where('message' , array('message_id' => $message_id))->row()->message;
            $SYSTEM_URL     =   base_url();

            $email_msg      =   str_replace('[SENDER_NAME]' , $SENDER_NAME , $email_msg);
            $email_msg      =   str_replace('[MESSAGE]' , $MESSAGE , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);

            $reciever       =   explode('-' , $reciever);
            $reciever_type  =   $reciever[0];
            $reciever_id    =   $reciever[1];
            $email_to       =   $this->db->get_where($reciever_type , array($reciever_type.'_id' => $reciever_id))->row()->email;
            $this->do_email($email_msg , $email_sub , $email_to);
        }

        // email notification for rest password
        if ($task == 'password_reset_confirmation')
        {

            $account_type   =   $param2;
            $email          =   $param3;
            $NEW_PASSWORD   =   $param4;
            $NAME           =   $this->db->get_where($account_type , array('email' => $email))->row()->name;
            $SYSTEM_URL     =    base_url();

            $email_msg      =   str_replace('[NAME]' , $NAME , $email_msg);
            $email_msg      =   str_replace('[NEW_PASSWORD]' , $NEW_PASSWORD , $email_msg);
            $email_msg      =   str_replace('[SYSTEM_URL]' , $SYSTEM_URL , $email_msg);

            $email_to       =   $email;
            $this->do_email($email_msg , $email_sub , $email_to);
        }
		
		}

	function account_opening_email($account_type = '' , $email = '')
	{
		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		
		$email_msg		=	"Welcome to ".$system_name."<br />";
		$email_msg		.=	"Your account type : ".$account_type."<br />";
		$email_msg		.=	"Your login password : ".$this->db->get_where($account_type , array('email' => $email))->row()->password."<br />";
		$email_msg		.=	"Login Here : ".base_url()."<br />";
		
		$email_sub		=	"Account opening email";
		$email_to		=	$email;
		
		$this->do_email($email_msg , $email_sub , $email_to);
	}
	
	
	function password_reset_email($account_type = '' , $email = '')
	{
		$query			=	$this->db->get_where($account_type , array('email' => $email));
		if($query->num_rows() > 0)
		{
			$password	=	$query->row()->password;
			$email_msg	=	"Your account type is : ".$account_type."<br />";
			$email_msg	.=	"Your password is : ".$password."<br />";
			$email_sub	=	"Password reset request";
			$email_to	=	$email;
			$this->do_email($email_msg , $email_sub , $email_to);
			return true;
		}
		else
		{	
			return false;
		}
	}
	
	/***custom email sender****/
	function do_email($msg=NULL, $sub=NULL, $to=NULL, $from=NULL)
	{
		
		$config = array();
        $config['useragent']	= "CodeIgniter";
        $config['mailpath']		= "/usr/bin/sendmail"; // or "/usr/sbin/sendmail"
        $config['protocol']		= "smtp";
        $config['smtp_host']	= "localhost";
        $config['smtp_port']	= "25";
        $config['mailtype']		= 'html';
        $config['charset']		= 'utf-8';
        $config['newline']		= "\r\n";
        $config['wordwrap']		= TRUE;

        $this->load->library('email');

        $this->email->initialize($config);

		$system_name	=	$this->db->get_where('settings' , array('type' => 'system_name'))->row()->description;
		if($from == NULL)
			$from		=	$this->db->get_where('settings' , array('type' => 'system_email'))->row()->description;
		
		$this->email->from($from, $system_name);
		$this->email->from($from, $system_name);
		$this->email->to($to);
		$this->email->subject($sub);
		
		$msg	=	$msg."<br /><br /><br /><br /><br /><br /><br /><hr /><center><a href=\"https://optimumlinkupsoftware.com/helpdesk</a></center>";
		$this->email->message($msg);
		
		$this->email->send();
		
		//echo $this->email->print_debugger();
	}
	
	
}

