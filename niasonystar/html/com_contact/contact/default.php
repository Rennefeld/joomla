<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_contact
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$cparams = JComponentHelper::getParams('com_media');
$tparams = $this->params;
jimport('joomla.html.html.bootstrap');
?>

<!-- get social scripts -->
	<script src="/media/media/js/jquery-3.1.1.min.js"></script>
  	<script src="http://w.soundcloud.com/player/api.js"></script>
	<script src="media/media/js/facebooksdk.js"></script>
	<link rel="stylesheet" href="media/media/css/com_contact_social.css">
        <script src="media/media/js/masonry.pkgd.min.js"></script>
        <script src="media/media/js/masonrycontact.js"></script>
        <link rel="stylesheet" href="media/media/css/masonrycontact.css">
<!-- get social scripts -->

<div class="contact<?php echo $this->pageclass_sfx?>" itemscope itemtype="https://schema.org/Person">
	<?php if ($tparams->get('show_page_heading')) : ?>
		<h1>
			<?php echo $this->escape($tparams->get('page_heading')); ?>
		</h1>
	<?php endif; ?>

	<?php if ($this->contact->name && $tparams->get('show_name')) : ?>
		<div class="page-header">
			<h2>
				<?php if ($this->item->published == 0) : ?>
					<span class="label label-warning"><?php echo JText::_('JUNPUBLISHED'); ?></span>
				<?php endif; ?>
				<span class="contact-name" itemprop="name"><?php echo $this->contact->name; ?></span>
			</h2>
		</div>
	<?php endif; ?>

	<?php $show_contact_category = $tparams->get('show_contact_category'); ?>

	<?php if ($show_contact_category == 'show_no_link') : ?>
		<h3>
			<span class="contact-category"><?php echo $this->contact->category_title; ?></span>
		</h3>
	<?php elseif ($show_contact_category == 'show_with_link') : ?>
		<?php $contactLink = ContactHelperRoute::getCategoryRoute($this->contact->catid); ?>
		<h3>
			<span class="contact-category"><a href="<?php echo $contactLink; ?>">
				<?php echo $this->escape($this->contact->category_title); ?></a>
			</span>
		</h3>
	<?php endif; ?>

	<?php echo $this->item->event->afterDisplayTitle; ?>

	<?php if ($tparams->get('show_contact_list') && count($this->contacts) > 1) : ?>
		<form action="#" method="get" name="selectForm" id="selectForm">
			<?php echo JText::_('COM_CONTACT_SELECT_CONTACT'); ?>
			<?php echo JHtml::_('select.genericlist', $this->contacts, 'id', 'class="inputbox" onchange="document.location.href = this.value"', 'link', 'name', $this->contact->link); ?>
		</form>
	<?php endif; ?>

	<?php if ($tparams->get('show_tags', 1) && !empty($this->item->tags->itemTags)) : ?>
		<?php $this->item->tagLayout = new JLayoutFile('joomla.content.tags'); ?>
		<?php echo $this->item->tagLayout->render($this->item->tags->itemTags); ?>
	<?php endif; ?>

	<?php echo $this->item->event->beforeDisplayContent; ?>
	
	<?php $presentation_style = $tparams->get('presentation_style'); ?>

	<?php if ($presentation_style == 'sliders') : ?>
		<?php echo JHtml::_('bootstrap.startAccordion', 'slide-contact', array('active' => 'basic-details')); ?>
		<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_DETAILS'), 'basic-details'); ?>
	<?php elseif ($presentation_style == 'tabs') : ?>
		<?php echo JHtml::_('bootstrap.startTabSet', 'myTab', array('active' => 'basic-details')); ?>
		<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'basic-details', JText::_('COM_CONTACT_DETAILS')); ?>
	<?php elseif ($presentation_style == 'plain') : ?>
		<!--<?php echo '<h3>' . JText::_('COM_CONTACT_DETAILS') . '</h3>'; ?>-->
	<?php endif; ?>

<div id="contact-head-wrapper">
	<?php if ($this->contact->image && $tparams->get('show_image')) : ?>
		<div class="thumb-img-custom">
			<div id="img-custom">
			<?php echo JHtml::_('image', $this->contact->image, $this->contact->name, array('align' => 'middle', 'itemprop' => 'image')); ?>
			</div>
		</div>
	<?php endif; ?>
<div class="contact-miscinfo">
			<dl class="dl-horizontal">
				<dt>
					<span class="<?php echo $tparams->get('marker_class'); ?>">
					<?php echo $tparams->get('marker_misc'); ?>
					</span>
				</dt>
				<dd>
					<span class="contact-misc">
						<?php echo $this->contact->misc; ?>
					</span>
				</dd>
			</dl>
		</div>
</div>
<hr id="<?php echo $this->contact->category_title; ?>">

	<?php if ($this->contact->con_position && $tparams->get('show_position')) : ?>
		<dl class="contact-position dl-horizontal">
			<dd itemprop="jobTitle">
				<?php echo $this->contact->con_position; ?>
			</dd>
		</dl>
	<?php endif; ?>

	<?php echo $this->loadTemplate('address'); ?>

	<?php if ($tparams->get('allow_vcard')) : ?>
		<?php echo JText::_('COM_CONTACT_DOWNLOAD_INFORMATION_AS'); ?>
		<a href="<?php echo JRoute::_('index.php?option=com_contact&amp;view=contact&amp;id=' . $this->contact->id . '&amp;format=vcf'); ?>">
		<?php echo JText::_('COM_CONTACT_VCARD'); ?></a>
	<?php endif; ?>

	<?php if ($presentation_style == 'sliders') : ?>
		<?php echo JHtml::_('bootstrap.endSlide'); ?>
	<?php elseif ($presentation_style == 'tabs') : ?>
		<?php echo JHtml::_('bootstrap.endTab'); ?>
	<?php endif; ?>

	<?php if ($tparams->get('show_email_form') && ($this->contact->email_to || $this->contact->user_id)) : ?>
		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_EMAIL_FORM'), 'display-form'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-form', JText::_('COM_CONTACT_EMAIL_FORM')); ?>
		<?php elseif ($presentation_style == 'plain') : ?>
			<!--<?php echo '<h3>' . JText::_('COM_CONTACT_EMAIL_FORM') . '</h3>'; ?>-->
		<?php endif; ?>

		<?php echo $this->loadTemplate('form'); ?>

		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.endSlide'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($tparams->get('show_links')) : ?>
		<?php echo $this->loadTemplate('links'); ?>
	<?php endif; ?>

	<?php if ($tparams->get('show_articles') && $this->contact->user_id && $this->contact->articles) : ?>
		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('JGLOBAL_ARTICLES'), 'display-articles'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-articles', JText::_('JGLOBAL_ARTICLES')); ?>
		<?php elseif ($presentation_style == 'plain') : ?>
			<?php echo '<h3>' . JText::_('JGLOBAL_ARTICLES') . '</h3>'; ?>
		<?php endif; ?>

		<?php echo $this->loadTemplate('articles'); ?>

		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.endSlide'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($tparams->get('show_profile') && $this->contact->user_id && JPluginHelper::isEnabled('user', 'profile')) : ?>
		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_PROFILE'), 'display-profile'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-profile', JText::_('COM_CONTACT_PROFILE')); ?>
		<?php elseif ($presentation_style == 'plain') : ?>
			<?php echo '<h3>' . JText::_('COM_CONTACT_PROFILE') . '</h3>'; ?>
		<?php endif; ?>

		<?php echo $this->loadTemplate('profile'); ?>

		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.endSlide'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($this->contact->misc && $tparams->get('show_misc')) : ?>
		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.addSlide', 'slide-contact', JText::_('COM_CONTACT_OTHER_INFORMATION'), 'display-misc'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.addTab', 'myTab', 'display-misc', JText::_('COM_CONTACT_OTHER_INFORMATION')); ?>
		<?php elseif ($presentation_style == 'plain') : ?>
			<!--<?php echo '<h3>' . JText::_('COM_CONTACT_OTHER_INFORMATION') . '</h3>'; ?>-->
		<?php endif; ?>

		

		<?php if ($presentation_style == 'sliders') : ?>
			<?php echo JHtml::_('bootstrap.endSlide'); ?>
		<?php elseif ($presentation_style == 'tabs') : ?>
			<?php echo JHtml::_('bootstrap.endTab'); ?>
		<?php endif; ?>
	<?php endif; ?>

	<?php if ($presentation_style == 'sliders') : ?>
		<?php echo JHtml::_('bootstrap.endAccordion'); ?>
	<?php elseif ($presentation_style == 'tabs') : ?>
		<?php echo JHtml::_('bootstrap.endTabSet'); ?>
	<?php endif; ?>

	<?php echo $this->item->event->afterDisplayContent; ?>
</div>
