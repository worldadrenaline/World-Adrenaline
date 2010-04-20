<?php 
class Contact extends AppModel {
    
    var $useTable = false;
    var $_schema = array(
        'name'      =>array('type'=>'string', 'length'=>100), 
        'email'     =>array('type'=>'string', 'length'=>255), 
        'phone'     =>array('type'=>'string', 'length'=>255),
        'date'      =>array('type'=>'date'),
        'participantsNumber'     =>array('type'=>'string', 'length'=>255),
        'isTerm'    =>array('type'=>'boolean'),
        'subject'   =>array('type'=>'text'),
        'message'   =>array('type'=>'text')
    );
    
    var $validate = array(
        'name' => array(
            'rule'=>array('minLength', 1), 
            'message'=>'Name is required'
        ),
        'email' => array(
            'rule'=>'email', 
            'message'=>'Valid email address required'
        ),
        'subject' => array(
            'rule'=>array('minLength', 1), 
            'message'=>'Subject is required'
        ),
        'message' => array(
            'rule'=>array('minLength', 1), 
            'message'=>'Message is required'
        ),
        'date' => array(
            'rule'=>'date', 
            'message'=>'Valid date is required'
        ),
        'phone' => array(
           'notEmpty'=>array(
                'rule' => 'notEmpty', 
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Phone number is required'
            ),
            'validCharacters'=>array(
                'rule' => '/^[+\s\(\)0-9]+$/i', 
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Accepted characters: 0-9 + ( ) space.'
            )
         ),
         'participantsNumber' => array(
            'notEmpty'=>array(
                'rule' => 'notEmpty', 
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Number of participants is required'
            ),
            'validCharacters'=>array(
                'rule' => array('inList', array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10+')), 
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Accepted options: 1-10+'
            )
         ),
         'isTerm' => array(
            'isTrue'=>array(
                'rule' => array('equalTo', '1'), 
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Terms must be accepted'
            ),
            'isBoolean'=>array(
                'rule' => array('boolean'), 
                'required' => true,
                'allowEmpty' => false,
                'message' => 'Incorrect value for accepting terms'
            )
         )
    );
}
?>