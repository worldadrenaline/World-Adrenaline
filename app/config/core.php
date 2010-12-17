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
	Configure::write('Acl.classname', 'DbAcl');
	Configure::write('Acl.database', 'default');
	Cache::config('default', array('engine' => 'File'));
?>
