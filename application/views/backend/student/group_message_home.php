<!-- .chat-row -->
                <div class="chat-main-box" style="background-image:url(<?php echo base_url() ?>assets/images/10.png);">
                    <!-- .chat-left-panel -->
                    <div class="chat-left-aside">
                        <div class="open-panel"><i class="ti-angle-right"></i></div>
                        <div class="chat-left-inner">
                            <div class="form-material">
                                <input class="form-control p-20" type="text" placeholder="Search Group Name">
                            </div>
                            <ul class="chatonline style-none ">
					 <?php
              $group_messages = $this->db->get('group_message_thread')->result_array();
              if (sizeof($group_messages) > 0):
              foreach ($group_messages as $row):?>
							
                                <li>
	<div class="row">
                <div class="col-sm-8">
				<?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['group_message_thread_code']) echo 'active'; ?>
                  <a href="<?php echo site_url('student/group_message/group_message_read/'.$row['group_message_thread_code']); ?>">
                      
                      <?php echo $row['group_name'] ?>
                  </a>
                </div>
				
				<div class="col-sm-4">
<a href="#" class="customize_group" onclick="showAjaxModal('<?php echo site_url('modal/popup/group_info/'.$row['group_message_thread_code']);?>');">view</a>
                </div>
				</div>
                                </li>
								
								 <?php endforeach; ?>
								<?php //if($row['message_thread_code'] == ''):?>
								<!--<div class="alert alert-danger" align="center">No message for you, Please check back later !</div>-->
								
								<?php endif;?>
								
                                
                                <li class="p-20"></li>
                            </ul>
                        </div>
                    </div>
                    <!-- .chat-left-panel -->
                    <!-- .chat-right-panel -->
                    <div class="chat-right-aside">
                        <div class="chat-main-header">
                            <div class="p-20 b-b">
                                <h3 class="box-title">Welcome to group chat
								
							 <div class="btn-group pull-right">
                        <button class="btn btn-small btn-outline" data-toggle="dropdown"> <i class="icon-options-vertical"></i></button>
                        <ul class="dropdown-menu">
						<li> <a href="<?php echo base_url(); ?>student/message"> 
						Persinal Chat
               
            			</a></li>
						
						<li><a href="<?php echo base_url(); ?>student/message/message_new">
                		Send New Chat
               
            			</a> </li>
						</ul>
						</div>
							
								
					
								</h3>
                            </div>
                        </div>
                        <div class="chat-box">
                            <ul class="chat-list slimscroll p-t-30">
                              Welcome To <?php echo $system_name;?>&nbsp;Chat Application<br><br>
								
								<?php echo $system_name;?> Chat Application is quite hot and easy-to-use for internal communication, at the moment it offers only private messages.<br><br>

								To get started, select a user from the left tab.

								Chat immediately as you start your work day. You can use private messages for direct, one-on-one communication<br><br><br>
								
                            </ul>
                            <div class="row send-chat-box">
                                <div class="col-sm-12">
                                    
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
				