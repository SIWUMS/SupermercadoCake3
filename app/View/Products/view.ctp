<div class="products view">
<h2><?php  echo __('Product'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Measure'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Measure']['type'], array('controller' => 'measures', 'action' => 'view', $product['Measure']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Brand'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Image'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Image']['link'], array('controller' => 'images', 'action' => 'view', $product['Image']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
			<?php echo h($product['Product']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
			<?php echo h($product['Product']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Featured'); ?></dt>
		<dd>
			<?php echo h($product['Product']['featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Product'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Product'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Measures'), array('controller' => 'measures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Measure'), array('controller' => 'measures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Brands'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Brand'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Barcodes'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Aisles'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Aisle'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Barcodes'); ?></h3>
	<?php if (!empty($product['Barcode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Number'); ?></th>
		<th><?php echo __('Product Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Barcode'] as $barcode): ?>
		<tr>
			<td><?php echo $barcode['id']; ?></td>
			<td><?php echo $barcode['number']; ?></td>
			<td><?php echo $barcode['product_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'barcodes', 'action' => 'view', $barcode['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'barcodes', 'action' => 'edit', $barcode['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'barcodes', 'action' => 'delete', $barcode['id']), null, __('Are you sure you want to delete # %s?', $barcode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Barcode'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Aisles'); ?></h3>
	<?php if (!empty($product['Aisle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Aisle'] as $aisle): ?>
		<tr>
			<td><?php echo $aisle['id']; ?></td>
			<td><?php echo $aisle['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'aisles', 'action' => 'view', $aisle['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'aisles', 'action' => 'edit', $aisle['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'aisles', 'action' => 'delete', $aisle['id']), null, __('Are you sure you want to delete # %s?', $aisle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Aisle'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
