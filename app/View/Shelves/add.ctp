<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Add Shelf'); ?></legend>
	<?php
		echo $this->Form->input('description');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Shelves'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Aisles Products'), array('controller' => 'aisles_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aisles Product'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
