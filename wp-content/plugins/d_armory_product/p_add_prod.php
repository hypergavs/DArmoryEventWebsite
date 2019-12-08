<?php
require_once '../../../wp-load.php';
global $wpdb;
if(wp_verify_nonce($_POST['secure'], 'secure-create-product')){
	
	
	$is_prod_exist = $wpdb->get_row($wpdb->prepare("Select * From gm_tbl_products Where prod_name = %s", $_POST['prod_name']));
	
	if(!$is_prod_exist){
		if($_FILES){
			$target_dir = "products/";
			$target_file = $target_dir . uniqid()."_".basename($_FILES["file"]["name"]);
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			$uploadOk = 1;
			$check = getimagesize($_FILES["file"]["tmp_name"]);
			if($check !== false) {
				if ($_FILES["file"]["size"] < 5000000){
					if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
					|| $imageFileType == "gif" ) {
						if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
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
			echo 'Please add an image.';
		}
		if($uploadOk == true){
			$insert_rec = $wpdb->query($wpdb->prepare("Insert Into gm_tbl_products (kind, category, prod_name, description, product_details, image_loc) VALUES (%s,%s,%s,%s,%s,%s)", 
														$_POST['kind'], $_POST['category'],$_POST['prod_name'],$_POST['description'],$_POST['details'],$target_file));
			if($insert_rec){
				echo "OK";
			}else{
				echo 'Error happened while processing the request.';	
			}
		}
	}else{
		echo 'Product already exist.';	
	}
	
}else{
	echo 'Access Denied!';	
}




?>