	<tr id="pr<?php echo $single_data->products_id?>">
                        	<td><?php echo $single_data->identification?></td>
                            <td><?php echo $single_data->description?></td>
                            <td><?php echo $single_data->factor;?></td>
                            <td><?php echo $single_data->swl;?></td>
                            <td><?php echo $single_data->wll;?></td>
                            <td>
                            
                                <a href="#" data-toggle="modal" onclick="get_product('<?php echo $single_data->products_id;?>')" data-target="#update_product_modal" class="btn btn-primary btn-icon"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                <a onclick="return confirm('Are you sure want to delete this record.')" href="<?php echo base_url(); ?><?php echo $this->config->item('product_path'); ?>delete_product/<?php echo $single_data->products_id;?>" class="btn btn-danger btn-icon"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                            </td>
                        </tr>