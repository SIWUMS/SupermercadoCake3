<script type="text/javascript">
	$(document).ready(function(){
	//jquery usa id para referenciar igual que en css
	$("#search").autocomplete({
            minLength: 0,
            //source es el nombre de la accion en el controlador, lo tengo que poner como aparece en la url
            //por eso va el nombre del elemento asi se completa elementoController y despues de ahi la accion
            source: "products/autocompletar",
            
            focus: function(event, ui) {
                $("#search").val( ui.item.Product.name);
                return false;
            },
            
            select: function(event, ui) {
                //con este me autocompleta el buscador y con enter hace un search del producto
                //$("#search").val(ui.item.Product.name);
                
                //$("#search").val(ui.item.Product.id);
                
                //con esto logro que cuando clickeo me redirija a la pagina del producto en vez de hacer una busqueda del nombre que seleccione
                //con el autocompletado
                //con esto generlo la url SupermercadoCake3/products/view/id con el id del producto al que le hice el click
                window.location.replace('products/view/'+ ui.item.Product.id);
                
                //$("#search-name").html(ui.item.Product.name);
                
                //$("#project-icon").attr( "src", "images/" + ui.item.icon );
 
                return false;
         }
            })
            
            //la funcion data itera sobre el resultado del autocomplete y a cada iteracion le llama item
        .data( "autocomplete" )._renderItem = function( ul, item ) {
            return $( "<li>" )
                .data( "item.autocomplete", item )
                .append( "<a>" + item.Product.name + "<br>" + item.Product.id + "</a>" )
                .appendTo( ul );
        };
      })
      //le agregue item.Product.name porque queria el nombre del producto y me devolvia un array que primero tenia la palabra Product
      //y despues otro array adentro donde ahi venia el nombre, al segundo le puse el id del producto
      //Product es el key del array, por eso lo tengo que poner
</script>
<div class="products index">
	<h2><?php echo __('Productos'); ?></h2>
	
	<?php echo $this->Form->create('Product', array('action'=>'search')); ?>
	<?php echo $this->Form->input('search', array('id'=>'search', 'label' => 'Busqueda')); ?>
	<?php echo $this->Form->end('Buscar'); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('measure_id', 'Medida'); ?></th>
			<th><?php echo $this->Paginator->sort('brand_id', 'Marca'); ?></th>
			<th><?php echo $this->Paginator->sort('image_id', 'Imagen'); ?></th>
			<th><?php echo $this->Paginator->sort('name', 'Nombre'); ?></th>
			<th><?php echo $this->Paginator->sort('quantity', 'Cantidad'); ?></th>
			<th><?php echo $this->Paginator->sort('description', 'Descripcion'); ?></th>
			<th><?php echo $this->Paginator->sort('featured', 'Destacado'); ?></th>
			<th><?php echo $this->Paginator->sort('price', 'Precio'); ?></th>
			<th class="actions"><?php echo __('Acciones'); ?></th>
	</tr>
	<?php
	foreach ($products as $product): ?>
	<tr>
		<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($product['Measure']['type'], array('controller' => 'measures', 'action' => 'view', $product['Measure']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Brand']['name'], array('controller' => 'brands', 'action' => 'view', $product['Brand']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($product['Image']['link'], array('controller' => 'images', 'action' => 'view', $product['Image']['id'])); ?>
		</td>
		<td><?php echo h($product['Product']['name']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['quantity']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['featured']); ?>&nbsp;</td>
		<td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Ver'), array('action' => 'view', $product['Product']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $product['Product']['id'])); ?>
			<?php echo $this->Form->postLink(__('Eliminar'), array('action' => 'delete', $product['Product']['id']), null, __('Are you sure you want to delete # %s?', $product['Product']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Pagina {:page} de {:pages}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('siguiente') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Acciones'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Nuevo Producto'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('Listar Medidas'), array('controller' => 'measures', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Medida'), array('controller' => 'measures', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Marcas'), array('controller' => 'brands', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Marca'), array('controller' => 'brands', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Imagenes'), array('controller' => 'images', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Imagen'), array('controller' => 'images', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Codigos de Barra'), array('controller' => 'barcodes', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nuevo Codigo de Barra'), array('controller' => 'barcodes', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondolas'), array('controller' => 'aisles', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola'), array('controller' => 'aisles', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Listar Gondola-Productos'), array('controller' => 'aisles_products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Nueva Gondola-Producto'), array('controller' => 'aisles_products', 'action' => 'add')); ?> </li>

	</ul>
</div>
