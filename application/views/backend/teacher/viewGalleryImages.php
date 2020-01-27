
<?php foreach($image as $row):?>	
<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp; 
							
							<?php echo $row['name']; ?><a href="<?php echo base_url();?>teacher/gallery" 
                     class="btn btn- btn-xs pull-right"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back');?>
                    </a>
							
							</div>
						<div class="panel-body table-responsive">
								
							<div class="col-sm-12">
							<div class="zoom-gallery m-t-30">
									
									<?php
    									$images = $this->db->get_where('galleryimagearray' , array('gallery_id' => $row['gallery_id']))->result_array();
    									foreach ($images as $row2) {
  									?>
                                        <a href="<?php echo base_url(); ?>uploads/gallery_image/gallery_images/<?php echo $row2['imageArray'];?>" title="<?php echo $row['name']; ?>">
                                            <img src="<?php echo base_url(); ?>uploads/gallery_image/gallery_images/<?php echo $row2['imageArray'];?>" width="32.5%" />
                                        </a>
									
           								<?php } ?>
										
                                    </div>
                                </div>
								

</div>
</div>
</div>
</div>

<?php endforeach; ?>