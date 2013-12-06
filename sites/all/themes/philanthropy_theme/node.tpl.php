<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
  
<?php if ($teaser): // if teaser ?>

    <?php if ($is_front): ?>
      <h3 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
    <?php else: ?>
      <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    
    <?php if (isset($node->field_page_abstract) && !empty($node->field_page_abstract[0]['value'])): ?>
      <div class="field page-abstract">
        <?php print content_format('field_page_abstract', $node->field_page_abstract[0]); ?>
      </div>
    <?php else: ?>
      <div class="content">
        <?php print check_markup(truncate_utf8($content, 200, TRUE, TRUE)); ?>
      </div>  
    <?php endif; ?>
    
<?php elseif ($page): // otherwise, if full node ?>

    <?php print $picture; ?>
    
    <?php if ($submitted && $node->type != 'webform'): ?>
      <span class="submitted"><?php print $submitted; ?></span>
    <?php endif; ?>
    
    <div class="content">
      <?php print $content; ?>
    </div>
    
    <?php if ($links): ?> 
      <div class="links"> <?php print $links; ?></div>
    <?php endif; ?>
    
<?php endif; //end condition for full node ?>    

      
    
  </div> <!-- /node-inner -->
</div> <!-- /node-->