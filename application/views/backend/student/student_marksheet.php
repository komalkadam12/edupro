<style>
    .exam_chart {
    width           : 100%;
        height      : 265px;
        font-size   : 11px;
}
.amcharts-chart-div a{
    display:none !important;
}
  
</style>
<?php 
    $student_info  = $this->db->get_where('student' , array('student_id' => $this->session->userdata('login_user_id')))->result_array();
    $exams         = $this->crud_model->get_exams();
    foreach ($student_info as $row1):
    foreach ($exams as $row2):
?>
  
			<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo $row2['name'];?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
           
                   <table class="table table-bordered">
                       <thead>
                        <tr>
                            <td style="text-align: center;">SUBJECT</td>
                            <td style="text-align: center;">1ST SCORE</td>
                            <td style="text-align: center;">2ND SCORE</td>
							<td style="text-align: center;">3RD SCORE</td>
                            <td style="text-align: center;">4TH SCORE</td>
                            <td style="text-align: center;">EXAM SCORE</td>
                            <td style="text-align: center;">TOTAL SCORE</td>
                            <td style="text-align: center;">AVERAGE</td>
                            <td style="text-align: center;">COMMENT</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $total_marks = 0;
                            $total_grade_point = 0;
                            $subjects = $this->db->get_where('subject' , array('class_id' => $class_id))->result_array();
                            foreach ($subjects as $row3):
                        ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $row3['name'];?></td>
								<td style="text-align: center;">
								
								<?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
											
                                                $obtained_class_score = $row4['class_score'];												
                                            echo $obtained_class_score;
                                            }
                                        }
                                    ?>
								
								</td>
								<td style="text-align: center;">
								
								
								<?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
                                                
												$obtained_class_score2 = $row4['class_score2'];												
                                            echo $obtained_class_score2;
                                                
                                            }
                                        }
                                    ?>
								
								
								</td>
								<td style="text-align: center;">
								
								<?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
											
                                            $obtained_class_score3 = $row4['class_score3'];												
                                            echo $obtained_class_score3;
                                                
                                            }
                                        }
                                    ?>
								
								</td>
								<td style="text-align: center;">
								
								<?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) {
											
											$obtained_class_score4 = $row4['class_score4'];												
                                            echo $obtained_class_score4;
                                                
                                            }
                                        }
                                    ?>
								
								
								</td>
                                <td style="text-align: center;">
                                    <?php
                                        $obtained_mark_query = $this->db->get_where('mark' , array(
                                                    'subject_id' => $row3['subject_id'],
                                                        'exam_id' => $row2['exam_id'],
                                                            'class_id' => $class_id,
                                                                'student_id' => $student_id));
                                        if ( $obtained_mark_query->num_rows() > 0) {
                                            $marks = $obtained_mark_query->result_array();
                                            foreach ($marks as $row4) 
											
											{
											$obtained_marks = $row4['mark_obtained'];
                                                echo $obtained_marks;
                                                
                                            }
                                        }
                                    ?>
                                </td>
                                <td style="text-align: center;">
                          <?php echo ($obtained_marks + $obtained_class_score + $obtained_class_score2 + $obtained_class_score3 + $obtained_class_score4);?>
                                </td>
                                <td style="text-align: center;">
                                    
									<?php 
							$a = $obtained_marks;
							$b = $obtained_class_score;
							$c = $obtained_class_score2;
							$d = $obtained_class_score3;
							$e = $obtained_class_score4;
							
							$sum = $a + $b + $c + $d + $e;
							$average = $sum/5;
							
							echo $average; 
							?>
                                </td>
                                <td style="text-align: center;"><?php echo $row4['comment'];?></td>
                            </tr>
                        <?php endforeach;?>
                    </tbody>
                   </table>


                   <?php //echo get_phrase('total_marks');?> <?php //echo $total_marks;?>
               
                   <?php //echo //get_phrase('average_grade_point');?> 
                        <?php 
                            //$this->db->where('class_id' , $class_id);
                            //$this->db->from('subject');
                            //$number_of_subjects = $this->db->count_all_results();
                            //echo //($total_grade_point / $number_of_subjects);
                        ?>

                  
                    <a href="<?php echo base_url();?>student/student_marksheet_print_view/<?php echo $this->session->userdata('login_user_id');?>/<?php echo $row2['exam_id'];?>" 
                        class="btn btn-info btn-rounded btn-sm pull-right" target="_blank" style="color:white">
                        <i class="entypo-print"></i>&nbsp;<?php echo get_phrase('print_report_card');?>
                    </a>

                   <div id="chartdiv<?php echo $row2['exam_id'];?>" class="exam_chart"></div>
                       <script type="text/javascript">
                            var chart<?php echo $row2['exam_id'];?> = AmCharts.makeChart("chartdiv<?php echo $row2['exam_id'];?>", {
                                "theme": "light",
                                "type": "serial",
                                "dataProvider": [
                                        <?php 
                                            foreach ($subjects as $subject) :
                                        ?>
                                        {
                                            "subject": "<?php echo $subject['name'];?>",
                                            "mark_obtained": 
                                            <?php
                                            $obtained_mark = $this->crud_model->get_obtained_marks( $row2['exam_id'] , $class_id , $subject['subject_id'] , $row1['student_id']);
                                                echo $obtained_mark;
                                            ?>,
                                            "mark_highest": 
                                            <?php
                                                $highest_mark = $this->crud_model->get_highest_marks( $row2['exam_id'] , $class_id , $subject['subject_id'] );
                                                echo $highest_mark;
                                            ?>
                                        },
                                        <?php 
                                            endforeach;

                                        ?>
                                    
                                ],
                                "valueAxes": [{
                                    "stackType": "3d",
                                    "unit": "%",
                                    "position": "left",
                                    "title": "Mark Score Vs Highest Mark"
                                }],
                                "startDuration": 1,
                                "graphs": [{
                                    "balloonText": "Mark Score In [[category]]: <b>[[value]]</b>",
                                    "fillAlphas": 0.9,
                                    "lineAlpha": 0.2,
                                    "title": "2004",
                                    "type": "column",
                                    "fillColors":"#0e4d39",
                                    "valueField": "mark_obtained"
                                }, {
                                    "balloonText": "Highest Mark In [[category]]: <b>[[value]]</b>",
                                    "fillAlphas": 0.9,
                                    "lineAlpha": 0.2,
                                    "title": "2005",
                                    "type": "column",
                                    "fillColors":"#72c02c",
                                    "valueField": "mark_highest"
                                }],
                                "plotAreaFillAlphas": 0.1,
                                "depth3D": 20,
                                "angle": 45,
                                "categoryField": "subject",
                                "categoryAxis": {
                                    "gridPosition": "start"
                                },
                                "exportConfig":{
                                    "menuTop":"20px",
                                    "menuRight":"20px",
                                    "menuItems": [{
                                        "format": 'png'   
                                    }]  
                                }
                            });
                    </script>
               </div>
 
<?php
    endforeach;
        endforeach;
?>
</div>
</div>
</div>
</div>
</div>