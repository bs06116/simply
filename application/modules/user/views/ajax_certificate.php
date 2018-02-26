	<div class="modal-header">
        <h3 class="modal-title">   <?php $i=0; foreach($all_cer as $au): if($i<1){?> <?php echo $au['c_name']?> Certificate   <?php $i++;} endforeach;?></h3>
      </div>
      <div class="modal-body"> </div>

            	<table id="load_certificate_table" class="table table-bordered table-striped">

                	<thead>

                    	<tr>
							<th>Date</th>
                        	<th>Certificate #</th>
                            
                          

                            <th>Order No</th>

                            <th>Sale Person</th>

                            <th>Reference To Standard</th>
                          <th width="150">Action</th>
    
                            </tr>

                    </thead>

                    <tbody>

                    	

                        <?php  foreach($all_cer as $au):?>


                        <tr>
							<td><?php echo $au['cer_date']?></td>
                        	<td><?php echo $au['cert_code']?></td>
                           

                            <td><?php echo $au['order_no']?></td>

                           <td><?php echo $au['sale_person']?></td>

                           <td><?php echo $au['ref_to_standard']?></td>

                           

                            <td>
 <a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>view_pdf/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon pri" title="View PDF">View PDF</a>

                            </td>

                        </tr>

                        <?php endforeach;?>

                    </tbody>

                

                </table>

            