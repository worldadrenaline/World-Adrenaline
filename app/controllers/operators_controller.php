<?php
class OperatorsController extends AppController {

	var $name = 'Operators';
	var $helpers = array('Html', 'Form', 'Javascript');

    var $components = array('RequestHandler', 'Recaptcha');
    var $paginate = array('limit'=>'20','page' => 1, 'order'=>array('Operator.name'=>'asc')); 
  	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view', 'display'); 
	    
	    $this->Recaptcha->publickey = "6Lf0LroSAAAAAMBdmwWULXCsPTNI-_bRRUlNQQX2";
		$this->Recaptcha->privatekey = "6Lf0LroSAAAAABLmxIkUV8h5YTIgoAKGzU8hXvz1"; 
	}
	

	function index($activityType = null) {
		
		if(!$this->RequestHandler->isAjax()) {
	        $this->pageTitle = "Operator List";    
		}

		//Check for activityType, otherwise redirect to homepage
		if (!$activityType) {
			$this->Session->setFlash(__('No activity type is selected. Please select an activity type.', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'display','home'));
		}

        // Set up conditions based on filter form
        $conditions = array();
        $country = '';
		
		if (isset($this->data)) {
			$country = $this->data['Operator']['country'];
			$activityType = $this->data['Operator']['activityType'];
			$conditions = array ('Operator.country_id =' => $this->data['Operator']['country'], 'ActivityType.shortname =' => $activityType);
			if ($country==''){ $conditions = array ('ActivityType.shortname =' => $activityType); }
			$this->params['pass']['1'] = $this->data['Operator']['country'];
		} 
		elseif (isset($this->params['pass']['1'])) {
			$country = $this->params['pass']['1']; 
			$conditions = array ('Operator.country_id =' => $country, 'ActivityType.shortname =' => $activityType);
		}
		else {
	        $conditions = array ('ActivityType.shortname =' => $activityType);
		}

		
		// Create list of countries
	    $countries = $this->Operator->Country->find('list');

		// Create list of activityTypes
	    $activityTypes = $this->Operator->ActivityType->find('first', array('conditions' => array('ActivityType.shortname =' => $activityType)));

        // Paginate Operators
        $this->paginate = array (
			'conditions' => $conditions,
			'limit' => 50,
			'order' => array('Operator.name' => 'asc')
		);
                
        $data = array (
			'operators' => $this->paginate(),
			'countries' => $countries,
			'activityTypeName' => $activityTypes['ActivityType']['name'],
			'country' => $country,
			'activityType' => $activityType
		);
        
        $this->set($data);
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Operator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('operator', $this->Operator->read(null, $id));
	}

	function admin_index () {
		$this->Operator->recursive = 0;
		$this->set('operators', $this->paginate());
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Operator->create();
			if ($this->Operator->save($this->data)) {
				$this->Session->setFlash(__('The Operator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Operator could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Operator', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Operator->save($this->data)) {
				$this->Session->setFlash(__('The Operator has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Operator could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Operator->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Operator', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Operator->del($id)) {
			$this->Session->setFlash(__('Operator deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Operator could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>