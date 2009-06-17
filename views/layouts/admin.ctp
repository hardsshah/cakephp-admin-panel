<?php $html->docType('xhtml-strict')?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<?php echo $html->charset(); ?>
		<title>
			<?php echo Configure::read('Settings.title'); ?>: <?php echo $title_for_layout; ?>
		</title>
		<?php
			echo $html->meta('icon');
			echo $html->css('admin/union');
			echo $blueprint->setup();
			echo $blueprint->plugins(array('buttons', 'fancy-type', 'link-icons', 'sprites'));
			echo $blueprint->ie();
			echo $html->css('admin/styles');

			echo "<!--[if lt IE 8]>";
			echo $javascript->link('plugins/ie8/ie8.js');
			echo "<![endif]-->";

			echo $javascript->link('jquery/jquery.js');
			echo $scripts_for_layout;
		?>
	</head>
	<body>
		<div class="container">
			<div id="header" class="span-24 last">
				<div id="site-title" class="span-11 prepend-1">
					<?php echo $html->link(Configure::read('Settings.title'), array('controller' => 'dashboards', 'action' => 'index')); ?>
				</div>
				<div id="site-links" class="span-11 append-1 last">
					<p>
						Welcome, User. You are currently logged in. 
						<span class="separator">|</span> <?php echo $html->link('View Site', array('controller' => 'dashboards', 'action' => 'index', 'admin' => false)); ?> 
						<span class="separator">|</span> <?php echo $html->link('Log Out', array('controller' => 'users', 'action' => 'logout')); ?>
					</p>
				</div>
			</div>
				<?php echo $this->element('admin/menubar'); ?>
			<div id="content" class="span-24 last ">
				<div class="span-22 append-1 prepend-1 prepend-top last">
					<?php
						if ($session->check('Message.flash')): $session->flash(); endif;
						$session->flash('auth');
						$error->validationErrors($this->validationErrors, 3);
					?>
				</div>
				<div class="span-22 append-1 prepend-1 append-bottom last">
					<?php echo $content_for_layout;?>
				</div>
			</div>
			<div id="footer" class="span-24 last ">
				<?php echo $this->element('admin/footer'); ?>
			</div>
			<div id="extra" class="span-22 prepend-1 append-1 last showgrid">
				<?php echo $cakeDebug; ?>
			</div>
		</div>
	</body>
</html>