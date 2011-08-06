<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_content/views/category/tmpl/blog_item.php';
}
else {
?>


<?php if ($this->item->params->get('show_title')) : ?>
<h2>
	<?php if ($this->item->params->get('link_titles') && $this->item->readmore_link != '') : ?>
		<a href="<?php echo $this->item->readmore_link; ?>" class="contentpagetitle">
			<?php echo $this->escape($this->item->title); ?></a>
	<?php else :
		echo $this->escape($this->item->title);
	endif; ?>
</h2>
<?php endif; ?>

<?php if (
			($this->item->params->get('show_pdf_icon')) ||
			($this->item->params->get('show_print_icon')) ||
			($this->item->params->get('show_email_icon')) ||
			($this->user->authorize('com_content', 'edit', 'content', 'all')) ||
			($this->user->authorize('com_content', 'edit', 'content', 'own'))
		) : ?>
	<ul class="actions">
		
		<?php if ($this->item->params->get('show_pdf_icon')) : ?>
			<li class="pdf-icon">
				<?php echo JHTML::_('icon.pdf', $this->item, $this->item->params, $this->access); ?>
			</li>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_print_icon')) : ?>
			<li class="print-icon">
				<?php echo JHTML::_('icon.print_popup', $this->item, $this->item->params, $this->access); ?>
			</li>
		<?php endif; ?>
		<?php if ($this->item->params->get('show_email_icon')) : ?>
			<li class="email-icon">
				<?php echo JHTML::_('icon.email', $this->item, $this->item->params, $this->access); ?>
			</li>
		<?php endif; ?>
		
		<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
			<li class="edit-icon">
				<?php echo JHTML::_('icon.edit', $this->item, $this->item->params, $this->access); ?>
			</li>
		<?php endif; ?>	
	</ul>
<?php endif; ?>

<?php if (!$this->item->params->get('show_intro')) :
	echo $this->item->event->afterDisplayTitle;
endif; ?>

<?php echo $this->item->event->beforeDisplayContent; ?>

<?php if(
		($this->item->params->get('show_section') && $this->item->sectionid) ||
		($this->item->params->get('show_category') && $this->item->catid) ||
		(intval($this->item->modified) !=0 && $this->item->params->get('show_modify_date')) ||
		($this->item->params->get('show_author') && ($this->item->author != "")) ||
		($this->item->params->get('show_create_date')) ||
		($this->item->params->get('show_url') && $this->item->urls)
		) : ?>
	
 <dl class="article-info">
	<dt class="article-info-term"><?php echo JText::_('Details'); ?></dt>
    <?php if ($this->item->params->get('show_section') && $this->item->sectionid && isset($this->item->section)) : ?>
        <dd class="section-name">
            <?php if ($this->item->params->get('link_section')) : ?>
                <a href="<?php echo JRoute::_(ContentHelperRoute::getSectionRoute($this->item->sectionid)); ?>">
            <?php endif; ?>
            <?php echo $this->escape($this->item->section); ?>
            <?php if ($this->item->params->get('link_section')) : ?>
                <?php echo '</a>'; ?>
            <?php endif; ?>
			<?php if ($this->item->params->get('show_category')) : ?>
                	<?php echo ' -&nbsp;'; ?>
            <?php endif; ?>
        </dd>
        <?php endif; ?>
        <?php if ($this->item->params->get('show_category') && $this->item->catid) : ?>
        <dd class="category-name">
            <?php if ($this->item->params->get('link_category')) : ?>
                <a href="<?php echo JRoute::_(ContentHelperRoute::getCategoryRoute($this->item->catslug, $this->item->sectionid)); ?>">
            <?php endif; ?>
            <?php echo $this->escape($this->item->category); ?>
            <?php if ($this->item->params->get('link_category')) : ?>
                <?php echo '</a>'; ?>
            <?php endif; ?>
        </dd>
		<?php endif; ?>
		
		<?php if ($this->item->params->get('show_create_date')) : ?>
		<dd class="create">
			<?php echo JHTML::_('date', $this->item->created, JText::_('DATE_FORMAT_LC2')); ?>
		</dd>
		<?php endif; ?>		

		<?php if (intval($this->item->modified) !=0 && $this->item->params->get('show_modify_date')) : ?>
		<dd class="modified">
			<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->item->modified, JText::_('DATE_FORMAT_LC2'))); ?>
		</dd>
		<?php endif; ?>
	
		<?php if (($this->item->params->get('show_author')) && ($this->item->author != "")) : ?>
		<dd class="createdby">
			<?php JText::printf('Written by', ($this->escape($this->item->created_by_alias) ? $this->escape($this->item->created_by_alias) : $this->escape($this->item->author))); ?>
		</dd>
		<?php endif; ?>	

		<?php if ($this->item->params->get('show_url') && $this->item->urls) : ?>
		<dd class="hits">
			<a href="<?php echo $this->item->urls; ?>" target="_blank">
				<?php echo $this->escape($this->item->urls); ?></a>
		</dd>
		<?php endif; ?>
		
		<?php if (isset ($this->item->toc)) : ?>
			<?php echo $this->item->toc; ?>
		<?php endif; ?>

	</dl>
	<?php endif; ?>

<?php echo JFilterOutput::ampReplace($this->item->text);  ?>

<?php if ($this->item->params->get('show_readmore') && $this->item->readmore) : ?>
<p class="readmore">
	<a href="<?php echo $this->item->readmore_link; ?>">
		<?php if ($this->item->readmore_register) :
			echo JText::_('Register to read more...');
		elseif ($readmore = $this->item->params->get('readmore')) :
			echo $readmore;
		else :
			echo JText::sprintf('Read more', $this->escape($this->item->title));
		endif; ?></a>
</p>
<?php endif; ?>

<div class="item-separator"></div>
<?php echo $this->item->event->afterDisplayContent;
}