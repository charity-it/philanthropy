<?php
/**
 * @file views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 * 
 * This template exists to add the floatwrapper div around the row.
 */
?>
<div class="floatwrapper">
	<?php if (!empty($title)): ?>
	  <h3><?php print $title; ?></h3>
	<?php endif; ?>
	<?php foreach ($rows as $id => $row): ?>
	  <div class="<?php print $classes[$id]; ?>">
	    <?php print $row; ?>
	  </div>
	<?php endforeach; ?>
</div>