<?php
  $invoice_title = $this->db->get_where('invoice', array('invoice_id' => $invoice_id))->row()->title;
  $discount = $this->db->get_where('invoice', array('student_id' => $student_id, 'invoice_id' => $invoice_id))->row()->discount;
  $due_process = $this->db->get_where('invoice', array('student_id' => $student_id, 'invoice_id' => $invoice_id))->row()->due;
  $due = $due_process - $discount;
  $MERCHANT_KEY = $this->db->get_where('settings' , array('type' =>'payumoney_merchant_key'))->row()->description;
  $SALT = $this->db->get_where('settings' , array('type' =>'payumoney_salt_id'))->row()->description;
?>
<?php
// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://test.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {
    $posted[$key] = $value;
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
      || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}
?>


  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>

  <body onLoad="submitPayuForm()">
    <div class="row">
      <div class = "col-md-12">
   
    <?php if($formError) { ?>

      <span style="color:red">Please fill all mandatory fields.</span>
     
    <?php } ?>

		  
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('payumoney_payment_form');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
          <h3>MUST FILL FORM</h3>
          <form class = "form-horizontal form-groups-bordered" action="<?php echo $action; ?>" method="post" name="payuForm">
              <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
              <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
              <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
              <input type="hidden" name="student_id" value="<?php echo $student_id; ?>" />
              <input type="hidden" name="invoice_id" value="<?php echo $invoice_id; ?>" />
			  
              <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('due_amount');?></label>
                    <div class="col-sm-12">
                      <input type="number" class="form-control" name="amount" value="<?php echo $due;?>" max="<?php echo $due;?>" min = "<?php echo $due;?>" required>
                  </div>
				  </div>

                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('first_name');?></label>
                    <div class="col-sm-12">
           <input type = "text" class="form-control" name="firstname" id="firstname" value="<?php echo (empty($posted['firstname'])) ? '' : $posted['firstname']; ?>" required/>
                  </div>
              </div>

             <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('email');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="email" id="email" value="<?php echo (empty($posted['email'])) ? '' : $posted['email']; ?>" required/>
                  </div>
				  </div>

                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('phone');?></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="phone" value="<?php echo (empty($posted['phone'])) ? '' : $posted['phone']; ?>" required/>
                  </div>
              </div>

             <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('invoice_title');?></label>
                    <div class="col-sm-12">
                      <textarea class="form-control" name="productinfo" required><?php echo $invoice_title; ?></textarea>
                  </div>
              </div>
			  
				  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('Success_URI');?></label>
                    <div class="col-sm-12">
                      <input type = "hidden" name="surl" class="form-control" value="<?php echo base_url('payumoney/on_success'); ?>" size="64" />
                  </div>
              </div>
			  
              <div class="form-group" style="display: none;">
                  <label  class="col-sm-1 control-label"><?php echo get_phrase('Failure_URI:');?></label>
                  <div class="col-sm-3">
                      <input type = "hidden" name="furl" class="form-control" value="<?php echo base_url('payumoney/on_failure'); ?>" size="64" />
                  </div>
              </div>
              	<input type="hidden" class="form-control" name="service_provider" value="payu_paisa" size="64" />

              <h3>OPTIONAL FORM</h3>

              <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('last_name');?></label>
                    <div class="col-sm-12">
                      <input type="text" class="form-control" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>"/>
                  </div>
				  </div>

				  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('cancel_url');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="curl" value="" />
                  </div>
              </div>

              <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('address');?>1</label>
                    <div class="col-sm-12">
                      <input type = "text" class="form-control" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" />
                  </div>
				  </div>
				  
				  
                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('address');?>2</label>
                    <div class="col-sm-12">
                      <input type = "text" class="form-control" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" />
                  </div>
              </div>


              <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('city');?></label>
                    <div class="col-sm-12">
                      <input type = "text" class="form-control" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" />
                  </div>
				</div>				 

                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('state');?></label>
                    <div class="col-sm-12">
                      <input type = "text" class="form-control" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" />
                  </div>
              </div>

               <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('country');?></label>
                    <div class="col-sm-12">
                      <input type = "text" class="form-control" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" />
                  </div>
				  </div>

                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('zip_code');?></label>
                    <div class="col-sm-12">
                      <input type = "text" class="form-control" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" />
                  </div>
              </div>

				   <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('UDF1');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" />
                  </div>
				  </div>

                 <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('UDF2');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" />
                  </div>
              </div>

              <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('UDF3');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" />
                  </div>
				  </div>

                  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('UDF4');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" />
                  </div>
              </div>

              <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('UDF5');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" />
                  </div>
				  </div>

				  <div class="form-group">
                 	<label class="col-md-12" for="example-text"><?php echo get_phrase('PG');?></label>
                    <div class="col-sm-12">
                      <input class="form-control" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" />
                  </div>
              </div>

         
              <?php if(!$hash) { ?>
                <input class="btn btn-success btn-rounded btn-sm" type="submit" value="Submit" />
              <?php } ?>

            </form>
          </div>

        </div>
      </div>
	  </div>
      </div>

  </body>
