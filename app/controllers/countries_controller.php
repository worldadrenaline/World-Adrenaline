<?php
class CountriesController extends AppController {

	var $name = 'Countries';
	var $helpers = array('Html', 'Form');
    var $uses = array('Country', 'Operator'); 

	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index', 'view');
	}

	function index() {
        //Listing countries
        $countryList = $this->Country->find('all', array(
            'recursive' => 0,
            'order' => 'name'
        ));
		
		foreach ($countryList as $country) {
            $countryCount = $this->Operator->find('count', array(
                'recursive' => 0,
                'conditions' => array( 
                    'Operator.country_id'=>$country['Country']['id']
                )
            ));
            $country['Country']['count'] = $countryCount;
            
            if ($countryCount > 0) { $countries[] = $country; }		  
		}

		$this->set(compact('countries'));
	}	
	
	/*
	 * Admin functions
	 */

	function admin_index() {
		$this->Country->recursive = 0;
		$this->set('countries', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid Country', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('country', $this->Country->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Country->create();
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('The Country has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Country could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid Country', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Country->save($this->data)) {
				$this->Session->setFlash(__('The Country has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The Country could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Country->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for Country', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->Country->del($id)) {
			$this->Session->setFlash(__('Country deleted', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('The Country could not be deleted. Please, try again.', true));
		$this->redirect(array('action' => 'index'));
	}

}
?>