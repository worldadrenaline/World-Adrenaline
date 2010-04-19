<div class="countries form">
<?php echo $form->create('Country');?>
	<fieldset>
 		<legend><?php __('Add Country');?></legend>
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
		<li><?php echo $html->link(__('List Countries', true), array('action' => 'index'));?></li>
	</ul>
</div>
