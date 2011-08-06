<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

$cparams = JComponentHelper::getParams ('com_media');

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_newsfeeds/views/category/tmpl/default.php';
}
else {
?>

<div class="newsfeed-category<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

	<?php if ( $this->params->get( 'show_page_title',1)): ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_title')); ?>
	</h1>
	<?php endif; ?>
	
	<?php if ( $this->category->image || $this->category->description ) : ?>
		<div class="category-desc">
			<?php if ( $this->category->image ) : ?>
				<img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path').'/'.$this->category->image; ?>" class="image_<?php echo $this->category->image_position; ?>" />
			<?php endif; ?>
			<p class="category-desc-text">
				<?php if ( $this->params->get( 'description' ) ) : ?>
					<?php echo $this->category->description; ?>
				<?php endif; ?>
			</p>
		</div>
	<?php endif; ?>

	<?php echo $this->loadTemplate('items'); ?>
</div>
<?php }