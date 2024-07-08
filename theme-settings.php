<?php

/**
 * @file
 * Functions to support Roseau theme settings.
 */


/**
 * Implements hook_form_FORM_ID_alter() for system_theme_settings.
 */
function roseau_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {

  if (isset($form_id)) {
    return;
  }

  $form['#validate'][] = 'roseau_theme_settings_validate';
  $form['#attached']['library'][] = 'roseau/color-picker';

  $color_config = [
    'colors' => [
      'base_primary_color' => 'Primary base color',
    ],
    'schemes' => [
      'default' => [
        'label' => 'Blue Lagoon',
        'colors' => [
          'base_primary_color' => '#1b9ae4',
        ],
      ],
      'firehouse' => [
        'label' => 'Firehouse',
        'colors' => [
          'base_primary_color' => '#a30f0f',
        ],
      ],
      'ice' => [
        'label' => 'Ice',
        'colors' => [
          'base_primary_color' => '#57919e',
        ],
      ],
      'plum' => [
        'label' => 'Plum',
        'colors' => [
          'base_primary_color' => '#7a4587',
        ],
      ],
      'slate' => [
        'label' => 'Slate',
        'colors' => [
          'base_primary_color' => '#47625b',
        ],
      ],
    ],
  ];

  // $form['#attached']['drupalSettings']['roseau']['colorSchemes'] = $color_config['schemes'];

  $form['roseau_settings']['roseau_utilities'] = [
    '#type' => 'fieldset',
    '#title' => t('Roseau Utilities'),
  ];
  $form['roseau_settings']['roseau_utilities']['mobile_menu_all_widths'] = [
    '#type' => 'checkbox',
    '#title' => t('Enable mobile menu at all widths'),
    '#default_value' => theme_get_setting('mobile_menu_all_widths'),
    '#description' => t('Enables the mobile menu toggle at all widths.'),
  ];
  $form['roseau_settings']['roseau_utilities']['site_branding_bg_color'] = [
    '#type' => 'select',
    '#title' => t('Header site branding background color'),
    '#options' => [
      'default' => t('Primary Branding Color'),
      'gray' => t('Gray'),
      'white' => t('White'),
    ],
    '#default_value' => theme_get_setting('site_branding_bg_color'),
  ];
  $form['roseau_settings']['roseau_utilities']['roseau_color_scheme'] = [
    '#type' => 'fieldset',
    '#title' => t('Roseau Color Scheme Settings'),
  ];
  $form['roseau_settings']['roseau_utilities']['roseau_color_scheme']['description'] = [
    '#type' => 'html_tag',
    '#tag' => 'p',
    '#value' => t('These settings adjust the look and feel of the Roseau theme. Changing the color below will change the base hue, saturation, and lightness values the Roseau theme uses to determine its internal colors.'),
  ];
  $form['roseau_settings']['roseau_utilities']['roseau_color_scheme']['color_scheme'] = [
    '#type' => 'select',
    '#title' => t('Roseau Color Scheme'),
    '#empty_option' => t('Custom'),
    '#empty_value' => '',
    '#options' => [
      'default' => t('Blue Lagoon (Default)'),
      'firehouse' => t('Firehouse'),
      'ice' => t('Ice'),
      'plum' => t('Plum'),
      'slate' => t('Slate'),
    ],
    '#input' => FALSE,
    '#wrapper_attributes' => [
      'style' => 'display:none;',
    ],
  ];

  foreach ($color_config['colors'] as $key => $title) {
    $form['roseau_settings']['roseau_utilities']['roseau_color_scheme'][$key] = [
      '#type' => 'textfield',
      '#maxlength' => 7,
      '#size' => 10,
      '#title' => t($title),
      '#description' => t('Enter color in full hexadecimal format (#abc123).') . '<br/>' . t('Derivatives will be formed from this color.'),
      '#default_value' => theme_get_setting($key),
      '#attributes' => [
        'pattern' => '^#[a-fA-F0-9]{6}',
      ],
      '#wrapper_attributes' => [
        'data-drupal-selector' => 'roseau-color-picker',
      ],
    ];
  }
}

/**
 * Validation handler for the Roseau system_theme_settings form.
 */
function roseau_theme_settings_validate($form, &$form_state) {
  if (!preg_match('/^#[a-fA-F0-9]{6}$/', $form_state['values']['base_primary_color'])) {
    form_set_error('base_primary_color', t('Colors must be 7-character string specifying a color hexadecimal format.'));
  }
}
