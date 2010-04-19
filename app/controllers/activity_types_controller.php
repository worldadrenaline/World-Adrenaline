<?php
class ActivityTypesController extends AppController {

	var $name = 'ActivityTypes';
	var $helpers = array('Html', 'Form');
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view');
	}

	function index() {
		$this->ActivityType->recursive = 0;
		$this->set('activityTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ActivityType', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('activityType', $this->ActivityType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ActivityType->create();
			if ($this->ActivityType->save($this->data)) {
				$this->Session->setFlash(__('The ActivityType has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ActivityType could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid ActivityType', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ActivityType->save($this->data)) {
				$this->Session->setFlash(__('The ActivityType has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The ActivityType could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ActivityType->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for ActivityType', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->ActivityType->del($id)) {
			$this->Session->setFlash(__('ActivityType deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The ActivityType could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>