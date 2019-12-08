<?php

function importStyle(){
	wp_enqueue_script('gm-jquery', "//code.jquery.com/jquery-3.2.1.min.js");
	wp_enqueue_script('gm-custom-js', get_template_directory_uri()."/js/custom-script.js");
	wp_enqueue_script('gm-clipboard-js', get_template_directory_uri()."/plugins/clipboard.min.js");
	wp_enqueue_script('gm-mask-js', get_template_directory_uri()."/plugins/jquery.maskedinput.min.js");
	wp_enqueue_script('gm-recaptcha', "https://www.google.com/recaptcha/api.js");
	
	wp_enqueue_style('style', get_stylesheet_uri());
	//wp_enqueue_style('gm-style', get_template_directory_uri()."/gm-style.css");
	
}

add_action('wp_enqueue_scripts', 'importStyle');


register_nav_menus(array(
	'primary'=>__('Primary'),
	'footer'=>__('Footer'),
	/*'login_reg'=>__('Login and Register'),
	'guest_menu'=>__('Guest Menu'),
	'jd_logout'=>__('JD Logout'),
	'not_activated'=>('Menu For Not Activated Account'),
	'account-activation'=>('JD Account Activation'),
	'agent_menu'=>('JD Agent Main Menu'),
	'agen_transactions'=>('Agent Transactions Menu')*/
));