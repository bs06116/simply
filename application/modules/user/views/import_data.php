
<?php 
$this->load->view('commons/header');
//$this->load->view('commons/sidebar');

?>




 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Import User</small>
      </h1>
      
    </section>
    
    <!-- Main content -->
    <section class="content">
    	<div class="col-md-6">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <!-- general form elements -->
                  <div class="box box-primary">
                    <!--<div class="box-header with-border">
                      <h3 class="box-title">Import User</h3>
                    </div>--><!-- /.box-header -->
                    <!-- form start -->
                    <?php echo $this->session->flashdata('msg')?>
                    <form action="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>submit_data"  id="frm" method="post" enctype="multipart/form-data">
                      <div class="box-body">
                      	<div class="row">
                            <div class="col-lg-6">
                            	<div class="form-group">
                          <label for="section">Import File</label>
                         
                          <input type="file"  name="file_excel" id="file" class="form-control formup">				 
                           <input type="hidden"  name="name"  value="1" >
                           			
                          <div class="text-red"><?php echo form_error('file_excel'); ?></div>
                          
                        </div>
                            </div>
                        	
                        </div>
                        
                       
                             
                      </div><!-- /.box-body -->
            
                      <div class="box-footer text-right">
                        <button type="submit" id="submit" class="btn btn-primary">Save</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.box -->
            </div><!-- /.row -->   
      	</div> 
    </section>
    <!-- /.content -->
    </div>
 <!-- /.content-wrapper -->
<?php $this->load->view('commons/footer'); ?>