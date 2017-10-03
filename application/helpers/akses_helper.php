<?php 
	function in_access()
	{
		$ci=& get_instance();
		if($ci->session->userdata('usernamee')){
			redirect('welcome');
		}
	}
	function no_access()
	{
		$ci=& get_instance();
		if(!$ci->session->userdata('usernamee')){
			redirect('login');
		}
	}
?>