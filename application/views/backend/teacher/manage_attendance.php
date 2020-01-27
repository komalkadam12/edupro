
<?php 
    $active_sms_service = $this->db->get_where('settings' , array('type' => 'active_sms_service'))->row()->description;
?>

					 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('manage_attendance');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                               <div class="panel-body table-responsive">
								
								<div align="center">
KEYS: Present&nbsp;-&nbsp; <span class="badge bg-success">1</span>&nbsp;&nbsp;Absent&nbsp;-&nbsp; <span class="badge bg-danger">2</span>&nbsp;&nbsp;Holiday&nbsp;-&nbsp;<span class="badge bg-success">3</span>&nbsp;&nbsp;Half Day&nbsp;-&nbsp; <span class="badge bg-warning">4</span>&nbsp;&nbsp;Late&nbsp;-&nbsp; <span class="badge bg-info">5</span>
			</div>

 		
        	<form method="post" action="<?php echo base_url();?>teacher/attendance_selector" class="form">
            <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_class');?></label>
                    <div class="col-sm-12">
					
                        <select name="class_id" class="form-control select2" style="width:100%"id="class_id" 
								data-message-required="<?php echo get_phrase('value_required');?>"
									onchange="return get_class_sections(this.value)">
                            <option value="">Select a class</option>
                            <?php 
                            $classes    =   $this->db->get('class', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
                            foreach($classes as $row):?>
                            <option value="<?php echo $row['class_id'];?>"
                                <?php if(isset($class_id) && $class_id==$row['class_id'])echo 'selected="selected"';?>>
                                    <?php echo $row['name'];?>
                                        </option>
                            <?php endforeach;?>
                        </select>
						</div>
						</div>
 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_section');?></label>
                    <div class="col-sm-12">
					 <select name="section_id" class="form-control "  id="section_selector_holder">
		                            <option value=""><?php echo get_phrase('select_class_first');?></option>
			                       
			                    </select>
					
              
						</div>
						</div>
						
						 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_date');?></label>
                    <div class="col-sm-12">
          <input type="date" class="form-control datepicker" id="example-date-input" name="timestamp" data-format="dd-mm-yyyy" value="<?php echo $date."-".$month."-".$year ;?>">
                 </div>
				 </div>
				 
				   <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
    <button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('browse_attendance'); ?></button>

                    </div>
					</div>
              
            </form>
		
</div>
</div>
</div>
</div>
</div>
<hr / style="color:white">

<?php if($date!='' && $month!='' && $year!='' && $class_id!=''):?>



<div class="row" align="center">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                          
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
								
								<?php 
                $classes    =   $this->db->get('class')->result_array();
                foreach ($classes as $row) {
                    if(isset($class_id) && $class_id==$row['class_id']) $calss_name = $row['name'];
                }
            ?>
            <h3 style="color: #696969;">Attendance For Class <?php echo $calss_name;?></h3>
            <?php 
                $sections    =   $this->db->get('section')->result_array();
                foreach ($sections as $row) {
                    if(isset($section_id) && $section_id==$row['section_id']) $calss_name = $row['name'];
                }
            ?>
            <h4 style="color: #696969;">Section <?php echo $calss_name; ?></h4>
            <?php
                $full_date = $date."-".$month."-".$year;
                $full_date = date_create($full_date);
                $full_date = date_format($full_date,"d M Y");
             ;?>
            <h4 style="color: #696969;"><?php echo $full_date;?></h4>
          
		  
    </div>
	</div>
	</div>
	</div>
	</div>


<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
					<div class="panel-wrapper collapse in" aria-expanded="true">
                    <div class="panel-body">
		
<center>
    <a class="btn btn-success btn-rounded btn-sm" onclick="mark_all_present()">
        <i class="fa fa-check"></i> Mark All Present    </a>
		
		 <a class="btn btn-warning btn-rounded btn-sm " onclick="mark_all_late()">
        <i class="fa fa-check"></i> Mark All Late</a>
		
		 <a class="btn btn-info btn-rounded btn-sm " onclick="mark_all_half()">
        <i class="fa fa-check"></i> Mark All Half Day   </a>
		
		 <a class="btn btn-success btn-rounded btn-sm " onclick="mark_all_holiday()">
        <i class="fa fa-check"></i> Mark All Holiday    </a>
		
    <a class="btn btn-danger btn-sm btn-rounded " onclick="mark_all_absent()">
        <i class="fa fa-times"></i> Mark All Absent    </a>
		
		 <a class="btn btn-primary btn-rounded btn-sm" onclick="mark_all_undefined()">
        <i class="fa fa-times"></i> Mark All Undefined    </a>
</center>

<br>
<form action="<?php echo base_url();?>teacher/manage_attendance/<?php echo $date.'/'.$month.'/'.$year.'/'.$class_id.'/'.$section_id;?>" method="post" accept-charset="utf-8">
		
   <div id="attendance_update">
    <table cellpadding="0" cellspacing="0" border="0" class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Sex</th>
                        <th>Roll</th>
                        <th>Name</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    //STUDENTS ATTENDANCE
                    $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                    $full_date = $year."-".$month."-".$date;
                    $i = 1;
                    foreach($students as $row)
                    {
                        ?>
                    <tr class="gradeA">
                        <td><?php echo $i;?></td>
                        <td> <img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" style="max-height:30px;margin-right: 30px;"></td>
                        <td><?php echo $row['sex'];?></td>
                        <td><?php echo $row['roll'];?></td>
                        <td><?php echo $row['name'];?></td>
                        <td>
                            <?php 
                            //inserting blank data for students attendance if unavailable
                            $verify_data    =   array(  'student_id' => $row['student_id'],
                                                        'date' => $full_date);
                            $query = $this->db->get_where('attendance' , $verify_data);
                            if($query->num_rows() < 1)
                            $this->db->insert('attendance' , $verify_data);
                            
                            //showing the attendance status editing option
                            $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                            $status     = $attendance->status;
                            ?>
                            
                            
                                <select name="status_<?php echo $row['student_id'];?>" class="status form-control" >
                                    <option value="0" <?php if($status == 0)echo 'selected="selected"';?>>Undefined</option>
                                    <option value="1" <?php if($status == 1)echo 'selected="selected"';?>>Present</option>
                                    <option value="2" <?php if($status == 2)echo 'selected="selected"';?>>Absent</option>
                                    <option value="3" <?php if($status == 3)echo 'selected="selected"';?>>Holiday</option>
                                    <option value="4" <?php if($status == 4)echo 'selected="selected"';?>>Half Day</option>
                                    <option value="5" <?php if($status == 5)echo 'selected="selected"';?>>Late</option>
                                </select>
                        </td>
                    </tr>
                    <?php
                        $i++; 
                    }
                    ;?>
                </tbody>
            </table>
        </div>
        <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
            <button type="submit" class="btn btn-rounded btn-info btn-sm" id="submit_button"><i class="fa fa-save"></i> Save Changes</button>
       </div>
	   </div>
        </form>
 

<br>

<?php 
        if ($active_sms_service == ''):
    ?>
					
    <div class="row">
        <div class="col-md-12">
           <div class="alert alert-blue">
                SMS <?php echo get_phrase('service_is_not_selected');?>
           </div> 
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php endif;?>
    <?php 
        if ($active_sms_service == 'disabled'):
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-warning">
                SMS <?php echo get_phrase('service_is_disabled');?>
           </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php endif;?>
    <?php 
        if ($active_sms_service == 'clickatell'):
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                SMS <?php echo get_phrase('will_be_sent_by_clickatell');?>
           </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php endif;?>
	
	
	 <?php 
        if ($active_sms_service == 'msg91'):
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                SMS <?php echo get_phrase('will_be_sent_by_msg91');?>
           </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php endif;?>
	
	
    <?php 
        if ($active_sms_service == 'twilio'):
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="alert alert-info">
                SMS <?php echo get_phrase('will_be_sent_by_twilio');?>
           </div>
        </div>
        <div class="col-md-4"></div>
    </div>
    <?php endif;?>
	
	</div>
	</div>
	</div>
	</div>
	</div>
	

<?php endif;?>

<script type="text/javascript">

    $("#update_attendance").hide();

    function update_attendance() {

        $("#attendance_list").hide();
        $("#update_attendance_button").hide();
        $("#update_attendance").show();

    }

    function select_section(class_id) {

        var sections = $(".section");
        for (var i = sections.length - 1; i >= 0; i--) {
            sections[i].style.display = "none";
            if (sections[i].value == class_id){
                sections[i].style.display = "block";
                sections[i].selected = "selected";
            }
        }
    }

    function mark_all_present() {
        var status = $(".status");
        for(var i = 0; i < status.length; i++)
            status[i].value = "1";
    }

    function mark_all_absent() {
        var status = $(".status");
        for(var i = 0; i < status.length; i++)
            status[i].value = "2";
    }
	
	function mark_all_late() {
        var status = $(".status");
        for(var i = 0; i < status.length; i++)
            status[i].value = "5";
    }
	
	function mark_all_half() {
        var status = $(".status");
        for(var i = 0; i < status.length; i++)
            status[i].value = "4";
    }
	
	function mark_all_holiday() {
        var status = $(".status");
        for(var i = 0; i < status.length; i++)
            status[i].value = "3";
    }
	
	function mark_all_undefined() {
        var status = $(".status");
        for(var i = 0; i < status.length; i++)
            status[i].value = "0";
    }
	
	function get_class_sections(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_class_section/' + class_id ,
            success: function(response)
            {
                jQuery('#section_selector_holder').html(response);
            }
        });

    }


</script>
<style>
    div.datepicker{
        border: 1px solid #c4c4c4 !important;
    }
</style>