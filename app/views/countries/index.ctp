<div class="countries index">
	<h2>Choose a country for adventure providers</h2>
	<ul class="countryList">
		<?php $i = 1; ?>
		<?php foreach ($countries as $country):?>
				<li class="countryLink"><?php echo $html->link($country['Country']['name'],'/operators/index/country:'.$country['Country']['shortname']); ?></a><span class="weak"><?php echo $country['Country']['count']; ?></span></li>
				<?php if ($i++ % 58 == 0) {
			        echo '</ul><ul class="countryList">';
				} ?>
		<?php endforeach; ?>
	</ul>
</div>
