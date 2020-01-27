		
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


   
            <form method="post" action="<?php echo base_url();?>teacher/attendance_report_view" class="form">
               
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
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('month');?></label>
                    <div class="col-sm-12">

                        <select name="month" class="form-control" required>
                            <option value="1" <?php if(isset($month) && $month=="1")echo 'selected="selected"';?>>January</option>
                            <option value="2" <?php if(isset($month) && $month=="2")echo 'selected="selected"';?>>February</option>
                            <option value="3" <?php if(isset($month) && $month=="3")echo 'selected="selected"';?>>March</option>
                            <option value="4" <?php if(isset($month) && $month=="4")echo 'selected="selected"';?>>April</option>
                            <option value="5" <?php if(isset($month) && $month=="5")echo 'selected="selected"';?>>May</option>
                            <option value="6" <?php if(isset($month) && $month=="6")echo 'selected="selected"';?>>June</option>
                            <option value="7" <?php if(isset($month) && $month=="7")echo 'selected="selected"';?>>July</option>
                            <option value="8" <?php if(isset($month) && $month=="8")echo 'selected="selected"';?>>August</option>
                            <option value="9" <?php if(isset($month) && $month=="9")echo 'selected="selected"';?>>September</option>
                            <option value="10" <?php if(isset($month) && $month=="10")echo 'selected="selected"';?>>October</option>
                            <option value="11" <?php if(isset($month) && $month=="11")echo 'selected="selected"';?>>November</option>
                            <option value="12" <?php if(isset($month) && $month=="12")echo 'selected="selected"';?>>December</option>
                        </select>
						</div>
						</div>
						
						 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('year');?></label>
                    <div class="col-sm-12">

                        <select name="year" class="form-control" required>
                            <option value="2017" <?php if(isset($year) && $year=="2017")echo 'selected="selected"';?>>2017</option>
                            <option value="2018" <?php if(isset($year) && $year=="2018")echo 'selected="selected"';?>>2018</option>
							 <option value="2019" <?php if(isset($year) && $year=="2019")echo 'selected="selected"';?>>2019</option>
							  <option value="2020" <?php if(isset($year) && $year=="2020")echo 'selected="selected"';?>>2020</option>
							   <option value="2021" <?php if(isset($year) && $year=="2021")echo 'selected="selected"';?>>2021</option>
							    <option value="2022" <?php if(isset($year) && $year=="2022")echo 'selected="selected"';?>>2022</option>
								 <option value="2023" <?php if(isset($year) && $year=="2023")echo 'selected="selected"';?>>2023</option>
								  <option value="2024" <?php if(isset($year) && $year=="2024")echo 'selected="selected"';?>>2024</option>
								   <option value="2025" <?php if(isset($year) && $year=="2025")echo 'selected="selected"';?>>2025</option>
								    <option value="2026" <?php if(isset($year) && $year=="2026")echo 'selected="selected"';?>>2026</option>
									 <option value="2027" <?php if(isset($year) && $year=="2027")echo 'selected="selected"';?>>2027</option>
									 <option value="2028" <?php if(isset($year) && $year=="2028")echo 'selected="selected"';?>>2028</option>
									 <option value="2029" <?php if(isset($year) && $year=="2029")echo 'selected="selected"';?>>2029</option>
									 <option value="2030" <?php if(isset($year) && $year=="2030")echo 'selected="selected"';?>>2030</option>
                        </select>
						</div>
						</div>
						
						<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">

         <button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('browse_report'); ?></button>
		 </div>
		 </div>

            </form>

</div>
</div>
</div>
</div>
</div>
<br>

<?php if($section_id!='' && $month!='' && $year!='' && $class_id!=''):?>

<div class="row" align="center">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                          
						
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
								
            <h3 style="color: #696969;">Attendance Sheet</h3>
            <?php 
                $classes    =   $this->db->get('class')->result_array();
                foreach ($classes as $row) {
                    if(isset($class_id) && $class_id==$row['class_id']) $calss_name = $row['name'];
                }
                $sections    =   $this->db->get('section')->result_array();
                foreach ($sections as $row) {
                    if(isset($section_id) && $section_id==$row['section_id']) $section_name = $row['name'];
                }
            ?>
            <?php
                $full_date = "5"."-".$month."-".$year;
                $full_date = date_create($full_date);
                $full_date = date_format($full_date,"F, Y");
            ;?>
            <h4 style="color: #696969;">Class <?php echo $calss_name; ?> : Section <?php echo $section_name; ?><br><?php echo $full_date; ?></h4>

	</div>
	</div>
	</div>
	</div>
	</div>
<hr/>


<div class="row" align="center">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">

                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
    <table cellpadding="0" cellspacing="0" border="0" class="table">
	
	        <div align="center">
KEYS: Present&nbsp;-&nbsp; <span class="badge bg-success">1</span>&nbsp;&nbsp;Absent&nbsp;-&nbsp; <span class="badge bg-danger">2</span>&nbsp;&nbsp;Holiday&nbsp;-&nbsp;<span class="badge bg-success">3</span>&nbsp;&nbsp;Half Day&nbsp;-&nbsp; <span class="badge bg-warning">4</span>&nbsp;&nbsp;Late&nbsp;-&nbsp; <span class="badge bg-info">5</span>
			</div>
			
            <thead>
                <tr>
                    <td style="text-align: left;">Students<i class="fa fa-down-thin"></i>| Date:</td>
                    <?php
                    $days = date("t",mktime(0,0,0,$month,1,$year)); 
                        for ($i=0; $i < $days; $i++) { 
                           ?>
                            <td style="text-align: center;"><?php echo ($i+1);?></td>   
                           <?php 
                        }
                    ;?>
                </tr>
            </thead>
            <tbody>
            <?php 
                //STUDENTS ATTENDANCE
                $students   =   $this->db->get_where('student' , array('class_id'=>$class_id))->result_array();
                foreach($students as $row)
                {
                    ?>
                <tr class="gradeA">
                    <td align="left"><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_profile/<?php echo $row['student_id']; ?>');"><?php echo $row['name'];?></a></td>
                    <?php 
                         for ($i=1; $i <= $days; $i++) {
                            $full_date = $year."-".$month."/".$i;
                            $verify_data    =   array(  'student_id' => $row['student_id'],
                                                    'date' => $full_date);
                            $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                            $status     = $attendance->status;
                            ?>
                            <td style="text-align: center;">
                                <?php if ($status == "1"):?>
                                    <i class="fa fa-circle" style="color: #00a651;"></i>
                                <?php endif;?>
                                <?php if ($status == "2"):?>
                                    <i class="fa fa-circle" style="color: #EE4749;"></i>
                                <?php endif;?>
								
								<?php if ($status == "3"):?>
                                    <i class="fa fa-circle" style="color: #000000;"></i>
                                <?php endif;?>
								
								<?php if ($status == "0"):?>
                                    <i class="fa fa-circle" style="color: #CCCCCC;"></i>
                                <?php endif;?>
								
								<?php if ($status == "4"):?>
                                    <i class="fa fa-circle" style="color: #0000FF;"></i>
                                <?php endif;?>
								
								<?php if ($status == "5"):?>
                                    <i class="fa fa-circle" style="color: #FF6600;"></i>
                                <?php endif;?>
                            </td>    
                           <?php 
                        }
                    ;?>
                </tr>
                <?php
                }
                ;?>
            </tbody>
        </table>
	<hr>
	
	
	<div class="form-group" align="left">
						<div class="col-sm-offset-3 col-sm-5">
            <a href="<?php echo base_url(); ?>teacher/attendance_report_print_view/<?php echo $class_id; ?>/<?php echo $section_id; ?>/<?php echo $month; ?>/<?php echo $year; ?>" class="btn btn-success btn-rounded btn-sm" target="_blank" style="color:white"><i class="fa fa-print"></i>&nbsp;Print</a>
        </div>
		</div>
		
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

    //function mark_all_present() {
      //  var status = $(".status");
        //for(var i = 0; i < status.length; i++)
          //  status[i].value = "1";
    //}

    //function mark_all_absent() {
      //  var status = $(".status");
        //for(var i = 0; i < status.length; i++)
       //     status[i].value = "2";
    //}//
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