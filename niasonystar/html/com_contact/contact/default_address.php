
<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Marker_class: Class based on the selection of text, none, or icons
 * jicon-text, jicon-none, jicon-icon
 */
?>

<dl class="contact-address dl-horizontal" itemprop="address" itemscope itemtype="https://schema.org/PostalAddress">
	<?php if (($this->params->get('address_check') > 0) &&
		($this->contact->address || $this->contact->suburb  || $this->contact->state || $this->contact->country || $this->contact->postcode)) : ?>
		<dt>
			<span class="<?php echo $this->params->get('marker_class'); ?>">
				<?php echo $this->params->get('marker_address'); ?>
			</span>
		</dt>

		<?php if ($this->contact->address && $this->params->get('show_street_address')) : ?>
			<dd>
				<span class="contact-street" itemprop="streetAddress">
					<?php echo nl2br($this->contact->address); ?>
					<br />
				</span>
			</dd>
		<?php endif; ?>

		<?php if ($this->contact->suburb && $this->params->get('show_suburb')) : ?>
			<dd>
				<span class="contact-suburb" itemprop="addressLocality">
					<?php echo $this->contact->suburb; ?>
					<br />
				</span>
			</dd>
		<?php endif; ?>
		<?php if ($this->contact->state && $this->params->get('show_state')) : ?>
			<dd>
				<span class="contact-state" itemprop="addressRegion">
					<?php echo $this->contact->state; ?>
					<br />
				</span>
			</dd>
		<?php endif; ?>
		<?php if ($this->contact->postcode && $this->params->get('show_postcode')) : ?>
			<dd>
				<span class="contact-postcode" itemprop="postalCode">
					<?php echo $this->contact->postcode; ?>
					<br />
				</span>
			</dd>
		<?php endif; ?>
		<?php if ($this->contact->country && $this->params->get('show_country')) : ?>
		<dd>
			<span class="contact-country" itemprop="addressCountry">
				<?php echo $this->contact->country; ?>
				<br />
			</span>
		</dd>
		<?php endif; ?>
	<?php endif; ?>

<?php if ($this->contact->email_to && $this->params->get('show_email')) : ?>
	<dt>
		<span class="<?php echo $this->params->get('marker_class'); ?>" itemprop="email">
			<?php echo nl2br($this->params->get('marker_email')); ?>
		</span>
	</dt>
	<dd>
		<span class="contact-emailto">
			<?php echo $this->contact->email_to; ?>
		</span>
	</dd>
<?php endif; ?>

	<!-- masonry start-->
	<div id="wrapper">
	<div id="list">



	<?php if ($this->contact->telephone && $this->params->get('show_telephone')) : ?>
	<div class="item">
		<span class="contact-telephone" itemprop="telephone">

	<!-- show Facebook site plugin -->
	<div id="fb-page-custom" class="fb-page" data-href="<?php echo nl2br($this->contact->telephone); ?>" data-tabs="timeline" data-height="300" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="<?php echo nl2br($this->contact->telephone); ?>" class="fb-xfbml-parse-ignore"><a href="<?php echo nl2br($this->contact->telephone); ?>">The Synergy</a></blockquote></div>
		</span>
	</div>
	<?php endif; ?>
	
	<?php if ($this->contact->mobile && $this->params->get('show_mobile')) :?>
	<div class="item">
		<span class="contact-mobile" itemprop="telephone">
	<!-- soundcloud -->
	<div id="soundcloud">
	<iframe id="sc-widget-custom" 
	width="100%" 
        height="300" 
        scrolling="yes" 
        frameborder="no" 
        src="https://w.soundcloud.com/player/?url=<?php echo nl2br($this->contact->mobile); ?>&visual=true&show_artwork=false"
	float="right"
	position="relative">
	</iframe>
	</div>
	<!-- soundcloud -->
		</span>
	</div>
	<?php endif; ?>

	</div>
	</div>
	<!-- masonry end-->

	
</dl>
<?php if ($this->contact->fax && $this->params->get('show_fax')) : ?>
	<div class="item2">
		<span class="contact-fax" itemprop="faxNumber">
		
	<!-- iTunes -->
	<a class ="itunes" target="_blank" href="<?php echo nl2br($this->contact->fax); ?>?mt=1&app=music" style="display:inline-block;overflow:hidden; no-repeat;width:110px;height:40px;background-size:contain;">
	</a>
	<!-- iTunes -->
		</span>
	</div>
	<?php endif; ?>


	<?php if ($this->contact->webpage && $this->params->get('show_webpage')) : ?>
	
	
<div class="item3">
		<span class="contact-webpage">
			<a href="<?php echo $this->contact->webpage; ?>" target="_blank" itemprop="url">
			<?php echo JStringPunycode::urlToUTF8($this->contact->webpage); ?></a>
		</span>
	</div>
	<?php endif; ?>
