<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
$abb = $this->db->get_where('settings', array('type' => 'abb'))->row()->description;
$footer = $this->db->get_where('settings', array('type' => 'footer'))->row()->description;
$skin_colour = $this->db->get_where('settings', array('type' => 'skin_colour'))->row()->description;
$text_align         =	$this->db->get_where('settings' , array('type'=>'text_align'))->row()->description;
$active_sms_service = $this->db->get_where('settings', array('type' => 'active_sms_service'))->row()->description;
$running_year 		=   $this->db->get_where('settings' , array('type'=>'session'))->row()->description;
?>
<?php include 'css.php'; ?>

    <!-- Preloader -->
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <div id="wrapper">
    

	<?php include 'header.php'; ?>
	 <?php include $this->session->userdata('login_type').'/navigation.php';?>
		<?php include 'page_info.php';?>
		<?php include $this->session->userdata('login_type').'/'.$page_name.'.php';?>
		
       
				
				<?php // include 'dashboard.php'; ?>
				
				
                
				
                <!-- .right-sidebar -->
                <div class="right-sidebar">
                    <div class="slimscrollright">
                        <div class="rpanel-title"> Service Panel <span><i class="ti-close right-side-toggle"></i></span> </div>
                        <div class="r-panel-body">
                           <!-- <ul>
                                <li>Layout Options</li>
                                <li>
                                    <div class="checkbox checkbox-info">
                                        <input id="checkbox1" type="checkbox" class="fxhdr">
                                        <label for="checkbox1"> Fix Header </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-warning">
                                        <input id="checkbox2" type="checkbox" class="fxsdr">
                                        <label for="checkbox2"> Fix Sidebar </label>
                                    </div>
                                </li>
                                <li>
                                    <div class="checkbox checkbox-success">
                                        <input id="checkbox4" type="checkbox" class="open-close">
                                        <label for="checkbox4"> Toggle Sidebar </label>
                                    </div>
                                </li>
                            </ul>-->
							 
                            <ul class="m-t-20 chatonline">
        <!-- calculator-->
		<li>Calculator</li>
            <style>
                .calculator_button{
                    border : 1px solid #303641;
                    width: 50px;
                    background-color: #5A606C;
                    color: #F5FAFC;
                    cursor:auto;
                }
                .calculator_button:hover{
                    border : 1px solid #303641;
                    background-color: #5A606C;
                    color: #F5FAFC;
                }
                .calculator_button:focus{
                    border : 1px solid #303641;
                    background-color: #5A606C;
                    color: #F5FAFC;
                }
            </style>    
            <form name="form1" onsubmit="return false">
            <table style="">
                <tr>
                    <td colspan="4"><input type="text" id="display" style="width:100%; border:0px; background-color:#303641;text-align: right;  font-size: 24px;  font-weight: 100;  color: #fff;" readonly placeholder="0" /></td>
                </tr>
                <tr>
                    <td colspan="4"><button type="button" class="btn btn-default calculator_button" style="width:100%;"  onclick="reset()">Clear</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(7)">7</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(8)" >8</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(9)" >9</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;+&quot;)">+</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(4)">4</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(5)" >5</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(6)" >6</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;-&quot;)" >-</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(1)">1</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(2)" >2</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(3)" >3</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;*&quot;)" >&times;</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(0)">0</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="displaynum(&quot;.&quot;)" >.</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="equals()" >=</button></td>
                    <td><button type="button" class="btn btn-default calculator_button" onclick="operator(&quot;/&quot;)" >&divide;</button></td>
                </tr>
            </table>
            </form>
<hr>
           <li>Your active chat</li>
                               
							 <?php
					$current_user = $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');
					$this->db->where('sender', $current_user);
					$this->db->or_where('reciever', $current_user);
					$message_threads = $this->db->get('message_thread')->result_array();
					foreach ($message_threads as $row):

                	// defining the user to show
                	if ($row['sender'] == $current_user)
                    $user_to_show = explode('-', $row['reciever']);
                	if ($row['reciever'] == $current_user)
                    $user_to_show = explode('-', $row['sender']);

                	$user_to_show_type = $user_to_show[0];
                	$user_to_show_id = $user_to_show[1];
                	$unread_message_number = $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
                ?>
							
                                <li>
<a href="<?php echo base_url(); ?><?php echo $this->session->userdata('login_type');?>/message/message_read/<?php echo $row['message_thread_code']; ?>"><img src="<?php echo $this->crud_model->get_image_url($user_to_show_type, $user_to_show_id); ?>" class="img-circle" draggable="false"/> <span><?php echo $this->db->get_where($user_to_show_type, array($user_to_show_type . '_id' => $user_to_show_id))->row()->name; ?>
<small class="text-success">
 						 <?php if ($unread_message_number > 0): ?>
                                <?php echo $unread_message_number . '&nbsp;'. 'Message(s)'; ?>
                        <?php endif; ?> 
						<?php if ($unread_message_number == 0): ?>
                                <?php echo $unread_message_number . '&nbsp;'. 'Message(s)'; ?>
                        <?php endif; ?>
</small>



</span></a> 


                                </li>
								
								 <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->
            </div>
            <!-- /.container-fluid -->
			
			
			<!-- Floating Action Button starts here -->
			<?php if ($text_align == 'right-to-left') { ?>
                    <div class="fixed-action-btn" style="bottom: 50px; right: 0px;">
                        <a class="btn-floating btn-large">
                          <i class="fa fa-wechat"></i>
                        </a>
                        <ul style="right: 0px; padding-bottom:0px; padding-right:0px">
						
						
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/message" class="btn-floating btn-red btn-circle"><i class="fa fa-envelope"></i></a></li>


<?php if($this->session->userdata('login_type') == 'admin') {?>
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/invoice" class="btn-floating btn-green btn-circle"><i class="fa fa-money"></i></a></li>
<?php }?>

<?php if($this->session->userdata('login_type') == 'student') {?>
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/invoice" class="btn-floating btn-green btn-circle"><i class="fa fa-money"></i></a></li>
<?php }?>

<?php if($this->session->userdata('login_type') == 'accountant') {?>
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/invoice" class="btn-floating btn-green btn-circle"><i class="fa fa-money"></i></a></li>
<?php }?>


<?php if($this->session->userdata('login_type') == 'admin') {?>						  
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/attendance_report" class="btn-floating btn-yellow btn-circle"><i class="fa fa-calendar"></i></a></li>
<?php }?>
					  

<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/manage_profile" class="btn-floating btn-blue btn-circle"><i class="fa fa-gears"></i></a></li>
						  
						  
                        </ul>
                    </div>
					<?php } else { ?>
					
					<div class="fixed-action-btn" style="bottom: 50px; right: 19px;">
                        <a class="btn-floating btn-large">
                          <i class="fa fa-wechat"></i>
                        </a>
                        <ul style="right: 19px; padding-bottom:0px; padding-left:7px">
						
						
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/message" class="btn-floating btn-red btn-circle"><i class="fa fa-envelope"></i></a></li>


<?php if($this->session->userdata('login_type') == 'admin') {?>
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/invoice" class="btn-floating btn-green btn-circle"><i class="fa fa-money"></i></a></li>
<?php }?>

<?php if($this->session->userdata('login_type') == 'student') {?>
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/invoice" class="btn-floating btn-green btn-circle"><i class="fa fa-money"></i></a></li>
<?php }?>

<?php if($this->session->userdata('login_type') == 'accountant') {?>
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/invoice" class="btn-floating btn-green btn-circle"><i class="fa fa-money"></i></a></li>
<?php }?>


<?php if($this->session->userdata('login_type') == 'admin') {?>						  
<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/attendance_report" class="btn-floating btn-yellow btn-circle"><i class="fa fa-calendar"></i></a></li>
<?php }?>
					  

<li style="color:transparent"><a href="<?php echo base_url();?><?php echo $this->session->userdata('login_type');?>/manage_profile" class="btn-floating btn-blue btn-circle"><i class="fa fa-gears"></i></a></li>
						  
						  
                        </ul>
                    </div>
					<?php } ?>
					<!-- Floating Action Button ends here -->
		
         <?php include 'footer.php'; ?>

		
        </div>
        <!-- /#page-wrapper -->
    </div>
 <?php include 'modal.php'; ?>
 <?php include 'js.php'; ?>
 
 <!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header  d-flex justify-content-center">
        <p class="heading">Be always up to date</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fa fa-bell fa-4x animated rotateIn mb-4" ></i>
        <h5><strong style="color:red">Purchase Notice:</strong>&nbsp;Thanks for downloading OFINE SCHOOL MANAGEMENT SYSTEM
		
		<hr>
		This is OFINE SCHOOL MANAGEMENT SYSTEM, the software allows you to manage all the school activities. The purpose of this software you have downloaded is for you to be aware of this great school. Please note that you need to purchase this software so as for you to have all access to all the source codes and database.<br> This school system has attractive landing page with result checker with PINs and serial number, student can also register from the landing page and it will be approved by the admin, the school has barcode, camera attendace and many more. For more info email to <a href="mailto:optimumprobleemsolver@gmail.com"> Support Center</a>
		<hr>
		<a href="https://optimumlinkupsoftware.com/welcome/software_solution_details/24" target="_blank" class="btn btn-info btn-sm pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light" style="color:white"><i class="fa fa-globe"></i>&nbsp;Purchase Now</a><a href="https://optimumlinkupsoftware.com/welcome/newschool/" target="_blank" class="btn btn-primary btn-sm pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light" style="color:white"><i class="fa fa-globe"></i>&nbsp;Online Demo</a>
      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a type="button" class="btn btn-info btn-sm btn-rounded" data-dismiss="modal">Ok</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>


<!--Modal: modalPush-->

 
 
 
 
 
 
 
 <script>
	$(window).load(function(){        
   	$('#modalPush').modal('show');
    }); 
	</script>	