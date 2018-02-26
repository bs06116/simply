<?php 

$this->load->view('commons/header');





?>

<div class="content-wrapper"> 
  
  <!-- Content Header (Page header) -->
  
  <section class="content-header full_padding_header">
    <h1> View Customer </h1>
    
    <!--<ol class="breadcrumb">

          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

          <li><a href="#">Layout</a></li>

          <li class="active">Top Navigation</li>

        </ol>--> 
    
  </section>
  
  <!-- Main content -->
  
  <div class="content p-t-0">
    <section class="content m_b_20 white_bg box">
      <div class="row">
        <div class="col-lg-8">
          <form id="default-demo" data-toggle="validator" role="form">
            <!--<div class="row">
              <div class="col-lg-12 padd_right0">
                <div class="row">
                
                  <div class="col-lg-5">
                    <div class="form-group cs_account_main">
                      <div class="col-lg-4"></div>
                      <div class="col-lg-8" style="padding:0;"> <span id="account_error" class="field_error"></span> </div>
                      <div class="clearfix"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>-->
            <div class="row">
              <div class="col-lg-12 padd_right0">
                <fieldset>
                  <legend>Customer Information</legend>
                  <input type="hidden" name="id" />
                  <div class="col-lg-12 cust-info">
                    <div class="row">
                      <div class="col-lg-11">
                        <div class="form-group">
                          <!--<label>Name</label>-->
                          <p><?php echo $user_data->person?></p>
                          <span id="person_error" class="field_error"></span> </div>
                          
                         <div class="form-group">
                          <!--<label>Customer Account</label>-->
                          <p><?php echo $user_data->account?></p>
                        </div>
                        
                        <div class="form-group">
                          <!--<label>Phone</label>-->
                          <p><?php echo $user_data->phone?></p>
                        </div>
                        
                        <div class="form-group">
                      	
                           <p> <a href="mailto:<?php echo $user_data->email?>"  target="_blank"><?php echo $user_data->email?></a></p>
                          
                        </div>
                        
                        <div class="form-group">
                       
                        		<?php $result = substr($user_data->website, 0 ,4 );
								//echo $result;
								 	 ?>
								
								 
                          <p><a target="_blank" href="<?php 
						  if($result=="http"){
							  echo $user_data->website;
							  }elseif($result=="www."){
								echo "http://".$user_data->website; 
								  }elseif($result!=""){
									 echo "http://".$user_data->website;
									  }
						  ?>" ><?php 
						  if($result=="http"){
							  echo $user_data->website;
							  }elseif($result=="www."){
								echo "http://".$user_data->website; 
								  }elseif($result!=""){
									 echo "http://".$user_data->website;
									  }
						  ?></a></p>
                        </div>
                      </div>
                      
                      <div class="col-lg-1">
                        <div class="form-group"> <a href="#" onclick="edit_cutomer_detail('<?php echo $user_data->cust_id;?>','<?php echo $user_data->person;?>','<?php echo $user_data->account;?>','<?php echo $user_data->phone;?>','<?php echo $user_data->email;?>','<?php echo $user_data->website;?>')" class=""  data-toggle="modal" data-target="#edit_customer"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </div>
                      </div>
                      
                    </div>
                    <!--<div class="row">
                      <div class="col-lg-6">
                        
                      </div>
                      <div class="col-lg-6">
                        
                      </div>
                      <div class="col-lg-6">
                        
                      </div>
                    </div>-->
                    
                  </div>
                </fieldset>
              </div>
            </div>
            <div class="row c-p">
              <div class="col-lg-12 padd_right0">
                <!--<fieldset>
                  <legend></legend>-->
                  <div id="add_customer_sec">
                    <?php $i=1; foreach($user_info as $ui):?>
                    <div class="col-lg-6">
                      <div class="row top10">
                      <div class="col-lg-4 profile">
                      <img src="<?php echo base_url();?>application/modules/assets/dist/img/profile.jpg" />
                      </div>
                       <div class="col-lg-6 contact-person">
                          <div class="form-group">
                            <label><?php echo $ui['designation']?></label>
                          </div>
                          <div class="form-group">
                            <p><?php echo $ui['name']?></p>
                          </div>
                          <div class="form-group">
                            <p><?php echo $ui['phone']?></p>
                          </div>
                          <div class="form-group">
                            <p><a href="mailto:<?php echo $ui['email']?>"  target="_blank"><?php echo $ui['email']?></a></p>
                          </div>
                      </div>
                      <div class="col-lg-2">
                          <div class="form-group"> <a href="#" onclick="edit_cust_info_detail('<?php echo $ui['cust_info_id'];?>','<?php echo $ui['designation'];?>','<?php echo $ui['name'];?>','<?php echo $ui['phone'];?>','<?php echo $ui['email'];?>')" class="edit-btn"  data-toggle="modal" data-target="#edit_cust_info"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </div>
                        </div>
                    </div>
                    </div>
                    <?php $i++; endforeach;?>
                  
                  </div>
                <!--</fieldset>-->
              </div>
            </div>
            <div class="row">
              <div class="col-lg-12 padd_right0">
               <?php  foreach($user_address as $ua):?>
                <fieldset>
                  <legend><?php if($ua['ref_address']==""){echo "No Address Refenrence ";}else{ echo $ua['ref_address'];?>  <?php }?> </legend>
                  <div id="add_address_sec">
                   
                    <div class="col-lg-12 address">
                      <div class="row">
                        <div class="col-lg-11">
                          <div class="form-group">
                            <!--<label>Street 1</label>-->
                            <p><?php echo $ua['street_one']?></p>
                          </div>
                          <div class="form-group">
                           <!-- <label>Street 2</label>-->
                            <p><?php echo $ua['street_two']?></p>
                          </div>
                          <div class="form-group">
                            <!--<label>Country</label>-->
                            <p><span><?php echo $ua['city'].", "?></span><span><?php echo $ua['postal_code'].", "?></span><span><?php echo $ua['country']?></span></p>
                            <?php /*?>  <select name="<?php echo $append?>country[]" class="select_2 form-control" value="<?php echo $ua['country']?>" style="width:100%;">

                                <option value="Pakistan">Pakistan</option>

                               <!-- <option value="India">India</option>

                                <option value="Iran">Iran</option>

                                <option value="Dubai">Dubai</option>-->

                              </select><?php */?>
                          </div>
                          <!--<div class="form-group">
                            <label>City</label>
                            <p><?php //echo $ua['city']?></p>
                          </div>
                          <div class="form-group">
                            <label>Post Code</label>
                            <p><?php //echo $ua['postal_code']?></p>
                          </div>-->
                          <div class="form-group">
                            <!--<label>Refenrence Address</label>-->
                            <p></p>
                          </div>
                        </div>
                        <div class="col-lg-1">
                          <div class="form-group"> <a href="#" onclick="edit_cust_address('<?php echo $ua['cust_address_id'];?>','<?php echo $ua['street_one'];?>','<?php echo $ua['street_two'];?>','<?php echo $ua['city'];?>','<?php echo $ua['postal_code'];?>','<?php echo $ua['country'];?>','<?php echo $ua['ref_address'];?>')" class=""  data-toggle="modal" data-target="#edit_cust_addres"><i  class="fa fa-pencil-square-o" aria-hidden="true"></i></a> </div>
                        </div>
                      </div>
                    </div>
                  
                  </div>
                </fieldset>
                  <?php  endforeach;?>
              </div>
            </div>
            <style>

				.view{

					padding-bottom: 6px;

					padding-top: 3px;

					}

				

				</style>
            <div class="row">
              <div class="col-lg-12 text-right form-group"> </div>
            </div>
            <input type="hidden" value="<?php echo $cust_id?>" name="cust_id" />
          </form>
          <div id="message"></div>
        </div>
        <div class="col-lg-4">
          <div class="col-lg-12 up-del rem_padd">
          <div class="back-btn">
          
          <a href="<?php echo base_url();?>user/manage_user" class="btn btn-default btn-icon back new-size"> <i class="fa fa-arrow-left" aria-hidden="true"></i>
</a> &nbsp;
            <a href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>edit_user/<?php echo $this->uri->segment(3)?>" class="btn btn-primary new-size"><i class="fa fa-pencil-square-o " aria-hidden="true"></i> Update</a> &nbsp;
            <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>delete_user/<?php echo $this->uri->segment(3)?>" 

                   class="btn btn-danger new-size"><i class="fa fa-trash-o " aria-hidden="true"></i> Delete</a>
                   
                </div>   
          </div>
          <div class="col-lg-12 customer-notes rem_padd">
            <?php  $result=$this->user_model->get_note_box_text($this->uri->segment(3));

			 // print_r($result);?>
            <div class="col-lg-8">
              <h4 style="color:red;">
                <?php  if(!empty($result->note)){ echo $result->note;}else {echo 'Add Note...';}?>
              </h4>
            </div>
            <div class="col-lg-4" >
              <div class="customer_view">
                <?php 		if(!empty($result->note)){  ?>
                <a href="#" onclick="get_note('<?php echo $this->uri->segment(3);?>')" class="<?php // echo $result->note==""?'view':'view_2';?> cus-btn"  data-toggle="modal" data-target="#view_customer"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a  onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('user_path'); ?>del_user_note/<?php echo $this->uri->segment(3)?>" 

                   class="btn btn-danger btn-icon"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                <?php /*?><a href="#" onclick="remove_single_note('<?php echo $this->uri->segment(3);?>')"><i class="fa fa-trash-o" aria-hidden="true"></i></a><?php */?>
                <?php }else{  ?>
                <a href="#" onclick="get_note('<?php echo $this->uri->segment(3);?>')" class="<?php // echo $result->note==""?'view':'view_2';?> cus-btn cus-last"  data-toggle="modal" data-target="#view_customer"><i class="fa fa-plus" aria-hidden="true"></i> </a>
                <?php	} ?>
                <?php /*?>	<a href="#" onclick="get_note('<?php echo $this->uri->segment(3);?>')" class="<?php // echo $result->note==""?'view':'view_2';?>"  data-toggle="modal" data-target="#view_customer"><i class="fa fa-plus" aria-hidden="true"></i></a><?php */?>
              </div>
            </div>
          </div>
          <div class="col-lg-12 new_feeds rem_padd">
            <div class="col-lg-12 title">
              <h1>News Feed</h1>
              <?php  $get_new_feeds=$this->user_model->get_single_new_feed($this->uri->segment(3));

               //   print_r($get_new_feeds);

                  if(!empty($get_new_feeds)){

                  ?>
              <a href="#" onclick="add_cust_feed('<?php echo $this->uri->segment(3);?>','<?php echo $user_data->person?>','<?php echo $this->session->userdata('user_id')?>')" data-toggle="modal" data-target="#add_customer_news_feeds" style="margin-top:10px;  float: right;" class="cus-btn"><i class="fa fa-plus" aria-hidden="true"></i> </a></div>
            <div class="clearfix"></div>
            <div class="scroll1 scrollbox3">
              <?php  foreach($get_new_feeds as $get_feed){?>
              <div class="single-msg">
              <div class="feed-title"> 
                
                <!--                          <img src="file:///D|/Gresys Pro/images/zuma-frost.png" class="new-feed-img"/>

-->
                
                <div class="heading-date">
                  <h3 class="new-feed-heading"><?php echo $get_feed['username']; ?></h3>
                  <span class="new-feed-date">
                  <?php  echo $get_feed['feed_date'];   ?>
                  </span> </div>
              </div>
              <div class="clearfix"></div>
			  <div class="col-lg-12 rem_padd">
              <div class="message cus col-lg-12">
              		  <?php 
			   $str = $get_feed['message'];
			   $certificate_id=explode(",,",$str);
			
			
			   $result = mb_substr($get_feed['message'], 3, 8);
			
			
			   if($result=="tificati"){
				   $gstr = $get_feed['message'];
			   $certificate_id=explode(",,",$gstr);
				echo  $certificate_id[0]." ";	if(isset($certificate_id[2])){
			   echo $certificate_id[2]." "; }
				 // echo "---- : ".$ff ; 
			   ?> 
               
<div class="files"><a target="_blank" href="<?php echo base_url().$this->config->item('certificate_path')?>view_pdf/<?php  if(isset($certificate_id[1])){
			   echo $certificate_id[1]; } ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div>
			   <?php }else{ echo  $get_feed['message'];?>
                
				<?php }?>
                           
              
              
              
                <?php  //echo $get_feed['message'];  ?>
              </div>
			  <div class="message feed-img col-lg-12">
              <?php 
			  if(!empty($get_feed['news_feed_img'])){
			  		$last3chars = substr($get_feed['news_feed_img'], -3);
		//echo $last3chars."<br>";
		if($last3chars=='ocx'){
			$ab="<div class='files'><a target='_blank' href='".base_url()."uploads/".$get_feed['news_feed_img']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a><div>";
			}elseif($last3chars=='jpg'){
				$ab= "<div class='files'><a target='_blank' href='".base_url()."uploads/".$get_feed['news_feed_img']."'>
                	<img src='".base_url()."uploads/".$get_feed['news_feed_img']."'  width='50' height ='50'/></a></div>";
			//$ab= "<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";
			
			}elseif($last3chars=='pdf'){
			$ab="<div  class='files'><a target='_blank' href='".base_url()."uploads/".$get_feed['news_feed_img']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></div>";	
			//$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png> <img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";	
			} 
				if(isset($ab)){
				echo $ab;
				}
			  
			  }?>
              </div>
              
			   
              </div>
			  </div>
              
              <div class="clearfix"></div>
              <?php }}else{ ?>
              <div class="message" style="text-align:center;"> <a href="#" class="cus-btn1" onclick="add_cust_feed('<?php echo $this->uri->segment(3);?>','<?php echo $user_data->person?>','<?php echo $this->session->userdata('user_id')?>')" data-toggle="modal" data-target="#add_customer_news_feeds"><i class="fa fa-plus" aria-hidden="true"></i> </a> </div>
              <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
  <!-- /.content --> 
  
  <!-- /.container --> 
  
</div>

<!-- edit customer --->

<div id="edit_customer" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:600px;"> 
    
    <!-- Modal content-->
    
    <form id="edit_cus_form">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Customer</h3>
        </div>
        <div class="col-lg-12 modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Name *</label>
                <input  type="text"  autocomplete="off"  class="form-control " id="edit_person" name="person" />
                <span id="person_error" class="field_error"></span> </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Account Number</label>
                <input disabled="disabled"  class="form-control" type="text" id="edit_account" name="edit_account" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" id="edit_phone" name="phone" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" id="edit_email" name="email" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Website</label>
                <input type="text" class="form-control" id="edit_website" name="website" />
              </div>
            </div>
          </div>
        </div>
        <input type="hidden" class="form-control" id="edit_cust_id" name="edit_cust_id" />
        <div class="modal-footer">
          <div class="msg">
            <div id="success_2_msg" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_2_msg" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <a href="#" id="submit_edit_cus" class="btn btn-primary">Update</a>
          <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- edit customer  END---> 

<!-- edit cust info person --->

<div id="edit_cust_info" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:600px;"> 
    
    <!-- Modal content-->
    
    <form id="edit_cus_info_form">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Contact Persons</h3>
        </div>
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Name</label>
                <input type="text" class="form-control" value="" name="name" id="edit_cust_info_name" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Phone</label>
                <input type="text" class="form-control" value="" name="phone_2" id="edit_cust_info_phone_2" />
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Email</label>
                <input type="text" class="form-control" value="" name="email_2" id="edit_cust_info_email_2" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>Designation</label>
                <input type="text" class="form-control" value="" name="designation" id="edit_cust_info_designation" />
              </div>
            </div>
          </div>
        </div>
        
        <!-- <input type="text" class="form-control" id="edit_custo_id" name="edit_cust_id" />-->
        
        <input type="hidden" class="form-control" id="edit_cust_info_id" name="edit_cust_info_id" />
        <div class="modal-footer">
          <div class="msg">
            <div id="success_2_msg_succ" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_2_msg_succ" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <a href="#" id="submit_edit_cust_info" class="btn btn-primary">Update</a>
          <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- edit cust info  END---> 

<!-- edit cust address info --->

<div id="edit_cust_addres" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:600px;"> 
    
    <!-- Modal content-->
    
    <form id="edit_cus_address_form">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Address</h3>
        </div>
        <div class="col-lg-12 modal-body">
          <div class="row">
            <div class="col-lg-6">
              <div class="form-group">
                <label>Street 1</label>
                <input type="text" class="form-control" id="edit_add_address_one" value=""  name="street_1" />
              </div>
              <div class="form-group">
                <label>Street 2</label>
                <input type="text" class="form-control" id="edit_add_address_two" value="" name="street_2" />
              </div>
              <div class="form-group">
                <label>Country</label>
                <input type="text" class="form-control" id="edit_add_country" value="" name="country" />
              </div>
            </div>
            <div class="col-lg-6">
              <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" id="edit_add_city" value="" name="city" />
              </div>
              <div class="form-group">
                <label>Post Code</label>
                <input type="text" class="form-control" id="edit_add_postal_code" value="" name="psot_code" />
              </div>
              <div class="form-group">
                <label>Reference Address</label>
                <input type="text" class="form-control" id="edit_add_r_address" value="" name="r_address" />
              </div>
            </div>
          </div>
        </div>
        
        <!-- <input type="text" class="form-control" id="edit_custo_id" name="edit_cust_id" />-->
        
        <input type="hidden" class="form-control" id="edit_address_info_id" name="edit_address_info_id" />
        <div class="modal-footer">
          <div class="msg">
            <div id="success_2_msg_suc" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_2_msg_suc" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <a href="#" id="submit_edit_cust_address" class="btn btn-primary">Update</a>
          <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- edit cust address  END---> 

<!-- edit cust Feed NEWZ --->

<div id="add_customer_news_feeds" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg" style="width:600px;"> 
    
    <!-- Modal content-->
    
    <form id="edit_cus_new_feed_form" method="post" enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">News Feed</h3>
        </div>
        <div class="col-lg-12 modal-body">
          <div class="form-group">
            <label>Message</label>
            <textarea type="text" name="message_n"   class="form-control" cols="70" rows="5"></textarea>
          </div>
		   <div class="form-group">
					  <label for="section">File</label>
					  <input type="file" name="userfile" />
            </div>
        </div>
        <input type="hidden" class="form-control" id="fed_cust_id" name="fed_cust_id" />
        <input type="hidden" class="form-control" id="fed_cust_name" name="fed_cust_name" />
        <input type="hidden" class="form-control" id="fed_feed_by_id" name="fed_feed_by_id" />
        
        <!-- <input type="text" class="form-control" id="edit_custo_id" name="edit_cust_id" />-->
        
        <div class="modal-footer">
          <div class="msg">
            <div id="success_2_msg_fedd_news" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_2_msg_fedd_news" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <a href="#" id="submit_news_feed_address" class="btn btn-primary">Submit</a>
          <button type="button" class="btn btn-default"  data-dismiss="modal">Close</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- edit cust Feed NEWZ  END--->

<div id="view_customer" class="modal fade" role="dialog">
  <form id="add_note">
    <div class="modal-dialog modal-lg" style="width:600px;"> 
      
      <!-- Modal content-->
      
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h3 class="modal-title">Customer Note</h3>
        </div>
        <div class="modal-body">
          <textarea id="note" style="color:red;" name="note" cols="70" style="width:500px;" rows="5" class="form-control">
          </textarea>
        </div>
        <div class="modal-footer">
          <div class="msg">
            <div id="success_2_msg_note" style=" display:none;" class="alert custom-error alert-success"></div>
            <div id="error_2_msg_note" style=" display:none;" class="alert custom-error alert-danger"></div>
          </div>
          <a href="#" id="submit_note" class="btn btn-primary">Submit</a> 
          
          <!-- <a href="#" style="display:none" id="remove_note" class="btn btn-primary">Remove</a>--> 
          
        </div>
      </div>
      <input type="hidden" name="cust_id"  id="cust_id"/>
    </div>
  </form>
</div>
<?php $this->load->view('commons/footer'); ?>
<script>

  

   

		function edit_cust_address(cust_address_id,street_one,street_two,city,postal_code,country,ref_address){

			//alert(cus_info_id);

			//alert(cus_id);

			

			$("#edit_address_info_id").val(cust_address_id);

			//$("#edit_custo_id").val(cus_id);

			$("#edit_add_r_address").val(ref_address);

			$("#edit_add_postal_code").val(postal_code);

			$("#edit_add_city").val(city);

			$("#edit_add_country").val(country);

			$("#edit_add_address_two").val(street_two);

			$("#edit_add_address_one").val(street_one);

		

		  }

		

			$("#submit_edit_cust_address").click(function(){

				$.ajax({

					type:"POST",

					url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"edit_cus_address_form",

					data:$("#edit_cus_address_form").serialize(),

					success: function(response){

						//alert(response);return false;

						var obj = jQuery.parseJSON(response);

						if(obj.status==1){

							//alert(obj.message);

						$("#success_2_msg_suc").html(obj.message).show();

					

							setTimeout(function() {

							$('#success_2_msg_suc').fadeOut('slow');}, 5000);

							 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"view_user/"+<?php echo $this->uri->segment(3); ?>);}, 2000);

						}else{

						$("#error_2_msg_suc").html(obj.message).show();

						setTimeout(function() {$('#error_2_msg_suc').fadeOut('slow');}, 5000);

						}

		

      			  }

    			});

				return false;

			});

			

		function edit_cust_info_detail(cus_info_id,desi,name,phone,email){

			//alert(cus_info_id);

			//alert(cus_id);

			

			$("#edit_cust_info_id").val(cus_info_id);

			//$("#edit_custo_id").val(cus_id);

			$("#edit_cust_info_designation").val(desi);

			$("#edit_cust_info_name").val(name);

			$("#edit_cust_info_phone_2").val(phone);

			$("#edit_cust_info_email_2").val(email);

		

		  }

		

		

			$("#submit_edit_cust_info").click(function(){

				$.ajax({

					type:"POST",

					url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"edit_cus_info_form",

					data:$("#edit_cus_info_form").serialize(),

					success: function(response){

						//alert(response);return false;

						var obj = jQuery.parseJSON(response);

						if(obj.status==1){

							//alert(obj.message);

						$("#success_2_msg_succ").html(obj.message).show();

					

							setTimeout(function() {

							$('#success_2_msg_succ').fadeOut('slow');}, 5000);

							 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"view_user/"+<?php echo $this->uri->segment(3); ?>);}, 2000);

						}else{

						$("#error_2_msg_succ").html(obj.message).show();

						setTimeout(function() {$('#error_2_msg_succ').fadeOut('slow');}, 5000);

						}

		

      			  }

    			});

				return false;

			});

		

		function edit_cutomer_detail(id,name,account,phone,email,website){

			

			$("#edit_cust_id").val(id);

			$("#edit_person").val(name);

			$("#edit_account").val(account);

			$("#edit_phone").val(phone);

			$("#edit_email").val(email);

			$("#edit_website").val(website);

		

		  }

		  

		  	$("#submit_edit_cus").click(function(){

				$.ajax({

					type:"POST",

					url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"edit_cus_form",

					data:$("#edit_cus_form").serialize(),

					success: function(response){

						//alert(response);return false;

						var obj = jQuery.parseJSON(response);

						if(obj.status==1){

							//alert(obj.message);

						$("#success_2_msg").html(obj.message).show();

					

							setTimeout(function() {

							$('#success_2_msg').fadeOut('slow');}, 5000);

							 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"view_user/"+<?php echo $this->uri->segment(3); ?>);}, 2000);

						}else{

						$("#error_2_msg").html(obj.message).show();

						setTimeout(function() {$('#error_2_msg').fadeOut('slow');}, 5000);

						}

		

      			  }

    			});

				return false;

			});

		

		

		

			

			function add_cust_feed(cus_id,cust_name,feeded_by){

				

				

				

				$("#fed_cust_id").val(cus_id);

				$("#fed_cust_name").val(cust_name);

				$("#fed_feed_by_id").val(feeded_by);

			}

				//return false;

				

        	

			

			$("#submit_news_feed_address").click(function(){
				var formData = new FormData($('#edit_cus_new_feed_form')[0]);
				$.ajax({

				type:"POST",

				url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"add_news_feed",
				data:formData,
				processData: false,  //Add this
				contentType: false,
				
				//data:$("#edit_cus_new_feed_form").serialize(),

					success: function(response){

						//alert(response);return false;

					//$("#note").val("");

						var obj = jQuery.parseJSON(response);

							if(obj.status==1){

								//alert(obj.message);

							$("#success_2_msg_fedd_news").html(obj.message).show();

							setTimeout(function() {

							$('#success_2_msg_fedd_news').fadeOut('slow');}, 5000);

						 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"view_user/"+<?php echo $this->uri->segment(3); ?>);}, 2000);

							}else{

									$("#error_2_msg_fedd_news").html(obj.message).show();

						setTimeout(function() {$('#error_2_msg_fedd_news').fadeOut('slow');}, 5000);

								

								}

					}

    			});

				return false;

			});

			

			

			

			function get_note(id){

        	    $.ajax({

                    type:"POST",

                    url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"get_user_note/"+id,

                    success: function(response){

                        var obj = jQuery.parseJSON(response);

                    //CKEDITOR.instances.ck_editor2.setData( '<p>This is the editor data.</p>' );

                        $("#note").val(obj.note);

						 $("#cust_id").val(id);

						 if(obj.note!=''){

							 $("#remove_note").show();

							}else{

								 $("#remove_note").hide();

							}

                      

                     }

                });

            	return false;

            

            }

			

			

			

			

			

			$("#remove_note").click(function(){

				$.ajax({

				type:"POST",

				url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"remove_note",

				data:$("#add_note").serialize(),

					success: function(response){

					$("#note").val("");

						var obj = jQuery.parseJSON(response);

							if(obj.status==1){

								//alert(obj.message);

							$("#success_2_msg_note").html(obj.message).show();

							setTimeout(function() {

							$('#success_2_msg_note').fadeOut('slow');}, 5000);

						 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"view_user/"+<?php echo $this->uri->segment(3); ?>);}, 2000);

							}

					}

    			});

				return false;

			});

			

			

			$("#submit_note").click(function(){

				$.ajax({

					type:"POST",

					url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"add_note",

					data:$("#add_note").serialize(),

					success: function(response){

						var obj = jQuery.parseJSON(response);

						if(obj.status==1){

							//alert(obj.message);

						$("#success_2_msg_note").html(obj.message).show();

					

							setTimeout(function() {

							$('#success_2_msg_note').fadeOut('slow');}, 5000);

							 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"view_user/"+<?php echo $this->uri->segment(3); ?>);}, 2000);

						}else{

						$("#error_2_msg_note").html(obj.message).show();

						setTimeout(function() {$('#error_2_msg_note').fadeOut('slow');}, 5000);

						}

		

      			  }

    			});

				return false;

			});

</script> 

<!--<script>

$("#update_customer").click(function(){

	111



$.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"update_user",

        data:$("#default-demo").serialize(),

        success: function(response){

			

			var obj = jQuery.parseJSON(response);

			

				$("#message").html(obj.message).show();

		

					setTimeout(function() {

					$('#message').fadeOut('slow');

				}, 5000);	

				

		 }

    });

return false;

});



</script>--> 

<script src="<?php echo base_url(); ?>application/modules/assets/plugins/validator/formValidation.js"></script> 
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/validator/bootstrap.js"></script> 
<script type="text/javascript">

$(document).ready(function() {

    $('#default-demo').formValidation({

        message: 'This value is not valid',

        

        fields: {

            person: {

                message: 'The username is not valid',

                validators: {

                    notEmpty: {

                        message: 'The name is required'

                    }

                }

            },

            email: {

                validators: {

                    notEmpty: {

                        message: 'The email address is required'

                    },

                    emailAddress: {

                        message: 'The input is not a valid email address'

                    }

                }

            },

			account: {

                validators: {

                    notEmpty: {

                        message: 'The account number is required'

                    }

                }

            },

			phone: {

                    validators: {

                        notEmpty: {

                            message: 'The phone number is required'

                        },

                        regexp: {

                            message: 'The phone number can only contain the digits, spaces, -, (, ), + and .',

                            regexp: /^[0-9\s\-()+\.]+$/

                        }

                    }

                },

				website: {

                validators: {

                    notEmpty: {

                        message: 'The website is required'

                    }

                }

            },

			'name[]': {

                validators: {

                    notEmpty: {

                        message: 'The name is required'

                    }

                }

            },

			'phone_2[]': {

                validators: {

                        notEmpty: {

                            message: 'The phone number is required'

                        },

                        regexp: {

                            message: 'The phone number can only contain the digits, spaces, -, (, ), + and .',

                            regexp: /^[0-9\s\-()+\.]+$/

                        }

                    }

            },

			'email_2[]': {

                validators: {

                    notEmpty: {

                        message: 'The email address is required'

                    },

                    emailAddress: {

                        message: 'The input is not a valid email address'

                    }

                }

            },

			'designation[]': {

                validators: {

                    notEmpty: {

                        message: 'The designation is required'

                    }

                }

            },

			'address_one[]': {

                validators: {

                    notEmpty: {

                        message: 'The street 1 is required'

                    }

                }

            },

			'address_two[]': {

                validators: {

                    notEmpty: {

                        message: 'The street 2 is required'

                    }

                }

            },

			'country[]': {

                validators: {

                    notEmpty: {

                        message: 'The country is required'

                    }

                }

            },

			'city[]': {

                validators: {

                    notEmpty: {

                        message: 'The city is required'

                    }

                }

            },

			'postal_code[]': {

                validators: {

                    notEmpty: {

                        message: 'The postal code is required'

                    }

                }

            }

			

			

			

        }

    })

	  .on('success.form.fv', function(e) {

            // Prevent form submission

            e.preventDefault();



            var $form = $(e.target),

                fv    = $form.data('formValidation');



            // Use Ajax to submit form data

           $.ajax({

        type:"POST",

        url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"update_user",

        data:$("#default-demo").serialize(),

        success: function(response){

		var obj = jQuery.parseJSON(response);

			if(obj.status==1){

				$("#message").html(obj.message).show();

				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"manage_user");}, 2000);

				/*	setTimeout(function() {

					$('#message').fadeOut('slow');

				}, 5000);*/

				

			}else{

				$("#message").html(obj.message).show();

					setTimeout(function() {

					$('#message').fadeOut('slow');

				}, 5000);	

			}

			

		

        }

    });



        });

});
$('a[data-mailto]').click(function(){
  var link = 'mailto.html#mailto:' + $(this).data('mailto');
  window.open(link, 'Mailer');
  return false;
});
</script> 
