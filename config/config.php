<?php
$config['Settings'] = Configure::read('Settings');
 
$config['Settings'] = Set::merge(ife(empty($config['Settings']), array(), $config['Settings']), array(
	'developer' => 'Your Name Here',
	'company' => 'Your Company Here',
	'title' => 'CakePHP',
	'slogan' => 'the rapid development php framework',
	'keywords' => 'your keywords goes here',
	'description' => 'your description goes here',
	'editor' => 'form',
	'errors' => 'support@example.com',
	'contant' => 'contact@example.com',
	'software' => 'Your Company CMS',
	'revision' => '0.1',
	'url' => 'http://example.com/example',
	'showFooter' => true
));
?>