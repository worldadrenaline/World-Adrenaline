<div class="operators form">
<?php echo $form->create('Operator');?>
	<fieldset>
 		<legend><?php __('Edit Operator');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('city');
		echo $form->input('country_id');
		echo $form->input('stateProvince');
		echo $form->input('countryISO');
		echo $form->input('description');
		echo $form->input('type');
		echo $form->input('accountStatus');
		echo $form->input('activityType');
		echo $form->input('activity_type_id');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Operator.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $form->value('Operator.id'))); ?></li>
		<li><?php echo $html->link(__('List Operators', true), array('action' => 'index'));?></li>
	</ul>
</div>
