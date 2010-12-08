<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title_for_layout; ?> | World Adrenaline</title>
		<meta name="Description" content="Adventure activity listings worldwide. Find an adventure activity globally and make a request." />
		<meta name="Keywords" content="adventure, travel, adventure travel, extreme sports, extreme, adventure sport, adventure holiday, travel, sport, holidays, tour, adventicus" />
		<meta name="robots" content="index,follow" />

		<?php 
    		echo $html->meta('icon', $html->url('/img/favicon.png'));
    		// <link rel="apple-touch-icon" href="/img/favicon-iphone.png" />
			echo $html->css('screen', 'stylesheet', 'media="screen"', true);
			//echo $html->css('mobile', 'stylesheet', 'media="mobile"', true); 
			//echo $html->css('print', 'stylesheet', 'media="print"', true);

			echo $scripts_for_layout;
		
            $javascript->link(array(
                'jquery-1.4.2.min',
                'wa' 
            ), false);
        ?>
		
		
	</head>
	<body>
		<p id="skipnav" class="hidden"><a href="#content">Go to content</a></p>
		<div id="container">
			<div id="header">
                <div id="logo">
                    <?php echo $html->image('logo.png'); ?>
                </div>
                <div id="intro">
                    <p><strong><?php __('World\'s fastest growing site for adventure sport activities'); ?></strong></p>
                    <p><?php // __('Secure Bookings | Flexible Cancellation Policies | No Hidden Costs'); ?></p>
                </div>
                
			</div> <!-- /header -->
			<div id="nav">
    			<?php echo $this->element('layout/navigation'); ?>
			</div> <!-- /nav -->

			<div id="content">
                <div id="main">
    				<?php $session->flash(); ?>
    				<?php echo $content_for_layout; ?>
                </div>

                <div id="sidebar">
        			<?php echo $this->element('layout/sidebar'); ?>
                </div>

				<div class="clear"></div>
			</div> <!-- /content -->

			<div id="footer">
					<?php echo $this->element('layout/footerNavigation'); ?>
			</div> <!-- /footer -->

		</div> <!-- /container -->


		<!-- scripts -->
		<?php echo $this->element('layout/scripts'); ?>
		<!-- /scripts -->

		<div id="debug">
			<?php debug($session->read()); ?>
			<?php echo $cakeDebug; ?>	
		</div> <!-- /debug -->

	</body>
</html>