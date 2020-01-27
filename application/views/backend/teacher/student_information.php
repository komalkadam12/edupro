 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_students');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
		<?php echo form_open(base_url() . 'teacher/student_information');?>

					                       
                        <div class="form-group">
                        <div class="col-sm-12">
                            <select name="class_id" class="form-control select2" onchange='this.form.submit()' required>
                              <option value=""><?php echo get_phrase('select_class_first');?></option>
                              		<?php 
                                $classes = $this->db->get('class')->result_array();
                                foreach($classes as $row):
                                ?>
                                    <option value="<?php echo $row['class_id'];?>"
                                        <?php if($class_id == $row['class_id'])echo 'selected';?>>
                                           <?php echo $row['name'];?></option>
                                <?php
                                endforeach;
                                ?>
                          </select>
						 
                        </div>
                    </div> 

				<input type="hidden" name="operation" value="selection">

<noscript><button type="submit" class="btn btn-success btn-xs"><i class="entypo-search"></i><?php echo get_phrase('get_student_list');?></button></noscript>

		<?php echo form_close();?>
		
</div>
</div>
</div>
</div>
</div>
<?php if ($class_id != ''):?>


  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_students');?>
							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
      
        <ul class="nav nav-tabs" role="tablist">
            <li  class="active nav-item">
                <a href="#home" class="nav-link" aria-controls="home" role="tab" data-toggle="tab">
                    <span class="visible-xs"><i class="fa fa-users"></i></span>
                    <span class="hidden-xs"><?php echo get_phrase('all_students'); ?></span>
                </a>
            </li>
            <?php
            $query = $this->db->get_where('section', array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
                    ?>
                    <li>
                        <a href="#<?php echo $row['section_id']; ?>" role="tab" data-toggle="tab">
                            <span class="visible-xs"><i class="fa fa-user"></i></span>
                            <span class="hidden-xs"><?php echo get_phrase('section'); ?> <?php echo $row['name']; ?> ( <?php echo $row['nick_name']; ?> )</span>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

        <div class="tab-content">
            <div class="tab-pane active" id="home">
 				<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('roll'); ?></div></th>
                            <th width="80"><div><?php echo get_phrase('photo'); ?></div></th>
                            <th><div><?php echo get_phrase('name'); ?></div></th>
                            <th><div><?php echo get_phrase('mother_tongue'); ?></div></th>
                            <th><div><?php echo get_phrase('age'); ?></div></th>
                            <th><div><?php echo get_phrase('religion'); ?></div></th>
                            <th><div><?php echo get_phrase('sex'); ?></div></th>
                            <th class="span3"><div><?php echo get_phrase('address'); ?></div></th>
                            <th><div><?php echo get_phrase('email'); ?></div></th>
                            <th><div><?php echo get_phrase('options'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
                        foreach ($students as $row):
                        ?>
                            <tr>
                                <td><?php echo $row['roll']; ?></td>
                                <td><img src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>" class="img-circle" width="30" height="30" /></td>
                                <td><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_profile/<?php echo $row['student_id']; ?>');"><?php echo $row['name']; ?></a></td>
								<td><?php echo $row['m_tongue']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['religion']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
								
								 								 
<a href="<?php echo base_url(); ?>teacher/view_student/<?php echo $row['student_id'];?>/"> <button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-link"></i></button></a>
								
<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_message/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-envelope"></i></button></a>
                                   
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

            </div>
            <?php
            $query = $this->db->get_where('section', array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
                    ?>
                    <div class="tab-pane" id="<?php echo $row['section_id']; ?>">

 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="80"><div><?php echo get_phrase('roll'); ?></div></th>
                                    <th width="80"><div><?php echo get_phrase('photo'); ?></div></th>
                                    <th><div><?php echo get_phrase('name'); ?></div></th>
                            		<th><div><?php echo get_phrase('mother_tongue'); ?></div></th>
                            		<th><div><?php echo get_phrase('age'); ?></div></th>
                            		<th><div><?php echo get_phrase('religion'); ?></div></th>
                                    <th class="span3"><div><?php echo get_phrase('address'); ?></div></th>
                                    <th><div><?php echo get_phrase('email'); ?></div></th>
                                    <th><div><?php echo get_phrase('options'); ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students = $this->db->get_where('student', array(
                                            'class_id' => $class_id, 'section_id' => $row['section_id']
                                        ))->result_array();
                                foreach ($students as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['roll']; ?></td>
                                        <td><img src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>" class="img-circle" width="30" height="30" /></td>
                                <td><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_profile/<?php echo $row['student_id']; ?>');"><?php echo $row['name']; ?></a></td>
								<td><?php echo $row['m_tongue']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['religion']; ?></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>

                                           <a href="<?php echo base_url();?>admin/student_edit/<?php echo $row['student_id'];?>"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-edit"></i></button></a></a>
								 								 
<a href="<?php echo base_url(); ?>admin/view_student/<?php echo $row['student_id'];?>/"> <button type="button" class="btn btn-success btn-circle btn-xs"><i class="fa fa-link"></i></button></a>
								
<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_message/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-warning btn-circle btn-xs"><i class="fa fa-envelope"></i></button></a>
																
<!--<a href="<?php echo base_url(); ?>admin/student_marksheet/<?php echo $row['student_id']; ?>" target="_blank"><button type="button" class="btn btn-success btn-xs"><i class="entypo-chart-bar"></i></button></a>-->
								 
<a href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/student/<?php echo $class_id; ?>/delete/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>

								 <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/student_identity_card/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-info btn-circle btn-xs" style="color:white"><i class="fa fa-hospital-o"></i></button></a>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
        </div>
<?php endif;?>



<?php if ($class_id == ''):?>


  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_students');?>
							<a href="<?php echo base_url();?>admin/new_student"><button type="button"  class="btn btn-info btn-xs pull-right"><i class="fa fa-plus"></i>ADD NEW STUDENT</button></a>

							</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
      
       

 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('roll'); ?></div></th>
                            <th width="80"><div><?php echo get_phrase('photo'); ?></div></th>
                            <th><div><?php echo get_phrase('name'); ?></div></th>
                            <th><div><?php echo get_phrase('mother_tongue'); ?></div></th>
                            <th><div><?php echo get_phrase('age'); ?></div></th>
                            <th><div><?php echo get_phrase('religion'); ?></div></th>
                            <th><div><?php echo get_phrase('sex'); ?></div></th>
                            <th class="span3"><div><?php echo get_phrase('address'); ?></div></th>
                            <th><div><?php echo get_phrase('email'); ?></div></th>
                            <th><div><?php echo get_phrase('options'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $students = $this->db->get_where('student', array('class_id' => $class_id))->result_array();
                        foreach ($students as $row):
                            ?>
                            <tr>
                                <td><?php echo $row['roll']; ?></td>
                                <td><img src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>" class="img-circle" width="30" height="30" /></td>
                                <td><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_profile/<?php echo $row['student_id']; ?>');"><?php echo $row['name']; ?></a></td>
								<td><?php echo $row['m_tongue']; ?></td>
                                <td><?php echo $row['age']; ?></td>
                                <td><?php echo $row['religion']; ?></td>
                                <td><?php echo $row['sex']; ?></td>
                                <td><?php echo $row['address']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td>
								
								 <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_edit/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-blue btn-xs"><i class="entypo-pencil"></i></button></a>
								 								 
								<a href="<?php echo base_url(); ?>admin/view_student/<?php echo $row['student_id'];?>/"> <button type="button" class="btn btn-orange btn-xs"><i class="entypo-user"></i></button></a>
								
																 <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_message/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-green btn-xs"><i class="entypo-mail"></i></button></a>
								
								

								
								<!--<a href="<?php echo base_url(); ?>admin/student_marksheet/<?php echo $row['student_id']; ?>" target="_blank"><button type="button" class="btn btn-success btn-xs"><i class="entypo-chart-bar"></i></button></a>-->
								 
								 <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/student/<?php echo $class_id; ?>/delete/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-red btn-xs"><i class="entypo-trash"></i></button></a>
								 
								 								<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/student_identity_card/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-fa-building-o"></i></button></a>


                                   
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
			<div class="alert alert-danger" align="center">No Information Selected</div>
            <?php
            $query = $this->db->get_where('section', array('class_id' => $class_id));
            if ($query->num_rows() > 0):
                $sections = $query->result_array();
                foreach ($sections as $row):
                    ?>
                   

 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr>
                                    <th width="80"><div><?php echo get_phrase('roll'); ?></div></th>
                                    <th width="80"><div><?php echo get_phrase('photo'); ?></div></th>
                                    <th><div><?php echo get_phrase('name'); ?></div></th>
                                    <th class="span3"><div><?php echo get_phrase('address'); ?></div></th>
                                    <th><div><?php echo get_phrase('email'); ?></div></th>
                                    <th><div><?php echo get_phrase('options'); ?></div></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $students = $this->db->get_where('student', array(
                                            'class_id' => $class_id, 'section_id' => $row['section_id']
                                        ))->result_array();
                                foreach ($students as $row):
                                    ?>
                                    <tr>
                                        <td><?php echo $row['roll']; ?></td>
                                        <td><img src="<?php echo $this->crud_model->get_image_url('student', $row['student_id']); ?>" class="img-circle" width="30" height="30" /></td>
                                <td><a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_profile/<?php echo $row['student_id']; ?>');"><?php echo $row['name']; ?></a></td>
                                        <td><?php echo $row['address']; ?></td>
                                        <td><?php echo $row['email']; ?></td>
                                        <td>

                                            <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_edit/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-blue btn-xs"><i class="entypo-pencil"></i></button></a>
								 
								<a href="<?php echo base_url(); ?>admin/view_student/<?php echo $row['student_id'];?>/"> <button type="button" class="btn btn-orange btn-xs"><i class="entypo-user"></i></button></a>
								
																								 <a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_message/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-green btn-xs"><i class="entypo-mail"></i></button></a>

								
								<!--<a href="<?php echo base_url(); ?>admin/student_marksheet/<?php echo $row['student_id']; ?>"><button type="button" class="btn btn-success btn-xs"><i class="entypo-chart-bar"></i></button></a>-->
								 
								 <a href="#" onclick="confirm_modal('<?php echo base_url(); ?>admin/student/<?php echo $class_id; ?>/delete/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-red btn-xs"><i class="entypo-trash"></i></button></a>
								 
								 
								<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/student_identity_card/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-fa-building-o"></i></button></a>


                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
			<div class="alert alert-danger" align="center">No Information Selected</div>
					
                <?php endforeach; ?>
            <?php endif; ?>
       </div>
					</div>
				</div>
			</div>
        </div>
    </div>
</div>

<?php endif;?>
