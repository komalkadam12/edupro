<?php $eRRPermission = $this->db->get_where('student', array('student_id' => $this->session->userdata('login_user_id')))->row()->card_number; ?>
<?php if($eRRPermission['card_number'] == ''):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-warning">
                            <div class="panel-heading"> <i class="fa fa-warning"></i>&nbsp;&nbsp;<?php echo get_phrase('request_book'); ?></div>
										<div class="panel-body table-responsive">
										
										
				
You have not done your library registration. Therefore, you cannot request book(s). Kindly visit your school library to complete your registration. Else, you will be denied of requesting book(s)				
										
			</div>
		</div>
	</div>
</div>
	




<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('student', array('student_id' => $this->session->userdata('login_user_id')))->row()->card_number; ?>
<?php if($eRRPermission['card_number'] != ''):?>
<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('request_book'); ?></div>
										<div class="panel-body table-responsive">

<!----CREATION FORM STARTS---->
                	<?php echo form_open(base_url() . 'student/request_book/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>

                             <div class="form-group">
                                    <label class="col-md-12" for="example-text"><?php echo get_phrase('book_title');?></label>
                                    <div class="col-md-12">
                        <select name="book_id" class="form-control select2">
                            <option><?php echo get_phrase('select_category'); ?></option>
                            <?php
								$this->db->where('class_id' , $class_id);
								$this->db->where('status' , 'available');
									$books	=	$this->db->get('book')->result_array();
										foreach($books as $row):
											?>
                                <option value="<?php echo $row['book_id']; ?>">
                                    <?php echo $row['name']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
					<input type="hidden" class="form-control" name="request_status" value="pending" />
					<input type="hidden" class="form-control" name="return_status" value="pending" />		
					<input type="hidden" class="form-control" name="student_id" value="<?php echo $this->session->userdata('login_user_id'); ?>" />		
							
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('request_date');?></label>
                    <div class="col-sm-12">
						
		<input class="form-control m-r-10" name="request_date" type="date" value="" id="example-date-input" required>
                                </div>
                            </div>
							
							
				<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('return_date');?></label>
                    <div class="col-sm-12">
						
		<input class="form-control m-r-10" name="return_date" type="date" value="" id="example-date-input" required>
                                </div>
                            </div>
						
							
                            
                           <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-sm btn-rounded"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('request_book');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			</div>
		</div>
			<!----CREATION FORM ENDS-->
		
<div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('all_requests'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('book_name');?></div></th>
                    		<th><div><?php echo get_phrase('request_date');?></div></th>
                    		<th><div><?php echo get_phrase('return_date');?></div></th>
                    		<th><div><?php echo get_phrase('approval_status');?></div></th>
                    		<th><div><?php echo get_phrase('return_book');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($select_book as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('book',$row['book_id']);?></td>
							<td><?php echo $row['request_date'];?></td>
							<td><?php echo $row['return_date'];?></td>
							
							<td>
							<?php if($row['request_status'] == 'approved'):?> 
								<span class="label label-success"><?php echo $row['request_status'];?></span>
							<?php  endif; ?>
							
							<?php if($row['request_status'] == 'pending'):?> 
								<span class="label label-warning"><?php echo $row['request_status'];?></span>
							<?php  endif; ?>
							
							<?php if($row['request_status'] == 'declined'):?> 
								<span class="label label-danger"><?php echo $row['request_status'];?></span>
							<?php  endif; ?>
							
							
							</td>
							<td>
							
							<?php if($row['return_status'] == 'returned'):?> 
								<span class="label label-success"><?php echo $row['return_status'];?></span>
							<?php  endif; ?>

							<?php if($row['return_status'] == 'awaiting'):?> 
								<span class="label label-warning"><?php echo $row['return_status'];?></span>
							<?php  endif; ?>
							
							
							<?php if($row['return_status'] == 'pending' && $row['request_status'] == 'declined'):?> 
								<span class="label label-danger"><?php echo $row['request_status'];?></span>
							<?php  endif; ?>
							
							
							<?php if($row['return_status'] == 'pending' && $row['request_status'] == 'approved'):?> 
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/return_book/<?php echo $row['request_book_id'];?>');" 
                        	class="btn btn-info btn-rounded btn-sm" style="color:white"><i class="fa fa-edit"></i>&nbsp;return book</a>							
							<?php  endif; ?>
							
							<?php if($row['return_status'] == 'declined' && $row['request_status'] == 'approved'):?> 
							<a href="#" onclick="showAjaxModal('<?php echo base_url();?>modal/popup/return_book/<?php echo $row['request_book_id'];?>');" 
                        	class="btn btn-info btn-rounded btn-sm" style="color:white"><i class="fa fa-edit"></i>&nbsp;return book</a>	
							<span class="label label-danger"><?php echo $row['return_status'];?></span>						
							<?php  endif; ?>
							
							<?php if($row['return_status'] == 'pending' && $row['request_status'] == 'pending'):?> 
							<span class="label label-warning"><?php echo $row['return_status'];?></span>						
							<?php  endif; ?>
							
							
							
						
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
            <!----TABLE LISTING ENDS--->
<?php endif; ?>
