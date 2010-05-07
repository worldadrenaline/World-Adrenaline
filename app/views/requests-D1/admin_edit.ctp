<div class="requests form">
<?php echo $form->create('Request');?>
	<fieldset>
 		<legend><?php __('Edit Request');?></legend>
	<?php
		echo $form->input('id');
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
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Request.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Request.id'))); ?></li>
		<li><?php echo $html->link(__('List Requests', true), array('action' => 'index'));?></li>
	</ul>
</div>
