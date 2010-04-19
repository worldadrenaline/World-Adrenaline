<div class="operators form">
<?php echo $form->create('Operator');?>
	<fieldset>
 		<legend><?php __('Edit Operator');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('name');
		echo $form->input('Phone');
		echo $form->input('Email');
		echo $form->input('City');
		echo $form->input('StateProvince');
		echo $form->input('CountryID');
		echo $form->input('Country');
		echo $form->input('Description');
		echo $form->input('Type');
		echo $form->input('AccountStatus');
		echo $form->input('ActivityType');
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
