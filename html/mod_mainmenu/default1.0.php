<?php

// no direct access
defined('_JEXEC') or die('Restricted access');


if ( ! defined('modMainMenuXMLCallbackDefined') )
{
function modMainMenuXMLCallback(&$node, $args)
{
	$user	= &JFactory::getUser();
	$menu	= &JSite::getMenu();
	$active	= $menu->getActive();
	$path	= isset($active) ? array_reverse($active->tree) : null;

	if (($args['end']) && ($node->attributes('level') >= $args['end']))
	{
		$children = $node->children();
		foreach ($node->children() as $child)
		{
			if ($child->name() == 'ul') {
				$node->removeChild($child);
			}
		}
	}

// @WS first and last class upgrade
	if ($node->name() == 'ul') {
    foreach ($node->children() as $child) {
        if ($child->attributes('access') > $user->get('aid', 0)) {
            $node->removeChild($child);
        }
    }
// First we need to count how many items are in the menu array
    $children_count = count($node->children());
    $children_index = 0;
    foreach ($node->children() as $child) {
// we need to find out if this is the first item in the array (0)
        if ($children_index == 0) {
// we add the class attribute to the li tag and append the value first 
            $child->addAttribute('class', 'first');
        }
// we need to find out if this is the last item in the array (-1)
        if ($children_index == $children_count - 1) {
// we add the class attribute to the li tag and append the value last
            $child->addAttribute('class', 'last');
        }
        $children_index++;
   		}
	}
// @WS end first and last class upgrade

	if (($node->name() == 'li') && isset($node->ul)) {
		$node->addAttribute('class', 'parent');
	}

	if (isset($path) && (in_array($node->attributes('id'), $path) || in_array($node->attributes('rel'), $path)))
	{
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' active');
		} else {
			$node->addAttribute('class', 'active');
		}
	}
	else
	{
		if (isset($args['children']) && !$args['children'])
		{
			$children = $node->children();
			foreach ($node->children() as $child)
			{
				if ($child->name() == 'ul') {
					$node->removeChild($child);
				}
			}
		}
	}

	if (($node->name() == 'li') && ($id = $node->attributes('id'))) {
		if ($node->attributes('class')) {
			$node->addAttribute('class', $node->attributes('class').' item'.$id);
		} else {
			$node->addAttribute('class', 'item'.$id);
		}
	}

	if (isset($path) && $node->attributes('id') == $path[0]) {
		$node->addAttribute('id', 'current');
	} else {
		$node->removeAttribute('id');
	}
	$node->removeAttribute('rel');
	$node->removeAttribute('level');
	$node->removeAttribute('access');
}
	define('modMainMenuXMLCallbackDefined', true);
}

modMainMenuHelper::render($params, 'modMainMenuXMLCallback');
