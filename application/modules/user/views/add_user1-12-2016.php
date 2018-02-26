
<?php 
$this->load->view('commons/header');
?>

<div class="content-wrapper">
    
      <!-- Content Header (Page header) -->
      <section class="content-header full_padding_header">
        <h1> New Customer </h1>
       <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>-->
      </section>
      
      <!-- Main content -->
      <div class="content p-t-0">
      	<section class="content m_b_20 white_bg">
        <div class="row">
          <div class="col-lg-12">
          		 <form id="default-demo" data-toggle="validator" role="form">	
                 <div class="row">
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
        </div>			
        <div class="row">
        	<div class="col-lg-12">
            	<fieldset>
                <legend>Customer Information</legend>
                <input type="hidden" name="id" />
                     <div class="col-lg-12">
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                      <label>Name *</label>
                                                      <input  type="text"  autocomplete="off"  class="form-control " id="person" name="person" />
                                                      <span id="person_error" class="field_error"></span>
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                      <label>Account Number</label>
                  									  <input class="form-control" type="text" id="account" name="account" />
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="row">
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                      <label>Phone</label>
                                                      <input type="text" class="form-control" id="phone" name="phone" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-6">
                                                    <div class="form-group">
                                                      <label>Email</label>
                                                      <input type="email" class="form-control" id="email" name="email" />
                                                    </div>
                                                  </div>
                                                  <div class="col-lg-12">
                                                    <div class="form-group">
                                                      <label>Website</label>
                                                      <input type="text" class="form-control" id="website" name="website" />
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
                	<a class="btn btn-success" id="add_customer_btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <!--<button class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>-->
                </div>
				<div id="add_customer_sec">
                	<div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Name</label>
                              <input type="text" class="form-control" name="name[]" />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Phone</label>
                              <input type="text" class="form-control" name="phone_2[]" />
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Email</label>
                              <input type="text" class="form-control" name="email_2[]" />
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Designation</label>
                              <input type="text" class="form-control" name="designation[]" />
                            </div>
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
                <legend>Address</legend>
				<div class="add_min_btn">
                	<a class="btn btn-success" id="add_address_btn"><i class="fa fa-plus" aria-hidden="true"></i></a>
                    <!--<button class="btn btn-danger"><i class="fa fa-minus" aria-hidden="true"></i></button>-->
                </div>
                <div id="add_address_sec">
                	<div class="col-lg-12">
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <label>Street 1</label>
                              <input type="text" class="form-control" id="address_one" name="address_one[]" />
                            </div>
                            <div class="form-group">
                              <label>Street 2</label>
                              <input type="text" class="form-control" id="address_two" name="address_two[]" />
                            </div>
                            <div class="form-group">
                              <label>Country</label>
                              <input type="text" class="form-control" id="country" name="country[]" />
                             <?php /*?> <select name="country[]" class="select_2 form-control" style="width:100%;">
                                <option value="Pakistan">Pakistan</option>
                               <!-- <option value="India">India</option>
                                <option value="Iran">Iran</option>
                                <option value="Dubai">Dubai</option>-->
                              </select><?php */?>
                            </div>
                          </div>
                          <div class="col-lg-6">
                          	<div class="form-group">
                              <label>City</label>
                              <input type="text" class="form-control" id="city" name="city[]" />
                            </div>
                            <div class="form-group">
                              <label>Post Code</label>
                              <input type="text" class="form-control" id="postal_code" name="postal_code[]" />
                            </div>
                          </div>
                        </div>
                            
                          
                      </div>
                </div>
                
              </fieldset>
            </div>
        </div>	
			  <div class="row">
              	<div class="col-lg-12 text-right form-group">
                	<input type="submit"  class="btn btn-info" id="submit_customer" value="Submit" />
                </div>
              </div>
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
$("#submit_customer").click(function(){
	

$.ajax({
        type:"POST",
        url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"save_user",
        data:$("#default-demo").serialize(),
        success: function(response){
		var obj = jQuery.parseJSON(response);
				if(obj.status==1){
				$("#message").html(obj.message).show();
			$("#default-demo")[0].reset();
					setTimeout(function() {
					$('#message').fadeOut('slow');
				}, 5000);	
				
			}else{
				$("#message").html(obj.message).show();
					setTimeout(function() {
					$('#message').fadeOut('slow');
				}, 5000);	
			}
			
		
        }
    });
return false;
});

</script>-->
<!-- VALIDATOR  -->
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
        url:'<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>'+"save_user",
        data:$("#default-demo").serialize(),
        success: function(response){
		var obj = jQuery.parseJSON(response);
			if(obj.status==1){
				$("#message").html(obj.message).show();
				 setTimeout(function(){ window.location.replace("<?php echo base_url()?><?php echo $this->config->item('user_path'); ?>"+"manage_user");}, 2000);
				$("#default-demo")[0].reset();
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
