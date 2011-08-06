<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<div class="remind<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">

	<?php if($this->params->get('show_page_title',1)) : ?>
	<h1>
		<?php echo $this->escape($this->params->get('page_title')) ?>
	</h1>
	<?php endif; ?>
	
	<form id="user-registration" action="<?php echo JRoute::_( 'index.php?option=com_user&task=remindusername' ); ?>" method="post" class="josForm form-validate">
		<p><?php echo JText::_('REMIND_USERNAME_DESCRIPTION'); ?></p>
		<fieldset>
			<dl>
				<dt>
					<label for="email" class="hasTip" title="<?php echo JText::_('REMIND_USERNAME_EMAIL_TIP_TITLE'); ?>::<?php echo JText::_('REMIND_USERNAME_EMAIL_TIP_TEXT'); ?>">
						<?php echo JText::_('Email Address'); ?>:
					</label>
				</dt>
				<dd>
					<input id="email" name="email" type="text" class="required validate-email" />
				</dd>
			</dl>
		</fieldset>
		<div>
			<button type="submit" class="validate">
				<?php echo JText::_('Submit'); ?>
			</button>
		</div>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>