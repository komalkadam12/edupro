<!-- .chat-row -->

                <div class="chat-main-box">
                    <!-- .chat-left-panel -->
                    <div class="chat-left-aside">
                        <div class="open-panel"><i class="ti-angle-right"></i></div>
                        <div class="chat-left-inner">
                            <div class="form-material">
                                <input class="form-control p-20" type="text" placeholder="Search Contact">
                            </div>
                            <ul class="chatonline style-none ">
						<div class="userload">
							 	<?php
								  $group_messages = $this->db->get('group_message_thread')->result_array();
								  if (sizeof($group_messages) > 0):
								  foreach ($group_messages as $row):?>
                                <li>
				<div class="row">
                <div class="col-sm-8">
				
                  <a href="<?php echo site_url('student/group_message/group_message_read/'.$row['group_message_thread_code']); ?>" class="<?php if (isset($current_message_thread_code) && $current_message_thread_code == $row['group_message_thread_code']) echo 'active'; ?>">
                      
                      <?php echo $row['group_name'] ?>
                  </a>
                </div>
				
				<div class="col-sm-4">
<a href="#" class="customize_group" onclick="showAjaxModal('<?php echo site_url('modal/popup/group_info/'.$row['group_message_thread_code']);?>');">view</a>
                </div>
				</div>
                                </li>
								
								 <?php endforeach; ?>
								 <?php endif;?>
							
                                
							</div>
                            </ul>
                        </div>
                    </div>
                    <!-- .chat-left-panel -->
                    <!-- .chat-right-panel -->
                    <div class="chat-right-aside">
                        <div class="chat-main-header">
                            <div class="p-20 b-b">
							<span><i class="fa fa-circle" style="color: #00a651; pull-right"></i></span>
							<strong>Group Name:</strong>&nbsp;<?php echo $this->db->get_where('group_message_thread', array('group_message_thread_code' => $current_message_thread_code))->row()->group_name; ?>
                              
						<div class="btn-group pull-right">
                        <button class="btn btn-small btn-outline" data-toggle="dropdown"> <i class="icon-options-vertical"></i></button>
                        <ul class="dropdown-menu">
						<li> <a href="<?php echo base_url(); ?>student/message"> 
						Personal Message
               
            			</a></li>
						
						<li><a href="<?php echo base_url(); ?>student/message/message_new">
                		Send New Chat
               
            			</a> </li>
						</ul>
						</div>
                            </div>
                        </div>
                         <div class="chat-box"> 
                             <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">   
							<div class="view">
							
								<?php
  								$messages = $this->db->get_where('group_message', array('group_message_thread_code' => $current_message_thread_code))->result_array();
  								foreach ($messages as $row):

							  	$sender = explode('-', $row['sender']);
							  	$sender_account_type = $sender[0];
							  	$sender_id = $sender[1];
     						 	?>
								<?php if($row['sender'] == $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id')):?>
								<li class="odd">
                                    <div class="chat-image"><img src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>" class="img-circle" width="30"></div>
                                    <div class="chat-body">
                                        <div class="chat-text" style="border:-moz-border-radius: 1em 4em 1em 4em;border-radius: 1em 4em 1em 4em;display:inline-block;">
                                            <h4><?php echo $this->db->get_where($sender_account_type, array($sender_account_type . '_id' => $sender_id))->row()->name; ?></h4>
                                            <p> <?php echo $row['message']; ?></p>
                                            <b><?php echo date("d M, Y", $row['timestamp']); ?> <span class="tick"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="2063" y="2076"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#4fc3f7"/></svg></span>
											<a href="#" onclick="confirm_modal('<?php echo base_url();?>student/deleteMessageFunctionGroup/<?php echo $row['group_message_id'];?>/<?php echo $row['group_message_thread_code'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a>
											
											<?php if ($row['attached_file_name'] != ''):?>
          									
            								<a href="<?php echo base_url('uploads/group_messaging_attached_file/'.$row['attached_file_name']);?>" style="color: #2196F3;">
            								<i class="fa fa-download" style="color: #757575"></i> <?php echo $row['attached_file_name']; ?>
          									</a>
											
          									
											<?php endif;?></b> </div>
                                    </div>
                                </li>
								<?php endif;?>
								
								<?php if($row['sender'] != $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id')):?>
                                <li>
                                    <div class="chat-image"><img src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>" class="img-circle" width="30"></div>
                                    <div class="chat-body">
                                        <div class="chat-text" style="border:-moz-border-radius: 1em 4em 1em 4em;border-radius: 1em 4em 1em 4em;display:inline-block;">
                                            <h4><?php echo $this->db->get_where($sender_account_type, array($sender_account_type . '_id' => $sender_id))->row()->name; ?></h4>
                                            <p><?php echo $row['message']; ?></p>
                                            <b><?php echo date("d M, Y", $row['timestamp']); ?> 
											
											<?php if ($row['attached_file_name'] != ''):?>
          									
            								<a href="<?php echo base_url('uploads/group_messaging_attached_file/'.$row['attached_file_name']);?>" style="color: #2196F3;">
            								<i class="fa fa-download" style="color: #757575"></i> <?php echo $row['attached_file_name']; ?>
          									</a>
											
          									
											<?php endif;?></b> </div>
                                    </div>
                                </li>
								<?php endif;?>
								 <?php endforeach; ?>
								
									<?php if ($row['message'] == null):?>
		 				<div class="alert alert-info">No message thread here. Type message to compose new message for group members to see. Thanks</div>
 		 				<?php endif; ?>
								
								
							  </div>
                            </ul>
							
                            <div class="row send-chat-box"> 
                                <div class="col-sm-12"> 
									<form method="post" accept-charset="utf-8" enctype="multipart/form-data">
                                    <textarea class="form-control" onclick="this.value=''" name="message" id="message" placeholder="Type your message"></textarea>
									 <input id="attached_file_on_messaging" type="file" name="attached_file_on_messaging"/>
									 <hr>
                                    <div class="custom-send pull-left">
                                        <button class="btn btn2 btn-info btn-rounded submit" name="submit"><i class="fa fa-envelope"></i>Send</button>
									<?php echo form_close(); ?> 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- .chat-right-panel -->
                </div>
                <!-- /.chat-row -->
				
				
				<script>
setInterval(function() {
  $('.view').load(location.href + ' .view');
}, 5000); // 60000 = 1 minute
</script>

				<script>
setInterval(function() {
  $('.userload').load(location.href + ' .userload');
}, 5000); // 60000 = 1 minute
</script>


			
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>js/optimumajax.js"></script>
<script type="text/javascript">

// Ajax post
$(document).ready(function() {
$(".submit").click(function(event) {
event.preventDefault();
var user_name = $("textarea#message").val();
var password = $("input#attached_file_on_messaging").val();
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "student/group_message/send_reply/<?php echo $current_message_thread_code?>",
dataType: 'json',
data: {message: user_name, attached_file_on_messaging: password},
success: function(res) {
if (res)
{

// Show Entered Value
//jQuery("div#result").show();
//jQuery("div#value").html(res.message);
//jQuery("div#value_pwd").html(res.user_id);
}
}
});
});
});
</script>

<script type="text/javascript">
var audioUrl = '<?php echo base_url(); ?>uploads/chat.mp3';
// SIMPLE EXEMPLE
var audio = new Audio(audioUrl); // define your audio
$('.btn').click( () => audio.play() ); // that will do the trick !!

// ADVANCED EXEMPLE

// array with souds to cycle trough
// the more in the array, the faster you can retrigger the click 
var audio2 = [new Audio(audioUrl), new Audio(audioUrl), new Audio(audioUrl), new Audio(audioUrl), new Audio(audioUrl)]; // put it has much has you want
var soundNb = 0; // counter

$('.btn2').click( () => audio2[ soundNb++ % audio2.length ].play());

</script>
