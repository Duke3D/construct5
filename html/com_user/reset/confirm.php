<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>


<div class="reset-confirm<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">

	<h1>
		<?php echo JText::_('Confirm your Account'); ?>
	</h1>
	
	<form action="<?php echo JRoute::_( 'index.php?option=com_user&task=confirmreset' ); ?>" method="post" class="josForm form-validate">
		<fieldset>
			<p><?php echo JText::_('RESET_PASSWORD_CONFIRM_DESCRIPTION'); ?></p>
			<dl>
				<dt>
					<label for="username" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_USERNAME_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_USERNAME_TIP_TEXT'); ?>">
						<?php echo JText::_('User Name'); ?>:
					</label>
				</dt>
				<dd>
					<input id="username" name="username" type="text" class="required" size="36" />
				</dd>
				<dt>
					<label for="token" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_TOKEN_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_TOKEN_TIP_TEXT'); ?>">
						<?php echo JText::_('Token'); ?>:
					</label>
				</dt>
				<dd>
					<input id="token" name="token" type="text" class="required" size="36" />
				</dd>
			</dl>
		</fieldset>
		<div>
			<button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
		</div>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>