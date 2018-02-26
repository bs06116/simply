
<?php 
$this->load->view('commons/header');

?>




 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        User
        <small>Update User</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Update User</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
    	<div class="col-md-6">
            <!-- Small boxes (Stat box) -->
            <div class="row">
            <!-- general form elements -->
                  <div class="box box-primary">
                    <div class="box-header with-border">
                      <h3 class="box-title">User Form</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form action="<?php echo base_url(); ?><?php echo $this->config->item('member_path'); ?>update_member"  id="frm" method="post" enctype="multipart/form-data">
                      <div class="box-body">
                      	
                        <div class="form-group">
                          <label for="section">Full Name</label>
               <input type="subject" value="<?php  if(isset($original_form_values) && $original_form_values == 1){echo $user_data->fullname; }?>"  name="fullname" id="cat" class="form-control" placeholder="Name">
                           <div class="text-red"><?php echo form_error('fullname'); ?></div>
                        </div>
                       <div class="form-group">
                          <label for="section">User Name</label>
                          <input type="text" disabled="disabled" value="<?php  if(isset($original_form_values) && $original_form_values == 1){echo $user_data->username; }?>"  name="user_name" id="user_name" class="form-control" placeholder="User Name">
                           <div class="text-red"><?php echo form_error('user_name'); ?></div>
                        </div>
                        
                          <div class="form-group">
                          <label for="section">Password</label>
                          <input type="password" value="<?php echo set_value('password'); ?>"  name="password" id="password" class="form-control" placeholder="Password">
                       <div class="text-red"><?php echo form_error('password'); ?></div>
                        </div>
                          <div class="form-group">
                          <label for="section">Email</label>
                      <input type="text" value="<?php  if(isset($original_form_values) && $original_form_values == 1){echo $user_data->email; }?>" name="email" id="email" class="form-control" placeholder="Email">
                       <div class="text-red"><?php echo form_error('email'); ?></div>
                        </div>
                         <div class="form-group">
                          <label for="section">Designation</label>
                         <input type="text" value="<?php  if(isset($original_form_values) && $original_form_values == 1){echo $user_data->designation; }?>"  name="designation" id="designation" class="form-control" placeholder="Password">
                       <div class="text-red"><?php echo form_error('designation'); ?></div>
                        </div>
                      
                       
                        
                        
                      </div><!-- /.box-body -->
            <input type="hidden" value="<?=$user_id?>" name="user_id" />
                      <div class="box-footer">
                        <button type="submit" id="submit" class="btn btn-primary">Update</button>
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