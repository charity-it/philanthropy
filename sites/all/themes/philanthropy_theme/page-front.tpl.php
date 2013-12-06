<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>">

  <head>
    <title><?php print $head_title; ?></title>
    <?php print $head; ?>
    <?php print $styles; ?>
    <!--[if lte IE 7]>
      <link type="text/css" rel="stylesheet" media="screen, projection" href="<?php echo $base_path . path_to_theme() ?>/css/philanthropy-ie7.css" />
    <![endif]-->
    <!--[if lte IE 6]>
      <link type="text/css" rel="stylesheet" media="screen, projection" href="<?php echo $base_path . path_to_theme() ?>/css/philanthropy-ie6.css" />
    <![endif]-->  
  </head>

  <body class="<?php print $body_classes; ?>">

    <div id="skip-to-content">
      <a href="#content">Skip to Content</a><hr/>
    </div>  

    <div id="page">
    
<!-- START HEADER -->
      
      <div id="header">
      
        <div id="branding">
          
          <div id="site-name">
            <?php if (!empty($site_name) && $is_front): ?>
            <h1>
              <a href="<?php print $front_page ?>" title="<?php print t('Go to Philanthropy New Zealand homepage'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </h1>
            <?php else: ?>
            <div>
              <a href="<?php print $front_page ?>" title="<?php print t('Go to Philanthropy New Zealand homepage'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
            </div>            
            <?php endif; ?>
          </div>
          
          <div id="logo">
            <a href="<?php print $front_page; ?>" title="<?php print t('Go to Philanthropy New Zealand homepage'); ?>" rel="home">
              <img src="<?php print $base_path . path_to_theme() ?>/images/site-title.jpg" alt="<?php print t('Go to Philanthropy New Zealand homepage'); ?>"/>
            </a>       
          </div>
          
          <div id="site-search">
            <?php print $search_box; ?>
          </div>  
                  
          <hr/>
        </div> <!-- / #branding -->      
        
        <div id="nav">
          <h2>Site Navigation</h2>
          <?php print $primary_links; ?>
          <hr/>
        </div>
      
      </div>
<!-- END HEADER -->
    
<!-- START MAIN CONTENT -->
    
    <div id="main">
    
      <?php print $messages; ?>
      
      <?php print $help; ?>     
    
      <div class="col double-col">
        <div class="feature">
          <?php print $front_feature; ?>
        </div>
        <div class="col single-col">
          <?php print $front_left; ?>
          <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/PhilanthropyNZ"  data-widget-id="337009063105806336">Tweets by @PhilanthropyNZ</a>
        </div>
        <div class="col single-col">
          <?php print $front_middle; ?>
        </div>
      </div>
      <div class="col single-col">
        <?php print $front_right; ?>
        <script src="//storify.com/PhilanthropyNZ/wrapping-up-conference-2013.js"></script><noscript>[//storify.com/PhilanthropyNZ/wrapping-up-conference-2013]</noscript>
      </div>      
    
    </div> 
<!-- END MAIN CONTENT -->
    
<!-- START FOOTER -->
    <?php if(!empty($footer_message) || !empty($footer_block)): ?>
    <div id="footer">
      <hr/>    
      <?php print $footer_block; ?>
      <?php if($footer_message): ?>
      <div class="footer-message">
        <?php print $footer_message; ?>
      </div>
      <?php endif; ?>
    </div><!-- /#footer -->
    <?php endif; ?>
<!-- END FOOTER -->
    
    </div> <!-- /#page -->
    <?php print $scripts; ?>
    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
    <?php print $closure; ?>
  </body>
</html>