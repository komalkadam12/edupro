<div class="x_panel" >
            
                <div class="x_title">
                    <div class="panel-title">
					 <?php echo get_phrase('all_media_images_and_videos'); ?>
					</div>
					</div>

<div class="table-responsive">

 								<?php 
                                $media	=	$this->db->get('media' )->result_array();
                                foreach($media as $row):?>
 								<div class="col-md-55">
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url().'uploads/media_files/'.$row['file_name']; ?>" alt="image" />
                            <div class="mask">
                              <p><?php echo $row['title']?></p>
                              
                            </div>
                          </div>
                          <div class="caption">
                            <p><?php echo $row['description']?></p>
                          </div>
                        </div>
                      </div>
					  <?php endforeach;?>
					  
					  <?php 
                                $media	=	$this->db->get('media' )->result_array();
                                foreach($media as $row):?>
 								<div class="col-md-55">
 
                        <div class="thumbnail">
                          <div class="image view view-first">
                            <img style="width: 100%; display: block;" src="<?php echo base_url().'uploads/media_files/video.jpg'; ?>" alt="image" />
                            <div class="mask">
                              <p><?php echo $row['title']?></p>
                            </div>
                          </div>
                          <div class="caption">
                            <p><a  onclick="showAjaxModal('<?php echo base_url();?>modal/popup/modal_media_watch/<?php echo $row['media_id']?>');" 
                        class="btn btn-green btn-sm btn-icon icon-left">
                            <i class="entypo-video"></i>
                            Watch Now
                    </a>
					</p>
                          </div>
                        </div>
                      </div>
					  <?php endforeach;?>


<?php if($row['title'] == ''):?>
							<div class="alert alert-danger" align="center">No Data to be Displayed</div>
							<?php endif;?>
</div>

</div>


<script type="text/javascript">
    jQuery(window).load(function ()
    {
        var $ = jQuery;

        $("#table-2").dataTable({
            "sPaginationType": "bootstrap",
            "sDom": "<'row'<'col-xs-3 col-left'l><'col-xs-9 col-right'<'export-data'T>f>r>t<'row'<'col-xs-3 col-left'i><'col-xs-9 col-right'p>>"
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

        // Highlighted rows
        $("#table-2 tbody input[type=checkbox]").each(function (i, el)
        {
            var $this = $(el),
                    $p = $this.closest('tr');

            $(el).on('change', function ()
            {
                var is_checked = $this.is(':checked');

                $p[is_checked ? 'addClass' : 'removeClass']('highlight');
            });
        });

        // Replace Checboxes
        $(".pagination a").click(function (ev)
        {
            replaceCheckboxes();
        });
    });
</script>
