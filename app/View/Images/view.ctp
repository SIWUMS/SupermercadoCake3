<div class="images view">
<h2><?php  echo __('Image'); ?></h2>
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
		<li><?php echo $this->Html->link(__('Edit Image'), array('action' => 'edit', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Image'), array('action' => 'delete', $image['Image']['id']), null, __('Are you sure you want to delete # %s?', $image['Image']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Images'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Image'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
	<div class="related">
		<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($image['Product'])): ?>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
		<dd>
	<?php echo $image['Product']['id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Measure Id'); ?></dt>
		<dd>
	<?php echo $image['Product']['measure_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Brand Id'); ?></dt>
		<dd>
	<?php echo $image['Product']['brand_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Image Id'); ?></dt>
		<dd>
	<?php echo $image['Product']['image_id']; ?>
&nbsp;</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
	<?php echo $image['Product']['name']; ?>
&nbsp;</dd>
		<dt><?php echo __('Quantity'); ?></dt>
		<dd>
	<?php echo $image['Product']['quantity']; ?>
&nbsp;</dd>
		<dt><?php echo __('Description'); ?></dt>
		<dd>
	<?php echo $image['Product']['description']; ?>
&nbsp;</dd>
		<dt><?php echo __('Featured'); ?></dt>
		<dd>
	<?php echo $image['Product']['featured']; ?>
&nbsp;</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
	<?php echo $image['Product']['price']; ?>
&nbsp;</dd>
		</dl>
	<?php endif; ?>
		<div class="actions">
			<ul>
				<li><?php echo $this->Html->link(__('Edit Product'), array('controller' => 'products', 'action' => 'edit', $image['Product']['id'])); ?></li>
			</ul>
		</div>
	</div>
	