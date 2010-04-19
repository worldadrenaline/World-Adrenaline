<div class="countries form">
<?php echo $form->create('Country');?>
	<fieldset>
 		<legend><?php __('Edit Country');?></legend>
	<?php
		echo $form->input('id');
		echo $form->input('RegionID');
		echo $form->input('CountryName');
	?>
	</fieldset>
<?php echo $form->end('Submit');?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Delete', true), array('action' => 'delete', $form->value('Country.id')), null, sprintf(__('Are you sure you want to delete country %s?', true), $form->value('Country.id'))); ?></li>
		<li><?php echo $html->link(__('List Countries', true), array('action' => 'index'));?></li>
	</ul>
</div>
