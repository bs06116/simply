<?php 

$this->load->view('commons/header');



?>

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
            	<a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>add_certificate" class="btn btn-primary pull-right pad"><i class="fa fa-fw fa-plus"></i> Add New</a>
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
							<th>Delivery Date </th>
                            <th>Identification</th>
                        	<th>Certificate #</th>
                            
                            <th>Customer</th>

                           

                            <th>Sale Person</th>
                             <th> Attached Documents</th>

                         
                            

                            <th width="150">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    	
				
                        <?php $increment=0; foreach($all_cer as $au): $increment++;?>


                        <tr>
                        <td><?php echo $increment;?></td>
							<td><?php echo $au['delivery_date']?></td>
                            <td><?php echo $au['identification']?></td>
                        	<td><?php echo $au['cert_code']?></td>
                            <td><?php echo $au['c_name']?></td>
 							 <td><?php echo $au['sale_person']?></td>
                            <td><?php echo $au['e_doc_no']?></td>

                          

                          

                            <td>

                            	<!--<a href="#" class="btn btn-default btn-icon" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true"></i></a>-->

                                <a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>edit_certificate/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>delete_certificate/<?php echo $au['certificate_id']?>"  class="btn btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
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
							<th>Date</th>
                            <th>Identification</th>
                        	<th>Certificate #</th>
                            
                          
                            <th>Order No</th>

                            <th>Sale Person</th>

                            <th>Reference To Standard</th>

                            <th>Cutomer Location</th>

                            <th width="150">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    	
				  <?php if(!empty($get_all_certificate_by_id)){ foreach($get_all_certificate_by_id as $au){?>
                        


                        <tr>
							<td><?php echo $au['cer_date']?></td>
                            <td><?php echo $au['identification']?></td>
                        	<td><?php echo $au['cert_code']?></td>
                          

                            <td><?php echo $au['order_no']?></td>

                           <td><?php echo $au['sale_person']?></td>

                           <td><?php echo $au['ref_to_standard']?></td>

                            <td><?php echo $au['c_location']?></td>

                            <td>

                            	<!--<a href="#" class="btn btn-default btn-icon" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true"></i></a>-->

                                <?php /*?><a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>edit_certificate/<?php echo $au['certificate_id']?>" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>delete_certificate/<?php echo $au['certificate_id']?>"  class="btn btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php */?>
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