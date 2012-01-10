<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jobs'))
{
    return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

// require helper file
JLoader::register('JobsHelper', dirname(__FILE__) . '/helpers/jobs.php');

// import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Jobs
$controller = JController::getInstance('Jobs');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task','','CMD'));

// Redirect if set by the controller
$controller->redirect();