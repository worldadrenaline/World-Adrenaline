
<div class="request">
	
		<?php if(!empty($this->data['Request']['operatorID'])){$operatorID = $this->data['Request']['operatorID'];} ?>
	
		<h2>Request more information from this operator  </h2>	
		<?php 
		    echo $form->create('Request');
		    //echo $form->create('Request', array('url' => array('controller' => 'operators', 'action' => 'sendRequest')));
		    
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
			echo $form->input('operatorID', array('type'=>'hidden', 'value'=>$operatorID));

			//create the reCAPTCHA form.

		    echo $form->submit('submit.png');
			echo $form->end();

			//echo $captchaTool->show();

		?>
</div>  <!-- /request -->
