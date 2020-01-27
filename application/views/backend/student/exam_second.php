<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('exam_summary');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
        <!------CONTROL TABS END------>


                                <?php echo form_open(base_url() . 'student/exam_site', array('id' => 'form1', 'class' => 'form-horizontal form-groups-bordered validate', 'target' => '_top')); ?>
                                <div align="center">
								<div class="alert alert-success">
								Exam Date:
                                    <?php
                                    date_default_timezone_set('Asia/Hong_Kong');
                                   echo date('Y.m.d');
                                    ?>
								</div>
								</div>
                                    
									
									
									<table class="table" id="table-2">
                	<thead>
                		<tr>
						<th><?php echo get_phrase('exam_subject'); ?></th>
						<th><?php echo get_phrase('exam_duration'); ?></th>
						<th><?php echo get_phrase('total_question'); ?></th>
						</tr>
					</thead>
                    <tbody>
					<tr>
					<td><?php echo $data['name']; ?></td>
					<td><?php echo $data['duration']; ?>&nbsp;Minutes</td>
					<td><?php echo $data['question_count']; ?>&nbsp;Questions</td>
					</tr>
					</tbody>
					</table>
									
									
									
									
									
									<hr>
                                    <div class="form-group">
                                        <div class="col-sm-0 text-center">
     <button type="submit" class="btn btn-info btn-rounded btn-sm pull-right"><i class="fa fa-space-shuttle"></i>&nbsp;<?php echo get_phrase('start_exam'); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="class_id" value="<?php echo $data['class_id']; ?>"/>
                                <input type="hidden" name="subject_id" value="<?php echo $data['subject_id']; ?>"/>
                                <input type="hidden" name="duration" value="<?php echo $data['duration']; ?>"/>
                                <input type="hidden" name="question_count" value="<?php echo $data['question_count']; ?>"/>
                                <input type="hidden" name="session" value="<?php echo $data['session']; ?>"/>
                                <input type="hidden" name="date" value="<?php echo $data['date']; ?>"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </div>
</div>
</div>
</div>
</div>