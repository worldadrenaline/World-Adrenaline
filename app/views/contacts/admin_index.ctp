<div class="contacts index">
<h2><?php __('Contact Requests List');?></h2>
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
	<th class="actions"><?php __('Actions');?></th>
</tr>
<?php
$i = 0;
foreach ($contacts as $contact):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $contact['Contact']['id']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['name']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['email']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['phone']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['date']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['participantsNumber']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['isTerm']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['message']; ?>
		</td>
		<td>
			<?php echo $contact['Contact']['subject']; ?>
		</td>
		<td class="actions">
			<?php echo $html->link(__('View', true), array('action' => 'view', $contact['Contact']['id'])); ?>
			<?php echo $html->link(__('Edit', true), array('action' => 'edit', $contact['Contact']['id'])); ?>
			<?php echo $html->link(__('Delete', true), array('action' => 'delete', $contact['Contact']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $contact['Contact']['id'])); ?>
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
		<li><?php echo $html->link(__('New Contact', true), array('action' => 'add')); ?></li>
	</ul>
</div>
