<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php if($this->item->params->get('show_title')): ?>
    <h1>
           <?php echo $this->item->title.(($this->item->params->get('show_category')) ? (' ('.$this->item->category.')') : ''); ?>
    </h1>
<?php endif; ?>
<?php echo $this->item->description ?>
