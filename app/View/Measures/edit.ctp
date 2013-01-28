<div class="measures form">
<?php echo $this->Form->create('Measure'); ?>
	<fieldset>
		<legend><?php echo __('Editar Medida'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('type', array('label' => 'Tipo'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Ingresar')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $this->Form->value('Measure.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Measure.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listar Medidas'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
