<?php

/**
 * @file
 * Contains \Drupal\cookiec\Form\CookiecForm.
 */

namespace Drupal\cookiec\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Render\Element;

class CookiecForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'cookiec_form';
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config = $this->config('cookiec.settings');

    foreach (Element::children($form) as $variable) {
      $config->set($variable, $form_state->getValue($form[$variable]['#parents']));
    }
    $config->save();

    if (method_exists($this, '_submitForm')) {
      $this->_submitForm($form, $form_state);
    }

    parent::submitForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['cookiec.settings'];
  }

  public function buildForm(array $form, \Drupal\Core\Form\FormStateInterface $form_state) {

    $form['cookiec_link'] = [
      '#title' => t('Link URL to policy page.'),
      '#type' => 'textfield',
      '#size' => 60,
      '#default_value' => \Drupal::config('cookiec.settings')->get('cookiec_link'),
      '#description' => t('Enter a valid URL to the cookie policy page.'),
    ];
    $form['cookiec_linktext'] = [
      '#title' => t('Text for link to policy page.'),
      '#type' => 'textfield',
      '#size' => 60,
      '#default_value' => \Drupal::config('cookiec.settings')->get('cookiec_linktext'),
      '#description' => t('Enter a link text to use for the the cookie policy page link.'),
    ];

    // @FIXME
    // Could not extract the default value because it is either indeterminate, or
    // not scalar. You'll need to provide a default value in
    // config/install/cookiec.settings.yml and config/schema/cookiec.schema.yml.
    $msg = \Drupal::config('cookiec.settings')->get('cookiec_message');
    $form['cookiec_message'] = [
      '#title' => t('Main consent message to display to user'),
      '#type' => 'text_format',
      '#default_value' => $msg['value'],
      '#description' => t('Enter a message to display to a user.'),
      '#format' => $msg['format'],
    ];

    $form['cookiec_background'] = [
      '#title' => t('Background color code or hex code.'),
      '#type' => 'textfield',
      '#size' => 20,
      '#default_value' => \Drupal::config('cookiec.settings')->get('cookiec_background'),
      '#description' => t('Enter a background color code or hex code.'),
    ];
    $form['cookiec_position_options'] = [
      '#type' => 'value',
      '#value' => [
        'bottom' => t('bottom'),
        'top' => t('top'),
        'top-left' => t('top-left'),
        'top-right' => t('top-right'),
        'bottom-left' => t('bottom-left'),
        'bottom-right' => t('bottom-right'),
      ],
    ];
    // Positions are: top, bottom, top-left, top-right, bottom-left, bottom-right.
    $form['cookiec_position'] = [
      '#title' => t('Position'),
      '#type' => 'select',
      '#default_value' => \Drupal::config('cookiec.settings')->get('cookiec_position'),
      '#description' => t('Select the position of the cookie banner.'),
      '#options' => $form['cookiec_position_options']['#value'],
    ];

    $form['cookiec_boolean'] = [
      '#type' => 'value',
      '#value' => [
        'false' => 'false',
        'true' => 'true',
      ],
    ];
    $form['cookiec_dismiss'] = [
      '#title' => t('Dismiss on click'),
      '#type' => 'select',
      '#default_value' => \Drupal::config('cookiec.settings')->get('cookiec_dismiss'),
      '#description' => t('Select true to dismiss when the user clicks anywhere.'),
      '#options' => $form['cookiec_boolean']['#value'],
    ];

    return parent::buildForm($form, $form_state);
  }

}
?>
