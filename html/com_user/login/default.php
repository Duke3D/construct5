<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<?php if($this->params->get('show_page_title',1)) : ?>
	<h1>
		<?php echo $this->params->get('page_title') ?>
	</h1>
<?php endif; ?>

<?php echo $this->loadTemplate( $this->type ); ?>