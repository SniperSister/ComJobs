<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// Import Joomla view library
jimport('joomla.application.component.view');

/**
 * HTML View class for the Jobs Component
 *
 * @since  0.0.1
 */
class JobsViewJob extends JViewLegacy
{
	/**
	 * Display job item
	 *
	 * @param   string  $tpl  template name
	 *
	 * @return void
	 */
	public function display($tpl = null)
	{
		// Assign data to the view
		$this->item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new RuntimeException(implode('<br />', $errors), 500);
		}

		// Display the view
		parent::display($tpl);
	}
}
