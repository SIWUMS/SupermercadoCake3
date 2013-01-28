<div class="aisles view">
<h2><?php  echo __('Gondola'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aisle['Aisle']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($aisle['Aisle']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Gondola'), array('action' => 'edit', $aisle['Aisle']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Gondola'), array('action' => 'delete', $aisle['Aisle']['id']), null, __('Are you sure you want to delete # %s?', $aisle['Aisle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Productos Relacionados'); ?></h3>
	<?php if (!empty($aisle['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id Medida'); ?></th>
		<th><?php echo __('Id Marca'); ?></th>
		<th><?php echo __('Id Imagen'); ?></th>
		<th><?php echo __('Nombre'); ?></th>
		<th><?php echo __('Cantidad'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th><?php echo __('Destacado'); ?></th>
		<th><?php echo __('Precio'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($aisle['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['measure_id']; ?></td>
			<td><?php echo $product['brand_id']; ?></td>
			<td><?php echo $product['image_id']; ?></td>
			<td><?php echo $product['name']; ?></td>
			<td><?php echo $product['quantity']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['featured']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), null, __('Are you sure you want to delete # %s?', $product['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
