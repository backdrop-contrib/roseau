<?php

/**
 * @file
 * Post update functions for Roseau.
 */

/**
 * Sets the default `base_primary_color` value of Roseau's theme settings.
 */
function roseau_post_update_add_roseau_primary_color() {
  \Drupal::configFactory()->getEditable('roseau.settings')
    ->set('base_primary_color', '#1b9ae4')
    ->save();
}
