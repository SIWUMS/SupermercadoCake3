<?php
App::uses('AppController', 'Controller');
/**
 * Aisles Controller
 *
 * @property Aisle $Aisle
 */
class AislesController extends AppController {

/**
 * index method
 *
 * @return void
 */
 
 var $uses = array('Aisle', 'Shelf');
 
	public function index() {
		$this->Aisle->recursive = 0;
		$this->set('aisles', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Aisle->id = $id;
		if (!$this->Aisle->exists()) {
			throw new NotFoundException(__('Invalid aisle'));
		}
		$this->set('aisle', $this->Aisle->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Aisle->create();
			if ($this->Aisle->save($this->request->data)) {
				
				$gondola = $this->request->data;
				$descripcion = $gondola['Aisle']['description'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/aisles/externalAisleAdd', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('description' => $descripcion));
				
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The aisle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aisle could not be saved. Please, try again.'));
			}
		}
		$products = $this->Aisle->Product->find('list');
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
		$this->Aisle->id = $id;
		$tuplavieja = $this->Aisle->find('first', array('conditions' => array("Aisle.id" => $id)));
		$gondolavieja = $tuplavieja['Aisle']['description'];
		
		if (!$this->Aisle->exists()) {
			throw new NotFoundException(__('Invalid aisle'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aisle->save($this->request->data)) {
				
				$gondola = $this->request->data;
				$descripcion = $gondola['Aisle']['description'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/aisles/externalAisleEdit', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('gondolavieja' => $gondolavieja, 'descripcion' => $descripcion));
				
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The aisle has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aisle could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Aisle->read(null, $id);
		}
		$products = $this->Aisle->Product->find('list');
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
		$this->Aisle->id = $id;
		
		$gondola = $this->Aisle->findById($id);
		$descripcion = $gondola['Aisle']['description'];
		
		$r = new HttpRequest('http://localhost/SmartApp2/aisles/externalAisleDelete', HttpRequest::METH_POST);
		$r->setOptions(array('cookies' => array('lang' => 'de')));
		$r->addPostFields(array('descripcion' => $descripcion));
		
		try {
   			$r->send()->getBody();
		} catch (HttpException $ex) {
   			echo $ex;
		}
		
		if (!$this->Aisle->exists()) {
			throw new NotFoundException(__('Invalid aisle'));
		}
		if ($this->Aisle->delete()) {
			$this->Session->setFlash(__('Aisle deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aisle was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
