
   <table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th style="width:30px;">
            <th><div><?php echo get_phrase('title'); ?></div></th>
            <th><div><?php echo get_phrase('ticket_code'); ?></div></th>
            <th><div><?php echo get_phrase('student'); ?></div></th>
            <th><div><?php echo get_phrase('status'); ?></div></th>
            <th><div><?php echo get_phrase('priority'); ?></div></th>
            <th><div><?php echo get_phrase('options'); ?></div></th>
        </tr>
    </thead>
<tbody>
    <?php
    $counter = 1;
    $this->db->where('status', 'opened');
    $this->db->where('student_id' , $this->session->userdata('login_user_id'));
    $this->db->order_by('ticket_id', 'desc');
    $tickets = $this->db->get('ticket')->result_array();
    foreach ($tickets as $row):
        ?>
        <tr>
            <td style="width:30px;">
                <?php echo $counter++; ?>
            <td>
                <a href="<?php echo base_url(); ?>student/support_ticket_view/<?php echo $row['ticket_code']; ?>">
                    <?php echo $row['title']; ?>
                </a>
            </td>
            <td><?php echo $row['ticket_code']; ?></td>
            <td><?php echo $this->crud_model->get_type_name_by_id('student', $row['student_id']); ?></td>
            <td>
                <div class="label label-<?php
                if ($row['status'] == 'closed')
                    echo 'primary';
                else if ($row['status'] == 'opened')
                    echo 'success'
                    ?>">
                    <?php echo $row['status']; ?></div>
            </td>
            <td>
                <div class="label label-<?php
                if ($row['priority'] == 'high')
                    echo 'danger';
                else if ($row['priority'] == 'medium')
                    echo 'info';
                else if ($row['priority'] == 'low')
                    echo 'default'
                    ?>">
                    <?php echo $row['priority']; ?></div>
            </td>
            <td>
			
			<a class="btn btn-info btn-rounded btn-sm tooltip-primary" data-toggle="tooltip" data-placement="top" title="" data-original-title="<?php echo get_phrase('project_room');?>" 
            		href="<?php echo base_url(); ?>student/support_ticket_view/<?php echo $row['ticket_code']; ?>">
                	<strong style="color:#fff"><i class="fa fa-list"></i> <?php echo get_phrase('view_ticket'); ?></strong>
                </a>
				
               
            </td>
        </tr>
    <?php endforeach; ?>
</tbody>
</table>





<script type="text/javascript">



    jQuery(document).ready(function ($)
    {
        var datatable = $(".datatable").dataTable({
            "sPaginationType": "bootstrap",
            "aoColumns": [
                {"bSortable": false},
                null,
                null,
                null,
                null,
                null,
                null
            ],
        });

        $(".dataTables_wrapper select").select2({
            minimumResultsForSearch: -1
        });

    });

</script>
