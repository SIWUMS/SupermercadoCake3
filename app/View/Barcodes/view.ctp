<div class="barcodes view">
<h2><?php  echo __('Barcode'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($barcode['Barcode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Number'); ?></dt>
		<dd>
			<?php echo h($barcode['Barcode']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($barcode['Product']['name'], array('controller' => 'products', 'action' => 'view', $barcode['Product']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Barcode'), array('action' => 'edit', $barcode['Barcode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Barcode'), array('action' => 'delete', $barcode['Barcode']['id']), null, __('Are you sure you want to delete # %s?', $barcode['Barcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
