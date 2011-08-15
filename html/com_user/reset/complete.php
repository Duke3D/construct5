<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<div class="reset-complete<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
	<header>
		<h2>
			<?php echo JText::_('Reset your Password'); ?>
		</h2>
	</header>
	<form action="<?php echo JRoute::_( 'index.php?option=com_user&task=completereset' ); ?>" method="post" class="josForm form-validate">
		<fieldset>
			<p><?php echo JText::_('RESET_PASSWORD_COMPLETE_DESCRIPTION'); ?></p>
			<dl>
				<dt>
					<label for="password1" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_PASSWORD1_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_PASSWORD1_TIP_TEXT'); ?>">
						<?php echo JText::_('Password'); ?>:
					</label>
				</dt>
				<dd>
					<input id="password1" name="password1" type="password" class="required validate-password" />
				</dd>
				<dt>
					<label for="password2" class="hasTip" title="<?php echo JText::_('RESET_PASSWORD_PASSWORD2_TIP_TITLE'); ?>::<?php echo JText::_('RESET_PASSWORD_PASSWORD2_TIP_TEXT'); ?>">
						<?php echo JText::_('Verify Password'); ?>:
					</label>
				</dt>
				<dd>
					<input id="password2" name="password2" type="password" class="required validate-password" />
				</dd>
			</dl>
		</fieldset>
		<button type="submit" class="validate"><?php echo JText::_('Submit'); ?></button>
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>