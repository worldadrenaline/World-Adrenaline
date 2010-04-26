<?php
class OperatorsController extends AppController {

	var $name = 'Operators';
	var $helpers = array('Html', 'Form');
    	
	//var $components = array('Recaptcha');

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view');
		//$this->Recaptcha->publickey = "6Lf9KgcAAAAAADYWTqUyR0kYSxwbJ36ntBYAUI3r";
		//$this->Recaptcha->privatekey = "6Lf9KgcAAAAAAFHCc0Xu5pHLAR17srqJ1eamIgFp"; 
	}

	function index() {
	
		// Create list of countries
	    $countries = $this->Operator->Country->find('list');

		//Get ActivityType requested on previous page
		
		/*
		if (!empty($this->params['pass']['0'])) { $activityType = $this->params['pass']['0']; } 
		else {
			$this->cakeError('error404');
		}
		*/
		
				
		//if (!empty($this->params['pass']['0'])) {
		//	$conditions[] = array ('slug =' => $this->params['pass']['0'] );
		//}
		
		
		/*		
		if (!empty($this->params['pass']['1'])) {
			$conditions[] = array ('Operator.CountryID =' => $this->params['pass']['1'] );
		}
		*/
		
		//$activityType = $this->data['activityType'];
		
		$conditions = array();

		if (!empty($this->data['activityType'])) {
			$conditions[] = array ('slug =' => $this->data['activityType']);
		}
		else {
			$this->data['activityType'] = $this->params['pass']['0'];
			$conditions[] = array ('slug =' => $this->data['activityType']);
		}
		
						
		if (!empty($this->params['pass']['1'])) {
			$conditions[] = array ('Operator.CountryID =' => $this->data['country']);
		}

		
		//Get ActivityType long name from argument passed
		/*
        $firstOperator = $this->Operator->find('first', array(
            'fields' => array('Operator.ActivityType', 'Operator.slug'),
            'conditions'=>array('Operator.slug'=>$activityType)
        ));
        */
        
        /* TODO: match up the activity type from the argument passed to the activity_types table
        $actName = $this->ActivityType->find('first', array(
            'fields' => array('ActivityType.name'),
            'conditions'=>array('ActivityType.slug'=>$activityType)
        ));
		*/
	
//		$this->Operator->recursive = 0;
			
		$this->paginate = array (
			'conditions' => $conditions,
			'limit' => 20,
			'order' => array('Operator.name' => 'asc')
		);
		
		/*
		$data = array (
			'operators' => $this->paginate(),
			'firstOperator' => $firstOperator,
			'activityType' => $activityType
		);
		*/
		 
		 $data = array (
			'operators' => $this->paginate(),
			'countries' => $countries
			);
		 $this->set($data);
		//$this->set('operators', $this->paginate());
	}
	
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Operator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('operator', $this->Operator->read(null, $id));
		
		
		//Validate form with reCaptcha
		/*
		if($this->Recaptcha->valid($this->params['form'])) {
			//submission is valid!
		} 
		else {
		  //invalid reCAPTCHA entry. 
		}
		*/
				
	}
		
	
	/*
	 * Admin functions
	 */
	 
	function admin_index() {
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