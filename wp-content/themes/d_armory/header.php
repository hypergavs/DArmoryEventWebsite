<html <?php language_attributes(); ?>><head>
    	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic' rel='stylesheet' type='text/css'>
        <link rel="icon" type="image/png" href="<?php bloginfo('template_directory') ?>/images/favicon.png" />
        
    	<meta charset="<?php bloginfo('charset'); ?>" />
        <meta name="viewport" content="device-width" />
    	<title><?php echo bloginfo('name'); ?></title>
        
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.0/css/font-awesome.min.css">
        
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.3.0/css/mdb.min.css" />
		<?php wp_head(); ?>
        <!-- Optional theme -->
        
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    </head>
<body <?php body_class(); ?>>
<div id="loader-wrapper">
</div>

<div class="container-fluid wow fadeIn" id="top-content">
	<div class="row">
		<div class="" id="the-menu">
            <a class="navbar-brand" id="the-logo" href="#"></a>
            <nav class="nav" id="fix-header">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNav">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        
                    </div>
                    <div class="collapse navbar-collapse" id="mainNav">
                    <?php
                            $args = array(
                                'theme_location' => 'primary'
                            );
                            wp_nav_menu($args);
                        ?>
                    </div>
            </nav>
        </div>
    </div>
</div>
<?php
	
?>