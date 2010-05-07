<div class="requests form">
<?php echo $form->create('Request');?>
	<fieldset>
 		<legend><?php __('Add Request');?></legend>
	<?php
		echo $form->input('name');
		echo $form->input('email');
		echo $form->input('phone');
		echo $form->input('date');
		echo $form->input('participantsNumber');
		echo $form->input('isTerm');
		echo $form->input('message');
		echo $form->input('subject');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Requests', true), array('action' => 'index'));?></li>
	</ul>
</div>
