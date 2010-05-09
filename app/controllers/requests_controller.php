<?php
class RequestsController extends AppController {

	var $name = 'Requests';
	var $helpers = array('Html', 'Form');


	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('add', 'test');
	}
	
	
	/*
	* Temp action for debug sending of request to kumutu
	*/
	function test() {
				 	$data = array(
						'Prospect' => array(
							'id' => '223837'					
						),
						'Contact' => array (
					 		'name' => 'Ryan Off',
					 		'email' => 'mail@ryanoff.com',
					 		'subject' => 'Test 20',
					 		'message' => 'This is a test message'	
						)
			 		);	 	
								
				//usr
				$methodUrl = 'http://local-kumutu/api/prospects/email.xml';
				$uri = $methodUrl.'?apikey='.Configure::read('apikey');
				
				App::import('Core', 'HttpSocket');
				$this->http = new HttpSocket();
				$results = $this->http->post($uri, $data);

				debug($results, true);
				debug($data, true, true);
	}
	
	/*
    * Validate and save the request locallys, then try to send via API
    */
	function add() {
	    $this->Request->set($this->data);
	
		if ($this->Request->validates()) {
			$this->Request->create();
			if ($this->Request->save($this->data)) {
				
				// We should now send the contact via the Kumutu API to the operator
				// sendRequest (id, name, email, phone, date, participantsNumber, message, subject);
				// If it succeeds, then display the follow message
				
				/* Debug to be removed */
				//debug($this->data);

				/*
				$data = array (
				'id' => $this->data['Request']['operatorID'],
			 	'name' => $this->data['Request']['name'],
			 	'email' => $this->data['Request']['email'],
			 	//'phone' => $this->data['Request']['phone'],
			 	//'date' => $this->data['Request']['date'],
			 	//'participantsNumber' => $this->data['Request']['participantsNumber'],
			 	'subject' => $this->data['Request']['subject'],
			 	'message' => $this->data['Request']['message']
			 	);
			 	*/
			 	
			 	//To be replaced with dynamic data above after testing
			 	$data = array(
					'Prospect' => array(
						'id' => '223837'					
					),
					'Contact' => array (
				 		'name' => 'Ryan Off',
				 		'email' => 'mail@ryanoff.com',
				 		'subject' => 'Test 20',
				 		'message' => 'This is a test message'	
					)
			 		);	 	
				
				//$url = 'http://kumutu.com/api/prospects/email.xml?apikey=17604162604ae6ffa3636d46.73439478';	
				$url = 'http://local-kumutu/api/prospects/email.xml?apikey=17604162604ae6ffa3636d46.73439478';	
				
				$methodUrl = 'http://local-kumutu/api/prospects/email.xml';
				$uri = $methodUrl.'?apikey='.Configure::read('apikey');
				
				App::import('Core', 'HttpSocket');
				$http = new HttpSocket();
				$results = $http->post($uri, $data);
				
				echo 'Debug Results: '.$results.' :';
				
				if ($this->Request->sendRequest($this->data)) {
					$this->Session->setFlash(__('Success.. Your request has been sent.', true));
					$this->redirect(array('controller' => 'pages', 'action' => 'thanks'));
				} else {
				
				$this->Session->setFlash(__('Your request was saved but not sent. We will send your request soon.', true));
				$this->redirect(array('controller' => 'pages', 'action' => 'thanks'));
				
				}
				
									
			} else {
				$this->Session->setFlash(__('Your request could not be sent. Please, try again.', true));
			}
		}
		else {
	        $errors = $this->Request->invalidFields();
		    $this->Session->setFlash(implode(',', $errors));
		}
		
	}
		
	
	/*
	 * Admin actions
	 */
	 
	function admin_index() {
		$this->Request->recursive = 0;
		$this->set('requests', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Request', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('request', $this->Request->read(null, $id));
	}



	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Request', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Request->save($this->data)) {
				$this->Session->setFlash(__('The Request has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Request could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Request->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Request', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Request->del($id)) {
			$this->Session->setFlash(__('Request deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Request could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>