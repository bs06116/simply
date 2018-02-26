 <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">

      <!-- Content Header (Page header) -->

      

      

      <!-- Main content -->

      <div class="content p-t-0">

      	<section class="content m_b_20 white_bg">

        	<table width="100%">

            	<tr>

                	<td>

                    	<table width="100%" align="left">

                        	<tr>

                            	<td align="right">

                                	<img style="width: 320px;" src="http://gresysprojects.com/simply/application/modules/assets/dist/img/sp.png" />

                                </td>

                            </tr>

                            <tr>

                            	<td><p style="margin:0;"><?php echo $certificate->c_name?></p></td>

                            </tr>

                            <tr>

                            	<td><p style="margin:0;"><?php echo $address_data->street_one?></p></td>

                            </tr>

                            <tr>

                            	<td><p style="margin:0;"><?php echo $address_data->street_two?></p></td>

                            </tr>

                            <tr>

                            	<td><p style="margin:0;"><?php echo $address_data->city?></p></td>

                            </tr>

                            <tr>

                            	<td><p style="margin:0;"><?php echo $address_data->postal_code?></p></td>

                            </tr>

                            <tr>

                            	<td><p style="margin:0;"><?php echo $address_data->country?></p></td>

                            </tr>

                        </table>

						<br />

                        <table width="100%">

                       	<tr>

                            	<td align="left">

                                	<h2 style="margin-bottom:0;"><strong>Test Certificate</strong></h2>

                                    <p style="margin:0;"><strong>Type 22 according  to EN 122354</strong></p>

                                    <br />

                                    <p>-All values corresponding to information from our supplier <strong>CERTEX DANMARK A-5</strong></p>

                                </td>

                                <td align="right" width="250px">

                                	<h4 style="margin:0;"><strong>CERTIFICATE No : <?php echo $certificate->cert_code?> </strong></h4>

                                    <P style="margin:0;">Date : <?php echo date("d-m-Y", strtotime($certificate->cer_date))?></P>

                                    <p style="margin:0;">Customer No : <?php echo $single_data->account?></p>

               <img style="width:190px; margin-top:5px;" src="http://gresysprojects.com/simply/application/modules/assets/dist/img/cert.png" />

                                </td>

                            </tr>

                        </table>

                        <br />

                        <br />

                         <table width="100%" cellpadding="10">

                        	<tr>

                            	<td width="25%">

                                	<p style="margin:0;">Order No</p>

                                    <p style="margin:0;"><?php echo $certificate->order_no?></p>

                                </td>

                                <td width="25%">

                                	<p style="margin:0;">Production No</p>

                                    <p style="margin:0;"><?php echo $certificate->production_no?></p>

                                </td>

                                <td width="25%">

                                	<p style="margin:0;">Sales Person</p>

                                    <p style="margin:0;"><?php echo $certificate->sale_person?></p>

                                </td>

                                <td width="25%">

                                	<p style="margin:0;">Reference To Standard</p>

                                    <p style="margin:0;"><?php echo $certificate->ref_to_standard?></p>

                                </td>

                            </tr>

                              <tr>

                         	<td width="25%">

                                	<p style="margin:0;">Customer Order No</p>

                                    <p style="margin:0;"><?php echo $certificate->c_order_no?></p>

                                </td>

                                <td width="25%">

                                	<p style="margin:0;">Customer Attention</p>

                                    <p style="margin:0;"><?php echo $certificate->c_attention?></p>

                                </td>

                                <td width="25%">

                                	<p style="margin:0;">Customer Location</p>

                                    <p style="margin:0;"><?php echo $certificate->c_location?></p>

                                </td>

                                <td width="25%">

                                	<p style="margin:0;">External Doc. No</p>

                                    <p style="margin:0;"><?php echo $certificate->e_doc_no?></p>

                                </td>

                            </tr>

                        </table>

                        <br />

                      <table width="100%">

                        	<tr>

                            	<td>

                                	<p style="margin:0;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.Lorem Ipsum is simply dummy text of.</p>

                                </td>

                            </tr>

                            <tr>

                            	<td>

                                	<p style="margin:0;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                                </td>

                            </tr>

                            <tr>

                            	<td>

                                	<br />

                                	<p style="margin:20px 0 0;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>

                                </td>

                            </tr>

                        </table>

                        <br />

                        <br />

                        <table width="100%" border="1" style="text-align:center;border-collapse:collapse;" cellpadding="7px">

                        	<tr>

                            	<th align="center">Identification Number</th>

                                <th align="center">Description</th>

                                <th align="center">Test Quantity</th>

                                <th align="center">Date</th>

                                <th align="center">Testload fector</th>

                                <th align="center">SWL (kg)</th>

                                <th align="center">WLL (kg)</th>

                                <th align="center">MBL (kg)</th>

                            </tr>

                            <tr>

                            	<td><?php echo $certificate->identuty_no?></td>

                                <td><?php echo $certificate->description?></td>

                                <td><?php echo $certificate->t_quatilty?></td>

                                <td><?php echo date("d-m-Y", strtotime($certificate->cer_date))?></td>

                                <td><?php echo $certificate->factor?></td>

                                <td><?php echo $certificate->swl?></td>

                                <td><?php echo $certificate->wll?></td>

                                <td><?php echo $certificate->mbl?></td>

                            </tr>

                        </table>

                        <br />

                        <br />

                        <table width="100%">

                        	<tr>

                            	<td>

                                	<p style="margin:0px;color:blue; width:100%;">Quality Deparment</p><br />

                                	<img src="http://gresysprojects.com/simply/application/modules/assets/dist/img/sig2.png" />



                                </td>

                            </tr>

                            <tr>

                              <td><p> mediocrem. At melius doctus menandri </p></td>

                            </tr>

                            <tr>

                              <td><p> mediocrem. At melius doctus menandri eam, nec in expetenda incorrupte. Has probo feugait </p></td>

                            </tr>

                        </table>

                        <br />

                        <br />

                        <table width="100%">

                        <tr>

                        <td><img style="width:150px;" src="http://gresysprojects.com/simply/application/modules/assets/dist/img/sig1.png"/></td>

                        

                        <td style="padding:10px;">

                        	<p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                            <p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                            <p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                            <p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                        </td>

                        

                        

                        <td style="padding:10px;">

                        	<p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                            <p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                            <p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

                            <p style="margin:0px;"> mediocrem. At melius doctus eugait nominavi cu.</p>

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

