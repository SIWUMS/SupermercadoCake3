<?php
App::uses('AppController', 'Controller');
/**
 * Measures Controller
 *
 * @property Measure $Measure
 */
class MeasuresController extends AppController {

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Measure->recursive = 0;
		$this->set('measures', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Measure->id = $id;
		if (!$this->Measure->exists()) {
			throw new NotFoundException(__('Invalid measure'));
		}
		$this->set('measure', $this->Measure->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Measure->create();
			if ($this->Measure->save($this->request->data)) {
				$this->Session->setFlash(__('The measure has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measure could not be saved. Please, try again.'));
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
		$this->Measure->id = $id;
		if (!$this->Measure->exists()) {
			throw new NotFoundException(__('Invalid measure'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Measure->save($this->request->data)) {
				$this->Session->setFlash(__('The measure has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measure could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Measure->read(null, $id);
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
		$this->Measure->id = $id;
		if (!$this->Measure->exists()) {
			throw new NotFoundException(__('Invalid measure'));
		}
		if ($this->Measure->delete()) {
			$this->Session->setFlash(__('Measure deleted'));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Measure was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
