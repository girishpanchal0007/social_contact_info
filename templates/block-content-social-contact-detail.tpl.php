<?php

/**
 * @file
 * Customize the contact and social media details.
 *
 * Available variables:
 * - $contact_title: Contact title.
 * - $contact_info: The Contact detail array which returns when value is not empty.
 * - $social_title: Contact title.
 * - $social_info: The Social detail array which returns when value is not empty.
 * - $user: The logged-in user detail.
 */
?>

<div class="block-contact-details">
  <?php if (!empty($contact_title)) { ?>
    <h3 class="social-content-title"><?php print $contact_title; ?></h3>
  <?php } ?>
  <div class="contact-content">
    <?php foreach ($contact_info as $key => $contact_value) {
      if (isset($contact_value) && !empty($contact_value)) { ?>
        <div class="contact-field contact-value-<?php print strtolower($contact_value['label']); ?>">
          <h4><?php print $contact_value['label']; ?></h4>
          <div class="contact-field-<?php print strtolower($contact_value['label']); ?>"><?php if (is_array($contact_value['value'])) {print $contact_value['value']['value'];} else {print $contact_value['value'];} ?></div>
        </div>
      <?php }
    } ?>
  </div>
</div>

<div class="block-social-details">
  <?php if (!empty($social_info)) { ?>
    <?php if (!empty($social_title)) { ?>
      <h3 class="social-content-title"><?php print $social_title; ?></h3>
    <?php } ?>
    <div class="social-content">
      <?php foreach ($social_info as $key => $social_value) { ?>
        <div class="social-field social-value-<?php print strtolower($social_value['label']); ?>"><a href="<?php print $social_value["link"]; ?>" class="social-link <?php print $social_value["class"]; ?>" rel="social_link" target="_blank"><?php if (isset($social_value['label'])) print $social_value['label']; ?></a></div>
      <?php } ?>
    </div>
  <?php } ?>
</div>
