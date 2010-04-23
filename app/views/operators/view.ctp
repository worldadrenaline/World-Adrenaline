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
			<?php // if ($operator['Operator']['City']) { echo $operator['Operator']['City'].","; } ?>
			<?php if ($operator['Operator']['StateProvince']) { echo $operator['Operator']['StateProvince']."</p><p>"; } ?>
			<?php if ($operator['Operator']['Country']) { echo $operator['Operator']['Country'];} ?>
			</p>
			
			<?php if ($operator['Operator']['ActivityType']) { ?>
				<h2>Activities offered</h2>
				<?php echo "<p>".$operator['Operator']['ActivityType']."</p>"; ?>
			<?php } ?>
			
			<?php if ($operator['Operator']['Description']) { ?>
				<h2>Description</h2>
				<?php echo "<p>".$operator['Operator']['Description']."</p>"; ?>
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
	
				<?php echo $this->element('contacts/add'); ?>
		
			
			<?php 
			/*
				<div class="contact">
		
				<h2>Request more information from this operator </h2>
			
			    echo $form->create('Contact');
			    //echo $form->create('Contact', array('action' => 'sendContactRequest'));
			    //echo $form->create(null, array('url' => array('controller' => 'operators', 'action' => 'sendContactRequest')));
			    //echo $form->create('Contact', array('url' => array('controller' => 'operators', 'action' => 'sendContactRequest')));

			    
   				echo $form->input('name', array('label'=>'Name <span>*</span>', 'size'=>'35'));
   				echo $form->input('email', array('label'=>'Email <span>*</span>', 'size'=>'35'));
   				echo $form->input('phone', array('label'=>'Phone <span>*</span>'));
				echo '<div class="weak">The number of people that will take place in this activity on the given date</div>';
				echo $form->input('date', array('type' => 'date', 'dateFormat'=>'DMY', 'minYear' =>  date('Y'), 'maxYear' => date('Y') + 3, 'label'=>'Activity Date <span>*</span>'));
				echo $form->input('participantsNumber', array('type'=>'select', 'options'=>array ('1','2','3','4','5','6','7','8','9','10+'), 'label'=>'Number of Participants <span>*</span>'));
				echo '<div class="weak">The number of people that will take place in this activity on the given date</div>';
				echo $form->input('message', array('label'=>'Additional Information <span>*</span>', 'type' => 'textarea', 'cols'=>'65'));
				echo '<div class="weak">Do you have any additional requirements or comments?</div>';
				echo $form->input('isTerm', array('label'=>'I agree with the <a href=/termsofuse>Terms of Use</a> <span>*</span>', 'type' => 'checkbox'));
   				echo $form->input('subject', array('type'=>'hidden', 'value'=>'Information request from Adventicus'));

				//create the reCAPTCHA form.
				echo '<div class="recaptcha">';
				//$recaptcha->display_form('echo');
				echo "</div>";

				//hide an e-mail address
				//$recaptcha->hide_mail("someuser@somdomain.tld",'echo'); 
				
			    echo $form->submit('submit.png');
				echo $form->end();
				*/
			?>
			
			
			
			


			
			
			
			<?php /* Old Agile Form
			
			<form id="form1" name="form1" method="post" action="http://dev.kumutu.com/api/prospects/email.xml?apikey=17604162604ae6ffa3636d46.73439478" onSubmit="return checkForm();">
			<input type="hidden" name="_method" value="POST" />
			<input type="hidden" name="data[Prospect][id" id="ProspectId" value="<?=$operator['Operator']['id']?>" />
			<input type="hidden" name="opEmail" id="id" value="<?=$operator['Operator']['Email']?>" />
			<!--<input type="hidden" name="opName" id="id" value="<?=$operator['Operator']['name']?>" />
			<input type="hidden" name="action" id="id" value="email" />-->
			<div class="con_text">Name:<span>*</span></div>
			<div class="con_box_bg"><label><input type="text" name="data[Contact][name]" id="ContactName" /></label></div>
			<div class="con_text">Email:<span>*</span></div>
			<div class="con_box_bg"><label><input type="text" style="width:200px;" name="data[Contact][email]" id="ContactEmail" /></label></div>
			<div class="con_text">Phone:<span>*</span></div>
			<div class="con_box_bg"><label><input type="text" name="data[Contact][phone]" id="ContactPhone" /></label></div>
			<div class="con_text_norm">Include the country code.</div>
			<div class="con_text">Activity Date:<span>*</span></div>
			<div class="con_box_bg">
			  <select name="data[Contact][date][day]" id="ContactDay"> 
			    <option value="">Day</option>
				<option value="01">1</option>
				<option value="02">2</option>
				<option value="03">3</option>
				<option value="04">4</option>
				<option value="05">5</option>
				<option value="06">6</option>
				<option value="07">7</option>
				<option value="08">8</option>
				<option value="09">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
			  </select>
			  <select name="data[Contact][date][month]" id="ContactMonth"  style="width:80px;">
			    <option value="">Month</option>
				<option value="01">January</option>
				<option value="02">February</option>
				<option value="03">March</option>
				<option value="04">April</option>
				<option value="05">May</option>
				<option value="06">June</option>
				<option value="07">July</option>
				<option value="08">August</option>
				<option value="09">September</option>
				<option value="10">October</option>
				<option value="11">November</option>
				<option value="12">December</option>
			  </select>
			  <select name="data[Contact][date][year]" id="ContactYear">
			    <option value="">Year</option>	
				<option value="2013">2013</option>
				<option value="2012">2012</option>
				<option value="2011">2011</option>
				<option value="2010" selected="selected">2010</option>
			  </select>
			</div>
			<div class="con_text">Number of Participants:<span>*</span></div>
			<div class="con_box_bg">
				<label>
				  <select name="data[Contact][participantsNumber]" class="form-select required" id="ContactParticipantsNumber"><option value="">select...</option><option value="1" selected="selected">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10+">10+</option></select>
				 </label>
			</div>
			<div class="con_text_norm">The number of people that will take place in this activity on the given date</div>
			<div class="con_text">Additional Information:<span>*</span></div>
			<div class="con_box_bg"><textarea name="data[Contact][message]" id="ContactMessage" style="width:580px; height:80px;" cols="" rows=""></textarea></div>
			<div class="con_text_norm">Do you have any additional requirements or comments?</div>
			
			<div class="con_text">Terms and Conditions:<span>*</span></div>
			<div class="terms_text">
			  <input type="checkbox" name="data[Contact][isTerm]" id="ContactIsTerm" />
			  I have read and agree to the <a href="#">Terms and Conditions for Booking </a></div>
			 
			<div>Verify :</div>	
			
			<?php /* Old Agile Captcha  
			<div><img src="<?php echo $captcha_image_url; ?>" id="captcha" alt="CAPTCHA Image" /></div>
			<div><input type="text" name="data[Contact][captcha_code]" id="captcha_code" size="10" maxlength="6" value="" />&nbsp;&nbsp;<a href="#" onclick="document.getElementById('captcha').src = '/operators/securimage/' + Math.random(); return false"> Reload Image</a></div>
			<div>&nbsp;</div>
			<div style="color:red;"><?php echo $error_captcha; ?></div>
			<div style="color:green;"><?php echo $success_captcha; ?></div>
			
			<div><a href="#" onclick="return checkForm();document.form1.submit()"> <img src="/img/submit.png" width="106" height="26" alt="code" /></a></div></div>	
			</form>

			*/ ?>
			
			&nbsp;
		</div> <!-- contact_bg -->
	
	</div>
</div> <!-- content_left_panel -->

	<?php echo $this->element('sidebar'); ?>

</div> <!-- sub_container -->
</div> <!-- /content_panel -->

	<?php echo $this->element('banners'); ?>
