  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_news');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('news_title');?></div></th>
                    		<th><div><?php echo get_phrase('news_content');?></div></th>
                    		<th><div><?php echo get_phrase('date');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php foreach($newss as $row):?>
                        <tr>
							<td><?php echo $row['news_title'];?></td>
							<td><?php echo $row['news_content'];?></td>
							<td><?php echo $row['date'];?></td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
				<?php if($row['news_title'] == ''):?>
							<div class="alert alert-danger" align="center">No Data to be Displayed</div>
							<?php endif;?>
				
			</div>
			</div>
			</div>
			</div>
			</div>
			