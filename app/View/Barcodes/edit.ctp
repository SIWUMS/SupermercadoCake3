<div class="barcodes form">
<?php echo $this->Form->create('Barcode'); ?>
	<fieldset>
		<legend><?php echo __('Editar Codigo de Barra'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('number', array('label' => 'Numero'));
		echo $this->Form->input('product_id', array('label' => 'Producto'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Barcode.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Barcode.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Codigos de Barra'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
