<?php

/**
 * @file
 * Customize the contact and social media details.
 *
 * Available variables:
 * - $contact_title: Contact title.
 * - $contact_address: Contact address body.
 * - $contact_info: The Contact detail array.
 * - $social_title: Contact title.
 * - $social_info: The Social media array.
 * - $user: The logged-in user detail.
 */
?>

<div class="block-contact-details">
  <h3 class="social-content-title"><?php print $contact_title; ?></h3>
  <div class="contact-content">
    <?php foreach ($contact_info as $key => $contact_value) { ?>
      <div class="fields contact-values">
        <h4><?php print $contact_value['label']; ?></h4>
        <div><?php if (is_array($contact_value['value'])) {print $contact_value['value']['value'];} else {print $contact_value['value'];} ?></div>
      </div>
    <?php } ?>
  </div>
</div>

<div class="block-social-details">
  <h3 class="social-content-title"><?php print $social_title; ?></h3>
  <div class="social-content">
    <?php foreach ($social_info as $key => $social_value) { ?>
      <div class="social-values"><a href="<?php print $social_value["link"]; ?>" class="<?php print $social_value["class"]; ?>" rel="social_link" target="_blank"><?php if (isset($social_value['label'])) print $social_value['label']; ?></a></div>
    <?php } ?>
  </div>
</div>
