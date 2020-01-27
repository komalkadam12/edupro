<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'atten1'))->row()->description; ?>
<?php if($eRRPermission['atten1'] != ''):?>

<!-- CSS -->
<style>
#my_camera{
 width: 320px;
 height: 240px;
 border: 1px dotted black;
}
</style>
<!-- -->



 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-clock"></i>&nbsp;<?php echo get_phrase('staff_attendance');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
					<div class="row panel-body">
                    <div class="col-sm-6">	
					<div id="my_camera"></div>
					</div>
					
					<div class="col-sm-1">
					<button id="snap" type="button" class="btn-info btn-sm btn-rounded" onClick="take_snapshot()"><i class="fa fa-camera"></i>&nbsp;capture</button>
					</div>
			
					<div class="col-sm-5">
					 <div id="results" ></div>
					</div>
					<button type="submit" name="submit" class="btn-success btn-sm btn-rounded" onClick="saveSnap()"><i class="fa fa-plus"></i>&nbsp;punch in</button>
					</div>
				
                </div>
            </div>
        </div>
    </div> 
</div>



<script type="text/javascript" src="webcamjs/webcam.min.js"></script>

<!-- Code to handle taking the snapshot and displaying it locally -->
<script language="JavaScript">

 // Configure a few settings and attach camera
 Webcam.set({
  width: 320,
  height: 240,
  image_format: 'jpeg',
  jpeg_quality: 90
 });
 Webcam.attach( '#my_camera' );

 // preload shutter audio clip
 var shutter = new Audio();
 shutter.autoplay = true;
 shutter.src = navigator.userAgent.match(/Firefox/) ? 'shutter.ogg' : 'shutter.mp3';

function take_snapshot() {
 // play sound effect
 shutter.play();
 

 // take snapshot and get image data
  Webcam.snap( function(data_uri) {
  // display results in page
  document.getElementById('results').innerHTML = 
   '<img id="imageprev" src="'+data_uri+'"/>';
  } );

 // Webcam.reset();
 }


function saveSnap(){
 // Get base64 value from <img id='imageprev'> source
 var base64image = document.getElementById("imageprev").src;

 Webcam.upload( base64image, '<?php echo base_url();?>teacher/save_atten', function(code, text) {
  console.log('Save successfully');
  window.location.href = "<?php echo base_url();?>teacher/staff_attendance/<?php echo $this->session->userdata('login_user_id')?>";
  //console.log(text);
 });

}
</script>




	
<?php endif; ?>