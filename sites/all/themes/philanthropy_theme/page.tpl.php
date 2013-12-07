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

    <link rel="stylesheet" type="text/css" src="<?php echo $base_path . path_to_theme(); ?>/gumby/css/gumby.css">

    <script type="text/javascript" src="<?php echo $base_path; ?>misc/jquery.js"></script>

    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/modernizr-2.6.2.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/gumby.min.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.checkbox.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.fixed.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.navbar.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.radiobtn.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.retina.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.skiplink.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.tabs.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/ui/gumby.toggleswitch.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/libs/gumby.init.js"></script>
    <script type="text/javascript" src="<?php echo $base_path . path_to_theme(); ?>/gumby/js/main.js"></script>
  </head>

  <body class="<?php print $body_classes; ?>">

    <div class="skip-to-content" id="skip-to-content">
      <a href="#content">Skip to Content</a><hr/>
    </div>  

    <div class="page-wrapper" id="page">
    
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
		      
		      <?php if(!$tg_subsite): ?>    
		      <div id="logo">
		      	<a href="<?php print $front_page; ?>" title="<?php print t('Go to Philanthropy New Zealand homepage'); ?>" rel="home">
		      		<img src="<?php print $base_path . path_to_theme() ?>/images/site-title.jpg" alt="<?php print t('Go to Philanthropy New Zealand homepage'); ?>"/>
		      	</a>       
		      </div>
		      <?php endif ?>  
		          
	        <?php print $conference_header; ?>
	        
	        <?php print $tg_subsite; ?>
	        
	        <?php if(!$tg_subsite): ?>  
		        <div id="site-search">
		        	<?php print $search_box; ?>
		        </div>
	        <?php endif ?>  
	                  
	        <hr/>
	      </div> <!-- / #branding -->      
	      <?php if(!$tg_subsite): ?>   
		      <div id="nav">
		      	<h2>Site Navigation</h2>
		      	<?php print $primary_links; ?>
		      	<hr/>
		      </div>
	      <?php endif ?> 
	    </div>
<!-- END HEADER -->
    
<!-- START MAIN CONTENT -->
    
    <div id="main">
      <!-- CONTENT -->
      <div id="content">
        <div id="content-inner" class="inner column center">
        
        <?php if($tg_subsite): ?>
      		<div class="tg-subsite">
      	<?php endif; ?> 
        
        <?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
        <div id="content-header">
        
        <?php //print  $breadcrumb; ?>
        
        <?php if ($title): ?>
        <h1 class="title"><?php print $title; ?></h1>
        <?php endif; ?>
        
        <?php if ($mission): ?>
        <div id="mission"><?php print $mission; ?></div>
        <?php endif; ?>
        
        <?php print $messages; ?>
        
        <?php print $help; ?> 
        
        <?php if ($tabs): ?>
        <div class="tabs">
          <?php print $tabs; ?>
        </div>
        <?php endif; ?>
        
        </div> <!-- /#content-header -->
        <?php endif; ?>
        
        <!-- Content top has been hijacked for the thoughtfulgiving subsite-->
        <?php if (!$tg_subsite): ?>
	        <?php if ($content_top): ?>
	        <div id="content-top">
	          <?php print $content_top; ?>
	          <hr/>
	        </div> <!-- /#content-top -->
	        <?php endif; ?>
        <?php endif; ?>           
        
        <div id="content-area" class="floatwrapper">
        <?php if ($tg_subsite): ?>
        	<?php print $content_top; ?>
        <?php endif; ?>  
        <?php print $content; ?>
        </div> <!-- /#content-area -->
        
        <?php if ($content_bottom): ?>
        <div id="content-bottom">
        <?php print $content_bottom; ?>
        </div><!-- /#content-bottom -->
        <?php endif; ?>
        
        <?php if($tg_subsite): ?>
      		</div>
      	<?php endif; ?> 
        
        </div><!-- /#content-inner -->
      </div> <!-- /#content -->
      
      <!-- LEFT SIDEBAR -->
      <?php if ($left): ?>
      <div id="sidebar-first" class="column sidebar first">
        <hr/>
        <div id="sidebar-first-inner" class="inner">
        	<?php if ($tg_subsite): ?>
        		<div class="tg-sidebar">
          		<?php print $left; ?>
          	</div>
          <?php else: ?>
          	<?php print $left; ?>
          <?php endif; ?>
        </div>
      </div>
      <?php endif; ?> <!-- /sidebar-left -->
      
      <!-- RIGHT SIDEBAR -->
      <?php if ($right): ?>
      <div id="sidebar-second" class="column sidebar second">
        <div id="sidebar-second-inner" class="inner">
          <?php print $right; ?>
        </div>
      </div>
      <?php endif; ?> <!-- /sidebar-second -->
    
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
    <?php print $closure; ?>
  </body>
</html>
