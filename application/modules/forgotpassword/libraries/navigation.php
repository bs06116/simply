<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Navigation
{
	
	
	function __construct()
	{
		$this->ci =& get_instance();		
		$this->ci->load->model('home_model');
		
	}
	public function nav($parent_id)
	{			
		if($parent_data=$this->ci->home_model->get_parent_detail($parent_id)){
		if($parent_data->parent_bit!=0)
		{
			$string="<a href='$parent_data->id'>".$parent_data->title."</a><img src=".base_url()."img/side-arrow.png style='padding:0px 10px 0px;'>".$_SESSION['string'];
			$_SESSION['string']=$string;
			$this->nav($parent_data->parent_bit);
		}
		else
		{
			if($parent_data->parent_bit!=0)
			{
			$string="<a href='$parent_data->id'>".$parent_data->title."</a><img src=".base_url()."img/side-arrow.png style='padding:0px 10px 0px;'>".$_SESSION['string'];
			}
			else
			{
				$string="<a style='color:#222222' href='$parent_data->id'>".$parent_data->title."</a><img src=".base_url()."img/side-arrow.png style='padding:0px 10px 0px;'>".$_SESSION['string'];
			}
			$_SESSION['string']=$string;
		}
		//$_SESSION['string'].=$parent_data->title."->";	
		}
		return $_SESSION['string'];
		
	}
	
	
	
	public function nav2($parent_id)
	{			
		if($parent_data=$this->ci->home_model->get_parent_detail($parent_id)){
		if($parent_data->parent_bit!=0)
		{
			$string="<a href='".base_url()."admin/pages/child/$parent_data->id'>".$parent_data->title."</a><img src=".base_url()."img/side-arrow.png style='padding:0px 10px 0px;'>".$_SESSION['string'];
			$_SESSION['string']=$string;
			$this->nav2($parent_data->parent_bit);
		}
		else
		{
			if($parent_data->parent_bit!=0)
			{
			$string="<a href='".base_url()."admin/pages/child/$parent_data->id'>".$parent_data->title."</a><img src=".base_url()."img/side-arrow.png style='padding:0px 10px 0px;'>".$_SESSION['string'];
			}
			else
			{
				$string="<a style='color:#222222' href='".base_url()."admin/pages/child/$parent_data->id'>".$parent_data->title."</a><img src=".base_url()."img/side-arrow.png style='padding:0px 10px 0px;'>".$_SESSION['string'];
			}
			$_SESSION['string']=$string;
		}
		//$_SESSION['string'].=$parent_data->title."->";	
		}
		return $_SESSION['string'];
	}
	
	
	
}

