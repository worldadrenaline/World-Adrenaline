<?php
App::import('Component', 'Email');

class MailerComponent extends EmailComponent
{
    var $from = 'Kumutu <noreply@kumutu.com>';
    var $replyTo = 'noreply@kumutu.com';
    var $sendAs = 'both';
    var $delivery = 'smtp';
    var $xMailer = 'Postman';
    var $smtpOptions = array(
        'port'=> 25,
        'host' => null,
        'timeout' => 30,
        'username' => null,
        'password' => null
    );
    
    /**
     * Startup component, set smtp options from config
     *
     * @param object $controller Instantiating controller
     * @access public
     */
    function startup(&$controller) {
        $this->smtpOptions['host']      = Configure::read('Smtp.host');
        $this->smtpOptions['username']  = Configure::read('Smtp.username');
        $this->smtpOptions['password']  = Configure::read('Smtp.password');
    }

    /**
     * If in debug mode environment (dev), send emails to developer email address.
     * (non-PHPdoc)
     * @see cake/libs/controller/components/EmailComponent#send($content, $template, $layout)
     */    
    function send($content = null, $template = null, $layout = null) {
    	
        //When in debug mode send emails to developer
        if (Configure::read('debug') > 0) {
            $this->subject = $this->subject.' [DEBUG MODE: '.$this->to.']';
            $this->to = Configure::read('Email.support');
        }
        return parent::send($content = null, $template = null, $layout = null);
    }
    
    /**
     * Sends out email via SMTP
     *
     * @return bool Success
     * @access private
     */
    function __smtp() {
        App::import('Core', array('Socket'));

        $this->__smtpConnection =& new CakeSocket(array_merge(array('protocol'=>'smtp'), $this->smtpOptions));

        if (!$this->__smtpConnection->connect()) {
            $this->smtpError = $this->__smtpConnection->lastError();
            return false;
        } elseif (!$this->__smtpSend(null, '220')) {
            return false;
        }

        if (isset($this->smtpOptions['client'])) {
            $host = $this->smtpOptions['client'];
        } else {
            $host = env('HTTP_HOST');
        }

        if (!$this->__smtpSend("EHLO {$host}", '250')) {
            return false;
        }

        if (isset($this->smtpOptions['username']) && isset($this->smtpOptions['password'])) {
            $authRequired = $this->__smtpSend('AUTH LOGIN', '334|503');
            if ($authRequired == '334') {
                if (!$this->__smtpSend(base64_encode($this->smtpOptions['username']), '334')) {
                    return false;
                }
                if (!$this->__smtpSend(base64_encode($this->smtpOptions['password']), '235')) {
                    return false;
                }
            } elseif ($authRequired != '503') {
                return false;
            }
        }

        if (!$this->__smtpSend('MAIL FROM: ' . $this->__formatAddress($this->from, true))) {
            return false;
        }

        if (!$this->__smtpSend('RCPT TO: ' . $this->__formatAddress($this->to, true))) {
            return false;
        }

        foreach ($this->cc as $cc) {
            if (!$this->__smtpSend('RCPT TO: ' . $this->__formatAddress($cc, true))) {
                return false;
            }
        }
        foreach ($this->bcc as $bcc) {
            if (!$this->__smtpSend('RCPT TO: ' . $this->__formatAddress($bcc, true))) {
                return false;
            }
        }

        if (!$this->__smtpSend('DATA', '354')) {
            return false;
        }

        $header = implode("\r\n", $this->__header);
        $message = implode("\r\n", $this->__message);
        if (!$this->__smtpSend($header . "\r\n\r\n" . $message . "\r\n\r\n\r\n.")) {
            return false;
        }
        $this->__smtpSend('QUIT', false);

        $this->__smtpConnection->disconnect();
        return true;
    }
}
?>