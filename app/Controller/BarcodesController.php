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
		if (!$this->Barcode->exists()) {
			throw new NotFoundException(__('Invalid barcode'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Barcode->save($this->request->data)) {
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
