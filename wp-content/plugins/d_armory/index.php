<?php 
/*
Plugin Name: D Armory Plugin
Version: 1.0
Author: GM
*/ 
function d_armory_registration(){
	global $wpdb;
	ob_start();	
	?>
    	<script language="javascript">
		$(document).ready(function(e) {
			$("#dob").mask("99/99/9999",{placeholder: "MM/DD/YYYY"});
			$("#dob").blur(function(){
				
			});
			
			$("#event-registration").submit(function(e){
				e.preventDefault();	
				var data = new FormData();
				var file_data = $('input[type="file"]')[0].files;
				for(var i = 0;i<file_data.length;i++){
					data.append("file_"+i, file_data[i]);
				}
				var other_data = $(this).serializeArray();
				$.each(other_data,function(key,input){
					data.append(input.name,input.value);
				});
				
				var process_to = $(this).attr("action") + "p_registration.php";

				$.ajax({
					url:process_to,
					data:data,
					contentType:false,
					processData:false,
					type:'POST',
					success: function(data){
						if(data!=""){
							$(".feedback .bg-danger").html(data).show();
						}else{
							$(".feedback .bg-success").show();
							$("#event-registration")[0].reset();
						}
					}	
				});
			});
		});
        </script>
    	<h2 class="gm-h2-style1 wow fadeIn">
          Event Registration
              <hr />
              <h4 class="gm-h2-style1 wow fadeIn">2nd Gov. Bojie Dy CUP Level 4</h4>
        </h2>
        <div class="container-fluid">
        	
        	<div class="row wow fadeIn">
            <div class="col-md-5">
            	<h4 class="gm-h2-style1">Pre-Registration Procedure</h4>
                <hr class="gm-hr-style3" />
                <ol class="reg_procedure">
                	<li>Have the pre-registration amounting P2,000.00 deposited to the following account:<br /><br />
                    	<ul>
                        	<li>Account Name: DAVID A. DAVID</li>
                            <li>Bank: EastWest</li>
                            <li>Account Number: 2000 1915 5365</li>
                        </ul>
                    </li><br />
                    <li>
                    	Take a photo of the deposit slip / transaction slip
                    </li><br />
                    <li>
                    	Fill-up the registration form and upload the photo of the transaction slip you took before hand.
                    </li><br />
                    <li>
                    	Submit the form and wait it to be transmitted.
                    </li><br />
                    <li>
                    	Once you receive a successful message, This means your registration form was transmitted successfuly.
                    </li><br />
                    <li>
                    	Your registration will be subject for review. You will be notified through the email and phone number you provided on the registration form you submitted.
                    </li><br />
                    <li>
                    	Review may take 24-48hours during working days. If you did not receive any response within 48hours please do notify us through email darmory2017@gmail.com or SMS 0905 498 6925. 
                    </li><br />
                    <li>
                    	<strong>Note: </strong>On-site Registration fee will be P2,500.00
                    </li>
                    
                </ol>
            </div>
            
            <div class="col-md-7">
            	
            <form action="<?php echo plugin_dir_url( __FILE__ ) ?>" method="post" id="event-registration" enctype="multipart/form-data">
            	<div class="row">
                    <div class="col-md-5"><input type="text" name="last_name" class="form-control" placeholder="Last Name*" required /></div>
                    <div class="col-md-5"><input type="text" name="first_name" class="form-control" placeholder="First Name*" required /></div>
                    <div class="col-md-2"><input type="text" name="middle_initial" class="form-control" placeholder="M.I." required /></div>
                </div>
                
                <div class="row">
                    <div class="col-md-2"><input type="text" name="psmoc_id_no" class="form-control" placeholder="PSMOC ID No." required /></div>
                    <div class="col-md-3"><input type="text" name="dob" class="form-control" id="dob" placeholder="Date of Birth*" required /></div>
                    <div class="col-md-4"><input type="text" name="email_add" class="form-control" placeholder="Email Address" required /></div>
                    <div class="col-md-3"><input type="text" name="mobile_num" class="form-control" placeholder="Mobile Number" required /></div>
                </div>
                <div class="row">
                	
                    <div class="col-md-12">
                    <p style="color:#FFF;">Address: House No.,           Street,           Barangay,         Town/City/Province,          State,             Country</p>
                    <input type="text" name="address" class="form-control" placeholder="Input Address Details According to Details needed above" required /></div>
                </div>
                <div class="row">
                    <div class="col-md-12"><input type="text" name="gun_club" class="form-control" placeholder="Gun Club" /></div>
                </div>
                <div class="row">
                	<div class="col-md-12">
                	<label class="gm_label"><strong>MATCH: </strong></label>
                    <div class="checkbox">
                      <label><input type="checkbox" name="match[]" value="Hand Gun">Hand Gun;</label>
                      <label><input type="checkbox" name="match[]" value="Practical Rimfire Rifle">Practical Rimfire Rifle;</label>
                      <label><input type="checkbox" name="match[]" value="3 Gun">3 Gun</label>
                    </div>
                    </div>
                </div>
                <hr class="gm-hr-style2" />
                <div class="row">
                	<div class="col-md-7">
                    	<label class="gm_label"><strong>Division: </strong></label>
                        <div class="checkbox">
                          <div class="col-md-3">
                              <label><input type="checkbox" name="division[]" value="Stock Hi-Cap">Stock Hi-Cap</label><br />
                              <label><input type="checkbox" name="division[]" value="Double Action/Striker Fired">Double Action/Striker Fired</label><br />
                              <label><input type="checkbox" name="division[]" value="Limited 10">Limited 10</label><br />
                              <label><input type="checkbox" name="division[]" value="Unlimited">Unlimited</label>
                          </div>
                          <div class="col-md-3">
                              <label><input type="checkbox" name="division[]" value="Single Stack">Single Stack</label><br />
                              <label><input type="checkbox" name="division[]" value="Revolver">Revolver</label><br />
                              <label><input type="checkbox" name="division[]" value="Carry Optics">Carry Optics</label>
                          </div>
                          
                          <div class="col-md-3">
                              <label><input type="checkbox" name="division[]" value="PPR Unlimited">PPR Unlimited</label><br />
                              <label><input type="checkbox" name="division[]" value="PPR Limited">PPR Limited</label>
                          </div>
                          
                          <div class="col-md-3">
                              <label><input type="checkbox" name="division[]" value="3Gun Unlimited">3Gun Unlimited</label><br />
                              <label><input type="checkbox" name="division[]" value="3Gun Practical">3Gun Practical</label>
                          </div>
                          
                        </div>
                     </div>
                     
                     <div class="col-md-5">
                     	<label class="gm_label"><strong>Category: </strong></label>
                        <div class="checkbox">
                          <div class="col-md-6">
                              <label><input type="checkbox" name="category[]" value="Junior">Junior</label><br />
                              <label><input type="checkbox" name="category[]" value="Senior">Senior</label><br />
                              <label><input type="checkbox" name="category[]" value="Super Senior">Super Senior</label>
                          </div>
                           <div class="col-md-6">
                              <label><input type="checkbox" name="category[]" value="Lady">Lady</label><br />
                              <label><input type="checkbox" name="category[]" value="Lawman">Lawman</label><br />
                              <label><input type="checkbox" name="category[]" value="Match Officer">Match Officer</label>
                          </div>
                        </div>
                     </div>
                </div>
                
                <hr class="gm-hr-style2" />
                <div class="row">
                	<div class="col-md-12">
                	<label class="gm_label"><strong>Chrono Factor: </strong></label>
                    <div class="checkbox">
                    	<label><input type="checkbox" name="c_factor[]" value="Full Load">Full Load</label>
                        <label><input type="checkbox" name="c_factor[]" value="Minimum Load">Minimum Load</label>
                    </div>
                    </div>
                </div>
                
                <hr class="gm-hr-style2" />
                <div class="row">
                	<div class="col-md-12">
                	<label class="gm_label"><strong>Firearm Details: </strong></label>
                    <p style="color:#FFF;">Kind,		Make,		Model,		Serial Number,		Caliber,		License No.,		Exp. Date</p>
                    <input type="text" name="firearm_details" class="form-control" placeholder="Input Firearm Details According to Details needed" />
                    </div>
                </div>
                
                <div class="row">
                	<div class="col-md-12">
                	<label class="gm_label"><strong>Upload Payment/Deposit Slip: </strong></label>
                	<div class="file-field">
                        <div class="btn btn-primary btn-sm">
                            <span>Choose file</span>
                            <input type="file" name="payment_proof">
                        </div>
                    </div>
                    </div>
                </div>
                <hr class="gm-hr-style2" />
                <div class="row">
                	<div class="col-md-6">
                		<p align="justify" style="color:#FFF;">By Clicking Submit, you agree to the waiver provided below.</p>
                    </div>
                	<div class="col-md-6">
                    	<input type="hidden" value="<?php echo wp_create_nonce('d_armory_secure') ?>" name="secure" />
                		<input type="submit" value="Submit" class="btn btn-primary btn-lg pull-right" />
                    </div>
                </div>
            </form>
                	<div class="row feedback">
                        <div class="col-md-12 bg-success">Registration submitted successfuly, Once the payment has been verified, we will notify you through mobile or email address that you provided.</div>
                        <div class="col-md-12 bg-danger"></div>
                    </div>
                </div>
            </div>
        </div>
        	
          		<center><label class="gm_label">WAIVER</label></center>
            <p align="justify" style="color:#FFF;">
            	I, whose name appears at the top of this form hereby declare that I am participating in this shooting competition of my own free will and entirely at my own risk. I and on behalf of my heirs and assigns certify that I/we agree to release and hold harmless Philippine Shooters and Match Officers Confederation, Inc. (PSMOC) and the Match Officers Organization (MOO), the members and officers of the PSMOC and MOO, Match Organizers and Officials and everyone involved in the organization and management of the Match from any injuries that I may suffer during the competition including death.
            </p>
	
		
	<?php
	return ob_get_clean();
}
add_shortcode("event-registration", "d_armory_registration");




function the_home(){
global $wpdb;
?>
<script language="javascript">
$(document).ready(function(e) {
    $("#event-registration-link").click(function(){
		window.location = "<?php echo get_site_url(); ?>/event-registration";
	});
	$("#event-cof").click(function(){
		window.location = "<?php echo get_site_url(); ?>/courses-of-fire";
	});
	$("#event-awards").click(function(){
		window.location = "<?php echo get_site_url(); ?>/awards";
	});
	
	$("#event-map").click(function(){
		window.open("https://maps.app.goo.gl/?link=https://www.google.com.ph/maps/dir/Santiago/16.6471759,121.5474024/@16.6805576,121.5176433,12104m/data%3D!3m2!1e3!4b1!4m9!4m8!1m5!1m1!1s0x339006216358e9d1:0x31886ec49009c752!2m2!1d121.5537152!2d16.7149832!1m0!3e0?utm_source%3Dapp-invite%26mt%3D8%26pt%3D9008%26utm_medium%3DSIMPLE%26utm_campaign%3Ds2e-ai%26ct%3Ds2e-ai&apn=com.google.android.apps.maps&amv=703000000&isi=585027354&ibi=com.google.Maps&ius=comgooglemapsurl&utm_source=app-invite&mt=8&pt=9008&utm_medium=SIMPLE&utm_campaign=s2e-ai&ct=s2e-ai&invitation_id=493454522602-d7580f1d-9e68-43a8-953f-be19d40ba11d");
	});
	
	$("#gallery_select .carousel-inner .item:first-child").addClass("active");
	
	$('#gallery_select').carousel({
	  interval: 40000
	});
	
	$('#gallery_select .item').each(function(){
	  var next = $(this).next();
	  if (!next.length) {
		next = $(this).siblings(':first');
	  }
	  next.children(':first-child').clone().appendTo($(this));
	
	  if (next.next().length>0) {
	 
		  next.next().children(':first-child').clone().appendTo($(this)).addClass('rightest');
		  
	  }
	  else {
		  $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
		 
	  }
	});
	
	
	$("#event_gallery_select .carousel-inner .item:first-child").addClass("active");
	
	$('#event_gallery_select').carousel({
	  interval: 3000
	});
	

	
	$('#event_gallery_select .item').each(function(){
		var next = $(this).next();
		if (!next.length) {
		  next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		
		if (next.next().length>0) {
		  next.next().children(':first-child').clone().appendTo($(this));
		} else {
		  $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
		}
	});
	
	$("#event_photo_slider .carousel-inner .item:first-child").addClass("active");
	
	$("#gallery_select .gal_url").click(function(e){
		e.preventDefault();	
		var gal_id = $(this).attr("href");
		$.post("<?php echo plugin_dir_url( __FILE__ ) ?>get_images.php", {gal_id: gal_id}, function(data){
			
			$("#touristDest .carousel-inner").html(data);
			$("#touristDest .carousel-inner .item:first-child").addClass("active");
		});
	});
	
	$('.carousel').carousel({
    	pause: "false"
	});
	
	$("#event_gallery_select .gal_url").click(function(e){
		e.preventDefault();	
		var photo_id = $(this).attr("href");
		$("#event_photo_slider .item.active").removeClass("active");
		$("#event_photo_slider .item." + photo_id).addClass("active");
	});
	
});
</script>


<div class="container-fluid" id="bojie-cup-gallery">
	<div class="container">
    
    	<div class="row wow fadeIn">
        	<div class="col-md-12">
              <h2 class="gm-h2-style1">
                    Event Photos
                        <hr />
                        <h4 class="gm-h2-style1">2nd Gov. Bojie Dy CUP Level 4 Photos</h4>
               </h2>
            </div>
        </div>
        <div class="row wow fadeIn">
        	<div class="col-md-12">
            	<div class="carousel slide" id="event_gallery_select">
                	<div class="carousel-inner">
						<?php
                            $gal_url = content_url()."/uploads/photo-gallery";
                            $gallery = $wpdb->get_results("Select * From gm_bwg_image Where gallery_id=16");
                            if($gallery){
								$gal2 = "";
								$f_gal = "";
								$i = 0;
                                foreach($gallery as $gal){
									$i++;
									$gal2 .= '
										  <span></span>
										  <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
											  <a href="'.$gal->id.'" class="gal_url">
											  <img src="'.$gal_url.$gal->thumb_url.'" class="img-responsive">
											  <span>'.$gal->name.'</span>
											  </a>
										  </div>
									';
									if ($i % 4 == 0) {
										$f_gal .= '<div class="item">
										'.$gal2.'
										</div>
										';
										$i = 0;
										$gal2='';
									}
                                }
								echo $f_gal;		
                            }
                        ?>
                  </div>
                  <a class="left carousel-control" href="#event_gallery_select" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#event_gallery_select" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
        
        
        
        
        <div class="row" id="event_photo_slider_wrap">
        	<div class="col-md-12">
            	<div id="event_photo_slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                
					<?php 
						$gal_id = 16;
						$gal_url = content_url()."/uploads/photo-gallery";
						$gallery = $wpdb->get_row("Select * From gm_bwg_gallery Where id='$gal_id'");
						$images = $wpdb->get_results("Select * From gm_bwg_image Where gallery_id='$gal_id'");
						if($gallery){
							if($images){
								  foreach($images as $image){
									  echo '
										   <div class="item '.$image->id.'">
											  <img src="'.$gal_url.$image->image_url.'" style="width:100%;">
											  
											</div>
									  ';	
								  }  
							}
						}
					?>
                    
            
                 
                
                </div>
            
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#event_photo_slider" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#event_photo_slider" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
        
        
    </div>
    
</div>
<div class="container">
	<div class="row">
    	<div class="col-md-12">
        	<hr class="gm-hr-style1" />
        </div>
    </div>
</div>


<div class="container" id="the-banner">
	<div class="row wow slideInLeft">
    	<div class="col-md-12">
        	<h2 class="gm-h2-style1">
              Upcoming Event
                  <hr />
                  <h4 class="gm-h2-style1">2nd Gov. Bojie Dy CUP Level 4</h4>
            </h2>
        </div>
    </div>

	<div class="row wow slideInRight">
    	<div class="col-md-6" id="the-event-banner">
        	<img src="<?php bloginfo('template_directory') ?>/images/18813949_409092619490181_8598098133016086226_n.jpg" class="img-responsive" />
        </div>
        <div class="col-md-6" id="the-event-details">
        	Isabela Shooters would like to invite you this coming August 3-6, 2017. A big event in Isabela 1st Level 4 2nd Gov. Bojie Dy Cup 
            to be held at Santiago City. D'Armory Shooting range. The biggest shooting range in Isabela.
            We Prepared an exciting and challenging stages, Pistol 18 stages 351 Rounds/PRR 18 stages 351 rounds and 5 stages for 3 gun 154 Rounds,
            There will be a lot of cash prizes for champions and a raffle prizes, 
            Hope to see you, Thanks for the support, D.V.C
            <div class="clearfix"></div>
            <div id="the-event-details-buttons" />
                <input type="button" id="event-registration-link" class="btn btn-primary btn-lg" value="Register" />
                <input type="button" id="event-cof" class="btn btn-warning btn-lg" value="Courses of Fire" />
                <input type="button" id="event-awards" class="btn btn-success btn-lg" value="Awards" />
                <input type="button" id="event-map" class="btn btn-success btn-lg" value="Event Location Map" />
            </div>
        </div>
    </div>
</div>

<div class="container-fluid" id="tourist-spot">
	<div class="container">
    
    	<div class="row wow fadeIn">
        	<div class="col-md-12">
              <h2 class="gm-h2-style1">
                    Things to visit in Isabela.
                        <hr />
                        <h4 class="gm-h2-style1">Isabela's Finest tourist destinations</h4>
               </h2>
            </div>
        </div>
        <div class="row wow fadeIn">
        	<div class="col-md-12">
            	<div class="carousel slide" id="gallery_select">
                	<div class="carousel-inner">
						<?php
                            $gal_url = content_url()."/uploads/photo-gallery";
                            $gallery = $wpdb->get_results("Select * From gm_bwg_gallery Where published=1 and (slug<>'hotels' and slug<>'resto' and slug<>'d_armory_gallery')");
                            if($gallery){
                                foreach($gallery as $gal){
                                    echo '
										<div class="item">
										  <div class="col-lg-4 col-xs-4 col-md-4 col-sm-4">
										  <a href="'.$gal->id.'" class="gal_url">
										  <img src="'.$gal_url.$gal->preview_image.'" class="img-responsive">
										  <span>'.$gal->name.'</span>
										  </a>
										  </div>
										</div>
                                    ';	
                                }		
                            }
                        ?>
                  </div>
                  <a class="left carousel-control" href="#gallery_select" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#gallery_select" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-md-12">
            	<div id="touristDest" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                
                  
                    <div class="item active">
                      <img src="<?php echo content_url(); ?>/uploads/photo-gallery/isabela.jpg" style="width:100%;">
                    </div>
            
                 
                
                </div>
            
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#touristDest" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#touristDest" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
        
    </div>
</div>
<?php
}
add_shortcode("the-home", "the_home");

function the_header(){
	?>
    <div id="myCarousel" class="carousel slide wow flipInX" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item view active">
      	<img src="<?php bloginfo('template_directory'); ?>/images/banner2.jpg" style="width:100%;">
        <div class="mask pattern-2"></div>
      </div>

      <div class="item view">
        <img src="<?php bloginfo('template_directory'); ?>/images/banner1.jpg" style="width:100%;">
        <div class="mask pattern-2"></div>
      </div>
    
      <div class="item view">
        <img src="<?php bloginfo('template_directory'); ?>/images/banner3.jpg" style="width:100%;">
        <div class="mask pattern-2"></div>
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
    <?php
}
add_shortcode("the-header", "the_header");

function hotels(){
	?>
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                <h2 class="gm-h2-style1">
                  Hotels | Inn | Suites
                      <hr />
                      <h4 class="gm-h2-style1">List of Hotel available nearby of the venue</h4>
                </h2>
            </div>
        </div>
    
    	<?php
		  global $wpdb;
		  $gal_url = content_url()."/uploads/photo-gallery";
		  $gallery = $wpdb->get_results("Select * From gm_bwg_gallery Where published=1 and slug='hotels'");
		  if($gallery){
			  foreach($gallery as $gal){
				  $hotels =  $wpdb->get_results("Select * From gm_bwg_image Where gallery_id='".$gal->id."'");
				  foreach($hotels as $hotel){
					  $h_info = "";
					  $hotel_info = explode(";", $hotel->description);
					  foreach($hotel_info as $h){
						  $h_info .= $h."<br />";
					  }
					  echo '
						  <div class="row" id="hotels">
							  <div class="col-md-12">
								  <div class="col-md-4" id="hotel-icon"><img src="'.$gal_url.$hotel->thumb_url.'" class="img-responsive"></div>
								  <div class="col-md-4" id="hotel-details">
								  <h4>
									  <strong>'.$hotel->alt.'</strong>
								  </h4>
								  '.$h_info.'
								  
								  </div>
							  </div>
						  </div>
						  <hr class="gm-hr-style3" />
					  ';	
				  }
			  }
		  }
	  ?>
    </div>
	<?php
}
add_shortcode("the-hotels", "hotels");




function resto(){
	?>
	<div class="container">
    	<div class="row">
            <div class="col-md-12">
                <h2 class="gm-h2-style1">
                  Restaurant &amp; Grills
                      <hr />
                      <h4 class="gm-h2-style1">List of Resto and Grill available nearby of the venue</h4>
                </h2>
            </div>
        </div>
    
    	<?php
		  global $wpdb;
		  $gal_url = content_url()."/uploads/photo-gallery";
		  $gallery = $wpdb->get_results("Select * From gm_bwg_gallery Where published=1 and slug='resto'");
		  if($gallery){
			  foreach($gallery as $gal){
				  $hotels =  $wpdb->get_results("Select * From gm_bwg_image Where gallery_id='".$gal->id."'");
				  foreach($hotels as $hotel){
					  $h_info = "";
					  $hotel_info = explode(";", $hotel->description);
					  foreach($hotel_info as $h){
						  $h_info .= $h."<br />";
					  }
					  echo '
						  <div class="row" id="hotels">
							  <div class="col-md-12">
								  <div class="col-md-4" id="hotel-icon"><img src="'.$gal_url.$hotel->thumb_url.'" class="img-responsive"></div>
								  <div class="col-md-4" id="hotel-details">
								  <h4>
									  <strong>'.$hotel->alt.'</strong>
								  </h4>
								  '.$h_info.'
								  
								  </div>
							  </div>
						  </div>
						  <hr class="gm-hr-style3" />
					  ';	
				  }
			  }
		  }
	  ?>
    </div>
	<?php
}
add_shortcode("the-resto", "resto");



function courses_of_fire(){
	?>
    <script language="javascript">
    $(document).ready(function(e) {
        $('#myTabs a').click(function (e) {
		  e.preventDefault()
		  $(this).tab('show')
		})
    });
    </script>
    <div class="container wow fadeIn">
        <div class="row">
            <div class="col-md-12">
                <h2 class="gm-h2-style1">
                  Courses of Fire
                      <hr />
                      <h4 class="gm-h2-style1">2nd Gov. Bojie Dy CUP Level 4</h4>
                </h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12">
            	<div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#stage_summary" aria-controls="stage_summary" role="tab" data-toggle="tab">Stage Summary</a></li>
                    <li role="presentation"><a href="#hand_gun" aria-controls="home" role="tab" data-toggle="tab">Hand Gun</a></li>
                    <li role="presentation"><a href="#prr" aria-controls="profile" role="tab" data-toggle="tab">Practical Rimfire Rifle</a></li>
                    <li role="presentation"><a href="#3gun" aria-controls="messages" role="tab" data-toggle="tab">3 Gun</a></li>
                  </ul>
                
                  <!-- Tab panes -->
                  <div class="tab-content">
                  	<div role="tabpanel" class="tab-pane active" id="stage_summary">
                    	<table class="table table-bordered" id="stage_summary_table">
                        	<thead><th>STAGE #</th><th>DESCRIPTION</th><th>RDS TO BE RECORDED</th></thead>
                            <tr><td>1</td><td>LONG</td><td>32</td></tr>
                            <tr><td>2</td><td>SHORT</td><td>12</td></tr>
                            <tr><td>3</td><td>SHORT</td><td>10</td></tr>
                            <tr><td>4</td><td>SHORT</td><td>12</td></tr>
                            <tr><td>5</td><td>SHORT</td><td>11</td></tr>
                            <tr><td>6</td><td>SHORT</td><td>9</td></tr>
                            <tr><td>7</td><td>MEDIUM</td><td>21</td></tr>
                            <tr><td>8</td><td>MEDIUM</td><td>24</td></tr>
                            <tr><td>9</td><td>MEDIUM</td><td>24</td></tr>
                            <tr><td>10</td><td>MEDIUM</td><td>18</td></tr>
                            <tr><td>11</td><td>MEDIUM</td><td>17</td></tr>
                            <tr><td>12</td><td>MEDIUM</td><td>17</td></tr>
                            <tr><td>13</td><td>LONG</td><td>30</td></tr>
                            <tr><td>14</td><td>LONG</td><td>32</td></tr>
                            <tr><td>15</td><td>LONG</td><td>28</td></tr>
                            <tr><td>16</td><td>LONG</td><td>32</td></tr>
                            <tr><td>17</td><td>SHORT</td><td>12</td></tr>
                            <tr><td>18</td><td>SHORT</td><td>10</td></tr>
                            <tr><td><strong>TOTAL: </strong></td><td></td><td>351</td></tr>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="hand_gun">
                    	<h3>This content is under construction.</h3>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="prr">
                    	<h3>This content is under construction.</h3>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="3gun">
                    	<?php
                        	for($i=1;$i<=18;$i++){
								echo '
									<img src="'.plugin_dir_url( __FILE__ ).'stages/minified/'.$i.'.jpg" class="img-responsive" width="100%" / >
									<hr class="gm-hr-style1" />
								';
							}
						?>
                    </div>
                  </div>
                
                </div>
            </div>
        </div>
        
    </div>
    <?php
}
add_shortcode("the-cof", "courses_of_fire");

function page_under_construction(){
	echo '<img src="'.plugin_dir_url( __FILE__ ).'images/page-underConstruction.png" class="img-responsive" width="100%" / >';
}
add_shortcode("page-under-construction", "page_under_construction");

function contact_us(){
	?>
    <div class="container wow fadeIn">
    	<div class="row">
            <div class="col-md-12">
                <h2 class="gm-h2-style1">
                  Contact US
                      <hr />
                      <h4 class="gm-h2-style1"></h4>
                </h2>
            </div>
        </div>
    	<div class="row">
        	<div class="col-md-6">
            	<img src="<?php bloginfo('template_directory') ?>/images/Contact-Us-Banner-1024x243-copy-copy.png" class="img-responsive" width="100%" / >
            </div>
            <div class="col-md-6" id="contact-us">
            
            	Mobile #: 0905 498 6925<br/>
                Phone #: (078) 305 1867<br/>
                Email: darmory2017@gmail.com<br/>
                Facebook: <a href="https://www.facebook.com/armory.david.3">Click Here</a>
            </div>
        </div>
    </div>
    <?php
}
add_shortcode("contact-us", "contact_us");

function awards(){
	?>
    <div class="container wow fadeIn">
    	<div class="row">
            <div class="col-md-12">
                <h2 class="gm-h2-style1">
                  Isabela 1st Level 4, 2nd Gov. Bojie Dy Cup AWARDS
                      <hr />
                      <h4 class="gm-h2-style1">Awards</h4>
                </h2>
            </div>
        </div>
    	<div class="row">
        	<div class="col-md-12">
            	<div>

                  <!-- Nav tabs -->
                  <ul class="nav nav-tabs" role="tablist">
                    <li role="presentation" class="active"><a href="#hand_gun" aria-controls="home" role="tab" data-toggle="tab">Hand Gun</a></li>
                    <li role="presentation"><a href="#prr" aria-controls="profile" role="tab" data-toggle="tab">Practical Rimfire Rifle</a></li>
                    <li role="presentation"><a href="#3gun" aria-controls="messages" role="tab" data-toggle="tab">3 Gun</a></li>
                  </ul>
                
                  <!-- Tab panes -->
                  <div class="tab-content">
                    <div role="tabpanel" class="tab-pane active" id="hand_gun">
                    	<table class="table table-bordered" id="stage_summary_table">
                        <thead>
                        	<th>DIVISION/CATEGORY</th>
                        	<th>UNLIMITED</th>
                        	<th>STOCK HI-CAP</th>
                        	<th>SINGLE STACK</th>
                        	<th>LIMITED 10</th>
                        	<th>DOUBLE ACTION/STRIKER FIRED 9MM</th>
                        	<th>CARRY OPTIC</th>
                        	<th>REVOLVER</th>
                        </thead>
                        <tr><td>DIVISION OVERALL</td>
                        	<td>5</td>
                            <td>8</td>
                            <td>8</td>
                            <td>6</td>
                            <td>8</td>
                            <td>5</td>
                            <td>3</td>
                        </tr>
                        <tr><td>CLASS A</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>CLASS B</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>CLASS C</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>JUNIOR</td>
                        	<td>3</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>LADY</td>
                        	<td>2</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>SENIOR</td>
                        	<td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>SUPER SENIOR</td>
                        	<td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>LAWMAN IN UNIFORM</td>
                        	<td></td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>MATCH OFFICER</td>
                        	<td>1</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>L.G.U OTHER</td>
                        	<td></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                        </tr>
                        </table>
                        <table class="table table-bordered" id="stage_summary_table">
                        	<thead><th>MATCH</th><th>UNLIMITED</th><th>LIMITED STOCK</th></thead>
                            <tr>
                            	<td>PRR</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                            	<td>3 GUN NATION</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                            	<td>2 GUN MATCH</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="prr">
                    	<table class="table table-bordered" id="stage_summary_table">
                        <thead>
                        	<th>DIVISION/CATEGORY</th>
                        	<th>UNLIMITED</th>
                        	<th>STOCK HI-CAP</th>
                        	<th>SINGLE STACK</th>
                        	<th>LIMITED 10</th>
                        	<th>DOUBLE ACTION/STRIKER FIRED 9MM</th>
                        	<th>CARRY OPTIC</th>
                        	<th>REVOLVER</th>
                        </thead>
                        <tr><td>DIVISION OVERALL</td>
                        	<td>5</td>
                            <td>8</td>
                            <td>8</td>
                            <td>6</td>
                            <td>8</td>
                            <td>5</td>
                            <td>3</td>
                        </tr>
                        <tr><td>CLASS A</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>CLASS B</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>CLASS C</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>JUNIOR</td>
                        	<td>3</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>LADY</td>
                        	<td>2</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>SENIOR</td>
                        	<td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>SUPER SENIOR</td>
                        	<td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>LAWMAN IN UNIFORM</td>
                        	<td></td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>MATCH OFFICER</td>
                        	<td>1</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>L.G.U OTHER</td>
                        	<td></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                        </tr>
                        </table>
                        <table class="table table-bordered" id="stage_summary_table">
                        	<thead><th>MATCH</th><th>UNLIMITED</th><th>LIMITED STOCK</th></thead>
                            <tr>
                            	<td>PRR</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                            	<td>3 GUN NATION</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                            	<td>2 GUN MATCH</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                    <div role="tabpanel" class="tab-pane" id="3gun">
                    	<table class="table table-bordered" id="stage_summary_table">
                        <thead>
                        	<th>DIVISION/CATEGORY</th>
                        	<th>UNLIMITED</th>
                        	<th>STOCK HI-CAP</th>
                        	<th>SINGLE STACK</th>
                        	<th>LIMITED 10</th>
                        	<th>DOUBLE ACTION/STRIKER FIRED 9MM</th>
                        	<th>CARRY OPTIC</th>
                        	<th>REVOLVER</th>
                        </thead>
                        <tr><td>DIVISION OVERALL</td>
                        	<td>5</td>
                            <td>8</td>
                            <td>8</td>
                            <td>6</td>
                            <td>8</td>
                            <td>5</td>
                            <td>3</td>
                        </tr>
                        <tr><td>CLASS A</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>CLASS B</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>CLASS C</td>
                        	<td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr><td>JUNIOR</td>
                        	<td>3</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>LADY</td>
                        	<td>2</td>
                            <td>3</td>
                            <td>2</td>
                            <td>2</td>
                            <td>3</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>SENIOR</td>
                        	<td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>1</td>
                            <td>0</td>
                        </tr>
                        <tr><td>SUPER SENIOR</td>
                        	<td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>LAWMAN IN UNIFORM</td>
                        	<td></td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>MATCH OFFICER</td>
                        	<td>1</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>2</td>
                            <td>0</td>
                            <td>0</td>
                        </tr>
                        <tr><td>L.G.U OTHER</td>
                        	<td></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                            <td>1</td>
                            <td></td>
                            <td></td>
                        </tr>
                        </table>
                        <table class="table table-bordered" id="stage_summary_table">
                        	<thead><th>MATCH</th><th>UNLIMITED</th><th>LIMITED STOCK</th></thead>
                            <tr>
                            	<td>PRR</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                            	<td>3 GUN NATION</td>
                                <td>3</td>
                                <td>3</td>
                            </tr>
                            <tr>
                            	<td>2 GUN MATCH</td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                  </div>
                
                </div>
            </div>
        </div>
    </div>
    <?php
}
add_shortcode("the-awards", "awards");

function gm_photo_gallery(){
global $wpdb;
	?>
    <script language="javascript">
    $(document).ready(function(e) {
    $("#event_gallery_select .carousel-inner .item:first-child").addClass("active");
	
	$('#event_gallery_select').carousel({
	  interval: 3000
	});
	

	
	$('#event_gallery_select .item').each(function(){
		var next = $(this).next();
		if (!next.length) {
		  next = $(this).siblings(':first');
		}
		next.children(':first-child').clone().appendTo($(this));
		
		if (next.next().length>0) {
		  next.next().children(':first-child').clone().appendTo($(this));
		} else {
		  $(this).siblings(':first').children(':first-child').clone().appendTo($(this));
		}
	});
	
	$("#event_photo_slider .carousel-inner .item:first-child").addClass("active");
	$("#event_gallery_select .gal_url").click(function(e){
		e.preventDefault();	
		var photo_id = $(this).attr("href");
		$("#event_photo_slider .item.active").removeClass("active");
		$("#event_photo_slider .item." + photo_id).addClass("active");
	});
    });
    </script>

<div class="container-fluid" id="bojie-cup-gallery">
	<div class="container">
    
    	<div class="row wow fadeIn">
        	<div class="col-md-12">
              <h2 class="gm-h2-style1">
                    Event Photos
                        <hr />
                        <h4 class="gm-h2-style1">2nd Gov. Bojie Dy CUP Level 4 Photos</h4>
               </h2>
            </div>
        </div>
        <div class="row wow fadeIn">
        	<div class="col-md-12">
            	<div class="carousel slide" id="event_gallery_select">
                	<div class="carousel-inner">
						<?php
                            $gal_url = content_url()."/uploads/photo-gallery";
                            $gallery = $wpdb->get_results("Select * From gm_bwg_image Where gallery_id=16");
                            if($gallery){
								$gal2 = "";
								$f_gal = "";
								$i = 0;
                                foreach($gallery as $gal){
									$i++;
									$gal2 .= '
										  <span></span>
										  <div class="col-lg-3 col-xs-3 col-md-3 col-sm-3">
											  <a href="'.$gal->id.'" class="gal_url">
											  <img src="'.$gal_url.$gal->thumb_url.'" class="img-responsive">
											  <span>'.$gal->name.'</span>
											  </a>
										  </div>
									';
									if ($i % 4 == 0) {
										$f_gal .= '<div class="item">
										'.$gal2.'
										</div>
										';
										$i = 0;
										$gal2='';
									}
                                }
								echo $f_gal;		
                            }
                        ?>
                  </div>
                  <a class="left carousel-control" href="#event_gallery_select" data-slide="prev"><i class="glyphicon glyphicon-chevron-left"></i></a>
                  <a class="right carousel-control" href="#event_gallery_select" data-slide="next"><i class="glyphicon glyphicon-chevron-right"></i></a>
                </div>
            </div>
        </div>
        
        
        
        
        <div class="row" id="event_photo_slider_wrap">
        	<div class="col-md-12">
            	<div id="event_photo_slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                
            
                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                
					<?php 
						$gal_id = 16;
						$gal_url = content_url()."/uploads/photo-gallery";
						$gallery = $wpdb->get_row("Select * From gm_bwg_gallery Where id='$gal_id'");
						$images = $wpdb->get_results("Select * From gm_bwg_image Where gallery_id='$gal_id'");
						if($gallery){
							if($images){
								  foreach($images as $image){
									  echo '
										   <div class="item '.$image->id.'">
											  <img src="'.$gal_url.$image->image_url.'" style="width:100%;">
											  
											</div>
									  ';	
								  }  
							}
						}
					?>
                    
            
                 
                
                </div>
            
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#event_photo_slider" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#event_photo_slider" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>
        </div>
        
        
    </div>
    
</div>
    <br />
    <br />
    <?php
}
add_shortcode("the-photo-gallery", "gm_photo_gallery");


function the_admin_reg_approval(){
global $wpdb;
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
	<div class="container-fluid">
    	<div class="row">
            <div class="col-md-12">
                <h2 class="gm-h2-style1">
                  Registration Approval
                      <hr />
                      <h4 class="gm-h2-style1">List of Registrants</h4>
                </h2>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-12" id="reg_recs">
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
                    <tr><td colspan="15" align="right"><button id="print-stab">Print Stab</button></td></tr>
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
            </div>
        </div>
    </div>
<?php	
}
add_shortcode("reg-approval", "the_admin_reg_approval");
?>