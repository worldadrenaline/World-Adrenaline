<?php
class OperatorsController extends AppController {

	var $name = 'Operators';
	var $helpers = array('Html', 'Form', 'Javascript');
//	var $helpers = array('Html', 'Form');

    var $components = array('RequestHandler', 'Recaptcha');
    var $paginate = array('limit'=>'20','page' => 1, 'order'=>array('Operator.name'=>'asc')); 
    //var $uses = array('Operator', 'Request');
  	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view', 'display'); 
	    
	    $this->Recaptcha->publickey = "6Lf0LroSAAAAAMBdmwWULXCsPTNI-_bRRUlNQQX2";
		$this->Recaptcha->privatekey = "6Lf0LroSAAAAABLmxIkUV8h5YTIgoAKGzU8hXvz1"; 
	}
	

	function index($activityType = null) {

		debug($this->data);
		
		if(!$this->RequestHandler->isAjax()) {
		}

		//Check for activityType, otherwise redirect to homepage
		if (!$activityType) {
			$this->Session->setFlash(__('No activity type is selected. Please select an activity', true));
			$this->redirect(array('controller' => 'pages', 'action' => 'display','home'));
		}

        // Set up conditions based on filter form
        $conditions = array();
        $country = '';
		
		if (isset($this->data)) {
			$country = $this->data['Operator']['country'];
			$activityType = $this->data['Operator']['activityType'];
			$conditions = array ('Operator.country_id =' => $country, 'ActivityType.shortname =' => $activityType); 
		} 
		else {
				//$activityType = $this->params['pass']['0'];
		        $conditions = array ('ActivityType.shortname =' => $activityType);
		}
		
		debug($this->params);
		debug($activityType);
		debug($country);
		debug($this->data);
		
		// Create list of countries
	    $countries = $this->Operator->Country->find('list');

        if(!$this->RequestHandler->isAjax()) {
            // things you want to do on initial page load go here
            $this->pageTitle = "Operator List";    
        }

		debug($conditions);

        
        // Paginate Operators
        $this->paginate = array (
			'conditions' => $conditions,
			'limit' => 20,
			'order' => array('Operator.name' => 'asc')
		);
        
        
        $data = array (
			'operators' => $this->paginate(),
			'countries' => $countries,
			'activityType' => $activityType,
			'country' => $country
		);
        
        //$data = $this -> paginate();
        
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