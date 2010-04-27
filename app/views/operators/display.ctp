<?php //  echo $this->element('activity_types/list'); ?>

<!-- content_panel -->
<div class="content_panel">
	<div class="sub_container">
		<div class="content_left_panel">
		
			<h1>Operator Listing</h1>

				<div id="LoadingDiv" style="display: none;">
				    <?php echo $html->image('/img/ajax-loader.gif'); ?>
				</div>
				
				<?php
				if (count($operators)>0) {
				     /* Display paging info */
				?>
	
					<div class="filter">
					<?php
						echo $form->create('', array('url' => array('controller' => 'operators', 'action' => 'index')));
		    			//echo $form->input('country', array('type'=>'select', 'options'=>array ('' => '- Country -', 'UK' => 'United Kingdom'), 'label'=>'Filter by'));
	//					echo $form->input('country', array('type'=>'select'));
						echo $form->input('country', array('type'=>'select', 'options'=>$countries, 'empty'=>'- country -'));
						echo $form->input('activityType', array('type'=>'hidden', 'value'=>$this->data['activityType']));
					    echo $form->end('Send');
					?>
					</div>
	
				
					<div id="paging" class="paging">
						<?php
							echo $paginator->prev(); 
							echo $paginator->numbers(array('separator'=>'')); 
							echo $paginator->next();
						?>
					</div> 
					
					<div class="operatorList">
						<ul>
						<?php foreach($operators as $operator): ?>
							 <li><a href="/operators/view/<?php echo $operator['Operator']['id']; ?>"><?php echo $operator['Operator']['name']; ?></a></li>
						<?php endforeach; ?>
						</ul>
					</div>

					<div id="paging" class="paging">
						<?php echo $paginator->prev(); ?>
						<?php echo $paginator->numbers(array('separator'=>'')); ?>
						<?php echo $paginator->next(); ?>
					</div> 
			<?php 
			} else {
				echo "Currently, we do not have any operators in this criteria. Check back soon as the list grows daily.";
			}
			?>


		
		</div>
	
		<?php echo $this->element('sidebar'); ?>
	
	</div>
</div>
<!-- //content_panel -->
