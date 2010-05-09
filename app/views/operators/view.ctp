<!-- content_panel -->

<div class="content_panel">
<div class="sub_container">
<div class="content_left_panel">

	<?php // if ($success_email) { echo '<div class="notice">'. $success_email .'></div>'; } ?> 	
	<h1><?php echo $operator['Operator']['name']; ?></h1>
	
	<div class="content_bg">
		
		<div class="sub_po_bg">
			<h2>Location</h2>
			<p>
						
			<?php //if ($operator['Operator']['city']) { echo $operator['Operator']['city'].","; } ?>
			<?php if ($operator['Operator']['stateProvince']) { echo $operator['Operator']['stateProvince']."</p><p>"; } ?>
			<?php if ($operator['Operator']['countryISO']) { echo $operator['Country']['name']; } ?>

			</p>
			
			<?php if ($operator['Operator']['activityType']) { ?>
				<h2>Activities offered</h2>
				<?php echo "<p>".$operator['Operator']['activityType']."</p>"; ?>
			<?php } ?>
			
			<?php if ($operator['Operator']['description']) { ?>
				<h2>Description</h2>
				<?php echo "<p>".$operator['Operator']['description']."</p>"; ?>
			<?php } ?>
			
			<div class="googleReviews">
				<h2>Reviews</h2>
				<!-- START Google Friends Connect Rating -->
				<!-- Include the Google Friend Connect javascript library. -->
				<script type="text/javascript" src="http://www.google.com/friendconnect/script/friendconnect.js"></script>
				<!-- Define the div tag where the gadget will be inserted. -->
				<div id="div-6020171846287259166" style="width:282px;border:0px solid #cccccc;"></div>
				<!-- Render the gadget into a div. -->
				<script type="text/javascript">
				var skin = {};
				skin['BORDER_COLOR'] = '#cccccc';
				skin['ENDCAP_BG_COLOR'] = '#e0ecff';
				skin['ENDCAP_TEXT_COLOR'] = '#333333';
				skin['ENDCAP_LINK_COLOR'] = '#0000cc';
				skin['ALTERNATE_BG_COLOR'] = '#ffffff';
				skin['CONTENT_BG_COLOR'] = '#ffffff';
				skin['CONTENT_LINK_COLOR'] = '#0000cc';
				skin['CONTENT_TEXT_COLOR'] = '#333333';
				skin['CONTENT_SECONDARY_LINK_COLOR'] = '#7777cc';
				skin['CONTENT_SECONDARY_TEXT_COLOR'] = '#666666';
				skin['CONTENT_HEADLINE_COLOR'] = '#333333';
				skin['DEFAULT_COMMENT_TEXT'] = '- add your review here -';
				skin['HEADER_TEXT'] = 'Ratings';
				skin['POSTS_PER_PAGE'] = '5';
				google.friendconnect.container.setParentUrl('/' /* location of rpc_relay.html and canvas.html */);
				google.friendconnect.container.renderReviewGadget(
				 { id: 'div-6020171846287259166',
				   site: '17783130226979614319',
				   'view-params':{"disableMinMax":"false","scope":"ID","docId":"<?php echo $operator['Operator']['id']; ?>","startMaximized":"true"}
				 },
				  skin);
				</script>
				<!-- END Google Friends Connect Rating -->		
			</div> <!-- /googleReviews -->
		</div> <!-- /sub_to_bg -->
	
				<?php echo $this->element('requests/add', array('operatorID' => $operator['Operator']['id'])); ?>	
	
	</div>
</div> <!-- content_left_panel -->

	<?php echo $this->element('sidebar'); ?>

</div> <!-- sub_container -->
</div> <!-- /content_panel -->

	<?php echo $this->element('banners'); ?>






