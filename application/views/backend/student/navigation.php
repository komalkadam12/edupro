
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
				   
				   
				   
				   
			<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->dashboard; ?>
			<?php if($eRRPermission['dashboard'] != ''):?>
			
			
				   
                    <li class="<?php if($page_name == 'dashboard')echo 'active';?>">
					<a href="<?php echo base_url();?><?php echo $account_type; ?>/dashboard" >
					<i class="fa fa-dashboard p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('dashboard');?></span>
				    </a>	
				    </li>
					<?php endif; ?>
					
					
					
					
					
					
					
			<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->view_users; ?>
			<?php if($eRRPermission['view_users'] != ''):?>
			
			
					
		<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-users p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('view_users');?><span class="fa arrow"></span></span></a>
		
            <ul class=" nav nav-second-level<?php
            if ($page_name == 'teacher' ||
                    $page_name == 'class_mate')
                echo 'opened active';
            ?>">
						
                 			 <li class="<?php if ($page_name == 'teacher') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/teacher">
				<i class="fa fa-female p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('view_teacher'); ?></span>
                </a>
            </li>
                     <!-- LIBRARIAN -->
            <li class="<?php if ($page_name == 'class_mate') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/class_mate">
				<i class="fa fa-users p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('view_class_mate'); ?></span>
                </a>
            </li>
     
                 </ul>
                </li>
<?php endif; ?>	







	

<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->academics; ?>
<?php if($eRRPermission['academics'] != ''):?>	

			
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-calendar p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('academics');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'subject' ||
				$page_name == 'class_routine' ||
				$page_name == 'student_marksheet' ||
				$page_name == 'assignment' ||
                    $page_name == 'study_material')
                echo 'opened active';
            ?>">
						
                 			 <!-- ACCOUNTANT -->
            <li class="<?php if ($page_name == 'subject') echo 'active'; ?> ">
               <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/subject">
				<i class="fa fa-book p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('view_subject'); ?></span>
                </a>
            </li>

                   <!-- HOSTEL MANAGER -->
            <li class="<?php if ($page_name == 'class_routine') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/class_routine">
				<i class="fa fa-calendar p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('time_table'); ?></span>
                </a>
            </li>
			
				 <!-- PARENTS -->
        <li class="<?php if($page_name == 'study_material')echo 'active';?>">
					 <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/study_material">
					<i class="fa fa-list p-r-10"></i>
					<span class="hide-menu"><?php echo get_phrase('study_material');?></span>
				    </a>	
				    </li>
					
					  <!-- Exam marks -->
            <li class="<?php if ($page_name == 'student_marksheet') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/student_marksheet/<?php echo $this->session->userdata('login_user_id'); ?>">
                    <i class="fa fa-list p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('report_cards'); ?></span>
                </a>
            </li>
			
			 <!-- TODAYS THOUGHT -->
            <li class="<?php if ($page_name == 'assignment') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/assignment">
                     <i class="fa fa-list p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('assignments'); ?></span>
                </a>
            </li>
			
                 </ul>
                </li>
				
<?php endif; ?>
	
	
	
	
	
	
	
<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->payments; ?>
<?php if($eRRPermission['payments'] != ''):?>	

			
<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-paypal p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('payments');?>
<span class="fa arrow"></span>
				
<span class="label label-rouded label-info pull-right"><?php echo $this->db->get_where('invoice' , array('student_id' => $this->session->userdata('login_user_id')))->num_rows();?></span>
</span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'invoice' || $page_name == 'payment_history' || $page_name == 'paid_history' ||
                    $page_name == 'student_ledger')
                echo 'opened active';
            ?>">
						
                 			  <!-- PAYMENT -->
            <li class="<?php if ($page_name == 'invoice') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/invoice">
                    <i class="fa fa-credit-card p-r-10"></i>
					<span class="label label-rouded label-warning pull-right"><?php echo $this->db->get_where('invoice' , array('student_id' => $this->session->userdata('login_user_id')))->num_rows();?></span>
                    <span class="hide-menu"><?php echo get_phrase('pay_now'); ?></span>
                </a>
            </li>
			
			  <!-- PAYMENT -->
            <li class="<?php if ($page_name == 'student_ledger') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/student_ledger">
                    <i class="fa fa-credit-card p-r-10"></i>
					<span class="label label-rouded label-warning pull-right"><?php echo $this->db->get_where('ledger' , array('status' => 'unpaid', 'student_id' => $this->session->userdata('login_user_id')))->num_rows();?></span>

                    <span class="hide-menu"><?php echo get_phrase('ledger_invoice'); ?></span>
                </a>
            </li>
			
			 <!-- PAYMENT -->
            <li class="<?php if ($page_name == 'payment_history' || $page_name == 'paid_history') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/payment_history">
                    <i class="fa fa-credit-card p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('payment_history'); ?></span>
                </a>
            </li>
     
                 </ul>
                </li>
				
				
<?php endif; ?>




<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->online_exam; ?>
<?php if($eRRPermission['online_exam'] != ''):?>				
				
				<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-laptop p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('online_exam');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'exam_first' || $page_name == 'exam_second' || $page_name == 'exam_review' || $page_name == 'exam_result_detail' ||
                    $page_name == 'student_ledger')
                echo 'opened active';
            ?>">
			
			<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'cbt'))->row()->description; ?>
<?php if($eRRPermission['cbt'] == 'b'):?>
						
                 			  <!-- PAYMENT -->
            <li class="<?php if ($page_name == 'exam_first' || $page_name == 'exam_second' || $page_name == 'exam_site') echo 'active'; ?> ">
                <?php if ($this->session->userdata('cur_exam_data')) { ?>
                    <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/exam_site">                
                        <i class="fa fa-plus p-r-10"></i>
                        <span class="hide-menu"><?php echo get_phrase('online_exam'); ?></span>
                    </a>
                <?php } else { ?>
                    <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/exam/first">                
                       <i class="fa fa-laptop p-r-10"></i>
                       <span class="hide-menu"><?php echo get_phrase('online_exam'); ?></span>
                    </a>
                <?php } ?>
            </li>
			
			 <li class="<?php if ($page_name == 'exam_review' || $page_name == 'exam_result_detail') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/exam_review">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('check_results'); ?></span>
                </a>
            </li>
			
			<?php endif; ?>
			
<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'cbt'))->row()->description; ?>
<?php if($eRRPermission['cbt'] == 'a'):?>
				
		<li class="<?php if ($page_name == 'online_exam' || $page_name == 'online_exam_take') echo 'active'; ?> ">
            <a href="<?php echo site_url('student/online_exam');?>">
               <i class="fa fa-list p-r-10"></i>
                 <span class="hide-menu"><?php echo get_phrase('online_exam'); ?></span>
            </a>
        </li>

<?php endif; ?>
                 </ul>
                </li>


<?php endif; ?>






	
<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->request_book; ?>
<?php if($eRRPermission['request_book'] != ''):?>

			
  <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-list p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('request_book');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'book' ||
                    $page_name == 'request_book')
                echo 'opened active';
            ?>">
						
                 			 <li class="<?php if ($page_name == 'book') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/book">
				<i class="fa fa-list p-r-10"></i>
                     <span class="hide-menu"><?php echo get_phrase('all_books'); ?></span>
                </a>
            </li>
                     <!-- LIBRARIAN -->
            <li class="<?php if ($page_name == 'request_book') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/request_book">
				<i class="fa fa-plus p-r-10"></i>
                      <span class="hide-menu"><?php echo get_phrase('request_book'); ?></span>
                </a>
            </li>
     
                 </ul>
                </li>
<?php endif; ?>






				
<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->information; ?>
<?php if($eRRPermission['information'] != ''):?>

				
				<li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-link p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('information');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'gallery' ||
				$page_name == 'todays_thought' ||
				$page_name == 'news' ||
				$page_name == 'holiday' ||
                    $page_name == 'help_link')
                echo 'opened active';
            ?>">
						
                 			 <!-- ACCOUNTANT -->
            <!-- Exam marks -->
            <li class="<?php if ($page_name == 'gallery') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/gallery">
                    <i class="fa fa-camera p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_galleries'); ?></span>
                </a>
            </li>		

            <!-- TODAYS THOUGHT -->
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


      <!-- TODAYS THOUGHT -->
            <li class="<?php if ($page_name == 'holiday') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/holiday">
                    <i class="fa fa-calendar p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('view_holiday'); ?></span>
                </a>
            </li>
			
            <!-- TODAYS THOUGHT -->
            <li class="<?php if ($page_name == 'help_link') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/help_link">
                    <i class="fa fa-link p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('helpful_link'); ?></span>
                </a>
            </li>
			
                 </ul>
                </li>

            <!-- TRANSPORT -->
            <li class="<?php if ($page_name == 'transport') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/transport">
                    <i class="fa fa-car p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('transportation'); ?></span>
                </a>
            </li>

<?php endif; ?>



			
<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->support_ticket; ?>
<?php if($eRRPermission['support_ticket'] != ''):?>

				
				<!------medicine page----->
		   <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-file p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('support_ticket');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'support_ticket_create' || 
				$page_name == 'support_ticket_view' ||
                    $page_name == 'support_ticket')
                echo 'opened active';
            ?>">
						
                 		 <li class="<?php if ($page_name == 'support_ticket') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/support_ticket">
				<i class="fa fa-list p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('list_tickets'); ?></span>
                </a>
            </li>

            <!-- MESSAGE -->
            <li class="<?php if ($page_name == 'support_ticket_create') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/support_ticket_create">
				<i class="fa fa-plus p-r-10"></i>
                    <span class="hide-menu"><?php echo get_phrase('new_ticket'); ?></span>
                </a>
            </li>
     
                 </ul>
                </li>
<?php endif; ?>
	
	
	
	
				
<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->internal_message; ?>
<?php if($eRRPermission['internal_message'] != ''):?>

				
				<!------medicine page----->
		   <li> <a href="#" class="waves-effect"><i data-icon="&#xe006;" class="fa fa-envelope p-r-10"></i> <span class="hide-menu"><?php echo get_phrase('internal_message');?><span class="fa arrow"></span></span></a>
		
                        <ul class=" nav nav-second-level<?php
            if ($page_name == 'noticeboard' ||
                    $page_name == 'message')
                echo 'opened active';
            ?>">
						
                 		 <li class="<?php if ($page_name == 'noticeboard') echo 'active'; ?> ">
                <a href="<?php echo base_url(); ?><?php echo $account_type; ?>/noticeboard">
				<i class="fa fa-calendar p-r-10"></i>
                   <span class="hide-menu"><?php echo get_phrase('manage_events'); ?></span>
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

	