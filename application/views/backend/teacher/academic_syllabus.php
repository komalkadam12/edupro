<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('get_academic_syllabus');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
		<?php echo form_open(base_url() . 'teacher/academic_syllabus');?>

					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
                            <select name="class_id" class="form-control select2" required>
                              <option value=""><?php echo get_phrase('select_class_first');?></option>
                              		 <?php $classes = $this->db->get_where('class', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
					foreach ($classes as $row):
   					 ?>
                                		<option value="<?php echo $row['class_id'];?>">
												<?php echo $row['name'];?>
                                                </option>
                                    <?php
									endforeach;
								?>
                          </select>
                        </div>
                    </div> 

				<input type="hidden" name="operation" value="selection">

<div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info btn-sm btn-rounded"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('browse');?></button>
						</div>
					</div>
		<?php echo form_close();?>
<hr>
<?php if ($class_id != ''):?>


      
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
						<thead>
							<tr>
								<th>#</th>
								<th><?php echo get_phrase('title');?></th>
								<th><?php echo get_phrase('description');?></th>
                                 <th><?php echo get_phrase('subject');?></th>
								<th><?php echo get_phrase('uploader');?></th>
								<th><?php echo get_phrase('date_submitted');?></th>
								<th><?php echo get_phrase('file_name');?></th>
								<th><?php echo get_phrase('download_document');?></th>
							</tr>
						</thead>
						<tbody>

						<?php
							$count    = 1;
							$academic_syllabus = $this->db->get_where('academic_syllabus' , array(
								'class_id' => $class_id))->result_array();
							foreach ($academic_syllabus as $row):
						?>
							<tr>
								<td><?php echo $count++;?></td>
								<td><?php echo $row['title'];?></td>
								<td><?php echo $row['description'];?></td>
                                                                <td>
									<?php 
										echo $this->db->get_where('subject' , array(
											'subject_id' => $row['subject_id']
										))->row()->name;
									?>
								</td>
								<td>
									<?php 
										echo $this->db->get_where($row['uploader_type'] , array(
											$row['uploader_type'].'_id' => $row['uploader_id']
										))->row()->name;
									?>
								</td>
								<td><?php echo date("d/m/Y" , $row['timestamp']);?></td>
								<td>
									<?php echo substr($row['file_name'], 0, 20);?><?php if(strlen($row['file_name']) > 20) echo '...';?>
								</td>
								<td align="center">
									<a href="<?php echo base_url();?>teacher/download_academic_syllabus/<?php echo $row['academic_syllabus_code'];?>"
										class="btn btn-info btn-circle btn-xs">
										<i class="fa fa-download"></i>
									</a>
									
									
								</td>
							</tr>
						<?php endforeach;?>
							
						</tbody>
					</table>

<?php endif;?>




<?php if ($class_id == ''):?>
<div class="alert alert-danger" align="center">No Information Selected</div>



<?php endif;?>

</div>
</div>
</div>
</div>
</div>