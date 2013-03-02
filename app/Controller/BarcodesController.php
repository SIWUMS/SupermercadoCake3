<?php
App::uses('AppController', 'Controller');
/**
 * Barcodes Controller
 *
 * @property Barcode $Barcode
 */
class BarcodesController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
 var $uses = array('Barcode', 'Product');
 
	public function index() {
		$this->Barcode->recursive = 0;
		$this->set('barcodes', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Barcode->id = $id;
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		$this->set('barcode', $this->Barcode->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Barcode->create();
			if ($this->Barcode->save($this->request->data)) {
				
				$codigo = $this->request->data;
				$numero = $codigo['Barcode']['number'];
				$producto_id = $codigo['Barcode']['product_id'];
				
				$productos = $this->Product->find('first', array('conditions' => array("Product.id" => $producto_id)));
				$producto = $productos['Product']['number'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/barcodes/externalBarcodeAdd', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('numero' => $numero, 'producto' => $producto));
				//$r->addPostFile('image', 'profile.jpg', 'image/jpeg');
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The barcode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		}
		$products = $this->Barcode->Product->find('list');
		$this->set(compact('products'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Barcode->id = $id;
		
		$tuplavieja = $this->Barcode->find('first', array('conditions' => array("Barcode.id" => $id)));
		$codigovieja = $tuplavieja['Barcode']['number'];
		
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Barcode->save($this->request->data)) {
				
				$codigo = $this->request->data;
				$numero = $codigo['Barcode']['number'];
				$producto_id = $codigo['Barcode']['product_id'];
				
				$productos = $this->Product->find('first', array('conditions' => array("Product.id" => $producto_id)));
				$producto = $productos['Product']['number'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/barcodes/externalBarcodeEdit', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('numero' => $numero, 'producto_id' => $producto_id, 'codigovieja' => $codigovieja));
				//$r->addPostFile('image', 'profile.jpg', 'image/jpeg');
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The barcode has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The barcode could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Barcode->read(null, $id);
		}
		$products = $this->Barcode->Product->find('list');
		$this->set(compact('products'));
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
		$this->Barcode->id = $id;
		
		$codigo = $this->Barcode->findById($id);
		$numero = $codigo['Barcode']['number'];
		
		$r = new HttpRequest('http://localhost/SmartApp2/barcodes/externalBarcodeDelete', HttpRequest::METH_POST);
		$r->setOptions(array('cookies' => array('lang' => 'de')));
		$r->addPostFields(array('numero' => $numero));
		
		try {
   			$r->send()->getBody();
		} catch (HttpException $ex) {
   			echo $ex;
		}
		
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->Barcode->delete()) {
			$this->Session->setFlash(__('Barcode deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Barcode was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
