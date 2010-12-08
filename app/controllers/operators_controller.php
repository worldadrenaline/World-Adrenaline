<?php
App::import('Sanitize');
class OperatorsController extends AppController {

	var $name = 'Operators';
	var $helpers = array('Html', 'Form', 'Text', 'Javascript');
    var $components = array('RequestHandler', 'Recaptcha');
    var $paginate = array('limit'=>'20','page' => 1, 'order'=>array('Operator.name'=>'asc'));
  	
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array(
    	    'index',
    	    'view',
    	    'display',
    	    'mapSearch',
    	    'markers'
	    ); 
	    
	    $this->Recaptcha->publickey = "6Lf0LroSAAAAAMBdmwWULXCsPTNI-_bRRUlNQQX2";
		$this->Recaptcha->privatekey = "6Lf0LroSAAAAABLmxIkUV8h5YTIgoAKGzU8hXvz1"; 
	}
	



	function index($activityName = null) {
        $this->pageTitle = 'Adventure Sports, Extreme Sports, Adventures Worldwide';
		//$this->set('title_for_layout', 'Adventure Sports, Extreme Sports, Adventures Worldwide');

//		if(!$this->RequestHandler->isAjax()) {
//            $this->pageTitle = 'Adventure Sports, Extreme Sports, Adventures Worldwide';
//		}

        $activityID = null;
        $country = '';

        //Filters for operators listing
        $conditions = '';
        if(isset($this->data)) {
            
            if (!empty($this->data['Operator']['q']) && !empty($this->data['Operator']['field'])) {
                $field = $this->data['Operator']['field'];
                $conditions['Operator.'.$field.' LIKE'] = '%'.$this->data['Operator']['q'].'%';
            }
            if (!empty($this->data['Operator']['country'])) {
                $conditions['Operator.country_id'] = $this->data['Operator']['country'];
                $country = $this->data['Operator']['country'];
            }
            if (!empty($this->data['Operator']['activityType'])) {
                $conditions['Operator.activity_type_id'] = $this->data['Operator']['activityType'];
        		$activityTypeName = $this->Operator->ActivityType->field('name', array('ActivityType.id' => $this->data['Operator']['activityType']));
        		$activityID = $this->data['Operator']['activityType'];
            }
        } 

       if (isset($this->params['named']['country'])) {
       		// Get country id from country shortname
    		$country = $this->Operator->Country->field('id', array('Country.shortname' => $this->params['named']['country']	));
            $conditions['Operator.country_id'] = $country;
       }

       if (isset($this->params['named']['activity'])) {
       		// Get activity id from activity shortname
    		$activityID = $this->Operator->ActivityType->field('id', array('ActivityType.shortname' => $this->params['named']['activity']	));
            $conditions['Operator.activity_type_id'] = $activityID;
       }
       
       if (isset($activityName)) {
       		$activityID = $this->Operator->ActivityType->field('id', array('ActivityType.shortname' => $activityName ));
            $conditions['Operator.activity_type_id'] = $activityID;
       }
       
		$this->paginate = array(        
            'recursive' => 0,
			'limit' => 50,
            'conditions' => $conditions,
			'order' => array('Operator.source' => 'asc', 'Operator.name' => 'asc')
		);    
			
		$operators = $this->paginate('Operator');
		
		// Create list of activityTypes
    	$activityTypes = $this->Operator->ActivityType->find('list', array('order'=>'name ASC'));       

		// Create list of countries
		$countries = $this->Operator->Country->find('list', array('order'=>'name ASC'));
		
		// Get full name of activity type
		if (!isset($activityTypeName) && !empty($activityID)) {
    		$activityTypeName = $this->Operator->ActivityType->field('name', array('ActivityType.id' => $activityID));
		}
		
        $this->set(compact('operators', 'countries', 'country', 'activityTypes', 'activityID', 'activityType', 'activityTypeName'));

	}

	function view($id = null) {
        $this->pageTitle = 'Adventure Sports, Extreme Sports, Adventures Worldwide';

		if (!$id) {
			$this->Session->setFlash(__('Invalid Operator', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('operator', $this->Operator->read(null, $id));
		
		//Get list of associated activities
		$activities = $this->Operator->Activity->find('all', array(
            'recursive' => 0,
            'order' => 'Activity.name',
            'conditions' => array(
                'Activity.operator_id' => $id
            )
		));
        $this->set(compact('activities'));

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
	
	
	/**
	 * Search by Google Map
	 * 
	 * @return void
	 */
	function mapSearch() {
	    $operators = $this->Operator->find('all', array());
	    
	    $mapKey = Configure::read('Map.key');

        $this->set(compact('suppliers', 'mapKey'));
	}	

	/**
	 * Output xml for google map
	 * 
	 * @return void
	 */
	function markers() {
        //debug logs will destroy xml format, make sure we are not in debug mode
        Configure::write ('debug', 0);

	    $operators = $this->Operator->find('all', array(
            'recursive' => 0,
            'limit' => 1000,
            'conditions' => array (
                'Operator.latitude NOT' => '',
                'Operator.longitude NOT' => ''

            ),
            'order' => 'Operator.name'
	    ));
        $this->set(compact('operators'));
        
        $this->RequestHandler->respondAs('xml');
	}

}
?>