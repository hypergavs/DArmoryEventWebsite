<?php
require_once '../../../wp-load.php';
global $wpdb;
if(wp_verify_nonce($_POST['secure'], 'secure_del_prod')){
	$qry = $wpdb->query($wpdb->prepare("Delete From gm_tbl_products Where id='%s'", $_POST['rec_id']));
	if($qry){
		echo 'OK';
	}else{
		echo 'Error happened while processing the request.';	
	}
}else{
	echo 'Access Denied!';	
}