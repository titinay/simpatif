<?php
	//hak akses menu
	$level = $this->session->userdata('level');
	$session_id = $this->session->userdata('username');
	if($level=='admin'){
		$data['menu']		="menu_admin.php";
	}
	elseif($level=='pimpinan'){
		$data['menu']		="menu_pimpinan.php";
	}
	
?>