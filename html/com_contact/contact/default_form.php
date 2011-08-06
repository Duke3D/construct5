<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
	include JPATH_ROOT.'/components/com_contact/views/contact/tmpl/default_form.php';
}
else {
?>

<script type="text/javascript">
	function validateForm( frm ) {
		var valid = document.formvalidator.isValid(frm);
		if (valid == false) {
			// do field validation
			if (frm.email.invalid) {
				alert( "<?php echo JText::_( 'Please enter a valid e-mail address.', true );?>" );
			} else if (frm.text.invalid) {
				alert( "<?php echo JText::_( 'CONTACT_FORM_NC', true ); ?>" );
			}
			return false;
		} else {
			frm.submit();
		}
	}
</script>

<div class="contact-form">

	<form action="<?php echo JRoute::_('index.php'); ?>" class="form-validate" method="post" name="emailForm" id="emailForm">
		<fieldset>
			<div class="contact-email">
				<div>
					<label for="contact-formname">
						<?php echo JText::_( 'Enter your name' ); ?>:
					</label>
					<input type="text" name="name" id="contact-formname" size="30" class="inputbox" value="" />
				</div>
				<div>
					<label id="contact-emailmsg" for="contact-email">
						<?php echo JText::_( 'Email address' ); ?>*:
					</label>
					<input type="text" id="contact-email" name="email" size="30" value="" class="inputbox required validate-email" maxlength="100" />
				</div>
				<div>
					<label for="contact-subject">
						<?php echo JText::_( 'Message subject' ); ?>:
					</label>
					<input type="text" name="subject" id="contact-subject" size="30" class="inputbox" value="" />
				</div>
				<div>
					<label id="contact-textmsg" for="contact-text" class="textarea">
						<?php echo JText::_( 'Enter your message' ); ?>*:
					</label>
					<textarea name="text" id="contact-text" class="inputbox required" rows="10" cols="50"></textarea>
				</div>
			
				<?php if ($this->contact->params->get( 'show_email_copy' )): ?>
					<div>
						<input type="checkbox" name="email_copy" id="contact-email-copy" value="1"  />
						<label for="contact-email-copy" class="copy">
							<?php echo JText::_( 'EMAIL_A_COPY' ); ?>
						</label>
					</div>
				<?php endif; ?>
				<div>
					<button class="button validate" type="submit"><?php echo JText::_('Send'); ?></button>
				</div>
			</div>
		</fieldset>
		<input type="hidden" name="option" value="com_contact" />
		<input type="hidden" name="view" value="contact" />
		<input type="hidden" name="id" value="<?php echo (int)$this->contact->id; ?>" />
		<input type="hidden" name="task" value="submit" />
		<?php echo JHTML::_( 'form.token' ); ?>	
	</form>
</div>
<?php } 