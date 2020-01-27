<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-plus"></i>&nbsp;&nbsp;Check Result</div>
										<div class="panel-body table-responsive">

<!----CREATION FORM STARTS---->
                	<div class="col-md-6">
				 
<!-- Horizontal Form -->
					<div class="panel panel-green margin-bottom-40"> 
				
						<div class="panel-body"> 
						
<?php echo form_open(base_url() . 'student/checkResult/searchOutResult/' , array('class' => 'form-horizontal form-groups-bordered validate', 'enctype' => 'multipart/form-data'));?>

				<div class="form-group">
                     <label class="col-md-12" for="example-text"><?php echo get_phrase('Exam Session');?></label>
                     <div class="col-sm-12">
						  <select name="running_session" class="form-control select2" required>
                          <?php $running_session = $this->db->get_where('settings', array('type' => 'session'))->row()->description; ?>
                          <option value=""><?php echo get_phrase('select_running_session');?></option>
                          <?php for($i = 0; $i < 10; $i++):?>
                              <option value="<?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>"
                                <?php if($running_session == (2017+$i).'-'.(2017+$i+1)) echo 'selected';?>>
                                  <?php echo (2017+$i);?>-<?php echo (2017+$i+1);?>
                              </option>
                          <?php endfor;?>
                          </select>
                      </div>
                  </div>
				  
							<input type="hidden" id="load" class="form-control" name="status" value="unuse" required>
							<input type="hidden" id="load" class="form-control" name="student_id" value="<?php echo $this->session->userdata('login_user_id') ?>" required>
							
					<div class="form-group">
									<label class="col-md-12" for="example-text"><?php echo get_phrase('PIN');?></label>
									<div class="col-sm-12">
							<input type="text" id="load" class="form-control" name="pin" value="" required>
							
						</div> 
					</div>
					
					<div class="form-group">
									<label class="col-md-12" for="example-text"><?php echo get_phrase('Serial Number');?></label>
									<div class="col-sm-12">
							<input type="text" id="load" class="form-control" name="serial" value="" required>
						</div> 
					</div>
					
					<div class="form-group">
									<div align="right">
										<button type="submit" name="submit" class="btn btn-success btn-rounded btn-sm"><i class="fa fa-save"></i>&nbsp;Get Result</button>
										<img id="install_progress" src="<?php echo base_url() ?>assets/images/loader-2.gif" style="margin-left: 20px; display: none"/>
										
									</div>
								</div>
							</form>
						<div align="right">Have you had any problem checking your result earlier? Send <br>an email to:&nbsp;<a href="<?php echo base_url(); ?>welcome/contact">Online Support</a><br>
						Tel: <?php echo $this->db->get_where('settings', array('type' => 'phone'))->row()->description; ?></div>
						
						<div style="background:#CCCCCC; color:black">
						1. Select Exam Session <br>
						2. Select Your Class so as you to be able to select your name from the listed names.
						3. Select your name<br >	
						4. Enter your 32 Digit PIN in your card<br>
						5. Enter Card Serial Number<br>
						6. Click on Check Result button and wait for your result to be postulated.					
						</div>
						</div>
					</div>
					<!-- End Horizontal Form -->
					
   			</div>
				<!--Aside Bar Wrap Start-->
                    <div class="col-md-6">
                        <aside class="gt_aside_outer_wrap">
                        	
 							<!--Recent News Wrap Start-->
                            <div class="gt_aside_post_wrap gt_detail_hdg aside_margin_bottom">
								
							<!-- Horizontal Form -->
					<div class="panel panel-green margin-bottom-40">
				
						<div class="panel-body">
								
								

					
				
					

             
			
				
							
			 <div class="col-md-12">
                        <div class="panel-group" id="exampleAccordionDefault" aria-multiselectable="true" role="tablist">
                           <div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultOne" role="tab"> <a class="panel-title" data-toggle="collapse" href="#exampleCollapseDefaultOne" data-parent="#exampleAccordionDefault" aria-expanded="true" aria-controls="exampleCollapseDefaultOne" style="color:white"> What is a e-PIN? </a> </div>
                                <div class="panel-collapse collapse in" id="exampleCollapseDefaultOne" aria-labelledby="exampleHeadingDefaultOne" role="tabpanel">
                                    <div class="panel-body"> The e-PIN stands for Electronic Personal Identification Number. It is a unique 10-digit or 12-digit number that is required to access the service. The service enables direct access to a candidate's results via multiple channels. Contact Admin to get your e-PIN Voucher. </div>
                                </div>
                            </div>
                           <div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultTwo" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultTwo" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultTwo" style="color:white"> Where can I buy e-PIN? </a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultTwo" aria-labelledby="exampleHeadingDefaultTwo" role="tabpanel">
                                    <div class="panel-body"> An Electronic PIN may be purchased at the office of the school and at any of its Branch Offices across our country. From time to time it may become available at any other outlets so designated by school. The reviewed price for the e-PIN is now <?php echo $this->db->get_where('settings', array('type' => 'currency'))->row()->description; ?>&nbsp;<?php echo $this->db->get_where('settings', array('type' => 'formPayment'))->row()->description; ?>.  </div>
                                </div>
                            </div>
							
							
                            <div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultThree" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultThree" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultThree" style="color:white"> How many times can I check my results?</a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultThree" aria-labelledby="exampleHeadingDefaultThree" role="tabpanel">
                                    <div class="panel-body"> You may check your result up to a maximum of 5 (five) times with the use of 1 (one) e-PIN. In order to check further after exhausting the allowed 5 (five) times, you will need to purchase another e-PIN which will entitle you to another 5 (five) result checks. </div>
                                </div>
                            </div>
							
							  <div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultFour" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultFour" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultFour" style="color:white">Can I use one e-PIN to check more than one result?</a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultFour" aria-labelledby="exampleHeadingDefaultFour" role="tabpanel">
                                    <div class="panel-body"> No! You may only use one e-PIN Voucher to check one result. To check another result of interest, you will require a new e-PIN Voucher. If you misuse a e-PIN Voucher by attempting to check another result different from the first one checked, you will be penalised as having used the e-PIN, and will be presented with the appropriate error message. </div>
                                </div>
                            </div>
							
							<div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultFive" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultFive" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultFive" style="color:white">In what other ways can I check my results? </a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultFive" aria-labelledby="exampleHeadingDefaultFive" role="tabpanel">
                                    <div class="panel-body"> No. You may only use one e-PIN to check one result. To check another result of interest, you will require a new e-PIN. If you misuse an e-PIN by attempting to check another result different from the first one checked, you will be penalised as having used the e-PIN, and will be presented with the appropriate error message.  </div>
                                </div>
                            </div>
							
							<div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultSix" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultSix" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultSix" style="color:white"> I have a problem in checking my Exam Result Please help? </a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultSix" aria-labelledby="exampleHeadingDefaultSix" role="tabpanel">
                                    <div class="panel-body"> 
									Kindly send the following details to <?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?> for verification and assistance<br>

    1. Error message displayed<br>
    2. Examination Session<br>
    3. Selection of Class<br>
    4. Selection of Student.<br>

Visit the nearest school office for Further enquirers  </div>
                                </div>
                            </div>
							
							
							<div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultSeven" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultSeven" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultSeven" style="color:white">I went to SCHOOL portal and filled in the required details only to see a page telling me there is no result for the candidate in the specified year. Please what do I do? </a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultSeven" aria-labelledby="exampleHeadingDefaultSeven" role="tabpanel">
                                    <div class="panel-body"> We advise you to keep checking at intervals because the website may be updated subsequently or visit the nearest SCHOOL office for assistance. </div>
                                </div>
                            </div>
							
							
							<div class="panel panel-info">
                                <div class="panel-heading" id="exampleHeadingDefaultEight" role="tab"> <a class="panel-title collapsed" data-toggle="collapse" href="#exampleCollapseDefaultEight" data-parent="#exampleAccordionDefault" aria-expanded="false" aria-controls="exampleCollapseDefaultEight" style="color:white">Yout got other issues you want us to resolve for you? </a> </div>
                                <div class="panel-collapse collapse" id="exampleCollapseDefaultEight" aria-labelledby="exampleHeadingDefaultEight" role="tabpanel">
                                    <div class="panel-body"> Kindly send the following details to <?php echo $this->db->get_where('settings', array('type' => 'system_email'))->row()->description; ?> for verification and assistance<br>
We recommed you visit the nearest school office for Further enquirers </div>
                                </div>
                            </div>
							
                        </div>
                    </div>
                </div>
                <!-- .row -->
			
				</div> 					
				</div>
				</div>
					<!-- End Horizontal Form -->
                            </div>
                </div>                
			</div>
		</div>
			<!----CREATION FORM ENDS-->
		
</div>
            <!----TABLE LISTING ENDS--->
		