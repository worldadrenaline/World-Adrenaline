<div class="activityTypes form">
<?php echo $form->create('ActivityType');?>
	<fieldset>
 		<legend><?php __('Add ActivityType');?></legend>
	<?php
		echo $form->input('ActName');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List ActivityTypes', true), array('action' => 'index'));?></li>
	</ul>
</div>
