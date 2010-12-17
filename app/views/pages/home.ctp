<div id="home">
	<?php // echo $this->element('search'); ?>
	
	<div id="welcome">
        <h1><?php __('Book your next adventure activity');?></h1>
        <p><?php __('At World Adrenaline you will find the largest selection of over '); echo $totalOperators; __(' adventure activities from the four corners of the globe. Come face-to-face with the forces of nature and have a new, exhilarating experience. Escape from real life and find yourself in your next adventure. Your next big challenge is just a click away.'); ?></p> 
	</div>

    <div class="filter">
        <h4 class="weak">Find an adventure operator</h4>
        <?php
            echo $form->create(null, array('url' => array('controller' => 'operators', 'action' => 'index')));
            echo $form->input('field', array('type'=>'select', 'options'=>array(
               'name'=>'Name', 'city' => 'City', 'stateProvince' => 'State', 'description' => 'Description'
            	), 'empty'=>'Display all', 'default'=>'name', 'label'=>'', 'div'=>'input field')
            );
            echo $form->input('q', array('type'=>'text', 'label'=>'', 'div'=>'input q', 'size'=>40));
            echo $form->input('country', array('type'=>'select', 'options'=>$countries, 'empty'=>'all countries', 'label'=>'', 'div'=>'input country'));
            echo $form->input('activityType', array('type'=>'select', 'options'=>$activityTypes, 'empty'=>'all activities', 'label'=>'', 'div'=>'input activityType'));
            echo $form->end('Search');
        ?>
    </div>

    <div class="activityTypes index">
        <div id="activityList">
    		<h2>Browse by adventure sport</h2>
    		<ul class="activityList">
    			<?php $i = 1; ?>
    			<?php foreach ($activityTypesCount as $activityType):?>
    					<li class="activityLink"><?php echo $html->link($activityType['ActivityType']['name'],'/activity/'.$activityType['ActivityType']['shortname']); ?></a><span class="weak"><?php echo $activityType['ActivityType']['count']; ?></span></li>
    					<?php if ($i++ % 16 == 0) {
    				        echo '</ul><ul class="activityList">';
    					} ?>
    			<?php endforeach; ?>
    		</ul>
    	</div> <!-- activityList -->
    </div>
    
    <div id="operatorList" class="featuredOperators">
        <h2>Featured operators</h2>
        <ul>
            <?php foreach ($featuredOperators as $operator): ?>
    			 <li class="<?php echo $operator['Operator']['source']; ?>">
                      <?php if ($operator['Operator']['source'] == 'kumutu') : ?>
                         <div class="trusted"><?php echo "Trusted Operator"; ?></div>
                     <?php endif; ?>
                     
    			     <?php if (isset($operator['Operator']['imageFile_1'])) : ?>
    			         <div class="image"><?php echo $html->image($operator['Operator']['imageFile_1']); ?></div>
			         <?php endif; ?>
    			 
        			 <h3><?php echo $html->link($operator['Operator']['name'], array('controller' => 'operators','action' => 'view','id' => $operator['Operator']['id'],'shortname' => Inflector::slug($operator['Operator']['name']))); ?></a></h3>
        			 <div class="location"> 
            			 <?php if (isset($operator['Operator']['city']) && $operator['Operator']['city']!='') { echo substr($operator['Operator']['city'],0,50).', '; }?>
            			 <?php if (isset($operator['Operator']['stateProvince']) && $operator['Operator']['stateProvince']!='') { echo substr($operator['Operator']['stateProvince'],0,50).', '; }?>
    
        				 <?php echo $operator['Country']['name']; ?>
        			 </div>
        			 <div class="description">
        			 <?php if ($operator['Operator']['description']!='') { echo substr($operator['Operator']['description'],0,100).'...'; }?>
        			 </div>	
    			 </li>            
            <?php endforeach; ?>
        </ul>
    </div>


	<?php echo $this->element('bannersHome'); ?>

</div> <!-- /home -->