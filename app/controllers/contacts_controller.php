<?php
class ContactsController extends AppController {
	var $name = 'Contacts';
	var $helpers = array('Html', 'Form', 'Text', 'Number', 'Javascript');
	var $components = array('Auth', 'Acl', 'RequestHandler', 'Mailer', 'Recaptcha');

    function beforeFilter() {
    
        parent::beforeFilter(); 
        $this->Auth->allowedActions = array(
            'add',
            'contact'
        );
       
	    $this->Recaptcha->publickey = "6Lfqwb8SAAAAAFXVVDRwnAR5BZa5fa4tkaE_T40g";
		$this->Recaptcha->privatekey = "6Lfqwb8SAAAAAKw0h6AYGMVTrvwLenny0BFbNITk"; 

    }


    function contact() {
        if ($this->RequestHandler->isPost()) {
            $this->Contact->set($this->data);
            if ($this->Contact->validates()) {
                
                if($this->Recaptcha->valid($this->params['form'])) {

                    $name       = $this->data['Contact']['name'];
                    $email      = $this->data['Contact']['email'];
                    $subject    = $this->data['Contact']['subject'];
                    $message    = $this->data['Contact']['message'];
                    
                    $this->Mailer->to = Configure::read('Email.support');
                    $this->Mailer->subject = "WorldAdrenaline Contact Form: ".$subject;
                    $this->Mailer->template = 'contact';
                    $this->Mailer->layout = 'default';
                    $this->Mailer->sendAs = 'text';
                    $this->Mailer->replyTo = $email;
    
                    $this->set(compact('name', 'email', 'subject', 'message'));
                    //return $this->Mailer->send();
                    
                    if (!$this->Mailer->send()) {
                        $this->Session->setFlash(__('Oops! There was a problem sending your message. We would love to know about this problem, please e-mail support@worldadrenaline.com and tell us what error you received.', true));
                    }
                    else {
                        $this->Session->setFlash(__('We have received your message. We will respond to your enquiry as soon as we can.', true));
                        $this->redirect('/');
                    }
                } else {
                
                    $this->Session->setFlash(__('The captcha was entered incorrectly. Please try agian.', true));
                } 
            }
            else {
                $this->Session->setFlash(__('Please correct the errors on the form below and try again.', true));
            }
        }
    }



    /**
     * Basic contact form.
     * 
     * @return void
     */

/*
    function contact() {
   
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
*/
    /**
     * Send contact form submission to Kumutu.
     * 
     * @return Boolean
     */
/*    private function sendContactEmail() {
        
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
*/	
}
?>