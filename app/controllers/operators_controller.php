<?php
class OperatorsController extends AppController {

	var $name = 'Operators';
	var $helpers = array('Html','Form','Javascript');
    var $components = array('RequestHandler');
	//var $components = array('Recaptcha');
    //var $paginate = array('limit' => 15, 'page' => 1, 'order'=>array('name'=>'asc'));
    var $paginate = array('limit'=>'20','page' => 1, 'order'=>array('Operator.name'=>'asc')); 

    	

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view', 'display');
		//$this->Recaptcha->publickey = "6Lf9KgcAAAAAADYWTqUyR0kYSxwbJ36ntBYAUI3r";
		//$this->Recaptcha->privatekey = "6Lf9KgcAAAAAAFHCc0Xu5pHLAR17srqJ1eamIgFp"; 
	}
    
    
    function display() {
        
		// Create list of countries
	    //$countries = $this->Operator->Country->find('list');
        
        if(!$this->RequestHandler->isAjax()) {
            // things you want to do on initial page load go here
            $this->pageTitle = "Operator List";    
        }
        
        // Set up conditions based on filter form
        $conditions = array();
		if ($this->data) {
			if (!empty($this->data['activityType'])) { $conditions[] = array ('Operator.shortname =' => $this->Operator->data['activityType']); }
			if (!empty($this->data['country'])) { $conditions[] = array ('Operator.CountryID =' => $this->Operator->data['country']); }
		} else {
			if (!empty($this->params['pass']['0'])) { $this->data['activityType'] = $this->params['pass']['0'];
				//$conditions[] = array ('Operator.shortname =' => $this->data['activityType']);
			 }
		}

		echo "Conditions :";
		var_dump($conditions);
        
        
        // Paginate Operators
        $this->paginate = array (
			'conditions' => $conditions,
			'limit' => 20,
			'order' => array('Operator.name' => 'asc')
		);
        
        
        $data = array (
			'operators' => $this->paginate(),
			//'countries' => $countries
		);
        
        //$data = $this -> paginate();
        
        $this->set($data);
        
    }


	function index() {
	
		// Create list of countries
	    //$countries = $this->Operator->Country->find('list');

		//Get ActivityType requested on previous page
		
		/*
		if (!empty($this->params['pass']['0'])) { $activityType = $this->params['pass']['0']; } 
		else {
			$this->cakeError('error404');
		}
		*/
		
				
		//if (!empty($this->params['pass']['0'])) {
		//	$conditions[] = array ('shortname =' => $this->params['pass']['0'] );
		//}
		
		
		/*		
		if (!empty($this->params['pass']['1'])) {
			$conditions[] = array ('Operator.CountryID =' => $this->params['pass']['1'] );
		}
		*/
		
		//$activityType = $this->data['activityType'];
		
		echo "BEFORE:";
		print_r($this->data);

		$conditions = array();
		if ($this->data) {
			if (!empty($this->data['activityType'])) { $conditions[] = array ('Operator.shortname =' => $this->Operator->data['activityType']); }
			if (!empty($this->data['country'])) { $conditions[] = array ('Operator.CountryID =' => $this->Operator->data['country']); }
		} else {
			if (!empty($this->params['pass']['0'])) { $this->data['activityType'] = $this->params['pass']['0'];
				$conditions[] = array ('Operator.shortname =' => $this->data['activityType']);
			 }
		}
		
		echo "AFTER:";
		print_r($this->data);
		
		
		echo "Conditions :";
		var_dump($conditions);
		
		//Get ActivityType long name from argument passed
		/*
        $firstOperator = $this->Operator->find('first', array(
            'fields' => array('Operator.ActivityType', 'Operator.shortname'),
            'conditions'=>array('Operator.shortname'=>$activityType)
        ));
        */
        
        /* TODO: match up the activity type from the argument passed to the activity_types table
        $actName = $this->ActivityType->find('first', array(
            'fields' => array('ActivityType.name'),
            'conditions'=>array('ActivityType.shortname'=>$activityType)
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