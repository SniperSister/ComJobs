<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

// Load tooltip behavior
JHtml::_('behavior.tooltip');
JHtml::_('formbehavior.chosen', 'select');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jobs&view=jobs'); ?>" method="post" name="adminForm" id="adminForm">
	<div id="j-sidebar-container" class="span2">
		<?php echo $this->sidebar; ?>
	</div>
	<div id="j-main-container" class="span10">
		<?php if (empty($this->items)): ?>
			<div class="alert alert-no-items">
				<?php echo JText::_('JGLOBAL_NO_MATCHING_RESULTS'); ?>
			</div>
		<?php else: ?>
			<table class="table table-striped" id="jobList">
				<thead>
					<?php echo $this->loadTemplate('head'); ?>
				</thead>
				<tfoot>
					<?php echo $this->loadTemplate('foot'); ?>
				</tfoot>
				<tbody>
				    <?php echo $this->loadTemplate('body'); ?>
				</tbody>
			</table>
		<?php endif; ?>

		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $this->escape($this->state->get('list.ordering')); ?>" />
		<input type="hidden" name="filter_order_Dir" value="<?php echo $this->escape($this->state->get('list.direction')); ?>" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>
