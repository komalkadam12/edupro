<?php 
foreach ($view_invoice_details as $row):
?>

 <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('payment_details');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">

    					<div id="invoice_print">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
            <tr>
                <td width="50%"><img src="<?php echo base_url() ?>uploads/logo.png" style="max-height:80px;"></td>
                <td align="right">
                    <h4><?php echo get_phrase('invoice_number'); ?> : <?php echo $row['invoice_number']; ?></h4>
                    <h5><?php echo get_phrase('issue_date'); ?> : <?php echo $row['c_date']; ?></h5>
                    <h5><?php echo get_phrase('due_date'); ?> : <?php echo $row['d_date']; ?></h5>
                    <h5><?php echo get_phrase('status'); ?> : <?php echo $row['status']; ?></h5>
                </td>
            </tr>
        </table>
        <hr>
        <table width="100%" border="0">    
            <tr>
                <td align="left"><h4><?php echo get_phrase('payment_to'); ?> </h4></td>
                <td align="right"><h4><?php echo get_phrase('bill_to'); ?> </h4></td>
            </tr>

            <tr>
                <td align="left" valign="top">
                    <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
                  <br>            
                </td>
                <td align="right" valign="top">
                    <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br>
                    <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->address; ?><br>
                    <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->phone; ?><br>
                    <strong>Section: <?php echo $this->db->get_where('section', array('section_id' => $row['section_id']))->row()->name; ?><br></strong>
                </td>
            </tr>
        </table>
        <hr>
        <h4><?php echo get_phrase('invoice_entries'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th class="text-center">#</th>
                    <th><?php echo get_phrase('entry'); ?></th>
                    <th><?php echo get_phrase('debit'); ?></th>
					<th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('credit'); ?></th>
                    <th><?php echo get_phrase('balance'); ?></th>
                </tr>
            </thead>

            <tbody>
                <!-- INVOICE ENTRY STARTS HERE-->
            <div id="invoice_entry">
                <?php
                $currency_symbol = $this->db->get_where('settings', array('type' => 'currency'))->row()->description;
                $total_amount       = 0;
                $invoice_entries    = json_decode($row['invoice_entries']);
                $i = 1;
                foreach ($invoice_entries as $invoice_entry)
                {
                    $total_amount += $invoice_entry->amount; ?>
                    <tr>
                        <td class="text-center"><?php echo $i++; ?></td>
                        <td>
                            <?php echo $invoice_entry->item; ?>
                        </td>
                        <td class="text-right">
                            <?php echo $currency_symbol . $invoice_entry->amount; ?>
                        </td>
						
						 <td>
                            <?php echo $invoice_entry->date2; ?>
                        </td>
						
						 <td>
                            <?php echo $invoice_entry->credit; ?>
                        </td>
						
						 <td>
                            <?php echo $invoice_entry->balance; ?>
                        </td>
                    </tr>
                <?php } 
                $grand_total = $this->crud_model->calculate_invoice_total_amount($row['invoice_number']); ?>
            </div>
            <!-- INVOICE ENTRY ENDS HERE-->
            </tbody>
        </table>
        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('sub_total'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . $total_amount; ?></td>
            </tr>
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('vat_percentage'); ?> :</td>
                <td align="right"><?php echo $row['vat_percentage']; ?>% </td>
            </tr>
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('discount'); ?> :</td>
                <td align="right"><?php echo $currency_symbol . $row['discount_amount']; ?> </td>
            </tr>
            <tr>
                <td colspan="2"><hr style="margin:0px;"></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('grand_total'); ?> :</h4></td>
                <td align="right"><h4><?php echo $currency_symbol . $grand_total; ?> </h4></td>
            </tr>
        </table>

       
    </div>
    <br>

    <a onClick="PrintElem('#invoice_print')" class="btn btn-info btn-rounded btn-sm">
        <i class="fa fa-print"></i>&nbsp;Print
    </a>

</div>
				</div>
				</div>
				</div>
				</div>
<?php endforeach;?>




<script type="text/javascript">

    function PrintElem(elem)
    {
        Popup($(elem).html());
    }

    function Popup(data)
    {
        var mywindow = window.open('', 'invoice', 'height=400,width=600');
        mywindow.document.write('<html><head><title>Invoice</title>');
        mywindow.document.write('<link rel="stylesheet" href="assets/css/neon-theme.css" type="text/css" />');
        mywindow.document.write('<link rel="stylesheet" href="assets/js/datatables/responsive/css/datatables.responsive.css" type="text/css" />');
        mywindow.document.write('</head><body >');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }

</script>