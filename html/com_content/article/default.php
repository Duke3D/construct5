<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	
JHtml::addIncludePath(JPATH_COMPONENT.DS.'helpers');
?>

<div class="archive<?php echo $this->pageclass_sfx;?>">
<?php if ($this->params->get('show_page_heading', 1)) : ?>
<h1>
	<?php echo $this->escape($this->params->get('page_heading')); ?>
</h1>
<?php endif; ?>
<form id="adminForm" action="<?php echo JRoute::_('index.php')?>" method="post">
	<fieldset class="filters">
	<legend class="hidelabeltxt"><?php echo JText::_('JGLOBAL_FILTER_LABEL'); ?></legend>
	<div class="filter-search">
		<?php if ($this->params->get('filter_field') != 'hide') : ?>
		<label class="filter-search-lbl" for="filter-search"><?php echo JText::_('COM_CONTENT_'.$this->params->get('filter_field').'_FILTER_LABEL').'&#160;'; ?></label>
		<input type="text" name="filter-search" id="filter-search" value="<?php echo $this->escape($this->filter); ?>" class="inputbox" onchange="document.getElementById('adminForm').submit();" />
		<?php endif; ?>

		<?php echo $this->form->monthField; ?>
		<?php echo $this->form->yearField; ?>
		<?php echo $this->form->limitField; ?>
		<button type="submit" class="button"><?php echo JText::_('JGLOBAL_FILTER_BUTTON'); ?></button>
	</div>
	<input type="hidden" name="view" value="archive" />
	<input type="hidden" name="option" value="com_content" />
	<input type="hidden" name="limitstart" value="0" />
	</fieldset>

	<?php echo $this->loadTemplate('items'); ?>
</form>
</div>	

<?php	
}
else { 
?>

<div id="item-page<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
<?php if ($this->params->get('show_page_title',1) && $this->params->get('page_title') != $this->article->title) : ?>
<h1>
	<?php echo $this->escape($this->params->get('page_title')); ?>
</h1>
<?php endif; ?>

<?php if ($this->params->get('show_title')) : ?>
<h2>
	<?php if ($this->params->get('link_titles') && $this->article->readmore_link != '') : ?>
	<a href="<?php echo $this->article->readmore_link; ?>">
		<?php echo $this->escape($this->article->title); ?></a>
	<?php else :
		echo $this->escape($this->article->title);
	endif; ?>
</h2>
<?php endif; ?>


<?php if (
			($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) ||
			($this->params->get('show_pdf_icon')) ||
			($this->params->get('show_print_icon')) ||
			($this->params->get('show_email_icon'))
		): ?>
		
	<ul class="actions">
		<?php if (!$this->print) : ?>				
			<?php if ($this->params->get('show_pdf_icon')) : ?>
				<li class="pdf-icon">	
					<?php echo JHTML::_('icon.pdf', $this->article, $this->params, $this->access); ?>	
				</li>	
			<?php endif; ?>
			<?php if ($this->params->get('show_print_icon')) : ?>
				<li class="print-icon">
					<?php echo JHTML::_('icon.print_popup', $this->article, $this->params, $this->access); ?>
				</li>
			<?php endif; ?>
			<?php if ($this->params->get('show_email_icon')) : ?>
				<li class="print-icon">
					<?php echo JHTML::_('icon.email', $this->article, $this->params, $this->access); ?>
				</li>
			<?php endif; ?>		
			<?php if ($this->user->authorize('com_content', 'edit', 'content', 'all') || $this->user->authorize('com_content', 'edit', 'content', 'own')) : ?>
				<li class="edit-icon">
					<?php echo JHTML::_('icon.edit', $this->article, $this->params, $this->access); ?>
				</li>
			<?php endif; ?>
		<?php else : ?>
			<li>
				<?php echo JHTML::_('icon.print_screen', $this->article, $this->params, $this->access); ?>
			</li>		
		<?php endif; ?>
	</ul>
<?php endif; ?>
	
<?php if (!$this->params->get('show_intro')) :
	echo $this->article->event->afterDisplayTitle;
endif; ?>

<?php echo $this->article->event->beforeDisplayContent; ?>

<?php if(
			($this->params->get('show_section') && $this->article->sectionid) ||
			($this->params->get('show_category') && $this->article->catid) ||
			(intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) ||
			($this->params->get('show_author') && ($this->article->author != "")) ||
			($this->params->get('show_create_date'))
		): ?>
	<dl class="article-info">
	 
		<?php if ($this->params->get('show_section') && $this->article->sectionid) : ?>
			<dd class="section-name">
				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getSectionRoute($this->article->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->escape($this->article->section); ?>
				<?php if ($this->params->get('link_section')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
				<?php if ($this->params->get('show_category')) : ?>
					<?php echo ' -&nbsp;'; ?>
				<?php endif; ?>
			</dd>
		<?php endif; ?>
		
		<?php if ($this->params->get('show_category') && $this->article->catid) : ?>
			<dd class="category-name">
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '<a href="'.JRoute::_(ContentHelperRoute::getCategoryRoute($this->article->catslug, $this->article->sectionid)).'">'; ?>
				<?php endif; ?>
				<?php echo $this->escape($this->article->category); ?>
				<?php if ($this->params->get('link_category')) : ?>
					<?php echo '</a>'; ?>
				<?php endif; ?>
			</dd>
		<?php endif; ?>
	
		<?php if (intval($this->article->modified) !=0 && $this->params->get('show_modify_date')) : ?>
			<dd class="modified">
				<?php echo JText::sprintf('LAST_UPDATED2', JHTML::_('date', $this->article->modified, JText::_('DATE_FORMAT_LC2'))); ?>
			</dd>
		<?php endif; ?>
	
		<?php if (($this->params->get('show_author')) && ($this->article->author != "")) : ?>
			<dd class="createdby">
				<?php JText::printf('Written by', ($this->article->created_by_alias ? $this->escape($this->article->created_by_alias) : $this->escape($this->article->author))); ?>
			</dd>
		<?php endif; ?>
	
		<?php if ($this->params->get('show_create_date')) : ?>
			<dd class="create">
				<?php echo JHTML::_('date', $this->article->created, JText::_('DATE_FORMAT_LC2')); ?>
			</dd>
		<?php endif; ?>
	
		<?php if ($this->params->get('show_url') && $this->article->urls) : ?>
			<dd class="hits">
				<a href="<?php echo $this->escape($this->article->urls); ?>" target="_blank">
					<?php echo $this->escape($this->article->urls); ?></a>
			</dd>
		<?php endif; ?>
		
	</dl>
<?php endif; ?>	

<?php if (isset ($this->article->toc)) :
	echo $this->article->toc;
endif; ?>

<?php echo JFilterOutput::ampReplace($this->article->text); ?>

<?php echo $this->article->event->afterDisplayContent; ?>

</div>
<?php }