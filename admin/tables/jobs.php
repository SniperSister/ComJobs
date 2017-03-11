<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Jobs Table class
 *
 * @since  0.0.1
 */
class JobsTableJobs extends JTable
{
	/**
	 * Ensure the params and metadata in json encoded in the bind method
	 *
	 * @var    array
	 */
	protected $_jsonEncode = array('params');

	/**
	 * Constructor
	 *
	 * @param   JDatabaseDriver  &$db  connector object
	 */
	public  function __construct(&$db)
	{
		parent::__construct('#__jobs', 'id', $db);
	}
}
