<div class="activityTypes form">
<?php echo $form->create('ActivityType');?>
	<fieldset>
 		<legend><?php __('Edit ActivityType');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('ActivityType.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('ActivityType.id'))); ?></li>
		<li><?php echo $html->link(__('List ActivityTypes', true), array('action' => 'index'));?></li>
	</ul>
</div>
