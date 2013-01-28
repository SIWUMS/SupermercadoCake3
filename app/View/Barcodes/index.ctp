<div class="barcodes index">
	<h2><?php echo __('Codigos de Barra'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('number', 'Numero'); ?></th>
			<th><?php echo $this->Paginator->sort('product_id', 'Producto'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($barcodes as $barcode): ?>
	<tr>
		<td><?php echo h($barcode['Barcode']['id']); ?>&nbsp;</td>
		<td><?php echo h($barcode['Barcode']['number']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($barcode['Product']['name'], array('controller' => 'products', 'action' => 'view', $barcode['Product']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $barcode['Barcode']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $barcode['Barcode']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $barcode['Barcode']['id']), null, __('Are you sure you want to delete # %s?', $barcode['Barcode']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} of {:pages}')
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
		<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
