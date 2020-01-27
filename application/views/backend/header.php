<!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top m-b-0">  
            <div class="navbar-header"> <a class="navbar-toggle hidden-sm hidden-md hidden-lg " href="javascript:void(0)" data-toggle="collapse" data-target=".navbar-collapse"><i class="ti-menu"></i></a>
                
				<div class="top-left-part"><a class="logo" href="#"><b>
				
				<img src="<?php echo base_url() ?>uploads/logo.png" class="img-circle" width="50" height="50" alt="home" /></b><span class="hidden-xs"><strong>OFINE</strong> SCHOOL
				
				
				<?php $abb = $this->db->get_where('settings', array('type' => 'abb'))->row()->description;?>
				<?php echo $abb; ?>

				</span></a></div>
				<ul class="nav navbar-top-links navbar-left hidden-xs">
                    <li><a href="javascript:void(0)" class="open-close hidden-xs"><i class="icon-arrow-left-circle ti-menu"></i></a></li>
                    <?php if($this->session->userdata('login_type') == 'admin') : ?>
                    <li>
		<?php echo form_open(base_url() . 'admin/searchStudent' , array('onsubmit' => 'return validate() role="search" class="app-search hidden-xs"')); ?><div class="nc-search" role="search" style="position: relative; display: flex; flex-flow: row wrap; margin: 0px auto; padding: 0.75em 0px 0px; font-family: -apple-system, blinkmacsystemfont, 'segoe ui', roboto, oxygen, ubuntu, cantarell, 'fira sans', 'droid sans', 'helvetica neue', sans-serif;"><input  type="text" id="search_input" name="search_key" placeholder="Search student..." class="form-control" style="flex: 1 1 0%; min-width: 110px; min-height: 42px; padding: 0px 0.5em; border: 1px solid #d6d6d6; font-size: 1.125em; line-height: 20px; margin-right: 0px !important; margin-top: 0px !important; border-top-left-radius: 5px !important; border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important; border-bottom-left-radius: 5px !important;" autocomplete="off" placeholder="e.g. example.com" autocorrect="off" spellcheck="false" autocapitalize="off" type="text" required><input style="flex: 0 1 0%; min-width: 94px; width: 94px; padding: 0px 1em; font-size: 1.125em; line-height: 20px; text-align: center; border: 1px solid rgb(222, 55, 35); color: rgb(255, 255, 255); text-shadow: rgb(222, 55, 35) 0px -1px 1px; background: rgba(0, 0, 0, 0) linear-gradient(rgb(253, 79, 0) 0%, rgb(222, 55, 35) 100%) repeat scroll 0% 0%; cursor: pointer; min-height: 42px !important; margin-left: 0px !important; margin-top: 0px !important; border-radius: 0px 5px 5px 0px !important;" value="Search" type="submit">
<?php echo form_close();?>
     
                    </li>
					 <?php endif; ?>
					 
					  <?php if($this->session->userdata('login_type') == 'admin') : ?>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<li>
                        
<div id="ir_wrapper" style="margin: 0px auto; max-width: 800px;"> <form id="ir_form" method="GET" target="_blank" action="https://namecheap.pxf.io/c/1358493/386170/5618"> <div class="nc-search" role="search" style="position: relative; display: flex; flex-flow: row wrap; margin: 0px auto; padding: 0.75em 0px 0px; font-family: -apple-system, blinkmacsystemfont, 'segoe ui', roboto, oxygen, ubuntu, cantarell, 'fira sans', 'droid sans', 'helvetica neue', sans-serif;"> <input id="ir_link" name="u" type="hidden"><input id="ir_domain" name="domain" style="flex: 1 1 0%; min-width: 220px; min-height: 42px; padding: 0px 0.5em; border: 1px solid #d6d6d6; font-size: 1.125em; line-height: 20px; margin-right: 0px !important; margin-top: 0px !important; border-top-left-radius: 5px !important; border-top-right-radius: 0px !important; border-bottom-right-radius: 0px !important; border-bottom-left-radius: 5px !important;" autocomplete="off" placeholder="Search domain name e.g example.com" autocorrect="off" spellcheck="false" autocapitalize="off" type="text" required><input style="flex: 0 1 0%; min-width: 94px; width: 94px; padding: 0px 1em; font-size: 1.125em; line-height: 20px; text-align: center; border: 1px solid rgb(222, 55, 35); color: rgb(255, 255, 255); text-shadow: rgb(222, 55, 35) 0px -1px 1px; background: rgba(0, 0, 0, 0) linear-gradient(rgb(253, 79, 0) 0%, rgb(222, 55, 35) 100%) repeat scroll 0% 0%; cursor: pointer; min-height: 42px !important; margin-left: 0px !important; margin-top: 0px !important; border-radius: 0px 5px 5px 0px !important;" value="Search" type="submit"> </div> </form></div> <script>    !function(){ var e = document.querySelector("#ir_form"), n = document.querySelector("#ir_domain"), t = document.querySelector("#ir_link"); e.addEventListener("submit",function(o){ o.preventDefault(), t.value = "https://www.namecheap.com/domains/registration/results.aspx?domain="+n.value; if(e.domain.value === ""){ window.location.href = document.querySelector("#ir_url").href; } else{ e.submit(); } }); }();</script>
					</li>	
					 <?php endif; ?>
					 
					 <?php if($this->session->userdata('login_type') == 'student' || $this->session->userdata('login_type') == 'parent' || $this->session->userdata('login_type') == 'teacher' || $this->session->userdata('login_type') == 'librarian' || $this->session->userdata('login_type') == 'accountant' || $this->session->userdata('login_type') == 'hostel' ) : ?>
                    <li>
                        <?php echo form_open(base_url() . 'admin/searchStudent' , array('onsubmit' => 'return validate() role="search" class="app-search hidden-xs"')); ?>
                            <input type="text" id="search_input" name="search_key" placeholder="<?php echo get_phrase('search_student'); ?>..." class="form-control" disabled="disabled"> <a href="#"><i class="fa fa-search"></i></a> 
                       <?php echo form_close();?>
                    </li>
					 <?php endif; ?>
                </ul>
				
		
			
               <ul class="nav navbar-top-links navbar-right pull-right">
                <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-language"></i>
					
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
		  <?php if($this->session->userdata('login_type') == 'admin') : ?>
           <ul class="dropdown-menu  animated bounceInDown">
		   
                            <?php
                            $fields = $this->db->list_fields('language');
                            foreach ($fields as $field) {
                                if ($field == 'phrase_id' || $field == 'phrase')
                                    continue;
                                ?>
                            <li class="<?php if ($this->session->userdata('current_language') == $field) echo 'active'; ?>">
                                <a href="<?php echo base_url(); ?>multilanguage/select_language/<?php echo $field; ?>">
                                    <img src="<?php echo base_url(); ?>optimum/flag/<?php echo $field; ?>.png" style="width:16px; height:16px;" />	
                                    <span><?php echo $field; ?></span>
                                </a>
                            </li>
                            <?php
                        }
                        ?>

                    </ul>
										 <?php endif; ?>

                    </li>
					
					
					
                    <!-- /.dropdown -->
                <ul class="nav navbar-top-links navbar-right pull-right">
                    <li class="dropdown"> <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="icon-envelope"></i>
          <div class="notify"><span class="heartbit"></span><span class="point"></span></div>
          </a>
                        <ul class="dropdown-menu mailbox animated bounceInDown">
                            <li>
                                <div class="drop-title" align="center">You have&nbsp;<button class="btn btn-success btn-circle"><?php echo $this->crud_model->count_unread_message_of_curuser() ?></button>&nbsp;Messages</div>
                            </li>
		
		 				<?php
                        $messages = $this->crud_model->unread_message_of_curuser();
                        foreach ($messages as $message) :
                            ?>
                            <li>
                                <div class="message-center">
								
                                    <a href="<?php echo base_url(); ?><?php echo ($this->session->userdata('login_type') == 'parent' ? 'parents' : $this->session->userdata('login_type')) ?>/message/message_read/<?php echo $message["message_thread_code"] ?>">
                                        <div class="user-img"> <img src="<?php echo $message["face_file"] ?>" alt="user" class="img-circle"> <span class="profile-status online pull-right"></span> </div>
                                        <div class="mail-contnet">
                                            <h5><?php echo $message["sender_name"] ?></h5> <span class="mail-desc"><?php echo $message["message"] ?></span> <span class="time"><?php echo $message["ago"] ?>&nbsp;ago</span> </div>
                                    </a>
                                   
                                    
                                </div>
                            </li>
					 <?php endforeach; ?>                        

							
                            <li>
                                <a class="text-center" href="<?php echo base_url(); ?><?php echo ($this->session->userdata('login_type') == 'parent' ? 'parents' : $this->session->userdata('login_type')) ?>/message"> <strong>See all notifications</strong> <i class="fa fa-angle-right"></i> </a>
                            </li>
                        </ul>
                        <!-- /.dropdown-messages -->
                    </li>
                    <!-- /.dropdown -->
							<?php
                            $key = $this->session->userdata('login_type') . '_id';
                            $face_file = 'uploads/' . $this->session->userdata('login_type') . '_image/' . $this->session->userdata($key) . '.jpg';
                            if (!file_exists($face_file)) {
                                $face_file = 'uploads/default_avatar.jpg';
//                                    if ($key = $this->session->userdata('login_type') == 'admin') {
//                                        $face_file = base_url() . 'uploads/' . $this->session->userdata('login_type') . '_image/1.jpg';
//                                    }
                            }
                            ?>
                    <li class="dropdown">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?php echo base_url() . $face_file; ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs">
								<?php 
								$account_type	=	$this->session->userdata('login_type');
								$account_id		=	$account_type.'_id';
								$name			=	$this->crud_model->get_type_name_by_id($account_type , $this->session->userdata($account_id) , 'name');
								echo $name;
								?>
							</b> </a>
							 <?php if ($account_type != 'parent'): ?>
							 
							<ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/manage_profile"><i class="ti-user"></i>  My Profile</a></li>
                            <li><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type') ?>/message"><i class="ti-email"></i>  Inbox</a></li>
      <li><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/manage_profile"><i class="ti-settings"></i> <?php echo get_phrase('account_settings');?></a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i>&nbsp;<?php echo get_phrase('logout');?></a></li>
                        	</ul>
						
                        <?php endif; ?>                  
                    <?php if ($account_type == 'parent'): ?>
					<ul class="dropdown-menu dropdown-user animated flipInY">
                            <li><a href="<?php echo base_url();?>parents/manage_profile"><i class="ti-user"></i>  My Profile</a></li>
                            <li><a href="<?php echo base_url();?>parents/message"><i class="ti-email"></i>  Inbox</a></li>
      <li><a href="<?php echo base_url();?>parents/manage_profile"><i class="ti-settings"></i> <?php echo get_phrase('account_settings');?></a></li>
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-power-off"></i>&nbsp;<?php echo get_phrase('logout');?></a></li>
                        	</ul>
							<?php endif; ?>
					
                        <!-- /.dropdown-user -->
                    </li>
					
					
					 <!-- .Megamenu -->
                    <li class="mega-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" ><span class="hidden-xs"></span> <i class="icon-options-vertical"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu animated bounceInDown">

                            <li class="col-sm-12 m-t-40 demo-box">
                        			
				<div class="row">                            
												 
												 <div class="col-sm-2">
                                        <div class="white-box text-center bg-success"><a href="<?php echo base_url(); ?>admin/department/list/"  class="text-white"><i class="fa fa-plus"></i>&nbsp;Department</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-warning"><a href="<?php echo base_url(); ?>admin/leave/"  class="text-white"><i class="fa fa-users"></i>&nbsp;Manage Leave</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-inverse"><a href="<?php echo base_url(); ?>admin/award/"  class="text-white"><i class="fa fa-certificate"></i>&nbsp;Manage Award</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-danger"><a href="<?php echo base_url(); ?>admin/author/"  class="text-white"><i class="fa fa-book"></i>&nbsp;Book Author</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-info"><a href="<?php echo base_url(); ?>admin/transport_route/"  class="text-white"><i class="fa fa-car"></i>&nbsp;Transport Route</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-purple"><a href="<?php echo base_url(); ?>admin/system_settings/"  class="text-white"><i class="fa fa-gear"></i>&nbsp;General Settings</a></div>
                                    </div>
												 
												 
												 
												 
												 <div class="col-sm-2">
                                        <div class="white-box text-center bg-danger"><a href="<?php echo base_url(); ?>admin/alumni/"  class="text-white"><i class="fa fa-users"></i>&nbsp;New Alumni</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-success"><a href="<?php echo base_url(); ?>admin/exam_list/"  class="text-white"><i class="fa fa-list"></i>&nbsp;List Exam</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-info"><a href="<?php echo base_url(); ?>admin/list_invoice/"  class="text-white"><i class="fa fa-file"></i>&nbsp;List Ledger</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-inverse"><a href="<?php echo base_url(); ?>admin/invoice_add/"  class="text-white"><i class="fa fa-credit-card"></i>&nbsp;Student Ledger</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-purple"><a href="<?php echo base_url(); ?>admin/exam_mars_sms/"  class="text-white"><i class="fa fa-check"></i>&nbsp;Student Score</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-warning"><a href="<?php echo base_url(); ?>admin/payroll_list/"  class="text-white"><i class="fa fa-paypal"></i>&nbsp;List Payroll</a></div>
                                    </div>
									
									
									
									
									<div class="col-sm-2">
                                        <div class="white-box text-center bg-success"><a href="<?php echo base_url(); ?>admin/staff_attendance/"  class="text-white"><i class="fa fa-check"></i>&nbsp;Attendance</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-purple"><a href="<?php echo base_url(); ?>admin/parent/"  class="text-white"><i class="fa fa-plus"></i>&nbsp;New Parent</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-warning"><a href="<?php echo base_url(); ?>admin/exam_add/"  class="text-white"><i class="fa fa-plus"></i>&nbsp;New Exam</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-info"><a href="<?php echo base_url(); ?>admin/tabulation_sheet/"  class="text-white"><i class="fa fa-bar-chart"></i>&nbsp;Report Card</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-danger"><a href="<?php echo base_url(); ?>admin/transport/"  class="text-white"><i class="fa fa-car"></i>&nbsp;Transportation</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-inverse"><a href="<?php echo base_url(); ?>admin/expense/"  class="text-white"><i class="fa fa-paypal"></i>&nbsp;Expenses</a></div>
                                    </div>
									
									
									
									<div class="col-sm-2">
                                        <div class="white-box text-center bg-inverse"><a href="<?php echo base_url(); ?>admin/student_promotion/"  class="text-white"><i class="fa fa-link"></i>&nbsp;Promote Students</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-danger"><a href="<?php echo base_url(); ?>admin/club/"  class="text-white"><i class="fa fa-plus"></i>&nbsp;School Clubs</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-info"><a href="<?php echo base_url(); ?>admin/task_manager/"  class="text-white"><i class="fa fa-plus"></i>&nbsp;Task Manager</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-purple"><a href="<?php echo base_url(); ?>admin/circular/"  class="text-white"><i class="fa fa-credit-book"></i>&nbsp;Manage Circular</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-success"><a href="<?php echo base_url(); ?>admin/academic_syllabus/"  class="text-white"><i class="fa fa-file"></i>&nbsp;Academic Syllabus</a></div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="white-box text-center bg-warning"><a href="<?php echo base_url(); ?>admin/admin_add/"  class="text-white"><i class="fa fa-key"></i>&nbsp;Admin Role</a></div>
                                    </div>
									
									
																		
		</div>
						  
                            </li>
                        </ul>
                    </li>


                    <!-- /.Megamenu -->
                    <li class="right-side-toggle"> <a class="waves-effect waves-light" href="javascript:void(0)"><i class="ti-microsoft-alt"></i></a></li>
                    <!-- /.dropdown -->
                </ul>
            </div>   
            <!-- /.navbar-header -->
            <!-- /.navbar-top-links -->
            <!-- /.navbar-static-side -->
        </nav>