<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
  
<?php if ($teaser): // if teaser ?>

    <?php if ($is_front): ?>
      <h3 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
    <?php else: ?>
      <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
    <?php endif; ?>
    
    <?php if ($node->field_event_date[0]['value']): ?>
      <span class="date">
        <?php print str_replace('(All day)', '', content_format('field_event_date', $node->field_event_date[0])); ?>
      </span>
    <?php endif; ?>
    
<?php elseif ($page): // otherwise, if full node ?>

    <?php print $picture; ?>
    
    <div class="content">
      <?php print str_replace('(All day)', '', $content); ?>
    </div>
    
    <?php if ($links): ?> 
      <div class="links"> <?php print $links; ?></div>
    <?php endif; ?>
    
<?php endif; //end condition for full node ?>    

      
    
  </div> <!-- /node-inner -->
</div> <!-- /node-->