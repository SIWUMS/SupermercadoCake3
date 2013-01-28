<div class="positions form">
<?php echo $this->Form->create('Position'); ?>
	<fieldset>
		<legend><?php echo __('Agregar Posicion'); ?></legend>
	<?php
		echo $this->Form->input('description', array('label' => 'Descripcion'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Listar Posicions'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Gondolas-Productos'), array('controller' => 'aisles_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
