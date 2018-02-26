 <!-- Content Wrapper. Contains page content -->

    <?php /*?><?php print_r($certificate);
	echo "<br><br><br><br>";
	print_r($certificate);
	echo "<br><br><br><br>";
	print_r($single_data);
	echo "<br><br><br><br>";
	
	?>
<?php */?><div class="content-wrapper">
            
            
      <!-- Content Header (Page header) -->
    
      
    <!-- Main content -->
    <div class="content p-t-0">
        <table width="100%">
             <tr>
                <th width="75%"> </th>
                <td><strong>CERTIFICATE:</strong><?php echo $certificate->cert_code;?></td> 
            </tr>
            </table>

        <section class="content m_b_20 white_bg" >

            <table>

                <tr>

                    <td> 

                        <table>


                            <tr>

                                <td class="logo">
                                    <img src="<?php echo base_url();?>/application/modules/assets/dist/img/logo_pnd.png" style="width: 300px" />
                                </td>

                            </tr>

                            <br>

                            <tr>
                                <td>
                                    <h2 style="font-weight: lighter">Certificate of Thorough Inspection & Conformity</h2>
                                </td>
                            </tr>

                            <br>

                            <tr>
                                <td class="t-p1">
                                    <p>
                                        This document is to certify that the material or products detailed herein conform to the requirements of the manufacturers specification and have been inspected and tested (Where applicable) by a competent and certified inspector.
                                    </p>
                                </td>
                            </tr>

                            <br>

                            <tr>

                                <td>
                                    <p><strong>Customer Reference: </strong><?php echo $certificate->c_name?></p>   
                                </td>

                            </tr>

                            <tr>

                                <td>
                                <p><strong>Customer Order: </strong><?php echo $certificate->c_order_no?> </p></td>

                            </tr>

                            <tr>

                                <td>
                                <p>
                                    <strong>Delivery Date: </strong><?php echo $certificate->delivery_date?>   
                                </p></td>

                            </tr>

                            <tr>

                                <td>
                                <p>
                                 <strong>Attached Documents: </strong><?php echo $certificate->e_doc_no?>   
                                </p></td>

                            </tr>
                            <table>
                                <tr>
                                    <th>Product:</th>
                                    <td><?php echo $certificate->description;?>  </td>
                                </tr>
                            </table>

                            <br>

                            <tr>
                                <td>
                                
                                 <strong>Test Method:</strong><br>
                                 <p>
                                 This report is intended as evidence of the latest thorough examination report as required by LOLER regulation 9. This certificate is issued following an inspection and examination by a competent person and should be retained by the owner of the products as a record of inspection and re-inspection.
                                </p>
                                </td>
                            </tr>
                            <br>
                        </table>

                        <br>
 						<strong border="1">Results</strong>
                        <table border="1" style="border-collapse: collapse;text-align: center;width: 100%">  
                            <tr>
                                <th>
                                    Identification Number 
                                </th>
                                <th>
                                    Description 
                                </th>
                                <th>
                                    Quantity Tested
                                </th>
                                <th>
                                    Proof Load Applied(kg) 
                                </th>
                                <th>
                                    Safe Working Load(kg) 
                                </th>
                            </tr>
                            <tr>
                                <td>
                                   <?php echo $certificate->identuty_no?>  <br> To <br><?php echo $certificate->identity_to?>
                                </td>
                                 <td>
                                   <?php echo $certificate->description ;?> 
                                </td>
                                 <td>
                                    <?php echo $certificate->t_quatilty; ?>  
                                </td>
                                 <td>
                                 <?php echo $certificate->pla; ?> 
                                    7500
                                </td>
                                 <td>
                                 <?php echo $certificate->swl; ?> 
                                    2500
                                </td>
                            </tr>
                        
                        </table>

                        <br />

                        <table style=" border-collapse: collapse;width: 100%">
                             <tr>
                               <td style="border: 1px solid black">
                                    <strong>Inspection Date: </strong><?php echo $certificate->inspection_date; ?>
                               </td>
                               <td style="border: 1px solid black">
                                   <strong>Re-inspection Date: </strong><?php echo $certificate->re_inspection_date; ?>
                               </td>  
                             </tr>
                        </table>

                        <br />

                        <table width="100%" class="table4">
                            <tr>
                                <td> <strong>Inspection Results:</strong></td>
                            </tr>  
                            <tr>
                                <td>
                                    <p>
                                       All of the inspected products complied with the dimension specified on the manufacturer’s drawings and were free from cracks, flaws and defects.
                                    </p>
                                </td>   
                            </tr>
                        </table>
                         
                        <table>
                            <tr>
                                <td><strong>Tested by: </strong><?php echo $certificate->tested_by; ?></td>
                                
                            </tr>
                            <tr>
                                <td><strong>Inspected by: </strong><?php echo $certificate->inspected_by; ?></td>
                            </tr>
                        </table>
                         <br />
                        <table>
                            <tr>
                                <td>
                                    <p>
                                       Signed on behalf of Simply Precast Accessories Limited 
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                  <p> Aidan Monaghan <br>
                                   Managing Director</p>  
                                </td>
                                 <td>  
                                    <img src="<?php echo base_url();?>/application/modules/assets/dist/img/signa.png" width="210px"
                                     />
                                </td>
                            </tr>
                        </table>
                         
                        
                        

                    </td>

                </tr>

            </table>

        </section>

    </div>

    <!-- /.content --> 

</div>

