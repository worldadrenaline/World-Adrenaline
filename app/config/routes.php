<?php
/* SVN FILE: $Id$ */
/**
 * Short description for file.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different urls to chosen controllers and their actions (functions).
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) :  Rapid Development Framework (http://www.cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @filesource
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://www.cakefoundation.org)
 * @link          http://www.cakefoundation.org/projects/info/cakephp CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.2.9
 * @version       $Revision$
 * @modifiedby    $LastChangedBy$
 * @lastmodified  $Date$
 * @license       http://www.opensource.org/licenses/mit-license.php The MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/views/pages/home.ctp)...
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'display', 'home'));
/**
 * ...and connect the rest of 'Pages' controller's urls.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));
	
/**
 * View an operator's profile
 */
 	Router::connect('/operator/:id-:shortname', array('controller' => 'operators', 'action' => 'view'), array( 'pass' => array('id'), 'id' => '[0-9]+'));

/**
 * Listing of operators based on ActivityType
 */
 	Router::connect('/activity/:activityType/*', array('controller' => 'operators', 'action'=>'index'), array('pass'=>array('activityType'), 'activityType'=>'[a-z]+-?[a-z]+'));

	
/**
 *  Static routes for simple pages.
 */
 	Router::connect ('/about', array('controller'=>'pages', 'action'=>'display', 'about'));
	Router::connect('/contact',	array('controller' => 'pages', 'action' => 'display', 'contact'));
	Router::connect('/thanks',	array('controller' => 'pages', 'action' => 'display', 'thanks'));
	Router::connect('/termsofuse',	array('controller' => 'pages', 'action' => 'display', 'termsofuse'));
	
/**
 *  Redirect the admin area to the users controller.
 */
	Router::connect('/admin', array('controller' => 'users', 'admin' => true));

			
?>