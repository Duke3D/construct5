<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_search/views/search/tmpl/default.php';
}
else {
// Joomla 1.5 
?>

<div class="search<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">
	<?php if($this->params->get('show_page_title',1)) : ?>
		<h1>
			<?php echo $this->escape($this->params->get('page_title')) ?>
		</h1>
	<?php endif; ?>
	
	<?php echo $this->loadTemplate('form'); ?>
	
	<?php if ($this->error==null && count($this->results) > 0) :
		echo $this->loadTemplate('results');
	else :
		echo $this->loadTemplate('error');
	endif; ?>
</div>
<?php }