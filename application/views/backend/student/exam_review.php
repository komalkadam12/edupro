<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('review_all_exams');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

                <table class="table" id="table_export">
                    <thead>
                        <tr>
                            <th class="num"><div class="num">#</div></th>
                            <th><div><?php echo get_phrase('subject'); ?></div></th>
                            <th><div><?php echo get_phrase('exam_date'); ?></div></th>
                            <th><div><?php echo get_phrase('session'); ?></div></th>
                            <th><div><?php echo get_phrase('marks'); ?></div></th>
                            <th><div><?php echo get_phrase('options'); ?></div></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
            <!----TABLE LISTING ENDS--->

        </div>
</div>
<form id="form1" action="<?php echo base_url(); ?>student/exam_result_detail/" method="post">
    <input type="hidden" name="class_id" />
    <input type="hidden" name="subject_id" />
    <input type="hidden" name="student_id" />
    <input type="hidden" name="date" />
    <input type="hidden" name="duration" />
    <input type="hidden" name="session" />
</form>
<script>
    $(function () {
        getExamList()
    });

    function getExamList() {
        $.ajax({
            url: '<?php echo base_url(); ?>student/exam_review',
            async: false,
            method: 'post',
            data: {
                mode: 'get_list'
            },
            success: function (result_list)
            {
                result_list = JSON.parse(result_list);
                var htmltext = '';
                for (var i = 0; i < result_list.length; i++) {
                    htmltext += '<tr>' +
                            '<td class="num"><div class="num">' + Number(i + 1) + '</div></td>' +
                            '<td><div>' + result_list[i]["subject"] + '</div></td>' +
                            '<td><div>' + result_list[i]["date"] + '</div></td>' +
                            '<td><div>' + result_list[i]["session"] + '</div></td>' +
                            '<td><div>' + result_list[i]["marks"] + ' / ' + result_list[i]["question_count"] + '</div></td>' +
                            '<td><div><button class="btn btn-info btn-rounded btn-sm" onclick="viewDetail(\'' + result_list[i]["class_id"] + '\',\'' + result_list[i]["subject_id"] + '\',\'' + result_list[i]["student_id"] + '\',\'' + result_list[i]["duration"] + '\',\'' + result_list[i]["session"] + '\',\'' + result_list[i]["date"] + '\')"><?php echo get_phrase('view_detail') ?></button></div></td>' +
                            '</tr>';
                }
                $('#table_export tbody').html(htmltext);
            }
        });
    }

    function viewDetail(class_id, subject_id, student_id, duration, session, date) {
        $('#form1 input[name=class_id]').val(class_id);
        $('#form1 input[name=subject_id]').val(subject_id);
        $('#form1 input[name=student_id]').val(student_id);
        $('#form1 input[name=duration]').val(duration);
        $('#form1 input[name=session]').val(session);
        $('#form1 input[name=date]').val(date);
        $('#form1').submit();
    }
</script>

</div>
</div>
</div>
</div>
</div>