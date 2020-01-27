<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('all_transportations');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div><?php echo get_phrase('transport_name');?></div></th>
                    		<th><div><?php echo get_phrase('route_name');?></div></th>
                    		<th><div><?php echo get_phrase('vehicle_name');?></div></th>
                    		<th><div><?php echo get_phrase('number_of_vehicle');?></div></th>
                    		<th><div><?php echo get_phrase('description');?></div></th>
                    		<th><div><?php echo get_phrase('route_fare');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php $count = 1;foreach($transports as $row):?>
                        <tr>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('transport_route',$row['transport_route_id']);?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('vehicle',$row['vehicle_id']);?></td>
							<td><?php echo $row['number_of_vehicle'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['route_fare'];?></td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
			</div>
</div>
</div>
</div>
</div>
</div>