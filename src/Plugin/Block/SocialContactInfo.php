<?php

namespace Drupal\social_contact_info\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Component\Utility\Unicode;

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

    $form['contact_detail'] = [
      '#type' => 'details',
      '#title' => $this->t('Contact Informations'),
      '#open' => FALSE,
      '#description' => $this->t('Contact information shows contact detail of the website. e.g. (Address, Phone, Email, etc..).'),
    ];
    // Contact section title.
    $form['contact_detail']['contact_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Contact Title'),
      '#description' => $this->t('This is contact title which helps to show contact title on top of the contact section. (This is optional.)'),
      '#attributes' => [
        'placeholder' => $this->t('Contact Title'),
      ],
      '#default_value' => $this->configuration['contact_detail']['contact_title'],
    ];
    // Address section.
    $form['contact_detail']['address'] = [
      '#type' => 'details',
      '#title' => $this->t('Address'),
      '#open' => FALSE,
    ];
    $form['contact_detail']['address']['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['address']['label'],
    ];
    $form['contact_detail']['address']['value'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Value'),
      '#resizable' => FALSE,
      '#format' => 'full_html',
      '#default_value' => $this->configuration['contact_detail']['address']['value']['value'],
    ];
    $form['contact_detail']['address']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['contact_detail']['address']['weight']) ? $this->configuration['contact_detail']['address']['weight'] : 0,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // E-mail section.
    $form['contact_detail']['email'] = [
      '#type' => 'details',
      '#title' => $this->t('E-mail'),
      '#open' => FALSE,
    ];
    $form['contact_detail']['email']['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['email']['label'],
    ];
    $form['contact_detail']['email']['value'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website email field which helps to show website email. (This is required.)'),
      '#default_value' => $this->configuration['contact_detail']['email']['value'],
    ];
    $form['contact_detail']['email']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['contact_detail']['email']['weight']) ? $this->configuration['contact_detail']['email']['weight'] : 1,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Phone section.
    $form['contact_detail']['phone'] = [
      '#type' => 'details',
      '#title' => $this->t('Phone'),
      '#open' => FALSE,
    ];
    $form['contact_detail']['phone']['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['phone']['label'],
    ];
    $form['contact_detail']['phone']['value'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website phone number field which helps to show website phone number. (This is optional.)'),
      '#default_value' => $this->configuration['contact_detail']['phone']['value'],
    ];
    $form['contact_detail']['phone']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['contact_detail']['phone']['weight']) ? $this->configuration['contact_detail']['phone']['weight'] : 2,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Mobile section.
    $form['contact_detail']['mobile'] = [
      '#type' => 'details',
      '#title' => $this->t('Mobile'),
      '#open' => FALSE,
    ];
    $form['contact_detail']['mobile']['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['mobile']['label'],
    ];
    $form['contact_detail']['mobile']['value'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website mobile number field which helps to show website mobile number. (This is optional.)'),
      '#default_value' => $this->configuration['contact_detail']['mobile']['value'],
    ];
    $form['contact_detail']['mobile']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['contact_detail']['mobile']['weight']) ? $this->configuration['contact_detail']['mobile']['weight'] : 3,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Fax section.
    $form['contact_detail']['fax'] = [
      '#type' => 'details',
      '#title' => $this->t('FAX'),
      '#open' => FALSE,
    ];
    $form['contact_detail']['fax']['label'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title'),
      '#description' => $this->t('If you will enter label here the label will be shown otherwise default label will show.'),
      '#default_value' => $this->configuration['contact_detail']['fax']['label'],
    ];
    $form['contact_detail']['fax']['value'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Value'),
      '#description' => $this->t('This is website fax number field which helps to show website fax number.'),
      '#default_value' => $this->configuration['contact_detail']['fax']['value'],
    ];
    $form['contact_detail']['fax']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['contact_detail']['fax']['weight']) ? $this->configuration['contact_detail']['fax']['weight'] : 4,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Website Social information.
    $form['social_detail'] = [
      '#type' => 'details',
      '#title' => $this->t('Social Information'),
      '#open' => FALSE,
      '#description' => $this->t('Social information shows social links of the website. e.g. (Facebook, LinkedIn, Twitter, etc..).'),
    ];

    // Social section title.
    $form['social_detail']['social_title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Social Title'),
      '#description' => $this->t('This is social title which helps to show social title on top of the social section. (This is optional.)'),
      '#attributes' => [
        'placeholder' => $this->t('Social Title'),
      ],
      '#default_value' => $this->configuration['social_detail']['social_title'],
    ];
    // Facebook section.
    $form['social_detail']['facebook'] = [
      '#type' => 'details',
      '#title' => $this->t('Facebook'),
      '#open' => FALSE,
    ];
    $form['social_detail']['facebook']['link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Facebook profile link here.'),
      '#attributes' => [
        'placeholder' => $this->t('https://www.facebook.com/username/'),
      ],
      '#default_value' => $this->configuration['social_detail']['facebook']['link'],
    ];
    $form['social_detail']['facebook']['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['facebook']['class'],
    ];
    $form['social_detail']['facebook']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['social_detail']['facebook']['weight']) ? $this->configuration['social_detail']['facebook']['weight'] : 0,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // LinkedIn section.
    $form['social_detail']['linkedin'] = [
      '#type' => 'details',
      '#title' => $this->t('LinkedIn'),
      '#open' => FALSE,
    ];
    $form['social_detail']['linkedin']['link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your LinkedIn profile link here.'),
      '#attributes' => [
        'placeholder' => $this->t('https://www.linkedin.com/username/'),
      ],
      '#default_value' => $this->configuration['social_detail']['linkedin']['link'],
    ];
    $form['social_detail']['linkedin']['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['linkedin']['class'],
    ];
    $form['social_detail']['linkedin']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['social_detail']['linkedin']['weight']) ? $this->configuration['social_detail']['linkedin']['weight'] : 1,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Twitter section.
    $form['social_detail']['twitter'] = [
      '#type' => 'details',
      '#title' => $this->t('Twitter'),
      '#open' => FALSE,
    ];
    $form['social_detail']['twitter']['link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Twiiter profile link here.'),
      '#attributes' => [
        'placeholder' => $this->t('https://twitter.com/username/'),
      ],
      '#default_value' => $this->configuration['social_detail']['twitter']['link'],
    ];
    $form['social_detail']['twitter']['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['twitter']['class'],
    ];
    $form['social_detail']['twitter']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['social_detail']['twitter']['weight']) ? $this->configuration['social_detail']['twitter']['weight'] : 2,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Youtube section.
    $form['social_detail']['youtube'] = [
      '#type' => 'details',
      '#title' => $this->t('Youtube'),
      '#open' => FALSE,
    ];
    $form['social_detail']['youtube']['link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Youtube profile link here.'),
      '#attributes' => [
        'placeholder' => $this->t('https://www.youtube.com/username/'),
      ],
      '#default_value' => $this->configuration['social_detail']['youtube']['link'],
    ];
    $form['social_detail']['youtube']['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['youtube']['class'],
    ];
    $form['social_detail']['youtube']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['social_detail']['youtube']['weight']) ? $this->configuration['social_detail']['youtube']['weight'] : 3,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Google plus section.
    $form['social_detail']['google_plus'] = [
      '#type' => 'details',
      '#title' => $this->t('Google Plus'),
      '#open' => FALSE,
    ];
    $form['social_detail']['google_plus']['link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Google Plus profile link here.'),
      '#attributes' => [
        'placeholder' => $this->t('https://www.plus.google.com/username/'),
      ],
      '#default_value' => $this->configuration['social_detail']['google_plus']['link'],
    ];
    $form['social_detail']['google_plus']['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['google_plus']['class'],
    ];
    $form['social_detail']['google_plus']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['social_detail']['google_plus']['weight']) ? $this->configuration['social_detail']['google_plus']['weight'] : 4,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];
    // Instagram section.
    $form['social_detail']['instagram'] = [
      '#type' => 'details',
      '#title' => $this->t('Instagram'),
      '#open' => FALSE,
    ];
    $form['social_detail']['instagram']['link'] = [
      '#type' => 'textfield',
      '#title' => $this->t('URL'),
      '#description' => $this->t('Add your Instagram profile link here.'),
      '#attributes' => [
        'placeholder' => $this->t('https://www.instagram.com/username/'),
      ],
      '#default_value' => $this->configuration['social_detail']['instagram']['link'],
    ];
    $form['social_detail']['instagram']['class'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Link Class'),
      '#description' => $this->t('Here you can add your custom class to the image. (This is optional field).'),
      '#default_value' => $this->configuration['social_detail']['instagram']['class'],
    ];
    $form['social_detail']['instagram']['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight'),
      '#default_value' => isset($this->configuration['social_detail']['instagram']['weight']) ? $this->configuration['social_detail']['instagram']['weight'] : 5,
      '#delta' => 5,
      '#description' => t('Optional, This helps to sort contact fields.'),
    ];

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
    // Store values in below variables.
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
    // Get contact fields after sorting.
    $sort_contact_values = $this->blockFieldsSortByWeight($contact_slice_val, 'weight');

    // Global variable.
    $contact_values = [];
    foreach ($sort_contact_values as $contact_key => $contact_value) {
      // Checking label is set or not.
      if (isset($contact_value['value']) && !empty($contact_value['value'])) {
        // Checking label if labels are blank then array key used as labels.
        if ($contact_value['label'] == '') {
          $contact_value['label'] = Unicode::ucfirst($contact_key);
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
    // Get contact fields after sorting.
    $sort_social_values = $this->blockFieldsSortByWeight($social_slice_val, 'weight');
    // Global variable.
    $social_values = [];
    foreach ($sort_social_values as $social_key => $social_value) {
      // Checking label is set or not.
      if (isset($social_value['link']) && !empty($social_value['link'])) {
        // Checking label if labels are blank then array key used as labels.
        $social_value['label'] = Unicode::ucfirst(str_replace('_', ' ', $social_key));
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
        'library' => ['social_contact_info/social_contact_info'],
      ],
    ];

    return $output;
  }

  /**
   * Implementation of sorting social and contact fields.
   */
  public function blockFieldsSortByWeight($array_values, $sub_key) {
    foreach ($array_values as $key => $array_value) {
      $sort_array_values[$key] = Unicode::strtolower($array_value[$sub_key]);
    }
    // Array sorting.
    asort($sort_array_values);

    foreach ($sort_array_values as $old_key => $values) {
      $sorting_value[$old_key] = $array_values[$old_key];
    }
    return $sorting_value;
  }

}
