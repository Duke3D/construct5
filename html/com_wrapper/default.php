<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_wrapper/views/wrapper/tmpl/default.php';
}
else {
?>

<script type="text/javascript">
function iFrameHeight() {
	var h = 0;
	if ( !document.all ) {
		h = document.getElementById('blockrandom').contentDocument.height;
		document.getElementById('blockrandom').style.height = h + 60 + 'px';
	} else if( document.all ) {
		h = document.frames('blockrandom').document.body.scrollHeight;
		document.all.blockrandom.style.height = h + 20 + 'px';
	}
}
</script>
<div class="contentpane<?php echo $this->escape($this->params->get('pageclass_sfx')); ?>">
	<?php if ( $this->params->get( 'show_page_title', 1 ) ) : ?>
		<h2>
			<?php echo $this->escape($this->params->get( 'page_title' )); ?>
		</h2>
	<?php endif; ?>
	<iframe <?php echo $this->wrapper->load; ?>
		id="blockrandom"
		name="iframe"
		src="<?php echo $this->wrapper->url; ?>"
		width="<?php echo $this->params->get( 'width' ); ?>"
		height="<?php echo $this->params->get( 'height' ); ?>"
		scrolling="<?php echo $this->params->get( 'scrolling' ); ?>"
		align="top"
		frameborder="0"
		class="wrapper">
		<?php echo JText::_( 'NO_IFRAMES' ); ?>
	</iframe>
</div>
<?php }