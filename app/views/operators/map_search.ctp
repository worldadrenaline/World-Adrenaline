<div class="operators mapSearch">
<?php
    /* 
    * This is a simple proof of concept for creating our search by Google map implementation
    */
    
    //TODO: add clusterer and customize infowindow
    //TODO: load markers via jQuery after page loads
?>

<?php $this->pageTitle = 'Search by Map'; ?>
<?php //$this->set('title_for_layout', 'Search by Map'); ?>

<?php 
    $javascript->link(array(
        'jquery-1.4.2.min',
        'wa', 
        'WA.mapSearch',
        'http://maps.google.com/maps/api/js?sensor=true'
    ), false);
?>


<div id="searchMap">
    <div id="title">
        <h1 class="grunge">Search by map</h1> 
        <p class="weak">Find adventure providers worldwide</p>
    </div>
    <div id="legend">
        <span class="air"><?php __('Air'); ?></span>
        <span class="water"><?php __('Water'); ?></span>
        <span class="earth"><?php __('Earth'); ?></span>
        <span class="snow"><?php __('Snow'); ?></span>
    </div>
    <div id="mapFilters"></div>
	<div id="map-loader"><?php echo $html->image('ajax-mini-loader.gif'); ?></div>   
    <div id="map" style="width:100%; height:500px;"></div>
</div>

</div> <!-- /operators view -->