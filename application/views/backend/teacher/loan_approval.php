  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_applications');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo get_phrase('date');?></th>
            <th><?php echo get_phrase('amount');?></th>

            <th><?php echo get_phrase('purpose');?></th>
            <th><?php echo get_phrase('loan_duration');?></th>
            <th><?php echo get_phrase('mode_of_payment');?></th>
			
			<th><?php echo get_phrase('guarantor_name');?></th>
            <th><?php echo get_phrase('number');?></th>
            <th><?php echo get_phrase('collateral_name');?></th>
            <th><?php echo get_phrase('colateral_value');?></th>
            <th><?php echo get_phrase('status');?></th>
        </tr>
    </thead>

    <tbody>
	
        <?php $teacher = $this->db->get_where('loan', array('staff_name' => $this->session->userdata('login_user_id')))->result_array();
foreach ($teacher as $row):
    ?>
            <tr>
                <td><?php echo $row['loan_id']?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['amount']?></td>
                <td><?php echo $row['purpose']?></td> 
				
                <td><?php echo $row['l_duration']; ?></td>
                <td><?php echo $row['mop']?></td>
                <td><?php echo $row['g_name']?></td>
				
				 <td><?php echo $row['g_number']?></td>
                <td><?php echo $row['c_name']; ?></td>
				 <td><?php echo $row['value']?></td>

                <td>
								  <span class="label label-<?php if($row['status']=='Approved')echo 'success'; elseif ($row['status']=='Disapproved') echo 'danger'; else echo 'warning';?>"><?php echo $row['status'];?></span>
				</td>
               
                
            </tr>
               <?php endforeach;?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>
