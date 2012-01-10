<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
 
// import Joomla controller library
jimport('joomla.application.component.controller');
 
/**
 * General Controller of Jobs component
 */
class JobsController extends JController
{
	/**
	 * display task
	 *
	 * @return void
	 */
	function display($cachable = false) 
	{
		$input =& JFactory::getApplication()->input;
		// set default view if not set
        $input->set('view',$input->get("view","Jobs","CMD"));

		// call parent behavior
		parent::display($cachable);
 
		// Set the submenu
		JobsHelper::addSubmenu('jobs');
	}
}
