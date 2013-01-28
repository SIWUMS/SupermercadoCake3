<div class="aislesProducts index">
	<h2><?php echo __('Relaciones Gondolas Productos'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id', 'Id Producto'); ?></th>
			<th><?php echo $this->Paginator->sort('aisle_id', 'Id Gondola'); ?></th>
			<th><?php echo $this->Paginator->sort('position_id', 'Id Posicion'); ?></th>
			<th><?php echo $this->Paginator->sort('shelf_id', 'Id Estante'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
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
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $aislesProduct['AislesProduct']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $aislesProduct['AislesProduct']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $aislesProduct['AislesProduct']['id']), null, __('Are you sure you want to delete # %s?', $aislesProduct['AislesProduct']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Posiciones'), array('controller' => 'positions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Posicion'), array('controller' => 'positions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Estantes'), array('controller' => 'shelves', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Estante'), array('controller' => 'shelves', 'action' => 'add')); ?> </li>
	</ul>
</div>
