<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $helpers = array('Html', 'Form');


	function add() {
	    $this->Contact->set($this->data);
	
		if ($this->Contact->validates()) {
			$this->Session->setFlash('Success.. Your request has been sent.');
	        $this->set ( 'success', 'The message was sent <br />Thank you!' );
			$this->redirect(array('controller' => 'pages', 'action' => 'thanks'));
		}
		else {
			// $this->set ( 'error', 'Please complete all fields' );
			// $this->Session->setFlash('Please complete all required fields..');
	        // $this->redirect($this->referer(), null, true);
	        
	        $errors = $this->Product->invalidFields();
		    $this->Session->setFlash(implode(',', $errors)); 
		}
		
		
		/* 
		// The data is saved locally. Now we send the message via Kumutu to the Operator
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
	}
	
	
	/*
	 * Admin actions
	 */
	 	 
 	function admin_index() {
		$this->Contact->recursive = 0;
		$this->set('contacts', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Contact', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('contact', $this->Contact->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The Contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Contact->save($this->data)) {
				$this->Session->setFlash(__('The Contact has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Contact could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Contact->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Contact', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Contact->del($id)) {
			$this->Session->setFlash(__('Contact deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Contact could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>