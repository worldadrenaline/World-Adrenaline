<div class="operators view">

	<?php // if ($success_email) { echo '<div class="notice">'. $success_email .'></div>'; } ?> 	
	<h1><?php echo $operator['Operator']['name']; ?></h1>
	
	<?php if ($operator['Operator']['source'] == 'kumutu') : ?>
    	<div class="trusted"><?php echo "Trusted Operator"; ?></div>
	<?php endif; ?>	
		
		<div class="profile">
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
				
        <?php //Display a sendRequest form if the operator has an email address 
        if ($operator['Operator']['hasEmail'] == '1') :
        ?>
        
            <div class="request">
            
                <h2>Make a booking request with <?php echo $operator['Operator']['name']; ?> </h2>	
                <?php 
                echo $form->create('Request');
                echo $form->input('name', array('label'=>'Name <span>*</span>', 'size'=>'35'));
                echo $form->input('email', array('label'=>'Email <span>*</span>', 'size'=>'35'));
                echo $form->input('phone', array('label'=>'Phone <span>*</span>'));
                echo '<div class="weak">e.g. +44 (0)20 1234 5678</div>';
                echo $form->input('date', array('type' => 'date', 'dateFormat'=>'DMY', 'minYear' =>  date('Y'), 'maxYear' => date('Y') + 3, 'label'=>'Activity Date <span>*</span>'));
                echo $form->input('participantsNumber', array('type'=>'select', 'options'=>array ('1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5','6'=>'6','7'=>'7','8'=>'8','9'=>'9','10+'=>'10'), 'label'=>'Number of Participants <span>*</span>','showEmpty'=>'false', 'selected'=>'1'));
                echo '<div class="weak">The number of people that will take place in this activity on the given date</div>';
                echo $form->input('message', array('label'=>'Additional Information <span>*</span>', 'type' => 'textarea', 'cols'=>'65'));
                echo '<div class="weak">Do you have any additional requirements or comments?</div>';
                echo $form->input('isTerm', array('label'=>'I agree with the <a href=/termsofuse>Terms of Use</a> <span>*</span>', 'type' => 'checkbox'));
                echo $form->input('subject', array('type'=>'hidden', 'value'=>'Information request from Adventicus.com'));
                echo $form->input('operator_id', array('type'=>'hidden', 'value'=>$operator['Operator']['id']));
                echo $form->input('operatorName', array('type'=>'hidden', 'value'=>$operator['Operator']['name']));
                
                //create the reCAPTCHA form.
                $recaptcha->display_form('echo');
                
                echo $form->submit('submit.png');
                echo $form->end();
            
            ?>
            </div>  <!-- /request -->
        <?php endif; ?>
				
</div> <!-- /operators view -->

<?php //echo $this->element('banners'); ?>