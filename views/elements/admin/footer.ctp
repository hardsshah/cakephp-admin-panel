<div class="span-11 prepend-1">
	<?php if (Configure::read('Settings.showFooter')) :?>
	<p>
			Thank you for using <?php echo $html->link(Configure::read('Settings.software'), Configure::read('Settings.url')); ?> <?php echo Configure::read('Settings.revision');?> | <?php echo $html->link('Feedback', Configure::read('Settings.url')."/feedback"); ?>
	</p>
	<?php endif;?>
</div>
<div class="span-11 append-1 last">
	<p>
		<?php echo $html->link(
			$html->image('cake.power.gif', array('alt'=> __("CakePHP: the rapid development php framework", true))),
			'http://www.cakephp.org/',
			array('class' => 'right'), null, false
			);
		?>
	</p>
</div>