<div class="row">
                    <div class="col-sm-12">
				  	<div class="panel panel-info">
                            <div class="panel-heading"> <i class="fa fa-list"></i>&nbsp;&nbsp;<?php echo get_phrase('study_materials');?></div>
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body table-responsive">
 								<table id="example23" class="display nowrap" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>#</th>
            <th><?php echo get_phrase('date');?></th>
            <th><?php echo get_phrase('subject');?></th>
            <th><?php echo get_phrase('uploader');?></th>
            <th><?php echo get_phrase('description');?></th>
            <th><?php echo get_phrase('class');?></th>
            <th><?php echo get_phrase('download');?></th>
        </tr>
    </thead>

    <tbody>
        <?php 
        $count = 1;
        foreach ($study_material_info as $row) { ?>   
            <tr>
                <td><?php echo $count++; ?></td>
                <td><?php echo $row['timestamp']; ?></td>
                 <td>
                    <?php $name = $this->db->get_where('subject' , array('subject_id' => $row['subject_id'] ))->row()->name;
                        echo $name;?>
                </td>
				 <td>
                    <?php $name = $this->db->get_where('teacher' , array('teacher_id' => $row['teacher_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td><?php echo $row['description']?></td>
                <td>
                    <?php $name = $this->db->get_where('class' , array('class_id' => $row['class_id'] ))->row()->name;
                        echo $name;?>
                </td>
                <td>
                    <a href="<?php echo base_url().'uploads/document/'.$row['file_name']; ?>" class="btn btn-info btn-circle btn-xs" style="color:white">
                        <i class="fa fa-download"></i>
                    </a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
<?php if($row['file_name'] == ''):?>
							<div class="alert alert-danger" align="center">No Data to be Displayed</div>
							<?php endif;?>
</div>
</div>
</div>
</div>
</div>