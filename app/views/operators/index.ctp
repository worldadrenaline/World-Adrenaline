<?php //  echo $this->element('activity_types/list'); ?>

<!-- content_panel -->
<div class="content_panel">
	<div class="sub_container">
		<div class="content_left_panel">
		
			<?php echo $javascript->link(array('jquery.js')); ?>
			<div id="loading" style="display: none;">
			    Loading, please wait...
			</div>

			<h1>
			<?php  echo $activityTypeName.' operators'; ?> 
				<div class="country">
				<?php  if (isset($country) && $country!='') { echo 'in '.$countries[$country]; }  else { echo 'globally'; } ?>
				</div>
			</h1>
				
			<div class="filter">
			Filter by
			<?php
    			echo $form->create(null, array('url' => array('controller' => 'operators', 'action' => 'index', $activityType)));
				echo $form->input('country', array('type'=>'select', 'options'=>$countries, 'empty'=>'- country -', 'label'=>'', 'onChange' => 'this.form.submit()'	));
				echo $form->input('activityType', array('type'=>'hidden', 'value'=>$activityType));
			    echo $form->end();
			    
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
						 <li><?php echo $html->link($operator['Operator']['name'], array('controller' => 'operators','action' => 'view','id' => $operator['Operator']['id'],'shortname' => Inflector::slug($operator['Operator']['name']))); ?></a> 
						 <div class="location"> 
						 <?php if (isset($operator['Operator']['city']) && $operator['Operator']['city']!='') { echo substr($operator['Operator']['city'],0,50).', '; }?>
 						 <?php echo $operator['Country']['name']; ?>
						 </div>
						 <div class="description">
						 <?php if ($operator['Operator']['description']!='') { echo substr($operator['Operator']['description'],0,100).'...'; }?>
						 </div></li>
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
		</div>
	test
		<?php echo $this->element('sidebar'); ?>
	test

</div> <!-- sub_container -->
</div> <!-- /content_panel -->