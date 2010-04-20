<div class="contacts form">
<?php echo $form->create('Contact');?>
	<fieldset>
 		<legend><?php __('Add Contact');?></legend>
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
		<li><?php echo $html->link(__('List Contacts', true), array('action' => 'index'));?></li>
	</ul>
</div>
