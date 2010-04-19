<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo $title_for_layout; ?> - Adventicus</title>
		<meta name="Description" content="Adventure activity listings worldwide. Find an adventure activity globally and make a request." />
		<meta name="Keywords" content="adventure, travel, adventure travel, extreme sports, extreme" />
		<meta name="robots" content="index,follow" />

		<?php echo $html->meta('icon', $html->url('/img/favicon.png')); ?>
		<?php // <link rel="apple-touch-icon" href="/img/favicon-iphone.png" /> ?>

		<?php 
			echo $html->css('screen', 'stylesheet', 'media="screen"', true); 
			//echo $html->css('mobile', 'stylesheet', 'media="mobile"', true); 
			//echo $html->css('print', 'stylesheet', 'media="print"', true); 

			//echo $javascript->link(array('jquery-1.3.2.min', 'jquery-ui-1.7.2.custom.min')); 
			//echo $javascript->link(array('cufon-yui.js', 'libs/Capture_it_400.font.js', 'kumutu'));
			
			echo $scripts_for_layout;
		?>
	</head>
	<body id="top">

		<p id="skipnav" class="hidden"><a href="#content">Go to content</a></p>

		<div id="container">

			<div id="header">
			</div> <!-- /header -->

			<div id="nav">
			</div> <!-- /nav -->


			<div id="content">

<!-- Begin session-flash  -->

				<?php // $session->flash('auth'); ?>
				<?php $session->flash(); ?>

<!-- End session-flash -->

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
						<li><?php echo $html->link(__('Jobs', true), '/jobs'); ?></li>
						<li><?php echo $html->link(__('Contact', true), '/contact'); ?></li>
					</ul>
				</div> <!-- /footerlinks -->
				<?php /*
				<div id="footer-copyright">
					&copy; KumutuLabs <?php echo date('Y'); ?>
				</div>
				*/ ?>
			</div> <!-- /footer -->

		</div> <!-- /container -->

		<div id="ajax-error-dialog" title="<?php __('ERROR'); ?>">
			<!--  <p><?php //__('There has been an error with an AJAX request, the server responded with the following error:'); ?></p> -->
			<p id="ajax-error-response"></p>
		</div> <!-- /ajax-error-dialog -->


		<!-- scripts -->

		<script type="text/javascript">Cufon.now();</script>
		<?php echo $this->element('layout/scripts'); ?>

		<!-- /scripts -->


		<div id="debug">
			<?php debug($session->read()); ?>
			<?php echo $cakeDebug; ?>	
		</div> <!-- /debug -->

	</body>
</html>