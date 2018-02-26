$(document).ready(function() {
	
		// SELECT2
        
		$('.select_2').select2();
		
		//DATA TABLE
		$('#data_table').DataTable();
		
		//Stepy Form
		//$('#default-demo').stepy();
		
		//APPEND CUSTOMER SECTION
		$(function(){
   $(document).on('click',"#add_customer_btn",function(){
    var html = "<div class='customer_append'><hr style='float:left;width:100%;' /> <div class='add_min_btn append_sec_btn'>";
				html+="<button class='btn btn-danger remove_btn'><i class='fa fa-minus' aria-hidden='true'></i></button></div>";
                html+="<div class='col-lg-12'><div class='row'><div class='col-lg-6'><div class='form-group'>";
				html+="<label>Name</label><input type='text' class='form-control' name='name[]' /></div></div>";
                html+="<div class='col-lg-6'><div class='form-group'><label>Phone</label>";
				html+="<input type='text' class='form-control' name='phone_2[]' /></div>";            
                html+="</div></div><div class='row'><div class='col-lg-6'><div class='form-group'><label>Email</label>";         
                html+="<input type='text' class='form-control' name='email_2[]' /></div></div><div class='col-lg-6'>";         
                html+="<div class='form-group'><label>Designation</label><input type='text' class='form-control' name='designation[]' />";                html+="</div></div></div></div></div>";
                              
                            
                            
           
                        
                    
                   // html+=" </div>";
    
    
    $("#add_customer_sec").append(html);
	
	return false;
    });
    
    $(document).on("click",".remove_btn",function(){
    
       $(this).parent("div").parent("div.customer_append").fadeOut( "slow", function() {
      
 
       
            $(this).remove();
      
        
		
         
         // catg_val.val("");
          
          });
		   return false;
     });
    
    
  });
  
  
  	//APPEND ADDRESS SECTION
		$(function(){
   $(document).on('click',"#add_address_btn",function(){
    var html = "<div class='address_append'><hr style='float:left;width:100%;' /> <div class='add_min_btn append_sec_btn'>";
				html+="<button class='btn btn-danger remove_btn'><i class='fa fa-minus' aria-hidden='true'></i></button></div>";
                html+="<div class='col-lg-12'><div class='row'><div class='col-lg-6'><div class='form-group'><label>Street 1</label>";
				html+="<input type='text' class='form-control' id='address_one' name='address_one[]' /></div><div class='form-group'>";
                html+="<label>Street 2</label><input type='text' class='form-control' id='address_two' name='address_two[]' /></div>";
				html+="<div class='form-group'><label>Country</label><select name='country[]' class='select_2 form-control' style='width:100%;'>";            
                html+="<option value='Pakistan'>Pakistan</option></select></div></div><div class='col-lg-6'><div class='form-group'>";
              html+="<label>City</label><input type='text' class='form-control' id='city' name='city[]' /></div><div class='form-group'>";                html+="<label>Post Code</label><input type='text' class='form-control' id='postal_code' name='postal_code[]' />";									                html+="</div></div></div></div></div>";
                              
                         	
                              
                            
                              
                            
                                
                              
                              
                            
                            
           
                        
                    
                   // html+=" </div>";
    
    
    $("#add_address_sec").append(html);
	$('.select_2').select2();
	
	return false;
    });
    
    $(document).on("click",".remove_btn",function(){
    
       $(this).parent("div").parent("div.address_append").fadeOut( "slow", function() {
      
 
       
            $(this).remove();
      
        
		
         
         // catg_val.val("");
          
          });
		   return false;
     });
    
    
  });
  

  
    });
	
	
					  