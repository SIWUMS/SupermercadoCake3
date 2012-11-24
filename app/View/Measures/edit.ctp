<div class="measures form">
<?php echo $this->Form->create('Measure'); ?>
	<fieldset>
		<legend><?php echo __('Edit Measure'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Measure.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Measure.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Measures'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
