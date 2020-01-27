<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;Congratulations Page</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
        <!------CONTROL TABS END------->


                <?php
               // $marks = 0;
                //foreach ($result as $row) {
                    ?>
                    
					
	

          
<h2 align="center"><strong style="color:green">Congratulations</strong>, You have successfully completed your online exams. Please click on the link below to view your results.
<hr>
<p><strong><a href="<?php echo base_url(); ?><?php echo $account_type; ?>/exam_result_detail">
                    <span style="color:red"><?php echo get_phrase('check_results_here'); ?></span>
                </a></strong></p>

</h2>

               
                    <div align="center"><h2>You have done&nbsp;<span class="label label-success"><?php echo $question_count; ?></span>&nbsp;Questions</h2></div>
              

</div>
</div>
</div>
</div>
</div>