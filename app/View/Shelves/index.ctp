<div class="shelves index">
	<h2><?php echo __('Estantes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descripcion'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($shelves as $shelf): ?>
	<tr>
		<td><?php echo h($shelf['Shelf']['id']); ?>&nbsp;</td>
		<td><?php echo h($shelf['Shelf']['description']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $shelf['Shelf']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $shelf['Shelf']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $shelf['Shelf']['id']), null, __('Are you sure you want to delete # %s?', $shelf['Shelf']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Nuevo Estante'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Gondola-Productos'), array('controller' => 'aisles_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
