<div class="row">
     
					
<div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_awards'); ?></div>
							


<div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
			
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">    <thead>
        <tr>
            <th><div>#</div></th>
            <th><div>ID</div></th>
            <th><div><?php echo get_phrase('award_name'); ?></div></th>
            <th><div><?php echo get_phrase('gift'); ?></div></th>
            <th><div><?php echo get_phrase('amount'); ?></div></th>
            <th><div><?php echo get_phrase('awarded_employee'); ?></div></th>
            <th><div><?php echo get_phrase('date'); ?></div></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count = 1;
        $this->db->order_by('award_id', 'desc');
        $award = $this->db->get_where('award',
            array('teacher_id' => $this->session->userdata('login_user_id')))->result_array();
        foreach ($award as $row): ?>
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['award_code']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['gift']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                <td><?php echo $this->db->get_where('teacher', array('teacher_id' => $row['teacher_id']))->row()->name; ?></td>
                <td><?php echo date('d/m/Y', $row['date']); ?></td>
            </tr>
    <?php endforeach; ?>
    </tbody>
</table>


</div>
			</div>
			</div>
			</div>
			</div>
            <!----TABLE LISTING ENDS--->
