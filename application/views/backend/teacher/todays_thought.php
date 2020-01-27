  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('today_thoughts');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
                	<table id="example23" class="display nowrap" cellspacing="0" width="100%">

					<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('thought');?></div></th>
                    		
						</tr>
					</thead>
                    <tbody>
                    <?php $count = 1;foreach($todays_thoughts as $row):?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['thought'];?></td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
				
				<?php if($row['thought'] == ''):?>
							<div class="alert alert-danger" align="center">No Data to be Displayed</div>
							<?php endif;?>
			</div>
</div>
</div>
</div>
</div>
</div>
