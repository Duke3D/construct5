<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

$cparams = JComponentHelper::getParams ('com_media');
if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/modules/mod_login/tmpl/default.php';
}
else {
// Joomla 1.5 
?>

<?php
$return = base64_encode(base64_decode($return).'#content');

if ($type == 'logout') : ?>
	<form action="index.php" method="post" id="login-form">
		<fieldset>
			<?php if ($params->get('greeting')) : ?>
			<div class="login-greeting">
					<?php if ($params->get('name')) : {
						echo JText::sprintf( 'HINAME', $user->get('name') );
					} else : {
						echo JText::sprintf( 'HINAME', $user->get('username') );
					} endif; ?>
			</div>
			<?php endif; ?>	
			<button type="submit" name="submit" class="button">
				<?php echo JText::_('BUTTON_LOGOUT'); ?>
			</button>		
		</fieldset>		
		<input type="hidden" name="option" value="com_user">
		<input type="hidden" name="task" value="logout">
		<input type="hidden" name="return" value="<?php echo $return; ?>">		
	</form>
<?php else : ?>
<form action="<?php echo JRoute::_( 'index.php', true, $params->get('usesecure')); ?>" method="post" id="login-form">
	<?php if ($params->get('pretext')) : ?>
		<p class="pretext">
			<?php echo $params->get('pretext'); ?>
		</p>
	<?php endif; ?>
	<fieldset class="userdata">
		<label id="form-login-username" for="mod_login_username">
			<?php echo JText::_('Username'); ?>
			<input name="username" id="mod_login_username" type="text" class="inputbox" alt="<?php echo JText::_('Username'); ?>">
		</label>
		<label id="form-login-password" for="mod_login_password">
			<?php echo JText::_('Password'); ?>
			<input type="password" id="mod_login_password" name="passwd" class="inputbox"  alt="<?php echo JText::_('Password'); ?>">
		</label>
		<label id="form-login-remember" for="mod_login_remember" class="remember">
			<?php echo JText::_('Remember me'); ?>
			<input type="checkbox" name="remember" id="mod_login_remember" class="checkbox" value="yes" alt="<?php echo JText::_('Remember me'); ?>" />
		</label>
		<button type="submit" name="Submit" class="button">
			<?php echo JText::_('BUTTON_LOGIN'); ?>
		</button>
	</fieldset>
	<ul>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_user&view=reset#content'); ?>">
				<?php echo JText::_('FORGOT_YOUR_PASSWORD'); ?>
			</a>
		</li>
		<li>
			<a href="<?php echo JRoute::_('index.php?option=com_user&view=remind#content'); ?>">
				<?php echo JText::_('FORGOT_YOUR_USERNAME'); ?>
			</a>
		</li>
		<?php $usersConfig =& JComponentHelper::getParams('com_users'); ?>			
		<?php if ($usersConfig->get('allowUserRegistration')) : ?>
			<li>
				<?php echo JText::_('No account yet?'); ?>
				<a href="<?php echo JRoute::_('index.php?option=com_user&view=register#content'); ?>">
					<?php echo JText::_('Register'); ?>
				</a>
			</li>
		<?php endif; ?>
	</ul>
	<p class="posttext">
		<?php echo $params->get('posttext'); ?>
	</p>
	<input type="hidden" name="option" value="com_user">
	<input type="hidden" name="task" value="login">
	<input type="hidden" name="return" value="<?php echo $return; ?>">
	<?php echo JHTML::_( 'form.token' ); ?>
</form>
<?php endif; ?>
<?php }