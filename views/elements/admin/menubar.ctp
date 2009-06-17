<div id="navigation" class="span-24 last">
	<div id="leftnavigation" class="span-15 prepend-1">
		<ul>
			<?php $leftControllers = array('Groups', 'Profiles', 'Users'); ?>
			<?php $blacklistedControllers = array('App', 'Pages'); ?>
			<?php $nonRightControllers = array_merge($leftControllers, $blacklistedControllers); ?>
			<?php $rightControllers = array_diff($controllerNames, $nonRightControllers); ?>
			<?php foreach($rightControllers as $rightController):?>
			<?php if (strtolower($rightController) == $this->params['controller']) : ?>
			<li class="current"><?php echo $html->link($rightController, array('controller' => Inflector::tableize($rightController), 'action' => 'index'))?></li>
			<?php else : ?>
			<li><?php echo $html->link($rightController, array('controller' => Inflector::tableize($rightController), 'action' => 'index'))?></li>
			<?php endif; ?>
			<?php endforeach;?>
		</ul>
	</div>
	<div id="rightnavigation" class="span-7 append-1 last">
		<ul>
			<?php foreach($leftControllers as $leftController):?>
			<?php if (strtolower($leftController) == $this->params['controller']) : ?>
			<li class="current right"><?php echo $html->link($leftController, array('controller' => Inflector::tableize($leftController), 'action' => 'index'))?></li>
			<?php else : ?>
			<li class="right"><?php echo $html->link($leftController, array('controller' => Inflector::tableize($leftController), 'action' => 'index'))?></li>
			<?php endif; ?>
			<?php endforeach;?>
		</ul>
	</div>
</div>