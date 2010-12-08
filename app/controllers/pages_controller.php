<?php
class PagesController extends AppController {
	var $name = 'Pages';
	var $helpers = array('Html', 'Form', 'Text', 'Number');
	var $uses = array('Operator', 'Country', 'ActivityType');
	var $components = array('Auth', 'Acl', 'RequestHandler', 'Mailer');


    function beforeFilter() {
    
        parent::beforeFilter(); 
        $this->Auth->allowedActions = array(
            'display', 
            'home',
            'contact'
        );
    }

	function home() {
        $this->pageTitle = 'Adventure Sports, Extreme Sports, Adventures Worldwide';
        //$this->set('title_for_layout', 'Adventure Sports, Extreme Sports, Adventures Worldwide');

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
		
		
		//Get 3 featured operators
		$featuredOperators = $this->Operator->find('all', array(
            'recursive' => 0,
            'limit' => 3,
            //'order' => array('Operator.source' => 'asc', 'Operator.name' => 'asc'),
		    'order'=>'RAND()',
            'conditions' => array(
                'Operator.source' => 'kumutu'
        )));
		$this->set(compact('featuredOperators'));
    }

    /**
     * Basic contact form.
     * 
     * @return void
     */
    function contact() {
   
    //debug('TEST'); die;
    
        if (!empty($this->data)) {
            
            $this->Page->set($this->data);
            $this->Page->validationSet = 'Contact';
            
            if ($this->Page->validates()) {
                
                if (!$this->sendContactEmail()) {
                    $this->Session->setFlash(__('Oops! There was a problem sending your message through to us. We would love to know about this problem, please e-mail support@worldadrenaline.com and tell us if the problem persists.', true));
                }
                else {
                    $this->Session->setFlash(__('We have received your message. We will respond to your enquiry as soon as we can.', true));
                    $this->redirect(array('action'=>'display', 'home'));
                }
            }
            else {
                $this->Session->setFlash(__('Please correct the errors on the form and try again.', true));
            }
        }
    }

    /**
     * Send contact form submission to Kumutu.
     * 
     * @return Boolean
     */
    private function sendContactEmail() {
        
        $name       = $this->Page->data['Page']['name'];
        $email      = $this->Page->data['Page']['email'];
        $subject    = $this->Page->data['Page']['subject'];
        $message    = $this->Page->data['Page']['message'];
        
        $this->Mailer->to = Configure::read('Email.support');
        $this->Mailer->subject = "WorldAdrenaline Contact Form: ".$subject;
        $this->Mailer->template = 'contact';
        $this->Mailer->layout = 'default';
        $this->Mailer->sendAs = 'text';
        $this->Mailer->replyTo = $email;

        $this->set(compact('name', 'email', 'subject', 'message'));
        return $this->Mailer->send();
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