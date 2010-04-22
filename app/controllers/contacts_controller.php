<?php
class ContactsController extends AppController {

	var $name = 'Contacts';
	var $helpers = array('Html', 'Form');
	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('add');
	}


	function add() {
	    $this->Contact->set($this->data);
	
		if ($this->Contact->validates()) {
			$this->Contact->create();
			if ($this->Contact->save($this->data)) {
				// We should now send the contact via the Kumutu API to the operator
				// If it succeeds, then display the follow message
				$this->Session->setFlash(__('Success.. Your request has been sent.', true));
				$this->redirect(array('controller' => 'pages', 'action' => 'thanks'));
			} else {
				$this->Session->setFlash(__('Your request could not be sent. Please, try again.', true));
			}
		}
		else {
			// $this->redirect($this->referer(), null, true);
	        $errors = $this->Contact->invalidFields();
		    $this->Session->setFlash(implode(',', $errors));
			//The problem we have is that this is taking us to the contact add page instead of back to the original page. If a redirect, then we loose all info in form. Possibly put this code in an element on the Operator page.
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