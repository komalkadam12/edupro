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

//LOCATION : application - controller - Multilanguage.php



class Multilanguage extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
		/*cash control*/
		$this->output->set_header('Last-Modified: ' . gmdate("D, d M Y H:i:s") . ' GMT');
		$this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
		$this->output->set_header('Pragma: no-cache');
		$this->output->set_header("Expires: Mon, 26 Jul 2020 05:00:00 GMT");
	}
	
	function index()
	{
	}
	
	function select_language($language = 'english')
	{
		$this->session->set_userdata('current_language', $language);
        $sql = "update settings set description='" . $language . "' where type='language'";
        $this->db->query($sql);
		redirect(base_url(), 'refresh');
	}
	
	
	
}
