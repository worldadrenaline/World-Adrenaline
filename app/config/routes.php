<?php
/**
 *  Static routes for simple pages.
 */
	Router::connect('/', array('controller' => 'pages', 'action' => 'home'));
	Router::connect('/activities',	array('controller' => 'activityTypes', 'action' => 'index'));
 	Router::connect('/about', array('controller'=>'pages', 'action'=>'display', 'about'));
	Router::connect('/contact',	array('controller' => 'pages', 'action' => 'display', 'contact'));
	Router::connect('/thanks',	array('controller' => 'pages', 'action' => 'display', 'thanks'));
	Router::connect('/termsofuse',	array('controller' => 'pages', 'action' => 'display', 'termsofuse'));
	Router::connect('/map',	array('controller' => 'operators', 'action' => 'mapSearch'));


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
 	Router::connect('/activity/:activityType/*', array('controller' => 'operators', 'action'=>'index'), array('pass'=>array('activityType'), 'activityType'=>'[a-z0-9-]+'));

/**
 *  Redirect the admin area to the users controller.
 */
	Router::connect('/admin', array('controller' => 'users', 'admin' => true));

/**
 * XML routes
 */
	Router::parseExtensions('xml');

/**
 * Sitemap routes
 */
	Router::connect('/sitemap', array('controller' => 'sitemaps', 'action' => 'index','url'=>array('ext'=>'xml')));
	
?>