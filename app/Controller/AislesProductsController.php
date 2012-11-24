<?php
App::uses('AppController', 'Controller');
/**
 * AislesProducts Controller
 *
 * @property AislesProduct $AislesProduct
 */
class AislesProductsController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->AislesProduct->recursive = 0;
		$this->set('aislesProducts', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->AislesProduct->id = $id;
		if (!$this->AislesProduct->exists()) {
			throw new NotFoundException(__('Invalid aisles product'));
		}
		$this->set('aislesProduct', $this->AislesProduct->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->AislesProduct->create();
			if ($this->AislesProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The aisles product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aisles product could not be saved. Please, try again.'));
			}
		}
		$products = $this->AislesProduct->Product->find('list');
		$aisles = $this->AislesProduct->Aisle->find('list');
		$positions = $this->AislesProduct->Position->find('list');
		$shelves = $this->AislesProduct->Shelf->find('list');
		$this->set(compact('products', 'aisles', 'positions', 'shelves'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->AislesProduct->id = $id;
		if (!$this->AislesProduct->exists()) {
			throw new NotFoundException(__('Invalid aisles product'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->AislesProduct->save($this->request->data)) {
				$this->Session->setFlash(__('The aisles product has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The aisles product could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->AislesProduct->read(null, $id);
		}
		$products = $this->AislesProduct->Product->find('list');
		$aisles = $this->AislesProduct->Aisle->find('list');
		$positions = $this->AislesProduct->Position->find('list');
		$shelves = $this->AislesProduct->Shelf->find('list');
		$this->set(compact('products', 'aisles', 'positions', 'shelves'));
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
		$this->AislesProduct->id = $id;
		if (!$this->AislesProduct->exists()) {
			throw new NotFoundException(__('Invalid aisles product'));
		}
		if ($this->AislesProduct->delete()) {
			$this->Session->setFlash(__('Aisles product deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Aisles product was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
