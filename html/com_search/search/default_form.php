<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_search/views/search/tmpl/default_form.php';
}
else {
?>

<form id="search-form" action="<?php echo JRoute::_( 'index.php?option=com_search#content' ) ?>" method="post">

	<h3><?php echo JText::_('search_again'); ?></h3>

	<fieldset class="word">
		<label for="search-searchword">
			<?php echo JText::_('Search Keyword') ?>
		</label>
		<input type="text" name="searchword" id="search-searchword"  maxlength="20" value="<?php echo $this->escape($this->searchword) ?>" class="inputbox" />
		<button name="Search" onclick="this.form.submit()" class="button">
			<?php echo JText::_( 'Search' );?>
		</button>		
	</fieldset>
	
	<?php if (!empty($this->searchword)) : ?>
		<div class="searchintro">
			<p>
				<?php echo JText::_('Search Keyword') ?> <strong><?php echo $this->escape($this->searchword) ?></strong>
				<?php echo $this->result ?>
			</p>
		</div>
	<?php endif; ?>
	
	<fieldset class="phrases">
		<legend>
			<?php echo JText::_('Search Parameters') ?>
		</legend>
		<div class="phrases-box">
			<?php echo $this->lists['searchphrase']; ?>
		</div>
		<div class="ordering-box">
			<label for="ordering" class="ordering">
				<?php echo JText::_('Ordering') ?>:
			</label>
			<?php echo $this->lists['ordering']; ?>
		</div>
	</fieldset>

	<?php if ($this->params->get('search_areas', 1)) : ?>
	<fieldset class="only">
		<legend>
			<?php echo JText::_('Search Only') ?>:
		</legend>
		<?php foreach ($this->searchareas['search'] as $val => $txt) : ?>
			<?php $checked = is_array($this->searchareas['active']) && in_array($val, $this->searchareas['active']) ? 'checked="true"' : ''; ?>
			<input type="checkbox" name="areas[]" value="<?php echo $val ?>" id="area-<?php echo $val ?>" <?php echo $checked ?> />
			<label for="area-<?php echo $val ?>">
				<?php echo JText::_($txt); ?>
			</label>
		<?php endforeach; ?>
	</fieldset>
	<?php endif; ?>
	
	<?php if (count($this->results)) : ?>
		<fieldset>
			<div class="form-limit">
				<label for="limit">
					<?php echo JText :: _('Display Num') ?>
				</label>
				<?php echo $this->pagination->getLimitBox(); ?>
			</div>
			<p class="counter">
				<?php echo $this->pagination->getPagesCounter(); ?>
			</p>
		</fieldset>
	<?php endif; ?>
	<input type="hidden" name="task"   value="search" />
</form>
<?php }