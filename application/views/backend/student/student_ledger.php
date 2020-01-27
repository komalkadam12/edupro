<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_invoices');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th><?php echo get_phrase('invoice_no'); ?></th>
            <th><?php echo get_phrase('title'); ?></th>
            <th><?php echo get_phrase('student'); ?></th>
            <th><?php echo get_phrase('creation_date'); ?></th>
            <th><?php echo get_phrase('due_date'); ?></th>
            <th><?php echo get_phrase('vat_%'); ?></th>
            <th><?php echo get_phrase('discount'); ?></th>
            <th><?php echo get_phrase('status'); ?></th>
            <th><?php echo get_phrase('options'); ?></th>
        </tr>
    </thead>

    <tbody>
        <?php foreach ($select as $row) { ?>   
            <tr>
                <td><?php echo $row['invoice_number'] ?></td>
                <td><?php echo $row['title'] ?></td>
                <td>
                    <?php $name = $this->db->get_where('student' , array('student_id' => $row['student_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php echo $row['c_date'] ?></td>
                <td><?php echo $row['d_date'] ?></td>
                <td><?php echo $row['vat_percentage'] ?></td>
                <td><?php echo $row['discount_amount'] ?></td>
                <td><span class="label label-<?php if($row['status']=='paid')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span>
</td>
                <td>
				<?php if ($row ['status']=='paid'):?>                    	
<a href="<?php echo base_url();?>student/print_ledger_invoice/<?php echo $row['ledger_id'];?>" class="btn btn-success btn-rounded btn-sm" target="_blank" style="color:white"><i class="fa fa-print"></i>&nbsp;Print Invoice </a>
<?php endif; ?>
<?php if ($row ['status']=='unpaid'):?>                    	
<a href="<?php echo base_url();?>student/view_invoice_details/<?php echo $row['ledger_id'];?>" class="btn btn-info btn-rounded btn-sm" target="_blank" style="color:white"><i class="fa fa-print"></i>&nbsp;Pay Invoice </a>
<?php endif; ?>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>
</div>
</div>
</div>
</div>