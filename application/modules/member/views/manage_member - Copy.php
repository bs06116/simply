<?php 
$this->load->view('commons/header');
$total=count($all_user);
?>
 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Manage User
        <!--<small>Add Subject</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"><a href="<?php echo base_url(); ?><?php echo $this->config->item('member_path'); ?>add_member">Add New<a/></li>
      </ol>
    </section>
     <?php echo $this->session->flashdata('msg'); ?>
    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-xs-12">
        	<div class="box">
                <div class="box-header">
                 <!-- <h3 class="box-title">Data Table With Full Features</h3>-->
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Full Name</th>
                        <th>Designation</th>
                         <th>Email</th>
                        <th>Action</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                      
                      <? for($i=0;$i<$total;$i++) {
						
						   ?>
                      
                      <tr id="user_<?=$all_user[$i]['userid'];?>">
                        <td><?=$all_user[$i]['fullname'];?></td>
                        <td><?=$all_user[$i]['designation'];?></td>
                         <td><?=$all_user[$i]['email'];?></td>
                        <td><a href="<?=base_url();?><?php echo $this->config->item('member_path'); ?>edit_member/<?=$all_user[$i]['userid'];?>">Edit / </a><a onclick="return confirm('Are you sure want to delete this record.')" href="<?=base_url();?><?php echo $this->config->item('member_path'); ?>delete_user/<?=$all_user[$i]['userid'];?>">Delete</a></td>
                      
                      </tr>
                      <? } ?>
                      
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
              </div>
      	</div> 
        </div>
    </section>
    <!-- /.content -->
    </div>
 <!-- /.content-wrapper -->
<?php $this->load->view('commons/footer'); ?>