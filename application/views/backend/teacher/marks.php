
					<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('student_mark'); ?></div>
                               <div class="panel-body table-responsive">

            <!----TABLE LISTING STARTS-->
            <div class="tab-pane  <?php if(!isset($edit_data) && !isset($personal_profile) && !isset($academic_result) )echo 'active';?>" id="list">
				
                <?php echo form_open(base_url() . 'teacher/manage_marks');?>
               
			    <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_exam');?></label>
                    <div class="col-sm-12">
                	
                        	<select name="exam_id" class="form-control select2" required>
                                <option value=""><?php echo get_phrase('select_an_exam');?></option>
                                <?php 
                                $exams = $this->db->get('exam')->result_array();
                                foreach($exams as $row):
                                ?>
                                    <option value="<?php echo $row['exam_id'];?>"
                                        <?php if($exam_id == $row['exam_id'])echo 'selected';?>>
                                           <?php echo $row['name'];?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
							</div>
							</div>
							
							 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('select_class');?></label>
                    <div class="col-sm-12">
                        
                        	<select name="class_id" class="form-control select2"  onchange="show_students(this.value)"  required>
                                <option value=""><?php echo get_phrase('select_a_class');?></option>
                                <?php 
                                $classes = $this->db->get('class')->result_array();
                                foreach($classes as $row):
                                ?>
                                    <option value="<?php echo $row['class_id'];?>"
                                        <?php if($class_id == $row['class_id'])echo 'selected';?>>
                                            Class <?php echo $row['name'];?></option>
                                <?php
                                endforeach;
                                ?>
                            </select>
                     </div>
				</div>
                        	<!---SELECT SUBJECT ACCORDING TO SELECTED CLASS-->
				 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('students');?></label>
                    <div class="col-sm-12">
					
							<?php 
                                $classes	=	$this->crud_model->get_classes(); 
                                foreach($classes as $row): ?>
                                
                                <select name="<?php if($class_id == $row['class_id'])echo 'student_id';else echo 'temp';?>" 
                                      id="student_id_<?php echo $row['class_id'];?>" 
                                          style="display:<?php if($class_id == $row['class_id'])echo 'block';else echo 'none';?>;" class="form-control"  >
                                  
                                    <option value="">Students of class <?php echo $row['name'];?></option>
                                    
                                    <?php 
                                    $students	=	$this->crud_model->get_students($row['class_id']); 
                                    foreach($students as $row2): ?>
                                    <option class="student_id" value="<?php echo $row2['student_id'];?>"
                                        <?php if(isset($student_id) && $student_id == $row2['student_id'])
                                                echo 'selected="selected"';?>><?php echo $row2['name'];?>
                                    </option>
                                    <?php endforeach;?>
                                    
                                    
                                </select>  
                            <?php endforeach;?>
                      </div>
				</div>
                            
							 <div class="form-group">
                    <div class="col-sm-12">
							
                            <select name="temp" id="student_id_0"  
                              style="display:<?php if(isset($student_id) && $student_id >0)echo 'none';else echo 'block';?>;" class="form-control">
                                    <option value="">Select a class first</option>
                            </select> 
							</div>
							</div>
							
                        	<input type="hidden" name="operation" value="selection" />
		
		  <div class="form-group">
						<div class="col-sm-offset-3 col-sm-5">
						
        <button type="submit" class="btn btn-info btn-rounded btn-sm "><i class="fa fa-search"></i>&nbsp;<?php echo get_phrase('browse_marks'); ?></button>
		</div>
		</div>

                </form>
              
				</div>
        	</div>
        </div>
	</div>
 </div>

                
                <?php if($exam_id >0 && $class_id >0 && $student_id >0 ):?>
                <?php 
						////CREATE THE MARK ENTRY ONLY IF NOT EXISTS////
						$students	=	$this->crud_model->get_subjects_by_class($class_id);
						foreach($students as $row):
							$verify_data	=	array(	'exam_id' => $exam_id ,
														'class_id' => $class_id ,
														'subject_id' => $row['subject_id'] , 
														'student_id' => $student_id);
							$query = $this->db->get_where('mark' , $verify_data);
							
							if($query->num_rows() < 1)
								$this->db->insert('mark' , $verify_data);
						 endforeach;
				?>

					
					<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('enter_student_score'); ?></div>
                               <div class="panel-body table-responsive">
							   
    <table cellpadding="0" cellspacing="0" border="0" class="table">
                    <thead>
                        <tr>
                            <td><?php echo get_phrase('subject');?></td>
                            <td><?php echo get_phrase('1st score');?></td>
                            <td><?php echo get_phrase('2nd score');?></td>
                            <td><?php echo get_phrase('3rd score');?></td>
                            <td><?php echo get_phrase('4th score');?></td>
                            <td><?php echo get_phrase('exam score');?></td>
                            <td><?php echo get_phrase('comment');?></td>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <?php 
						$students	=	$this->crud_model->get_subjects_by_class($class_id);
						foreach($students as $row):
						
							$verify_data =   array(  'exam_id' => $exam_id ,
                                                        'class_id' => $class_id ,
                                                        'subject_id' => $row['subject_id'] , 
                                                        'student_id' => $student_id);
														
							$query = $this->db->get_where('mark' , $verify_data);							 
							$marks	=	$query->result_array();
							foreach($marks as $row2):
							?>
                            <?php echo form_open(base_url() . 'teacher/marks/' . $exam_id . '/' . $class_id);?>
							<tr>
								<td>
									<?php echo $row['name'];?>
								</td>
                <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score'];?>" name="class_score_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
				  <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score2'];?>" name="class_score2_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
				  <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score3'];?>" name="class_score3_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
				  <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score4'];?>" name="class_score4_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
								<td>
									 <input type="number" class="exam_score form-control" style="border:none;" value="<?php echo $row2['mark_obtained'];?>" name="mark_obtained_<?php echo $row['subject_id'];?>" onchange="exam_score_change()">
								</td>
								<td>
									<textarea name="comment_<?php echo $row['subject_id'];?>" class="form-control"><?php echo $row2['comment'];?></textarea>
								</td>
                                	<input type="hidden" name="mark_id_<?php echo $row['subject_id'];?>" value="<?php echo $row2['mark_id'];?>" />
                                    
                                	<input type="hidden" name="exam_id" value="<?php echo $exam_id;?>" />
                                	<input type="hidden" name="class_id" value="<?php echo $class_id;?>" />
                                	<input type="hidden" name="student_id" value="<?php echo $student_id;?>" />
                                    
                                	<input type="hidden" name="operation" value="update" />
							 </tr>

                            
                         	<?php 
							endforeach;
						 endforeach;
						 ?>
                     </tbody>
                  </table>
				  
        	
				  
				  
				    <?php if($row2['class_score'] == ''):?>
							<div class="alert alert-danger" align="center">Add Subject To Selected Class First&nbsp;&nbsp;
		<a href="<?php echo base_url();?>teacher/subject/"><button type="button" class="btn btn-circle btn-info btn-sm"><i class="fa fa-plus"></i></button></a>
					</div>
					<?php endif;?>
				 
				
                  <h5 id="error_message"  align="center" style="color: red;display: none;margin-left: 50px;"><strong style="color:#FF0000">Class score must be less than 10 or equal to 10 and exam score must be less than or equal to 70</strong></h5>
				   <?php if($row2['class_score'] != ''):?>
							 
                      <button type="submit" class="btn btn-sm btn-rounded  btn-info"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('update_marks');?></button>
                  
							<?php endif;?>
                 
                  <?php echo form_close();?>
            
</div>
        </div>
	</div>
 </div>            <?php endif;?>
			
            <!----TABLE LISTING ENDS-->
            
 
<?php if($exam_id == 0 && $class_id == 0 && $student_id == 0 ):?>
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('student_mark'); ?></div>
                               <div class="panel-body table-responsive">
                <?php 
						////CREATE THE MARK ENTRY ONLY IF NOT EXISTS////
						$students	=	$this->crud_model->get_subjects_by_class($class_id);
						foreach($students as $row):
							$verify_data	=	array(	'exam_id' => $exam_id ,
														'class_id' => $class_id ,
														'subject_id' => $row['subject_id'] , 
														'student_id' => $student_id);
							$query = $this->db->get_where('mark' , $verify_data);
							
							if($query->num_rows() < 1)
								$this->db->insert('mark' , $verify_data);
						 endforeach;
				?>
    <table cellpadding="0" cellspacing="0" border="0" class="table">
                    <thead>
                        <tr>
                            <td><?php echo get_phrase('subject');?></td>
                            <td><?php echo get_phrase('1st score');?></td>
                            <td><?php echo get_phrase('2nd score');?></td>
                            <td><?php echo get_phrase('3rd score');?></td>
                            <td><?php echo get_phrase('4th score');?></td>
                            <td><?php echo get_phrase('exam score');?></td>
                            <td><?php echo get_phrase('comment');?></td>
                        </tr>
                    </thead>
                    <tbody>
                    	
                        <?php 
						$students	=	$this->crud_model->get_subjects_by_class($class_id);
						foreach($students as $row):
						
							$verify_data =   array(  'exam_id' => $exam_id ,
                                                        'class_id' => $class_id ,
                                                        'subject_id' => $row['subject_id'] , 
                                                        'student_id' => $student_id);
														
							$query = $this->db->get_where('mark' , $verify_data);							 
							$marks	=	$query->result_array();
							foreach($marks as $row2):
							?>
                            <?php echo form_open(base_url() . 'teacher/marks/' . $exam_id . '/' . $class_id);?>
							<tr>
								<td>
									<?php echo $row['name'];?>
								</td>
                <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score'];?>" name="class_score_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
				  <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score2'];?>" name="class_score2_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
				  <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score3'];?>" name="class_score3_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
				  <td>
<input type="number" class="class_score form-control" value="<?php echo $row2['class_score4'];?>" name="class_score4_<?php echo $row['subject_id'];?>" onchange="class_score_change()">
                </td>
								<td>
									 <input type="number" class="exam_score form-control" style="border:none;" value="<?php echo $row2['mark_obtained'];?>" name="mark_obtained_<?php echo $row['subject_id'];?>" onchange="exam_score_change()">
								</td>
								<td>
									<textarea name="comment_<?php echo $row['subject_id'];?>" class="form-control"><?php echo $row2['comment'];?></textarea>
								</td>
                                	<input type="hidden" name="mark_id_<?php echo $row['subject_id'];?>" value="<?php echo $row2['mark_id'];?>" />
                                    
                                	<input type="hidden" name="exam_id" value="<?php echo $exam_id;?>" />
                                	<input type="hidden" name="class_id" value="<?php echo $class_id;?>" />
                                	<input type="hidden" name="student_id" value="<?php echo $student_id;?>" />
                                    
                                	<input type="hidden" name="operation" value="update" />
							 </tr>

                            
                         	<?php 
							endforeach;
						 endforeach;
						 ?>
                     </tbody>
                  </table>
				  
				  <div class="alert alert-danger" align="center">No Informtion to be displayed right now, please EXAM, CLASS AND STUDENT</div>
                
				  

                  <?php echo form_close();?>
            
            <!----TABLE LISTING ENDS-->
   </div>    
   </div>
   </div>
   </div>  
               <?php endif;?>
   

<script type="text/javascript">
  function show_students(class_id)
  {
      for(i=0;i<=50;i++)
      {

          try
          {
              document.getElementById('student_id_'+i).style.display = 'none' ;
	  		  document.getElementById('student_id_'+i).setAttribute("name" , "temp");
          }
          catch(err){}
      }
      if (class_id == "") {
        class_id = "0";
      }
      document.getElementById('student_id_'+class_id).style.display = 'block' ;
	  document.getElementById('student_id_'+class_id).setAttribute("name" , "student_id");
      var student_id = $(".student_id");
      for(var i = 0; i < student_id.length; i++)
        student_id[i].selected = "";
  }


function class_score_change() {
  var class_scores = document.getElementsByClassName('class_score');
   for (var i = class_scores.length - 1; i >= 0; i--) {
      var value = class_scores[i].value;
     if (value > 10) {
        class_scores[i].value = 0;
        $('#error_message').show();
      }
    }
  }
 

  function exam_score_change() {
    var exam_scores = document.getElementsByClassName('exam_score');
    for (var i = exam_scores.length - 1; i >= 0; i--) {
      var value = exam_scores[i].value;
      if (value > 70) {
        exam_scores[i].value = 0;
        $('#error_message').show();
      }
    }
  }

</script> 