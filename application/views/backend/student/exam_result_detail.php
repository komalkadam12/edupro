<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp; <?php echo $detail_list[0]['class'] ?> | <?php echo $detail_list[0]['student'] ?> | <?php echo $detail_list[0]['subject'] ?> | <?php echo $detail_list[0]['date'] ?> <?php echo get_phrase('exam_result'); ?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

            <?php
            $marks = 0;
            foreach ($detail_list as $row) {
                ?>
                <div class="row form-group border-top" style="padding-top: 10px;" align="justify">
                    <label class="col-sm-2 col-md-2 col-lg-2 text-right"><?php echo get_phrase('question'); ?>:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10"><?php echo $row['question']; ?></div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 col-md-2 col-lg-2 text-right"><?php echo get_phrase('correct_answer'); ?>:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10"><?php echo $row['correct_content']; ?></div>
                </div>                
                <div class="row form-group">
                    <label class="col-sm-2 col-md-2 col-lg-2 text-right"><?php echo get_phrase('your_answer'); ?>:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10"><?php echo $row['answer_content']; ?></div>
                </div>
                <div class="row form-group">
                    <label class="col-sm-2 col-md-2 col-lg-2 text-right"><?php echo get_phrase('result'); ?>:</label>
                    <div class="col-sm-10 col-md-10 col-lg-10"><?php echo ($row['marks'] == 1 ? '<i class="btn btn-success btn-circle fa fa-check"></i>' : '<i class="btn btn-danger btn-circle fa fa-times"></i>'); ?></div>
                </div>
                <input type="hidden" class="marks" value="<?php echo $row['marks']; ?>"/>
                <?php
                if ($row['marks'] == 1)
                    $marks ++;
            }
            ?>
            <div class="form-group" align="center">
						<div class="col-sm-offset-3 col-sm-5" pull-right>
		<button type="button" class="btn btn-default btn-outline btn-sm" ><h5> Total Score:&nbsp;<?php echo $marks; ?> / <?php echo $detail_list[0]['question_count'] ?></h5></button>
						</div>
					</div>
			
			<hr>
<button id="print" class="btn btn-info btn-rounded btn-sm pull-right" type="button"> <span><i class="fa fa-print"></i> Print</span> </button>
<hr>
</div>
</div>
</div>
</div>
</div>