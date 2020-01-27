<?php
$edit_data = $this->db->get_where('teacher', array('teacher_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>
	 <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><?php echo get_phrase('new_message');?></div>
			 
    <?php echo form_open(base_url() . 'teacher/message/send_new/', array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>
                   
				   <div align="center">
		<img src="<?php echo $this->crud_model->get_image_url('teacher' , $row['teacher_id']);?>" class="img-circle" width="100" height="100" />
		</div>
		
		
		<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('teacher_nameme');?></label>
                    <div class="col-sm-12">

      					<input type="hidden" class="form-control" name="reciever"  value="teacher-<?php echo $row['teacher_id']; ?>" readonly="true">
						<input type="text" class="form-control"  value="<?php echo $row['name']; ?>" readonly="true">
                        </div>
                    </div>
					
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('message');?></label>
                    <div class="col-sm-12">
					 <textarea rows="5" class="form-control" name="message"></textarea>
						</div>
						</div>

                    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-envelope"></i>&nbsp;<?php echo get_phrase('send_message');?></button>
						</div>
					</div>
					
                    <?php echo form_close(); ?>
					
                </div>
            </div>
        </div>
    </div>

    <?php
endforeach;
?>
     