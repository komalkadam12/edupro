
		
<div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_galleries'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
                	<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th width="80"><div>Title</div></th>
							<th width="80"><div><?php echo get_phrase('cover_image');?></div></th>
                            <th><div><?php echo get_phrase('Options');?></div></th>
                           
                        </tr>
                    </thead>
                    <tbody>
                        		<?php 
                                $gallery	=	$this->db->get('gallery' )->result_array();
                                foreach($gallery as $row):?>
                        <tr>
						<td><?php echo $row ['name'];?></td>
                            <td><img src="<?php echo base_url().'uploads/gallery_image/'.$row['file_name']; ?>"  width="50" height="50" /></td>
                           

                            <td>
														
						<a href="<?php echo base_url('student/viewGalleryImages/'.$row['gallery_id']);?>" class="btn btn-rounded btn-sm btn-info" style="color:white">
						<i class="fa fa-eye"></i>&nbsp;View Images</a>
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
			