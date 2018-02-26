<?php 
$this->load->view('commons/header');
$total=count($all_user);
?>
 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Users
        <!--<small>Add Subject</small>-->
      </h1>
      
    </section>
     <?php echo $this->session->flashdata('msg'); ?>
    <!-- Main content -->
    <section class="content">
    	<div class="row">
    		<div class="col-xs-12 rem">
        	<div class="box">
                <div class="box-header">
                 <!-- <h3 class="box-title">Data Table With Full Features</h3>-->
                </div><!-- /.box-header -->
                <div class="box-body">
                <div class="row">
                <div class="col-lg-12 text-right form-group">
                <a class="btn btn-primary pad" href="<?php echo base_url(); ?><?php echo $this->config->item('member_path'); ?>add_member"><i class="fa fa-plus" aria-hidden="true"></i>Add New</a>
                </div>
                </div>
                  <table id="data_table" class="table table-bordered table-striped icon_space">
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
                        <td>
                        <a title="Edit" class="btn btn-primary btn-icon" href="<?=base_url();?><?php echo $this->config->item('member_path'); ?>edit_member/<?=$all_user[$i]['userid'];?>" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        <a title="Delete" class="btn btn-danger btn-icon" onclick="return confirm('Are you sure want to delete this record.')" href="<?=base_url();?><?php echo $this->config->item('member_path'); ?>delete_user/<?=$all_user[$i]['userid'];?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                        </td>
                      
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