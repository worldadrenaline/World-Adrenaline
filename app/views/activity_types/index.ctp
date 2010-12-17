<div class="activityTypes index">
	<h2>Choose your adventure activity category</h2>
	<ul class="activityList">
		<?php $i = 1; ?>
		<?php foreach ($activityTypes as $activityType):?>
				<li class="activityLink"><?php echo $html->link($activityType['ActivityType']['name'],'/activity/'.$activityType['ActivityType']['shortname']); ?></a><span class="weak"><?php echo $activityType['ActivityType']['count']; ?></span></li>
				<?php if ($i++ % 16 == 0) {
			        echo '</ul><ul class="activityList">';
				} ?>
		<?php endforeach; ?>
	</ul>
</div>
