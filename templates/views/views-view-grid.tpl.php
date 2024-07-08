<?php
/**
 * @file
 * Theme override for views to display rows in a grid.
 *
 * Available variables:
 * - attributes: HTML attributes for the wrapping element.
 * - title: The title of this group of rows.
 * - view: The view object.
 * - rows: The rendered view results.
 * - options: The view plugin style options.
 *   - row_class_default: A flag indicating whether default classes should be
 *     used on rows.
 *   - col_class_default: A flag indicating whether default classes should be
 *     used on columns.
 * - items: A list of grid items. Each item contains a list of rows or columns.
 *   The order in what comes first (row or column) depends on which alignment
 *   type is chosen (horizontal or vertical).
 *   - attributes: HTML attributes for each row or column.
 *   - content: A list of columns or rows. Each row or column contains:
 *     - attributes: HTML attributes for each row or column.
 *     - content: The row or column contents.
 *
 * @see template_preprocess_views_view_grid()
 */
?>

<?php $classes = [
    'views-view-grid',
   'views-view-grid--' . $options['alignment'],
  ];
  $style = '--views-grid--column-count: ' .$options['columns'];
?>

<?php if ($title) { ?>
  <h3><?php echo $title; ?></h3>
<?php } ?>

<div style="<?php print $style; ?>" class="<?php print implode(' ', $classes); ?>"<?php print backdrop_attributes($attributes); ?>>
  <?php foreach ($rows as $row_count => $row): ?>
      <div class="views-view-grid__item">
        <div class="views-view-grid__item-inner">
          <?php  print $row; ?>
        </div>
      </div>
  <?php endforeach; ?>
</div>

