<?php
// No direct access to this file
defined('_JEXEC') or die;
 
/**
 * Jobs component helper.
 */
abstract class JobsHelper
{
	/**
	 * Configure the Linkbar.
	 */
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(JText::_('COM_JOBS_SUBMENU_MESSAGES'), 'index.php?option=com_jobs', $submenu == 'jobs');
		JSubMenuHelper::addEntry(JText::_('COM_JOBS_SUBMENU_CATEGORIES'), 'index.php?option=com_categories&view=categories&extension=com_jobs', $submenu == 'categories');
		// set some global property
		$document = JFactory::getDocument();
		$document->addStyleDeclaration('.icon-48-jobs {background-image: url(../media/com_jobs/images/jobs-48x48.png);}');
		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_JOBS_ADMINISTRATION_CATEGORIES'));
		}
	}
	/**
	 * Get the actions
	 */
	public static function getActions()
	{
		$user	= JFactory::getUser();
		$result	= new JObject;

		$assetName = 'com_jobs';

		$actions = array(
			'core.admin', 'core.manage', 'core.create', 'core.edit', 'core.delete'
		);
 
		foreach ($actions as $action) {
			$result->set($action,	$user->authorise($action, $assetName));
		}
 
		return $result;
	}
}
