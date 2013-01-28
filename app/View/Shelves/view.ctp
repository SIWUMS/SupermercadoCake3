<div class="shelves view">
<h2><?php  echo __('Estante'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($shelf['Shelf']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
			<?php echo h($shelf['Shelf']['description']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Estante'), array('action' => 'edit', $shelf['Shelf']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Estante'), array('action' => 'delete', $shelf['Shelf']['id']), null, __('Are you sure you want to delete # %s?', $shelf['Shelf']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estantes '), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estante'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondola-Productos'), array('controller' => 'aisles_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Gondola-Productos Relacionadas'); ?></h3>
	<?php if (!empty($shelf['AislesProduct'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Id Producto'); ?></th>
		<th><?php echo __('Id Gondola'); ?></th>
		<th><?php echo __('Id Posicion'); ?></th>
		<th><?php echo __('Id Estante'); ?></th>
		<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($shelf['AislesProduct'] as $aislesProduct): ?>
		<tr>
			<td><?php echo $aislesProduct['id']; ?></td>
			<td><?php echo $aislesProduct['product_id']; ?></td>
			<td><?php echo $aislesProduct['aisle_id']; ?></td>
			<td><?php echo $aislesProduct['position_id']; ?></td>
			<td><?php echo $aislesProduct['shelf_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Ver'), array('controller' => 'aisles_products', 'action' => 'view', $aislesProduct['id'])); ?>
				<?php echo $this->Html->link(__('Editar'), array('controller' => 'aisles_products', 'action' => 'edit', $aislesProduct['id'])); ?>
				<?php echo $this->Form->postLink(__('Eliminar'), array('controller' => 'aisles_products', 'action' => 'delete', $aislesProduct['id']), null, __('Are you sure you want to delete # %s?', $aislesProduct['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('Nueva Gondola-Productos'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
