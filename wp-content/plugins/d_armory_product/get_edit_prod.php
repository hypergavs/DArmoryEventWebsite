<?php
require_once '../../../wp-load.php';
global $wpdb;
if(wp_verify_nonce($_POST['secure'], 'secure_edit_prod')){
$load_rec = $wpdb->get_row($wpdb->prepare("Select * From gm_tbl_products Where id=%s",$_POST['rec_id']))
?>
<script language="javascript">
$(document).ready(function(e) {
    $("#edit_prod_form").submit(function(e){
		e.preventDefault();
		var data = new FormData();
		var file_data = $('input[type="file"]', this)[0].files;
		data.append("file", file_data[0]);
		var other_data = $(this).serializeArray();
		$.each(other_data,function(key,input){
			data.append(input.name,input.value);
		});
		
		var process_to = $(this).attr("action") + "p_edit_prod.php";
		$.ajax({
			url:process_to,
			data:data,
			contentType:false,
			processData:false,
			type:'POST',
			success: function(data){
				console.log(data);
				$.post("<?php echo plugin_dir_url( __FILE__ ) ?>get_prods.php", {s_text: $("#search_prod").val()}, function(data){
					$("#search-feedback").html(data);	
				});	
				$("#prod_list_home").trigger("click");
			}	
		});
	});
});
</script>
<form action="<?php echo plugin_dir_url( __FILE__ ) ?>" method="post" id="edit_prod_form">
    <div class="row">
        <div class="col-md-6">
            <select class="form-control" name="kind">
            	<option value="<?php echo $load_rec->kind ?>"><?php echo $load_rec->kind ?></option>
                <option value="Firearm">Firearm</option>
                <option value="Ammunition">Ammunition</option>
                <option value="Accessories">Accessories</option>
                <option value="Spare Parts">Spare Parts</option>
            </select>
        </div>
        <div class="col-md-6">
            <input type="text" class="form-control" placeholder="Category" name="category" value="<?php echo $load_rec->category ?>" />
        </div>
    </div>
    <input type="text" class="form-control" placeholder="Product Name" name="prod_name" value="<?php echo $load_rec->prod_name ?>" />
    <textarea class="form-control" placeholder="Product Description" name="description"><?php echo $load_rec->description ?></textarea>
    <textarea class="form-control" placeholder="Additional Details" name="details"><?php echo stripslashes($load_rec->product_details) ?></textarea>
    <div class="row">
    	<div class="col-md-6">
        	<img src="<?php echo plugin_dir_url( __FILE__ ).$load_rec->image_loc ?>" class="img-responsive" />
        </div>
    	<div class="col-md-6">
        <label for="product_image">Product Image:</label>
        <input type="file" class="form-control" id="product_image" name="image" />
        </div>
    </div>
    <div class="row">
        <div class="col-md-6" id="feed-back"></div>
        <div class="col-md-6">
        	<input type="hidden" value="<?php echo $load_rec->id ?>" name="rec_id" />
            <input type="hidden" value="<?php echo wp_create_nonce('secure-edit-product'); ?>" name="secure" />
            <input type="submit" id="submit" class="btn btn-primary btn-lg pull-right" name="submit" value="Save" />
        </div>
    </div>
</form>
<?php
}else{
	echo 'Access Denied!';	
}
?>