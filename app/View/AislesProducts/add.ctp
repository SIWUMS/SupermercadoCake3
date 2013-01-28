<div class="aislesProducts form">
<?php echo $this->Form->create('AislesProduct'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Relacion Gondola Producto'); ?></legend>
	<?php
		echo $this->Form->input('product_id', array('label' => 'Id Producto'));
		echo $this->Form->input('aisle_id', array('label' => 'Id Gondola'));
		echo $this->Form->input('position_id', array('label' => 'Id Posicion'));
		echo $this->Form->input('shelf_id', array('label' => 'Id Estante'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Gondolas-Productos'), array('action' => 'index')); ?></li>
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
