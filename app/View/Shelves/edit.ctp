<div class="shelves form">
<?php echo $this->Form->create('Shelf'); ?>
	<fieldset>
		<legend><?php echo __('Editar Estante'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('description', array('label' => 'Descripcion'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Shelf.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Shelf.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Estantes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Gondola-Productos'), array('controller' => 'aisles_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>
	</ul>
</div>
