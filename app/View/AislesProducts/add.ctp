<div class="aislesProducts form">
<?php echo $this->Form->create('AislesProduct'); ?>
	<fieldset>
		<legend><?php echo __('Add Aisles Product'); ?></legend>
	<?php
		echo $this->Form->input('product_id');
		echo $this->Form->input('aisle_id');
		echo $this->Form->input('position_id');
		echo $this->Form->input('shelf_id');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Aisles Products'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aisles'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aisle'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Shelves'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Shelf'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
	</ul>
</div>
