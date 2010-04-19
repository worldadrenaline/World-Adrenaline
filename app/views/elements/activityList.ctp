<div class="activityTypes index">
<h2><?php __('ActivityTypes');?></h2>

<table cellpadding="0" cellspacing="0">
<tr>
	<th><?php echo $paginator->sort('ActName');?></th>
</tr>

<?php
$i = 0;
foreach ($activityTypes as $activityType):
	$class = null;
	if ($i++ % 2 == 0) {
		$class = ' class="altrow"';
	}
?>
	<tr<?php echo $class;?>>
		<td>
			<?php echo $activityType['ActivityType']['ActName']; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>

</div>
