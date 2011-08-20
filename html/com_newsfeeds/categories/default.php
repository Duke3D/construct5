<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

$cparams = JComponentHelper::getParams ('com_media');

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_newsfeeds/views/categories/tmpl/default.php';
}
else {
// Joomla 1.5 
?>

<div class="categories-list<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

	<?php if ($this->params->get('show_page_title',1)) : ?>
	<h2>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h2>
	<?php endif; ?>
	
	<?php if ($this->params->def( 'show_comp_description', 1 ) || $this->params->get( 'image', -1 ) != -1) : ?>
		<div class="category-desc base-desc">
			<?php if ($this->params->get( 'image', -1 ) != -1) : ?>
				<img src="<?php echo $this->baseurl . '/' . $this->escape($cparams->get('image_path')).'/'.$this->escape($this->params->get('image')); ?>" class="image_<?php echo $this->escape($this->params->get( 'image_align' )); ?>">
			<?php endif; ?>
			<?php echo $this->params->get( 'comp_description' ); ?>
		</div>
	<?php endif; ?>
	
	<?php if ( count( $this->categories ) ) : ?>
	<ul>
		<?php foreach ( $this->categories as $category ) : ?>
		<li>
			<h3 class="item-title"><a href="<?php echo $category->link; ?>">
				<?php echo $this->escape($category->title); ?></a>
			</h3>
			<?php if ( $this->params->def( 'show_cat_description', 1 ) && $category->description) : ?>
				<p class="category-desc">
					<?php echo $category->description; ?>
				</p>
			<?php endif; ?>		
			<?php if ( $this->params->get( 'show_cat_items' ) ) : ?>
				<dl class="newsfeed-count">
					<dt>
						<?php echo JText::_( 'Number of Items' ); ?>:
					</dt>
					<dd>
						<?php echo (int)$category->numlinks; ?>
					</dd>
				</dl>				
			<?php endif; ?>	
		</li>
		<?php endforeach; ?>
	</ul>
	<?php endif; ?>
</div>
<?php }