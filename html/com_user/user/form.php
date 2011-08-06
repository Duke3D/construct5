<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/
?>

<div class="profile-edit<?php echo $this->escape($this->params->get('pageclass_sfx')) ?>">

	<?php if($this->params->get('show_page_title',1)) : ?>
		<h1>
			<?php echo $this->escape($this->params->get('page_title')) ?>
		</h1>
	<?php endif; ?>
	
	<script type="text/javascript">
	<!--
		Window.onDomReady(function(){
			document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); }	);
		});
	// -->
	</script>

	<form id="member-profile" action="<?php echo JRoute::_( 'index.php' ); ?>" method="post" name="userform" autocomplete="off" class="user">
		<fieldset>
			<dl>
				<dt>
					<label for="username">
						<?php echo JText::_( 'User Name' ); ?>:
					</label>					
				</dt>
				<dd>
					<?php echo $this->escape($this->user->get('username')); ?>
				</dd>
				<dt>
					<label for="name">
						<?php echo JText::_( 'Your Name' ); ?>:
					</label>
				</dt>
				<dd>
					<input class="inputbox" type="text" id="name" name="name" value="<?php echo $this->escape($this->user->get('name')); ?>" size="40" />
				</dd>
				<dt>
					<label for="email">
						<?php echo JText::_( 'email' ); ?>:
					</label>
				</dt>
				<dd>
					<input class="inputbox required validate-email" type="text" id="email" name="email" value="<?php echo $this->escape($this->user->get('email'));?>" size="40" />
				</dd>	
				<?php if($this->user->get('password')) : ?>
					<dt>
						<label for="password">
							<?php echo JText::_( 'Password' ); ?>:
						</label>
					</dt>
					<dd>
						<input class="inputbox validate-password" type="password" id="password" name="password" value="" size="40" />
					</dd>
					<dt>
						<label for="verifyPass">
							<?php echo JText::_( 'Verify Password' ); ?>:
						</label>
					</dt>
					<dd>
						<input class="inputbox validate-passverify" type="password" id="password2" name="password2" size="40" />
					</dd>
				<?php endif; ?>
				<?php if(isset($this->params)) : ?>
					<?php echo $this->params->render( 'params' ); ?>
				<?php endif; ?>
			</dl>
			<div>	
				<button class="button validate" type="submit" onclick="submitbutton( this.form );return false;">
					<?php echo JText::_( 'Save' ); ?>
				</button>
			</div>	
		</fieldset>		
		<input type="hidden" name="username" value="<?php echo $this->escape($this->user->get('username'));?>" />
		<input type="hidden" name="id" value="<?php echo (int)$this->user->get('id');?>" />
		<input type="hidden" name="gid" value="<?php echo (int)$this->user->get('gid');?>" />
		<input type="hidden" name="option" value="com_user" />
		<input type="hidden" name="task" value="save" />
		<?php echo JHTML::_( 'form.token' ); ?>
	</form>
</div>