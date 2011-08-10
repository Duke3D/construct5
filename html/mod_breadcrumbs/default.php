<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
// Joomla! 1.6+
?>
	<nav class="breadcrumbs<?php echo $moduleclass_sfx; ?>">
	<?php if ($params->get('showHere', 1))
		{
			echo '<span class="showHere">' .JText::_('MOD_BREADCRUMBS_HERE').'</span>';
		}
	?>
	<?php for ($i = 0; $i < $count; $i ++) :

		// If not the last item in the breadcrumbs add the separator
		if ($i < $count -1) {
			if (!empty($list[$i]->link)) {
				echo '<a href="'.$list[$i]->link.'" class="pathway">'.$list[$i]->name.'</a>';
			} else {
				echo '<span>';
				echo $list[$i]->name;
				echo '</span>';
			}
			if($i < $count -2){
				echo ' '.$separator.' ';
			}
		}  else if ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
			if($i > 0){
				echo ' '.$separator.' ';
			}
			 echo '<span>';
			echo $list[$i]->name;
			  echo '</span>';
		}
	endfor; ?>
	</nav>
	
<?php 	
}
else {
// Joomla 1.5
?>

	<div class="breadcrumbs<?php echo $params->get('moduleclass_sfx') ?>">

		<span class="showHere">You are here:</span>	
		<?php for ($i = 0; $i < $count; $i ++) :	

			// If not the last item in the breadcrumbs add the separator
			if ($i < $count -1) {
				if(!empty($list[$i]->link)) {
					echo '<span><a href="'.$list[$i]->link.'" class="pathway">'.$list[$i]->name.'</a>';
				} else {
					echo '<span>'.$list[$i]->name;
				}
				echo ' '.$separator.' </span>';
			}  else if ($params->get('showLast', 1)) { // when $i == $count -1 and 'showLast' is true
				echo '<span>'.$list[$i]->name.'</span>';
			}	
		endfor; ?>	
	</div>
<?php }