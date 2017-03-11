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
 * Jobs Controller
 *
 * @since  0.0.1
 */
class JobsControllerJobs extends JControllerAdmin
{
	/**
	 * Description
	 *
	 * @param   string  $name    model name
	 * @param   string  $prefix  model prefix
	 *
	 * @return bool|JModelLegacy
	 */
	public function getModel($name = 'Job', $prefix = 'JobsModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));

		return $model;
	}
}
