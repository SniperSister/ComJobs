<?php
/**
 * @package    ComJobs
 * @copyright  2017 David Jardin
 * @license    GNU GPLv2 <http://www.gnu.org/licenses/gpl.html>
 * @link       http://www.djumla.de
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');

$user = JFactory::getUser();
?>
<?php foreach ($this->items as $i => $item):
	$canEdit = $user->authorise('core.edit', 'com_jobs.category.' . $item->catid);
	?>
	<tr class="row<?php echo $i % 2; ?>">
		<td class="center hidden-phone">
			<?php echo JHtml::_('grid.id', $i, $item->id); ?>
		</td>
		<td class="nowrap has-context">
			<?php if ($canEdit): ?>
				<a href="<?php echo JRoute::_('index.php?option=com_jobs&task=job.edit&id='.(int) $item->id); ?>">
					<?php echo $this->escape($item->title); ?></a>
			<?php else: ?>
				<?php echo $this->escape($item->title); ?>
			<?php endif; ?>
		</td>
		<td class="center hidden-phone">
			<?php echo (int) $item->id; ?>
		</td>
	</tr>
<?php endforeach; ?>