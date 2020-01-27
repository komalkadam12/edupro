<?php 
$single_study_material_info = $this->db->get_where('assignment', array('assignment_id' => $param2))->result_array();
foreach ($single_study_material_info as $row) {
?>
       <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('edit_assignment');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
                    <form role="form" class="form-horizontal form-groups-bordered" action="<?php echo base_url(); ?>teacher/assignment/do_update/<?php echo $row['assignment_id'] ?>" method="post" enctype="multipart/form-data">

                      <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_date');?></label>
                    <div class="col-sm-12">
                 <input type="date" name="timestamp"  class="form-control datepicker" id="example-date-input"  value="<?php echo $row['timestamp']; ?>">
                                </div>
                            </div>
							
							
                  <input type="hidden" class="form-control" name="teacher_id" value="<?php echo $row['teacher_id'];?>" data-validate="required">

						
						
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_class');?></label>
                    <div class="col-sm-12">
                <select name="class_id" class="form-control" required id="class_id" 
                                    data-message-required="<?php echo get_phrase('value_required'); ?>"
                                    onchange="return get_class_subjects(this.value)">
                                <option value=""><?php echo get_phrase('select'); ?></option>
                                <?php $classes = $this->db->get_where('class', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
                                foreach ($classes as $row2):
                                    ?>
                                    <option value="<?php echo $row2['class_id']; ?>"
                                            <?php if ($row['class_id'] == $row2['class_id']) echo 'selected'; ?>>
                                                <?php echo $row2['name']; ?>
                                    </option>
                                    <?php
                                endforeach;
                                ?>
                            </select>
                            </div>
                        </div>
						
						
                        
                        <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('subject');?></label>
                    <div class="col-sm-12">
               <select name="subject_id" class="form-control" id="subject_selector_holder">
		                            <option value=""><?php echo get_phrase('select_class_first');?></option>
			                        
			                    </select>
            </div>
        </div>
                        
                    
                        <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('description');?></label>
                    <div class="col-sm-12">
                                <textarea rows="5" name="description" class="form-control"><?php echo $row['description']; ?></textarea>
                            </div>
                        </div>
						
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('file_type');?></label>
                    <div class="col-sm-12">
						
						<select name="file_type" class="form-control select2">
                                <option value=""><?php echo get_phrase('select'); ?></option>
                                <option value="image" <?php if ($row['file_type'] == 'image') echo 'selected'; ?>><?php echo get_phrase('image'); ?></option>
                                <option value="docx"<?php if ($row['file_type'] == 'docx') echo 'selected'; ?>><?php echo get_phrase('docx'); ?></option>
								<option value="text" <?php if ($row['file_type'] == 'text') echo 'selected'; ?>><?php echo get_phrase('text'); ?></option>
                                <option value="pdf"<?php if ($row['file_type'] == 'pdf') echo 'selected'; ?>><?php echo get_phrase('pdf'); ?></option>
                                <option value="other"<?php if ($row['file_type'] == 'other') echo 'selected'; ?>><?php echo get_phrase('other'); ?></option>
                            </select>
							
							</div>
							</div>

                      
                       <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info btn-sm btn-rounded"><i class="fa fa-pencil"></i>&nbsp;<?php echo get_phrase('update_assignment');?></button>
						</div>
					</div>
                    </form>

        </div>
    </div>
<?php } ?>


<script type="text/javascript">

	function get_class_subjects(class_id) {

    	$.ajax({
            url: '<?php echo base_url();?>admin/get_class_subject/' + class_id ,
            success: function(response)
            {
                jQuery('#subject_selector_holder').html(response);
            }
        });

    }

</script>