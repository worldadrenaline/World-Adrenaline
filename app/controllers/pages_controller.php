<?php
class PagesController extends AppController {
	var $name = 'Pages';
	var $helpers = array('Html', 'Form', 'Text', 'Number');
	var $uses = array('Operator', 'Country', 'ActivityType');

    function beforeFilter() {
    
        parent::beforeFilter(); 
        $this->Auth->allowedActions = array(
            'display', 
            'home'
        );
    }

	function home() {
        $this->pageTitle = 'Adventure Sports, Extreme Sports, Adventures Worldwide';
        //$this->set('title_for_layout', 'Adventure Sports, Extreme Sports, Adventures Worldwide');

	
        //Get total operators
        $totalOperators = $this->Operator->find('count');
        $totalOperators = number_format(floor($totalOperators/1000)*1000);
        $this->set(compact('totalOperators'));
       
        // Create list of countries
		$countries = $this->Country->find('list', array('order'=>'name ASC'));
        
		// Create list of activityTypes
    	$activityTypes = $this->Operator->ActivityType->find('list', array('order'=>'name ASC'));  
        
        //Listing activity types
        $activities = $this->ActivityType->find('all', array(
            'recursive' => 0,
            'order' => 'name'
        ));
		
		foreach ($activities as $activity) {
            $activityCount = $this->Operator->find('count', array(
                'recursive' => 0,
                'conditions' => array( 
                    'Operator.activity_type_id'=>$activity['ActivityType']['id']
                )
            ));
            $activity['ActivityType']['count'] = $activityCount;
            if ($activityCount > 0) { $activityTypesCount[] = $activity; }		  
		}

		$this->set(compact('activityTypes', 'countries', 'activityTypesCount'));
    }


/**
 * Displays a view
 *
 * @param mixed What page to display
 * @access public
 */
	function display() {
		$path = func_get_args();

		$count = count($path);
		if (!$count) {
			$this->redirect('/');
		}
		$page = $subpage = $title = null;

		if (!empty($path[0])) {
			$page = $path[0];
		}
		if (!empty($path[1])) {
			$subpage = $path[1];
		}
		if (!empty($path[$count - 1])) {
			$title = Inflector::humanize($path[$count - 1]);
		}
		$this->set(compact('page', 'subpage', 'title'));
		$this->render(implode('/', $path));
	}
	
}
?>