
<!-- Left navbar-header -->
        <div id="sidebar-menu" class="navbar-default sidebar" role="navigation">
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
				   
<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->dashboard; ?>
<?php if($eRRPermission['dashboard'] != ''):?>
				   
                    <li class="<?php if($page_name == 'dashboard')echo 'active';?>">
					<a href="<?php echo base_url();?><?php echo $account_type; ?>/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>

<?php endif; ?>
					


<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-calendar p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('academics');?><span class="fa arrow"></span></span></a>
		
             <ul class=" nav nav-second-level<?php if ($page_name == 'assignment' || $page_name == 'book' || $page_name == 'examquestion' || 
				$page_name == 'academic_syllabus' || $page_name == 'study_material') echo 'opened active'; ?>">
						
        
<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->study_material; ?>
<?php if($eRRPermission['study_material'] != ''):?>		
				
				 <!-- STUDY MATERIAL  -->
        <li class="<?php if($page_name == 'study_material')echo 'active';?>">
					 <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/study_material">
					<i class="fa fa-file p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('study_material');?></span>
				    </a>	
		</li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->assignment; ?>
<?php if($eRRPermission['assignment'] != ''):?>						
			 <!-- ASSIGNMENT  -->
            <li class="<?php if ($page_name == 'assignment') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/assignment">
                     <i class="fa fa-plus p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('assignments'); ?></span>
                </a>
            </li>
<?php endif; ?>



<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->book; ?>
<?php if($eRRPermission['book'] != ''):?>
			
			 <!-- BOOK -->
            <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/book">
                     <i class="fa fa-list p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_library'); ?></span>
                </a>
            </li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->examquestion; ?>
<?php if($eRRPermission['examquestion'] != ''):?>
			
			 <!-- EXAM QUESTION T -->
            <li class="<?php if ($page_name == 'examquestion') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/examquestion">
                     <i class="fa fa-plus p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('exam_questions'); ?></span>
                </a>
            </li>
<?php endif; ?>

<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->academic_syllabus; ?>
<?php if($eRRPermission['academic_syllabus'] != ''):?>			
			 <!-- ACADEMIC SYLLABUS -->
            <li class="<?php if ($page_name == 'academic_syllabus') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/academic_syllabus">
                     <i class="fa fa-download p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_syllabus'); ?></span>
                </a>
            </li>
<?php endif; ?>

			
                 </ul>
                </li>
				
					
<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->view_users; ?>
<?php if($eRRPermission['view_users'] != ''):?>					
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_users');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'teacher' || $page_name == 'student_information') echo 'opened active';?>">
						
                 <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/teacher_list">
				<i class="fa fa-female p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('view_teacher'); ?></span>
                </a>
            	</li>
				
				 <li class="<?php if ($page_name == 'student_information') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/student_information">
				<i class="fa fa-female p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('view_students'); ?></span>
                </a>
            	</li>
				
                 </ul>
                </li>
<?php endif; ?>			
				

<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->time_table; ?>
<?php if($eRRPermission['time_table'] != ''):?>	
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-list p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('time_table');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'class_routine') echo 'opened active';?>">
						
              <?php $classes = $this->db->get_where('class', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
				foreach ($classes as $row):
   					 ?>
			  <li class="<?php if ($page_name == 'class_routine' && $class_id == $row['class_id']) echo 'active'; ?>">
                <a href="<?php echo base_url(); ?>teacher/class_routine/<?php echo $row['class_id']; ?>">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('class'); ?> :&nbsp;<?php echo $row['name']; ?></span>
                </a>
            	</li>
				<?php endforeach; ?>
                 </ul>
                </li>
<?php endif; ?>	


<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->marksheeta; ?>
<?php if($eRRPermission['marksheeta'] != ''):?>	
				
				
			<?php $role = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->role; ?>
			<?php if($role['role'] == '1'):?>
			 <!-- Exam marks -->
            <li class="<?php if ($page_name == 'student_marksheet') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/marks/">
                    <i class="fa fa-plus p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('student_marksheet'); ?></span>
                </a>
            </li>
			<?php endif; ?>
			
			<?php $role = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->role; ?>
			<?php if($role['role'] == '2'):?>
			 <!-- Exam marks -->
            <li class="<?php if ($page_name == 'student_marksheet_subject') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/student_marksheet_subject/">
                    <i class="fa fa-plus p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('student_marksheet'); ?></span>
                </a>
            </li>
			<?php endif; ?>
<?php endif; ?>	
				


<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->loans; ?>
<?php if($eRRPermission['loans'] != ''):?>	
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-credit-card p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('loans');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'loan_approval' || $page_name == 'loan_applicant') echo 'opened active';?>">
						
                 <li class="<?php if ($page_name == 'loan_applicant') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/loan_applicant">
				<i class="fa fa-plus p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('apply_loan'); ?></span>
                </a>
            	</li>
				
				 <li class="<?php if ($page_name == 'loan_approval') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/loan_approval/<?php echo $this->session->userdata('login_user_id'); ?>">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('approval_status'); ?></span>
                </a>
            	</li>
				
                 </ul>
                </li>
<?php endif; ?>	





<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-credit-card p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('human_resources');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            		if ($page_name == 'leave' || $page_name == 'loan_applicant') echo 'opened active';?>">
					
					
<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->leave; ?>
<?php if($eRRPermission['leave'] != ''):?>	
						
                 <li class="<?php if ($page_name == 'leave') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/leave">
				<i class="fa fa-plus p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('manage_leave'); ?></span>
                </a>
            	</li>
<?php endif; ?>	

<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->payroll; ?>
<?php if($eRRPermission['payroll'] != ''):?>
				
				 <li class="<?php if ($page_name == 'payroll_list') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/payroll_list/">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('payroll_list'); ?></span>
                </a>
            	</li>
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->award; ?>
<?php if($eRRPermission['award'] != ''):?>
				
				 <li class="<?php if ($page_name == 'award') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/award/">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('view_award'); ?></span>
                </a>
            	</li>
<?php endif; ?>

				
                 </ul>
                </li>



<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->staff_attendance; ?>
<?php if($eRRPermission['staff_attendance'] != ''):?>	
				
				 <!-- STAFF ATTENDANCE -->
            <li class="<?php if ($page_name == 'staff_attendance') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/staff_attendance/<?php echo $this->session->userdata('login_user_id'); ?>">
                    <i class="fa fa-camera p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('staff_attendance'); ?></span>
                </a>
            </li>
<?php endif; ?>
				
				
<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->subject; ?>
<?php if($eRRPermission['subject'] != ''):?>
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-list p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('all_subjects');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'subject') echo 'opened active';?>">
						
              <?php $classes = $this->db->get_where('class', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
					foreach ($classes as $row):
   					 ?>
			  <li class="<?php if ($page_name == 'subject' && $class_id == $row['class_id']) echo 'active'; ?>">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/subject/<?php echo $row['class_id']; ?>">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('class'); ?> :&nbsp;<?php echo $row['name']; ?></span>
                </a>
            	</li>
				<?php endforeach; ?>
                 </ul>
                </li>
<?php endif; ?>	



<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->manage_attendance; ?>
<?php if($eRRPermission['manage_attendance'] != ''):?>			
	
 			<?php $role = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->role; ?>
			<?php if($role['role'] == '1'):?>
			<!-- TRANSPORT -->
            <li class="<?php if ($page_name == 'manage_attendance') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/manage_attendance/<?php echo date("d/m/Y"); ?>">
                    <i class="fa fa-calendar p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('mark_attendance'); ?></span>
                </a>
            </li>
			
			<li class="<?php if ($page_name == 'attendance_report') echo 'active'; ?> ">
                        <a href="<?php echo base_url(); ?>teacher/attendance_report">
						<i class="fa fa-bar-chart-o p-r-10"></i>
                              <span class="hide-menu"><?php echo get_phrase('view_attendance'); ?></span>
                        </a>
                    </li>
			<?php endif; ?>
<?php endif; ?>	
				

<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->information; ?>
<?php if($eRRPermission['information'] != ''):?>	
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-link p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('information');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php if ($page_name == 'gallery' || $page_name == 'todays_thought' || $page_name == 'news' || $page_name == 'holiday' ||
                   												   $page_name == 'help_link') echo 'opened active'; ?>">
						
                 			 <!-- GALLERY -->
            <!-- Exam marks -->
            <li class="<?php if ($page_name == 'gallery') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/gallery">
                    <i class="fa fa-camera p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_galleries'); ?></span>
                </a>
            </li>		

            <!-- NEWS -->
            <li class="<?php if ($page_name == 'news') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/news">
                    <i class="fa fa-space-shuttle p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_news'); ?></span>
                </a>
            </li>

            <!-- TODAYS THOUGHT -->
            <li class="<?php if ($page_name == 'todays_thought') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/todays_thought">
                   <i class="fa fa-list p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('moral_talk'); ?></span>
                </a>
            </li>


      <!-- HOLIDAYS -->
            <li class="<?php if ($page_name == 'holiday') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/holiday">
                    <i class="fa fa-calendar p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_holiday'); ?></span>
                </a>
            </li>
			
            <!-- HELP LINK -->
            <li class="<?php if ($page_name == 'help_link') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/help_link">
                    <i class="fa fa-link p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('helpful_link'); ?></span>
                </a>
            </li>
			
                 </ul>
                </li>
<?php endif; ?>	


<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->transportation; ?>
<?php if($eRRPermission['transportation'] != ''):?>

            <!-- TRANSPORTATION -->
            <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/transport">
                    <i class="fa fa-car p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('transportation'); ?></span>
                </a>
            </li>
<?php endif; ?>	
				

<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->message; ?>
<?php if($eRRPermission['message'] != ''):?>
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-envelope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('internal_message');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php if ($page_name == 'noticeboard' || $page_name == 'message') echo 'opened active'; ?>">
						
                 		 <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/noticeboard">
				<i class="fa fa-calendar p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('noticeboards'); ?></span>
                </a>
            </li>

            <!-- MESSAGE -->
            <li class="<?php if ($page_name == 'message') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/message">
				<i class="fa fa-envelope p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('private_messages'); ?></span>
                </a>
            </li>
     
                 </ul>
                </li>
<?php endif; ?> 


<?php $eRRPermission = $this->db->get_where('teacherpermission', array('teacher_id' => $this->session->userdata('login_user_id')))->row()->profile; ?>
<?php if($eRRPermission['profile'] != ''):?>       

            <!-- ACCOUNT -->
            <li class="<?php if ($page_name == 'manage_profile') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/manage_profile">
                    <i class=" fa fa-laptop p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('personal_details'); ?></span>
                </a>
            </li>
<?php endif; ?> 
					
                  
                </ul>
            </div>
        </div>

	