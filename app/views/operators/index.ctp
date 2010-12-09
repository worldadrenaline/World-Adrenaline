<div class="operators index">

    <?php echo $javascript->link(array('jquery.js')); ?>
    <div id="loading" style="display: none;">
        Loading, please wait...
    </div>
    
    <h1>
    
    <?php if (!isset($activityTypeName)) { $activityTypeName = 'All adventure'; } ?>
    
    <?php  echo $activityTypeName.' operators'; ?> 
    	<div class="country">
    	<?php  
    	    if (isset($this->data['Operator']['country'])) { $country = $this->data['Operator']['country']; }
        	if (isset($country) && $country!='') { echo 'in '.$countries[$country]; }  else { echo 'globally'; } 
    	?>
    	</div>
    </h1>

    <div class="filter">
        <h4 class="weak">Refine your search</h4>
        <?php
            echo $form->create(null, array('url' => array('controller' => 'operators', 'action' => 'index')));
            echo $form->input('field', array('type'=>'select', 'options'=>array(
               'name'=>'Name', 'city' => 'City', 'stateProvince' => 'State', 'description' => 'Description'
            	), 'empty'=>'Display all', 'default'=>'name', 'label'=>'', 'div'=>'input field')
            );
            echo $form->input('q', array('type'=>'text', 'label'=>'', 'div'=>'input q', 'size'=>40));
            echo $form->input('country', array('type'=>'select', 'options'=>$countries, 'empty'=>'all countries', 'label'=>'', 'div'=>'input country', 'default'=>$country));
            echo $form->input('activityType', array('type'=>'select', 'options'=>$activityTypes, 'empty'=>'all activities', 'label'=>'', 'div'=>'input activityType', 'default'=>$activityID));
            echo $form->end('Apply Filter');
        ?>
    </div>
    
    
    <?php
    if (count($operators)>0) {
         /* Display operators listing */
    ?>	
    
    	<div id="paging" class="paging">	
    	<?php 
    	//$paginator->options(array('update' => 'content', 'indicator' => 'loading'));
    	echo $paginator->prev('<< Previous', array('url'=>$this->params['pass']), null, array('class' => 'disabled'));
    	echo $paginator->numbers(array('separator'=>'','url'=>$this->params['pass'])); 
    	echo $paginator->next('Next >>', array('url'=>$this->params['pass']), null, array('class' => 'disabled'));
    	
    	?>
    	</div> 
    	
    	<div id="operatorList">
    		<ul>
    		<?php foreach($operators as $operator): ?>
    		
    			 <li class="<?php echo $operator['Operator']['source']; ?>">
    			 
                    <?php if ($operator['Operator']['source'] == 'kumutu') : ?>
                        <div class="trusted"><?php echo "Trusted Operator"; ?></div>
                    <?php endif; ?>	
    			 
    			     <?php if (isset($operator['Operator']['imageFile_1']) && !empty($operator['Operator']['imageFile_1'])) : ?>
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
    
    	<div id="paging" class="paging">
    	<?php 
    	echo $paginator->prev('<< Previous', array('url'=>$this->params['pass']), null, array('class' => 'disabled'));
    	echo $paginator->numbers(array('separator'=>'','url'=>$this->params['pass'])); 
    	echo $paginator->next('Next >>', array('url'=>$this->params['pass']), null, array('class' => 'disabled'));
    	?>
    	</div> 
    <?php 
    } else {
    	echo '<div class="notice">Currently, we do not have any operators that fit this criteria. Check back soon as the list grows daily.</div>';
    }
    ?>

</div> <! --/operators index -->
