<div class="aislesProducts view">
<h2><?php  echo __('Gondola Producto'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($aislesProduct['AislesProduct']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Producto'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Product']['name'], array('controller' => 'products', 'action' => 'view', $aislesProduct['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Gondola'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Aisle']['description'], array('controller' => 'aisles', 'action' => 'view', $aislesProduct['Aisle']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Posicion'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Position']['description'], array('controller' => 'positions', 'action' => 'view', $aislesProduct['Position']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Estante'); ?></dt>
		<dd>
			<?php echo $this->Html->link($aislesProduct['Shelf']['description'], array('controller' => 'shelves', 'action' => 'view', $aislesProduct['Shelf']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Menu'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Gondola-Producto'), array('action' => 'edit', $aislesProduct['AislesProduct']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Gondola-Producto'), array('action' => 'delete', $aislesProduct['AislesProduct']['id']), null, __('Are you sure you want to delete # %s?', $aislesProduct['AislesProduct']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas-Productos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('action' => 'add')); ?> </li>
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
