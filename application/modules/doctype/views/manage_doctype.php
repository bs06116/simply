<?php 

$this->load->view('commons/header');



?>

 <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      <section class="content-header full_padding_header">

        <h1>Document </h1>

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
			



            	<a href="<?php echo base_url(); ?><?php echo $this->config->item('doctype_path'); ?>add_doctype" class="btn btn-primary pull-right pad mybtn_primary"><i class="fa fa-fw fa-plus"></i> Add New</a>


            </div>

        </div>

        <div class="row">

        	<div class="col-lg-12">
			
            	<table id="data_table" class="table table-bordered table-striped">

                	<thead>

                    	<tr>
                        	<th># </th>
							<th>Document Type </th>


                            

                            <th width="150">Action</th>

                        </tr>

                    </thead>

                    <tbody>

                    	
				
                        <?php 

                        $increment=0; foreach($all_doctype as $ad): $increment++;?>


                        <tr>
                        <td><?php echo $increment;?></td>
							<td><?php echo $ad['name']?></td>




                          

                          

                            <td>

                            	<!--<a href="#" class="btn btn-default btn-icon" data-toggle="modal" data-target="#view_modal"><i class="fa fa-eye" aria-hidden="true"></i></a>-->


                                <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('doctype_path'); ?>delete_doctype/<?php echo $ad['id']?>"  class="btn btn-danger btn-icon" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>

                                <a href="<?php echo base_url(); ?><?php echo $this->config->item('doctype_path'); ?>edit_doctype/<?php echo $ad['id']?>" class="btn btn-primary btn-icon" title="Edit"><i class="fa fa-pencil-square-o"
                                    aria-hidden="true"></i></i></a>

                            </td>

                        </tr>

                        <?php endforeach;?>
				
               
                    </tbody>

                

                </table>


                
               
            </div>

        </div>

      </section>

      </div>

      <!-- /.content --> 

  </div>


 <!-- /.content-wrapper -->

<?php $this->load->view('commons/footer'); ?>