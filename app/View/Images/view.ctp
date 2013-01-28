<div class="images view">
<h2><?php  echo __('Imagen'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($image['Image']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Link'); ?></dt>
		<dd>
			<?php echo h($image['Image']['link']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Editar Imagen'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Eliminar Imagen'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Imagenes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Imagen'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Productos'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Productos Relacionados'); ?></h3>
	<?php if (!empty($image['Product'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $image['Product']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Id Medida'); ?></dt>
		<dd>
	<?php echo $image['Product']['measure_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Id Marca'); ?></dt>
		<dd>
	<?php echo $image['Product']['brand_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Id Imagen'); ?></dt>
		<dd>
	<?php echo $image['Product']['image_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Nombre'); ?></dt>
		<dd>
	<?php echo $image['Product']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Cantidad'); ?></dt>
		<dd>
	<?php echo $image['Product']['quantity']; ?>
&nbsp;</dd>
		<dt><?php echo __('Descripcion'); ?></dt>
		<dd>
	<?php echo $image['Product']['description']; ?>
&nbsp;</dd>
		<dt><?php echo __('Destacado'); ?></dt>
		<dd>
	<?php echo $image['Product']['featured']; ?>
&nbsp;</dd>
		<dt><?php echo __('Precio'); ?></dt>
		<dd>
	<?php echo $image['Product']['price']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Editar Producto'), array('controller' => 'products', 'action' => 'edit', $image['Product']['id'])); ?></li>
			</ul>
		</div>
	</div>
	