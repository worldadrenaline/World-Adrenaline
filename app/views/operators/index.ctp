<!-- content_panel -->
<div class="content_panel">
	<div class="sub_container">
		<div class="content_left_panel">
			
			<?php $activityType = $this->params['pass']['0']; ?>

			<div class="content_title"><h1><?php echo $activityType; ?> Operators</h1></div>
			
			<div class="content_bg">

				<div class="filter">
				<h5>Filter by</h5>
						<form name="frm" action="" method="post">
						<input type="hidden" name="id" value="1034"  />
						<select id="ContryList" name="ContryList" onchange="form.submit()" >
						<option value="" selected="selected">- Country -</option><option value="AF" ><b>Afghanistan<b></option></select> 
						</form>
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
