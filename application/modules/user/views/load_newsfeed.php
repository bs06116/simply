<div class="modal-header">
    <h3 class="modal-title"><?php $i = 0;
        foreach ($user_data as $re): ?><?php if ($i < 1) {
            echo $re['name'] ?> feeds   <?php $i++;
        } endforeach ?></h3>

</div>
<div class="modal-body">
    <div class="cus-feeds scrollbox3">

        <?php

        $i = 1;

        foreach ($user_data as $re):?>


            <div class="cus-feed">
                <p class="cus-feed-title"><?php echo $re['username'] ?></p>

                <p class="feed-date"><?php echo $re['feed_date'] ?></p>

                <p class="mesg">

                    <?php
                    $str = $re['message'];
                    $certificate_id = explode(",,", $str);


                    $result = mb_substr($re['message'], 3, 8);


                    if ($result == "tificati"){
                    $gstr = $re['message'];
                    $certificate_id = explode(",,", $gstr);
                    echo $certificate_id[0] . " ";
                    if (isset($certificate_id[2])) {
                        echo $certificate_id[2] . " ";
                    }
                    //	$ff = mb_substr($re['message'],-5);
                    // echo "---- : ".$ff ;
                    ?>

                <div><a target="_blank"
                        href="<?php echo base_url() . $this->config->item('certificate_path') ?>view_pdf/<?php if (isset($certificate_id[1])) {
                            echo $certificate_id[1];
                        } ?>"><i class="fa fa-file-pdf-o" aria-hidden="true"></i></a></div>
                <?php } else {
                    echo $re['message']; ?>

                <?php } ?>


                </p>
                <p class="mesg2">    <?php if (!empty($re['news_feed_img'])) {
                        $last3chars = substr($re['news_feed_img'], -3);
                        //echo $last3chars."<br>";
                        if ($last3chars == 'ocx') {
                            $ab = "<div><a target='_blank' href='" . base_url() . "uploads/" . $re['news_feed_img'] . "'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></div>";
                        } elseif ($last3chars == 'jpg') {
                            $ab = "<div><a target='_blank' href='" . base_url() . "uploads/" . $re['news_feed_img'] . "'>
                	<img src='" . base_url() . "uploads/" . $re['news_feed_img'] . "'  width='50' height ='50'/></a></div>";
                            //$ab= "<a target='_blank' href='".base_url()."uploads/".$da['attachement']."'><i class='fa fa-file-image-o' aria-hidden='true'></i></a>";

                        } elseif ($last3chars == 'pdf') {
                            $ab = "<div><a target='_blank' href='" . base_url() . "uploads/" . $re['news_feed_img'] . "'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a></div>";
                            //$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png> <img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";


                } else {


                            /*$ab="<a target='_blank' href= '".base_url()."uploads/no_thub.png'>
                            <img src='".base_url()."uploads/no_thub.png'  width='50' height ='50'/></a>";*/
                        }

                        if (isset($ab)) {
                            echo $ab;
                        }
                    }
                    $assign_news_feed=$this->user_model->get_attached_newsfeed($re['news_feed_id']);
                    // print_r( $assign_news_feed);
                    foreach($assign_news_feed as $anf):
                        echo "<a target='_blank' href='" . base_url() . "uploads/" . $anf->file_name. "'><i class='fa fa-file-pdf-o' aria-hidden='true'></i></a> &nbsp;";
                    endforeach;
                    ?></p>


            </div>


            <?php $i++; endforeach ?>


    </div>
</div>