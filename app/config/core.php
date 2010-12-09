<?php
	Configure::write('debug', 0);
	Configure::write('App.encoding', 'UTF-8');
	Configure::write('Routing.admin', 'admin');

	define('LOG_ERROR', 2);
	Configure::write('Session.save', 'php');
	Configure::write('Session.cookie', 'WA');
	Configure::write('Session.timeout', '1200');
	Configure::write('Session.start', true);
	Configure::write('Session.checkAgent', true);
	Configure::write('Security.level', 'medium');
	Configure::write('Security.salt', '4030cf26e4ed7dd97901903eb47c2fa1df514e3b');	
	Configure::write('apikey', '10132293094ba6bd772192f4.29432906');
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');
	Cache::config('default', array('engine' => 'File'));

    Configure::write('Map.key', 'ABQIAAAAy4mQ_lrIPv1G7HcisbJ5yBR9mADHgBYGD-uBjKNKHtU_AJ5QJhQXQygCS5whAa3BN8yMVmtcPQPwkg');
    
    
    /*
    * Set Developer email for emails to be sent to in dev environments
    */
    Configure::write('Email.support', 'Kumutu Support <ryan.off@kumutu.com>');
    
    /*
    * Set smtp user details
    */
    Configure::write('Smtp.host', 'mail.kumutu.com');
    Configure::write('Smtp.username', 'kumutu.bot');
    Configure::write('Smtp.password', 'Kub07m@il');
?>
