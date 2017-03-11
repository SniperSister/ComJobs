<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * General Controller of Jobs component
 *
 * @since  0.0.1
 */
class JobsController extends JControllerLegacy
{
	/**
	 * The generic display task
	 *
	 * @param   bool   $cachable   is this view a cachabel one
	 * @param   array  $urlparams  url parameters
	 *
	 * @return  void
	 */
	public function display($cachable = false, $urlparams = array())
	{
		$input =& JFactory::getApplication()->input;

		// Set default view if not set
		$input->set('view', $input->get("view", "Jobs", "CMD"));

		// Call parent behavior
		parent::display($cachable, $urlparams);

		// Set the submenu
		JobsHelper::addSubmenu('jobs');
	}
}
