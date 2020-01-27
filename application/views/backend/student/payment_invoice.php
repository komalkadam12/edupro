
<?php
	$paypal_details = json_decode($this->db->get_where('settings' , array('type'=>'paypal'))->row()->description, true);
	$stripe_details = json_decode($this->db->get_where('settings' , array('type'=>'stripe_keys'))->row()->description, true);

	$paypal_activity = $paypal_details[0]['active'];
	$stripe_activity = $stripe_details[0]['active'];

 ?>


<?php foreach($pay_invoice_new as $row):?>
 <div class="row">
              <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('payment_details');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
	 <div id="invoice_print">
        <table width="100%" border="0">
            <tr>
			<td align="left" valign="top">
					
                   <strong>PAYMENT TO</strong><br> <?php echo $this->db->get_where('settings', array('type' => 'system_name'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'address'))->row()->description; ?><br>
                    <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?><br>            
                </td>
                <td align="right">
				      <h5><?php echo get_phrase('invoice_number'); ?> : <strong><?php echo $row['invoice_number'];?></h5></strong>
                    <h5><?php echo get_phrase('creation_date'); ?> : <?php echo date('d M,Y', $row['creation_timestamp']);?></h5>
                    <h5><?php echo get_phrase('payment_title'); ?> : <?php echo $row['title'];?></h5>
                    <h5><?php echo get_phrase('descriptions'); ?> : <?php echo $row['description'];?></h5>
                    <h5><?php echo get_phrase('payment_status'); ?> : <span class="label label-info"><?php echo $row['status']; ?></span></h5>
                </td>
				 
            </tr>
        </table>
        <br>
        <table width="100%" border="0">    
            <tr>
               
                <td align="right" valign="top">
                   <?php echo get_phrase("student's_name"); ?> : <?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->name; ?><br><?php 
                        $class_id = $this->db->get_where('student' , array('student_id' => $row['student_id']))->row()->class_id;
                        echo get_phrase("student's_class").':' . ' ' . $this->db->get_where('class', array('class_id' => $class_id))->row()->name;
                    ?><br>
                     <?php echo get_phrase("roll_number"); ?> :<?php echo $this->db->get_where('student', array('student_id' => $row['student_id']))->row()->roll; ?><br>
					 <img src="<?php echo base_url().'uploads/QRImage/'. $row['invoice_number'].'.png'; ?>" />
                </td>
            </tr>
        </table>
        
        <br>

        <!-- payment history -->
        <h4><?php echo get_phrase('payment_history'); ?></h4>
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><?php echo get_phrase('title'); ?></th>
                    <th><?php echo get_phrase('date'); ?></th>
                    <th><?php echo get_phrase('payment_history'); ?></th>
                    <th><?php echo get_phrase('method'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php
                $payment_history = $this->db->get_where('payment', array('invoice_id' => $row['invoice_id']))->result_array();
                foreach ($payment_history as $row2):
                    ?>
                    <tr>
                        <td><?php echo $row['title']; ?></td> 
						<td><?php echo date("d M, Y", $row2['timestamp']); ?></td>
                        <td><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row2['amount'],2,".",",");?></td>
                        <td>
                            <?php 
                                if ($row2['method'] == 1)
                                    echo get_phrase('cash');
                                if ($row2['method'] == 2)
                                    echo get_phrase('bank_payment');
                                if ($row2['method'] == 3)
                                    echo get_phrase('card');
                                if ($row2['method'] == 'paypal')
                                    echo 'paypal';
								if ($row2['method'] == 'vogue')
                                    echo 'vogue';
								if ($row2['method'] == 'paystack')
                                    echo 'paystack';
								if ($row2['method'] == 'payumoney')
                                    echo 'payumoney';
								if ($row2['method'] == 'stripe')
                                    echo 'stripe';
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
            <tbody>
        </table>
		
		<br>

        <table width="100%" border="0">    
            <tr>
                <td align="right" width="80%"><?php echo get_phrase('total_amount'); ?> :</td>
                <td align="right"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['amount'],2,".",",");?></td>
            </tr>
			 <tr>
                <td align="right" width="80%"><?php echo get_phrase('discount'); ?> :</td>
                <td align="right"><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo $dis = number_format($row['discount'],2,".",",");?></td>
            </tr>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('paid_amount'); ?> :</h4></td>
                <td align="right"><h4><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['amount_paid'],2,".",",");
				?>
				
				
				</h4></td>
            </tr>
            <?php if ($row['due'] != 0):?>
            <tr>
                <td align="right" width="80%"><h4><?php echo get_phrase('due'); ?> :</h4></td>
                <td align="right"><h4><?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php $due = $row['due'];?>
				<?php $money = $due - $dis; ?>
				<?php echo $money; ?>
				
				</h4></td>
            </tr>
            <?php endif;?>
        </table>

		
</div>
<?php endforeach; ?>
<hr>
<strong>PAYMENT METHOD</strong>
<hr>
 <?php if ($row['payment_method'] == 1):?>
 You are to pay your money with cash. please go nursary office to do that. Thanks
   <?php endif;?>
   <?php if ($row['payment_method'] == 2):?>
   
   
   <table class="table" id="table-2">
                	<thead>
                		<tr>
						<th>Bank Name</th>
						<th>Account Number</th>
						<th>Sort Code</th>
						<th>Swift Number</th>
						<th>Iban Number</th>
						</tr>
					</thead>
                    <tbody>
					<tr>
					<td><?php echo $this->db->get_where('settings', array('type' => 'bname'))->row()->description; ?></td>
					<td><?php echo $this->db->get_where('settings', array('type' => 'anumber'))->row()->description; ?></td>
					<td><?php echo $this->db->get_where('settings', array('type' => 'scode'))->row()->description; ?></td>
					<td><?php echo $this->db->get_where('settings', array('type' => 'snumber'))->row()->description; ?></td>
					<td><?php echo $this->db->get_where('settings', array('type' => 'iban'))->row()->description; ?></td>
					</tr>
					</tbody>
					</table>
   <?php endif;?>
   <?php if ($row['payment_method'] == 3):?>
 <div class="form-group">
 <div class="col-md-2">
	<?php $payumoney = $this->db->get_where('settings' , array('type' =>'payumoney'))->row()->description;?> 
	<?php if ($payumoney['payumoney'] != ''):?>
	
	<a href="<?php echo base_url('student/pay_with_payumoney/'.$row['student_id'].'/'.$row['invoice_id']);?>" type="button" class="btn btn-info btn-rounded btn-sm" style="color:white"> <i class="fa fa-credit-card"></i>&nbsp;<?php echo get_phrase('payumoney') ?></a>
	<?php endif;?>
	</div>
	
	
	<div class="col-md-2">
	<?php $vogue = $this->db->get_where('settings' , array('type' =>'vogue'))->row()->description;?> 
	<?php if ($vogue['vogue'] != ''):?>
<form method='POST' action='https://voguepay.com/pay/'>
<input type="hidden" name="v_merchant_id" value="<?php echo $this->db->get_where('settings', array('type' => 'voguepay'))->row()->description; ?>" />
<input type="hidden" name="success_url" value="<?php echo base_url();?>student/vouguepay_success/<?php echo $row['invoice_id'];?>" />
<input type="hidden" name="merchant_ref" value="<?php echo $this->db->get_where('settings', array('type' => 'voguepay'))->row()->description; ?>" />
<input type="hidden" name="cur" value="<?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>" />

<input type="hidden" name="price_1" value="<?php echo $money; ?>" />
<input type="hidden" name="memo" value="PAYMENT FOR:&nbsp;<?php echo $row['title'];?>" />
<button type="submit" class="btn btn-warning btn-rounded btn-sm"><i class="fa fa-credit-card"></i> Vogue Payment</button>
<!--<input type="image" src="../cmopol/pay.jpg" alt="PAY WITH CREDIT CARD"/>-->
</form>
	<?php endif;?>
	</div>
	
	
	<div class="col-md-2">
	<?php $paystack = $this->db->get_where('settings' , array('type' =>'paystack'))->row()->description;?> 
	<?php if ($paystack['paystack'] != ''):?>
<form >
  <script src="https://js.paystack.co/v1/inline.js"></script>
  <button class="btn btn-success btn-rounded btn-sm"  type="button" onclick="payWithPaystack()"> <i class="fa fa-credit-card"></i>&nbsp;Paystack Payment</button>   
</form>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: '<?php echo $this->db->get_where('settings', array('type' => 'paystack'))->row()->description; ?>',
      email: '<?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?>',
      amount: <?php echo $money; ?>00,
     
      metadata: {
         custom_fields: [
            {
                display_name: "Mobile Number",
                variable_name: "mobile_number",
                value: "<?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?>"
            }
         ]
      },
      callback: function(response){
          alert('success. transaction ref is ' + response.reference);
		  window.location = "<?php echo base_url();?>student/vouguepay_success/<?php echo $row['invoice_id'];?>";	  
      },
      onClose: function(){
          alert('UNFINISHED PAYMENT, PLEASE TRY AGAIN TO COMPLETE YOUR TRANSATION');
      }
    });
    handler.openIframe();
  }
</script>
	<?php endif;?>
</div>	

	<div class="col-md-2">
	<?php $paypal = $this->db->get_where('settings' , array('type' =>'paypal_setting'))->row()->description;?> 
	<?php if ($paypal['paypal'] != ''):?>
	
	
	
<?php echo form_open(site_url('student/paypal_checkout/'.$row['student_id']));?>

<input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>" />
<button type="submit" class="btn btn-primary btn-rounded btn-sm" <?php if($row['due'] == 0 || $paypal_activity == 0):?> disabled="disabled"<?php endif;?>>
                          <span data-toggle="tooltip" title="Paypal"><i class="fa fa-paypal" aria-hidden="true" style="color: #fff;"></i> Paypal Payment</span>
                        </button>
</form>
<?php endif;?>
	</div>
	
	
	
	<div class="col-md-2">
	<?php $stripe = $this->db->get_where('settings' , array('type' =>'stripe'))->row()->description;?> 
	<?php if ($stripe['stripe'] != ''):?>
	<?php echo form_open(site_url('student/stripe_checkout/'.$row['student_id']));?>
	<input type="hidden" name="invoice_id" value="<?php echo $row['invoice_id'];?>" />
<button type="submit" class="btn btn-info btn-sm btn-rounded" <?php if($row['due'] == 0 || $stripe_activity == 0):?> disabled="disabled"<?php endif;?>>
                                <span data-toggle="tooltip" title="Stripe"><i class="fa fa-cc-stripe" aria-hidden="true" style="color: #fff;"></i> Stripe Payment</span>
                            </button>
</form>

	<?php endif;?>
</div>

   <?php endif;?>
<a onClick="PrintElem('#invoice_print')" class="btn btn-info btn-rounded btn-sm pull-right"><i class="fa fa-print"></i>&nbsp;Print</a>
</div>
</div>

</div>
</div>
</div>
</div>

<script type="text/javascript">

    // print invoice function
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