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

		<div class="row">
			<div class="page-wrapper" id="page">

				<!-- START HEADER -->
				<div class="columns twelve">
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
							
							<?php if(!$tg_subsite): ?>
							<div id="logo">
								<a href="<?php print $front_page; ?>" title="<?php print t('Go to Philanthropy New Zealand homepage'); ?>" rel="home">
									<img src="<?php print $base_path . path_to_theme() ?>/images/site-title.jpg" alt="<?php print t('Go to Philanthropy New Zealand homepage'); ?>"/>
								</a>
							</div>
							<?php endif ?>

							<?php print $conference_header; ?>
							
							<?php print $tg_subsite; ?>
							
							<?php if(!$tg_subsite) echo philanthropy_theme_generate_topwidget(); ?>	

						</div> <!-- / #branding -->
						<?php if(!$tg_subsite): ?>
							<div class="row">
								<div id="nav" class="navbar columns twelve">
									<h2>Site Navigation</h2>
									<?php print $primary_links; ?>
									<hr/>
								</div>
							</div>
						<?php endif ?> 
					</div>
					<!-- END HEADER -->
					<!-- START MAIN CONTENT -->
					<div id="main" class="row">
						<!-- LEFT SIDEBAR -->
							<?php if ($left): ?>
							<div class="columns three first hide-title">
								<?php if ($tg_subsite): ?>
										<?php print $left; ?>
								<?php else: ?>
									<?php print $left; ?>
								<?php endif; ?>
							</div>
							<?php endif; ?> 
						 <!-- /sidebar-left -->

						<!-- CONTENT -->
						<div class="columns <?php if ($right): ?>six<?php else: ?>nine<?php endif; ?>">
							<?php if($tg_subsite): ?>
								<div class="tg-subsite">
							<?php endif; ?> 
								
							<?php if ($breadcrumb || $title || $mission || $messages || $help || $tabs): ?>
								<div id="content-header">
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
									<div class="content-top">
										<?php print $content_top; ?>
										<hr/>
									</div> <!-- /#content-top -->
								<?php endif; ?>
							<?php endif; ?>
								
							<div class="content-area">
								<?php if ($tg_subsite): ?>
									<?php print $content_top; ?>
								<?php endif; ?>
								<?php print $content; ?>
							</div> <!-- /#content-area -->

							<?php if ($content_bottom): ?>
							<div class="content-bottom">
								<?php print $content_bottom; ?>
							</div><!-- /#content-bottom -->
							<?php endif; ?>

							<?php if($tg_subsite): ?>
								</div>
							<?php endif; ?>
						</div>

						<!-- RIGHT SIDEBAR -->
						<?php if ($right): ?>
						<div class="columns three sidebar second">
							<?php print $right; ?>
						</div>
						<?php endif; ?> <!-- /sidebar-second -->
			
					</div> <!-- /#MAIN -->
				</div> 
			</div><!-- /#page -->
		</div>
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
		<?php print $scripts; ?>
		<?php print $closure; ?>
	</body>
</html>
