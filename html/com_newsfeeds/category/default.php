<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
// Joomla 1.6+ ?>

    <section class="newsfeed-category<?php echo $this->pageclass_sfx;?>">
        <?php if ($this->params->def('show_page_heading', 1)) : ?>
            <h1>
	            <?php echo $this->escape($this->params->get('page_heading')); ?>
            </h1>
        <?php endif; ?>
        <?php if($this->params->get('show_category_title', 1)) : ?>
            <h2>
	            <?php echo JHtml::_('content.prepare', $this->category->title); ?>
            </h2>
        <?php endif; ?>
        <?php if ($this->params->get('show_description', 1) || $this->params->def('show_description_image', 1)) : ?>
	        <section class="category-desc clearfix">
	            <?php if ($this->params->get('show_description_image') && $this->category->getParams()->get('image')) : ?>
		            <img src="<?php echo $this->category->getParams()->get('image'); ?>"/>
	            <?php endif; ?>
	            <?php if ($this->params->get('show_description') && $this->category->description) : ?>
		            <?php echo JHtml::_('content.prepare', $this->category->description); ?>
	            <?php endif; ?>
	        </section>
        <?php endif; ?>

        <?php echo $this->loadTemplate('items'); ?>

        <?php if (!empty($this->children[$this->category->id])&& $this->maxLevel != 0) : ?>
            <section class="cat-children">
	            <h3><?php echo JText::_('JGLOBAL_SUBCATEGORIES') ; ?></h3>
	            <?php echo $this->loadTemplate('children'); ?>
            </section>
        <?php endif; ?>
    </section>

<?php
}
else {
// Joomla 1.5 ?>

    <section class="newsfeed-category<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">

	    <?php if ( $this->params->get( 'show_page_title',1)): ?>
	    <header>
		    <h2>
			    <?php echo $this->escape($this->params->get('page_title')); ?>
		    </h2>
	    </header>
	    <?php endif; ?>
	
	    <?php if ( $this->category->image || $this->category->description ) : ?>
	    <section class="category-desc clearfix">
		    <?php if ( $this->category->image ) : ?>
			    <img src="<?php echo $this->baseurl . '/' . $cparams->get('image_path').'/'.$this->category->image; ?>" class="image_<?php echo $this->category->image_position; ?>">
		    <?php endif; ?>
			    <?php if ( $this->params->get( 'description' ) ) : ?>
			    <p class="category-desc-text">
				    <?php echo $this->category->description; ?>
			    </p>
			    <?php endif; ?>
	    </section>
	    <?php endif; ?>

	    <?php echo $this->loadTemplate('items'); ?>
    </section>
<?php }
