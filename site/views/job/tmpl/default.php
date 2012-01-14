<?php
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>
<?php if($this->item->params->get('show_title')): ?>
    <h1>
           <?php echo $this->item->title.(($this->item->params->get('show_category')) ? (' ('.$this->item->category.')') : ''); ?>
    </h1>
<?php endif; ?>
<?php echo $this->item->description ?>