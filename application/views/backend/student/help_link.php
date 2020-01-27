  
  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('help_link');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('link');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
						$this->db->where('class_id' , $class_id);
						$help_links	=	$this->db->get('help_link')->result_array();
						foreach($help_links as $row):?>
                        <tr>
                            <td><?php echo $row['helplink_id'];?></td>
							<td><?php echo $row['title'];?></td>
							<td>
							
							
							
							<?php if($row['type'] == 'youtube'):?>
							
							
  
  <!-- Button trigger modal-->
<button type="button" class="btn btn-sm btn-info btn-rounded" data-toggle="modal" data-target="#modalYT">watch video</button>

<!--Modal: modalYT-->
<div class="modal fade" id="modalYT" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <div class="modal-body mb-0 p-0">

        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
          <?php echo $row ['link']; ?>
        </div>

      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center flex-column flex-md-row">
        <span class="mr-4">Spread the word!</span>
        <div>
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'facebook'))->row()->description;?>" class="btn-floating btn-sm btn-fb">
            <i class="fa fa-facebook"></i>
          </a>
          <!--Twitter-->
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'twitter'))->row()->description;?>" class="btn-floating btn-sm btn-tw">
            <i class="fa fa-twitter"></i>
          </a>
          <!--Google +-->
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'instagram'))->row()->description;?>" class="btn-floating btn-sm btn-gplus">
            <i class="fa fa-google-plus"></i>
          </a>
          <!--Linkedin-->
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'linkedin'))->row()->description;?>" class="btn-floating btn-sm btn-ins">
            <i class="fa fa-linkedin"></i>
          </a>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>


      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: modalYT-->
  
  <?php endif;?>
   <?php if($row['type'] == 'vimeo'):?>
   
   
   <!-- Button trigger modal-->
<button type="button" class="btn btn-primary btn-rounded btn-sm" data-toggle="modal" data-target="#modalVM">watch video</button>

<!--Modal: modalVM-->
<div class="modal fade slimscrollsidebar" id="modalVM" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <!--Content-->
    <div class="modal-content">

      <!--Body-->
      <div class="modal-body mb-0 p-0">

        <div class="embed-responsive embed-responsive-16by9 z-depth-1-half">
          <?php echo $row ['link']; ?>
        </div>

      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center flex-column flex-md-row">
        <span class="mr-4">Spread the word!</span>
        <div>
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'facebook'))->row()->description;?>" class="btn-floating btn-sm btn-fb">
            <i class="fa fa-facebook"></i>
          </a>
          <!--Twitter-->
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'twitter'))->row()->description;?>" class="btn-floating btn-sm btn-tw">
            <i class="fa fa-twitter"></i>
          </a>
          <!--Google +-->
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'instagram'))->row()->description;?>" class="btn-floating btn-sm btn-gplus">
            <i class="fa fa-google-plus"></i>
          </a>
          <!--Linkedin-->
          <a type="button" href="<?php echo $this->db->get_where('front_end' , array('type' =>'linkedin'))->row()->description;?>" class="btn-floating btn-sm btn-ins">
            <i class="fa fa-linkedin"></i>
          </a>
        </div>
        <button type="button" class="btn btn-outline-primary btn-rounded btn-md ml-4" data-dismiss="modal">Close</button>

      </div>

    </div>
    <!--/.Content-->

  </div>
</div>
<!--Modal: modalVM-->
   
    <?php endif;?>
							
							
							
							</td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
				
				<?php if($row['title'] == ''):?>
							<div class="alert alert-danger" align="center">No Data to be displayed !</div>
							<?php endif;?>
				
				
</div>
</div>
</div>
</div>
</div>
