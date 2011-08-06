<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla! 1.5,1.6+
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

/**
 * This is a file to add template specific chrome to module rendering.  To use it you would
 * set the style attribute for the given module(s) include in your template to use the style
 * for each given modChrome function.
 *
 * eg.  To render a module mod_test in the sliders style, you would use the following include:
 * <jdoc:include type="module" name="test" style="slider" />
 *
 * This gives template designers ultimate control over how modules are rendered.
 *
 * NOTICE: All chrome wrapping methods should be named: modChrome_{STYLE} and take the same
 * three arguments.
 */


/**
 * Inspired by beez custom module chrom. Renders the module in an xhtml style module, within a <div>
 * and the header in <h{x}> with a designated CSS class. The level of the header can be configured 
 * through a 'headerLevel' attribute of the <jdoc:include /> tag. For	example: 
 * <jdoc:include type="modules" name="left" style="jexhtml" level="2" header-class="high-contrast" module-class="grey"/>
 * Defaults to <h3 class="je-header"> if none is designated.
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