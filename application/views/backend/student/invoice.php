<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('invoices');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('student');?></div></th>
                    		<th><div><?php echo get_phrase('title');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('total_amount');?></div></th>
                            <th><div><?php echo get_phrase('amount_paid');?></div></th>
                            <th><div><?php echo get_phrase('balance');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
                    		<th><div><?php echo get_phrase('options');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php foreach($invoices as $row):?>
                        <tr>
							<td><?php echo $this->crud_model->get_type_name_by_id('student',$row['student_id']);?></td>
							<td><?php echo $row['title'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['amount'],2,".",",");?></td>
							 <td><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['amount_paid'],2,".",",");?></td> 
							 <td><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['due'],2,".",",");?></td>
							 
							  <?php if($row['due'] == 0):?>
                                <td>
                                    <span class="label label-success"><?php echo get_phrase('paid');?></span>
                                </td>
                            <?php endif;?>
                            <?php if($row['due'] > 0):?>
                                <td>
                                    <span class="label label-danger"><?php echo get_phrase('unpaid');?></span>
                                </td>
                            <?php endif;?>

							<td><?php echo date('d M,Y', $row['creation_timestamp']);?></td>
							<td>
							 <?php if ($row ['status']=='paid'):?>                    	
<a href="<?php echo base_url();?>student/paid_history/<?php echo $row['invoice_id'];?>" class="btn btn-success btn-rounded btn-sm"  style="color:white"><i class="fa fa-print"></i>&nbsp;Print Invoice </a>
<?php endif; ?>
<?php if ($row ['status']=='unpaid'):?>                    	
<a href="<?php echo base_url();?>student/payment_invoice/<?php echo $row['invoice_id'];?>" class="btn btn-info btn-rounded btn-sm"  style="color:white"><i class="fa fa-credit-card"></i>&nbsp;Pay Invoice </a>
<?php endif; ?>
							 
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