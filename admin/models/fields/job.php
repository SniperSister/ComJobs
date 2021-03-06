<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

/**
 * Job Form Field class for the Jobs component
 *
 * @since  0.0.1
 */
class JFormFieldJob extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Job';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db = JFactory::getDBO();

		$query = $db->getQuery(true);
		$query->select('#__jobs.id as id, #__jobs.title as title, #__categories.title as category,catid');
		$query->from('#__jobs');
		$query->leftJoin('#__categories on catid=#__categories.id');

		$db->setQuery((string) $query);

		$jobs = $db->loadObjectList();

		$options = array();

		if ($jobs)
		{
			foreach ($jobs as $job)
			{
				$options[] = JHtml::_('select.option', $job->id, $job->title . ($job->catid ? ' (' . $job->category . ')' : ''));
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}
