<!DOCTYPE html>
<html>
<head>
	<title></title>
	
</head>
<body>
	<div class="certificate">
		<table>
			<tr>
				<td>
					<table class="ct-no">
						<tr>
							<td width="78%"></td>
							<td><b>CERTIFICATE: </b><?php echo $certificate->cert_code;?></td>
						</tr>
					</table>
					<table class="ct-1">
						<tr>
							<td>
								<img src="<?php echo base_url();?>/application/modules/assets/dist/img/logo_pnd.png" style="width: 450px" >
							</td>
						</tr>
					</table>
					<!-- =================== -->
					<table class="c-hd">
						<tr>
							<td>
								<p>
									Certificate of Thorough Inspection &amp; Conformity
								</p>								
							</td>
						</tr>
					</table>
					<!--====================-->
					<table class="cr-p1">
						<tr>
							<td align="justify">
								<p>
									This document is to certify that the material or products detailed herein conform to the requirements of the manufacturers specification and have been inspected and tested (where applicable) by a competent and certified inspector.
								</p>
								
							</td>
						</tr>
					</table>
					<!-- ===================== -->
                 <?php  //print_r($certificate);?>
					<table class="ct-2">
						<tr>
							<td><b>Customer Reference: </b> <?php echo $certificate->c_name?></td>
						</tr>
						<tr>
							<td><b>Customer Order: </b> <?php echo $certificate->c_order_no?></td>
						</tr>
						<tr>
							<td><b>Delivery Date: </b> <?php $date=date_create($certificate->delivery_date);
																echo date_format($date,"d/m/Y");
							?></td>
						</tr>
						<tr>
							<td><b>Attached Documents: </b> <?php echo strtoupper($certificate->e_doc_no);  ?> </td>
						</tr>
						<tr>
                         			
							<td><b>Product: </b><span><?php 
							 $string = preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1', $certificate->description);
							 echo $string;
							
							?></span></td>
						</tr>
					</table>
					
					<!-- ================= -->
					<table class="ct-3">
						<tr>
							<td>
								<b>Test Method</b>
							</td>
						</tr>
						<tr>
							<td align="justify">
								<p>
									This report is intended as evidence of the latest thorough examination report as required by LOLER regulation 9. This certificate is issued following an inspection and examination by a competent person and should be retained by the owner of the products as a record of inspection and re-inspection.
								</p>
							</td>
						</tr>
					</table>
					<!-- ================================ -->
					<table>
						<tr>
							<td><b>Results:</b></td>
						</tr>
					</table>
					<table class="ct-4">

						<tr>
							<th>Identification <br> Number</th>
							<th>Description</th>
							<th>Quantity Tested</th>
							<th>Proof Load Applied (kg)</th>
							<th>Safe Working Load (kg)</th>
						</tr>
						<tr>
							<td>
								<?php echo $certificate->identuty_no?><br>
                               <?php  if(!empty($certificate->identity_to)) {?>
								TO<br>
								<?php echo $certificate->identity_to; }?>
                                
							</td>
							<td>
								<?php echo $certificate->description ;?>
							</td>
							<td> <?php echo $certificate->t_quatilty; ?></td>
							<td><?php echo $certificate->pla; ?></td>
							<td><?php echo $certificate->swl; ?></td>
						</tr>
					</table>
					<!-- ======================== -->
					<table class="ct-5">
						<tr>
							<td>
								<b>Inspection Date: </b><?php $date=date_create($certificate->inspection_date);
																echo date_format($date,"d/m/Y");  ?>
							</td>
							<td>
								<b>Re-Inspection Date: </b><?php  $date=date_create($certificate->re_inspection_date);
																echo date_format($date,"d/m/Y"); 
								 ?>
							</td>
						</tr>
					</table>
					<!-- =========================== -->
					<table class="ct-6">
						<tr>
							<td>
								<b>Inspection Results:</b>
							</td>
						</tr>
						<tr>
							<td>
								<p>
									All of the inspected products complied with the dimension specified on the manufacturer’s drawings and were free from cracks, flaws and defects.
								</p>
							</td>
						</tr>
					</table>
					<!--======================-->
					<table>
						<tr>
							<td>
								<b>Tested by: </b><?php echo $certificate->tested_by; ?>
							</td>
						</tr>
						<tr>
							<td>
								<b>Inspected By: </b><?php echo $certificate->inspected_by; ?>
							</td>
						</tr>
					</table>
					<!-- ================== -->
					<table class="ct-7">
						<tr>
							<td>
								<p>
									Signed on behalf of Simply Precast Accessories Limited
								</p>
							</td>
						</tr>
					</table>
					<!-- ================== -->
					<table>
						<tr>
							<td>
								<img src="<?php echo base_url();?>/application/modules/assets/dist/img/signa.png" width="146px" />
							</td>
						</tr>
						<tr>
							<td>Aidan Monaghan</td>
						</tr>
						<tr>
							<td>Managing Director</td>
						</tr>
					</table>	
				</td>
			</tr>
		</table>
	</div>
</body>
</html