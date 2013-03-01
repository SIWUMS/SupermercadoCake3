<?php
App::uses('AppController', 'Controller');
/**
 * Shelves Controller
 *
 * @property Shelf $Shelf
 */
class ShelvesController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Shelf->recursive = 0;
		$this->set('shelves', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Shelf->id = $id;
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		$this->set('shelf', $this->Shelf->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Shelf->create();
			if ($this->Shelf->save($this->request->data)) {
				
				$estante = $this->request->data;
				$descripcion = $estante['Shelf']['description'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/shelves/externalShelfAdd', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('description' => $descripcion));
				
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The shelf has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Shelf->id = $id;
		
		$tuplavieja = $this->Shelf->find('first', array('conditions' => array("Shelf.id" => $id)));
		$estantevieja = $tuplavieja['Shelf']['description'];
		
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Shelf->save($this->request->data)) {
				
				$estante = $this->request->data;
				$descripcion = $estante['Shelf']['description'];
				
				$r = new HttpRequest('http://localhost/SmartApp2/shelves/externalShelfEdit', HttpRequest::METH_POST);
				$r->setOptions(array('cookies' => array('lang' => 'de')));
				$r->addPostFields(array('estantevieja' => $estantevieja, 'descripcion' => $descripcion));
				
				try {
    				$r->send()->getBody();
				} catch (HttpException $ex) {
    			echo $ex;
				}
				
				$this->Session->setFlash(__('The shelf has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The shelf could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Shelf->read(null, $id);
		}
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
		$this->Shelf->id = $id;
		
		$estante = $this->Shelf->findById($id);
		$descripcion = $estante['Shelf']['description'];
		
		$r = new HttpRequest('http://localhost/SmartApp2/shelves/externalShelfDelete', HttpRequest::METH_POST);
		$r->setOptions(array('cookies' => array('lang' => 'de')));
		$r->addPostFields(array('descripcion' => $descripcion));
		
		try {
   			$r->send()->getBody();
		} catch (HttpException $ex) {
   			echo $ex;
		}
		
		if (!$this->Shelf->exists()) {
			throw new NotFoundException(__('Invalid shelf'));
		}
		if ($this->Shelf->delete()) {
			$this->Session->setFlash(__('Shelf deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Shelf was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
