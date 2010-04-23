<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title_for_layout; ?> - Adventicus</title>
		<meta name="Description" content="Adventure activity listings worldwide. Find an adventure activity globally and make a request." />
		<meta name="Keywords" content="adventure, travel, adventure travel, extreme sports, extreme, adventure sport, adventure holiday, travel, sport, holidays, tour, adventicus" />
		<meta name="robots" content="index,follow" />

		<?php echo $html->meta('icon', $html->url('/img/favicon.png')); ?>
		<?php // <link rel="apple-touch-icon" href="/img/favicon-iphone.png" /> ?>

		<?php 
			echo $html->css('screen', 'stylesheet', 'media="screen"', true);
			echo $html->css('adventicus','stylesheet', 'media="screen"', true); 
			//echo $html->css('mobile', 'stylesheet', 'media="mobile"', true); 
			//echo $html->css('print', 'stylesheet', 'media="print"', true); 
			echo $scripts_for_layout;
		
			if(!empty($ajax)) {
			    echo $javascript->link('prototype');
			} 
		?> 
		
		
	</head>
	<body>
		<p id="skipnav" class="hidden"><a href="#content">Go to content</a></p>
		<div id="container">
			<div id="header">
			</div> <!-- /header -->
			<div class="top_panel">
				<div class="sub_container">
					<div class="adven_logo"><a href="/"><img src="/img/logo-D3.png" alt="Logo" id="logo" /></a></div>
					<div class="adven_message"><span>Adventicus</span> is the largest directory of adventure activity operators on the web. Whether you're a climber, diver, white-water rafter, hiker, mountain biker, or paraglider<span>...find your adventure now!</span></div>
				</div> <!-- /sub_container -->
				
				
				<!-- Begin session-flash  -->
				<?php $session->flash(); ?>
				<!-- End session-flash -->
				
			</div> <!-- /top_panel -->

			<div id="nav">
			</div> <!-- /nav -->

			<script type="text/javascript" >
			function chng(obj)
			{
			alert(obj)
			obj='text-decoration:underline';
			}
			</script>


			<div id="content">


	
				<!-- Begin content_for_layout -->
				<?php echo $content_for_layout; ?>
				<!-- End content_for_layout -->

				<div class="clear"></div>

			</div> <!-- /content -->

			<div id="footer">
				<div id="footer-links">
					<h2>Site Links</h2>
					<ul>
						<li class="first"><?php echo $html->link(__('About', true), '/about'); ?></li>
						<li><?php echo $html->link(__('Contact', true), '/contact'); ?></li>
					</ul>
				</div> <!-- /footerlinks -->
				<div id="footer-copyright">
					&copy; Adventicus <?php echo date('Y'); ?>
				</div>
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