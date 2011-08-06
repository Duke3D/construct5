<?php defined('_JEXEC') or die;
/**
* @package		Template Framework for Joomla! 1.6+
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

function modChrome_jexhtml( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$outlineStyle = isset($attribs['outline-style']) ? $attribs['outline-style'] : NULL;
	
	if (!empty($module->content)) { 
		echo '<div class="moduletable'.$params->get('moduleclass_sfx'); if( $moduleClass ) echo ' '.$moduleClass; if( $outlineStyle ) echo ' outline-'.$outlineStyle; echo ' clearfix">';
			if ($module->showtitle) { 
				echo '<h'.$headerLevel.' class="'.$headerClass.'">'.$module->title.'</h'.$headerLevel.'>';
			}
			echo $module->content .'
		</div>';
	}
}	

function modChrome_jerounded( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : NULL;
	$roundedStyle = isset($attribs['rounded-style']) ? $attribs['rounded-style'] : NULL;
	
	if (!empty($module->content)) {
		echo '<div class="moduletable'.$params->get('moduleclass_sfx'); if( $moduleClass ) echo ' '.$moduleClass; if( $roundedStyle ) echo ' rounded-'.$roundedStyle; echo '">
			<div>
				<div>
					<div>';		 
					if ($module->showtitle) {
						echo '<h'.$headerLevel.' class="'.$headerClass.'">'.$module->title.'</h'.$headerLevel.'>';
					}
					echo $module->content .'
					</div>
				</div>
			</div>
		</div>';
	}
}
?>

<?php function modChrome_div( $module, &$params, &$attribs ) {
	
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content)){ ?>
		<div class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">		
			<?php if ($module->showtitle) : ?>
				<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
			<?php endif; ?>
			<?php echo $module->content; ?>	
		</div>

<?php	}
	}
?>

<?php function modChrome_aside( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content))
		{ ?>
		<aside class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">
			<div>	 
					<?php if ($module->showtitle) : ?>
						<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
					<?php endif; ?>
					<?php echo $module->content; ?>
			</div>
		</aside>

<?php	}
	}			
?>

<?php function modChrome_figure( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content))
		{ ?>
		<figure class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">
			<div>		 
					<?php if ($module->showtitle) : ?>
						<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
					<?php endif; ?>
					<?php echo $module->content; ?>
			</div>
		</figure>

<?php	}
	}			
?>

<?php function modChrome_footer( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content))
		{ ?>
		<footer class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">
			<div>	 
					<?php if ($module->showtitle) : ?>
						<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
					<?php endif; ?>
					<?php echo $module->content; ?>
			</div>
		</footer>

<?php	}
	}			
?>

<?php function modChrome_header( $module, &$params, &$attribs ) {
	$headerLevel = isset($attribs['level']) ? (int) $attribs['level'] : 3;
	$headerClass = isset($attribs['header-class']) ? $attribs['header-class'] : 'je-header';
	$moduleClass = isset($attribs['module-class']) ? $attribs['module-class'] : null;
	if (!empty($module->content))
		{ ?>
		<header class="moduletable<?php echo $params->get('moduleclass_sfx'); ?> <?php if($moduleClass) echo $moduleClass; ?>">
			<div>	 
					<?php if ($module->showtitle) : ?>
						<h<?php echo $headerLevel; ?> class="<?php echo $headerClass; ?>"><?php echo $module->title; ?><?php echo '</h'.$headerLevel; ?>>
					<?php endif; ?>
					<?php echo $module->content; ?>
			</div>
		</header>

<?php	}
	}			
?>
