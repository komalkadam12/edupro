<?php foreach($pay_invoice_new as $row):?>

        <div class="row">
                    <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('stripe_payment'); ?></div>
										<div class="panel-body table-responsive">
										
        <table class="table table-bordered" width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th width="60%"><?php echo get_phrase('title');?></th>
                    <th><?php echo get_phrase('payment_amount');?></th>
                </tr>
            </thead>
            
            <tbody>
                <tr>
                    <td>
                        <?php echo $row['title']; ?>
                    </td>
                    <td class="text-right">
                       <?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?><?php echo number_format($row['due'],2,".",",");?>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
	</div>
	</div>

   <div class="col-sm-6">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;<?php echo get_phrase('stripe_payment_form'); ?></div>
										<div class="panel-body table-responsive">
				
				                    <?php echo form_open(base_url() . 'student/stripe_payment/pay/' . $param2, array('id' => 'payment-form' , 'class' => 'form-horizontal form-groups validate invoice-edit', 'enctype' => 'multipart/form-data')); ?>

                
                    
                       <div class="form-group">
                       <label class="col-md-12"><?php echo get_phrase('card_number'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" autocomplete="off" class="form-control" id="card-number" />
                        </div>
                    </div>
                    
                     <div class="form-group">
                       <label class="col-md-12"><?php echo get_phrase('CVC'); ?></label>

                        <div class="col-sm-12">
                            <input type="text" autocomplete="off" class="form-control" id="card-cvc" />
                        </div>
                    </div>
					
					
                      <div class="form-group">
                       <label class="col-md-12"><?php echo get_phrase('expiry_date');?>*</label>
                       <div class="col-md-6">
                            <input type="text" autocomplete="off" class="form-control" id="card-expiry-month" placeholder="MM"/>
                       </div>
                        <div class="col-md-6">
                            <input type="text" style="float: left;" autocomplete="off" 
                                class="form-control" id="card-expiry-year" placeholder="YYYY"/>
                        </div>
                    </div>
					
                    
                    <div class="form-group">
                        <div class="col-sm-offset-4">
                            <button type="submit" class="btn btn-info btn-rounded btn-sm" id="submit-button">
                                <strong style="color:#fff"> <i class="fa fa-credit-card"></i>&nbsp;<?php echo get_phrase('submit_payment'); ?></strong>
                            </button>
                            <a href="<?php echo base_url();?>client/projectroom/payment/<?php echo $project_code;?>" class="btn btn-danger btn-rounded btn-sm">
                               <strong style="color:#fff"> <i class="fa fa-times"></i>&nbsp;<?php echo get_phrase('discard');?></strong>
                            </a>
                        </div>
                    </div>
                <?php echo form_close();?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>
<?php 
    $publishable_key = $this->db->get_where('settings' , array('type' => 'stripe_publishable_key'))->row()->description;
?>


<script type="text/javascript" src="https://js.stripe.com/v1/"></script>
<script type="text/javascript">
    // this identifies your website in the createToken call below
    
    Stripe.setPublishableKey('<?php echo $publishable_key;?>'); // the key will come from system payment settings

    function stripeResponseHandler(status, response) {
        if (response.error) {
            // re-enable the submit button
            $('#submit-button').removeAttr("disabled");
            // show the errors on the form
            $.toast(response.error.message);
        } else {
            var form$ = $("#payment-form");
            // token contains id, last4, and card type
            var token = response['id'];
            // insert the token into the form so it gets submitted to the server
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            // and submit
            form$.get(0).submit();
        }
    }

    $(document).ready(function() {
        $("#payment-form").submit(function(event) {
            // disable the submit button to prevent repeated clicks
            $('#submit-button').attr("disabled", "disabled");

            // createToken returns immediately - the supplied callback submits the form if there are no errors
            Stripe.createToken({
                number: document.getElementById('card-number').value,
                cvc: document.getElementById('card-cvc').value,
                exp_month: document.getElementById('card-expiry-month').value,
                exp_year: document.getElementById('card-expiry-year').value
            }, stripeResponseHandler);
            return false; // submit from callback
        });
    });
</script>

