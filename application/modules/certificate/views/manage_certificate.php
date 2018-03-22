<?php 

$this->load->view('commons/header');



?>
<style>
    .red {
        color: #f00;
        width: 200px;
        height: 200px;
        border-radius: 50%;
    }
</style>

 <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <section class="content-header full_padding_header">

        <h1>Certificates </h1>

		<!--

        <ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li><a href="#">Layout</a></li>

          <li class="active">Top Navigation</li>

        </ol>

		-->

      </section>

      <?php //echo  $this->session->userdata('pass');?>

      <!-- Main content -->

      <div class="content p-t-0">

      	<section class="content m_b_20 white_bg box">

      	<div class="row">

        	<div class="col-lg-12 form-group">
			
            <?php if($this->session->userdata('user_type')==1){ ?>
            	<a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>add_certificate" class="btn btn-primary pull-right pad mybtn_primary"><i class="fa fa-fw fa-plus"></i> Add New</a>
 <?php } ?>
            <?php if($this->session->userdata('user_type')==1){ ?>
            </div>

        </div>

        <div class="row">

        	<div class="col-lg-12">
			
            	<table id="data_table" class="table table-bordered table-striped">

                	<thead>

                    	<tr>
                        	<th># </th>
                            <th>Product Code</th>
							<th>Product Description </th>

                        	<th>Certificate ID Numbers</th>
                            
                            <th>Order ID</th>

                           

                            <th>Issue Date</th>
                            <th>Expiry Date</th>
                            <th>Status</th>
                             <th> Attached Documents</th>

                         
                            

                            <th width="150">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    	
				
                        <?php $increment=0; foreach($all_cer as $au): $increment++;?>


                        <tr>
                        <td><?php echo $increment;?></td>

                            <td><?php echo $au['identification']?></td>
                            <td><?php echo $au['description']?></td>
                        	<td><?php echo $au['cert_code']?></td>
                            <td><?php echo $au['c_order_no']?></td>
 							 <td><?php echo $au['inspection_date']?></td>
                            <td><?php echo $au['delivery_date']?></td>
                            <td><?php

                                $datetime1 = date_create(date('Y-m-d'));
                                $datetime2 = date_create($au['delivery_date']);
                                $interval = date_diff($datetime1, $datetime2);

                                   $invert=$interval->invert;
                                  $month=$interval->m;
                                   $day=$interval->d;

                                if($month==1  && $day==0 && $invert==0) {
                                    echo "<i class='fa fa-circle inprogress' aria-hidden='true' title='Yellow'></i>";
                                }elseif($month==0 && $day==0 && $invert==0){
                                    echo "<i class='fa fa-circle inprogress' aria-hidden='true' title='Yellow'></i>";
                                }elseif($invert==1){
                                    echo "<i class='fa fa-circle onhold' aria-hidden='true' title='Red'></i>";
                                }else{
                                    echo "<i class='fa fa-circle complete' aria-hidden='true' title='Green'></i>";
                                }

                                ?></td>
                            <td><?php
                                    $result_certificate=$this->certificate_model->get_document( $au['certificate_id']);
                                    foreach($result_certificate as $rc):?>
                                        <a target="_blank" href="<?php echo base_url(); ?>/uploads/document/<?php echo   $rc->file_name;?>" class="btn btn-primary btn-icon" title="Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>
                                <?php

                                endforeach;

                                    ?>
                            </td>

                          

                          

                            <td>

                                <a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>edit_certificate/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>delete_certificate/<?php echo $au['certificate_id']?>"  class="btn btn-danger btn-icon" title="Delete">
                                    <i class="fa fa-trash-o" aria-hidden="true"></i></a>
<!-- pri -->
                                 <a target="_blank" href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>view_pdf/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon" title="Download PDF"><i class="fa fa-download" aria-hidden="true"></i></a>

                            </td>

                        </tr>

                        <?php endforeach;?>
				
               
                    </tbody>

                

                </table>
             <?php } ?>   
 <?php if($this->session->userdata('user_type')==2){  ?>
              
                <table id="data_table" class="table table-bordered table-striped">

                    <thead>

                    <tr>
                        <th># </th>
                        <th>Product Code</th>
                        <th>Product Description </th>

                        <th>Certificate ID Numbers</th>

                        <th>Order ID</th>



                        <th>Issue Date</th>
                        <th>Expiry Date</th>
                        <th>Status</th>
                        <th> Attached Documents</th>




                        <th width="150">Action</th>

                    </tr>

                    </thead>

                    <tbody>

                    	
				  <?php $increment=0; if(!empty($get_all_certificate_by_id)){ foreach($get_all_certificate_by_id as $au){$increment++;?>



                      <tr>
                          <td><?php echo $increment;?></td>

                          <td><?php echo $au['identification']?></td>
                          <td><?php echo $au['description']?></td>
                          <td><?php echo $au['cert_code']?></td>
                          <td><?php echo $au['c_order_no']?></td>
                          <td><?php echo $au['inspection_date']?></td>
                          <td><?php echo $au['delivery_date']?></td>
                          <td><?php

                              $datetime1 = date_create(date('Y-m-d'));
                              $datetime2 = date_create($au['delivery_date']);
                              $interval = date_diff($datetime1, $datetime2);

                              $invert=$interval->invert;
                              $month=$interval->m;
                              $day=$interval->d;


                              if($month==1  && $day==0 && $invert==0) {
                                  echo "<i class='fa fa-circle inprogress' aria-hidden='true' title='In Progress'></i>";
                              }elseif($month==0 && $day==0 && $invert==0){
                                  echo "<i class='fa fa-circle inprogress' aria-hidden='true' title='In Progress'></i>";
                              }elseif($invert==1){
                                  echo "<i class='fa fa-circle onhold' aria-hidden='true' title='On Hold or not Started'></i>";
                              }else{
                                  echo "Green";
                              }


                              ?></td>
                          <td><?php
                              $result_certificate=$this->certificate_model->get_document( $au['certificate_id']);
                              foreach($result_certificate as $rc):?>
                                  <a target="_blank" href="<?php echo base_url(); ?>/uploads/document/<?php echo   $rc->file_name;?>" class="btn btn-primary btn-icon" title="Download Document"><i class="fa fa-download" aria-hidden="true"></i></a>
                                  <?php

                              endforeach;

                              ?></td>





                          <td>

                              <!--<a href="#" class="btn btn-default btn-icon" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true"></i></a>-->

                              <a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>edit_certificate/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                              <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>delete_certificate/<?php echo $au['certificate_id']?>"  class="btn btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                              <!-- pri -->
                              <a target="_blank" href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>view_pdf/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon" title="Download PDF"><i class="fa fa-download" aria-hidden="true"></i></a>

                          </td>

                      </tr>

                      
				<?php }}else{
					echo "No record Found";
					
					}?>
               
                    </tbody>

                

                </table>
                
                 <?php } ?>
                
               
            </div>

        </div>

      </section>

      </div>

      <!-- /.content --> 

  </div>


 <!-- /.content-wrapper -->

<?php $this->load->view('commons/footer'); ?>