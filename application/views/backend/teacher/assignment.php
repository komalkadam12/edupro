 <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading">
							
							NEW ASSIGNMENT
						   
						   
                                <div class="pull-right"><a href="#" data-perform="panel-collapse"><i class="fa fa-plus"></i>&nbsp;&nbsp;ADD NEW ASSIGNMENT HERE<i class="btn btn-info btn-xs"></i></a> <a href="#" data-perform="panel-dismiss"></a> </div>
                            </div>
                            <div class="panel-wrapper collapse out" aria-expanded="true">
                                <div class="panel-body">
                <?php echo form_open(base_url().'teacher/assignment/create' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>
	
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_date');?></label>
                    <div class="col-sm-12">

                 	<input type="date" name="timestamp" value="2018-08-19" class="form-control datepicker" id="example-date-input" required>
				   
                    </div>
                </div>

              <?php $a = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
				 foreach ($a as $row4):
				 ?>
				 <input type="hidden" class="form-control" name="teacher_id" value="<?php echo $row4['teacher_id'];?>" data-validate="required">
<?php
								endforeach;
							  ?>
				
				
				 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_class');?></label>
                    <div class="col-sm-12">
                					<select name="class_id" id="class_id" type="text" class="form-control select2" required onchange="return get_class_subject()">
									<option value=""><?php echo get_phrase('select_class'); ?></option>
      								<?php $classes = $this->db->get_where('class', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
									foreach ($classes as $row2): ?>
                                        <option value="<?php echo $row2['class_id']; ?>" <?php if ($row['class_id'] == $row2['class_id']) echo 'selected'; ?>>
                                            <?php echo $row2['name']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
            </div>
        </div>
		
       <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('subject');?></label>
                    <div class="col-sm-12">
                <select name="subject_id" id="subject_id" class="form-control" required>
                    <?php
                    foreach ($subjects as $row):
                        ?>
                        <option value="<?php echo $row['subject_id'] ?>"><?php echo $row['name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
				
				
				
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                                <textarea rows="5" name="description" class="form-control textarea_editor"></textarea>
                            </div>
                        </div>
				
				
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_document');?></label>
                    <div class="col-sm-12">
<input type="file" name="file_name" class="form-control file2 inline btn btn-primary btn-sm" data-label="<i class='glyphicon glyphicon-file'></i> Browse" / required>
</div></div>
							
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('file_type');?></label>
                    <div class="col-sm-12">
							<select name="file_type" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('select_file_type'); ?></option>
                                <option value="image"><?php echo get_phrase('image'); ?></option>
                                <option value="docx"><?php echo get_phrase('doc'); ?></option>
                                <option value="pdf"><?php echo get_phrase('pdf'); ?></option>
                                <option value="text"><?php echo get_phrase('text'); ?></option>
                                <option value="other"><?php echo get_phrase('other'); ?></option>
                            </select>
							</div>
							</div>

                    
                    <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info btn-sm btn-rounded"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_assignment');?></button>
						</div>
					</div>
                <?php echo form_close();?>	
									
									
                                </div>
                            </div>
                        </div>
                    </div>
				</div>  
  
  
  
  
  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_assignments');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo get_phrase('date');?></th>
            <th><?php echo get_phrase('staff_name');?></th>
            <th><?php echo get_phrase('subject');?></th>
            <th><?php echo get_phrase('description');?></th>
            <th><?php echo get_phrase('class');?></th>
            <th><?php echo get_phrase('download');?></th>
            <th><?php echo get_phrase('options');?></th>
        </tr>
    </thead>

    <tbody>
        <?php 
                                $assignment	=	$this->db->get_where('assignment', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
                                foreach($assignment as $row):?>
            <tr>
                <td>
				
				<?php if ($row['file_type'] == 'jpg' || $row['file_type'] == 'image' || $row['file_type'] == 'jpeg' || $row['file_type'] == 'png' || $row['file_type'] == 'gif') { ?>
                        <img src="optimum/images/image.png"  style="max-height:30px;"/>
                    <?php } ?>
					
					 <?php if ($row['file_type'] == 'txt') { ?>
                        <img src="optimum/images/text.png"  style="max-height:30px;"/>
                    <?php } ?>
                    <?php if ($row['file_type'] == 'pdf') { ?>
                        <img src="optimum/images/pdf.jpg"  style="max-height:30px;"/>
                    <?php } ?>
                    <?php if ($row['file_type'] == 'docx') { ?>
                        <img src="optimum/images/doc.jpg"  style="max-height:30px;"/>
                    <?php } ?>
					<?php if ($row['file_type'] == 'other') { ?>
                        <img src="optimum/images/doc.jpg"  style="max-height:30px;"/>
                    <?php } ?>

				</td>
                <td><?php echo $row['timestamp']; ?></td>
                <td>
				 <?php $name = $this->db->get_where('teacher' , array('teacher_id' => $row['teacher_id'] ))->row()->name;
                     echo $name;?>
				</td>
                 <td>
                    <?php $name = $this->db->get_where('subject' , array('subject_id' => $row['subject_id'] ))->row()->name;
                     echo $name;?>
                </td>
                <td><?php echo $row['description']?></td>
                <td>
                    <?php $name = $this->db->get_where('class' , array('class_id' => $row['class_id'] ))->row()->name;
                     echo $name;?>
                </td>
                <td>
				
				 <a href="<?php echo base_url().'uploads/assignment/'.$row['file_name']; ?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-download"></i></button></a>

                </td>
                <td>
				
				                       <a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_assignment_edit/<?php echo $row['assignment_id']?>');" ><button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-pencil"></i></button></a>
				
                   
					 <a href="<?php echo base_url();?>teacher/assignment/delete/<?php echo $row['assignment_id']?>" ><button type="button" class="btn btn-danger btn-circle btn-xs" onclick="return confirm('Are you sure to delete?');"><i class="fa fa-times"></i></button></a>
					
                   
                </td>
            </tr>
               <?php endforeach;?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>

<script type="text/javascript">

    $(function () {
        get_class_subject();
    });
    function get_class_subject() {
        var class_id = $('#class_id :selected').val();
        $.ajax({
            url: '<?php echo base_url(); ?>admin/get_class_subject/' + class_id,
            async: false,
            success: function (response)
            {
                $('#subject_id').html(response);
            }
        });
    }

</script>