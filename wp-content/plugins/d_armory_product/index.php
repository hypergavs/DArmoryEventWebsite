<?php 
/*
Plugin Name: D Armory Product Plugin
Version: 1.0
Author: GM
*/ 
function d_armory_product(){
	global $wpdb;
	ob_start();	
	?>
	<div class="container-fluid" id="our-products">
    	<div class="row" id="prod-kind">
        	<div class="col-md-12">
            	<div class="container">
                	<div class="row">
                    	<div class="col-md-3 prod-cat">
                        	<div class="col-md-12 prod-kind" id="prod-firearm"></div>
                            <div class="col-md-12 prod-kind-label" process_to="<?php echo plugin_dir_url( __FILE__ ); ?>">FIREARMS</div>
                        </div>
                    	<div class="col-md-3 prod-cat">
                        	<div class="col-md-12 prod-kind" id="prod-ammo"></div>
                            <div class="col-md-12 prod-kind-label" process_to="<?php echo plugin_dir_url( __FILE__ ); ?>">AMMUNITION</div>
                        </div>
                    	<div class="col-md-3 prod-cat">
                        	<div class="col-md-12 prod-kind" id="prod-accessories"></div>
                            <div class="col-md-12 prod-kind-label" process_to="<?php echo plugin_dir_url( __FILE__ ); ?>">ACCESSORIES</div>
                        </div>
                    	<div class="col-md-3 prod-cat">
                        	<div class="col-md-12 prod-kind" id="prod-spareparts"></div>
                            <div class="col-md-12 prod-kind-label" process_to="<?php echo plugin_dir_url( __FILE__ ); ?>">SPARE PARTS</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row" id="feed-back">
        
        </div>
    </div>
    
    
	<?php
	return ob_get_clean();
}
add_shortcode("d-armory-product", "d_armory_product");



function product_management(){
	global $wpdb;
	ob_start();	
	?>
<script language="javascript">
$(document).ready(function(e) {
    $("#add_new_product").submit(function(e){
		e.preventDefault();
		var data = new FormData();
		var file_data = $('input[type="file"]', this)[0].files;
		data.append("file", file_data[0]);
		var other_data = $(this).serializeArray();
		$.each(other_data,function(key,input){
			data.append(input.name,input.value);
		});
		
		var process_to = $(this).attr("action") + "p_add_prod.php";
		$.ajax({
			url:process_to,
			data:data,
			contentType:false,
			processData:false,
			type:'POST',
			success: function(data){
				console.log(data);
				load_prod();
			}	
		});
	});
	
	function load_prod(){
		$.post("<?php echo plugin_dir_url( __FILE__ ) ?>get_prods.php", {s_text: $("#search_prod").val()}, function(data){
			$("#search-feedback").html(data);	
		});	
	}
	
	$("#search_prod").on("keypress", function(e){
		if(e.keyCode==13){
			load_prod();
		}	
	});
	
	
	$(".products_info a.edit_rec_link").click(function(e){
		e.preventDefault();
		$("#edit_prod_tab").trigger("click");
		var secure = "<?php echo wp_create_nonce('secure_edit_prod'); ?>";
		$.post("<?php echo plugin_dir_url( __FILE__ ) ?>get_edit_prod.php", {rec_id:$(this).attr("rec_id"), secure: secure},function(data){
			$("#edit_prod").html(data);	
		});
			
	});
	
	$(".products_info a.del_rec_link").click(function(e){
		e.preventDefault();
		var answer = confirm("Confirm to remove the product?");
		var secure = "<?php echo wp_create_nonce('secure_del_prod'); ?>";
		if(answer==true){
			$.post("<?php echo plugin_dir_url( __FILE__ ) ?>p_del_prod.php", {rec_id:$(this).attr("rec_id"), secure: secure},function(data){
				console.log(data);	
				load_prod();
			});
		}
	});
});
</script>    
    
<h2 class="gm-h2-style1 wow fadeIn">
  Manage Products
      <hr />
      <h4 class="gm-h2-style1 wow fadeIn">---</h4>
</h2>
	
<div class="row">
	<div class="col-md-12">
        <ul role="tablist" id="product-management-mnu">
            <li role="presentation" class="active"><a href="#home" id="prod_list_home" aria-controls="home" role="tab" data-toggle="tab">My Products</a></li>
            <li role="presentation"><a href="#add-new-prod" aria-controls="add-new-prod" role="tab" data-toggle="tab">Add New</a></li>
            <li role="presentation"><a href="#edit_prod" id="edit_prod_tab" aria-controls="edit_prod" role="tab" data-toggle="tab">Edit Product</a></li>
            <li role="presentation"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></li>
        </ul>
  <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="home">
            	<h4 class="gm-h2-style1 wow fadeIn">My Products</h4>
                <div class="row">
                	<div class="col-md-3 col-md-offset-9">
            			<input type="search" autofocus name="search_prod" id="search_prod" placeholder="Search Product" />

                	</div>
                </div>
                <div class="row">
                	<div class="col-md-12" id="search-feedback">
                    	<table class="table">
                        	<thead><th>ID</th><th>Kind</th><th>Category</th><th>Product Name</th><th>Option</th></thead>
                            <?php
							$results = $wpdb->get_results("Select * From gm_tbl_products Where prod_status='Active' LIMIT 0,20");
							if($results){
								foreach($results as $res){
									echo "<tr class='products_info'>
											<td>".$res->id."</td>
											<td>".$res->kind."</td>
											<td>".$res->category."</td>
											<td>".$res->prod_name."</td>
											<td><a href=n'#'>More Details</a>|
												<a href='#' class='edit_rec_link' rec_id='".$res->id."'>Edit</a>|
												<a href='#' class='del_rec_link' rec_id='".$res->id."'>Delete</a></td>
										  </tr>";	
								}	
							}
							?>
                        </table>
                    </div>
                </div>
            </div>
            <div role="tabpanel" class="tab-pane" id="add-new-prod">
            	
            	<form action="<?php echo plugin_dir_url( __FILE__ ) ?>" method="post" id="add_new_product">
                	<div class="row">
                    	<div class="col-md-6">
                            <select class="form-control" name="kind">
                                <option value="Firearm">Firearm</option>
                                <option value="Ammunition">Ammunition</option>
                                <option value="Accessories">Accessories</option>
                                <option value="Spare Parts">Spare Parts</option>
                            </select>
                    	</div>
                        <div class="col-md-6">
                    		<input type="text" class="form-control" placeholder="Category/Brand" name="category" />
                    	</div>
                    </div>
                    <input type="text" class="form-control" placeholder="Product Name" name="prod_name" />
                    <textarea class="form-control" placeholder="Product Description" name="description"></textarea>
                    <textarea class="form-control" placeholder="Additional Details" name="details"></textarea>
                    <label for="product_image">Product Image:</label>
                    <input type="file" class="form-control" id="product_image" name="image" />
                    <div class="row">
                    	<div class="col-md-6" id="feed-back"></div>
                    	<div class="col-md-6">
                        	<input type="hidden" value="<?php echo wp_create_nonce('secure-create-product'); ?>" name="secure" />
                        	<input type="submit" id="submit" class="btn btn-primary btn-lg pull-right" name="submit" value="Save" />
                        </div>
                    </div>
                </form>
            </div>
            <div role="tabpanel" class="tab-pane" id="edit_prod">
            
            
            </div>
            <div role="tabpanel" class="tab-pane" id="settings">.cccc</div>
        </div>
	</div>
</div>


	<?php
	return ob_get_clean();
}
add_shortcode("product-management", "product_management");

function d_armory_product_style() {
	wp_enqueue_style('d_armory_product_style_style', plugin_dir_url( __FILE__ ) . 'css/product-style.css');
}
add_action('wp_enqueue_scripts', 'd_armory_product_style');


?>