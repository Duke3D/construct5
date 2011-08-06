<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_search/views/search/tmpl/default_results.php';
}
else {
?>

<h3><?php echo JText :: _('Search_result'); ?></h3>	

<dl class="search-results">		
	<?php foreach ($this->results as $result) : ?>
		<dt class="result-title">
			<?php echo $this->pagination->limitstart + $result->count.'. ';?>
			<?php if ($result->href) : ?>
				<a href="<?php echo JRoute :: _($result->href) ?>" <?php echo ($result->browsernav == 1) ? 'target="_blank"' : ''; ?> >
					<?php echo $this->escape($result->title); ?>
				</a>
			<?php else : ?>
				<?php echo $this->escape($result->title); ?>
			<?php endif; ?>
		</dt>
		<?php if ($result->section) : ?>
			<dd class="result-category">
				<?php echo JText::_('Category') ?>:
				<span>
					<?php echo $this->escape($result->section); ?>
				</span>	
			</dd>				
		<?php endif; ?>		
		<dd class="result-text">
			<?php echo $result->text; ?>
		</dd>
		<?php if ( $this->params->get( 'show_date' )) : ?>
			<dd class="result-created">
				<?php echo $result->created; ?>	
			</dd>
		<?php endif; ?>
	<?php endforeach; ?>
</dl>

<div class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</div>

<?php }