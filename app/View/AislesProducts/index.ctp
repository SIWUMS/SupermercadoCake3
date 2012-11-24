<div class="aislesProducts index">
	<h2><?php echo __('Aisles Products'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id'); ?></th>
			<th><?php echo $this->Paginator->sort('aisle_id'); ?></th>
			<th><?php echo $this->Paginator->sort('position_id'); ?></th>
			<th><?php echo $this->Paginator->sort('shelf_id'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($aislesProducts as $aislesProduct): ?>
	<tr>
		<td><?php echo h($aislesProduct['AislesProduct']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($aislesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $aislesProduct['Product']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aislesProduct['Aisle']['description'], array('controller' => 'aisles', 'action' => 'view', $aislesProduct['Aisle']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aislesProduct['Position']['description'], array('controller' => 'positions', 'action' => 'view', $aislesProduct['Position']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($aislesProduct['Shelf']['description'], array('controller' => 'shelves', 'action' => 'view', $aislesProduct['Shelf']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $aislesProduct['AislesProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $aislesProduct['AislesProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $aislesProduct['AislesProduct']['id']), null, __('Are you sure you want to delete # %s?', $aislesProduct['AislesProduct']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Aisles Product'), array('action' => 'add')); ?></li>
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
