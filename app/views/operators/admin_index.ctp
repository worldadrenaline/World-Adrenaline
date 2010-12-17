<div class="operators index">
<h2><?php __('Operators');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('Phone');?></th>
	<th><?php echo $paginator->sort('Email');?></th>
	<th><?php echo $paginator->sort('City');?></th>
	<th><?php echo $paginator->sort('StateProvince');?></th>
	<th><?php echo $paginator->sort('CountryID');?></th>
	<th><?php echo $paginator->sort('Country');?></th>
	<th><?php echo $paginator->sort('Description');?></th>
	<th><?php echo $paginator->sort('Type');?></th>
	<th><?php echo $paginator->sort('AccountStatus');?></th>
	<th><?php echo $paginator->sort('ActivityType');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($operators as $operator):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $operator['Operator']['id']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['name']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['Phone']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['Email']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['City']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['StateProvince']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['CountryID']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['Country']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['Description']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['Type']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['AccountStatus']; ?>
		</td>
		<td>
			<?php echo $operator['Operator']['ActivityType']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $operator['Operator']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $operator['Operator']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $operator['Operator']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $operator['Operator']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
</div>
<div class="paging">
	<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
 | 	<?php echo $paginator->numbers();?>
	<?php echo $paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('New Operator', true), array('action' => 'add')); ?></li>
	</ul>
</div>
