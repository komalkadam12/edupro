<!-- Left navbar-header -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse slimscrollsidebar">
                <ul class="nav" id="side-menu">
                    <li class="user-pro hide-menu">
                        <?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/default.jpg';
//                                    if ($key = $this->session->userdata('login_type') == 'admin') {
//                                        $face_file = base_url() . 'uploads/' . $this->session->userdata('login_type') . '_image/1.jpg';
//                                    }
                            }
                            ?>
						
						<a href="javascript:void(0);" class="waves-effect"><img src="<?php echo base_url() . $face_file; ?>" alt="user-img" class="img-circle"> <span class="hide-menu">
								<?php 
								$account_type	=	$this->session->userdata('login_type');
								$account_id		=	$account_type.'_id';
								$name			=	$this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id) , 'name');
								echo $name;
								?>
								</span></span>
                   </a>
				   </li>
				   
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->dashboard; ?>
<?php if($eRRPermission['dashboard'] != ''):?>
				   
                    <li class="<?php if($page_name == 'dashboard')echo 'active';?>">
					<a href="<?php echo base_url();?>admin/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
				
<?php endif; ?>
			 <!------doctor----->
			 
			 
			 <li> <a href="javascript:void(0);" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-gear p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('academics');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if (    $page_name == 'enquiry_setting'||
                    $page_name == 'enquiry'||
                    $page_name == 'club'||
                    $page_name == 'circular'||
                    $page_name == 'task_manager'||
                    $page_name == 'help_link'||
                    $page_name == 'help_desk'||
                    $page_name == 'holiday'||
					$page_name == 'formcode'||
					$page_name == 'marketPlace'||
					$page_name == 'admissionFormPage'||
                    $page_name == 'todays_thought'||
                    $page_name == 'academic_syllabus')
                echo 'opened active';
            ?> ">
				
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->enquiry_setting; ?>
<?php if($eRRPermission['enquiry_setting'] != ''):?>		
				  <!-- ENQUIRY TABLE INFO -->
            <li class="<?php if ($page_name == 'enquiry_setting') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/enquiry_setting">
				<i class="fa fa-gear p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('enquiry_category'); ?></span>
                </a>
            </li>
<?php endif; ?>


	
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->enquiry; ?>
<?php if($eRRPermission['enquiry'] != ''):?>		
			 <!-- ENQUIRY TABLE INFO -->
            <li class="<?php if ($page_name == 'enquiry') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/enquiry">
				<i class="fa fa-book p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('view_enquiries'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->club; ?>
<?php if($eRRPermission['club'] != ''):?>	
				
				 <!-- CLUB -->
            <li class="<?php if ($page_name == 'club') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/club">
				<i class="fa fa-user p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('school_clubs'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->circular; ?>
<?php if($eRRPermission['circular'] != ''):?>
            <!-- CIRCULAR MANAGER -->
            <li class="<?php if ($page_name == 'circular') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/circular">
				<i class="fa fa-book p-r-10"></i>
                 <span class="hide-menu"> <?php echo get_phrase('manage_circular'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->task_manager; ?>
<?php if($eRRPermission['task_manager'] != ''):?>

            <!-- TASK MANAGER -->
            <li class="<?php if ($page_name == 'task_manager') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/task_manager">
				<i class="fa fa-book p-r-10"></i>
                  <span class="hide-menu"> <?php echo get_phrase('task_manager'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->holiday; ?>
<?php if($eRRPermission['holiday'] != ''):?>
			 <!-- HOLIDAYS -->
            <li class="<?php if ($page_name == 'holiday') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/holiday">
				<i class="fa fa-calendar p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('manage_holiday'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->todays_thought; ?>
<?php if($eRRPermission['todays_thought'] != ''):?>

            <!-- TODAYS THOUGHT -->
            <li class="<?php if ($page_name == 'todays_thought') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/todays_thought">
				<i class="fa fa-book p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('manage_moraltalk'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->academic_syllabus; ?>
<?php if($eRRPermission['academic_syllabus'] != ''):?>
			
			 <!-- ACADEMIC SYLLABUS  -->
            <li class="<?php if ($page_name == 'academic_syllabus') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/academic_syllabus">
				<i class="fa fa-book p-r-10"></i>
                     <span class="hide-plus"><?php echo get_phrase('syllabus'); ?></span>
                </a>
            </li>
<?php endif; ?>
			

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->help_link; ?>
<?php if($eRRPermission['help_link'] != ''):?>			
            <!-- HELP LINKS -->
            <li class="<?php if ($page_name == 'help_link') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/help_link">
				<i class="fa fa-external-link p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('manage_helplink'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->help_desk; ?>
<?php if($eRRPermission['help_desk'] != ''):?>	
            <!-- HELP DESK -->
            <li class="<?php if ($page_name == 'help_desk') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/help_desk">
				<i class="fa fa-book p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('manage_helpdesk'); ?></span>
                </a>
            </li>
<?php endif; ?>

 <!-- FORM CODE -->
            <li class="<?php if ($page_name == 'formcode') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/formcode">
				<i class="fa fa-plus p-r-10"></i>
                <span class="hide-menu"><?php echo get_phrase('Registration Code'); ?></span>
                </a>
            </li>
			 <!-- ADMISSION FORM PAGE -->
            <li class="<?php if ($page_name == 'admissionFormPage') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/admissionFormPage">
				<i class="fa fa-plus p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('approve_student'); ?></span>
                </a>
            </li>
			
			<!-- ADMISSION FORM PAGE -->
            <li class="<?php if ($page_name == 'checker') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/checker">
				<i class="fa fa-plus p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('Student Result PIN'); ?></span>
                </a>
            </li>
			
			<!-- ADMISSION FORM PAGE -->
            <li class="<?php if ($page_name == 'marketPlace') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/marketPlace">
				<i class="fa fa-plus p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('Market Place'); ?></span>
                </a>
            </li>
     
                 </ul>
                </li>
	
	<!------MANAGE STAFF ONE----->	

		<li> <a href="javascript:void(0);" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_staff');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'teacher' ||
                    $page_name == 'librarian'|| $page_name == 'hrm'||
                    $page_name == 'accountant'||
                    $page_name == 'hostel')
                echo 'opened active';
            ?> ">


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->teacher; ?>
<?php if($eRRPermission['teacher'] != ''):?>
						
           <!-- TEACHER -->
            <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/teacher">
				<i class="fa fa-female p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('teachers'); ?></span>
                </a>
            </li>
<?php endif; ?>
					
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->librarian; ?>
<?php if($eRRPermission['librarian'] != ''):?>
               <!-- LIBRARIAN -->
            <li class="<?php if ($page_name == 'librarian') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/librarian">
				<i class="fa fa-user p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('librarians'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->accountant; ?>
<?php if($eRRPermission['accountant'] != ''):?>
			 <!-- ACCOUNTANT -->
            <li class="<?php if ($page_name == 'accountant') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/accountant">
				<i class="fa fa-paypal p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('accountants'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->hostel; ?>
<?php if($eRRPermission['hostel'] != ''):?>

            <!-- HOSTEL MANAGER -->
            <li class="<?php if ($page_name == 'hostel') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/hostel">
				<i class="fa fa-users"></i>
                      <span class="hide-menu"><?php echo get_phrase('hostel_manager'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->hrm; ?>
<?php if($eRRPermission['hrm'] != ''):?>
			
			<!-- HOSTEL MANAGER -->
            <li class="<?php if ($page_name == 'hrm') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/hrm">
				<i class="fa fa-users"></i>
                      <span class="hide-menu"><?php echo get_phrase('human_resources'); ?></span>
                </a>
            </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
		 <!------MANAGE STUDENT PAGE----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_students');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'new_student' ||
                    $page_name == 'student_class' ||
                    $page_name == 'student_information' ||
                    $page_name == 'view_student' ||
                    $page_name == 'student_promotion')
                echo 'opened active has-sub';
            ?> ">


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->new_student; ?>
<?php if($eRRPermission['new_student'] != ''):?>
						
                 			 <!-- STUDENT ADMISSION -->
                    <li class="<?php if ($page_name == 'new_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/new_student">
						<i class="fa fa-plus p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('admission_form'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->student_information; ?>
<?php if($eRRPermission['student_information'] != ''):?>
					
					 <li class="<?php if ($page_name == 'student_information' || $page_name == 'student_information' || $page_name == 'view_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_information">
						<i class="fa fa-list p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('list_students'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->student_promotion; ?>
<?php if($eRRPermission['student_promotion'] != ''):?>
                    <!-- STUDENT PROMOTION -->
                    <li class="<?php if ($page_name == 'student_promotion') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_promotion">
						<i class="fa fa-space-shuttle p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('promote_students'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>
					
					
        <!------department----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-hospital-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_attendance');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'manage_attendance' || $page_name == 'staff_attendance' ||
                    $page_name == 'attendance_report')
                echo 'opened active';
            ?>">
						
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_attendance; ?>
<?php if($eRRPermission['manage_attendance'] != ''):?>
					<li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/manage_attendance/<?php echo date("d/m/Y"); ?>">
						<i class="fa fa-calendar p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('mark_attendance'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->attendance_report; ?>
<?php if($eRRPermission['attendance_report'] != ''):?>
                    <li class="<?php if ($page_name == 'attendance_report') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/attendance_report">
						<i class="fa fa-bar-chart-o p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('view_attendance'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->staff_attendance; ?>
<?php if($eRRPermission['staff_attendance'] != ''):?>
					
					<li class="<?php if ($page_name == 'staff_attendance') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/staff_attendance">
						<i class="fa fa-bar-chart-o p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('staff_attendance'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
				
                 </ul>
                </li>
				
				
				  <!------medicine page----->
		   <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-envelope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('support_ticket');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'support_ticket_create' || $page_name == 'support_ticket' ||
                    $page_name == 'support_ticket_view')
                echo 'opened active';
            ?>">
						
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->support_ticket_view; ?>
<?php if($eRRPermission['support_ticket_view'] != ''):?>						
				<li class="<?php if ($page_name == 'support_ticket') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/support_ticket">
				<i class="fa fa-calendar p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('list_tickets'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->support_ticket_create; ?>
<?php if($eRRPermission['support_ticket_create'] != ''):?>	

            <!-- MESSAGE -->
            <li class="<?php if ($page_name == 'support_ticket_create') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/support_ticket_create">
				<i class="fa fa-envelope p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('new_ticket'); ?></span>
                </a>
            </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
				
				
				<!------shedule information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-download p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('download_page');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'assignment' ||
                    $page_name == 'study_material')
                echo 'opened active';
            ?> ">
						
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->assignment; ?>
<?php if($eRRPermission['assignment'] != ''):?>	             
			 <!-- AASIGNMENTS -->
            <li class="<?php if ($page_name == 'assignment') echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>admin/assignment">
				<i class="fa fa-list p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('assignments'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->study_material; ?>
<?php if($eRRPermission['study_material'] != ''):?>	  
          <!-- STUDY MATERIALS -->
            	<li class="<?php if ($page_name == 'study_material') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/study_material">
				<i class="fa fa-list p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('study_materials'); ?></span>
                </a>
            </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->parent; ?>
<?php if($eRRPermission['parent'] != ''):?>						
				 <!-- PARENTS -->
        <li class="<?php if($page_name == 'parent')echo 'active';?>">
					<a href="<?php echo base_url();?>admin/parent" >
					<i class="fa fa-user p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_parents');?></span>
				    </a>	
				    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->alumni; ?>
<?php if($eRRPermission['alumni'] != ''):?>	

            <!-- ALUMNI -->
			<li class="<?php if($page_name == 'alumni')echo 'active';?>">
					<a href="<?php echo base_url();?>admin/alumni" >
					<i class="fa fa-user p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_alumni');?></span>
				    </a>	
				    </li>
<?php endif; ?>


<!------MANAGE LOAN ----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_loan');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'loan_applicant' ||
                    $page_name == 'loan_approval')
                echo 'opened active';
            ?>">
			
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->loan_applicant; ?>
<?php if($eRRPermission['loan_applicant'] != ''):?>	
						
                 <li class="<?php if ($page_name == 'loan_applicant') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/loan_applicant">
						<i class="fa fa-plus p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('loan_applicant'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->loan_approval; ?>
<?php if($eRRPermission['loan_approval'] != ''):?>	
                    <li class="<?php if ($page_name == 'loan_approval') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/loan_approval">
						<i class="fa fa-check p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('loan_approval'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
				
				<!------manage beds  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('class_information');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'class' ||
                    $page_name == 'section' ||
                    $page_name == 'class_routine')
                echo 'opened active';
            ?>">


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->class; ?>
<?php if($eRRPermission['class'] != ''):?>
						
						 <li class="<?php if ($page_name == 'class') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/classes/">
						<i class="fa fa-university p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('manage_classes'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->section; ?>
<?php if($eRRPermission['section'] != ''):?>
                    <li class="<?php if ($page_name == 'section') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/section">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('manage_sections'); ?></span>
                        </a>
                    </li>	
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->class_routine; ?>
<?php if($eRRPermission['class_routine'] != ''):?>
					
					<li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('time_table');?><span class="fa arrow"></span></span></a>
                                <ul class=" nav nav-second-level">
                <?php
                $classes = $this->db->get('class')->result_array();
                foreach ($classes as $row):
                    ?>
                    <li class="<?php if ($page_name == 'class_routine_view' && $class_id == $row['class_id']) echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/class_routine_view/<?php echo $row['class_id']; ?>">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('class'); ?> <?php echo $row['name']; ?></span>
                        </a>
                    </li>
                <?php endforeach; ?>
            		</ul>
                     </li>
				 
                 </ul>
                </li>
<?php endif; ?>
				

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->subject; ?>
<?php if($eRRPermission['subject'] != ''):?>
<!-- SUBJECT -->
				  <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_subjects');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'subject')
                echo 'opened active';
            ?>">
			<?php
                    $classes = $this->db->get('class')->result_array();
                    foreach ($classes as $row):
                        ?>
						 <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active'; ?>">
                            <a href="<?php echo base_url(); ?>admin/subject/<?php echo $row['class_id']; ?>">
							<i class="fa fa-book p-r-10"></i>
                                 <span class="hide-menu"><?php echo get_phrase('class'); ?> <?php echo $row['name']; ?></span>
                            </a>
                        </li>
					 <?php endforeach; ?>
					
               
				 
                 </ul>
                </li>
<?php endif; ?>  		
			
			
			 <!------pharmacist----->
		 
		 
		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-edit p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_CBT');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'exam_list' ||
                    $page_name == 'exam_add' ||
                    $page_name == 'exam_view' ||
                    $page_name == 'exam_result_list')
                echo 'opened active';
            ?> ">




<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'cbt'))->row()->description; ?>
<?php if($eRRPermission['cbt'] == 'b'):?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->exam_add; ?>
<?php if($eRRPermission['exam_add'] != ''):?>
	
                 	<li class="<?php if ($page_name == 'exam_add') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/exam_add">
						<i class="fa fa-plus p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('add_questions'); ?></span>
                        </a>
                    </li> 
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->exam_list; ?>
<?php if($eRRPermission['exam_list'] != ''):?>  

                    <li class="<?php if ($page_name == 'exam_list' || $page_name == 'exam_view') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/exam_list">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('list_questions'); ?></span>
                        </a>
                    </li>
<?php endif; ?>



<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->exam_view; ?>
<?php if($eRRPermission['exam_view'] != ''):?> 

                    <li class="<?php if ($page_name == 'exam_result_list') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/exam_result_list">
						<i class="fa fa-list p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('view_result'); ?></span>
                        </a>
                    </li> 
<?php endif; ?> 
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'cbt'))->row()->description; ?>
<?php if($eRRPermission['cbt'] == 'a'):?>

<li class="<?php if ($page_name == 'add_online_exam') echo 'active'; ?> ">
              <a href="<?php echo site_url($account_type.'/create_online_exam'); ?>">
			  <i class="fa fa-list p-r-10"></i>
                  <span class="hide-menu"><?php echo get_phrase('add_exams'); ?></span>
              </a>
            </li>
			
			 <li class="<?php if ($page_name == 'manage_online_exam' || $page_name == 'edit_online_exam' || $page_name == 'manage_online_exam_question' || $page_name == 'view_online_exam_results') echo 'active'; ?> ">
              <a href="<?php echo site_url($account_type.'/manage_online_exam'); ?>">
			  <i class="fa fa-plus p-r-10"></i>
                  <span class="hide-menu"><?php echo get_phrase('manage_exams'); ?></span>
              </a>
            </li>


<?php endif; ?> 
                 </ul>
                </li>




		 <!------pharmacist----->
		 
		 
		 <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-medkit p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_exams');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'submit_exam' ||
                    $page_name == 'grade' ||
                    $page_name == 'examquestion')
                echo 'opened active';
            ?>">
					
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->examquestion; ?>
<?php if($eRRPermission['examquestion'] != ''):?> 
	
                 	<li class="<?php if ($page_name == 'examquestion') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/examquestion">
						<i class="fa fa-plus p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('question_paper'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->submit_exam; ?>
<?php if($eRRPermission['submit_exam'] != ''):?> 

                    <li class="<?php if ($page_name == 'submit_exam') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/submit_exam">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('list_questions'); ?></span>
                        </a>
                    </li>
					
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->grade; ?>
<?php if($eRRPermission['grade'] != ''):?> 

                    <li class="<?php if ($page_name == 'grade') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/grade">
						<i class="fa fa-list p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('exam_grades'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 
     
                 </ul>
                </li>

		  <!------accountant----->
		   <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('report_cards');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'marks' ||
                    $page_name == 'exam_marks_sms'||
                    $page_name == 'tabulation_sheet')
                echo 'opened active';
            ?>">

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->marks; ?>
<?php if($eRRPermission['marks'] != ''):?> 
	
                 	<li class="<?php if ($page_name == 'marks') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/marks">
						<i class="fa fa-plus p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('class_teacher'); ?></span>
                        </a>
                    </li>
			
					<li class="<?php if ($page_name == 'student_marksheet_subject') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_marksheet_subject">
						<i class="fa fa-plus p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('subject_teacher'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->exam_marks_sms; ?>
<?php if($eRRPermission['exam_marks_sms'] != ''):?> 
                    <li class="<?php if ($page_name == 'exam_marks_sms') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/exam_marks_sms">
						<i class="fa fa-envelope p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('scores_by_sms'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->tabulation_sheet; ?>
<?php if($eRRPermission['tabulation_sheet'] != ''):?> 

                    <li class="<?php if ($page_name == 'tabulation_sheet') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/tabulation_sheet">
						<i class="fa fa-calendar p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('generate_report'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 
     
                 </ul>
                </li>
					
					<!------ACCOUNTING PROCESS----->
					
					<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('fee_collection');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'income' ||
                    $page_name == 'student_payment'||
					 $page_name == 'view_invoice_details'||
					  $page_name == 'invoice_add'||
					  $page_name == 'list_invoice'||
                    $page_name == 'invoice')
                echo 'opened active';
            ?>">


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->student_payment; ?>
<?php if($eRRPermission['student_payment'] != ''):?> 		
                 <li class="<?php if ($page_name == 'student_payment') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/student_payment">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('collect_fees'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->income; ?>
<?php if($eRRPermission['income'] != ''):?> 

                    <li class="<?php if ($page_name == 'income') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/income">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('fees_payments'); ?></span>
                        </a>
                    </li>
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->invoice; ?>
<?php if($eRRPermission['invoice'] != ''):?> 
					
					 <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/invoice">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_invoice'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->invoice_add; ?>
<?php if($eRRPermission['invoice_add'] != ''):?>  
					
					<li class="<?php if ($page_name == 'invoice_add') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/invoice_add">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"> <?php echo get_phrase('student_ledger'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->list_invoice; ?>
<?php if($eRRPermission['list_invoice'] != ''):?>  
					
					<li class="<?php if ($page_name == 'list_invoice' || $page_name == 'view_invoice_details') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/list_invoice">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"> <?php echo get_phrase('list_ledger'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
	<!------HUMAN RESOURCES ----->
					
					<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-credit-card p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('human_resources');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'department' ||
                    $page_name == 'vacancy'|| $page_name == 'award'||
					 $page_name == 'application'||
					  $page_name == 'leave'||
					  $page_name == 'create_payslip'||
                    $page_name == 'payroll_list')
                echo 'opened active';
            ?>">


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->department; ?>
<?php if($eRRPermission['department'] != ''):?>  	
                 	<li class="<?php if ($page_name == 'department') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/department/list">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('department'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
					


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->recruitment; ?>
<?php if($eRRPermission['recruitment'] != ''):?>  
					
<li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('recruitment');?><span class="fa arrow"></span></span></a>
                                <ul class=" nav nav-second-level">
              
                    <li class="<?php if ($page_name == 'vacancy') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/vacancy/">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('vacancies'); ?></span>
                        </a>
                    </li>
					
					 <li class="<?php if ($page_name == 'application') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/application/">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('applications'); ?></span>
                        </a>
                    </li>
                
            		</ul>
                     </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->leave; ?>
<?php if($eRRPermission['leave'] != ''):?>  
					
                    <li class="<?php if ($page_name == 'leave') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/leave">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('leave'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
					

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->payroll; ?>
<?php if($eRRPermission['payroll'] != ''):?> 

<li> <a href="#" class="waves-effect"<i data-icon="&#xe006;"></i> <span class="hide-menu"><i class="fa fa-university p-r-10"></i><?php echo get_phrase('payroll');?><span class="fa arrow"></span></span></a>
                                <ul class=" nav nav-second-level">
              
                    <li class="<?php if ($page_name == 'create_payslip') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/payroll/">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('add_payslip'); ?></span>
                        </a>
                    </li>
					
					 <li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?>">
                        <a href="<?php echo base_url(); ?>admin/payroll_list/">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('list_payroll'); ?></span>
                        </a>
                    </li>
                
            		</ul>
                     </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->award; ?>
<?php if($eRRPermission['award'] != ''):?> 
					
					 <li class="<?php if ($page_name == 'award') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/award">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_award'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

                 </ul>
                </li>
				
				
				<!------MANAGE EXPENSES ----->
					
					<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-fax p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('expenses');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'expense' ||
                    $page_name == 'expense_category' )
                echo 'opened active';
            ?> ">
				
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->expense; ?>
<?php if($eRRPermission['expense'] != ''):?> 		
                 <li class="<?php if ($page_name == 'expense') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/expense">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('expense'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->expense_category; ?>
<?php if($eRRPermission['expense_category'] != ''):?> 
                    <li class="<?php if ($page_name == 'expense_category') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/expense_category">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('expense_category'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				<!------manage blood  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-book p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('manage_library');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'book' ||
                    $page_name == 'publisher' ||
					$page_name == 'search_student' ||
					$page_name == 'book_category' || $page_name == 'request_book' ||
                    $page_name == 'author' )
                echo 'opened active';
            ?>">


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->book; ?>
<?php if($eRRPermission['book'] != ''):?> 
		
                 <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/book">
				<i class="fa fa-plus p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('master_data'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->publisher; ?>
<?php if($eRRPermission['publisher'] != ''):?> 
                    <li class="<?php if ($page_name == 'publisher') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/publisher">
						<i class="fa fa-user p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('book_publisher'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->book_category; ?>
<?php if($eRRPermission['book_category'] != ''):?> 
					
					<li class="<?php if ($page_name == 'book_category') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/book_category">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('book_category'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->author; ?>
<?php if($eRRPermission['author'] != ''):?> 
					
					<li class="<?php if ($page_name == 'author') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/author">
						<i class="fa fa-users p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('book_author'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->search_student; ?>
<?php if($eRRPermission['search_student'] != ''):?> 

					<li class="<?php if ($page_name == 'search_student') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/search_student">
						<i class="fa fa-search p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('register_student'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->request_book; ?>
<?php if($eRRPermission['request_book'] != ''):?> 
					
					<li class="<?php if ($page_name == 'request_book') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/request_book">
				<i class="fa fa-plus p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('request_book'); ?></span>
                </a>
            </li>
<?php endif; ?>
                 </ul>
                </li>
				
				
				
				<!------manage blood  information----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-university p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('hostel_information');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'dormitory' ||
                    $page_name == 'hostel_category' ||
					$page_name == 'room_type' ||
                    $page_name == 'hostel_room' )
                echo 'opened active';
            ?>">

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->dormitory; ?>
<?php if($eRRPermission['dormitory'] != ''):?> 

				<li class="<?php if ($page_name == 'dormitory') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/dormitory">
				<i class="fa fa-university p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('manage_hostel'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->hostel_category; ?>
<?php if($eRRPermission['hostel_category'] != ''):?>
                    <li class="<?php if ($page_name == 'hostel_category') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/hostel_category">
						<i class="fa fa-list p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('hostel_category'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->room_type; ?>
<?php if($eRRPermission['room_type'] != ''):?>
					
					<li class="<?php if ($page_name == 'room_type') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/room_type">
						<i class="fa fa-university p-r-10"></i>
                           <span class="hide-menu"><?php echo get_phrase('room_type'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->hostel_room; ?>
<?php if($eRRPermission['hostel_room'] != ''):?>
					
					<li class="<?php if ($page_name == 'hostel_room') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/hostel_room">
						<i class="fa fa-university p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('hostel_room'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
				  <!------medicine page----->
		   <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-envelope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('communications');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'noticeboard' ||
                    $page_name == 'message')
                echo 'opened active';
            ?>">

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->noticeboard; ?>
<?php if($eRRPermission['noticeboard'] != ''):?>
		
                <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/noticeboard">
				<i class="fa fa-calendar p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('manage_events'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->message; ?>
<?php if($eRRPermission['message'] != ''):?>
           <!-- MESSAGE -->
            <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/message">
				<i class="fa fa-envelope p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('private_messages'); ?></span>
                </a>
            </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
				
				<!------communication----->
					<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-car p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('transportation');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'transport' ||
                    $page_name == 'transport_route' ||
                    $page_name == 'vehicle' )
                echo 'opened active';
            ?>">
				
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->transport; ?>
<?php if($eRRPermission['transport'] != ''):?>
		
                <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?>admin/transport/">
				<i class="fa fa-car p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('transports'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->transport_route; ?>
<?php if($eRRPermission['transport_route'] != ''):?>
                    <li class="<?php if ($page_name == 'transport_route') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/transport_route/">
						<i class="fa fa-ellipsis-h p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('transport_route'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->vehicle; ?>
<?php if($eRRPermission['vehicle'] != ''):?>
					
					 <li class="<?php if ($page_name == 'vehicle') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/vehicle">
						<i class="fa fa-car p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('manage_vehicle'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>

		
				
				
				 <!------MONITOR HOSPIRAL----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-gears p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('system_settings');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'system_settings' ||
                    $page_name == 'email_settings' ||
                    $page_name == 'backup_restore' ||
                    $page_name == 'smtpemailsettings' ||
                    $page_name == 'manage_language' ||
                    $page_name == 'sms_settings')
                echo 'opened active';
            ?>">  

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->system_settings; ?>
<?php if($eRRPermission['system_settings'] != ''):?>
 
				 <li class="<?php if ($page_name == 'system_settings') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/system_settings">
						<i class="fa fa-gear p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('general_settings'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
					 <!--<li class="<?php if ($page_name == 'actions') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/actions">
						<i class="fa fa-cubes p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_sidebar'); ?></span>
                        </a>
                    </li>-->
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->sms_settings; ?>
<?php if($eRRPermission['sms_settings'] != ''):?>

                    <li class="<?php if ($page_name == 'sms_settings') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/sms_settings">
						<i class="fa fa-gear p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_sms_api'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->backup_restore; ?>
<?php if($eRRPermission['backup_restore'] != ''):?>
					 <li class="<?php if ($page_name == 'backup_restore') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/backup_restore">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_database'); ?></span>
                        </a>
                    </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->email_settings; ?>
<?php if($eRRPermission['email_settings'] != ''):?>
					 <li class="<?php if ($page_name == 'email_settings') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/email_settings">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('email_settings'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_language; ?>
<?php if($eRRPermission['manage_language'] != ''):?>
                    <li class="<?php if ($page_name == 'manage_language') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/manage_language">
						<i class="fa fa-language p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_language'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->smtpemailsettings; ?>
<?php if($eRRPermission['smtpemailsettings'] != ''):?>
					
					 <li class="<?php if ($page_name == 'smtpemailsettings') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/smtpemailsettings">
						<i class="fa fa-envelope p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('SMTP_settings'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
     
                 </ul>
                </li>
				
				
				 <!------MONITOR HOSPIRAL----->

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-bar-chart-o p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('generate_reports');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-leve">  
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->studentReport; ?>
<?php if($eRRPermission['studentReport'] != ''):?>	 
				<li class="<?php if (isset($report_type) && $report_type == 'studentReport') echo 'active';?>">
                        <a href="<?php echo base_url(); ?>admin/report/studentReport">
						<i class="fa fa-credit-card p-r-10"></i> 
                           <span class="hide-menu"><?php echo get_phrase('student_payments'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->expenseReport; ?>
<?php if($eRRPermission['expenseReport'] != ''):?>	
					
						<li class="<?php if (isset($report_type) && $report_type == 'expenseReport') echo 'active';?>">
                       <a href="<?php echo base_url(); ?>admin/report/expenseReport">
						<i class="fa fa-credit-card p-r-10"></i> 
                           <span class="hide-menu"><?php echo get_phrase('expense_reports'); ?></span>
                        </a>
                    </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->incomeExpense; ?>
<?php if($eRRPermission['incomeExpense'] != ''):?>	
					
					<li class="<?php if (isset($report_type) && $report_type == 'incomeExpense') echo 'active';?>">
                    <a href="<?php echo base_url(); ?>admin/report/incomeExpense">
                        <i class="fa fa-credit-card p-r-10"></i> 
                        <span class="hide-menu"> <?php echo get_phrase('income_expense'); ?></span>
                    </a>
                </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->searchStudent; ?>
<?php if($eRRPermission['searchStudent'] != ''):?>	
			
				<li class="<?php if ($page_name == 'searchStudent') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/searchStudent">
						<i class="fa fa-users p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('student_reports'); ?></span>
                        </a>
                    </li>
<?php endif; ?>
					
	
	<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'staffb'))->row()->description; ?>
	<?php if($eRRPermission['staffb'] != ''):?>

                    <li class="<?php if ($page_name == 'documentation') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/documentation">
						<i class="fa fa-file p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('documentation'); ?></span>
                        </a>
                    </li>
		<?php endif; ?>	

     
                 </ul>
                </li>



 <!-----FRONT END SETTINGS ----->
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->front_end_settings; ?>
<?php if($eRRPermission['front_end_settings'] != ''):?>	

		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-gears p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('front_end_settings');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'banar' ||
                    $page_name == 'front_end' ||
                    $page_name == 'testimony' ||
                    $page_name == 'gallery' ||
                    $page_name == 'news')
                echo 'opened active';
            ?>">  
				 
				 <li class="<?php if ($page_name == 'banar') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/banar">
						<i class="fa fa-plus p-r-10"></i>
                            <span class="hide-menu"><?php echo get_phrase('manage_banners'); ?></span>
                        </a>
                    </li>

                    <li class="<?php if ($page_name == 'front_end') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/front_end">
						<i class="fa fa-list p-r-10"></i>
                             <span class="hide-plus"><?php echo get_phrase('website_info'); ?></span>
                        </a>
                    </li>
					
					<li class="<?php if ($page_name == 'gallery') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/gallery">
						<i class="fa fa-plus p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('manage_gallery'); ?></span>
                        </a>
                    </li>

                    <li class="<?php if ($page_name == 'news') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/news">
						<i class="fa fa-bell-o p-r-10"></i>
                             <span class="hide-menu"><?php echo get_phrase('news_settings'); ?></span>
                        </a>
                    </li>
					
					<li class="<?php if ($page_name == 'testimony') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>admin/testimony">
						<i class="fa fa-bell-o p-r-10"></i>
                             <span class="hide-plus"><?php echo get_phrase('testimonies'); ?></span>
                        </a>
                    </li>

     
                 </ul>
                </li>
<?php endif; ?>	
				
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->role_managements; ?>
<?php if($eRRPermission['role_managements'] != ''):?>	
<!------ROLE MANGEMENT AND ADD NEW ADMIN ----->
 <?php //if ($admin_info['level'] == 1): ?>
		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-cubes p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('role_managements');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
                if ($page_name == 'admin_list' || $page_name == 'studentErrPermission' || $page_name == 'studentList' 
					|| $page_name == 'errPermissionteacher' || $page_name == 'Permissionteacher' || $page_name == 'admin_add') echo 'opened active'; ?>">  
				 
				 <li class="<?php if ($page_name == 'admin_list') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/admin_list">
							<i class="fa fa-list p-r-10"></i>
                                 <span class="hide-menu"><?php echo get_phrase('admin_list'); ?></span>
                            </a>
                        </li>

                        <li class="<?php if ($page_name == 'admin_add') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/admin_add">
							<i class="fa fa-plus p-r-10"></i>
                                 <span class="hide-menu"><?php echo get_phrase('new_admin'); ?></span>
                            </a>
                        </li>
						
						 <li class="<?php if ($page_name == 'studentList' || $page_name == 'studentErrPermission') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/studentList">
							<i class="fa fa-list p-r-10"></i>
                                 <span class="hide-menu"><?php echo get_phrase('list_students'); ?></span>
                            </a>
                        </li>
						
						 <li class="<?php if ($page_name == 'permissionTeacher' || $page_name == 'errPermissionteacher') echo 'active'; ?> ">
                            <a href="<?php echo base_url(); ?>admin/permissionTeacher">
							<i class="fa fa-list p-r-10"></i>
                                 <span class="hide-menu"><?php echo get_phrase('list_teachers'); ?></span>
                            </a>
                        </li>
     
                 </ul>
                </li>
            <?php // endif; ?>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->manage_profile; ?>
<?php if($eRRPermission['manage_profile'] != ''):?>	

  <!------profile----->
		<li class="<?php if($page_name == 'manage_profile')echo 'active';?>">
			<span class="glow"></span>
				<a href="<?php echo base_url();?>admin/manage_profile" >
					<i class=" fa fa-laptop p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('manage_profile');?></span>
				</a>
		</li>
<?php endif; ?>
					
                  
                </ul>
            </div>
        </div>