<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */
defined('_JEXEC') or die('Restricted access');

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

JFactory::getDocument()->addScriptDeclaration("
	Joomla.submitbutton = function(task)
	{
		if (task == 'job.cancel' || document.formvalidator.isValid(document.getElementById('job-form'))) {
			" . $this->form->getField('description')->save() . "
			Joomla.submitform(task, document.getElementById('job-form'));
		}
	};
");

$params = $this->form->getFieldsets('params');
?>

<form action="<?php echo JRoute::_('index.php?option=com_jobs&layout=edit&id=' . (int) $this->item->id); ?>" method="post" name="adminForm" id="job-form" class="form-validate">
	<?php echo JLayoutHelper::render('joomla.edit.title_alias', $this); ?>

	<div class="form-horizontal">
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'details')); ?>

		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'details', JText::_('COM_JOBS_JOB_DETAILS', true)); ?>

		<?php echo $this->form->getControlGroup('catid'); ?>
		<?php echo $this->form->getControlGroup('description'); ?>

		<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'params', JText::_('COM_JOBS_JOB_PARAMS', true)); ?>

        <?php foreach ($this->form->getGroup('params') as $field) : ?>
			<?php echo $field->getControlGroup(); ?>
		<?php endforeach; ?>

		<?php echo JHtml::_('bootstrap.endTabSet'); ?>

	</div>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
