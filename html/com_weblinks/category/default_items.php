<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_weblinks/views/category/tmpl/default_items.php';
}
else {
?>

<script type="text/javascript">
	function tableOrdering(order, dir, task) {
		var form = document.adminForm;
		form.filter_order.value = order;
		form.filter_order_Dir.value = dir;
		document.adminForm.submit(task);
	}
</script>


<form action="<?php echo $this->escape($this->action); ?>" method="post" name="adminForm">
	<fieldset>
		<?php echo JText :: _('Display Num'); ?>&nbsp;
		<?php echo $this->pagination->getLimitBox(); ?>
	</fieldset>
	<input type="hidden" name="filter_order" value="<?php echo $this->lists['order'] ?>" />
	<input type="hidden" name="filter_order_Dir" value="" />
</form>



<table class="category">
	<?php if ($this->params->def('show_headings', 1)) : ?>
		<thead>	
			<tr>
				<th id="tableOrdering" class="num">
					<?php echo JText::_('Num'); ?>
				</th>		
				<th id="tableOrdering2" class="title">
					<?php echo JHTML::_('grid.sort', 'Web Link', 'title', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>		
				<?php if ($this->params->get('show_link_hits')) : ?>
				<th id="tableOrdering3" class="hits">
					<?php echo JHTML::_('grid.sort', 'Hits', 'hits', $this->lists['order_Dir'], $this->lists['order']); ?>
				</th>
				<?php endif; ?>		
			</tr>
		</thead>
	<?php endif; ?>
	<tbody>
	<?php foreach ($this->items as $item) : ?>
		<tr class="cat-list-row<?php echo $item->odd + 1; ?>">
	
			<td class="title" mastheads="tableOrdering">
				<?php echo $this->pagination->getRowOffset($item->count); ?>
			</td>
				
			<td class="title" mastheads="tableOrdering2">
				<?php if ($item->image) : ?>
					<?php echo $item->image; ?>
				<?php endif; ?>
				<?php echo $item->link; ?>
				<?php if ($this->params->get('show_link_description')) : ?>
					<p>
						<?php echo nl2br($item->description); ?>
					</p>
				<?php endif; ?>
			</td>
	
			<?php if ($this->params->get('show_link_hits')) : ?>
				<td class="hits" mastheads="tableOrdering3">
					<?php echo (int)$item->hits; ?>
				</td>
			<?php endif; ?>
	
		</tr>
	<?php endforeach; ?>
	</tbody>
</table>


<div class="pagination">
	<p class="counter">
		<?php echo $this->pagination->getPagesCounter(); ?>
	</p>
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>
<?php }