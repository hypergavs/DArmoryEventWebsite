<?php
require_once '../../../wp-load.php';
global $wpdb;
$results = $wpdb->get_results($wpdb->prepare("Select * From gm_tbl_products Where kind = %s GROUP by category", $_POST['prod_kind']));
if($results){
	foreach($results as $res){
		echo $res->category;	
	}
}else{
	echo 'No Record Found.';	
}
?>