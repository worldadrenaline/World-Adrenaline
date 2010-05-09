<div class="requests index">
<h2><?php __('Requests List');?></h2>
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
	<th><?php echo $paginator->sort('email');?></th>
	<th><?php echo $paginator->sort('phone');?></th>
	<th><?php echo $paginator->sort('date');?></th>
	<th><?php echo $paginator->sort('participantsNumber');?></th>
	<th><?php echo $paginator->sort('isTerm');?></th>
	<th><?php echo $paginator->sort('message');?></th>
	<th><?php echo $paginator->sort('subject');?></th>
	<th><?php echo $paginator->sort('operatorID')?></th>
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($requests as $request):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $request['Request']['id']; ?>
		</td>
		<td>
			<?php echo $request['Request']['name']; ?>
		</td>
		<td>
			<?php echo $request['Request']['email']; ?>
		</td>
		<td>
			<?php echo $request['Request']['phone']; ?>
		</td>
		<td>
			<?php echo $request['Request']['date']; ?>
		</td>
		<td>
			<?php echo $request['Request']['participantsNumber']; ?>
		</td>
		<td>
			<?php echo $request['Request']['isTerm']; ?>
		</td>
		<td>
			<?php echo $request['Request']['message']; ?>
		</td>
		<td>
			<?php echo $request['Request']['subject']; ?>
		</td>
		<td>
			<?php echo $request['Request']['operatorID']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $request['Request']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $request['Request']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $request['Request']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $request['Request']['id'])); ?>
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
		<li><?php echo $html->link(__('New Request', true), array('action' => 'add')); ?></li>
	</ul>
</div>
