
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
        <small>Add User</small>
      </h1>
      
    </section>
    
    <!-- Main content -->
    <section class="content">
    	<div class="row">
            <!-- Small boxes (Stat box) -->
            <div class="col-md-offset-2 col-md-8">
            <!-- general form elements -->
                  <div class="box box-primary">
                    <!-- <div class="box-header with-border">
                      <h3 class="box-title">User Form</h3>
                    </div> --><!-- /.box-header -->
                    <!-- form start -->
                    
                    <form action="<?php echo base_url(); ?><?php echo $this->config->item('member_path'); ?>save_member"  id="frm" method="post" enctype="multipart/form-data">
                      <div class="box-body" style="overflow: hidden !important">
                      	<div class="row">
                            <div class="col-lg-6">
                            	<div class="form-group">
                          <label for="section">Full Name</label>
                          <input required type="subject" value="<?php echo set_value('fullname'); ?>"  name="fullname" id="cat" class="form-control" placeholder="Name">				 <div class="text-red"><?php echo form_error('fullname'); ?></div>
                        </div>
                            </div>
                        	<div class="col-lg-6">
                            <div class="form-group">
                          <label for="section">User Name</label>
                          <input required type="text" value="<?php echo set_value('user_name'); ?>"  name="user_name" id="user_name" class="form-control" placeholder="User Name">
                           <div class="text-red"><?php echo form_error('user_name'); ?></div>
                        </div>
                            <div class="text-red"><?php echo form_error('type'); ?></div>

                            </div>
                        </div>
                        <div class="row">
                        <div class="col-lg-6">
                        <div class="form-group">
                          <label for="section">Password</label>
                          <input required type="password" value="<?php echo set_value('password'); ?>"  name="password" id="password" class="form-control" placeholder="Password">
                       <div class="text-red"><?php echo form_error('password'); ?></div>
                        </div>
                        </div>
                        <div class="col-lg-6">
                        <div class="form-group">
                          <label for="section">Email</label>
                          <input required type="text" value="<?php echo set_value('email'); ?>"  name="email" id="email" class="form-control" placeholder="Email">
                       <div class="text-red"><?php echo form_error('email'); ?></div>
                        </div>
                        
                        </div>
                        
                   </div>
                   <div class="row">
                   <div class="col-lg-6">
                   <div class="form-group">
                          <label for="section">Designation</label>
                          <input required type="text" value="<?php echo set_value('designation'); ?>"  name="designation" id="designation" class="form-control" placeholder="Designation">
                      
                       <div class="text-red"><?php echo form_error('designation'); ?></div>
                        </div>
                   </div>
                   </div>
                          <div class="row">
                              <div class="col-lg-6">
                                  <div class="form-group">
                                      <label for="section">Image 160 * 160</label>
                                      <input onchange="readURL(this);" id="image"  type="file" value="<?php echo set_value('image'); ?>"  name="image">

                                      <div class="text-red"><?php echo form_error('image'); ?></div>

                                  </div>
                              </div>
                          </div>
                          <div id="image-holder">
                              <img class="thumb-image" >

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

<script type="text/javascript">


    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('.thumb-image')
                    .attr('src', e.target.result)
                    .width(160)
                    .height(160);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php $this->load->view('commons/footer'); ?>