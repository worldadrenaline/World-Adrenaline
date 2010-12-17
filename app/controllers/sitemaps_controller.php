<?php
class SitemapsController extends AppController{

    var $name = 'Sitemaps';
    var $uses = array('ActivityType', 'Operator');
    //var $helpers = array('Time');
    var $components = array('RequestHandler');
    
	function beforeFilter() {
	    parent::beforeFilter(); 
	    $this->Auth->allowedActions = array('index');
	}

    function index (){ 
        $this->set('activityTypes', $this->ActivityType->find('all', array('fields' => array('id','name','shortname'))));
        $this->set('operators', $this->Operator->find('all', array('fields' => array('id','name','city','modified'))));
//debug logs will destroy xml format, make sure were not in drbug mode
Configure::write ('debug', 0);
    }
}
?>