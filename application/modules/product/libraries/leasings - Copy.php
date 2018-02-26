<?php 
class Leasings {
	var $sum =0;
	public function leasings()
	{
		$this->ci =& get_instance();
		$this->ci->load->model('dashboard/payable_model');
	}
	public function update_leasings($sales_order,$submited_amount,$array)
	{	
		
		$query=array();
		$result=$this->ci->payable_model->get_leasing_info($sales_order);
		$total=count($result);		
		$remainingamount=$submited_amount;
		$last_instalment=0;			
		for($i=0;$i<$total;$i++)
		{
			if($remainingamount>=$result[$i]['due_price'])
			{
				$remainingamount=$remainingamount-$result[$i]['due_price'];
				$last_instalment++;				
				$query[]=array(
					"id"=>$result[$i]['id'],
					"leasing_status"=>1,					
					"payed"=>$result[$i]['due_price']
				);
			}
			$this->sum=$this->sum+$result[$i]['due_price'];
		}
		if($remainingamount>0)
		{			
			$query[]=array(					
					"payed"=>$remainingamount,
					"id"=>$result[$last_instalment]['id']
				);
		}		
		$this->ci->payable_model->update_leasings($query);

		$array['remaining_amount']=$this->sum-$submited_amount;		
		$this->ci->payable_model->payment_received($payment);
		
	}
	

	
}

