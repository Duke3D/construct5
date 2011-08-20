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
// Joomla 1.5 
?>

<h3><?php echo JText :: _('Search_result'); ?></h3>	

<section class="search-results">		
	<?php foreach ($this->results as $result) : ?>
		<h4 class="result-title">
			<?php echo $this->pagination->limitstart + $result->count.'. ';?>
			<?php if ($result->href) : ?>
				<a href="<?php echo JRoute :: _($result->href) ?>">
					<?php echo $this->escape($result->title); ?>
				</a>
			<?php else : ?>
				<?php echo $this->escape($result->title); ?>
			<?php endif; ?>
		</h4>
		<?php if ($result->section) : ?>
			<div class="result-category">
				<?php echo JText::_('Category') ?>:
				<span>
					<?php echo $this->escape($result->section); ?>
				</span>	
			</div>				
		<?php endif; ?>
		<p class="result-text">
			<?php echo $result->text; ?>
		</p>
		<?php if ( $this->params->get( 'show_date' )) : ?>
			<time class="result-created">
				<?php echo $result->created; ?>	
			</time>
		<?php endif; ?>
	<?php endforeach; ?>
</section>

<nav class="pagination">
	<?php echo $this->pagination->getPagesLinks(); ?>
</nav>

<?php }