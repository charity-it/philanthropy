<div class="node <?php print $classes; ?>" id="node-<?php print $node->nid; ?>">
  <div class="node-inner">
  
<?php if ($teaser): // if teaser ?>
    <div class="tg-text">
	    <h2 class="title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
	    
	    <?php if (isset($node->field_page_abstract) && !empty($node->field_page_abstract[0]['value'])): ?>
	      <div class="field page-abstract">
	        <?php print content_format('field_page_abstract', $node->field_page_abstract[0]); ?>
	      </div>
	    <?php else: ?>
	      <div class="content">
	        <?php print check_markup(truncate_utf8($content, 200, TRUE, TRUE)); ?>
	      </div>  
	    <?php endif; ?> 
	    <?php if ($node->files): ?>
				<div class="attachments">	
					<ul>
						<?php foreach($node->files as $file): ?>
							<li>
								<img class="filefield-icon field-icon-application-pdf" src="/sites/all/modules/contrib/filefield/icons/application-pdf.png" alt="application/pdf icon" />
								<?php printf('<a href="/%s">%s</a>', $file->filepath, $file->filename); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
	    <?php endif; ?>
	    <div class="readmore"><a href="/<?php print $node->path; ?>">Read more...</a></div>
    </div>
    
    <div class="tg-imagevideo">
    	<?php if ($node->field_giving_intro_video['0']['view']): ?> 
	      <div class="field tg-image-video">
	        <?php print $node->field_giving_intro_video['0']['view']; ?> 
	      </div>
	    <?php elseif ($node->field_giving_intro_image['0']['view']): ?> 
	      <div class="field tg-image-image">
	        <?php print $node->field_giving_intro_image['0']['view']; ?> 
	      </div>
	    <?php endif;?>
    </div>
    
<?php elseif ($page): // otherwise, if full node ?>
	  <?php if ($node->field_tg_quote['0']['value']): ?> 
	    <div class="field tg-quote">
	      <?php print $node->field_tg_quote['0']['value']; ?> 
	    </div>
    <?php endif;?>
    
    <?php if ($node->field_giving_intro_video['0']['view']): ?> 
      <div class="field tg-image-video">
        <?php print $node->field_giving_intro_video['0']['view']; ?> 
      </div>
    <?php endif;?>
    
    <?php if ($node->field_giving_intro_image['0']['view']): ?> 
      <div class="field tg-image-image">
        <?php print $node->field_giving_intro_image['0']['view']; ?> 
      </div>
    <?php endif;?>
    
    <div class="content">
    	<?php print $node->content['body']['#value']; ?>
			<?php if($node->files): ?>
				<div class="attachments">
					<h2>Download Full Version</h2>
					<ul>
						<?php foreach($node->files as $file): ?>
							<li>
								<img class="filefield-icon field-icon-application-pdf" src="/sites/all/modules/contrib/filefield/icons/application-pdf.png" alt="application/pdf icon" />
								<?php printf('<a href="/%s">%s</a>', $file->filepath, $file->filename); ?>
							</li>
						<?php endforeach; ?>
					</ul>
				</div>
			<?php endif; ?>
	   </div>
    
    <?php if ($links): ?> 
      <div class="links"> <?php print $links; ?></div>
    <?php endif; ?>
    
<?php endif; //end condition for full node ?>    

      
    
  </div> <!-- /node-inner -->
</div> <!-- /node-->