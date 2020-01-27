	<style>
div.card {
  width: 500px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}

div.header {
    background-color: #4CAF50;
	height:100%;
	width:100%;
}

div.container {
    padding: 10px;
}
</style>
			    <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-clock"></i>&nbsp;<?php echo get_phrase('staff_attendance');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
					<div class="row panel-body">
                    <div class="col-sm-6">	
					 <div class="header"><video id="video" width="200" height="200" autoplay></video></div>
					</div>
					
					<div class="col-sm-1">
					<button id="snap" type="submit" name="submit" class="btn-info btn-xs btn-circle"><i class="fa fa-camera"></i></button>
					</div>
			
					<div class="col-sm-5">
					<div class="header"><canvas id="canvas" width="200" height="200"></canvas></div>
					</div>
					<button type="submit" name="submit" class="btn-info btn-sm btn-rounded"><i class="fa fa-plus"></i>&nbsp;save</button>
					</div>
				
                </div>
            </div>
        </div>
    </div> 
</div>


<script>

// Grab elements, create settings, etc.
var video = document.getElementById('video');

// Get access to the camera!
if(navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
    // Not adding `{ audio: true }` since we only want video now
    navigator.mediaDevices.getUserMedia({ video: true }).then(function(stream) {
        video.src = window.URL.createObjectURL(stream);
        video.play();
    });
}

/* Legacy code below: getUserMedia */
else if(navigator.getUserMedia) { // Standard
    navigator.getUserMedia({ video: true }, function(stream) {
        video.src = stream;
        video.play();
    }, errBack);
} else if(navigator.webkitGetUserMedia) { // WebKit-prefixed
    navigator.webkitGetUserMedia({ video: true }, function(stream){
        video.src = window.webkitURL.createObjectURL(stream);
        video.play();
    }, errBack);
} else if(navigator.mozGetUserMedia) { // Mozilla-prefixed
    navigator.mozGetUserMedia({ video: true }, function(stream){
        video.src = window.URL.createObjectURL(stream);
        video.play();
    }, errBack);
}


// Elements for taking the snapshot
var canvas = document.getElementById('canvas');
var context = canvas.getContext('2d');
var video = document.getElementById('video');

// Trigger photo take
document.getElementById("snap").addEventListener("click", function() {
	context.drawImage(video, 0, 0, 200, 200);
});

// Converts canvas to an image
function convertCanvasToImage(canvas) {
	var image = new Image();
	image.src = canvas.toDataURL("<?php echo base_url();?>image/png");
	return image;
}


</script>















<style>
div.card {
  width: 500px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  text-align: center;
}

div.header {
    background-color: #4CAF50;
    color: white;
    padding: 10px;
    font-size: 40px;
}

div.container {
    padding: 10px;
}
</style>

<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info"> 
                            <div class="panel-heading"> <i class="fa fa-clock"></i>&nbsp;<?php echo get_phrase('staff_attendance');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive"> 
								
					<div class="card" align="center">			
					<table class="table">
                	<tr>
                        <th> <div id="my_camera"></div></th>
                        <th><div id="results"></div></th>
                	</tr>
					</table>
					</div>	
					<hr>
					
					<form>
						
					<button id="snap" type="submit" name="submit"  class="btn-info btn-rounded" onClick="take_snapshot()">Snap Photo</button>
				  <?php echo form_close();?>	
                </div>
            </div>
        </div>
    </div> 
</div>

	<!-- Code to handle taking the snapshot and displaying it locally -->
	<script language="JavaScript">
		function take_snapshot() {
			// take snapshot and get image data
			Webcam.snap( function(data_uri) {
				// display results in page
				
					
				Webcam.upload( data_uri, '<?php echo base_url();?>index.php?teacher/save_atten/', function(code, text) {
					document.getElementById('results').innerHTML = 
					'<h2>Successfullt clocked IN:</h2>' + 
					'<img src="'+text+'"/>';
				} );	
			} );
		}
	</script>
	
	<!-- First, include the Webcam.js JavaScript Library -->
	<script type="text/javascript" src="<?php echo base_url(); ?>js/webcam.js"></script>
	
	<!-- Configure a few settings and attach camera -->
	<script language="JavaScript">
		Webcam.set({
			width: 200,
			height: 200,
			image_format: 'jpeg',
			jpeg_quality: 90
		});
		Webcam.attach( '#my_camera' );
		
	</script>
	
	<!-- A button for taking snaps -->