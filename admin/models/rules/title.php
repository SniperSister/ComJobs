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
 * Form Rule class for the Joomla Framework.
 *
 * @since  0.0.1
 */
class JFormRuleTitle extends JFormRule
{
	/**
	 * The regular expression.
	 *
	 * @access	protected
	 * @var		string
	 * @since	1.6
	 */
	protected $regex = '^[^0-9]+$';
}
