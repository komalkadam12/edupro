<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('new-ticket');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

                <?php echo form_open(base_url() . 'student/support_ticket/create/', array('class' => 'form-horizontal form-groups-bordered validate ticket-add', 'enctype' => 'multipart/form-data')); ?>

                <div class="form-group">
						 <label class="col-md-12" for="example-text"><?php echo get_phrase('title');?>*</label>
                                    <div class="col-md-12">
                        <input type="text" class="form-control" name="title" id="title" required>
                    </div>
                </div>

               <div class="form-group">
						 <label class="col-md-12" for="example-text"><?php echo get_phrase('select_category');?>*</label>
                                    <div class="col-md-12">
                        <select name="project_id" class="form-control select2" required>
                            <option><?php echo get_phrase('select_category'); ?></option>
                            <?php
                            $projects = $this->db->get_where('project')->result_array();
                            foreach ($projects as $row):
                                ?>
                                <option value="<?php echo $row['project_id']; ?>">
                                    <?php echo $row['title']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                
                
 <div class="form-group">
						 <label class="col-md-12" for="example-text"><?php echo get_phrase('select_priority');?>*</label>
                                    <div class="col-md-12">
                        <select name="priority" class="form-control select2">
                            <option value="low"><?php echo get_phrase('low'); ?></option>
                            <option value="medium"><?php echo get_phrase('medium'); ?></option>
                            <option value="high"><?php echo get_phrase('high'); ?></option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
						 <label class="col-md-12" for="example-text"><?php echo get_phrase('description');?>*</label>
                                    <div class="col-md-12">
                        <textarea class="form-control"  name="description" id="mymce"></textarea>
                    </div>
                </div>
				
				<div class="form-group"> 
					 <label class="col-sm-12"><?php echo get_phrase('browse_image');?>*</label>        
					 <div class="col-sm-12">
  		  			 <input type='file' class="form-control" name="file" />
					</div>
					</div>	
						
						  <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-info btn-rounded btn-sm" id="submit-button">
                                    <i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('submit_ticket'); ?></button>
                                <span id="preloader-form"></span>
                            </div>
                        </div>

                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</div>
</div>




<script>
    $(document).ready(function () {

        var options = {
            beforeSubmit: validate_ticket_add,
            success: show_response_ticket_add,
            resetForm: true
        };
        $('.ticket-add').submit(function () {
            $(this).ajaxSubmit(options);
            return false;
        });
    });
    function validate_ticket_add(formData, jqForm, options) {

        if (!jqForm[0].title.value)
        {
            return false;
        }
        $('#preloader-form').html('<img src="optimum/images/preloader.gif" style="height:15px;margin-left:20px;" />');
        document.getElementById("submit-button").disabled = true;
    }

    function show_response_ticket_add(responseText, statusText, xhr, $form) {
        $('#preloader-form').html('');
        $.toast("Support ticket submitted successfully", "Success");
        document.getElementById("submit-button").disabled = false;
    }


</script>

<!-- jQuery file upload -->
    <script src="optimum/plugins/bower_components/dropify/dist/js/dropify.min.js"></script>
    <script>
    $(document).ready(function() {
        // Basic
        $('.dropify').dropify();

        // Translated
        $('.dropify-fr').dropify({
            messages: {
                default: 'Glissez-déposez un fichier ici ou cliquez',
                replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                remove: 'Supprimer',
                error: 'Désolé, le fichier trop volumineux'
            }
        });

        // Used events
        var drEvent = $('#input-file-events').dropify();

        drEvent.on('dropify.beforeClear', function(event, element) {
            return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
        });

        drEvent.on('dropify.afterClear', function(event, element) {
            alert('File deleted');
        });

        drEvent.on('dropify.errors', function(event, element) {
            console.log('Has Errors');
        });

        var drDestroy = $('#input-file-to-destroy').dropify();
        drDestroy = drDestroy.data('dropify')
        $('#toggleDropify').on('click', function(e) {
            e.preventDefault();
            if (drDestroy.isDropified()) {
                drDestroy.destroy();
            } else {
                drDestroy.init();
            }
        })
    });
    </script>

