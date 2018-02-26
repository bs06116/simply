

<div class="content-wrapper">
            
            
      <!-- Content Header (Page header) -->
    
      
    <!-- Main content -->
    <div class="content p-t-0">
        
        <section class="content m_b_20 white_bg" >

            <table>

                <tr>

                    <td> 
                        <table width="100%">
                             <tr>
                                <th width="75%"> </th>
                                <td style="font-family:Calibri;"><strong>CERTIFICATE:</strong><?php echo $certificate->cert_code;?></td> 
                            </tr>
                        </table>

                        <table>
                           


                            <tr>

                                <td class="logo">
                                    <img src="<?php echo base_url();?>/application/modules/assets/dist/img/logo_pnd.png" style="width: 300px" />
                                </td>

                            </tr>

                            <br>

                            <tr>
                                <td>
                                    <h2 style="font-family:Calibri;font-size:22px;">Certificate of Thorough Inspection &amp; Conformity</h2>
                                </td>
                            </tr>

                            <br>

                            <tr>
                                <td class="t-p1">
                                    <p  style="font-family:Calibri;font-size:13px;">
                                        This document is to certify that the material or products detailed herein conform to the requirements of the manufacturers specification and have been inspected and tested (Where applicable) by a competent and certified inspector.
                                    </p>
                                </td>
                            </tr>

                            <br>

                            <tr>

                                <td>
                                    <p style="font-family:Calibri;font-size:13px;"><strong>Customer Reference:</strong> <span style="font-family:Calibri;font-size:13px;"><?php echo $certificate->c_name?></span></p>   
                                </td>

                            </tr>

                            <tr>

                                <td>
                                <p style="font-family:Calibri;font-size:13px;"><strong>Customer Order: </strong><span style="font-family:Calibri;font-size:13px;"><?php echo $certificate->c_order_no?></span> </p></td>

                            </tr>

                            <tr>

                                <td>
                                <p style="font-family:Calibri;font-size:13px;">
                                    <strong>Delivery Date: </strong><span style="font-family:Calibri;font-size:13px;"><?php echo $certificate->delivery_date?> </span>  
                                </p></td>

                            </tr>

                            <tr>

                                <td>
                                <p style="font-family:Calibri;font-size:13px;">
                                 <strong>Attached Documents: </strong><span style="font-family:Calibri;font-size:13px;"><?php echo $certificate->e_doc_no?> </span>    
                                </p></td>

                            </tr>
                            
                            
                            <table>
                                <tr>
                                
                                    <th style="font-family:Calibri;font-size:13px;">Product:</th>
                                    <td><span style="font-family:Calibri;font-size:13px;"><?php echo $certificate->description;?></span></td>
                                </tr>
                            </table>

                            <br>

                            <tr>
                                <td>
                                
                                 <strong style="font-family:Calibri;font-size:13px;">Test Method:</strong><br>
                                 <p style="font-family:Calibri;font-size:13px;">
                                 This report is intended as evidence of the latest thorough examination report as required by LOLER regulation 9. This certificate is issued following an inspection and examination by a competent person and should be retained by the owner of the products as a record of inspection and re-inspection.
                                </p>
                                </td>
                            </tr>
                            <br>
                        </table>

                       
 						<strong border="1">Results:</strong>
                        <table border="1" style="border-collapse: collapse;text-align: center;width: 100%">  
                            <tr>
                                <th style="font-family:Calibri;font-size:13px;">
                                    Identification Number 
                                </th>
                                <th style="font-family:Calibri;font-size:13px;">
                                    Description 
                                </th>
                                <th style="font-family:Calibri;font-size:13px;">
                                    Quantity Tested
                                </th>
                                <th style="font-family:Calibri;font-size:13px;">
                                    Proof Load Applied(kg) 
                                </th>
                                <th style="font-family:Calibri;font-size:13px;">
                                    Safe Working Load(kg) 
                                </th>
                            </tr>
                            <tr>
                                <td>
                                <span  style="font-family:Calibri;font-size:13px;">  <?php echo $certificate->identuty_no?> </span> <br> To <br> <span  style="font-family:Calibri;font-size:13px;"><?php echo $certificate->identity_to?></span>  
                                </td>
                                 <td >
                                    <span  style="font-family:Calibri;font-size:13px;"><?php echo $certificate->description ;?> </span>  
                                </td>
                                 <td >
                                   <span  style="font-family:Calibri;font-size:13px;">  <?php echo $certificate->t_quatilty; ?>  </span>  
                                </td>
                                 <td>
                                 <span  style="font-family:Calibri;font-size:13px;"> <?php echo $certificate->pla; ?> </span>  
                                   
                                </td>
                                 <td>
                                  <span  style="font-family:Calibri;font-size:13px;"><?php echo $certificate->swl; ?> </span>  
                                  
                                </td>
                            </tr>
                        
                        </table>

                        <br>

                        <table border="1" style=" border-collapse: collapse;width: 100%">
                             <tr>
                               <td>
                                    <strong  style="font-family:Calibri;font-size:13px;">Inspection Date: </strong><span  style="font-family:Calibri;font-size:13px;"><?php echo $certificate->inspection_date; ?></span>  
                               </td>
                               <td >
                                   <strong  style="font-family:Calibri;font-size:13px;">Re-inspection Date: </strong><span  style="font-family:Calibri;font-size:13px;"><?php echo $certificate->re_inspection_date; ?></span>  
                               </td>  
                             </tr>
                        </table>

                         <br>

                        <table width="100%" class="table4">
                            <tr>
                                <td> <strong  style="font-family:Calibri;font-size:13px;">Inspection Results:</strong></td>
                            </tr>  
                            <tr>
                                <td>
                                    <p  style="font-family:Calibri;font-size:13px;">
                                       All of the inspected products complied with the dimension specified on the manufacturer’s drawings and were free from cracks, flaws and defects.
                                    </p>
                                </td>   
                            </tr>
                        </table>
                         <br> 
                            
                        <table>
                            <tr>
                                <td><strong  style="font-family:Calibri;font-size:13px;">Tested by: </strong><span  style="font-family:Calibri;font-size:13px;">
								<?php echo $certificate->tested_by; ?></span></td>
                                
                            </tr>
                            <tr>
                                <td><strong  style="font-family:Calibri;font-size:13px;">Inspected by: </strong>
                                <span  style="font-family:Calibri;font-size:13px;">
								<?php echo $certificate->inspected_by; ?></span></td>
                            </tr>
                        </table>
                         <br>
                        <table>
                            <tr>
                                <td>
                                    <p style="font-family:Calibri;font-size:13px;">
                                       Signed on behalf of Simply Precast Accessories Limited 
                                    </p>
                                </td>
                            </tr>
                             <br>
                            <tr>
                                <td>
                                  <img src="<?php echo base_url();?>/application/modules/assets/dist/img/signa.png" width="146px"
                                     />
                                  <p  style="font-family:Calibri;font-size:13px;"> Aidan Monaghan <br>
                                   Managing Director</p>  
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

