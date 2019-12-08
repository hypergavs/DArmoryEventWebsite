<?php
require_once '../../../wp-load.php';
global $wpdb;
$gal_id = $_POST['gal_id'];
?>


<?php 

$gal_url = content_url()."/uploads/photo-gallery";
$gallery = $wpdb->get_row("Select * From gm_bwg_gallery Where id='$gal_id'");
$images = $wpdb->get_results("Select * From gm_bwg_image Where gallery_id='$gal_id'");
if($gallery){
	if($images){
		  foreach($images as $image){
			  echo '
				   <div class="item">
					  <img src="'.$gal_url.$image->image_url.'" style="width:100%;">
					  <div class="carousel-caption">
						  <h3>'.$gallery->name.'</h3>
						  <p>'.$gallery->description.'</p>
					  </div>
					</div>
			  ';	
		  }  
	}
}
?>