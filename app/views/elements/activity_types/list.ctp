<div class="activityList">
	<ul class="activityList">
		<?php $activityTypes = $this->requestAction('activityTypes/index/sort:ActName/direction:asc/limit:200'); ?>
		
		<?php $i = 1; ?>
		<?php foreach ($activityTypes as $activityType):?>
				<li class="activityLink"><a href="/operators/index/<?php echo $activityType['ActivityType']['ActName']; ?>"><?php echo $activityType['ActivityType']['ActName']; ?></a></li>
				<?php if ($i++ % 12 == 0) {
			        echo '</ul><ul class="activityList">';
				} ?>
		<?php endforeach; ?>
	</ul>
	
</div> <!-- activityList -->
<br />
