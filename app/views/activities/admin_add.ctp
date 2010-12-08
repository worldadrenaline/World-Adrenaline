<div class="activities form">
<?php echo $form->create('Activity');?>
	<fieldset>
 		<legend><?php __('Add Activity');?></legend>
	<?php
		echo $form->input('operator_id');
		echo $form->input('name');
		echo $form->input('shortname');
		echo $form->input('description');
		echo $form->input('activityType');
		echo $form->input('activityType_id');
		echo $form->input('currency');
		echo $form->input('priceMin');
		echo $form->input('latitude');
		echo $form->input('longitude');
		echo $form->input('imageFile_1');
		echo $form->input('imageFile_2');
		echo $form->input('imageFile_3');
		echo $form->input('imageFile_4');
		echo $form->input('source');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('List Activities', true), array('action' => 'index'));?></li>
	</ul>
</div>
