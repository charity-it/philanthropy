<?php if ($teaser): // if teaser ?>
<div class="node <?php print $classes; ?>">
  <div class="node-inner">
    
    <!-- If something, print out stuff for speakers in view -->
    <?php //dpm($node); ?>
    <div class="speaker-thumb">
    	<a href="<?php print $node_url; ?>">
    		<?php print $node->field_speaker_image_thumb[0]['view']; ?>
    	</a>
    </div>
    <div class="speaker-name">
	    <?php if($node->field_remove_title_link[0]['value'] == 'on'): ?>
	    	<a href="<?php print $node_url; ?>">
	    		<?php print $node->title; ?>
	    	</a> 
	    <?php endif; ?>
    </div>
  </div> <!-- /node-inner -->
</div> <!-- /node-->
    
<?php elseif ($page): // otherwise, if full node ?>
<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
    
    <div class="content floatwrapper">
      <?php print $node->content['field_speaker_image']['#children']; ?>
      <div class="body-text">
      	<?php print $node->content['body']['#value']; ?>
      </div>
    </div>
    
    <div class="attachments">
    	<?php print $node->content['field_resource_attachment']['#children']; ?>
    </div>
    
    <?php if ($links): ?> 
      <div class="links"> <?php print $links; ?></div>
    <?php endif; ?>
  </div> <!-- /node-inner -->
</div> <!-- /node-->    
<?php endif; //end condition for full node ?>    

      
    
