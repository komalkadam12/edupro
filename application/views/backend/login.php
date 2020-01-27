<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'staffa'))->row()->description; ?>
<?php if($eRRPermission['staffa'] != ''):?>

<?php redirect('welcome', 'refresh');?>

<?php endif; ?>	



<?php 
$system_name = $this->db->get_where('settings', array('type' => 'system_name'))->row()->description;
$system_title = $this->db->get_where('settings', array('type' => 'system_title'))->row()->description;
?>

<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="We ddevelop creative software, eye catching software. We also train to become a creative thinker">
<meta name="author" content="<?php echo base_url(); ?>OPTIMUM LINKUP COMPUTERS">
 <link rel="icon"  sizes="16x16" href="<?php echo base_url() ?>uploads/logo.png">
        <title><?php echo get_phrase('login');?> | <?php echo $system_title;?></title>
<!-- Bootstrap Core CSS -->
<link href="bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/css/bootstrap-extension.css" rel="stylesheet">
<!-- animation CSS -->
<link href="<?php echo base_url(); ?>optimum/css/animate.css" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?php echo base_url(); ?>optimum/css/style.css" rel="stylesheet">
<!-- color CSS -->
<link href="<?php echo base_url(); ?>optimum/css/colors/megna.css" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->

<style type="text/css">
<!--
.style1 {
background: linear-gradient(to top, #5B86E5, #56CCF2) !important;
}
-->
    </style>
	
	<style>
#video-laptop 
	{
    position: relative;
    padding-top: 24px;
    padding-bottom: 70.5%;
    height: 0;
	}
 
#video-laptop iframe {
    box-sizing: border-box;
    background: url(<?php echo base_url();?>assets/images/video.png) center center no-repeat;
    background-size: contain;
    padding: 11.9% 11.5% 14.8%;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
	}
</style>
<style>

  @import url(https://fonts.googleapis.com/css?family=Open+Sans:400,600,300);

  .phone {

    position:relative;
    border: 40px solid #121212;
    border-width: 55px 7px;
    border-radius: 40px;
    margin: auto;
	margin-left:0px;
    overflow: hidden;
    -webkit-transition: all 0.5s ease;
    transition: all 0.5s ease;
   -webkit-animation: fadein 2s; /* Safari, Chrome and Opera > 12.1 */
       -moz-animation: fadein 2s; /* Firefox < 16 */
        -ms-animation: fadein 2s; /* Internet Explorer */
         -o-animation: fadein 2s; /* Opera < 12.1 */
            animation: fadein 2s;
			
}

  .phone iframe {
    border: 0;
    width: 100%;
    height: 100%;
    background-color:#000;
  }
  /*Different Perspectives*/
    
  .phone.view_2 {
    -webkit-transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
    box-shadow: 0px 3px 0 #000, 0px 4px 0 #000, 0px 5px 0 #000, 0px 7px 0 #000, 0px 10px 20px #000;
  }


@-webkit-keyframes rotate {

    0%{-webkit-transform: rotateX(50deg) rotateY(0deg) rotateZ(-30deg);}
    50%{-webkit-transform: rotateX(50deg) rotateY(0deg) rotateZ(-40deg);}
    100%{-webkit-transform: rotateX(50deg) rotateY(0deg) rotateZ(-30deg);}
}

  #phones {
    border-top:1px solid #fff;
    margin-top:20px;
    padding-top:20px;
  }

  #phones button {
    outline: none;
    width: 198px;
    border: 1px solid #016aa0;
    border-radius:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    background-color: #016aa0;
    height: 40px;
    margin: 10px 0;
    color: #fff;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
  }
  
  #phones button:hover {
    color: #444;
    background-color: #eee;
  }
  
  #views button {
    outline: none;
    width: 198px;
    border: 1px solid #00a8ff;
    border-radius:5px;
    -moz-border-radius:5px;
    -webkit-border-radius:5px;
    -o-border-radius:5px;
    background-color: #00a8ff;
    height: 40px;
    margin: 10px 0;
    color: #fff;
    -webkit-transition: all 0.2s;
    transition: all 0.2s;
  }
  
  #views button:hover {
    color: #444;
    background-color: #eee;
  }
  
  @media (max-width:900px) {
    #optimum {
      -webkit-transform: scale(0.8, 0.8);
              transform: scale(0.8, 0.8);
    }
  }
  
  @media (max-width:700px) {
    #optimum {
      -webkit-transform: scale(0.6, 0.6);
              transform: scale(0.6, 0.6);
			  display: none;
    }
  }
  
  @media (max-width:500px) {
    #optimum {
	
      -webkit-transform: scale(0.4, 0.4);
              transform: scale(0.4, 0.4);
			  display: none;
    }
  }

#loader {
  margin: 60px auto;
  font-size: 10px;
  position: absolute;
  left:34%;
  top:30%;
  text-indent: -9999em;
  border-top: 1.1em solid rgba(255, 255, 255, 0.2);
  border-right: 1.1em solid rgba(255, 255, 255, 0.2);
  border-bottom: 1.1em solid rgba(255, 255, 255, 0.2);
  border-left: 1.1em solid #ffffff;
  -webkit-transform: translateZ(0);
  -ms-transform: translateZ(0);
  transform: translateZ(0);
  -webkit-animation: load8 1.1s infinite linear;
  animation: load8 1.1s infinite linear;
}
#loader,
#loader:after {
  border-radius: 50%;
  width: 10em;
  height: 10em;
}
@-webkit-keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}
@keyframes load8 {
  0% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
  100% {
    -webkit-transform: rotate(360deg);
    transform: rotate(360deg);
  }
}


@keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Firefox < 16 */
@-moz-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Safari, Chrome and Opera > 12.1 */
@-webkit-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Internet Explorer */
@-ms-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}

/* Opera < 12.1 */
@-o-keyframes fadein {
    from { opacity: 0; }
    to   { opacity: 1; }
}
</style>


</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box" style="border:1px solid black">
	 <h4 class="box-title m-b-20" align="center">
					<img src="<?php echo base_url() ?>uploads/logo.png" class="img-circle" width="70" height="70"/></h4>
					<h5 align="center"><a href="<?php echo base_url();?>"><?php echo $system_name;?></a></h5>
					
					<?php if (isset($page) && $page == "login"): ?>
                     <div class="alert alert-success hide_msg pull" style="width: 100%"> <i class="fa fa-check-circle"></i> Logout Successfully &nbsp;
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">×</span> </button>
                    </div>
                	<?php endif ?>
					
    <?php echo form_open('login' , array('class' => 'form-horizontal form-material', 'id' => 'loginform'));?>

					<div class="form-group">
                                   
                                    <div class="col-xs-12">
                                       <select class="form-control" name="login_type" data-style="btn-primary btn-outline" style="width:100%" required>
									   <option value=""><?php echo get_phrase('user_account_type');?></option>
                                        <option value="admin"><?php echo get_phrase('Administrator');?></option>
                                        <option value="teacher"><?php echo get_phrase('Teacher');?></option>
                                        <option value="student"><?php echo get_phrase('Student');?></option>
                                        <option value="parent"><?php echo get_phrase('Parent');?></option>
										<option value="librarian"><?php echo get_phrase('Librarian');?></option>
                                        <option value="hostel"><?php echo get_phrase('hostel_manager');?></option>
                                        <option value="accountant"><?php echo get_phrase('Accountant');?></option> 
										<option value="hrm"><?php echo get_phrase('human_resources');?></option>
										


                                    </select>
                                    </div>
                                </div>
       <div class="form-group ">
                        <div class="col-xs-12">
                            <input class="form-control" type="email" name="email" required="" placeholder="<?php echo get_phrase('email');?>" style="width:100%">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12" >
                            <input class="form-control" type="password" name="password" required="" placeholder="<?php echo get_phrase('passord');?>" style="width:100%">
                        </div>
                    </div>
					
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> <?php echo get_phrase('remember_me');?> </label>
            </div>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0)" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> <?php echo get_phrase('forgot_password?');?></a> </div>
        </div>
       <div class="form-group text-center m-t-20">
        <div class="col-xs-12">
		
<?php $eRRPermission = $this->db->get_where('settings' , array('type' =>'google'))->row()->description; ?>
<?php if($eRRPermission['google'] != ''):?>
		
		<div class="form-group">
            <div class="g-recaptcha" data-sitekey="<?php echo $this->crud_model->get_frontend_general_settings('recaptcha_site_key');?>"></div>
          </div>
<?php endif; ?>			  
		  
<button class="btn btn-success style1 btn-lg btn-block text-uppercase waves-effect waves-light" type="submit" style="width:100%; color:white">
<?php echo get_phrase('log_in');?>
</button>
                    <div align="center"><img id="install_progress" src="<?php echo base_url() ?>assets/images/preloader.gif" style="margin-left: 20px; display: none"/></div>

                        </div>
                    </div>
                 <?php echo form_close();?>
        			<button class="btn btn-xs btn-rounded btn-success" id="admin" style="color:white"><i class="fa fa-user"></i>&nbsp;super admin</button>
		   			<button class="btn btn-xs btn-rounded btn-info" id="normal" style="color:white"><i class="fa fa-user"></i>&nbsp;normal admin</button>
    	            <button class="btn btn-xs btn-rounded btn-primary" id="teacher" style="color:white"><i class="fa fa-user"></i>&nbsp;subject teacher</button>
					 <button class="btn btn-xs btn-rounded btn-danger" id="classt" style="color:white"><i class="fa fa-user"></i>&nbsp;class teacher</button>
    	            <button class="btn btn-xs btn-rounded btn-primary" id="student" style="color:white"><i class="fa fa-user"></i>&nbsp;student</button>
    	            <button class="btn btn-xs btn-rounded btn-danger" id="parent" style="color:white"><i class="fa fa-user"></i>&nbsp;parent</button>
					<button class="btn btn-xs btn-rounded btn-success" id="hrm" style="color:white"><i class="fa fa-user"></i>&nbsp;HRM</button>

    	            <button class="btn btn-xs btn-rounded btn-info" id="accountant" style="color:white"><i class="fa fa-user"></i>&nbsp;accountant</button>
    	            <button class="btn btn-xs btn-rounded btn-success" id="librarian" style="color:white"><i class="fa fa-user"></i>&nbsp;librarian</button>
    		   	 	<button class="btn btn-xs btn-rounded btn-info" id="recep" style="color:white"><i class="fa fa-user"></i>&nbsp;hostel manager</button>
					<br><br>
					
					
				
     <?php echo form_open('login/reset_password' , array('class' => 'form-horizontal form-material', 'id' => 'recoverform'));?>
            	
				<select class="form-control" name="account_type" style="width:100%" required>
                   <option value=""><?php echo get_phrase('user_account_type');?></option>

                                        <option value="admin"><?php echo get_phrase('Administrator');?></option>
                                        <option value="teacher"><?php echo get_phrase('Teacher');?></option>
                                        <option value="student"><?php echo get_phrase('Student');?></option>
                                        <option value="parent"><?php echo get_phrase('Parent');?></option>
										<option value="librarian"><?php echo get_phrase('Librarian');?></option>
                                        <option value="hostel"><?php echo get_phrase('hostel_manager');?></option>
                                        <option value="accountant"><?php echo get_phrase('Accountant');?></option> 
										<option value="hrm"><?php echo get_phrase('human_resources');?></option>
                </select>
<br>
                <input type="email" name="email" class="form-control" placeholder="<?php echo get_phrase('email');?>" required>

<div class="form-group text-center m-t-20">
                        <div class="col-xs-6">
		<a href="<?php echo base_url();?>"><button class="btn btn-info btn-rounded btn-sm text-uppercase" type="button" style="color:white"><i class="fa fa-mail-reply-all"></i>&nbsp;<?php echo get_phrase('back_to_login');?></button></a>
		<button class="btn btn-success btn-rounded btn-sm  text-uppercase" type="submit" style="color:white"><i class="fa fa-key"></i>&nbsp;<?php echo get_phrase('reset_password');?></button>
                        </div>
                    </div>
					
            <?php echo form_close();?>
            </div>
        </div>
		
		
		
		<!--The Main Thing-->
<div id="optimum">

<div class="phone view_2" id="phone_1">
  <iframe src="https://www.optimumlinkup.com.ng/" id="frame_1"></iframe>
</div>
</div>

    </section>
    <script src="js/index.js"></script>	

<!-- jQuery -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/tether.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/bootstrap-extension/js/bootstrap-extension.min.js"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>
    <link href="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/css/jquery.toast.css" rel="stylesheet">


<!--slimscroll JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/jquery.slimscroll.js"></script>
<!--Wave Effects -->
<script src="<?php echo base_url(); ?>optimum/js/waves.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?php echo base_url(); ?>optimum/js/custom.min.js"></script>
<!--Style Switcher -->
<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
<?php echo $tawkto = $this->db->get_where('settings', array('type' => 'tawkto'))->row()->description; ?>
	
    <!-- auto hide message div-->
    <script type="text/javascript">
        $( document ).ready(function(){
           $('.hide_msg').delay(2000).slideUp();
        });
    </script>
	
	<script type="text/javascript">
            $('#admin').click(function () {
                $("input[name=email]").val('admin@admin.com');
                $("input[name=password]").val('1234');
                $("select[name=login_type]").val('admin');
            });
            $('#teacher').click(function () {
                $("input[name=email]").val('teacher@teacher.com');
                $("input[name=password]").val('teacher');
				$("select[name=login_type]").val('teacher');
            });
            $('#student').click(function () {
                $("input[name=email]").val('student@student.com');
                $("input[name=password]").val('student');
				$("select[name=login_type]").val('student');
            });
            $('#parent').click(function () {
                $("input[name=email]").val('parent@parent.com');
                $("input[name=password]").val('parent');
				$("select[name=login_type]").val('parent');
            });
            $('#accountant').click(function () {
                $("input[name=email]").val('accountant@account.com');
                $("input[name=password]").val('accountant');
				$("select[name=login_type]").val('accountant');
            });
            $('#librarian').click(function () {
                $("input[name=email]").val('librarian@librarian.com');
                $("input[name=password]").val('librarian');
				$("select[name=login_type]").val('librarian');
            });
			
            $('#recep').click(function () {
                $("input[name=email]").val('hostel@hostel.com');
                $("input[name=password]").val('hostel');
				$("select[name=login_type]").val('hostel');
            });
			
            $('#hrm').click(function () {
                $("input[name=email]").val('hrm@hrm.com');
                $("input[name=password]").val('1234');
				$("select[name=login_type]").val('hrm');
            });
			
			 $('#normal').click(function () {
                $("input[name=email]").val('optimum@optimum.com');
                $("input[name=password]").val('optimum');
				$("select[name=login_type]").val('admin');
            });
			
			 $('#classt').click(function () {
                $("input[name=email]").val('esther@esther.com');
                $("input[name=password]").val('teacher');
				$("select[name=login_type]").val('teacher');
            });
			
        </script>
			    
	<script src="<?php echo base_url(); ?>optimum/plugins/bower_components/toast-master/js/jquery.toast.js"></script>
		<?php if (($this->session->flashdata('flash_message')) != ""): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
			heading: 'Error!!!',
            text: '<?php echo $this->session->flashdata('flash_message'); ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
	<?php endif; ?>
	
	<?php if (($this->session->flashdata('email_message')) != ""): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
			heading: 'Success!!!',
            text: '<?php echo $this->session->flashdata('email_message'); ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
	<?php endif; ?>
	
	<?php if (($this->session->flashdata('error_message')) != ""): ?>
	<script type="text/javascript">
    $(document).ready(function() {
        $.toast({
			heading: 'Error!!!',
            text: '<?php echo $this->session->flashdata('error_message'); ?>',
            position: 'top-right',
            loaderBg: '#ff6849',
            icon: 'warning',
            hideAfter: 3500,
            stack: 6
        })
    });
    </script>
	<?php endif; ?>
	
	
<script>
    $('form').submit(function (e) 
	{
        $('#install_progress').show();
        $('#modal_1').show();
        $('.btn').val('Login...');
        $('form').submit();
        e.preventDefault();
    });
	
</script>

<script>

/*Only needed for the controls*/
  phone = document.getElementById("phone_1"),
  iframe = document.getElementById("frame_1");


/*View*/
function updateView(view) {
  if (view) {
    phone.className = "phone view_" + view;
  }
}

/*Controls*/
function updateIframe() {

  // preload iphone width and height
  phone.style.width = "375px";
  phone.style.height = "667px";

  /*Idea by /u/aerosole*/
  document.getElementById("wrapper").style.perspective = (
    document.getElementById("iframePerspective").checked ? "1300px" : "none"
  );

}

updateIframe();

/*Events*/
document.getElementById("controls").addEventListener("change", function() {
  updateIframe();
});

document.getElementById("views").addEventListener("click", function(evt) {
  updateView(evt.target.value);
});

document.getElementById("phones").addEventListener("click", function(evt) {

  if(evt.target.value == 1){
    // iphone 6
    width = 375;
    height = 667; 
  }

  if(evt.target.value == 2){
    // samsung
    width = 400;
    height = 640; 
  }

  if(evt.target.value == 3){
    // microsoft
    width = 320;
    height = 480;  
  }

  if(evt.target.value == 4){
    // htc
    width = 360;
    height = 640; 
  }

  if(evt.target.value == 5){
    // ipad mini
    width = 768;
    height = 1024; 
  }

    phone.style.width = width + "px";
    phone.style.height = height + "px"; 

});


 iframe = document.getElementById('frame_1');

  if (iframe.attachEvent){
      iframe.attachEvent("onload", function(){
          afterLoading();
      });
  } else {
      iframe.onload = function(){
          afterLoading();
      };
  }

function afterLoading(){

    setTimeout(function() {
        phone.className = "phone view_1";
        setTimeout(function() {
            // do second thing
            phone.className = "phone view_1 rotate";
            document.getElementById('loader').style.display = 'none';
        }, 1000);
    }, 1000);

}


</script>



</body>

</html>
