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
		if (!$this->Aisle->exists()) {
			throw new NotFoundException(__('Invalid aisle'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Aisle->save($this->request->data)) {
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
