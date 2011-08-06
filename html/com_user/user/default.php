<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<div class="profile<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
	<?php if($this->params->get('show_page_title',1)) : ?>
		<h1>
			<?php echo $this->escape($this->params->get('page_title')) ?>
		</h1>
	<?php endif; ?>
	<h2>
		<?php echo JText::_('Welcome!'); ?>
	</h2>
	<p>
		<?php echo $this->params->get('welcome_desc', JText::_( 'WELCOME_DESC' ));; ?>
	</p>
</div>