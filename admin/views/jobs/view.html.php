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
 * Jobs View
 *
 * @since  1.0.0
 */
class JobsViewJobs extends JViewLegacy
{
	protected $items;

	protected $pagination;

	protected $state;

	/**
	 * Jobs view display method
	 *
	 * @param   string  $tpl  templae name
	 *
	 * @return void
	 */
	public function display($tpl = null)
	{
		// Get data from the model
		$this->items = $this->get('Items');
		$this->pagination = $this->get('Pagination');
		$this->state = $this->get('State');

		// Check for errors.
		if (count($errors = $this->get('Errors')))
		{
			throw new RuntimeException(implode('<br />', $errors), 500);
		}

		// Set the toolbar
		JobsHelper::addSubmenu('jobs');

		$this->addToolBar();
		$this->sidebar = JHtmlSidebar::render();

		// Add CSS for icon
		JFactory::getDocument()->addStyleDeclaration('.icon-jobs {background:url(../media/com_jobs/images/jobs-16x16.png)}');

		// Display the template
		parent::display($tpl);
	}

	/**
	 * Setting the toolbar
	 *
	 * @return void
	 */
	protected function addToolBar()
	{
		$state = $this->get('State');
		$canDo = JHelperContent::getActions('com_jobs', 'category', $state->get('filter.category_id'));
		$user  = JFactory::getUser();

		JToolBarHelper::title(JText::_('COM_JOBS_MANAGER_JOBS'), 'jobs');

		if ($canDo->get('core.create'))
		{
			JToolBarHelper::addNew('job.add');
		}

		if ($canDo->get('core.edit'))
		{
			JToolBarHelper::editList('job.edit');
		}

		if ($canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'jobs.delete');
		}

		if ($user->authorise('core.admin', 'com_jobs') || $user->authorise('core.options', 'com_jobs'))
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_jobs');
		}

		JHtmlSidebar::setAction('index.php?option=com_jobs&view=jobs');

		JHtmlSidebar::addFilter(
			JText::_('JOPTION_SELECT_CATEGORY'),
			'filter_category_id',
			JHtml::_('select.options', JHtml::_('category.options', 'com_jobs'), 'value', 'text', $state->get('filter.category_id'))
		);
	}
}
