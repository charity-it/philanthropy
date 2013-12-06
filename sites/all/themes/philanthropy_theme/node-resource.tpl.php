<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
  
<?php if ($teaser): // if teaser ?>
    <?php if ($is_front): ?>
     <h3 class="title">
     	<?php if ($node->field_remove_title_link[0]['value'] == 'on'): ?>
     		<?php print $title; ?>
     	<?php else: ?>
     		<a href="<?php print $node_url; ?>"><?php print $title; ?></a>
     	<?php endif; ?>
     </h3>
    <?php else: ?>
     <h2 class="title">
     		<a href="<?php print $node_url; ?>"><?php print $title; ?></a>
     </h2>
    <?php endif; ?>
    
    <?php if ($node->field_resource_image['0']['view']):?>
      <div class="field resource-thumbnail">
        <?php print $node->field_resource_image['0']['view']; ?>
      </div>
    <?php endif; ?>
    
    <?php if ($node->field_resource_date['0']['view']): ?>
      <div class="field resource-date">
        <?php print $node->field_resource_date['0']['view']; ?>
      </div>
    <?php endif; ?>
    
    <?php if (isset($node->field_page_abstract) && !empty($node->field_page_abstract[0]['value'])): ?>
    	<?php print check_markup($node->field_page_abstract['0']['view']); ?>
    <?php elseif ($node->content['body']['#value']): ?>
      <div class="field resource-blurb">
        <?php print check_markup(truncate_utf8($node->content['body']['#value'], 200, TRUE, TRUE)); ?>
      </div>  
    <?php endif; ?> 
    
    <?php if ($node->field_resource_attachment['0']['view']): ?> 
      <div class="field resource-file">
        <?php print $node->field_resource_attachment['0']['view']; ?> 
      </div>
    <?php endif;?>
    
<?php elseif ($page): // otherwise, if full node ?>

    <?php print $picture; ?>
    
    <?php if ($submitted): ?>
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