<?php
/**
 *
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php is loaded
 * This is an application wide file to load any function that is not used within a class define.
 * You can also use this to include or require any files in your application.
 *
 */
 
/**
 * WA Global Constants
 */ 
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

/*
 * Affiliate API keys
 */
Configure::write('apikey', '10132293094ba6bd772192f4.29432906');

/**
 * Affiliate Methods
 */
Configure::write('prospectsGetURL', 'http://api.kumutu.com/0.5/prospects/get.xml');
Configure::write('suppliersGetURL', 'http://api.kumutu.com/0.5/suppliers/get.xml');
Configure::write('activitiesGetURL', 'http://api.kumutu.com/0.5/activities/get.xml');
Configure::write('activityTypesGetURL', 'http://api.kumutu.com/0.5/activityTypes/get.xml');
Configure::write('countriesGetURL', 'http://api.kumutu.com/0.5/countries/get.xml');
  
?>