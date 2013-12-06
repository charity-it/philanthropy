<?php
// $Id$
/**
 * @file
 * Contains the hook_update_N() functions for site database changes.
 * See http://api.drupal.org/api/function/hook_update_N/6
 *
 * Because we are not tracking this module's (or core's) version,
 * and the updates are all site-specific, we can sensibly number
 * them sequentially from 1 (i.e. signify_deploy_update_1()).
 */

/**
 * Implementation of hook_update_N().
 *
 * @return
 * An array with the results of the calls to update_sql().
 *
 * An update function can force the current and all later
 * updates for this module to abort by returning a $ret array
 * with an element like:
 * $ret['#abort'] = array(
 *   'success' => FALSE,
 *   'query' => 'What went wrong'
 * );
 *
 * The schema version will not be updated in this case, and
 * all the aborted updates will continue to appear on update.php
 * as updates that have not yet been run.
 *
 * Multipass update functions will also want to pass back the
 * $ret['#finished'] variable to inform the batch API of progress.
 */
//function signify_deploy_update_N(&$sandbox = NULL) {
//  // perform database updates
//}

