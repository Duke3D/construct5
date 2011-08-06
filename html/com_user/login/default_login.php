<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<div class="login<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">

	<?php if ( $this->params->get( 'show_login_title' ) ) : ?>
	<h1>
		<?php echo $this->params->get( 'masthead_login' ); ?>
	</h1>
	<?php endif; ?>
	
	<?php if ( $this->params->get( 'description_login' ) || isset( $this->image ) ) : ?>
		<div class="login-description">
			<?php if ($this->params->get('description_login')) : ?>
				<?php echo $this->params->get('description_login_text'); ?>
			<?php endif; ?>		
			<?php if (isset ($this->image)) : ?>
				<?php echo $this->image; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>	
	

	<form action="<?php echo JRoute::_( 'index.php', true, $this->params->get('usesecure')); ?>" method="post">
		<fieldset>		
			<div class="login-fields">
				<label for="user" ><?php echo JText::_( 'Username' ); ?></label>
				<input name="username" type="text" class="inputbox" size="20"  id="user" />
			</div>
			<div class="login-fields">
				<label for="pass" ><?php echo JText::_( 'Password' ); ?></label>
				<input name="passwd" type="password" class="inputbox" size="20" id="pass" />
			</div>
			<div class="login-fields">
				<label for="rem"><?php echo JText::_( 'Remember me' ); ?></label>
				<input type="checkbox" name="remember" class="inputbox" value="yes" id="rem" />
			</div>
			<p>
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=reset#content' ); ?>">
					<?php echo JText::_('Lost Password?'); ?></a>
				<?php if ( $this->params->get( 'registration' ) ) : ?>
				<?php echo JText::_('No account yet?'); ?>
				<a href="<?php echo JRoute::_( 'index.php?option=com_user&view=register#content' ); ?>">
					<?php echo JText::_( 'Register' ); ?></a>
				<?php endif; ?>
			</p>
			<button type="submit" name="submit" class="button"><?php echo JText::_( 'Login' ); ?></button>
			<noscript><?php echo JText::_( 'WARNJAVASCRIPT' ); ?></noscript>
		</fieldset>
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="login" />
		<input type="hidden" name="return" value="<?php echo $this->return; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>
