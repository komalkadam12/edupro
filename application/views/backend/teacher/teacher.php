<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('all_teachers');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div><?php echo get_phrase('photo');?></div></th>
                            <th><div><?php echo get_phrase('name');?></div></th>
                            <th><div><?php echo get_phrase('email');?></div></th>
                            <th><div><?php echo get_phrase('mobile_no');?></div></th>
                            <th><div><?php echo get_phrase('address');?></div></th>
                            <th><div><?php echo get_phrase('send_message');?></div></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                                $teachers	=	$this->db->get('teacher' )->result_array();
                                foreach($teachers as $row):?>
                        <tr>
                            <td><img src="<?php echo $this->crud_model->get_image_url('teacher',$row['teacher_id']);?>" class="img-circle" width="30" /></td>
                            <td><?php echo $row['name'];?></td>
                            <td><?php echo $row['email'];?></td>
                            <td><?php echo $row['phone'];?></td>
                            <td><?php echo $row['address'];?></td>
                            <td>
<a href="#" onclick="showAjaxModal('<?php echo base_url(); ?>modal/popup/modal_teacher_message/<?php echo $row['teacher_id']; ?>');"><button type="button" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-envelope"></i>&nbsp;Send message</button></a>
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