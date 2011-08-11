<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_search/views/search/tmpl/default_error.php';
}
else {
// Joomla 1.5 
?>

<?php if($this->error): ?>
	<div class="error">
		<?php echo $this->escape($this->error); ?>
	</div>
<?php endif; ?>
<?php }