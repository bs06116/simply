  <footer class="main-footer">
      <div class="pull-right hidden-xs"> <b>Version</b> 2.3.6 </div>
      <strong>Copyright &copy; <?php echo date('Y')?>.</strong> All rights
      reserved. 
  </footer>
</div>
<!-- ./wrapper --> 


<!--Form Wizard-->
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/stepform/jquery.stepy.js" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>application/modules/assets/plugins/stepform/jquery.validate.min.js"></script>
<script>
	$(document).ready(function() {
	//$('#default-demo').stepy({});
	/*	$('#default-demo').stepy({
			//back: function(index){ alert(index) }
			next: function(index) {
		//alert(index)	
		function validateEmail(email) {
		var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
		return re.test(email);
	}	
	 
	function isNumber(n) {
  return !isNaN(parseFloat(n)) && isFinite(n);
}	
			if(index==2){	
			
					 var bit=1;
					 	
					var account=$("#account").val();	
					if(account==''){
						bit=0
						$("#account_error").html("Customer Account required");
					}
					var person=$("#person").val();	
					if(person==''){
						bit=0
						$("#person_error").html("Person field required");
					}
					var phone=$("#phone").val();	
					if(phone=='' || !isNumber(phone)){
						bit=0
						$("#phone_error").html("Valid Phone field required");
					}
					var email=$("#email").val();	
					if(email=='' || !validateEmail(email)){
						bit=0
						$("#email_error").html("valid Email field required");
					}
					var website=$("#website").val();	
					if(website==''){
						bit=0
						$("#website_error").html("Website field required");
					}
					if(bit==1){
	
						return true;	
				   }else{
						
						return false;	
					}
		
			}
		////////////////////SECOND//////////////////
		 if(index==3){
			
			//var bit_one_other=1;		
			var bit_two=1;		
			var name=$("#name").val();	
			if(name==''){
				bit_two=0;
				$("#name_error").html("Name field required");
			}
			var address_one=$("#address_one").val();	
			if(address_one==''){
				bit_two=0;
				$("#address_one_error").html("Address_one field required");
			}
			var address_two=$("#address_two").val();	
			if(address_two==''){
				bit_two=0;
				$("#address_two_error").html("Address_two field required");
			}
			var city=$("#city").val();	
			if(city==''){
				bit_two=0;
				$("#city_error").html("city field required");
			}
			var postal_code=$("#postal_code").val();	
			if(postal_code==''){
				bit_two=0;
				$("#postal_code_error").html("postal_code field required");
			}
			if(bit_two==1){
	
						return true;	
				   }else{
						//alert(3)
						return false;	
					}
		}
		//return true;
	
  }


});*/

	//alert($('#default-demo').stepy('back'));
 
/*$('form').stepy({
  backLabel: '<<',
  nextLabel: '>>'
});
*/

   });
   
   
   $(document).ready(function () {
    var ckbox = $('#inv_chk');
	 var deliver_check = $('#deliver_check');

    $('#inv_chk').on('click',function () {
        if (ckbox.is(':checked')) {
          var name=$("#name").val();
		  $("#inv_name").val(name);
		  var address_one=$("#address_one").val();
		  $("#inv_address_one").val(address_one);
		  	var address_two=$("#address_two").val();	
		  $("#inv_address_two").val(address_two);
		  var city=$("#city").val();	
		  $("#inv_city").val(city);
		  	var postal_code=$("#postal_code").val();
		  $("#inv_postal_code").val(postal_code);
		  
        }
    });
	$('#deliver_check').on('click',function () {
		
        if (deliver_check.is(':checked')) {
          var name=$("#name").val();
		  $("#delv_name").val(name);
		  var address_one=$("#address_one").val();
		  $("#delv_address_one").val(address_one);
		  	var address_two=$("#address_two").val();	
		  $("#delv_address_two").val(address_two);
		  var city=$("#city").val();	
		  $("#delv_city").val(city);
		  	var postal_code=$("#postal_code").val();
		  $("#delv_postal_code").val(postal_code);
		  
        } 
    });
	
	
	
});
   
 
</script>

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


<!-- SELECT 2 --> 
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/select2/select2.full.min.js"></script> 
<!-- DataTables -->
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll --> 
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/slimScroll/jquery.slimscroll.min.js"></script> 
<!-- FastClick --> 
<script src="<?php echo base_url(); ?>application/modules/assets/plugins/fastclick/fastclick.js"></script> 
<!-- AdminLTE App --> 
<script src="<?php echo base_url(); ?>application/modules/assets/dist/js/app.min.js"></script> 
<!-- CK Editor -->
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!--Embeded code-->
<script src="<?php echo base_url(); ?>application/modules/assets/bootstrap/js/bootstrap-multiselect.js"></script>
<script src="<?php echo base_url(); ?>application/modules/assets/bootstrap/js/bootstrap-multiselect-collapsible-groups.js"></script>
    <!--Ends here-->

<!-- CUSTOM SCRIPS --> 
<script src="<?php echo base_url(); ?>application/modules/assets/dist/js/custom.js"></script>
<script src="<?php echo base_url(); ?>application/modules/assets/dist/js/bootstrap-multiselect-collapsible-groups.js"></script>
<!--<script>
	$(document).ready(function() {
        $.fn.modal.Constructor.prototype.enforceFocus = function() {
  modal_this = this
  $(document).on('focusin.modal', function (e) {
    if (modal_this.$element[0] !== e.target && !modal_this.$element.has(e.target).length 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_select') 
    && !$(e.target.parentNode).hasClass('cke_dialog_ui_input_text')) {
      modal_this.$element.focus()
    }
  })
};
    });
</script>-->
<script src="<?php echo base_url(); ?>application/modules/assets/dist/js/enscroll.js"></script>
<script>
$(document).ready(function(e) {
    /*$('#scrollbox3').enscroll({
    showOnHover: true,
    verticalTrackClass: 'track3',
    verticalHandleClass: 'handle3'
});*/
// $('.scrollbox3').enscroll({
//     showOnHover: true,
//     verticalTrackClass: 'track3',
//     verticalHandleClass: 'handle3'
// });

// $('#scrollbox4').enscroll({
//     verticalTrackClass: 'track4',
//     verticalHandleClass: 'handle4',
//     minScrollbarLength: 28
// });
// });
</script>

<script>
	$(".table.tableup").mCustomScrollbar({
    axis:"yx" // vertical and horizontal scrollbar
});
</script>
</body>
</html>
