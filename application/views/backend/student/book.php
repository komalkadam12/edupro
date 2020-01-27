  
  <div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('list_books');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
								
<table id="example23" class="display nowrap" cellspacing="0" width="100%">
                	<thead>
                		<tr>
                    		<th><div>#</div></th>
                    		<th><div><?php echo get_phrase('book_name');?></div></th>
                    		<th><div><?php echo get_phrase('author');?></div></th>
                    		<th><div><?php echo get_phrase('isbn_number');?></div></th>
                    		<th><div><?php echo get_phrase('edition');?></div></th>
                    		<th><div><?php echo get_phrase('subject');?></div></th>
                    		<th><div><?php echo get_phrase('desc');?></div></th>
                    		<th><div><?php echo get_phrase('price');?></div></th>
                    		<th><div><?php echo get_phrase('class');?></div></th>
                    		<th><div><?php echo get_phrase('status');?></div></th>
						</tr>
					</thead>
                    <tbody>
                    	<?php
						$this->db->where('class_id' , $class_id);
						$books	=	$this->db->get('book')->result_array();
						foreach($books as $row):
						?>
                        <tr>
                            <td><?php echo $count++;?></td>
							<td><?php echo $row['name'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('author',$row['author_id']);?></td>
							<td><?php echo $row['isbn'];?></td>
							<td><?php echo $row['edition'];?></td>
							<td><?php echo $row['subject'];?></td>
							<td><?php echo $row['description'];?></td>
							<td><?php echo $row['price'];?></td>
							<td><?php echo $this->crud_model->get_type_name_by_id('class',$row['class_id']);?></td>
							<td><span class="label label-<?php if($row['status']=='available')echo 'success';else echo 'warning';?>"><?php echo $row['status'];?></span></td>
							
                        </tr>
                        <?php endforeach;?>
                    </tbody>
                </table>
				
				<?php if($row['name'] == ''):?>
							<div class="alert alert-danger" align="center">No Data to be Displayed !</div>
							<?php endif;?>
				
			</div>
</div>
</div>
</div>
</div>
