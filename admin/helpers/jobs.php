<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die;

/**
 * Class JobsHelper
 *
 * @since  0.0.1
 */
abstract class JobsHelper
{
	/**
	 * Configure the Linkbar.
	 *
	 * @param   string  $vName  The name of the active view.
	 *
	 * @return  void
	 */
	public static function addSubmenu($vName = 'jobs')
	{
		JHtmlSidebar::addEntry(
			JText::_('COM_JOBS_SUBMENU_MESSAGES'),
			'index.php?option=com_jobs',
			$vName == 'jobs'
		);

		JHtmlSidebar::addEntry(
			JText::_('COM_JOBS_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&extension=com_jobs',
			$vName == 'categories'
		);
	}
}
