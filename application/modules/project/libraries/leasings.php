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
		$leasings_done="";
		$result=$this->ci->payable_model->get_leasing_info($sales_order);
		$total=count($result);		
		$remainingamount=$submited_amount;
		$last_instalment=0;			
		for($i=0;$i<$total;$i++)
		{
			if($remainingamount>=($result[$i]['due_price']-$result[$i]['payed']))
			{
				$remainingamount=$remainingamount-($result[$i]['due_price']-$result[$i]['payed']);
				$last_instalment++;
				
				if($result[$i]['payed']>0)
				{
					$paying=$result[$i]['due_price'];
				}
				else
				{
					$paying=$result[$i]['due_price']-$result[$i]['payed'];
				}
				
								
				$query[]=array(
					"id"=>$result[$i]['id'],
					"leasing_status"=>1,					
				//	"payed"=>$result[$i]['due_price']-$result[$i]['payed']
					"payed"=>$paying
				);
				$leasings_done.=$result[$i]['id']."|".$paying.",";
			}
			$this->sum=$this->sum+$result[$i]['due_price']-$result[$i]['payed'];
		}
		if($remainingamount>0)
		{			
			$query[]=array(					
					"payed"=>$remainingamount+$result[$last_instalment]['payed'],
					"id"=>$result[$last_instalment]['id']
				);
				$leasings_done.=$result[$last_instalment]['id']."|".($remainingamount+$result[$last_instalment]['payed']).",";
		}
		
		$this->ci->payable_model->update_leasings($query);
		$array['remaining_amount']=$this->sum-$submited_amount;		
		$this->ci->payable_model->payment_received($array,$leasings_done);	
		
	}
	

	
}

