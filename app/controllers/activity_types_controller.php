<?php
class ActivityTypesController extends AppController {

	var $name = 'ActivityTypes';
	var $helpers = array('Html', 'Form');
    var $uses = array('ActivityType', 'Operator'); 


	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view');
	}

	function index() {
        //Listing activity types
        $activities = $this->ActivityType->find('all', array(
            'recursive' => 0,
            'order' => 'name'
        ));
		
		foreach ($activities as $activity) {
            $activityCount = $this->Operator->find('count', array(
                'recursive' => 0,
                'conditions' => array( 
                    'Operator.activity_type_id'=>$activity['ActivityType']['id']
                )
            ));
            $activity['ActivityType']['count'] = $activityCount;
            
            if ($activityCount > 0) { $activityTypes[] = $activity; }		  
		}

		$this->set(compact('activityTypes'));
		
	}
	
	/*
	 * Admin functions
	 */
	
	function admin_index() {
		$this->ActivityType->recursive = 0;
		$this->passedArgs['limit'] = 200; 
		$this->passedArgs['order'] = array('ActivityType.name' => 'asc'); 
		$this->set('activityTypes', $this->paginate());
	}
	
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid ActivityType', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('activityType', $this->ActivityType->read(null, $id));
	}

	function admin_add() {
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

	function admin_edit($id = null) {
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

	function admin_delete($id = null) {
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