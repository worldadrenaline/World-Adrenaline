<?php //  echo $this->element('activity_types/list'); ?>

<!-- content_panel -->
<div class="content_panel">
	<div class="sub_container">
		<div class="content_left_panel">
			
			<?php $activityType = $this->params['pass']['0']; ?>

			<div class="content_title"><h1><?php echo $activityType; ?> Operators</h1></div>
			
			<div class="content_bg">

				<?php /* Filter not yet working
				<!-- Filter the results -->
				<div class="filter">
				<h5>Filter by</h5>
						<form name="filterForm" action="" method="get">
						<!-- <input type="hidden" name="id" value="1034"  /> -->
							<select id="ContryList" name="ContryList" onchange="form.submit()" >
								<option value="" selected="selected">- Country -</option>
								<option value="GB" >United Kingdom</option>
							</select> 
						</form>
				</div>
								
				
				<?php 
				 /*
				    echo $form->create('', array('url' => array('controller' => 'operators', 'action' => 'index')));
	    			echo $form->input('country', array('type'=>'select', 'options'=>array ('' => '- Country -', 'UK' => 'United Kingdom'), 'label'=>'Filter by'));
					echo $form->input('activityType', array('type'=>'hidden', 'value'=>$activityType));
				    echo $form->end('Send');
				*/
				?>
				
				
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
