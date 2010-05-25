<div class="header_panel"><div class="header_menu">


	<div class="activityList">
		<ul class="activityList">
			<?php $activityTypes = $this->requestAction('activityTypes/index/sort:name/direction:asc/limit:200'); ?>
			<?php $i = 1; ?>
			<?php foreach ($activityTypes as $activityType):?>
					<li class="activityLink"><?php echo $html->link($activityType['ActivityType']['name'],'/activity/'.$activityType['ActivityType']['shortname']); ?></a></li>
					<?php if ($i++ % 12 == 0) {
				        echo '</ul><ul class="activityList">';
					} ?>
			<?php endforeach; ?>
		</ul>
		
	</div> <!-- activityList -->
	<br />

</div></div> <!-- //header_panel -->