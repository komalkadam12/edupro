<div class="row">
                    <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('manage_profile'); ?></div>
										<div class="panel-body table-responsive">
                <?php
                foreach ($edit_data as $row):
                    ?>
                    <?php echo form_open(base_url() . 'teacher/manage_profile/update_profile_info', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top', 'enctype' => 'multipart/form-data')); ?>

                    <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('name');?>*</label>        
					 <div class="col-sm-12">
                            <input type="text" class="form-control" name="name" value="<?php echo $row['name']; ?>"/ required>
                        </div>
                    </div>

                    <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('email');?>*</label>        
					 <div class="col-sm-12">
                            <input type="email" class="form-control" name="email" value="<?php echo $row['email']; ?>"/ required>
                        </div>
                    </div>
					
					
					<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="userfile">
					 <img id="blah" src="<?php echo $this->crud_model->get_image_url('teacher', $row['teacher_id']); ?>" alt="" height="200" width="200"/>
					</div>
					</div>	
					


                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info btn-sm btn-circle"><i class="fa fa-plus"></i></button>
							 <button type="reset" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-times"></i></button>

                        </div>
                    </div>
                    <br>
                    </form>
                    <?php
                endforeach;
                ?>
            </div>
        </div>
	</div>
        <!----EDITING FORM ENDS-->


<div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-lock"></i>&nbsp;&nbsp;<?php echo get_phrase('change_password'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
								
								 <?php
                foreach ($edit_data as $row):
                    ?>
                    <?php echo form_open(base_url() . 'teacher/manage_profile/change_password', array('class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>

						<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('current_password');?>*</label>        
					 <div class="col-sm-12">
                            <input type="text" class="form-control" name="password" value="<?php echo $row['password'];?>"/ required>
                        </div>
                    </div>
					
					
                    <div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('new_password');?>*</label>        
					 <div class="col-sm-12">
                            <input type="password" class="form-control" name="new_password" value=""/ required>
                        </div>
                    </div>
					
						
						<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('confirm_new_password');?>*</label>        
					 <div class="col-sm-12">
                            <input type="password" class="form-control" name="confirm_new_password" value=""/ required>
                        </div>
                    </div>
					
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-5">
                            <button type="submit" class="btn btn-info btn-sm btn-circle"><i class="fa fa-plus"></i></button>
                            <button type="reset" class="btn btn-danger btn-sm btn-circle"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
        
                    </form>
                    <?php
                endforeach;
                ?>
			
 								
			</div>
			</div>
			</div>
			</div>
			</div>
            <!----TABLE LISTING ENDS--->