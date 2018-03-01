
<?php 
$this->load->view('commons/header');
//$this->load->view('commons/sidebar');

?>




 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Project
        <small>Add Project</small>
      </h1>
      
    </section>
    
    <!-- Main content -->
    <section class="content">
    	<div class="col-md-6">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">Project Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form action="<?php echo base_url(); ?><?php echo $this->config->item('project_path'); ?>save_project"  id="frm" method="post" enctype="multipart/form-data">
                      <div class="box-body">
                      	<div class="row">
                            <div class="col-lg-8">
                            	<div class="form-group">
                          <label for="section">Project Name</label>
                          <input type="subject" value="<?php echo set_value('name'); ?>"  name="name" id="name" class="form-control" placeholder="Name">				 <div class="text-red"><?php echo form_error('name'); ?></div>
                        </div>
                            </div>
                        	
                        </div>
                        
                   <div class="row">
                   <div class="col-lg-12">
                   <div class="form-group">
                          <label for="section">Description</label>
                          <textarea type="text" value="<?php echo set_value('description'); ?>"  name="description" id="description" class="form-control"></textarea>
                      
                       <div class="text-red"><?php echo form_error('description'); ?></div>
                        </div>
                   </div>
                   </div>
                        
                        
                         
                        
                         
                        
                         
                        
                       
                         
                        
                        
                      </div><!-- /.box-body -->
            
                      <div class="box-footer text-right">
                        <button type="submit" id="submit" class="btn btn-primary mybtn_primary">Save</button>
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