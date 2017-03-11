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
 * Job Model
 *
 * @since  1.0.0
 */
class JobsModelJob extends JModelItem
{
	protected $item;

	/**
	 * populate internal state
	 *
	 * @return void
	 */
	protected function populateState()
	{
		$app = JFactory::getApplication();

		// Get the job id
		$id = $app->input->get('id', '', 'INT');
		$this->setState('job.id', $id);

		// Load the parameters.
		$params = $app->getParams();
		$this->setState('params', $params);

		parent::populateState();
	}

	/**
	 * Returns a reference to the a Table object, always creating it.
	 *
	 * @param   string  $type    The table type to instantiate
	 * @param   string  $prefix  A prefix for the table class name. Optional.
	 * @param   array   $config  Configuration array for table. Optional.
	 *
	 * @return  JTable A database object
	 */
	public function getTable($type = 'Jobs', $prefix = 'JobsTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	/**
	 * Get the job
	 *
	 * @return object The job to be displayed to the user
	 */
	public function getItem()
	{
		if (!isset($this->item))
		{
			$db = JFactory::getDbo();
			$id = $this->getState('job.id');

			$query = $db->getQuery(true)->from('#__jobs as j')
				->leftJoin('#__categories as c ON j.catid=c.id')
				->select('j.title AS title, j.params, j.description, c.title as category')
				->where('j.id=' . (int) $id);

			$db->setQuery($query);

			$this->item = $db->loadObject();

			// Load the JSON encoded params
			$params = new \Joomla\Registry\Registry;
			$params->loadString($this->item->params, 'JSON');

			$this->item->params = $params;

			// Merge global params with item params
			$params = clone $this->getState('params');
			$params->merge($this->item->params);

			$this->item->params = $params;
		}

		return $this->item;
	}
}
