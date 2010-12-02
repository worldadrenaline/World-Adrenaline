<markers>
<?php 
    foreach ($operators as $key => $operator) :
        //$lat = $operator['Operator']['latitude'];
        //$lng = $operator['Operator']['longitude'];
        $name = h($operator['Operator']['name']);
        $city = $operator['Operator']['city'];
        $country = $operator['Country']['name'];
        $activityType = trim($operator['ActivityType']['name']);
        $id = $operator['Operator']['id'];
        //$slug = $operator['Operator']['slug'];
        $description = $text->truncate(h(strip_tags($operator['Operator']['description'])), 100, '...', false);
        //$image = h($operator['Photo'][0]['filename']);

		if(!empty($operator['ActivityType']['element'])) {
		    $element = $operator['ActivityType']['element'];
		} else {
			$element = "MISC";
		}

?>
    <marker name="<?php echo $name;?>" <?php /* lat="<?php echo $lat; ?>" lng="<?php echo $lng; ?>" url="<?php echo '/'.$slug;?>" */ ?> city="<?php echo $city; ?>" country="<?php echo $country; ?>" element="<?php echo $element; ?>" activityType="<?php echo $activityType; ?>" type="operator" description="<?php echo $description; ?>" <?php /* image="<?php echo $image; ?>" */ ?>/> 
    <?php //print_r($operator); ?>

    <?php endforeach; ?>
</markers>