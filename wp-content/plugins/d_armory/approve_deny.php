<?php
require_once '../../../wp-load.php';
global $wpdb;
if(wp_verify_nonce($_POST['secure'], 'secure_approve_payment') || wp_verify_nonce($_POST['secure'], 'secure_deny_payment')){
	if($_POST['state']=='approve'){
		$wpdb->query("Update gm_tbl_event_reg Set payment_status='Approved' Where id='".$_POST['rec_id']."'");
		
	}else{
		$wpdb->query("Update gm_tbl_event_reg Set payment_status='Denied' Where id='".$_POST['rec_id']."'");
	}
	?>
    <script language="javascript">
    $(document).ready(function(e) {
        $(".approve_payment, .denie_payment").click(function(e){
			e.preventDefault();	
			var process_to = $(this).attr("process_to");
			var rec_id = $(this).attr("rec_id");
			var state = $(this).attr("href");
			var secure = $(this).attr("secure");
			$.post(process_to, {rec_id: rec_id, state: state, secure: secure}, function(data){
				$("#reg_recs").html(data);
			});
		});
    });
    </script>
    <table class="table table-bordered" id="registration_approval_table">
                	<thead>
                    	<th>Full Name</th>
                    	<th>PSMOC ID</th>
                    	<th>DOB</th>
                    	<th>Email</th>
                    	<th>Mobile #</th>
                    	<th>Address</th>
                    	<th>Gun Club</th>
                    	<th>Match</th>
                    	<th>Division</th>
                    	<th>Category</th>
                    	<th>Chrono Factor</th>
                    	<th>Firearm Details</th>
                    	<th>Payment Proof</th>
                    	<th>Entry Date</th>
                        <th>Option</th>
                    </thead>
            	<?php
					$results = $wpdb->get_results("Select * From gm_tbl_event_reg Where payment_status='Pending'");
					if($results){
						foreach($results as $res){
							echo '
								<tr>
									<td>'.$res->lname.', '.$res->fname.' '.$res->mname.'</td>
									<td>'.$res->psmoc_id_num.'</td>
									<td>'.$res->dob.'</td>
									<td>'.$res->email_add.'</td>
									<td>'.$res->mobile_num.'</td>
									<td>'.$res->address.'</td>
									<td>'.$res->gun_club.'</td>
									<td>'.$res->match_.'</td>
									<td>'.$res->division.'</td>
									<td>'.$res->category.'</td>
									<td>'.$res->c_factor.'</td>
									<td>'.$res->firearm_details.'</td>
									<td><a target="_blank" href="'.plugin_dir_url( __FILE__ ).$res->payment_proof.'" class="">View Payment</a></td>
									<td>'.$res->entry_date.'</td>
									<td><a href="approve" rec_id="'.$res->id.'" process_to="'.plugin_dir_url( __FILE__ ).'approve_deny.php" secure="'.wp_create_nonce('secure_approve_payment').'" class="approve_payment">Approve</a>|
										<a href="denie" rec_id="'.$res->id.'" process_to="'.plugin_dir_url( __FILE__ ).'approve_deny.php" secure="'.wp_create_nonce('secure_deny_payment').'" class="denie_payment">Denie</a></td>
								</tr>
							';
						}	
					}
					?>
                </table>
                <hr class="gm-hr-style3" />
                <table class="table table-bordered" id="registration_approval_table">
                <thead>
                    	<th>Full Name</th>
                    	<th>PSMOC ID</th>
                    	<th>DOB</th>
                    	<th>Email</th>
                    	<th>Mobile #</th>
                    	<th>Address</th>
                    	<th>Gun Club</th>
                    	<th>Match</th>
                    	<th>Division</th>
                    	<th>Category</th>
                    	<th>Chrono Factor</th>
                    	<th>Firearm Details</th>
                    	<th>Payment Proof</th>
                    	<th>Entry Date</th>
                        <th>Status</th>
                    </thead>
                    <?php
					$results = $wpdb->get_results("Select * From gm_tbl_event_reg Where payment_status='Approved'");
					if($results){
						foreach($results as $res){
							echo '
								<tr>
									<td>'.$res->lname.', '.$res->fname.' '.$res->mname.'</td>
									<td>'.$res->psmoc_id_num.'</td>
									<td>'.$res->dob.'</td>
									<td>'.$res->email_add.'</td>
									<td>'.$res->mobile_num.'</td>
									<td>'.$res->address.'</td>
									<td>'.$res->gun_club.'</td>
									<td>'.$res->match_.'</td>
									<td>'.$res->division.'</td>
									<td>'.$res->category.'</td>
									<td>'.$res->c_factor.'</td>
									<td>'.$res->firearm_details.'</td>
									<td><a target="_blank" href="'.plugin_dir_url( __FILE__ ).$res->payment_proof.'" class="">View Payment</a></td>
									<td>'.$res->entry_date.'</td>
									<td>'.$res->payment_status.'</td>
								</tr>
							';
						}	
					}
					?>
                </table>
                <hr class="gm-hr-style3" />
                <table class="table table-bordered" id="registration_approval_table">
                <thead>
                    	<th>Full Name</th>
                    	<th>PSMOC ID</th>
                    	<th>DOB</th>
                    	<th>Email</th>
                    	<th>Mobile #</th>
                    	<th>Address</th>
                    	<th>Gun Club</th>
                    	<th>Match</th>
                    	<th>Division</th>
                    	<th>Category</th>
                    	<th>Chrono Factor</th>
                    	<th>Firearm Details</th>
                    	<th>Payment Proof</th>
                    	<th>Entry Date</th>
                        <th>Status</th>
                    </thead>
                    <?php
					$results = $wpdb->get_results("Select * From gm_tbl_event_reg Where payment_status='Denied'");
					if($results){
						foreach($results as $res){
							echo '
								<tr>
									<td>'.$res->lname.', '.$res->fname.' '.$res->mname.'</td>
									<td>'.$res->psmoc_id_num.'</td>
									<td>'.$res->dob.'</td>
									<td>'.$res->email_add.'</td>
									<td>'.$res->mobile_num.'</td>
									<td>'.$res->address.'</td>
									<td>'.$res->gun_club.'</td>
									<td>'.$res->match_.'</td>
									<td>'.$res->division.'</td>
									<td>'.$res->category.'</td>
									<td>'.$res->c_factor.'</td>
									<td>'.$res->firearm_details.'</td>
									<td><a target="_blank" href="'.plugin_dir_url( __FILE__ ).$res->payment_proof.'" class="">View Payment</a></td>
									<td>'.$res->entry_date.'</td>
									<td>'.$res->payment_status.'</td>
								</tr>
							';
						}	
					}
					?>
                </table>
    <?php
	
}else{
	echo "Access Denied!";	
}

?>