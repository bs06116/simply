
<?php 
$this->load->view('commons/header');


?>

<div class="content-wrapper">
   
      <!-- Content Header (Page header) -->
      <section class="content-header full_padding_header">
        <h1> Update Customer </h1>
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
          <div class="col-lg-12">
          		 <form id="default-demo" data-toggle="validator" role="form">	
                 <!--<div class="row">
          <div class="col-lg-12">
            <div class="row">
              <div class="col-lg-5">
                <div class="form-group cs_account_main">
                  
                  	<div class="col-lg-4"></div>
                    <div class="col-lg-8" style="padding:0;">
                    	<span id="account_error" class="field_error"></span>
                    </div>
                  
                  <div class="clearfix"></div>
                </div>
              </div>
            </div>
          </div>
        </div>-->			
        <div class="row">
        	<div class="col-lg-12">
            	<fieldset>
                <legend>Customer Information</legend>
                <input type="hidden" name="id" />
                     <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-3">
                                                    <div class="form-group">
                                                      <label>Name *</label>
                                                      <input required type="text" class="form-control" value="<?php echo $user_data->person?>" id="person" name="person" />
                                                      <span id="person_error" class="field_error"></span>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                    <div class="form-group">
                                                      <label>Customer Account</label>
                  									  <input class="form-control" disabled="disabled" value="<?php echo $user_data->account?>" type="text" id="account" name="account" />
                                                    </div>
                                                  </div>
                                                  
                                                   <div class="col-lg-3">
                                                    <div class="form-group">
                                                      <label>Phone</label>
                                                      <input type="text" class="form-control" id="phone" value="<?php echo $user_data->phone?>" name="phone" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                    <div class="form-group">
                                                      <label>Email</label>
                                                      <input type="email" class="form-control" id="email" value="<?php echo $user_data->email?>" name="email" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-3">
                                                    <div class="form-group">
                                                      <label>Website</label>
                                                      <input type="text" class="form-control" id="website" value="<?php echo $user_data->website?>" name="website" />
                                                    </div>
                                                  </div>
                                                </div>
                                                
                                              </div>

                              </fieldset>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12">
            	<fieldset>
                <legend>Contact Person</legend>
                <div class="add_min_btn">
                	<button class="btn btn-success" id="add_customer_btn"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <!--<button class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>-->
                </div>
				<div id="add_customer_sec">
                	
                    <?php $i=1; foreach($user_info as $ui):?>
                    <?php if($i>1) {
						$append="append_";
						?>
                  <div class='customer_append'>
                    <hr style='float:left;width:100%;' /> <div class='add_min_btn append_sec_btn'>
				 <button class='btn btn-danger remove_btn'><i class='fa fa-minus' aria-hidden='true'></i></button></div>
                 
                 
                <?php }else{
					$append="";
					}?>
                    <div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" value="<?php echo $ui['name']?>" name="<?php echo $append?>name[]" />
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" class="form-control" value="<?php echo $ui['phone']?>" name="<?php echo $append?>phone_2[]" />
                            </div>
                          </div>
                          
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" value="<?php echo $ui['email']?>" name="<?php echo $append?>email_2[]" />
                            </div>
                          </div>
                          <div class="col-lg-3">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" class="form-control" value="<?php echo $ui['designation']?>" name="<?php echo $append?>designation[]" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          
                        </div>
                      </div>
                      
                        <?php if($i>1) {?>
                  </div>
                <?php }?>
                      <?php $i++; endforeach;?>
                </div>
                
              </fieldset>
            </div>
        </div>
        <div class="row">
        	<div class="col-lg-12">
            	<fieldset>
                <legend>Address</legend>
				<div class="add_min_btn">
                	<button class="btn btn-success" id="add_address_btn"><i class="fa fa-plus" aria-hidden="true"></i></button>
                    <!--<button class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>-->
                </div>
                <div id="add_address_sec">
                
                	 <?php $j=1; foreach($user_address as $ua):?>
                    <?php if($j>1) {$append="append_";?>
                 <div class='address_append'><hr style='float:left;width:100%;' /> <div class='add_min_btn append_sec_btn'>
                 <button class='btn btn-danger remove_btn'><i class='fa fa-minus' aria-hidden='true'></i></button></div>
                <?php }else{
					$append="";
					?>
               
               
                <? }?>
                	
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="form-group col-lg-3">
                              <label>Street 1</label>
                              <input type="text" class="form-control" id="address_one" value="<?php echo $ua['street_one']?>"  name="<?php echo $append?>address_one[]" />
                            </div>
                            <div class="form-group col-lg-3">
                              <label>Street 2</label>
                              <input type="text" class="form-control" id="address_two" value="<?php echo $ua['street_two']?>" name="<?php echo $append?>address_two[]" />
                            </div>
                            <div class="form-group col-lg-3">
                              <label>Country</label>
                              
                               <input type="text" class="form-control" id="country" value="<?php echo $ua['country']?>" name="<?php echo $append?>country[]" />
                            <?php /*?>  <select name="<?php echo $append?>country[]" class="select_2 form-control" value="<?php echo $ua['country']?>" style="width:100%;">
                                <option value="Pakistan">Pakistan</option>
                               <!-- <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Dubai">Dubai</option>-->
                              </select><?php */?>
                            </div>
                          
                          	<div class="form-group col-lg-3">
                              <label>City</label>
                              <input type="text" class="form-control" id="city" value="<?php echo $ua['city']?>" name="<?php echo $append?>city[]" />
                            </div>
                            <div class="form-group col-lg-3">
                              <label>Post Code</label>
                              <input type="text" class="form-control" id="postal_code" value="<?php echo $ua['postal_code']?>" name="<?php echo $append?>postal_code[]" />
                            </div>
                          
                          <div class="form-group col-lg-3">
                              <label>Address Reference</label>
                              <input type="text" class="form-control"  id="add_ref" value="<?php echo $ua['ref_address']?>" name="<?php echo $append?>r_address[]" />
                            </div>
                        </div>
                            
                          
                      </div>
                      
                      <?php if($j>1) {?>
                          </div>
                        <?php }?>
                      <?php $j++; endforeach;?>
                      
                      
                </div>
                
              </fieldset>
            </div>
        </div>	
			  <div class="row">
              	<div class="col-lg-12 text-right form-group">
                	<input type="submit"  class="btn btn-info" id="update_customer" value="Submit" />
                </div>
              </div>
              
              <input type="hidden" value="<?php echo $cust_id?>" name="cust_id" />
            </form>
            <div id="message"></div>
      								
          </div>
        </div>
      </section>
      </div>
      <!-- /.content --> 
   
    <!-- /.container --> 
  </div>
<?php $this->load->view('commons/footer'); ?>
<!--<script>
$("#update_customer").click(function(){
	

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
                    },
					regexp: {
                            message: 'please add link this example.com',
                            regexp : /^(http[s]?:\/\/){0,1}(www\.){0,1}[a-zA-Z0-9\.\-]+\.[a-zA-Z]{2,5}[\.]{0,1}/
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
</script>
