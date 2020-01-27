  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('staff_attendance');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<!----SETTING ATTENDANCE WITHOUT IMAGE STARTS HERE -->								
<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'atten1'))->row()->description; ?>
<?php if($eRRPermission['atten1'] != ''):?>

								<?php 
								$check	=	array(	'time_in' => date("Y-m-d"), 'staff_id' => $this->session->userdata('login_user_id'), 'account' => 'teacher');
								$this->db->order_by('staff_id' , 'desc');
								$query = $this->db->get_where('staff_attendance' , $check);
								$as		=	$query->result_array();
                                foreach($as as $row):?>	
								
								<input type="hidden" class="form-control m-r-10" name="time_in"  value="<?php echo $row ['staff_id']; ?>" readonly="true">
								<?php endforeach;?>  
								
								<!----PUNCH IN ATTENDANCE WITH IMAGE STARTS HERE -->
								<?php if($row['staff_id'] =='' && $row['time_in'] == '' && $row['time_out'] == ''):?>
		<a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/clock_in/<?php echo $this->session->userdata('login_user_id'); ?>');" ><button type="button" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-camera"></i>&nbsp;Punch IN</button></a>
								<?php endif;?>
								
								<!----PUNCH IN ATTENDANCE WITH IMAGE ENDS HERE -->
								
								
								
								<!----PUNCH OUT ATTENDANCE WITH IMAGE STARTS HERE -->	
								<?php if($row['time_out'] =='' && $row['time_in'] != '' && $row['staff_id'] != '' ):?>
					<a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/clock_out/<?php echo $row ['staff_attendance_id']; ?>');" ><button type="button" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-camera"></i>&nbsp;Punch OUT</button></a>
								
								<?php endif;?>
								<!----PUNCH OUT ATTENDANCE WITH IMAGE ENDS HERE -->		
										
								<?php endif; ?>
<!----SETTING ATTENDANCE WITHOUT IMAGE ENDS HERE -->
								
								
<!----SETTING ATTENDANCE WITHOUT IMAGE STARTS HERE -->									
<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'atten2'))->row()->description; ?>
<?php if($eRRPermission['atten2'] != ''):?>


								<?php 
								$check	=	array(	'time_in' => date("Y-m-d"), 'staff_id' => $this->session->userdata('login_user_id'), 'account' => 'teacher');
								$this->db->order_by('staff_id' , 'desc');
								$query = $this->db->get_where('staff_attendance' , $check);
								$as		=	$query->result_array();
                                foreach($as as $row):?>	
								
								<input type="hidden" class="form-control m-r-10" name="time_in"  value="<?php echo $row ['staff_id']; ?>" readonly="true">
								<?php endforeach;?>
								
								  
								<!----PUNCH IN ATTENDANCE WITHOUT IMAGE STARTS HERE -->	
								<?php if($row['staff_id'] =='' && $row['time_in'] == '' && $row['time_out'] == ''):?>
							
<?php echo form_open(base_url() . 'teacher/withnoimageInsert/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
								<button type="submit" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-check-square-o"></i>&nbsp;Punch IN</button>
								<?php echo form_close();?>	
								<?php endif;?>	
								<!----PUNCH IN ATTENDANCE WITHOUT IMAGE ENDS HERE -->	
								
								
								<!----PUNCH OUT ATTENDANCE WITHOUT IMAGE STARTS HERE -->	
								<?php if($row['time_out'] =='' && $row['time_in'] != '' && $row['staff_id'] != '' ):?>
<?php echo form_open(base_url() . 'teacher/withnoimageupdate/'.$row['staff_attendance_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

								<button type="submit" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-square-o"></i>&nbsp;Punch OUT</button>
								<?php echo form_close();?>	
								
								<?php endif;?>	
								<!----PUNCH OUT ATTENDANCE WITHOUT IMAGE ENDS HERE -->		


<?php endif; ?>
<!----SETTING ATTENDANCE WITHOUT IMAGE STARTS HERE -->
									               
								<hr><hr>
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>Image</div></th>
                    		<th><div><?php echo get_phrase('time_in');?></div></th>
                    		<th><div><?php echo get_phrase('image');?></div></th>
                    		<th><div><?php echo get_phrase('time_out');?></div></th>
                    		<th><div><?php echo get_phrase('image');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
						</tr>
					</thead>
                    <tbody>
<?php 
$staff_attendance	=	$this->db->get_where('staff_attendance', array('staff_id' => $this->session->userdata('login_user_id'), 'account' => 'teacher'))->result_array();
foreach($staff_attendance as $row):
?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['staff_id']);?>" class="img-circle" width="30" /></td>
							<td><?php echo $row ['time_in'] .'&nbsp;-&nbsp;'. $row['time']; ?></td>
							<td><img src="<?php echo base_url ();?>uploads/staff_attendance/<?php echo $row['webcam'];?>" class="img-circle" width="30" /></td>
							<td><?php echo $row ['time_out'] .'&nbsp;-&nbsp;'. $row['time2']; ?></td>
							<td><img src="<?php echo base_url ();?>uploads/staff_attendance/<?php echo $row['webcam2'];?>" class="img-circle" width="30" /></td>
							<td><span class="label label-<?php if($row['status']=='half')echo 'warning';else echo 'success';?>"><?php echo $row['status'].'&nbsp;'.'day';?></span></td>
							
							
                        </tr>
						<?php endforeach;?>                       
                    </tbody>
                </table>
				
				
			</div>
</div>
</div>
</div>
</div>
</div>
