<?php 
$edit_data	= $this->db->get_where('request_book' , array('request_book_id' => $param2) )->result_array();
?>
 <?php foreach($edit_data as $row):?>
	 <div class="row">
                    <div class="col-sm-12">
                        <div class="panel panel-info">
                            <div class="panel-heading"><?php echo get_phrase('book_return');?></div>
							<div class="panel-body table-responsive">
        <?php echo form_open(base_url(). 'student/request_book/do_update/'.$row['request_book_id'] , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

			 
    				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('return_book');?></label>
                    <div class="col-sm-12">
					
					<select name="return_status" class="form-control select2">
					<option value="">Select</option>
					<option value="awaiting">Return Book</option>
					</select>
						
                    </div>
                    </div>
					

                    <div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('return_book');?></button>
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
     