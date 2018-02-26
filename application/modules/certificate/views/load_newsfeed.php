


  <div class="news-feeds col-lg-7 rem_padd">
  <div class="col-lg-12 title">
    <h1>News Feed</h1>
    <!--<a href="#" onclick="add_cust_feed('384','Architecon Ltd','1')" data-toggle="modal" data-target="#add_customer_news_feeds" style="margin-top:10px;  float: right;" class="cus-btn"><i class="fa fa-plus" aria-hidden="true"></i> </a>--></div>
  <div class="clearfix"></div>
<div class="scrollbox3 scroll1">

   <?php
					 $i=1;
					  foreach($result as $re):?>
    <div class="single-msg" id="pr<?php echo $re['news_feed_id']?>">
      <div class="feed-title">
        <div class="heading-date">
          <h3 class="new-feed-heading"><?php echo $re['name']?></h3>
          <span class="new-feed-date"><?php echo $re['feed_date']?></span> </div>
      </div>
      <div class="clearfix"></div>
      <div class="col-lg-12 rem_padd">
        <div class="message cus col-lg-12">
        		  <?php 
			   $str = $re['message'];
			   $certificate_id=explode(",,",$str);
			
			
			   $result = mb_substr($re['message'], 3, 8);
			
			
			   if($result=="tication"){
				   $gstr = $re['message'];
			   $certificate_id=explode(",,",$gstr);
				echo  $certificate_id[0];	
			   	$ff = mb_substr($re['message'],-5);
				 // echo "---- : ".$ff ; 
			   ?> 
               
<a target="_blank" href="<?php echo base_url().$this->config->item('certificate_path')?>view_pdf/<?php  if(isset($certificate_id[1])){
			   echo $certificate_id[1]; } ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a>
			   <?php }else{ echo  $re['message'];?>
                
				<?php }?>
                           
        
        
          </div>
        <div class="message feed-img col-lg-12"><?php 
			  		$last3chars = substr($re['news_feed_img'], -3);
		//echo $last3chars."<br>";
		if($last3chars=='ocx'){
			$ab="<a target='_blank' href='".base_url()."uploads/".$re['news_feed_img']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";
			}elseif($last3chars=='jpg'){
				$ab= "<a target='_blank' href='".base_url()."uploads/".$re['news_feed_img']."'>
                	<img src='".base_url()."uploads/".$re['news_feed_img']."'  width='50' height ='50'/></a>";
			//$ab= "<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";
			
			}elseif($last3chars=='pdf'){
			$ab="<a target='_blank' href='".base_url()."uploads/".$re['news_feed_img']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";	
			//$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png> <img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";	
			}else{
				
				/*$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png'>
				<img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";*/
			} 
			if(isset($ab)){
				echo $ab;
				}
			  ?></div>
      </div>
    </div>
    <?php $i++; endforeach?>
   </div>
</div>

<!--<table id="data_table" class="table table-bordered table-striped">
  <thead>
    <tr>
      <th>Name</th>
      <th>date</th>
      <th>image</th>
      <th width="500">Message</th>
    </tr>
  </thead>
  <tbody class="append_data" id="append_data">
    <?php
					 $i=1;
					  foreach($result as $re):?>
    <tr   id="pr<?php echo $re['news_feed_id']?>">
      <td><?php echo $re['name']?></td>
      <td><?php echo $re['feed_date']?></td>
      <td><?php 
			  		$last3chars = substr($re['news_feed_img'], -3);
		//echo $last3chars."<br>";
		if($last3chars=='ocx'){
			$ab="<a target='_blank' href='".base_url()."uploads/".$re['news_feed_img']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";
			}elseif($last3chars=='jpg'){
				$ab= "<a target='_blank' href='".base_url()."uploads/".$re['news_feed_img']."'>
                	<img src='".base_url()."uploads/".$re['news_feed_img']."'  width='50' height ='50'/></a>";
			//$ab= "<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";
			
			}elseif($last3chars=='pdf'){
			$ab="<a target='_blank' href='".base_url()."uploads/".$re['news_feed_img']."'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a>";	
			//$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png> <img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";	
			}else{
				
				/*$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png'>
				<img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";*/
			} 
			if(isset($ab)){
				echo $ab;
				}
			  ?></td>
      <td><?php echo $re['message']?></td>
    </tr>
    <?php $i++; endforeach?>
  </tbody>
</table>-->
