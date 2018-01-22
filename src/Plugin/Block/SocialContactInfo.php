<?php

namespace Drupal\social_contact_info\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;

/**
 * Provides a 'Hello' Block.
 *
 * @Block(
 *   id = "social_contact_info",
 *   admin_label = @Translation("Social Contact Info"),
 *   category = @Translation("Social Contact Info"),
 * )
 */
class SocialContactInfo extends BlockBase implements BlockPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function blockForm($form, FormStateInterface $form_state) {
    $form = parent::blockForm($form, $form_state);

    $form['contact_detail'] = array(
      '#type' => 'details',
      '#title' => $this->t('Contact Informations'),
      '#open' => FALSE,
      '#description' => $this->t('Contact information shows contact detail of the website. e.g. (Address, Phone, Email, etc..).'),
    );
    // Contact section title.
    $form['contact_detail']['contact_title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Contact Title'),
      '#description' => $this->t('This is contact title which helps to show contact title on top of the contact section. (This is optional.)'),
      '#attributes' => array(
        'placeholder' => $this->t('Contact Title'),
      ),
      '#default_value' => $this->configuration['contact_detail']['contact_title'],
    );
    // Address section.
    $form['contact_detail']['address'] = array(
      '#type' => 'details',
      '#title' => $this->t('Address'),
      '#open' => FALSE,
    );
    $form['contact_detail']['address']['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['address']['label'],
    );
    $form['contact_detail']['address']['value'] = array(
      '#type' => 'text_format',
      '#title' => $this->t('Value'),
      '#resizable' => FALSE,
      '#format' => 'full_html',
      '#default_value' => $this->configuration['contact_detail']['address']['value']['value'],
    );
    // E-mail section.
    $form['contact_detail']['email'] = array(
      '#type' => 'details',
      '#title' => $this->t('E-mail'),
      '#open' => FALSE,
    );
    $form['contact_detail']['email']['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['email']['label'],
    );
    $form['contact_detail']['email']['value'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website email field which helps to show website email. (This is required.)'),
      '#default_value' => $this->configuration['contact_detail']['email']['value'],
    );
    // Phone section.
    $form['contact_detail']['phone'] = array(
      '#type' => 'details',
      '#title' => $this->t('Phone'),
      '#open' => FALSE,
    );
    $form['contact_detail']['phone']['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['phone']['label'],
    );
    $form['contact_detail']['phone']['value'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website phone number field which helps to show website phone number. (This is optional.)'),
      '#default_value' => $this->configuration['contact_detail']['phone']['value'],
    );
    // Mobile section.
    $form['contact_detail']['mobile'] = array(
      '#type' => 'details',
      '#title' => $this->t('Mobile'),
      '#open' => FALSE,
    );
    $form['contact_detail']['mobile']['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['mobile']['label'],
    );
    $form['contact_detail']['mobile']['value'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website mobile number field which helps to show website mobile number. (This is optional.)'),
      '#default_value' => $this->configuration['contact_detail']['mobile']['value'],
    );
    // Fax section.
    $form['contact_detail']['fax'] = array(
      '#type' => 'details',
      '#title' => $this->t('FAX'),
      '#open' => FALSE,
    );
    $form['contact_detail']['fax']['label'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Label'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['fax']['label'],
    );
    $form['contact_detail']['fax']['value'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website fax number field which helps to show website fax number.'),
      '#default_value' => $this->configuration['contact_detail']['fax']['value'],
    );
    // Website Social information.
    $form['social_detail'] = array(
      '#type' => 'details',
      '#title' => $this->t('Social Information'),
      '#open' => FALSE,
      '#description' => $this->t('Social information shows social links of the website. e.g. (Facebook, LinkedIn, Twitter, etc..).'),
    );
    // Social section title.
    $form['social_detail']['social_title'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Social Title'),
      '#description' => $this->t('This is social title which helps to show social title on top of the social section. (This is optional.)'),
      '#attributes' => array(
        'placeholder' => $this->t('Social Title'),
      ),
      '#default_value' => $this->configuration['social_detail']['social_title'],
    );
    // Facebook section.
    $form['social_detail']['facebook'] = array(
      '#type' => 'details',
      '#title' => $this->t('Facebook'),
      '#open' => FALSE,
    );
    $form['social_detail']['facebook']['link'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Facebook profile link here.'),
      '#attributes' => array(
        'placeholder' => $this->t('https://www.facebook.com/username/'),
      ),
      '#default_value' => $this->configuration['social_detail']['facebook']['link'],
    );
    $form['social_detail']['facebook']['class'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['facebook']['class'],
    );
    // LinkedIn section.
    $form['social_detail']['linkedin'] = array(
      '#type' => 'details',
      '#title' => $this->t('LinkedIn'),
      '#open' => FALSE,
    );
    $form['social_detail']['linkedin']['link'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your LinkedIn profile link here.'),
      '#attributes' => array(
        'placeholder' => $this->t('https://www.linkedin.com/username/'),
      ),
      '#default_value' => $this->configuration['social_detail']['linkedin']['link'],
    );
    $form['social_detail']['linkedin']['class'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['linkedin']['class'],
    );
    // Twitter section.
    $form['social_detail']['twitter'] = array(
      '#type' => 'details',
      '#title' => $this->t('Twitter'),
      '#open' => FALSE,
    );
    $form['social_detail']['twitter']['link'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Twiiter profile link here.'),
      '#attributes' => array(
        'placeholder' => $this->t('https://twitter.com/username/'),
      ),
      '#default_value' => $this->configuration['social_detail']['twitter']['link'],
    );
    $form['social_detail']['twitter']['class'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['twitter']['class'],
    );
    // Youtube section.
    $form['social_detail']['youtube'] = array(
      '#type' => 'details',
      '#title' => $this->t('Youtube'),
      '#open' => FALSE,
    );
    $form['social_detail']['youtube']['link'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Youtube profile link here.'),
      '#attributes' => array(
        'placeholder' => $this->t('https://www.youtube.com/username/'),
      ),
      '#default_value' => $this->configuration['social_detail']['youtube']['link'],
    );
    $form['social_detail']['youtube']['class'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['youtube']['class'],
    );
    // Google plus section.
    $form['social_detail']['google_plus'] = array(
      '#type' => 'details',
      '#title' => $this->t('Google Plus'),
      '#open' => FALSE,
    );
    $form['social_detail']['google_plus']['link'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Google Plus profile link here.'),
      '#attributes' => array(
        'placeholder' => $this->t('https://www.plus.google.com/username/'),
      ),
      '#default_value' => $this->configuration['social_detail']['google_plus']['link'],
    );
    $form['social_detail']['google_plus']['class'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['google_plus']['class'],
    );
    // Instagram section.
    $form['social_detail']['instagram'] = array(
      '#type' => 'details',
      '#title' => $this->t('Instagram'),
      '#open' => FALSE,
    );
    $form['social_detail']['instagram']['link'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Instagram profile link here.'),
      '#attributes' => array(
        'placeholder' => $this->t('https://www.instagram.com/username/'),
      ),
      '#default_value' => $this->configuration['social_detail']['instagram']['link'],
    );
    $form['social_detail']['instagram']['class'] = array(
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['instagram']['class'],
    );

    return $form;
  }

   /**
   * {@inheritdoc}
   */
  public function blockValidate($form, FormStateInterface $form_state) {
    parent::blockValidate($form, $form_state);
    $values = $form_state->getValues();
    // Email address validation.
   	$contact_email = $values['contact_detail']['email']['value'];
    if ($contact_email == '') {
    	$form_state->setError($values, t('Email field is required.'));
    }
    elseif ($contact_email != '' && !\Drupal::service('email.validator')->isValid($contact_email)) {
	    $form_state->setError($values, t('The email address %mail is not valid.', ['%mail' => $contact_email]));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function blockSubmit($form, FormStateInterface $form_state) {
    parent::blockSubmit($form, $form_state);
    $this->configuration['contact_detail']['contact_title'] = $contact_details['contact_title'];
    $this->configuration['social_detail']['social_title'] = $social_details['social_title'];
    $this->setConfigurationValue('contact_detail', $form_state->getValue('contact_detail'));
    $this->setConfigurationValue('social_detail', $form_state->getValue('social_detail'));
    

  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $configuration = $this->getConfiguration();
    // Assing both the value to custom variable.
    $contact_details = $configuration['contact_detail'];

    // Slice first value from contact and social info.
    if (isset($contact_details["address"]) && !empty($contact_details["address"]["value"]["value"])) {
      $contact_slice_val = array_slice($contact_details, 1);
    }
    else {
      $contact_slice_val = array_slice($contact_details, 2);
    }
    // Global variable.
    $contact_values = array();
    foreach ($contact_slice_val as $contact_key => $contact_value) {
      // Checking label is set or not.
      if (isset($contact_value['value']) && !empty($contact_value['value'])) {
        // Checking label if labels are blank then array key used as labels.
        if ($contact_value['label'] == '') {
          $contact_value['label'] = ucfirst($contact_key);
        }
        // Added "mailto:" for email field.
        if ($contact_key == 'email') {
          $contact_value['value'] = '<a href="mailto:' . $contact_value['value'] . '" rel="' . $contact_key . '" >' . $contact_value['value'] . '</a>';
        }
        // Added "tel:" for phone & mobile field.
        if ($contact_key == 'phone' || $contact_key == 'mobile') {
          $contact_value['value'] = '<a href="tel:' . $contact_value['value'] . '" rel="' . $contact_key . '" >' . $contact_value['value'] . '</a>';
        }
        // Assigned changes label and values to new object variables.
        $contact_values[] = $contact_value;
      }
    }
    // Social medias.
    $social_details = $configuration['social_detail'];
    $social_slice_val = array_slice($social_details, 1);
    // Global variable.
    $social_values = array();
    foreach ($social_slice_val as $social_key => $social_value) {
      // Checking label is set or not.
      if (isset($social_value['link']) && !empty($social_value['link'])) {
        // Checking label if labels are blank then array key used as labels.
        $social_value['label'] = ucfirst(str_replace('_', ' ', $social_key));
        // Assigned changes label and link to new object variables.
        $social_values[] = $social_value;
      }
    }
    // Assign array to $output variable.
    $output = [
      '#theme' => 'social_contact_info_block',
      '#contact_title' => $contact_details['contact_title'],
      '#contact_detail' => $contact_values,
      '#social_title' => $social_details['social_title'],
      '#social_detail' => $social_values,
      '#attached' => [
        'library' => ['social_contact_info/social_contact_info.css'],
      ],
    ];

    return $output;
  }

}
