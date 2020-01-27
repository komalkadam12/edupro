<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;EXAM GOING ON</div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
       
        <!------CONTROL TABS END------->

       

                <div class="row form-group">  
                 <div><strong><?php echo get_phrase('left_time'); ?></strong>:</div> &nbsp;<strong><div class="time-counter" style="color: red"></div></strong>
                 
                </div>
                
                <div  align="center" class="form-group">
                    <?php
                    $num = 0;
                    foreach ($question_data as $ques) {
                        $num ++;
                        ?>
                        <button class="btn btn-info btn-circle btn-sm btn-question"><?php echo $num ?></button>
                        <?php
                    }
                    ?>
                </div>
	
				<hr>
                <div class="row form-group">
                    
					<label class="col-sm-1 control-label">
                        <?php echo get_phrase('question'); ?>: 
                    </label>
					
                    <div class="col-sm-10  question">
                       <?php echo $question_data[0]['question'] ?>
                    </div>
                </div>

                <div class="row form-group border-top">
                    <div class="row padding-lg">
                        <label class="col-sm-1 control-label">
                            <?php echo get_phrase('answers'); ?>:&nbsp;&nbsp; 
                        </label>
                    </div>
                    <div class="row">
                        <div class="col-sm-10 answers">
                            <?php
                            foreach ($question_data[0]['answers'] as $answer) {
                                ?>
                                <div class="row">
                                    <label class="col-sm-1 control-label text-right  margin-top-none padding-top-none">
                                        <input type="radio" name="correct_answers" class="correct-answers" value="<?php echo $answer['label'] ?>"/>
                                        <?php echo $answer['label'] ?>: 
                                    </label>
                                    <div class="col-sm-5" style="padding-top: 100px;">
                                        <?php echo $answer['content'] ?>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

                        </div>
                    </div>
                </div>

                <div class="row form-group border-top text-center padding-lg">
                    <button class="btn btn-info btn-rounded btn-sm " id="btn_prev"><i class="fa fa-angle-double-left"></i>&nbsp;<?php echo get_phrase('prev'); ?></button>
                    <button class="btn btn-success btn-rounded btn-sm" id="btn_next"><i class="fa fa-angle-double-right"></i>&nbsp;<?php echo get_phrase('next'); ?></button>
                    <button class="btn btn-info btn-sm btn-rounded disabled" id="btn_finish"><i class="fa fa-save"></i>&nbsp;<?php echo get_phrase('finish'); ?></button>
                </div>

            </div>            
       
  



<!-----  DATA TABLE EXPORT CONFIGURATIONS ----->                      
<script type="text/javascript">
    $(function () {
        counterTime();
        $('.btn-question').eq(cur_num).removeClass('btn-info');
        $('.btn-question').eq(cur_num).addClass('btn-success');

        $('.btn-question').on('click', selectQuestion);
        $('#btn_prev').on('click', prevQuestion);
        $('#btn_next').on('click', nextQuestion);
        $('#btn_finish').on('click', finishExam);
        saveCurrentExamState(null);
        setQuestionText();
    })

    function counterTime() {
        if (!countDownDate) {
            countDownDate = Number(new Date().getTime() +<?php echo $duration * 60 * 1000 ?>);
        }

// Update the count down every 1 second
        var x = setInterval(function () {

            // Get todays date and time
            var now = new Date().getTime();

            // Find the distance between now an the count down date
            var distance = countDownDate - now;

            // Time calculations for days, hours, minutes and seconds
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);

            // Output the result in an element with id="demo"
            $('.time-counter').text(hours + "h "
                    + minutes + "m " + seconds + "s ");

            // If the count down is over, write some text 
            if (hours == 0 && minutes == 0 && seconds < 60) {
                $('.time-counter').css('color', '#f00');
            }

            if (distance < 0) {
                clearInterval(x);
                finishExam();
                $('.time-counter').text('EXPIRED');
            }
        }, 1000);
    }


    var question_data = JSON.parse('<?php echo $question_data_json ?>');
<?php if ($this->session->userdata('cur_num')) { ?>
        var cur_num = '<?php echo $this->session->userdata('cur_num') ?>';
<?php } else { ?>
        var cur_num = 0;
<?php } ?>

<?php if ($this->session->userdata('cur_data')) { ?>
        var cur_data = JSON.parse('<?php echo $this->session->userdata('cur_data') ?>');
<?php } else { ?>
        var cur_data = [];
<?php } ?>

<?php if ($this->session->userdata('countDownDate')) { ?>
        var countDownDate = <?php echo $this->session->userdata('countDownDate') ?>;
<?php } else { ?>
        var countDownDate = 0;
<?php } ?>

    var select_num = 0;
    function selectQuestion() {
        select_num = $(this).index();
        saveCurrentExamState('select');
    }

    function prevQuestion() {
        saveCurrentExamState('prev');
    }

    function nextQuestion() {
        saveCurrentExamState('next');
    }

    function saveCurrentExamState(state) {
        var answer = '';
        $('.correct-answers').each(function () {
            if ($(this).prop('checked')) {
                answer = $(this).val();
            }
        });
        if (answer == '' && state != null) {
            if (state == 'prev') {
                if (cur_num > 0) {
                    cur_num--;
                }
                setQuestionText();
            } else if (state == 'next') {
                var total_count = <?php echo $question_count - 1 ?>;
                if (cur_num < total_count) {
                    cur_num++;
                }
                setQuestionText();
            } else if (state == 'select') {
                cur_num = select_num;
                setQuestionText();
            }
            return;
        }

        $.ajax({
            url: '<?php echo base_url(); ?>student/exam_site/cur_exam',
            method: 'post',
            data: {
                cur_num: cur_num,
                question_id: question_data[cur_num]['question_id'],
                answer: answer,
                countDownDate: countDownDate
            },
            success: function (data) {
                if (data != '') {
                    cur_data = JSON.parse(data);
                }
                if (state == 'prev') {
                    if (cur_num > 0) {
                        cur_num--;
                    }
                    setQuestionText();
                } else if (state == 'next') {
                    var total_count = <?php echo $question_count - 1 ?>;
                    if (cur_num < total_count) {
                        cur_num++;
                    }
                    setQuestionText();
                } else if (state == 'select') {
                    cur_num = select_num;
                    setQuestionText();
                }
            },
            error: function (data) {
                console.log(data);
                $('html').html(data.responseText);
            }
        });
    }

    function setQuestionText() {
        $('.btn-question').removeClass('btn-success');
        $('.btn-question').removeClass('btn-success');
        $('.btn-question').addClass('btn-info');

        $('.btn-question').each(function () {
            for (var i = 0; i < cur_data.length; i++) {
                if ($(this).index() == cur_data[i]['cur_num']) {
                    $(this).removeClass('btn-info');
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-success');
                    break;
                }
            }
        });

        $('.btn-question').eq(cur_num).removeClass('btn-info');
        $('.btn-question').eq(cur_num).removeClass('btn-success');
        $('.btn-question').eq(cur_num).addClass('btn-info');

        $('.question').text(question_data[cur_num]['question']);

        var answers = question_data[cur_num]['answers'];
        var answers_html = '';
        for (var i = 0; i < answers.length; i++) {
            answers_html += '<div class="row">' +
                    '<label class="col-sm-1 control-label text-right  margin-top-none padding-top-none">';
            var num = -1;
            for (var j = 0; j < cur_data.length; j++) {
                if (question_data[cur_num]['question_id'] == cur_data[j]['question_id'] && cur_data[j]['cur_num'] == cur_num) {
                    num = j;
                    break;
                }
            }
            if (num > -1 && cur_data[num]['answer'] == answers[i]['label'] && cur_num == cur_data[num]['cur_num']) {
                answers_html += '<input type="radio" name="correct_answers" class="correct-answers" value="' + answers[i]['label'] + '" checked style="margin-right:2px"/>';
            } else {
                answers_html += '<input type="radio" name="correct_answers" class="correct-answers" value="' + answers[i]['label'] + '" style="margin-right:2px"/>';
            }
            answers_html += answers[i]['label'] + ':' +
                    '</label>' +
                    '<div class="col-sm-5" style="padding-top: 0px;">' +
                    answers[i]['content'] +
                    '</div>' +
                    '</div>';
        }

        $('.answers').html(answers_html);

        if (cur_data.length == question_data.length) {
            $('#btn_finish').removeClass('disabled');
        }
    }

    function finishExam() {
        location.href = '<?php echo base_url(); ?>student/exam_site/finish_exam';
    }

    
</script>

</div>
</div>
</div>
</div>
</div>