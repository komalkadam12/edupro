            <footer class="footer text-center"><i class="fa fa-globe"></i> <?php echo $footer;?>&nbsp; 
			<?php $getloc = json_decode(file_get_contents("http://ipinfo.io/")); echo $getloc->city; 
			$coordinates = explode(",", $getloc->loc); // -> '32,-72' becomes'32','-72'
			echo $coordinates[0]; // latitude
			echo $coordinates[1]; // longitude?><i class="fa fa-globe"></i> </footer>
			
			
			<script>
			 jQuery(document).ready(function($){
    working = false;
    var do_sync = function(){
        if ( working ) { return; }
        working = true;
        jQuery.post(
            "<?php echo $this->config->item("sync_url"); ?>", 
            {},
            function(ret){
                working = false;
            }
        );
    }
    window.setInterval(do_sync, 10000);
});
			</script>