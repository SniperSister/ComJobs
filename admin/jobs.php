<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_jobs'))
{
	new RuntimeException(JText::_('JERROR_ALERTNOAUTHOR'), 403);
}

// Require helper file
JLoader::register('JobsHelper', dirname(__FILE__) . '/helpers/jobs.php');

// Import joomla controller library
jimport('joomla.application.component.controller');

// Get an instance of the controller prefixed by Jobs
$controller = JControllerLegacy::getInstance('Jobs');

// Perform the Request task
$controller->execute(JFactory::getApplication()->input->get('task', '', 'CMD'));

// Redirect if set by the controller
$controller->redirect();
