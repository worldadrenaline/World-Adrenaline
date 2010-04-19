<?php
class UsersController extends AppController {

	var $name = 'Users';
	var $helpers = array('Html', 'Form');
	
	function beforeFilter() {
	    parent::beforeFilter();
   	    $this->Auth->allowedActions = array('login', 'logout');
	    //$this->Auth->allow('*');
	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->User->create();
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid User', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('The User has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The User could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for User', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->User->del($id)) {
			$this->Session->setFlash(__('User deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The User could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function login() {
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('You are logged in! <a href="/users/logout">Logout</a>');
			//$this->redirect('/', null, false);
		} 
	}
	 
	function logout() {
		$this->Session->setFlash('You are now logged out. Good-Bye');
		$this->redirect($this->Auth->logout());
	}
	
	function initAcl() {
	    $group =& $this->User->Group;
	    //Allow admins to everything
	    $group->id = 1;     
	    $this->Acl->allow($group, 'controllers');
	 
	    //allow managers to activityTypes and widgets
	    $group->id = 2;
	    $this->Acl->deny($group, 'controllers');
	    $this->Acl->allow($group, 'controllers/ActivityTypes');
	    $this->Acl->allow($group, 'controllers/Countries');
   	    $this->Acl->allow($group, 'controllers/Operators');

	 
	    //allow users to only add and edit on posts and widgets
	    $group->id = 3;
	    $this->Acl->deny($group, 'controllers');        
	    $this->Acl->allow($group, 'controllers/Operators/add');
	    $this->Acl->allow($group, 'controllers/Operators/edit');        
	    $this->Acl->allow($group, 'controllers/Countries/add');
	    $this->Acl->allow($group, 'controllers/Countries/edit');
   	    $this->Acl->allow($group, 'controllers/ActivityTypes/add');
	    $this->Acl->allow($group, 'controllers/ActivityTypes/edit');
	}
	

}
?>