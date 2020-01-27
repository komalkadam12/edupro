<?php
$ticket_detail = $this->db->get_where('ticket', array('ticket_code' => $ticket_code))->result_array();
foreach ($ticket_detail as $row):
    ?>
    <!-- BREADCRUMB STARTS -->
    <ol class="breadcrumb bc-2" style="background-color:#fff">
        <li>
            <a href="<?php echo base_url(); ?>">
                <i class="entypo-folder"></i>
                <?php echo get_phrase('dashboard'); ?>
            </a>
        </li>
        <li>
            <a href="<?php echo base_url(); ?>student/support_ticket">
                <?php echo get_phrase('ticket_list'); ?></a>
        </li>
        <li class="active"><?php echo $row['title']; ?></li>
    </ol>
    <!-- BREADCRUMB ENDS -->


    <div class="row">

        <div class="col-md-8">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                        
                           <strong style="color:#fff"> <i class="fa fa-ticket"></i> <?php echo $row['title']; ?></strong>

                       
                    </div>
                </div>

                <div class="panel-body" style="padding:0px;">

                    <!-- List of Ticket replies -->					
                    <div class="profile-env">
                        <section class="profile-feed" style="margin:0px;padding:0px;">
                            <!-- user profile -->
                            <div class="profile-stories">
                                <?php
                                $ticket_messages = $this->db->get_where('ticket_message', array('ticket_code' => $ticket_code))->result_array();
                                foreach ($ticket_messages as $row2):
                                    ?>
                                    <article class="story" style="padding:0px 10px 0px 20px; margin:20px 0px;">
                                        <aside class="user-thumb">
                                            <a href="#">
                                                <img src="<?php
                                                echo $this->crud_model->get_image_url(
                                                        $row2['sender_type'], $row2['sender_id']);
                                                ?>" 
                                                     alt="" class="img-circle" style="height:44px;">
                                            </a>
                                        </aside>

                                        <div class="story-content">
                                            <!--  header -->
                                            <header>
                                                <div class="publisher">
                                                    <a href="#">
                                                        <?php echo $this->crud_model->get_type_name_by_id($row2['sender_type'], $row2['sender_id']); ?>
                                                    </a> 
                                                    <em><small>
                                                            <?php echo $row2['sender_type']; ?> 
                                                            <i class="fa fa-circle"></i> 
                                                            <?php echo $row2['timestamp']; ?> 
                                                        </small></em>
                                                </div>


                                            </header>

                                            <div class="story-main-content" style="text-align:justify;">
                                                <p><?php echo $row2['message']; ?></p>
                                            </div>

                                            <?php if ($row2['file'] != "") { ?>
                                                <i class="fa fa-download"></i>
                                                <a href="<?php echo base_url() . 'uploads/ticket_file/' . $row2['file']; ?>" class="">
                                                    <?php echo $row2['file']; ?>
                                                </a>
                                            <?php } ?>

                                        </div>
                                    </article>
                                    <!-- separator -->
                                    <hr style="margin:0px;">
                                <?php endforeach; ?>
                            </div>

                        </section>
                    </div>

                    <!-- reply option only for opened ticket-->
                    <?php if ($row['status'] == 'opened'): ?>
                       <?php echo form_open(base_url() . 'student/support_ticket_post_reply/' . $row['ticket_code'], array('class' => 'form-horizontal form-groups validate ticket-message-add',
                            'enctype' => 'multipart/form-data', 'style' => 'padding:20px;'));
                        ?>
                      
                             <div class="form-group">
						 <label class="col-md-12" for="example-text"><?php echo get_phrase('reply_message');?>*</label>
                                    <div class="col-md-12">
                                <textarea class="form-control" name="message" id="mymce"><?php echo get_phrase('reply_meessage_here_....'); ?></textarea>
                            </div>
							</div>
							
						
						<!-- FILE UPLOADER -->
					 	<div class="form-group">
                         <div class="col-md-12">
						 <input type="file" name="file" id="input-file-now" class="dropify"/>
                        </div>
                    	</div>
                       

                      

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-8">
                                <button type="submit" class="btn btn-info btn-rounded btn-sm" id="submit-button">
                                    <i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('post_reply'); ?></button>
                                <span id="preloader-form"></span>
                            </div>
                        </div>
                        <?php form_close(); ?>
                    <?php endif; ?>
                </div>

            </div>

        </div>

        <!-- TICKET SUMMARY STARTS-->
        <div class="col-md-4">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="panel-title">
                      
                            <strong style="color:#fff"><i class="fa fa-book"></i> <?php echo get_phrase('ticket_summary'); ?></strong>

                      
                    </div>
                </div>

                <div class="panel-body" style="padding:0px;">
                    <table class="table table-striped">
                        <tr>
                            <td style="width:130px;"><i class="entypo-dot"></i> <?php echo get_phrase('ticket_code'); ?></td>
                            <td> : </td>
                            <td><?php echo $row['ticket_code']; ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle"></i> <?php echo get_phrase('student'); ?></td>
                            <td> : </td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('student', $row['student_id']); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle"></i> <?php echo get_phrase('category'); ?></td>
                            <td> : </td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('project', $row['project_id'], 'title'); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle"></i> <?php echo get_phrase('assigned_staff'); ?></td>
                            <td> : </td>
                            <td><?php echo $this->crud_model->get_type_name_by_id('admin', $row['admin_id']); ?></td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle"></i> <?php echo get_phrase('ticket_status'); ?></td>
                            <td> : </td>
                            <td>
                                <div class="label label-<?php
                                if ($row['status'] == 'closed')
                                    echo 'primary';
                                else if ($row['status'] == 'opened')
                                    echo 'success'
                                    ?>">
                                    <?php echo $row['status']; ?></div>
                            </td>
                        </tr>
                        <tr>
                            <td><i class="fa fa-circle"></i> <?php echo get_phrase('ticket_priority'); ?></td>
                            <td> : </td>
                            <td>
                                <div class="label label-<?php
                                if ($row['priority'] == 'high')
                                    echo 'danger';
                                else if ($row['priority'] == 'medium')
                                    echo 'info';
                                else if ($row['priority'] == 'low')
                                    echo 'default'
                                    ?>">
                                    <?php echo $row['priority']; ?></div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            
        </div>
        <!-- TICKET SUMMARY ENDS-->

    </div>

<?php endforeach; ?>

<script>
    $(document).ready(function () {

        var options = {
            beforeSubmit: validate_ticket_message_add,
            success: show_response_ticket_message_add,
            resetForm: true
        };
        $('.ticket-message-add').submit(function () {
            $(this).ajaxSubmit(options);
            return false;
        });
    });
    function validate_ticket_message_add(formData, jqForm, options) {

        if (!jqForm[0].message.value)
        {
            return false;
        }
        $('#preloader-form').html('<img src="assets/images/preloader.gif" style="height:15px;margin-left:20px;" />');
        document.getElementById("submit-button").disabled = true;
    }

    function show_response_ticket_message_add(responseText, statusText, xhr, $form) {
        $('#preloader-form').html('');
        $.toast("Ticket reply submitted", "Success");
        document.getElementById("submit-button").disabled = false;
        reload_ticket_view_body();
    }


    function reload_ticket_view_body()
    {
        $.ajax({
            url: '<?php echo base_url(); ?>student/reload_support_ticket_view_body/<?php echo $row['ticket_code']; ?>',
                        success: function (response)
                        {
                            jQuery('.main_data').html(response);
                        }
                    });
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

