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
<?php

//var_dump($contact_title, $social_title, $contact_info, $contact_address,  $social_info, $user);
// $output = theme('social_contact_info_contact_social_detail', $contact, $social);
// // return $output;
// var_dump($output);
?>
<div class="block-contact-details">
	<h4><?php print $contact_title; ?></h4>
	<div class="contact-content">
		<div class="contact-address"><?php print $contact_address; ?></div>
		<?php foreach ($contact_info as $key => $contact_value) { ?>
				<div><?php print $contact_value; ?></div>
		<?php } ?>
	</div>
</div>

<div class="block-social-details">
	<h4><?php print $social_title; ?></h4>
	<div class="social-content">
		<?php foreach ($social_info as $key => $social_value) { ?>
				<div><?php print $social_value; ?></div>
		<?php } ?>
	</div>
</div>

<?php //exit;