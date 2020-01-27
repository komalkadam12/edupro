<div class="row">
                    <div class="col-sm-5">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('help_link'); ?></div>
                    <div class="panel-body table-responsive">
					
                	<?php echo form_open(base_url() . 'teacher/help_link/create' , array('class' => 'form-horizontal form-groups-bordered validate','target'=>'_top'));?>
                            
							 	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('title');?></label>
                    <div class="col-sm-12">
                                    <input name="title" type="text" class="form-control"/ required>
                                </div>
                            </div>
                            	<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('video_link');?></label>
                    <div class="col-sm-12">
                                    <input type="text" class="form-control" name="link"/ rquired>
                                </div>
                            </div>
							
							
						<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('class');?></label>
                    <div class="col-sm-12">
							<select name="class_id" class="form-control select2" required>
                              <option value=""><?php echo get_phrase('select');?></option>
                              <?php 
								$classes = $this->db->get('class')->result_array();
								foreach($classes as $row):
									?>
                            		<option value="<?php echo $row['class_id'];?>">
											<?php echo $row['name'];?>
                                            </option>
                                <?php
								endforeach;
							  ?>
                          </select>

						</div> 
						  			<a href="<?php echo base_url();?>admin/classes/"><button type="button" class="btn btn-info btn-circle btn-sm"><i class="fa fa-plus"></i></button></a>

					</div>
					
					
							<div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('type');?></label>
                    <div class="col-sm-12">
							<select name="type" class="form-control select2" required>
							<option >Select video type</option>
							<option value="youtube">Youtube</option>
							<option value="vimeo">Vimeo</option>
                             
                          </select>

						</div> 
						</div>
							
							
                            
                           <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info btn-rounded btn-sm"><i class="fa fa-plus"></i>&nbsp;<?php echo get_phrase('add_help');?></button>
                              </div>
							</div>
							
                    </form>                
                </div>                
			</div>
		</div>
		
			<!----CREATION FORM ENDS-->

<div class="col-sm-7">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_link'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('link');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($help_links as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
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
							<td>
							 <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/help_link/delete/<?php echo $row['helplink_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
							
                           
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