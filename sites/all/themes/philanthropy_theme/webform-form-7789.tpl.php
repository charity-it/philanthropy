<?php

/**
 * @file
 * Customize the display of a complete webform.
 *
 * This file may be renamed "webform-form-[nid].tpl.php" to target a specific
 * webform on your site. Or you can leave it "webform-form.tpl.php" to affect
 * all webforms on your site.
 *
 * Available variables:
 * - $form: The complete form array.
 * - $nid: The node ID of the Webform.
 *
 * The $form array contains two main pieces:
 * - $form['submitted']: The main content of the user-created form.
 * - $form['details']: Internal information stored by Webform.
 */
?>
<?php
  
  // ** This is the Membership Application Form **

  // If editing or viewing submissions, display the navigation at the top.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    print drupal_render($form['navigation']);
    print drupal_render($form['submission_info']);
  }

  // Print out the main part of the form.
  // Feel free to break this up and move the pieces within the array.
  //print drupal_render($form['submitted']);

  // Always print out the entire $form. This renders the remaining pieces of the
  // form that haven't yet been rendered above.
  print drupal_render($form);
  
  // Print out a footer for this form
  print '<div class="form-footer">';
  print '<p>Press <strong>Email this form</strong> to send these details to Philanthropy NZ, or print this screen and Post to:</p>';
  print '<p>Executive Director<br/>';
  print 'Philanthropy New Zealand<br/>';
  print 'PO Box 1521<br/>';
  print 'Wellington</p>';
  print '<p>Phone: 04 499 4090</p>';
  print '<p>Fax: 04 472 5367</p>';
  print '<p><strong>A Tax Invoice will be issued</strong></p>';
  print '</div>';

  // Print out the navigation again at the bottom.
  if (isset($form['submission_info']) || isset($form['navigation'])) {
    unset($form['navigation']['#printed']);
    print drupal_render($form['navigation']);
  }
