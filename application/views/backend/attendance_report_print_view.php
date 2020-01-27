<?php
    $system_name   =   $this->db->get_where('settings' , array('type'=>'system_name'))->row()->description;
?>
<?php
	$classes    =   $this->db->get('class')->result_array();
	foreach ($classes as $row) {
	    if(isset($class_id) && $class_id==$row['class_id']) $calss_name = $row['name'];
	}
	$sections    =   $this->db->get('section')->result_array();
	foreach ($sections as $row) {
	    if(isset($section_id) && $section_id==$row['section_id']) $section_name = $row['name'];
	}

    $full_date = "5"."-".$month."-".$year;
    $full_date = date_create($full_date);
    $full_date = date_format($full_date,"F, Y");

;?>
<!DOCTYPE html>
<html>
<head>
	 <title><?php echo $page_title;?>&nbsp;|&nbsp;<?php echo $system_name;?></title>
	<link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
</head>
<body>
<div class="printableArea">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	
				<div class="panel-body">
				
				<div align="center">
                <img src="<?php echo base_url() ?>uploads/logo.png" class="img-circle" width="80" height="80">
                </div>
			
	            <div align="center">
                    <span style="text-align: center;font-size: 32px;"><?php echo $this->db->get_where('settings' , array('type' =>'system_name'))->row()->description;?></span>
                    <br/>
                    <span style="text-align: center;font-size: 20px;"><?php echo $this->db->get_where('settings' , array('type' =>'address'))->row()->description;?></span>
                    <br/>
                    <span style="text-align: center;font-size: 26px;">ATTENDANCE REPORT</span>
				<hr>

            </div>
	
    <table border="1" style="width:100%; border-collapse:collapse;border: 1px solid #ccc; margin-top: 10px;">
        <thead>
            <tr>
                <td style="text-align: left;">Students | Date</td>
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
            <tr>
                <td style="text-align: left;">
				<img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" height="25" height="25">
				Mr <?php echo $row['name'];?></td>
                <?php 
                    for ($i=1; $i <= $days; $i++) {
                        $full_date = $year."-".$month."/".$i;
                        $verify_data    =   array(  'student_id' => $row['student_id'],
                                                'date' => $full_date);
                        $attendance = $this->db->get_where('attendance' , $verify_data)->row();
                        $status     = $attendance->status;
                        ?>
                        <td style="text-align: center;" data-class="">
                            <?php if ($status == "1"):?>
                                <h9 style="color:#009900">P</h9>
                            <?php endif;?>
                            <?php if ($status == "2"):?>
                                <h9 style="color:#FF0000">A</h9>
                            <?php endif;?>
							
							<?php if ($status == "3"):?>
                                <h9 style="color: #FF0000">H</h9>
                            <?php endif;?>
							
							<?php if ($status == "4"):?>
                                <h9 style="color: #000000">HD</h9>
                            <?php endif;?>
							
							<?php if ($status == "5"):?>
                                <h9 style="color: #0000CC">L</h9>
                            <?php endif;?>
							
							<?php if ($status == "0"):?>
                                <h9 style="color: #999999">U</h9>
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
<button id="print" class="btn btn-default btn-outline btn-xs" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
<hr>
	
	
</div>
</div>


<script src="<?php echo base_url();?>optimum/js/jquery.PrintArea.js" type="text/JavaScript"></script>
	 
	  <script>
    $(document).ready(function() {
        $("#print").click(function() {
            var mode = 'iframe'; //popup
            var close = mode == "popup";
            var options = {
                mode: mode,
                popClose: close
            };
            $("div.printableArea").printArea(options);
        });
    });
    </script>

</body>
</html>
