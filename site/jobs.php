<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import joomla controller library
jimport('joomla.application.component.controller');
 
// Get an instance of the controller prefixed by HelloWorld
$controller = JController::getInstance('Jobs');
 
// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task','','CMD'));
 
// Redirect if set by the controller
$controller->redirect();
