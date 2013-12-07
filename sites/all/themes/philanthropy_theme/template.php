<?php
    
// Auto-rebuild the theme registry during theme development.
if (theme_get_setting('philanthropy_theme_rebuild_registry')) {
  drupal_rebuild_theme_registry();
}

// Add Zen Tabs styles
if (theme_get_setting('philanthropy_theme_zen_tabs')) {
  drupal_add_css( drupal_get_path('theme', 'philanthropy_theme') .'/css/tabs.css', 'theme', 'screen');
}

/*
 *	 This function creates the body classes that are relative to each page
 *	
 *	@param $vars
 *	  A sequential array of variables to pass to the theme template.
 *	@param $hook
 *	  The name of the theme function being called ("page" in this case.)
 */
function philanthropy_theme_preprocess_page(&$vars, $hook) {
  // Unset the default css
  $css = $vars['css'];
  // Not unsetting system.css, as it is used for blocks admin
  #unset($css['all']['module']['modules/system/system.css']);
  unset($css['all']['module']['modules/system/defaults.css']);
  unset($css['all']['module']['modules/system/system-menus.css']);
  unset($css['all']['module']['modules/user/user.css']);
  unset($css['all']['module']['modules/search/search.css']);
  unset($css['all']['module']['sites/all/modules/contrib/views/css/views.css']);  
  $vars['styles'] = drupal_get_css($css); // regenerate CSS links
  
  // Update all media="all" styles to media="screen, projection"
  $vars['styles'] = str_replace('media="all"', 'media="screen, projection"', $vars['styles']);

  // Don't display empty help from node_help().
  if ($vars['help'] == "<div class=\"help\"><p></p>\n</div>") {
    $vars['help'] = '';
  }
  
  // replace PHPTemplate's top-level-only $primary_links variable with a complete tree
  $tree = menu_tree_all_data('primary-links');
  $vars['primary_links'] = philanthropy_theme_header_nav_menu_output($tree);

  // replace PHPTemplate's $secondary_links with level 2 and down for the active trail
  $tree = menu_tree_page_data('primary-links');
  // set $tree starting from level 2 of the active branch
  // (this loop is from menu_navigation_links())
  while ($item = array_shift($tree)) {
    if ($item['link']['in_active_trail']) {
      $tree = empty($item['below']) ? array() : $item['below'];
      break;
    }
  }
  $vars['secondary_links'] = menu_tree_output($tree);

  // Classes for body element. Allows advanced theming based on context
  // (home page, node of certain type, etc.)
  $body_classes = array($vars['body_classes']);
  if (user_access('administer blocks')) {
	  $body_classes[] = 'admin';
	}
	if (theme_get_setting('philanthropy_theme_wireframe')) {
    $body_classes[] = 'with-wireframes'; // Optionally add the wireframes style.
  }
  if (module_exists('taxonomy') && !empty($vars['node'])) {
    // add body class based on taxonomy term
    $vocabs = taxonomy_get_vocabularies($vars['node']->type);
    foreach (taxonomy_node_get_terms($vars['node']) as $term) {
      $term_class = 'term-' . $vocabs[$term->vid]->name . '-' . $term->name;
      $body_classes[] = philanthropy_theme_id_safe($term_class);
      if ($term->name == 'Conference2011') {
        // I am a conference 2011 node
        $nodeHasConference2011 = TRUE;
      }
      if ($term->name == 'Conference2013') {
        // I am a conference 2013 node
        $nodeHasConference2013 = TRUE;
      }
    }
  }
  
  if (isset($vars['template_files'][0])){
    if ($vars['template_files'][0] == 'page-speakers'){
      $nodeHasConference2013 = TRUE;
    }
  }

  if ($nodeHasConference2011) {// if we are a conference2011 page...
    // the following needs to be generated as text, as it is embedded in the 
    // conference banner image, and is otherwise unaccessible
    $vars['conference_header'] = 
        '<div class="conference-intro replace">'
      . '<em></em>' 
      . '<p>Philanthropy through the looking glass</p>'
      . '<p>Conference 2011. April 6th - 7th, Te Papa, Wellington, New Zealand</p>'
      . '<p>He titiro whakamuri, he anga whakamua.</p>'
      . '<p>Looking back, looking forward.</p>'
      . '</div>';
  }
  if ($nodeHasConference2013) {
    $vars['conference_header'] = 
        '<div class="conference-intro replace">'
      . '<em></em>' 
      . '<p>Philanthropy - Doing More Than Giving</p>'
      . '<p>Philanthropy New Zealand 2013 Conference, Te Papa, Wellington, April 10th and 11th</p>'
      . '<p>Kia nui atu te tuku aroha</p>'
      . '</div>';
  }
  
  /**
   * If the page is under the Thoughtful Giving subsite, apply different styling.
   */
  if ($vars['node']->type == giving_subsite_page || (strpos($_SERVER['REQUEST_URI'], 'thoughtfulgiving') != FALSE)) {  	
  	//Set up banner 
    $vars['tg_subsite'] = 
        '<div class="tg-subsite-intro replace">'
      . '<a href="/thoughtfulgiving"><em></em>Go to Thoughtful Giving homepage</a>' 
      . '</div>';
  }
  
  
  if (!$vars['is_front']) {
    // Add unique classes for each page and website section
    $path = drupal_get_path_alias($_GET['q']);
    list($section, ) = explode('/', $path, 2);
    $body_classes[] = philanthropy_theme_id_safe('page-'. $path);
    $body_classes[] = philanthropy_theme_id_safe('section-'. $section);

    if (arg(0) == 'node') {
      if (arg(1) == 'add') {
        if ($section == 'node') {
          array_pop($body_classes); // Remove 'section-node'
        }
        $body_classes[] = 'section-node-add'; // Add 'section-node-add'
      }
      elseif (is_numeric(arg(1)) && (arg(2) == 'edit' || arg(2) == 'delete')) {
        if ($section == 'node') {
          array_pop($body_classes); // Remove 'section-node'
        }
        $body_classes[] = 'section-node-'. arg(2); // Add 'section-node-edit' or 'section-node-delete'
      }
    }
  }
  
  /* Add template suggestions based on content type
   * You can use a different page template depending on the
   * content type or the node ID
   * For example, if you wish to have a different page template
   * for the story content type, just create a page template called
   * page-type-story.tpl.php
   * For a specific node, use the node ID in the name of the page template
   * like this : page-node-22.tpl.php (if the node ID is 22)
   */
  
  if ($vars['node']->type != "") {
      $vars['template_files'][] = "page-type-" . $vars['node']->type;
    }
  if ($vars['node']->nid != "") {
      $vars['template_files'][] = "page-node-" . $vars['node']->nid;
    }
     
  $vars['body_classes'] = implode(' ', $body_classes); // Concatenate with spaces
  
  if (isset($vars['template_files'][0])){
    if ($vars['template_files'][0] == 'page-speakers'){
      $vars['body_classes'] .= ' term-subject-area-conference2013';
    }
  }
}


/*
 *	 This function creates the NODES classes, like 'node-unpublished' for nodes
 *	 that are not published, or 'node-mine' for node posted by the connected user...
 *	
 *	@param $vars
 *	  A sequential array of variables to pass to the theme template.
 *	@param $hook
 *	  The name of the theme function being called ("node" in this case.)
 */

function philanthropy_theme_preprocess_node(&$vars, $hook) {

  // Special classes for nodes
  $classes = array('node');
  if ($vars['sticky']) {
    $classes[] = 'sticky';
  }
  // support for Skinr Module
  if (module_exists('skinr')) {
    $classes[] = $vars['skinr'];
  }
  if (!$vars['status']) {
    $classes[] = 'node-unpublished';
    $vars['unpublished'] = TRUE;
  }
  else {
    $vars['unpublished'] = FALSE;
  }
  if ($vars['uid'] && $vars['uid'] == $GLOBALS['user']->uid) {
    $classes[] = 'node-mine'; // Node is authored by current user.
  }
  if ($vars['teaser']) {
    $classes[] = 'node-teaser'; // Node is displayed as teaser.
  }
  $classes[] = 'clearfix';
  
  // Class for node type: "node-type-page", "node-type-story", "node-type-my-custom-type", etc.
  $classes[] = philanthropy_theme_id_safe('node-type-' . $vars['type']);
  $vars['classes'] = implode(' ', $classes); // Concatenate with spaces
}

/*
 *	This function create the EDIT LINKS for blocks and menus blocks.
 *	When overing a block (except in IE6), some links appear to edit
 *	or configure the block. You can then edit the block, and once you are
 *	done, brought back to the first page.
 *
 * @param $vars
 *   A sequential array of variables to pass to the theme template.
 * @param $hook
 *   The name of the theme function being called ("block" in this case.)
 */ 

function philanthropy_theme_preprocess_block(&$vars, $hook) {
    $block = $vars['block'];

    // special block classes
    $classes = array('block');
    $classes[] = philanthropy_theme_id_safe('block-' . $vars['block']->module);
    $classes[] = philanthropy_theme_id_safe('block-' . $vars['block']->region);
    $classes[] = philanthropy_theme_id_safe('block-id-' . $vars['block']->bid);
    $classes[] = philanthropy_theme_id_safe('block-' . $vars['block']->title);
    
    // support for Skinr Module
    if (module_exists('skinr')) {
      $classes[] = $vars['skinr'];
    }
    
    $vars['block_classes'] = implode(' ', $classes); // Concatenate with spaces

    if (theme_get_setting('philanthropy_theme_block_editing') && user_access('administer blocks')) {
        // Display 'edit block' for custom blocks.
        if ($block->module == 'block') {
          $edit_links[] = l('<span>' . t('edit block') . '</span>', 'admin/build/block/configure/' . $block->module . '/' . $block->delta,
            array(
              'attributes' => array(
                'title' => t('edit the content of this block'),
                'class' => 'block-edit',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        // Display 'configure' for other blocks.
        else {
          $edit_links[] = l('<span>' . t('configure') . '</span>', 'admin/build/block/configure/' . $block->module . '/' . $block->delta,
            array(
              'attributes' => array(
                'title' => t('configure this block'),
                'class' => 'block-config',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        // Display 'edit menu' for Menu blocks.
        if (($block->module == 'menu' || ($block->module == 'user' && $block->delta == 1)) && user_access('administer menu')) {
          $menu_name = ($block->module == 'user') ? 'navigation' : $block->delta;
          $edit_links[] = l('<span>' . t('edit menu') . '</span>', 'admin/build/menu-customize/' . $menu_name,
            array(
              'attributes' => array(
                'title' => t('edit the menu that defines this block'),
                'class' => 'block-edit-menu',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        // Display 'edit menu' for Menu block blocks.
        elseif ($block->module == 'menu_block' && user_access('administer menu')) {
          list($menu_name, ) = split(':', variable_get("menu_block_{$block->delta}_parent", 'navigation:0'));
          $edit_links[] = l('<span>' . t('edit menu') . '</span>', 'admin/build/menu-customize/' . $menu_name,
            array(
              'attributes' => array(
                'title' => t('edit the menu that defines this block'),
                'class' => 'block-edit-menu',
              ),
              'query' => drupal_get_destination(),
              'html' => TRUE,
            )
          );
        }
        $vars['edit_links_array'] = $edit_links;
        $vars['edit_links'] = '<div class="edit">' . implode(' ', $edit_links) . '</div>';
      }
  }


/*
 * Override or insert PHPTemplate variables into the block templates.
 *
 *  @param $vars
 *    An array of variables to pass to the theme template.
 *  @param $hook
 *    The name of the template being rendered ("comment" in this case.)
 */

function philanthropy_theme_preprocess_comment(&$vars, $hook) {
  // Add an "unpublished" flag.
  $vars['unpublished'] = ($vars['comment']->status == COMMENT_NOT_PUBLISHED);

  // If comment subjects are disabled, don't display them.
  if (variable_get('comment_subject_field_' . $vars['node']->type, 1) == 0) {
    $vars['title'] = '';
  }

  // Special classes for comments.
  $classes = array('comment');
  if ($vars['comment']->new) {
    $classes[] = 'comment-new';
  }
  $classes[] = $vars['status'];
  $classes[] = $vars['zebra'];
  if ($vars['id'] == 1) {
    $classes[] = 'first';
  }
  if ($vars['id'] == $vars['node']->comment_count) {
    $classes[] = 'last';
  }
  if ($vars['comment']->uid == 0) {
    // Comment is by an anonymous user.
    $classes[] = 'comment-by-anon';
  }
  else {
    if ($vars['comment']->uid == $vars['node']->uid) {
      // Comment is by the node author.
      $classes[] = 'comment-by-author';
    }
    if ($vars['comment']->uid == $GLOBALS['user']->uid) {
      // Comment was posted by current user.
      $classes[] = 'comment-mine';
    }
  }
  $vars['classes'] = implode(' ', $classes);
}

/**
 * this is to change the Apply button on an exposed filter to "Search"
 */ 
function philanthropy_preprocess_views_exposed_form(&$vars, $hook) {
  // Specify the Form ID
  if ($vars['form']['#id'] =='views-exposed-form-Resources-page-1') {    
    // Change the text on the submit button
    $vars['form']['submit']['#value'] = t('Search');
    $vars['form']['tid']['#options']['All'] = t('- All -');
    
    // Rebuild the rendered version (submit button, rest remains unchanged)
    unset($vars['form']['submit']['#printed']);
    unset($vars['form']['tid']['#printed']); 
    $vars['button'] = drupal_render($vars['form']['submit']);
    $vars['widgets']['filter-tid']->widget = drupal_render($vars['form']['tid']);
  }
}

/* 	
 * 	Customize the PRIMARY and SECONDARY LINKS, to allow the admin tabs to work on all browsers
 * 	An implementation of theme_menu_item_link()
 * 	
 * 	@param $link
 * 	  array The menu item to render.
 * 	@return
 * 	  string The rendered menu item.
 */ 	

function philanthropy_theme_menu_item_link($link) {
  if (empty($link['localized_options'])) {
    $link['localized_options'] = array();
  }

  // If an item is a LOCAL TASK, render it as a tab
  if ($link['type'] & MENU_IS_LOCAL_TASK) {
    $link['title'] = '<span class="tab">' . check_plain($link['title']) . '</span>';
    $link['localized_options']['html'] = TRUE;
  }
  return l($link['title'], $link['href'], $link['localized_options']);
}


/*
 *  Duplicate of theme_menu_local_tasks() but adds clear-block to tabs.
 */

function philanthropy_theme_menu_local_tasks() {
  $output = '';
  if ($primary = menu_primary_local_tasks()) {
    if(menu_secondary_local_tasks()) {
      $output .= '<ul class="tabs primary with-secondary clearfix">' . $primary . '</ul>';
    }
    else {
      $output .= '<ul class="tabs primary clearfix">' . $primary . '</ul>';
    }
  }
  if ($secondary = menu_secondary_local_tasks()) {
    $output .= '<ul class="tabs secondary clearfix">' . $secondary . '</ul>';
  }
  return $output;
}

/* 	
 * 	Add custom classes to menu item
 */	
	
function philanthropy_theme_menu_item($link, $has_children, $menu = '', $in_active_trail = FALSE, $extra_class = NULL) {
  $class = ($menu ? 'expanded' : ($has_children ? 'collapsed' : 'leaf'));
  if (!empty($extra_class)) {
    $class .= ' '. $extra_class;
  }
  if ($in_active_trail) {
    $class .= ' active-trail';
  }
#New line added to get unique classes for each menu item
  $css_class = philanthropy_theme_id_safe(str_replace(' ', '_', strip_tags($link)));
  return '<li class="'. $class . ' ' . $css_class . '">' . $link . $menu ."</li>\n";
}

/*	
 *	Converts a string to a suitable html ID attribute.
 *	
 *	 http://www.w3.org/TR/html4/struct/global.html#h-7.5.2 specifies what makes a
 *	 valid ID attribute in HTML. This function:
 *	
 *	- Ensure an ID starts with an alpha character by optionally adding an 'n'.
 *	- Replaces any character except A-Z, numbers, and underscores with dashes.
 *	- Converts entire string to lowercase.
 *	
 *	@param $string
 *	  The string
 *	@return
 *	  The converted string
 */	

function philanthropy_theme_id_safe($string) {
  // Replace with dashes anything that isn't A-Z, numbers, dashes, or underscores.
  $string = strtolower(preg_replace('/[^a-zA-Z0-9_-]+/', '-', $string));
  // If the first character is not a-z, add 'n' in front.
  if (!ctype_lower($string{0})) { // Don't use ctype_alpha since its locale aware.
    $string = 'id'. $string;
  }
  return $string;
}

/*
 *  Return a themed breadcrumb trail.
 *	Alow you to customize the breadcrumb markup
 */

function philanthropy_theme_breadcrumb($breadcrumb) {
  if (!empty($breadcrumb)) {
    return '<div class="breadcrumb">'. implode(' » ', $breadcrumb) .'</div>';
  }
}

/**
 * Return a themed set of links for the top level EECA banner navigation bar.
 *
 * Based on menu_tree_output(), and calls menu_tree_output() to build sub levels (drop down menus).
 *
 * @param $tree
 *   A data structure representing the tree as returned from menu_tree_data.
 * @return
 *   The rendered HTML of that data structure.
 */
function philanthropy_theme_header_nav_menu_output($tree) {
  $output = '';
  $items = array();

  // Pull out just the menu items we are going to render
  foreach ($tree as $data) {
    if (!$data['link']['hidden']) {
      $items[] = $data;
    }
  }

  $active_trail = array();
  foreach (menu_get_active_trail() as $item) {
    $active_trail[$item['mlid']] = $item;
  }
  // $data['link']['in_active_trail'] was lying to us

  foreach ($items as $i => $data) {
    $in_active_trail = array_key_exists($data['link']['mlid'], $active_trail);
    // format link with image replacement tags
    $link = l('<span class="english">' 
            . $data['link']['title'] 
            . '</span><span class="maori">' 
            . $data['link']['localized_options']['attributes']['title'] 
            . '</span>', 
        $data['link']['href'],
        array('html' => TRUE));

    if ($data['below']) {
      // force dropdowns to show only the first level
      foreach ($data['below'] as $i => $item) {
        $data['below'][$i]['below'] = FALSE;
      }
      $output .= theme('menu_item', $link, $data['link']['has_children'], menu_tree_output($data['below']), $in_active_trail);
    }
    else {
      $output .= theme('menu_item', $link, $data['link']['has_children'], '', $in_active_trail);
    }
  }
  return $output ? '<ul id="site-nav" class="floatwrapper">' . $output . '</ul>' : '';
}

/**
 * Theme the site search form
 */
function philanthropy_theme_search_theme_form($form) {
  $form['search_theme_form']['#title'] = 'Search this site';
  $form['submit']['#value'] = 'Search';
  #dsm($form);
  $output = '<h2>Site Search</h2>';
  $output .= drupal_render($form);
  return $output;
}

/**
 * Theme function for the 'generic' single file formatter.
 */
function philanthropy_theme_filefield_file($file) {
  // Views may call this function with a NULL value, return an empty string.
  if (empty($file['fid'])) {
    return '';
  }

  $path = $file['filepath'];
  $url = file_create_url($path);
  $icon = theme('filefield_icon', $file);
 
  // Set options as per anchor format described at
  // http://microformats.org/wiki/file-format-examples
  // TODO: Possibly move to until I move to the more complex format described
  // at http://darrelopry.com/story/microformats-and-media-rfc-if-you-js-or-css
  $options = array(
    'attributes' => array(
      'type' => $file['filemime'] . '; length=' . $file['filesize'],
    ),
  );
  
  // Use the description as the link text if available.
  if (empty($file['data']['description'])) {
    $link_text = $file['filename'];
  }
  else {
    $link_text = $file['data']['description'];
    $options['attributes']['title'] = $file['filename'];
  }
  
  $output = '<div class="filefield-file clear-block">';
  $output .= $icon . l($link_text, $url, $options);
  $output .= '<span class="filefield filesize"> (' . format_size($file['filesize']) . ')</span>';
  $output .= '</div>';
    
  return $output;
}

function philanthropy_theme_generate_topwidget() {
  $te .= '
  <div id="site-search" class="site-search">
      <form action="https://www.google.com/search" class="search-theme-form">
          <input class="input form-text" type="text" name="as_q" /> 
          <button class="form-submit btn medium default pretty"><span>Search</span></button>
          <input type="hidden" name="as_sitesearch" value="philanthropy.org.nz">
      </form>
  </div>

<script type="text/javascript">
<!--
jQuery("#site-search input[type=\\"text\\"]").css("color", "#909090").val("Type Search Here").click(function() {
  if(jQuery(this).hasClass("already-clicked")) return;
  jQuery(this).css("color", "black").val("").toggleClass("already-clicked");
});
//-->
</script>
';

  return $te;
}