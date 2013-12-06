<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
  
<?php if ($teaser): // if teaser ?>

    <?php if ($is_front): ?>
      <h3 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h3>
    <?php else: ?>
      <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
		<?php endif; ?>
		
    <?php if (isset($node->field_news_event_abstract) && !empty($node->field_news_event_abstract[0]['value'])): ?>
      <div class="field news-event-abstract">
        <?php print content_format('field_news_event_abstract', $node->field_news_event_abstract[0]); ?>
      </div>
    <?php else: ?>
      <div class="content">
        <?php print check_markup(truncate_utf8($content, 200, TRUE, TRUE)); ?>
      </div>  
    <?php endif; ?> 
   
    <?php if ($node->field_news_event_attachment['0']['view']): ?> 
      <div class="field news-event-file">
        <?php print $node->field_news_event_attachment['0']['view']; ?> 
      </div>
    <?php endif;?>
    
<?php elseif ($page): // otherwise, if full node ?>

    <?php print $picture; ?>
    
    <div class="content">
      <?php print $content; ?>
    </div>
    
    <?php if ($links): ?> 
      <div class="links"> <?php print $links; ?></div>
    <?php endif; ?>
    
<?php endif; //end condition for full node ?>        
    
  </div> <!-- /node-inner -->
</div> <!-- /node-->