<?php //  echo $this->element('activity_types/list'); ?>

<!-- content_panel -->
<div class="content_panel">
	<div class="sub_container">
		<div class="content_left_panel">
		
			<h1><?php echo $this->data['activityType']; ?> Operators</h1>

				<div id="LoadingDiv" style="display: none;">
				    <?php echo $html->image('/img/ajax-loader.gif'); ?>
				</div>
	
					<div class="filter">
					Filter by
					<?php
		    			echo $form->create(null, array('url' => '/operators/index/'.$this->data['activityType']));
						echo $form->input('country', array('type'=>'select', 'options'=>$countries, 'empty'=>'- country -', 'label'=>'', 'onChange' => 'this.form.submit()'	));
						echo $form->input('activityType', array('type'=>'hidden', 'value'=>$this->data['activityType']));
					    echo $form->end();
					?>
					</div>

				<?php
				if (count($operators)>0) {
				     /* Display paging info */
				?>	
				
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
				echo '<div class="notice">Currently, we do not have any operators that fit this criteria. Check back soon as the list grows daily.</div>';
			}
			?>

		
		</div>
	
		<?php echo $this->element('sidebar'); ?>
	
	</div>
</div>
<!-- //content_panel -->