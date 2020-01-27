 <style>
      
      .prof {
        font-size: 12px;
        padding: 10px;
		width:450px !important;
      }
    </style>
<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'noti'))->row()->description; ?>
<?php if($eRRPermission['noti'] != ''):?>

<?php 
$this->db->select_sum('due');
$this->db->from('invoice');
$this->db->where(array('student_id' => $this->session->userdata('login_user_id')));
$query = $this->db->get();
$data  = $query->row()->due;
?>
<!--Modal: modalPush-->
<div class="modal fade" id="modalPush" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content text-center">
      <!--Header-->
      <div class="modal-header  d-flex justify-content-center">
        <p class="heading" style="color:white">Be always up to date</p>
      </div>

      <!--Body-->
      <div class="modal-body">

        <i class="fa fa-bell fa-4x animated rotateIn mb-4" ></i>
        <h4><strong style="color:red">Payment:</strong>&nbsp;You have the sum of&nbsp;<strong style="color:red">
		<?php echo $data;?></strong> to pay. <a href="<?php echo base_url();?><?php echo $account_type; ?>/invoice" style="color:green">Click here</a> to see all invoices</h4>

      </div>

      <!--Footer-->
      <div class="modal-footer flex-center">
        <a type="button" class="btn btn-info btn-sm btn-rounded" data-dismiss="modal">Ok</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<?php endif; ?>	

<!--Modal: modalPush-->

<div class="row">
               <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-danger">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-danger"></i>
                                <div class="bodystate">
                                    <h4><strong style="color:white"><?php echo $this->db->count_all_results('student');?></strong></h4>
                                    <span class="text-muted"><a href="#" style="color:white">
<?php echo get_phrase('student');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-info">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
                                    <h4><strong style="color:white"><?php echo $this->db->count_all_results('teacher');?></strong></h4>
                                    <span class="text-muted"><a href="#" style="color:white">
<?php echo get_phrase('teacher');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-purple">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-purple"></i>
                                <div class="bodystate">
                                     <h4><strong style="color:white"><?php echo $this->db->count_all_results('accountant');?></strong></h4>
                                    <span class="text-muted"><a href="#" style="color:white">
<?php echo get_phrase('accountant');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-success">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                     <h4><strong style="color:white"><?php echo $this->db->count_all_results('librarian');?></strong></h4>
                                    <span class="text-muted"><a href="#" style="color:white">
<?php echo get_phrase('librarian');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>	
					
					
					<!--- ANOTHER INFORMAATION ABOUT DASHBOARD    -->
					<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->payments; ?>
<?php if($eRRPermission['payments'] != ''):?>
					<div class="col-md-3 col-sm-6">
                        <div class="white-box bg-info">
                            <div class="r-icon-stats">
                                <i class="ti-user bg-info"></i>
                                <div class="bodystate">
 <h4><strong style="color:white">
 
 <?php echo $this->db->get_where('invoice' , array('student_id' => $this->session->userdata('login_user_id')))->num_rows();?>
 
 </strong></h4>
 <span class="text-muted"><a href="<?php echo base_url();?><?php echo $account_type; ?>/invoice" style="color:white">
<?php echo get_phrase('invoice');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
					
					
					
				<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->internal_message; ?>
<?php if($eRRPermission['internal_message'] != ''):?>	
                   <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-danger">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart bg-danger"></i>
                                <div class="bodystate">
								<?php
                $total_unread_message_number        =   0;
                $current_user                       =   $this->session->userdata('login_type').'-'.$this->session->userdata('login_user_id');

                $this->db->where('sender' , $current_user);
                $this->db->or_where('reciever' , $current_user);
                $message_threads                    =   $this->db->get('message_thread')->result_array();
                foreach($message_threads as $row) {
                    $unread_message_number          =   $this->crud_model->count_unread_message_of_thread($row['message_thread_code']);
                    $total_unread_message_number    +=  $unread_message_number;
                }
                ?>			
				<?php if ($total_unread_message_number >0 ):?>
                                    <h4><strong style="color:white"><?php echo $total_unread_message_number;?></strong></h4>
									<?php endif;?>
									<?php if ($total_unread_message_number ==0 ):?>
									<h4><strong style="color:white"><?php echo '0'; ?></strong></h4>
									<?php endif;?>
                                    <span class="text-muted"><a href="<?php echo base_url();?><?php echo $account_type; ?>/message" style="color:white">
<?php echo get_phrase('messages');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-success">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                     <h4><strong style="color:white"><?php echo $this->db->count_all_results('noticeboard');?></strong></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?><?php echo $account_type; ?>/noticeboard" style="color:white">
<?php echo get_phrase('events');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
<?php endif; ?>


<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->internal_message; ?>
<?php if($eRRPermission['internal_message'] == ''):?>	
                   <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-danger">
                            <div class="r-icon-stats">
                                <i class="ti-shopping-cart bg-danger"></i>
                                <div class="bodystate">
								
                                    <h4><strong style="color:white">X</strong></h4>
									
									<h4><strong style="color:white"></strong></h4>
									
                                   <span class="text-muted"><a href="#" style="color:white">
Disabled</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
					
                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-success">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-success"></i>
                                <div class="bodystate">
                                     <h4><strong style="color:white">X</strong></h4>
                                    <span class="text-muted"><a href="#" style="color:white">
Disabled</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					
<?php endif; ?>







<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->support_ticket; ?>
<?php if($eRRPermission['support_ticket'] != ''):?>

                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-purple">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-purple"></i>
                                <div class="bodystate">
								 		<?php $optimumLinkup =  $this->db->get_where('ticket' , array('student_id' => $this->session->userdata('login_user_id')))->num_rows();?>
                                     <h4><strong style="color:white"><?php echo $optimumLinkup;?></strong></h4>
                                    <span class="text-muted"><a href="<?php echo base_url();?><?php echo $account_type; ?>/support_ticket" style="color:white">
<?php echo get_phrase('support_ticket');?></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>
					
					<?php $eRRPermission = $this->db->get_where('student_permission', array('student_id' => $this->session->userdata('login_user_id')))->row()->support_ticket; ?>
<?php if($eRRPermission['support_ticket'] == ''):?>

                    <div class="col-md-3 col-sm-6">
                        <div class="white-box bg-purple">
                            <div class="r-icon-stats">
                                <i class="ti-wallet bg-purple"></i>
                                <div class="bodystate">
								 		
                                     <h4><strong style="color:white">X</strong></h4>
                                    <span class="text-muted"><a href="#" style="color:white">
Disabled</a></span>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endif; ?>

					
					<div class="col-md-12 col-lg-12">
				  	<div class="panel panel-info">
                    <div class="panel-heading">MY MONTHLY PAYMENT FOR THE YEAR <?php echo  $running_year; ?></div>
					<div class="panel-body">
					
					
					<div  id="flotDashSales1" style="height: 215px;"></div>

						 <!-- Flot: Earning Graph -->
						<script>
							var flotDashSales1Data = [{
								data: [
									<?php
									$year = explode( '-', $running_year );
									for ( $month = 1; $month <= 12; $month++ ):
									$totalincome = 0;
									$days = cal_days_in_month( CAL_GREGORIAN, $month, $year[ 0 ] );
									
									for ( $i = 1; $i <= $days; $i++ ) {
										$timestamp = strtotime( $i . '-' . $month . '-' . $year[ 0 ] );
										$this->db->group_by( 'timestamp' );
	$income = $this->db->get_where('payment', array('year' => $running_year, 'timestamp' => $timestamp, 'student_id' =>$this->session->userdata('login_user_id')))->result_array();

										foreach ( $income as $row ):
										$totalincome = $totalincome + $row[ 'amount' ] ;
										endforeach;
									 } 

									if ( $month == 1 )
										$m = 'Jan';
									else if ( $month == 2 )
										$m = 'Feb';
									else if ( $month == 3 )
										$m = 'Mar';
									else if ( $month == 4 )
										$m = 'Apr';
									else if ( $month == 5 )
										$m = 'May';
									else if ( $month == 6 )
										$m = 'Jun';
									else if ( $month == 7 )
										$m = 'Jul';
									else if ( $month == 8 )
										$m = 'Aug';
									else if ( $month == 9 )
										$m = 'Sep';
									else if ( $month == 10 )
										$m = 'Oct';
									else if ( $month == 11 )
										$m = 'Nov';
									else if ( $month == 12 )
										$m = 'Dec';
									?>

									 ["<?php echo $m ?>", <?php echo $totalincome ?>],

									<?php endfor; ?>
							],
							 color: "#bc4e9c"
							}];
						 // See: assets/javascripts/dashboard/custom_dashboard.js for more settings.
						</script>      
								
					
 					
					
</div>
</div>
</div>

					

		
					<div class="col-md-6 col-lg-6">
				  	<div class="panel panel-info">
                    <div class="panel-heading"><img src="<?php echo base_url() . $face_file; ?>" alt="user-img" width="36" class="img-circle">&nbsp;General Chat Room
					
					
					
					<div class="btn-group pull-right">
                        <button class="btn btn-small btn-outline" data-toggle="dropdown"> <i class="icon-options-vertical"></i></button>
                        <ul class="dropdown-menu">
						<li> <a href="<?php echo base_url(); ?><?php echo $this->session->userdata('login_type');?>/group_message"> 
						<strong style="color:#000">Group Chat</strong>
               
            			</a></li>
						
						<li><a href="<?php echo base_url(); ?><?php echo $this->session->userdata('login_type');?>/message/message_new">
                		<strong style="color:#000">Send New Chat</strong>
               
            			</a> </li>
						</ul>
						</div>
					
					</div>
					<div class="panel-body" style="background-image:url(<?php echo base_url() ?>assets/images/10.png);">
                            <div class="chat-box">
                                <ul class="chat-list slimscroll" style="overflow: hidden;" tabindex="5005">   
								<div class="view">
								
								<?php	$otherusers = $this->db->get('general_message')->result_array();
											foreach ($otherusers as $row2):

    										$sender = explode('-', $row2['user_id']);
    										$sender_account_type = $sender[0];
    										$sender_id = $sender[1];
    								?>
									<input value="<?php echo $row2['user_id']; ?>" type="hidden" />
									<?php if($row2['user_id'] == $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id')):?>
									
									<li class="odd">
                                        <div class="chat-image"><img src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>" draggable="false"/> </div>
                                        <div class="chat-body">
                                            <div class="chat-text">
                                                <h4><?php echo $this->db->get($sender_account_type, array($sender_account_type, $sender_id))->row()->name; ?></h4>
                                                <p ><?php echo $row2['message']; ?> </p> <b><?php echo $row2['time']; ?>&nbsp;<span class="tick"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="15" id="msg-dblcheck-ack" x="2063" y="2076"><path d="M15.01 3.316l-.478-.372a.365.365 0 0 0-.51.063L8.666 9.88a.32.32 0 0 1-.484.032l-.358-.325a.32.32 0 0 0-.484.032l-.378.48a.418.418 0 0 0 .036.54l1.32 1.267a.32.32 0 0 0 .484-.034l6.272-8.048a.366.366 0 0 0-.064-.512zm-4.1 0l-.478-.372a.365.365 0 0 0-.51.063L4.566 9.88a.32.32 0 0 1-.484.032L1.892 7.77a.366.366 0 0 0-.516.005l-.423.433a.364.364 0 0 0 .006.514l3.255 3.185a.32.32 0 0 0 .484-.033l6.272-8.048a.365.365 0 0 0-.063-.51z" fill="#4fc3f7"/></svg></span></b> <a href="#" onclick="confirm_modal('<?php echo base_url();?>student/generalMessageDelete/<?php echo $row2['general_message_id'];?>');"><button type="button" class="btn btn-danger btn-circle btn-xs"><i class="fa fa-times"></i></button></a></div>
                                        	</div>
                                    </li>
									<?php endif;?>
									
									 

									<?php if($row2['user_id'] != $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id')):?>
									
									<li>
                                        <div class="chat-image"><img src="<?php echo $this->crud_model->get_image_url($sender_account_type, $sender_id); ?>" draggable="false"/> </div>
                                        <div class="chat-body">
                                            <div class="chat-text">
                                                <h4><?php echo $this->db->get($sender_account_type, array($sender_account_type, $sender_id))->row()->name; ?></h4>
                                                <p ><?php echo $row2['message']; ?> </p> <b><?php echo $row2['time']; ?></b> </div>
                                        	</div>
                                    </li>
									<?php endif;?>
						
									  <?php endforeach; ?>
								
								 <?php //include('general_message.php'); ?>
								 </div>
                                </ul>
                                <div class="row">
                                    <div class="col-sm-12">
   		 				<?php echo form_open();?>
                                        <div class="input-group">
										
<input class="form-control" type="hidden" id="user_id" name="user_id" value="<?php echo $this->session->userdata('login_type') . '-' . $this->session->userdata('login_user_id');?>"/>
<input class="prof" data-meteor-emoji="true" type="text"  onclick="this.value=''" id="message" name="message"  placeholder="Type and hit enter or click on blue button" > 			 
<span class="input-group-btn">
<button class="btn btn2 btn-info btn-rounded submit" name="submit"><i class="fa fa-envelope"></i></button>
								
                    </span> </div>
					<?php echo form_close(); ?> 
					
                                    </div>
                                </div>
                            </div>

				
				<!--<div id="notice_calendar"></div>-->
				</div>	
				</div>
				</div>

 <!-- Flot: Earning Graph -->
<script>
var chart = AmCharts.makeChart("bar_chartdiv", {
    "theme": "none",
    "type": "serial",
	"startDuration": 2,
    "dataProvider": [
	<?php
		$this->db->select_sum('due');
		$this->db->group_by('invoice_id'); 
		$this->db->order_by('creation_timestamp' , 'desc');
		$this->db->select('creation_timestamp, invoice_id, payment_method');
		
		$timestamp_start	=	strtotime('-29 days', time());
		$timestamp_end		=	strtotime(date("m/d/Y"));
		$this->db->where('creation_timestamp >=' , $timestamp_start);
		$this->db->where('creation_timestamp <=' , $timestamp_end);
		$this->db->where('status' , 'unpaid');
		$invoices	=	$this->db->get_where('invoice', array ('student_id' => $this->session->userdata('login_user_id')))->result_array();
		foreach ($invoices as $row):
			?>
				{
  "project": "<?php echo substr($this->db->get_where('invoice',array('invoice_id' => $row['invoice_id']))->row()->title , 0,50);?>",
                    //"project" : 'g',
                    "amount": <?php echo $row['due'];?>,
                    "color": "rgb(220, 227, 91)",
                    "temp" : ' ',
                },
	<?php endforeach;?> 
	],
    "graphs": [{
        "balloonText": "[[project]]: <b><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>[[value]]</b>",
        "colorField": "color",
        "fillAlphas": 1,
        "lineAlpha": 0.1,
        "type": "column",
        "valueField": "amount"
    }],
    "depth3D": 0,
	"angle": 30,
    "chartCursor": {
        "categoryBalloonEnabled": true,
        "cursorAlpha": 0,
        "zoomable": false
    },    
    "categoryField": "temp",
    "categoryAxis": {
        "gridPosition": "start",
        "labelRotation": 0
    }
});
</script>

<div class="col-md-6 col-lg-6">
				  	<div class="panel panel-info">
                    <div class="panel-heading">MY UNPAID INVOICE(S) FOR THE YEAR <?php echo  $running_year; ?></div>
					<div class="panel-body">
					
					
<div class="bar_chartdiv" id="bar_chartdiv"></div>
				
</div>
</div>
</div>				
</div> 
<style>
    .bar_chartdiv {
    width           : 100%;
        height      : 396px;
        font-size   : 11px;
}
.amcharts-chart-div a{
    display:none !important;
}
  
</style>
 
 <script>
  $(document).ready(function() {
	  
	  var calendar = $('#notice_calendar');
				
				$('#notice_calendar').fullCalendar({
					header: {
						left: 'title',
						right: 'today prev,next'
					},
					
					//defaultView: 'basicWeek',
					
					editable: false,
					firstDay: 1,
					height: 530,
					droppable: false,
					
					events: [
						<?php 
						$notices	=	$this->db->get('noticeboard')->result_array();
						foreach($notices as $row):
						?>
						{
							title: "<?php echo $row['notice_title'];?>",
							start: new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>),
							end:	new Date(<?php echo date('Y',$row['create_timestamp']);?>, <?php echo date('m',$row['create_timestamp'])-1;?>, <?php echo date('d',$row['create_timestamp']);?>) 
						},
						<?php 
						endforeach
						?>
						
					]
				});
	});
  </script>
  
  	<script>
			
			 $(window).load(function(){        
   $('#modalPush').modal('show');
    }); 
			</script>
			
			
			
			<script>
setInterval(function() {
  $('.view').load(location.href + ' .view');
}, 5000); // 60000 = 1 minute
</script>

		
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>-->
<script src="<?php echo base_url(); ?>js/optimumajax.js"></script>
<script type="text/javascript">

// Ajax post
$(document).ready(function() {
$(".submit").click(function(event) {
event.preventDefault();
var user_name = $("input#message").val();
var password = $("input#user_id").val();
jQuery.ajax({
type: "POST",
url: "<?php echo base_url(); ?>" + "admin/generalMessage",
dataType: 'json',
data: {message: user_name, user_id: password},
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

	
	