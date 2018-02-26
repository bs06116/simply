<?php 
$this->load->view('commons/header');

//$total=count($all_proj);
?>
 <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header full_padding_header">
        <h1>News Feeds</h1>
       <!-- <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>-->
      </section>
      
      <!-- Main content -->
      <section class="content p-t-0">
      	<section class="content m_b_20 white_bg box">
        
      	<div class="row">
        	<div class="col-lg-12 form-group">
            	<?php /*?><a href="<?php echo base_url(); ?><?php echo $this->config->item('certificate_path'); ?>add_newsfeed" class="btn btn-primary pull-right pad" ><i class="fa fa-fw fa-plus"></i> Add New</a><?php */?>
            </div>
        </div>
        <div class="row">
          <div class="col-lg-3">
                	<div class="form-group">
                    	<label>Customer Name</label>
                        <input type="text" name="c_name" id="c_name" placeholder="Search by name" class="form-control" >
                    </div>
                </div>
        	<div class="col-lg-12 load_feed" id="load_html">
            	
            </div>
        </div>
      </section>
      </section>
    <!-- /.container --> 
  </div>
  
  
<?php $this->load->view('commons/footer'); ?>

        
<script type="text/javascript">
$(function() {
    
    //autocomplete
	
 
$('#c_name').autocomplete({
		source: '<?php echo base_url()?>'+'certificate/get_customer',
		select: function (event, ui) {
		$("#customer_id").val(ui.item.id);
		//$("#data_table").remove();
		
		  $.ajax({
                type: "POST",
                url:  '<?php echo base_url()?>'+'certificate/get_new_feed',
                data: {'search_keyword' : ui.item.id},
                dataType: "text",
                success: function(response){
					$("#load_html").html(response)
					 $("#data_table").DataTable({})
					 $('.scrollbox3').enscroll({
						showOnHover: true,
						verticalTrackClass: 'track3',
						verticalHandleClass: 'handle3'
					});
					
					$('#scrollbox4').enscroll({
						verticalTrackClass: 'track4',
						verticalHandleClass: 'handle4',
						minScrollbarLength: 28
					});
					
                   
                }
            });
		
	}
	});
});
</script>