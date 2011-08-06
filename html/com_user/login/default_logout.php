<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<div class="logout<?php echo $this->escape($this->params->get( 'pageclass_sfx' )); ?>">

	<?php if ( $this->params->get( 'show_logout_title' ) ) : ?>
		<h1>
			<?php echo $this->params->get( 'masthead_logout' ); ?>
		</h1>
	<?php endif; ?>
	
	<?php if ( $this->params->get( 'description_logout' ) || isset( $this->image ) ) : ?>
		<div class="logout-description">
			<?php if ( $this->params->get( 'description_logout' ) ) : ?>
				<?php echo $this->params->get('description_logout_text'); ?>
			<?php endif; ?>	
			<?php if (isset ($this->image)) : ?>
				<?php echo $this->image; ?>
			<?php endif; ?>
		</div>
	<?php endif; ?>	
	
	<form action="<?php echo JRoute::_( 'index.php' ); ?>" method="post">
		<fieldset>	
			<button type="submit" name="submit" class="button"><?php echo JText::_( 'Logout' ); ?></button>
		</fieldset>
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="logout" />
		<input type="hidden" name="return" value="<?php echo $this->return; ?>" />		
	</form>
</div>
