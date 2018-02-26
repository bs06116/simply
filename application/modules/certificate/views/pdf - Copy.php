<?php 
$this->load->view('commons/header');

?>
 <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header full_padding_header">
        <h1> New Customer </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section>
      
      <!-- Main content -->
      <div class="content p-t-0">
      	<section class="content m_b_20 white_bg">
        	<table width="100%">
            	<tr>
                	<td>
                    	<table width="100%" align="left" cellpadding="10px">
                        	<tr>
                            	<td align="right">
                                	<img style="width: 320px;" src="<?php echo base_url(); ?>application/modules/assets/dist/img/sp.png" />
                                </td>
                            </tr>
                            <tr>
                            	<td><p style="margin:0;">Customer Name</p></td>
                            </tr>
                            <tr>
                            	<td><p style="margin:0;">Line 1</p></td>
                            </tr>
                            <tr>
                            	<td><p style="margin:0;">Line 2</p></td>
                            </tr>
                            <tr>
                            	<td><p style="margin:0;">City</p></td>
                            </tr>
                            <tr>
                            	<td><p style="margin:0;">Postcode</p></td>
                            </tr>
                            <tr>
                            	<td><p style="margin:0;">Country</p></td>
                            </tr>
                        </table>
                        <table width="100%">
                        	<tr>
                            	<td align="left">
                                	<h2 style="margin-bottom:0;"><strong>Test Certificate</strong></h2>
                                    <p style="margin:0;"><strong>Type 22 according  to EN 122354</strong></p>
                                    <br />
                                    <p>-All values corresponding to information from our supplier <strong>CERTEX DANMARK A-5</strong></p>
                                </td>
                                <td align="right">
                                	<h4 style="margin:0;"><strong>CERTIFICATE No. : 285638 </strong></h4>
                                    <P style="margin:0;">Date : 10-4-2016</P>
                                    <p style="margin:0;">Customer No. : 4400020</p>
                                    <img style="width:190px;" src="<?php echo base_url(); ?>application/modules/assets/dist/img/cert.png" />
                                </td>
                            </tr>
                        </table>
                        <br />
                        <br />
                        <table width="100%" cellpadding="10">
                        	<tr>
                            	<td width="25%">
                                	<p style="margin:0;"><strong><u>Order No. :</u></strong></p>
                                    <p style="margin:0;">334566</p>
                                </td>
                                <td width="25%">
                                	<p style="margin:0;"><strong><u>Production No. :</u></strong></p>
                                    <p style="margin:0;">3566</p>
                                </td>
                                <td width="25%">
                                	<p style="margin:0;"><strong><u>Sales Person :</u></strong></p>
                                    <p style="margin:0;">Richerd</p>
                                </td>
                                <td width="25%">
                                	<p style="margin:0;"><strong><u>Reference To Standard :</u></strong></p>
                                    <p style="margin:0;">334566</p>
                                </td>
                            </tr>
                            <tr>
                            	<td width="25%">
                                	<p style="margin:0;"><strong><u>Customer Order No. :</u></strong></p>
                                    <p style="margin:0;">334566</p>
                                </td>
                                <td width="25%">
                                	<p style="margin:0;"><strong><u>Customer Attention</u></strong></p>
                                    <p style="margin:0;">334566</p>
                                </td>
                                <td width="25%">
                                	<p style="margin:0;"><strong><u>Customer Location</u></strong></p>
                                    <p style="margin:0;">334566</p>
                                </td>
                                <td width="25%">
                                	<p style="margin:0;"><strong><u>External Doc. No :</u></strong></p>
                                    <p style="margin:0;">334566</p>
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
                                	<p style="margin:0;">Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </td>
                            </tr>
                        </table>
                        <br />
                        <br />
                        <table width="100%" border="1" style="text-align:center" cellpadding="10px">
                        	<tr>
                            	<th>Identification Number</th>
                                <th>Description</th>
                                <th>Quantity</th>
                                <th>Date</th>
                                <th>Testload fector</th>
                                <th>SWL (kg)</th>
                                <th>WLL (kg)</th>
                                <th>MB</th>
                            </tr>
                            <tr>
                            	<td>124325</td>
                                <td>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</td>
                                <td>3</td>
                                <td>11-07-2016</td>
                                <td>6x</td>
                                <td>7000</td>
                                <td>7000</td>
                                <td>35000</td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
      	</section>
      </div>
      <!-- /.content --> 
  </div>
 <!-- /.content-wrapper -->
<?php $this->load->view('commons/footer'); ?>