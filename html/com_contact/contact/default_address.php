<?php defined('_JEXEC') or die;
/**
* @package		Unified Template Framework for Joomla!
* @author		Joomla Engineering http://joomlaengineering.com
* @copyright	Copyright (C) 2010, 2011 Matt Thomas | Joomla Engineering. All rights reserved.
* @license		GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
*/

if (substr(JVERSION, 0, 3) >= '1.6') {
// Joomla 1.6+ ?>

/*Continue here*/

<?php
}
else {
// Joomla 1.5 
?>

<?php $show_address = (($this->contact->params->get('address_check') > 0) &&
		($this->contact->address || $this->contact->suburb || $this->contact->state || $this->contact->country || $this->contact->postcode)) ||
		(($this->contact->email_to && $this->contact->params->get('show_email')) || $this->contact->telephone || $this->contact->fax ); ?>

<?php if ($show_address): ?>
	
<?php endif; ?>

<?php if (($this->contact->params->get('address_check') > 0) && ($this->contact->address || $this->contact->suburb || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
	<div class="contact_address">
	<?php if ( $this->contact->params->get('address_check') > 0) : ?>
		<?php if (( $this->contact->params->get('contact_icons') ==0) || ($this->contact->params->get('contact_icons') ==1)): ?>
			<span class="marker">
				<?php echo $this->contact->params->get('marker_address') ?>
			</span>
		<?php endif; ?>
		<address>
	<?php endif; ?>
	
	<?php if ($this->contact->address && $this->contact->params->get('show_street_address')) : ?>
		<span class="contact-street">
			<?php echo nl2br($this->escape($this->contact->address)); ?>
		</span>
	<?php endif; ?>
	
	<?php if($this->contact->suburb && $this->contact->params->get('show_suburb')) : ?>
		<span class="contact-suburb">
			<?php echo $this->escape($this->contact->suburb); ?>
		</span>
	<?php endif; ?>
	
	<?php if($this->contact->state && $this->contact->params->get('show_state')) : ?>
		<span class="contact-state">
			<?php echo $this->escape($this->contact->state); ?>
		</span>
	<?php endif; ?>
	
	<?php if($this->contact->postcode && $this->contact->params->get('show_postcode')) : ?>
		<span class="contact-postcode">
			<?php echo $this->escape($this->contact->postcode); ?>
		</span>
	<?php endif; ?>	

	<?php if($this->contact->country && $this->contact->params->get('show_country')) : ?>
		<span class="contact-country">
			<?php echo $this->escape($this->contact->country); ?>
		</span>
	<?php endif; ?>	
<?php endif; ?>

<?php if ( $this->contact->params->get('address_check') > 0) : ?>
		</address>
	</div>
<?php endif; ?>

<?php if(($this->contact->email_to && $this->contact->params->get('show_email')) || $this->contact->telephone || $this->contact->fax ) : ?>
	<div class="contact-contactinfo">
	<?php if($this->contact->email_to && $this->contact->params->get('show_email')) : ?>
		<p>
		<?php if(( $this->contact->params->get('contact_icons') ==0) || ( $this->contact->params->get('contact_icons') ==1)) : ?>		
			<span class="marker">
				<?php echo $this->contact->params->get('marker_email'); ?>
			</span>
		<?php endif; ?>
			<span class="contact-emailto">
				<?php echo $this->contact->email_to; ?>
			</span>
		</p>	
	<?php endif; ?>
	

	<?php if($this->contact->telephone && $this->contact->params->get('show_telephone')) : ?>
		<p>
		<?php if(( $this->contact->params->get('contact_icons') ==0) || ( $this->contact->params->get('contact_icons') ==1)): ?>
			<span class="marker">
				<?php echo $this->contact->params->get('marker_telephone'); ?>
			</span>
		<?php endif; ?>
			<span class="contact-telephone">
				<?php echo nl2br($this->escape($this->contact->telephone)); ?>
			</span>
		</p>
		<?php endif; ?>

	<?php if($this->contact->fax && $this->contact->params->get('show_fax')) : ?>
		<p>
		<?php if(( $this->contact->params->get('contact_icons') ==0) || ( $this->contact->params->get('contact_icons') ==1)): ?>
			<span class="marker">
				<?php echo $this->contact->params->get('marker_fax'); ?>
			</span>
		<?php endif; ?>
			<span class="contact-fax">
				<?php echo nl2br($this->escape($this->contact->fax)); ?>
			</span>
		</p>
		<?php endif; ?>

	<?php if( $this->contact->mobile && $this->contact->params->get( 'show_mobile' ) ) : ?>
		<p>
		<?php if(( $this->contact->params->get('contact_icons') ==0) || ( $this->contact->params->get('contact_icons') ==1)): ?>
			<span class="marker">
				<?php echo $this->contact->params->get( 'marker_mobile' ); ?>
			</span>
		<?php endif; ?>
			<span class="contact-mobile">
				<?php echo nl2br($this->escape($this->contact->mobile)); ?>
			</span>
		</p>
		<?php endif; ?>

		<?php if($this->contact->webpage && $this->contact->params->get('show_webpage')) : ?>
		<p>
			<span class="contact-webpage">
				<a href="<?php echo $this->escape($this->contact->webpage); ?>" target="_blank"><?php echo $this->escape($this->contact->webpage); ?></a>
			</span>
		</p>	
		<?php endif; ?>
	</div>
<?php endif; ?>


<?php if ($this->contact->misc && $this->contact->params->get('show_misc')) : ?>
	<p>
	  <?php if (( $this->contact->params->get('contact_icons') ==0) || ( $this->contact->params->get('contact_icons') ==1)): ?>
		<span class="marker">
			<?php echo $this->contact->params->get('marker_misc'); ?>
		</span>
	 <?php endif; ?>
		<span class="contact-misc">
			<?php echo nl2br($this->contact->misc); ?>
		</span>
	</p>
<?php endif;
}