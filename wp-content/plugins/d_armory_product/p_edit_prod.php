<?php
require_once '../../../wp-load.php';
global $wpdb;
if(wp_verify_nonce($_POST['secure'], 'secure-edit-product')){
	
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
			if($uploadOk == true){
				$insert_rec = $wpdb->query($wpdb->prepare("Update gm_tbl_products Set kind='%s', category='%s', prod_name='%s', description='%s', product_details='%s', image_loc='%s' Where id=%d", 
															$_POST['kind'], $_POST['category'],$_POST['prod_name'],$_POST['description'],stripslashes($_POST['details']), $target_file, $_POST['rec_id']));
				
				if($insert_rec){
					echo "OK";
				}else{
					echo 'Error happened while processing the request.';	
				}
			}
		}else{
			$insert_rec = $wpdb->query($wpdb->prepare("Update gm_tbl_products Set kind='%s', category='%s', prod_name='%s', description='%s', product_details='%s' Where id=%d", 
															$_POST['kind'], $_POST['category'],$_POST['prod_name'],$_POST['description'],stripslashes($_POST['details']), $_POST['rec_id']));
			if($insert_rec){
				echo "OK";
			}else{
				echo 'Error happened while processing the request.';	
			}
		}

	
}else{
	echo 'Access Denied!';	
}




?>