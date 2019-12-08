<?php
require_once '../../../wp-load.php';
global $wpdb;
if(wp_verify_nonce($_POST['secure'], 'd_armory_secure')){
	$matches = "";
	$divisions = "";
	$categories = "";
	$c_factors = "";
	if($_POST['match']){
		foreach($_POST['match'] as $match){
			$matches .= $match.";";
		}
	}
	if($_POST['division']){
		foreach($_POST['division'] as $divs){
			$divisions .= $divs.";";
		}
	}
	if($_POST['category']){
		foreach($_POST['category'] as $cats){
			$categories .= $cats.";";
		}
	}
	if($_POST['c_factor']){
		foreach($_POST['c_factor'] as $c_fac){
			$c_factors .= $c_fac.";";
		}
	}
	if($_FILES){
		$target_dir = "payment_proofs/";
		$target_file = $target_dir . uniqid()."_".basename($_FILES["file_0"]["name"]);
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		$uploadOk = 1;
		$check = getimagesize($_FILES["file_0"]["tmp_name"]);
		if($check !== false) {
			if ($_FILES["file_0"]["size"] < 5000000){
				if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
				|| $imageFileType == "gif" ) {
					if (move_uploaded_file($_FILES["file_0"]["tmp_name"], $target_file)) {
						$uploadOk = 1;
					} else {
						echo "Sorry, there was an error uploading your file.";
					}
				}else{
					echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
					$uploadOk = 0;	
				}
			}else{
				echo "Sorry, your file is too large.";
				$uploadOk = 0;
			}
		} else {
			echo "File is not an image.";
			$uploadOk = 0;
		}
	}else{
		echo 'Payment proof is required.';	
	}
	
	
	if($uploadOk == true){
		$qry = $wpdb->query($wpdb->prepare("Insert Into gm_tbl_event_reg (fname,mname,lname,psmoc_id_num,dob,email_add,mobile_num,address,gun_club,match_,division,category,c_factor,firearm_details,payment_proof) VALUES 
		(%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s)", $_POST['first_name'], $_POST['middle_initial'], $_POST['last_name'], $_POST['psmoc_id_no'], $_POST['dob'], $_POST['email_add'], $_POST['mobile_num'], $_POST['address']
		, $_POST['gun_club'], $matches, $divisions, $categories, $c_factors, $_POST['firearm_details'], $target_file));
		if($qry){
		}else{
			echo "Error";	
		}
	}
	
}else{
	echo "Access Denied!";	
}

?>