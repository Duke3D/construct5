<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_mailto/views/sent/tmpl/default.php';
}
else {
?>
<div style="padding: 10px;">
	<div style="text-align:right">
		<a href="javascript: void window.close()">
			<?php echo JText::_('Close Window'); ?> <img src="<?php echo JURI::base() ?>components/com_mailto/assets/close-x.png" border="0" alt="" title="" /></a>
	</div>

	<h2>
		<?php echo JText::_('EMAIL_SENT'); ?>
	</h2>
</div>
<?php }