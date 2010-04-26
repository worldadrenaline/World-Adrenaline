<div class="activityTypes view">
<h2><?php  __('ActivityType');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $activityType['ActivityType']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('name'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $activityType['ActivityType']['name']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<ul>
		<li><?php echo $html->link(__('Edit ActivityType', true), array('action' => 'edit', $activityType['ActivityType']['id'])); ?> </li>
		<li><?php echo $html->link(__('Delete ActivityType', true), array('action' => 'delete', $activityType['ActivityType']['id']), null, sprintf(__('Are you sure you want to delete # %s?', true), $activityType['ActivityType']['id'])); ?> </li>
		<li><?php echo $html->link(__('List ActivityTypes', true), array('action' => 'index')); ?> </li>
		<li><?php echo $html->link(__('New ActivityType', true), array('action' => 'add')); ?> </li>
	</ul>
</div>
