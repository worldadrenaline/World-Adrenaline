<div class="activities view">
    <p class="operator"><?php echo $html->link($operator['Operator']['name'], array('controller'=>'operators', 'action'=>'view', $operator['Operator']['id'])); ?></p>

    <h1><?php echo $activity['Activity']['name']; ?></h1>
    
    <p class="activityType"><?php echo $activity['Activity']['activityType']; ?></p>

    <p><?php echo $activity['Activity']['description']; ?></p>
    
    <div class="activityPrice">
        <p><?php __('From'); ?></p>
        <p class="price"><?php echo $activity['Activity']['currency']; ?> <?php echo $activity['Activity']['priceMin']; ?></p>
        <p class="perPerson"><?php __('per person');?></p>
    </div>
    
    <div class="booking_request"><?php echo $html->link('Book This Activity  >', 'http://kumutu.com/'.$activity['ActivityType']['shortname'].'/'.$activity['Activity']['shortname'].'#book-activity'); ?></div>
        <div class="booking-source"><?php __('at kumutu.com');?></div>



</div>
