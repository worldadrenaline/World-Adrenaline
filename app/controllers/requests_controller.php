<?php
class RequestsController extends AppController {

	var $name = 'Requests';
	var $helpers = array('Html', 'Form', 'Recaptcha.CaptchaTool');
	var $components = array(array('Recaptcha.Captcha', array(
                'private_key' => '6Lf9KgcAAAAAAFHCc0Xu5pHLAR17srqJ1eamIgFp', 
                'public_key' => '6Lf9KgcAAAAAADYWTqUyR0kYSxwbJ36ntBYAUI3r')));
                
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('add', 'test');
	}
		
	/*
    * Validate and save the request localy, then try to send via API
    */
	function add() {
		
	    $this->Request->set($this->data);
	
		if ($this->Request->validates()) {
		
			$this->Request->create();
			if ($this->Request->save($this->data)) {
			 	$data = array ( 
				 	'data' => array (
						'Prospect' => array(
							'id' => $this->data['Request']['operator_id']					
						),
						'Contact' => array (
					 		'name' => $this->data['Request']['name'],
					 		'email' => $this->data['Request']['email'],
					 	 	'phone' => $this->data['Request']['phone'],
					 		'subject' => $this->data['Request']['subject'],
					 		'message' => $this->data['Request']['message'],
					 	 	'participantsNumber' => $this->data['Request']['participantsNumber'],
						 	'isTerm' => $this->data['Request']['isTerm'],
						 	//'date' => $this->data['Request']['date'],	
						)
		 		));
		 		
				$methodUrl = 'http://api.kumutu.com/0.4/prospects/email.xml';
				//$methodUrl = 'http://kumutu:Ku7r1be@dev.kumutu.com/0.4/prospects/email.xml';
				//$methodUrl = 'http://kumutu.local/0.4/prospects/email.xml';
			 	
			 	$uri = $methodUrl.'?apikey='.Configure::read('apikey');
			 	
				App::import('Core', 'HttpSocket');
				$this->http = new HttpSocket();
				$results = $this->http->post($uri, $data);
				
				App::import('Xml');
				$parsed_xml = new Xml($results);
				$sendResults = Set::reverse($parsed_xml); 

				if (!empty($sendResults['Success'])) {
					$this->Session->setFlash('Thank you. Your request has been sent.', 'default', array('class' => 'success'));
			    } else {
    				if (!empty($sendResults['Error'])){ 
	    				$this->Session->setFlash('Your request could not be sent. Error: '. $sendResults['Error']['Message'], 'default', array('class' => 'error')); 
    				} else {
	    				$this->Session->setFlash('Your request could not be sent.', 'default', array('class' => 'error'));
    				}
                    $this->redirect($this->referer(), null, true);
			    }
				//$this->redirect(array('controller' => 'pages', 'action' => 'thanks'));
                $this->redirect($this->referer(), null, true);
									
			} else {
				$this->Session->setFlash('Your request could not be sent. Please contact us at support@kumutu.com.', 'default',array('class' => 'error'));
			}
		} else {
	        $errors = $this->Request->invalidFields();
			$this->Session->setFlash('<strong>Please correct the following</strong><ul><li>'.implode('</li><li>', $errors).'</li></ul>', 'default', array('class' => 'error'));
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