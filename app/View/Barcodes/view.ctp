<div class="barcodes view">
<h2><?php  echo __('Codigo de Barra'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($barcode['Barcode']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Numero'); ?></dt>
		<dd>
			<?php echo h($barcode['Barcode']['number']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($barcode['Product']['name'], array('controller' => 'products', 'action' => 'view', $barcode['Product']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Codigo de Barra'), array('action' => 'edit', $barcode['Barcode']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Codigo de Barra'), array('action' => 'delete', $barcode['Barcode']['id']), null, __('Are you sure you want to delete # %s?', $barcode['Barcode']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Codigo de Barra'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
