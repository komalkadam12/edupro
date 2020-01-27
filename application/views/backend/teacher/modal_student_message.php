<?php
$edit_data = $this->db->get_where('student', array('student_id' => $param2))->result_array();
foreach ($edit_data as $row):
    ?>
			    <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-envelope"></i>&nbsp;&nbsp;<?php echo get_phrase('send_message');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

    <?php echo form_open(base_url() . 'teacher/message/send_new/', array('class' => 'form', 'enctype' => 'multipart/form-data')); ?>
                   
				   <div align="center">
		<img src="<?php echo $this->crud_model->get_image_url('student' , $row['student_id']);?>" class="img-circle" width="100" height="100" />
		</div>
		

                   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('student_name');?></label>
                    <div class="col-sm-12">
      					<input type="hidden" class="form-control" name="reciever"  value="student-<?php echo $row['student_id']; ?>" readonly="true">
						<input type="text" class="form-control"  value="<?php echo $row['name']; ?>" readonly="true">
                        </div>
                    </div>
			
					<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('message');?></label>
                    <div class="col-sm-12">
					<textarea name="message" class="form-control" id="optimum-editor" placeholder= "Please type your new message here for the selected student to read."></textarea>
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
    </div> </div>

    <?php
endforeach;
?>
     