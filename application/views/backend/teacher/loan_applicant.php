 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('loan_applicant');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">   
    <?php echo form_open(base_url() . 'teacher/loan_applicant/create' , 
      array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
            
		  			<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_date');?></label>
                    <div class="col-sm-12">
								<input type="date" name="date" value="2018-08-19" class="form-control datepicker" id="example-date-input" required>
                            </div>
                        </div>

							<?php $classes = $this->db->get_where('teacher', array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
							foreach ($classes as $row):
    						?>
	                     <input type="hidden" class="form-control" name="staff_name" value="<?php echo $row['teacher_id'];?>" / required>
	                     <input type="hidden" class="form-control" name="name" value="<?php echo $row['name'];?>" / required>
                
                         <?php
						endforeach;
						?>
                   
                    
                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('loan_amount');?></label>
                    <div class="col-sm-12">
                          <input type="number" class="form-control" name="amount" / required>
                      </div>
                  </div>
                    
                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('purpose');?></label>
                    <div class="col-sm-12">
                          <textarea rows="10" class="form-control textarea_editor" name="purpose"></textarea>                      
				   </div>
                  </div>
                    
                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('duration');?></label>
                    <div class="col-sm-12">

						<select name="l_duration" class="form-control select2" required>
				  <option value="One Month">One Month</option>
				  <option value="Two Month">Two Months</option>
				  <option value="Three Months">Three Months</option>
				  <option value="Four Months">Four Months</option>
				   <option value="Five Month">Five Month</option>
				  <option value="Six Month">Six Months</option>
				  <option value="Seven Months">Seven Months</option>
				  <option value="Eight Months">Eight Months</option>
				  <option value="Nine Months">Nine Months</option>				 
				   <option value="Ten Months">Ten Months</option>
				  <option value="Eleven Months">Eleven Months</option>
				  <option value="One Year">One Year</option>
				  <option value="Two Years">Two Years</option>
				  <option value="Above Two Years">Above Two Years</option>
				  </select>
					                  
                      </div>
                  </div>
                    
                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('payment_mode');?></label>
                    <div class="col-sm-12">

						<select name="mop" class="form-control select2" required>
				  <option value="Daily">Daily</option>
				  <option value="Weekly">Weekly</option>
				  <option value="Bi-weekly">Bi-weekly</option>
				  <option value="Monthly">Monthly</option>
				  <option value="Bi-Monthly">Bi-Monthly</option>
				  <option value="Yearly">Yearly</option>
				  </select>                              
                      </div>
                  </div>
<hr>	
<div class="alert-danger">&nbsp;GUARANTOR'S INFORMATION</div>
<hr>
	
					  
					  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('guarantor_name');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="g_name"  / required>
                              
                      </div>
                  </div>
				  
					   
					  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('relationship');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="g_relationship"  / required>
                              
                      </div>
                  </div>

					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('guarantor_number');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="g_number"  /required>
                              
                      </div>
                  </div>

					  
					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('guarantor_address');?></label>
                    <div class="col-sm-12">
                          <textarea type="text" class="form-control" rows="5" name="g_address" required></textarea>
                              
                      </div>
                  </div>
				  
					  
					  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('guanrator_country');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="g_country"  /required>
                              
                      </div>
                  </div>
<hr>	
<div class="alert-danger">&nbsp;COLLATERAL INFORMATION</div>
<hr>

					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('collaral_name');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="c_name"  /required>
                              
                      </div>
                  </div>
				  
					  
					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('collaral_type');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="c_type"  /required>
                              
                      </div>
                  </div>

					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('collaral_model');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="model"  /required>
                              
                      </div>
                  </div>
				  
					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('collaral_make');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="make"  /required>
                              
                      </div>
                  </div>
				  
					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('serial_number');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="serial_number"  /required>
                              
                      </div>
                  </div>
				  
					  
					   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('collateral_value');?></label>
                    <div class="col-sm-12">
                          <input type="number" class="form-control" name="value" placeholder= "How Much Does it Worth" /required>
                              
                      </div>
                  </div>
				  
				 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('condition');?></label>
                    <div class="col-sm-12">
				  <select name="condition" class="form-control select2" required>
				  <option value="Daily">fair</option>
				  <option value="Weekly">Bad</option>
				  <option value="Bi-weekly">Good</option>
				  <option value="Monthly">Others</option>
				  </select>                              
                      </div>
                  </div>
				  
						
						 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('collateral_documents');?></label>
                    <div class="col-sm-12">
                        <input type="file" name="file_name" class="form-control file2 inline btn btn-orange" data-label="<i class='glyphicon glyphicon-file'></i> Browse" / required>
						<br>
						<p style="color:red" align="center">Note that you are to submit hardcopy the adminstrattive officer for proper verifications.
												   You can upload zip files here, so zip all the documents and upload here.</p>

                    </div>
                    </div>
				  
					  
					  	 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('status');?></label>
                    <div class="col-sm-12">
                          <input type="text" class="form-control" name="status" value="Pending" readonly="true"/required>
                              
                      </div>
                  </div>
                
                  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
							<button type="submit" class="btn btn-info btn-sm btn-rounded"> <i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('apply_now');?></button>
						</div>
					</div>
                    <?php echo form_close();?>

        </div>
        
        </div>
		</div>
		</div>
		</div>
		