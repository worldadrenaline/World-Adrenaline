<?php //  echo $this->element('activity_types/list'); ?>

<!-- content_panel -->
<div class="content_panel">
	<div class="sub_container">
		<div class="content_left_panel">
			
			<?php // $activityTypeName = $firstOperator['Operator']['ActivityType']; ?>
			<?php // $activityType = $firstOperator['Operator']['slug']; ?>
			
			<?php // echo $activityType; ?>

			<div class="content_title"><h1><?php // echo $activityTypeName; ?> Operators</h1></div>
			
			<div class="content_bg">

				<?php /* TODO: Filter the paging results. */ ?>
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
				
				
				<div class="content_tumb">
					<div class="paging">
						<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
					  	<?php echo $paginator->numbers();?>
						<?php echo $paginator->next(__('next', true).' >', array(), null, array('class' => 'disabled'));?>
						<?php echo $paginator->last(__('last', true).' >>', array(), null, array('class' => 'disabled'));?>
					</div>
				</div>
				
				
				<div class="oprators_bg">
					
					<?php if ($paginator->counter(array('format' => __('%count%', true))) > 0 ) { ?>
						<ul>
							<?php foreach ($operators as $operator):?>
								<li><a href="/operator/<?php echo $operator['Operator']['id']; ?>"><?php echo $operator['Operator']['name']; ?></a><br />
								<?php echo $operator['Operator']['Description']; ?></li>
							<?php endforeach; ?>
						</ul>
 					<?php } else {
	 					 echo __('Currently, we do not have any operators in this category. Check back soon as the list grows daily.', true);
					} ?>
					
					
				
				</div>
				
				<div class="content_tumb">
					<div class="paging">
						<?php echo $paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
					  	<?php echo $paginator->numbers();?>
						<?php echo $paginator->next(__('next', true).' >', array(), null, array('class' => 'disabled'));?>
						<?php echo $paginator->last(__('last', true).' >>', array(), null, array('class' => 'disabled'));?>
					</div>
				</div>
							
			</div>
		</div>
	
		<?php echo $this->element('sidebar'); ?>
	
	</div>
</div>
<!-- //content_panel -->
