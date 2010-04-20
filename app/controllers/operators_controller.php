<?php
class OperatorsController extends AppController {

	var $name = 'Operators';
	var $helpers = array('Html', 'Form');
	
	//var $components = array('Recaptcha');

	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view');
		$this->Recaptcha->publickey = "6Lf9KgcAAAAAADYWTqUyR0kYSxwbJ36ntBYAUI3r";
		$this->Recaptcha->privatekey = "6Lf9KgcAAAAAAFHCc0Xu5pHLAR17srqJ1eamIgFp"; 
	}

	function index() {
		$this->Operator->recursive = 0;
		//$this->passedArgs['limit'] = 50;
		//$this->passedArgs['order'] = array('Operator.name' => 'asc');
		
		
		//Get ActivityType requested on previous page
		$activityType = $this->params['pass']['0'];
		
		$this->paginate = array (
			'conditions' => array('ActivityType LIKE' => $activityType),
			'limit' => 50,
			'order' => array('Operator.name' => 'asc')
		);
		 
		$this->set('operators', $this->paginate());
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
	
	function sendContactRequest () {
		   /*
		    if ($this->RequestHandler->isPost()) {
	        $this->Contact->set($this->data);
	        if ($this->Contact->validates()) {
	            //send email using the Email component
	            $this->Email->to = 'ryan.off@kumutu.com';  
	            $this->Email->subject = 'Information request from ' . $this->data['Contact']['name'];  
	            $this->Email->from = $this->data['Contact']['email'];  
	            $this->Email->send($this->data['Contact']['message']);
	        }
	    }
	    */
	    
		if ($this->Contact->validates()) {
	//		$this->Session->setFlash('processing form..');
	        $this->set ( 'success', 'The message was sent <br />Thank you!' );
			$this->redirect(array('controller' => 'pages', 'action' => 'thanks'));
		}
		else {
			$this->set ( 'error', 'Please complete all fields' );
			$this->Session->setFlash('Please complete all required fields..');
            $this->redirect($this->referer(), null, true);
		}

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