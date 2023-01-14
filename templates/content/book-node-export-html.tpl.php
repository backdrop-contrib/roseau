/**
 * @file
 * Theme override for a single node in a printer-friendly outline.
 *
 * Available variables:
 * - node: Fully loaded node.
 * - depth: Depth of the current node inside the outline.
 * - title: Node title.
 * - content: Node content.
 * - children: All the child nodes recursively rendered through this file.
 *
 * @see template_preprocess_book_node_export_html()
 */

<article id="node-<?php echo $node['id']; ?>" class="section-<?php echo $depth; ?>">
  <h1 class="book-heading"><?php echo $title; ?></h1>
  <?php echo $content; ?>
  <?php echo $children; ?>
</article>
