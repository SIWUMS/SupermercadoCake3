<div class="products view">
<h2><?php  echo __('Producto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($product['Product']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Medida'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Measure']['type'], array('controller' => 'measures', 'action' => 'view', $product['Measure']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Marca'); ?></dt>
		<dd>
			<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Imagen'); ?></dt>
		<dd>
			<!-- <?php echo $this->Html->link($product['Image']['link'], array('controller' => 'images', 'action' => 'view', $product['Image']['id'])); ?> -->
			<?php echo $this->Html->image($product['Image']['link'], array('alt' => 'Producto')); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
			<?php echo h($product['Product']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($product['Product']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
			<?php echo h($product['Product']['quantity']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($product['Product']['description']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Destacado'); ?></dt>
		<dd>
			<?php echo h($product['Product']['featured']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
			<?php echo h($product['Product']['price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Producto'), array('action' => 'edit', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Producto'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Medidas'), array('controller' => 'measures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Medida'), array('controller' => 'measures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Imagenes'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Imagen'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Codigos de Barra'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Codigos de Barra Relacionados'); ?></h3>
	<?php if (!empty($product['Barcode'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Numero'); ?></th>
		<th><?php echo __('Producto'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Barcode'] as $barcode): ?>
		<tr>
			<td><?php echo $barcode['id']; ?></td>
			<td><?php echo $barcode['number']; ?></td>
			<td><?php echo $barcode['product_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'barcodes', 'action' => 'view', $barcode['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'barcodes', 'action' => 'edit', $barcode['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'barcodes', 'action' => 'delete', $barcode['id']), null, __('Are you sure you want to delete # %s?', $barcode['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Gondolas Relacionadas'); ?></h3>
	<?php if (!empty($product['Aisle'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Descripcion'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($product['Aisle'] as $aisle): ?>
		<tr>
			<td><?php echo $aisle['id']; ?></td>
			<td><?php echo $aisle['description']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'aisles', 'action' => 'view', $aisle['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'aisles', 'action' => 'edit', $aisle['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'aisles', 'action' => 'delete', $aisle['id']), null, __('Are you sure you want to delete # %s?', $aisle['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
