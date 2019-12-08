<?php
require_once '../../../wp-load.php';
global $wpdb;
if(isset($_POST['s_text'])){
	
?>
<script language="javascript">
$(document).ready(function(e) {
	
	function load_prod(){
		$.post("<?php echo plugin_dir_url( __FILE__ ) ?>get_prods.php", {s_text: $("#search_prod").val()}, function(data){
			$("#search-feedback").html(data);	
		});	
	}
	
	
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
<table class="table">
    <thead><th>ID</th><th>Kind</th><th>Category</th><th>Product Name</th><th>Option</th></thead>
    <?php
    $results = $wpdb->get_results("Select * From gm_tbl_products Where prod_name LIKE '%$_POST[s_text]%' LIMIT 0,20");
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
<?php
}
?>