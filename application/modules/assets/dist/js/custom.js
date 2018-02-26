$(document).ready(function() {

	

		// SELECT2

        

		$('.select_2').select2();

		

		//DATA TABLE

		/*$('#data_table').DataTable(
		 "order": [[ 3, "desc" ]],
		);*/

		 $('#data_table').DataTable( {
			 
			 "iDisplayLength": 100,
			  "dom": '<"top"f>rt<"bottom"lip><"clear">',
			  "order": [[ 0, "desc" ]],
		 		//"iDisplayLength": 50
	  	} );
		
		

		//Stepy Form

		//$('#default-demo').stepy();

		

		//APPEND CUSTOMER SECTION

		$(function(){

   $(document).on('click',"#add_customer_btn",function(){

    var html = "<div class='customer_append'><hr style='float:left;width:100%;' /> <div class='add_min_btn append_sec_btn text-right'>";

				html+="<button class='btn btn-danger remove_btn'><i class='fa fa-minus' aria-hidden='true'></i></button></div>";

                html+="<div class='col-lg-12'><div class='row'><div class='col-lg-3'><div class='form-group'>";

				html+="<label>Name</label><input type='text' class='form-control' name='append_name[]' /></div></div>";

                html+="<div class='col-lg-3'><div class='form-group'><label>Phone</label>";

				html+="<input type='text' class='form-control' name='append_phone_2[]' /></div>";            

                html+="</div><div class='col-lg-3'><div class='form-group'><label>Email</label>";         

                html+="<input type='text' class='form-control' name='append_email_2[]' /></div></div><div class='col-lg-3'>";         

                html+="<div class='form-group'><label>Designation</label><input type='text' class='form-control' name='append_designation[]' />";                html+="</div></div></div></div></div>";

                              

                            

                            

           

                        

                    

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

    var html = "<div class='address_append'><hr style='float:left;width:100%;' /> <div class='add_min_btn append_sec_btn text-right'>";

				html+="<button class='btn btn-danger remove_btn'><i class='fa fa-minus' aria-hidden='true'></i></button></div>";

                html+="<div class='col-lg-12'><div class='row'><div class='col-lg-12ee'><div class='form-group col-lg-3'><label>Street 1</label>";

				html+="<input type='text' class='form-control' id='address_one' name='append_address_one[]' /></div><div class='form-group col-lg-3'>";

                html+="<label>Street 2</label><input type='text' class='form-control' id='address_two' name='append_address_two[]' /></div>";

	html+="<div class='form-group col-lg-3'><label>Country</label><input type='text' class='form-control' id='country' name='append_country[]' /></div>";

				<!--html+="<div class='form-group'><label>Country</label><input type='text' name='append_country[]' class='form-control' style='width:100%;'/>";            

          html+="<div class='form-group col-lg-3'>";

		 html+="<label>City</label><input type='text' class='form-control' id='city' name='append_city[]' /></div><div class='form-group col-lg-3'>"; 
		 html+="<label>Post Code</label><input type='text' class='form-control' id='postal_code' name='append_postal_code[]' /></div>";

		html+="<div class='form-group col-lg-3'><label>Address Rreference</label><input type='text' class='form-control' id='r_address' name='append_r_address[]' />";
		html+="</div></div></div></div></div>";

                              

                         	

                              

                            

                              

                            

                                

                              

                              

                            

                            

           

                        

                    

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

	

	

					  