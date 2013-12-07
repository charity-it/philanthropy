<!doctype html>
<!--[if IE 6 ]><html class="no-js ie6 oldie gumby-no-touch" id="ie6" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"><![endif]-->
<!--[if IE 7 ]><html class="no-js ie7 oldie gumby-no-touch" id="ie7" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"><![endif]-->
<!--[if IE 8 ]><html class="no-js ie8 oldie gumby-no-touch" id="ie8" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"><![endif]-->
<!--[if IE 9]><html class="no-js ie9 gumby-no-touch" id="ie9" lang="en" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"><![endif]-->
<!--[if gt IE 9]><!--><html class="no-js gumby-no-touch" xml:lang="<?php print $language->language ?>" lang="<?php print $language->language ?>" dir="<?php print $language->dir ?>"><!--<![endif]-->
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

    <div class="skip-to-content" id="skip-to-content">
      <a href="#content">Skip to Content</a><hr/>
    </div>  

    <div class="page-wrapper" id="page">

<!-- START HEADER -->
      
      <div id="header" class="header row">
      
        <div id="branding" class="branding columns twelve">
          
          <div id="site-name" class="site-name">
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
        
        <div id="nav" class="columns twelve">
          <h2>Site Navigation</h2>
          <?php print $primary_links; ?>
          <hr/>
        </div>
      
      </div>
<!-- END HEADER -->
    
<!-- START MAIN CONTENT -->
    
    <div id="main" class="row">
    
      <?php print $messages; ?>
      
      <?php print $help; ?>     
    
      <div class="columns eight">
        <div class="feature">
          <?php print $front_feature; ?>
        </div>
        <div class="row">
          <div class="columns four">
            <?php print $front_left; ?>
            <a class="twitter-timeline" data-dnt="true" href="https://twitter.com/PhilanthropyNZ"  data-widget-id="337009063105806336">Tweets by @PhilanthropyNZ</a>
          </div>
          <div class="columns four">
            <?php print $front_middle; ?>
          </div>
        </div>
      </div>
      <div class="columns four">
        <?php print $front_right; ?>
        <script src="//storify.com/PhilanthropyNZ/wrapping-up-conference-2013.js"></script><noscript>[//storify.com/PhilanthropyNZ/wrapping-up-conference-2013]</noscript>
      </div>      
    
    </div> 
<!-- END MAIN CONTENT -->
    
<!-- START FOOTER -->
    <?php if(!empty($footer_message) || !empty($footer_block)): ?>
    <div id="footer" class="footer">
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