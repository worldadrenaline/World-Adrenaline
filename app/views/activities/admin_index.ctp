<div class="activities index">
<h2><?php __('Activities');?></h2>
<p>
<?php
echo $paginator->counter(array(
'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
));
?></p>
<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('id');?></th>
	<th><?php echo $paginator->sort('operator_id');?></th>
	<th><?php echo $paginator->sort('name');?></th>
	<th><?php echo $paginator->sort('shortname');?></th>
	<th><?php echo $paginator->sort('description');?></th>
	<th><?php echo $paginator->sort('activityType');?></th>
	<th><?php echo $paginator->sort('activityType_id');?></th>
	<th><?php echo $paginator->sort('currency');?></th>
	<th><?php echo $paginator->sort('priceMin');?></th>
	<th><?php echo $paginator->sort('latitude');?></th>
	<th><?php echo $paginator->sort('longitude');?></th>
	<th><?php echo $paginator->sort('imageFile_1');?></th>
	<th><?php echo $paginator->sort('imageFile_2');?></th>
	<th><?php echo $paginator->sort('imageFile_3');?></th>
	<th><?php echo $paginator->sort('imageFile_4');?></th>
	<th><?php echo $paginator->sort('source');?></th>
	<th><?php echo $paginator->sort('modified');?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($activities as $activity):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $activity['Activity']['id']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['operator_id']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['name']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['shortname']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['description']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['activityType']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['activityType_id']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['currency']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['priceMin']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['latitude']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['longitude']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['imageFile_1']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['imageFile_2']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['imageFile_3']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['imageFile_4']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['source']; ?>
		</td>
		<td>
			<?php echo $activity['Activity']['modified']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $activity['Activity']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $activity['Activity']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $activity['Activity']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $activity['Activity']['id'])); ?>
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
		<li><?php echo $html->link(__('New Activity', true), array('action' => 'add')); ?></li>
	</ul>
</div>
