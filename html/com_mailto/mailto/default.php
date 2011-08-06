<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

$cparams = JComponentHelper::getParams ('com_media');
if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_mailto/views/mailto/tmpl/default.php';
}
else {
?>
<script type="text/javascript">
<!--
	function submitbutton(pressbutton) {
	    var form = document.mailtoForm;

		// do field validation
		if (form.mailto.value == "" || form.from.value == "") {
			alert( '<?php echo JText::_('EMAIL_ERR_NOINFO'); ?>' );
			return false;
		}
		form.submit();
	}
-->
</script>
<?php
$data	= $this->get('data');
?>

<div id="mailto-window">

	<h2 class="componentheading">
		<?php echo JText::_('EMAIL_THIS_LINK_TO_A_FRIEND'); ?>
	</h2>
	
	<div class="mailto-close">
		<a href="javascript: void window.close()">
			<?php echo JText::_('CLOSE_WINDOW'); ?> <img src="<?php echo JURI::base() ?>components/com_mailto/assets/close-x.png" border="0" alt="" title="" />
		</a>
	</div>

	<form action="<?php echo JURI::base() ?>index.php" name="mailtoForm" method="post">
		<fieldset>
			<div class="formelm">
				<label for="mailto-field">
					<?php echo JText::_('EMAIL_TO'); ?>:
				</label>
				<input type="text" id="mailto-field" name="mailto" class="inputbox" size="25" value="<?php echo $this->escape($data->mailto) ?>"/>
			</div>	
			<div class="formelm">
				<label for="sender-field">
					<?php echo JText::_('SENDER'); ?>:
				</label>
				<input type="text" id="sender-field" name="sender" class="inputbox" value="<?php echo $this->escape($data->sender) ?>" size="25" />
			</div>
			<div class="formelm">
				<label for="from-field">
					<?php echo JText::_('YOUR_EMAIL'); ?>:
				</label>
				<input type="text" id="from-field" name="from" class="inputbox" value="<?php echo $this->escape($data->from) ?>" size="25" />
			</div>	
			<div class="formelm">
				<label for="subject-field">
					<?php echo JText::_('SUBJECT'); ?>:
				</label>
				<input type="text" id="subject-field"  name="subject" class="inputbox" value="<?php echo $this->escape($data->subject) ?>" size="25" />
			</div>	
			<p>
				<button class="button" onclick="return submitbutton('send');">
					<?php echo JText::_('SEND'); ?>
				</button>
				<button class="button" onclick="window.close();return false;">
					<?php echo JText::_('CANCEL'); ?>
				</button>
			</p>
		</fieldset>
		<input type="hidden" name="layout" value="<?php echo $this->getLayout();?>" />
		<input type="hidden" name="option" value="com_mailto" />
		<input type="hidden" name="task" value="send" />
		<input type="hidden" name="tmpl" value="component" />
		<input type="hidden" name="link" value="<?php echo $data->link; ?>" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>
<?php }