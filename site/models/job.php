<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

// import Joomla modelitem library
jimport('joomla.application.component.modelitem');

/**
 * Job Model
 */
class JobsModelJob extends JModelItem
{
    protected $item;

    protected function populateState()
    {
        $app = JFactory::getApplication();
        // Get the job id
        $id = $app->input->get('id','','INT');
        $this->setState('job.id', $id);

        // Load the parameters.
        $params = $app->getParams();
        $this->setState('params', $params);
        parent::populateState();
    }

    /**
     * Returns a reference to the a Table object, always creating it.
     *
     * @param	type	The table type to instantiate
     * @param	string	A prefix for the table class name. Optional.
     * @param	array	Configuration array for model. Optional.
     * @return	JTable	A database object
     * @since	1.6
     */
    public function getTable($type = 'Jobs', $prefix = 'JobsTable', $config = array())
    {
        return JTable::getInstance($type, $prefix, $config);
    }

    /**
     * Get the message
     * @return object The message to be displayed to the user
     */
    public function getItem()
    {
        if (!isset($this->item))
        {
            $db = JFactory::getDbo();
            $id = $this->getState('job.id');
            $query = $db->getQuery(true);
            $query->from('#__jobs as j')
                ->leftJoin('#__categories as c ON j.catid=c.id')
                ->select('j.title AS title, j.params, j.description, c.title as category')
                ->where('j.id=' . (int)$id);
            $db->setQuery($query);
            if (!$this->item = $db->loadObject())
            {
                $this->setError($db->getError());
            }
            else
            {
                // Load the JSON string
                $params = new JRegistry;
                $params->loadString($this->item->params,'JSON');
                $this->item->params = $params;

                // Merge global params with item params
                $params = clone $this->getState('params');
                $params->merge($this->item->params);
                $this->item->params = $params;
            }
        }
        return $this->item;
    }
}