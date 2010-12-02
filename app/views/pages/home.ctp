<div id="home">
	<?php // echo $this->element('search'); ?>
	
	<div id="welcome">
        <h1><?php __('Book your next adventure activity');?></h1>
        <p><?php __('At World Adrenaline you will find the largest selection of over '); echo $totalOperators; __(' adventure activities from the four corners of the globe. Come face-to-face with the forces of nature and have a new, exhilarating experience. Escape from real life and find yourself in your next adventure. Your next big challenge is just a click away.'); ?></p> 
	</div>

    <div class="activityTypes index">
        <div id="activityList">
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
    	</div> <!-- activityList -->
    </div>


	<div class="notice">Would you like to be added to this list? Sign up at <a href="http://kumutu.com/suppliers/register">Kumutu.com</a></div>
	<?php echo $this->element('bannersHome'); ?>

</div> <!-- /home -->