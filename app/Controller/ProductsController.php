<?php
App::uses('AppController', 'Controller');
/**
 * Products Controller
 *
 * @property Product $Product
 */
class ProductsController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
 var $uses = array('Product', 'Brand', 'Measure', 'Image', 'Aisle', 'Barcode', 'Position', 'Shelf');
 
 
	public function index() {
		$this->Product->recursive = 0;
		$this->set('products', $this->paginate());
	}
	
	public function search(){
		
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->data['Product']['search']."%"));
               $this->set('products', $products);
               $this->render('index');
		//$condiciones= array("Product.name LIKE" => "%".$this->request->data['Product']['search']."%");			
		//$products = $this->Product->find($condiciones);
		
		//$productos = $this->Product->find('all', array("name LIKE"=>"%".$this->request->data['Product']['search']."%"));
		
		//$productos = $this->Product->paginate('Product', array('Product.name LIKE'=>'%'.$this->request->data['Product']['search'].'%'));
		//$productos= $this->Product->search($this->data['Product']['search']);
		
		//$this->set('products', $productos);
		//$this->render('/products/index');
		//$this->render('index');
	}
	
	public function autocompletar(){
		//para ver que tiene la variable adentro
		//var_dump($this->request);	
		
		//tuve que poner request porque le tengo que pedir y poner query porque ahi estaba mandando el term que es lo que viene despues
		//del ? en la url y ahi dice ?term=algo ahi puedo sacar el algo
		$products = $this->paginate(array("Product.name LIKE "=> "%".$this->request->query['term']."%"));
		//con el autoRender (que esta siempre en true) lo pongo en falso y no me busca la vista equivalente a esta accion
		//lo pongo asi porque no quiero que abra una vista, porque no existe, quiero que se quede en la misma pagina
		$this->autoRender=false;
		//con esto genero el json
		echo json_encode($products);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		$this->set('product', $this->Product->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			//var_dump($this->request->data);
			$this->Product->create();
			if ($this->Product->save($this->request->data)) {
				
				$producto = $this->request->data;
				$medida_id = $producto['Product']['measure_id'];
				$marca_id = $producto['Product']['brand_id'];
				$imagen_id = $producto['Product']['image_id'];
				$nombre = $producto['Product']['name'];
				$numero = $producto['Product']['number'];
				$cantidad = $producto['Product']['quantity'];
				$descripcion = $producto['Product']['description'];
				$destacado = $producto['Product']['featured'];
				$precio = $producto['Product']['price'];
				
				$medidas = $this->Measure->find('first', array('conditions' => array("Measure.id" => $medida_id)));
				$medida = $medidas['Measure']['type'];
				$marcas = $this->Brand->find('first', array('conditions' => array("Brand.id" => $marca_id)));
				$marca = $marcas['Brand']['name'];
				$imagenes = $this->Image->find('first', array('conditions' => array("Image.id" => $imagen_id)));
				$imagen = $imagenes['Image']['link'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/products/externalAdd', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('measure' => $medida, 'brand' => $marca, 'image' => $imagen, 'name' => $nombre, 'number' => $numero, 'quantity' => $cantidad, 'description' => $descripcion, 'featured' => $destacado, 'price' => $precio));
				//$r->addPostFile('image', 'profile.jpg', 'image/jpeg');
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		}
		$measures = $this->Product->Measure->find('list');
		$brands = $this->Product->Brand->find('list');
		$images = $this->Product->Image->find('list');
		$aisles = $this->Product->Aisle->find('list');
		$this->set(compact('measures', 'brands', 'images', 'aisles'));
		
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Product->id = $id;
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Product->save($this->request->data)) {
				
				$producto = $this->request->data;
				$medida_id = $producto['Product']['measure_id'];
				$marca_id = $producto['Product']['brand_id'];
				$imagen_id = $producto['Product']['image_id'];
				$nombre = $producto['Product']['name'];
				$numero = $producto['Product']['number'];
				$cantidad = $producto['Product']['quantity'];
				$descripcion = $producto['Product']['description'];
				$destacado = $producto['Product']['featured'];
				$precio = $producto['Product']['price'];
				
				$medidas = $this->Measure->find('first', array('conditions' => array("Measure.id" => $medida_id)));
				$medida = $medidas['Measure']['type'];
				$marcas = $this->Brand->find('first', array('conditions' => array("Brand.id" => $marca_id)));
				$marca = $marcas['Brand']['name'];
				$imagenes = $this->Image->find('first', array('conditions' => array("Image.id" => $imagen_id)));
				$imagen = $imagenes['Image']['link'];
				
				//var_dump($medida.$marca.$imagen.$nombre.$numero.$cantidad.$descripcion.$destacado.$precio);
				
				$r = new HttpRequest('http://localhost/SmartApp2/products/externalEdit', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('measure' => $medida, 'brand' => $marca, 'image' => $imagen, 'name' => $nombre, 'number' => $numero, 'quantity' => $cantidad, 'description' => $descripcion, 'featured' => $destacado, 'price' => $precio));
				//$r->addPostFile('image', 'profile.jpg', 'image/jpeg');
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Product->read(null, $id);
		}
		$measures = $this->Product->Measure->find('list');
		$brands = $this->Product->Brand->find('list');
		$images = $this->Product->Image->find('list');
		$aisles = $this->Product->Aisle->find('list');
		$this->set(compact('measures', 'brands', 'images', 'aisles'));
	}

/**
 * delete method
 *
 * @throws MethodNotAllowedException
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Product->id = $id;
		
		$producto = $this->Product->findById($id);
		$medida_id = $producto['Product']['measure_id'];
		$marca_id = $producto['Product']['brand_id'];
		$imagen_id = $producto['Product']['image_id'];
		$nombre = $producto['Product']['name'];
		$numero = $producto['Product']['number'];
		$cantidad = $producto['Product']['quantity'];
		$descripcion = $producto['Product']['description'];
		$destacado = $producto['Product']['featured'];
		$precio = $producto['Product']['price'];
		
		$medidas = $this->Measure->find('first', array('conditions' => array("Measure.id" => $medida_id)));
		$medida = $medidas['Measure']['type'];
		$marcas = $this->Brand->find('first', array('conditions' => array("Brand.id" => $marca_id)));
		$marca = $marcas['Brand']['name'];
		$imagenes = $this->Image->find('first', array('conditions' => array("Image.id" => $imagen_id)));
		$imagen = $imagenes['Image']['link'];
		
		
		$r = new HttpRequest('http://localhost/SmartApp2/products/externalDelete', HttpRequest::METH_POST);
		$r->setOptions(array('cookies' => array('lang' => 'de')));
		$r->addPostFields(array('measure' => $medida, 'brand' => $marca, 'image' => $imagen, 'name' => $nombre, 'number' => $numero, 'quantity' => $cantidad, 'description' => $descripcion, 'featured' => $destacado, 'price' => $precio));
		//$r->addPostFile('image', 'profile.jpg', 'image/jpeg');
		try {
   			$r->send()->getBody();
		} catch (HttpException $ex) {
   			echo $ex;
		}
		//var_dump($medida.$marca.$imagen.$nombre.$numero.$cantidad.$descripcion.$destacado.$precio);
		
		
		if (!$this->Product->exists()) {
			throw new NotFoundException(__('Invalid product'));
		}
		if ($this->Product->delete()) {
			$this->Session->setFlash(__('Product deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}

	public function internalEdit() {
		$parametros = $this->request->data;
		
		$medext = $parametros['measure'];
		$marext = $parametros['brand'];
		$imaext = $parametros['image'];
		$nomext = $parametros['name'];
		$numext = $parametros['number'];
		$canext = $parametros['quantity'];
		$desext = $parametros['description'];
		$feaext = $parametros['featured'];
		$preext = $parametros['price'];
		
		$measure = $this->Measure->find('first', array('conditions' => array("Measure.type" => $medext)));
		$brand = $this->Brand->find('first', array('conditions' => array("Brand.name" => $marext)));
		$image = $this->Image->find('first', array('conditions' => array("Image.link" => $imaext)));
		
		if($measure == NULL) {
			$measure = new Measure();
			$measure->type=$medext;
			$this->Measure->save($measure);
			$measure_id = $this->Measure->id;
		}else{
			
			$measure_id = $measure['Measure']['id'];
		}
		if($brand == NULL) {
			$brand = new Brand();
			$brand->name=$marext;
			$this->Brand->save($brand);
			$brand_id = $this->Brand->id;
		}else{
			$brand_id = $brand['Brand']['id'];
		}
		if($image == NULL) {
			$image = new Image();
			$image->link=$imaext;
			$this->Image->save($image);
			$image_id = $this->Image->id;
		}else{
			$image_id = $image['Image']['id'];
		}

		$product = $this->Product->find('first', array('conditions' => array("Product.measure_id" => $measure_id, "Product.brand_id" => $brand_id, "Product.name" => $nomext, "Product.quantity" => $canext)));

		$producto_id = $product['Product']['id'];
		$this->Product->id = $producto_id;
		$this->Product->saveField('image_id', $image_id);
		$this->Product->saveField('number',$numext);
		$this->Product->saveField('description',$desext);
		$this->Product->saveField('featured',$feaext);
		$this->Product->saveField('price',$preext);

	}

	public function mandarBdd(){
		$aisles = $this->Aisle->find('all');
		$this->set('aisles', $aisles);
		//var_dump($aisles);
		foreach ($aisles as $aisle) {
			$descripcion = $aisle['Aisle']['description'];
			$r = new HttpRequest('http://localhost/SmartApp2/aisles/externalAisleAdd', HttpRequest::METH_POST);
			$r->setOptions(array('cookies' => array('lang' => 'de')));
			$r->addPostFields(array('description' => $descripcion));
			
			try {
    			$r->send()->getBody();
			} catch (HttpException $ex) {
    		echo $ex;
			}
		}
		$barcodes = $this->Barcode->find('all');
		$this->set('barcodes', $barcodes);
		foreach ($barcodes as $barcode) {
			$numero = $barcode['Barcode']['number'];
			$producto_id = $barcode['Barcode']['product_id'];
			
			$productos = $this->Product->find('first', array('conditions' => array("Product.id" => $producto_id)));
			$producto = $productos['Product']['number'];
			
			$r = new HttpRequest('http://localhost/SmartApp2/barcodes/externalBarcodeAdd', HttpRequest::METH_POST);
			$r->setOptions(array('cookies' => array('lang' => 'de')));
			$r->addPostFields(array('numero' => $numero, 'producto' => $producto));
			try {
    			$r->send()->getBody();
			} catch (HttpException $ex) {
    		echo $ex;
			}
		}
		$positions = $this->Position->find('all');
		$this->set('positions', $positions);
		foreach ($positions as $position) {
			$descripcion = $position['Position']['description'];
			
			$r = new HttpRequest('http://localhost/SmartApp2/positions/externalPositionAdd', HttpRequest::METH_POST);
			$r->setOptions(array('cookies' => array('lang' => 'de')));
			$r->addPostFields(array('description' => $descripcion));
			
			try {
    			$r->send()->getBody();
			} catch (HttpException $ex) {
    		echo $ex;
			}
		}
		$shelves = $this->Shelf->find('all');
		$this->set('shelves', $shelves);
		foreach ($shelves as $shelf) {
			$descripcion = $shelf['Shelf']['description'];
			
			$r = new HttpRequest('http://localhost/SmartApp2/shelves/externalShelfAdd', HttpRequest::METH_POST);
			$r->setOptions(array('cookies' => array('lang' => 'de')));
			$r->addPostFields(array('description' => $descripcion));
			
			try {
    			$r->send()->getBody();
			} catch (HttpException $ex) {
    		echo $ex;
			}
		}
		$products = $this->Product->find('all');
		$this->set('products', $products);
		foreach ($products as $product) {
			$medida_id = $product['Product']['measure_id'];
			$marca_id = $product['Product']['brand_id'];
			$imagen_id = $product['Product']['image_id'];
			$nombre = $product['Product']['name'];
			$numero = $product['Product']['number'];
			$cantidad = $product['Product']['quantity'];
			$descripcion = $product['Product']['description'];
			$destacado = $product['Product']['featured'];
			$precio = $product['Product']['price'];
			
			$medidas = $this->Measure->find('first', array('conditions' => array("Measure.id" => $medida_id)));
			$medida = $medidas['Measure']['type'];
			$marcas = $this->Brand->find('first', array('conditions' => array("Brand.id" => $marca_id)));
			$marca = $marcas['Brand']['name'];
			$imagenes = $this->Image->find('first', array('conditions' => array("Image.id" => $imagen_id)));
			$imagen = $imagenes['Image']['link'];
			
			$r = new HttpRequest('http://localhost/SmartApp2/products/externalAdd', HttpRequest::METH_POST);
			$r->setOptions(array('cookies' => array('lang' => 'de')));
			$r->addPostFields(array('measure' => $medida, 'brand' => $marca, 'image' => $imagen, 'name' => $nombre, 'number' => $numero, 'quantity' => $cantidad, 'description' => $descripcion, 'featured' => $destacado, 'price' => $precio));
			try {
    			$r->send()->getBody();
			} catch (HttpException $ex) {
    		echo $ex;
			}
		}
		
	}
}
