<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<h4><?php echo $poll->title; ?></h4>
<form name="form2" method="post" action="index.php" class="poll">
	<fieldset>
		<dl>
			<?php for ($i = 0, $n = count($options); $i < $n; $i++) : ?>
				<dt>
					<label for="voteid<?php echo $options[$i]->id; ?>">
						<?php echo $options[$i]->text; ?>
					</label>
				</dt>
				<dd>				
					<input type="radio" name="voteid" id="voteid<?php echo $options[$i]->id; ?>" value="<?php echo $options[$i]->id; ?>" alt="<?php echo $options[$i]->id; ?>" />
				</dd>
			<?php endfor; ?>
		</dl>
		<button type="submit" name="task_button" class="button">
			<?php echo JText::_('Vote'); ?>
		</button>
		<div>	
			<a href="<?php echo JRoute::_('index.php?option=com_poll&id='.$poll->slug.$itemid.'#content'); ?>">
				<?php echo JText::_('Results'); ?>
			</a>
		</div>
	</fieldset>
	<input type="hidden" name="option" value="com_poll" />
	<input type="hidden" name="id" value="<?php echo $poll->id; ?>" />
	<input type="hidden" name="task" value="vote" />
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
