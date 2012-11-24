<div class="aislesProducts view">
<h2><?php  echo __('Aisles Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aislesProduct['AislesProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $aislesProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Aisle'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Aisle']['description'], array('controller' => 'aisles', 'action' => 'view', $aislesProduct['Aisle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Position'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Position']['description'], array('controller' => 'positions', 'action' => 'view', $aislesProduct['Position']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Shelf'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Shelf']['description'], array('controller' => 'shelves', 'action' => 'view', $aislesProduct['Shelf']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Aisles Product'), array('action' => 'edit', $aislesProduct['AislesProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Aisles Product'), array('action' => 'delete', $aislesProduct['AislesProduct']['id']), null, __('Are you sure you want to delete # %s?', $aislesProduct['AislesProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Aisles Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aisles Product'), array('action' => 'add')); ?> </li>
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
