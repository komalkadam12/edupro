  
  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('class_mates');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
            				<th><?php echo get_phrase('class');?></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('mobile_no');?></div></th>
                            <th><div><?php echo get_phrase('address');?></div></th>
                            <th><div><?php echo get_phrase('send_message');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                       <?php
						$this->db->where('class_id' , $class_id);
						$students	=	$this->db->get('student')->result_array();
						foreach($students as $row):?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('student',$row['student_id']);?>" class="img-circle" width="30" height="30" /></td>
                            <td><?php echo $row['name'];?></td>
							<td>
                    			<?php $name = $this->db->get_where('class' , array('class_id' => $row['class_id'] ))->row()->name;
                    			 echo $name;?>
               				 </td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td>
<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_student_message/<?php echo $row['student_id']; ?>');"><button type="button" class="btn btn-info btn-circle btn-xs"><i class="fa fa-envelope"></i></button></a>
							</td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
				
				
				
				<?php if($row['name'] == ''):?>
							<div class="alert alert-danger" align="center">Sorry! You have no class mate(s) yet.</div>
							<?php endif;?>
</div>
</div>
</div>
</div>
</div>
