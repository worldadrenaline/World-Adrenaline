<div class="activities view">
    <p><?php echo $html->link($operator['Operator']['name'], array('controller'=>'operators', 'action'=>'view', $operator['Operator']['id'])); ?></p>

    <h1><?php echo $activity['Activity']['name']; ?></h1>
    
    <h2>Activity Category</h2>
    <p><?php echo $activity['Activity']['activityType']; ?></p>


    <h2>Description</h2>
    <p><?php echo $activity['Activity']['description']; ?></p>

    <h2>Price</h2>
    <p>From <?php echo $activity['Activity']['currency']; ?> <?php echo $activity['Activity']['priceMin']; ?></p>

</div>
