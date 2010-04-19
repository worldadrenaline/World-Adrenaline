<?php if (isset($_SERVER['HTTP_HOST']) && (strpos($_SERVER['HTTP_HOST'], 'local-adventicus') === false)): //Hide for dev environments ?>
<!-- Google Analytics -->
<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
	try {
		var pageTracker = _gat._getTracker("UA-2845737-11");
		pageTracker._trackPageview();
	} catch(err) {}
</script>
<!-- /Google Analytics -->
<?php endif; ?>