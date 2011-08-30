<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
// Joomla 1.6+
?>

    <form action="<?php echo JRoute::_('index.php');?>" method="post">
	    <section class="search<?php echo $moduleclass_sfx ?>">
		    <?php
			    $output = '<label for="mod-search-searchword">'.$label.'</label><input name="searchword" id="mod-search-searchword" maxlength="'.$maxlength.'"  class="inputbox'.$moduleclass_sfx.'" type="text" size="'.$width.'" value="'.$text.'"  onblur="if (this.value==\'\') this.value=\''.$text.'\';" onfocus="if (this.value==\''.$text.'\') this.value=\'\';" />';

			    if ($button) :
				    if ($imagebutton) :
					    $button = '<input type="image" value="'.$button_text.'" class="button'.$moduleclass_sfx.'" src="'.$img.'" onclick="this.form.searchword.focus();"/>';
				    else :
					    $button = '<input type="submit" value="'.$button_text.'" class="button'.$moduleclass_sfx.'" onclick="this.form.searchword.focus();"/>';
				    endif;
			    endif;

			    switch ($button_pos) :
				    case 'top' :
					    $button = $button.'<br />';
					    $output = $button.$output;
					    break;

				    case 'bottom' :
					    $button = '<br />'.$button;
					    $output = $output.$button;
					    break;

				    case 'right' :
					    $output = $output.$button;
					    break;

				    case 'left' :
				    default :
					    $output = $button.$output;
					    break;
			    endswitch;

			    echo $output;
		    ?>
	        <input type="hidden" name="task" value="search" />
	        <input type="hidden" name="option" value="com_search" />
	        <input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	    </section>
    </form>

<?php
}
else {
// Joomla 1.5 
?>

<div class="search">
	<form action="index.php?option=com_search&view=search"  method="post">
		<fieldset>
			<label for="mod_search_searchword">
				<?php echo JText::_('search') ?>
			</label>
			<?php
					$output = '<input name="searchword" id="mod_search_searchword" maxlength="20" class="inputbox" type="search" size="'.$width.'" value="'.$text.'"  onblur="if(this.value==\'\') this.value=\''.$text.'\';" onfocus="if(this.value==\''.$text.'\') this.value=\'\';">';
		
					if ($button) :
						if ($imagebutton) :
							$button = '<button type="submit" class="button">'.$img.' '.$button_text.'</button>';
						else :
							$button = '<button type="submit" value="'.$button_text.'" class="button"></button>';
						endif;
					endif;
		
					switch ($button_pos) :
						case 'top' :
							$button = $button.'<br>';
							$output = $button.$output;
							break;
		
						case 'bottom' :
							$button = '<br>'.$button;
							$output = $output.$button;
							break;
		
						case 'right' :
							$output = $output.$button;
							break;
		
						case 'left' :
						default :
							$output = $button.$output;
							break;
					endswitch;
		
					echo $output;
			?>
		</fieldset>
		<input type="hidden" name="option" value="com_search">
		<input type="hidden" name="task"   value="search">
	</form>
</div>
<?php }
