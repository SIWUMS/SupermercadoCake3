<div class="barcodes form">
<?php echo $this->Form->create('Barcode'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Codigo de Barra'); ?></legend>
	<?php
		echo $this->Form->input('number', array('label' => 'Numero'));
		echo $this->Form->input('product_id', array('label' => 'Producto'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Codigos de Barra'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
