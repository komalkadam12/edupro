 <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title text-uppercase"> <?php echo $page_title;?></h4>
						
                    </div>
					
                    <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12"> 	
					
<ol class="breadcrumb">

<strong><?php echo $system_name;?></strong>
<a href="https://optimumlinkupsoftware.com/welcome/software_solution_details/24" target="_blank" class="btn btn-info btn-sm pull-right m-l-20 btn-rounded hidden-xs hidden-sm waves-effect waves-light" style="color:white"><i class="fa fa-globe"></i>&nbsp;buy this software</a>
<li class="active">
<script>
    function checkTime(i) {
  if (i < 10) {
    i = "0" + i;
  }
  return i;
}

function startTime() {
  var today = new Date();
  var h = today.getHours();
  var m = today.getMinutes();
  var s = today.getSeconds();
  // add a zero in front of numbers<10
  m = checkTime(m);
  s = checkTime(s);
  var ampm = " PM "
        if (h < 12) {
            ampm = " AM "
        }
  document.getElementById('time').innerHTML = h + ":" + m + ":" + s + ampm;
  t = setTimeout(function() {
    startTime()
  }, 500);
}
startTime();
</script>
<body onLoad="startTime()">  
<small class="text-uppercase"> &nbsp;<?php echo date('l jS F \- Y,'); ?>&nbsp;Time:&nbsp;<span id="time"></span></small>
</body>

</li>


                        </ol>
<?php $eRRPermission = $this->db->get_where('adminpermission', array('admin_id' => $this->session->userdata('login_user_id')))->row()->system_settings; ?>
<?php if($eRRPermission['system_settings'] != ''):?>							
<?php if($account_type == 'admin'):?>
<?php echo form_open(base_url() . 'admin/changeSidebar/change/');?>		
<input type="checkbox" onchange="submit()" value="right-to-left" <?php if($this->db->get_where('settings' , array('type' =>'text_align'))->row()->description == 'right-to-left') echo 'checked';?> name="text_align" class="js-switch" data-color="#ff5722" />
<?php echo form_close();?>
<?php endif;?>
<?php endif;?>
</div>
					
                    <!-- /.col-lg-12 -->
                </div>
			
             
  <script type="text/javascript">

    function submit()
    {
    	$('#session_change').submit();
    }
	
</script>
        
        <!--------FLASH MESSAGES--->
        <?php if($this->session->flashdata('flash_message') != ""):?>

 		<script>
			$(document).ready(function() {

				Growl.info({title:"<?php echo $this->session->flashdata('flash_message');?>",text:""})

			});
		</script>

        <?php endif;?>