<div id="doct_id">
<?php foreach ($result as $ad):
    $result_data=$this->certificate_model->check_document_attach($ad['id'],$cert_id);
    ?>
    <label><input <?php if($result_data && $cert_id!=0){?> checked <?php }?> type="checkbox" name="document[]"
                  value="<?php echo $ad['id'] ?>"><?php echo $ad['name'] ?>
    </label>
<?php endforeach; ?>
</div>
