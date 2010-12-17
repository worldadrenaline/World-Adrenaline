<?php
class ActivitiesController extends AppController {

	var $name = 'Activities';
	var $helpers = array('Html', 'Form');

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('view');
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Activity.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('activity', $this->Activity->read(null, $id));
		
        //Get associated operator data
		$operatorID = $this->Activity->read('Activity.operator_id');
		$operator = $this->Activity->Operator->find('first', array(
            'recursive' => 0,
            'conditions' => array(
                'Operator.id' => $operatorID['Activity']['operator_id']
            )
		));
		$this->set(compact('operator'));
	}
	
	function admin_index() {
		$this->Activity->recursive = 0;
		$this->set('activities', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Activity.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->set('activity', $this->Activity->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Activity->create();
			if ($this->Activity->save($this->data)) {
				$this->Session->setFlash(__('The Activity has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Activity could not be saved. Please, try again.', true));
			}
		}
		$operators = $this->Activity->Operator->find('list');
		$activityTypes = $this->Activity->ActivityType->find('list');
		$this->set(compact('operators', 'activityTypes'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Activity', true));
			$this->redirect(array('action'=>'index'));
		}
		if (!empty($this->data)) {
			if ($this->Activity->save($this->data)) {
				$this->Session->setFlash(__('The Activity has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The Activity could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Activity->read(null, $id);
		}
		$operators = $this->Activity->Operator->find('list');
		$activityTypes = $this->Activity->ActivityType->find('list');
		$this->set(compact('operators','activityTypes'));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Activity', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Activity->del($id)) {
			$this->Session->setFlash(__('Activity deleted', true));
			$this->redirect(array('action'=>'index'));
		}
	}

}
?>