<?php
/**
 * AppController class file
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package       cake
 * @subpackage    cake.app
 */
class AppController extends Controller {

	/**
	 * Contains helpers that are used application-wide
	 * Is merged with $helpers array in your application's controllers
	 *
	 * @var array
	 * @access public
	 **/
	var $helpers = array('Blueprint', 'Error', 'Html', 'Javascript');

	/**
	 * This function is executed before every action in the controller.
	 * It's a handy place to check for an active session or inspect user permissions. 
	 * This particular setup does the following:
	 * - Configures Admin Routing layout
	 * - Sets a view variable for the names of the controllers in your application
	 * 
	 * @return void
	 * @access public
	 * @author Jose Diaz-Gonzalez
	 **/
	function beforeFilter() {
		// Configure Admin Routing
		if ($this->__getAdminMode()) {
			$this->layout = 'admin';
			$this->set('controllerNames', $this->__getControllers());
		}
	}

	/**
	 * Called after controller action logic, but before the view is rendered.
	 * This callback is not used often, but may be needed if you are calling
	 * render() manually before the end of a given action.
	 * 
	 * We use this to explicitely set an error layout
	 *
	 * @return void
	 * @access public
	 * @author teknoid
	 * @link http://teknoid.wordpress.com/2009/05/07/dont-cache-my-form-and-session-data/
	 **/
	function beforeRender () {
		$this->__setErrorLayout();
	}

	/**
	 * Checks the value of the admin routing and returns whether the application
	 * is being accessed from an admin action or not
	 *
	 * @return boolean
	 * @access private
	 * @author Jose Diaz-Gonzalez
	 **/
	function __getAdminMode() {
		$adminRoute = Configure::read('Routing.admin');
		if (isset($this->params['prefix']) && $this->params['prefix'] == $adminRoute) {
			return true;
		}
		return false;
	}

	/**
	 * Sets the admin error layout in the case that the following conditions are true
	 * - Application has returned an error
	 * - Application is being accessed from an admin action
	 * - The user is indeed logged in
	 *
	 * @return void
	 * @access private
	 * @author Jose Diaz-Gonzalez
	 **/
	function __setErrorLayout() {
		if($this->name == 'CakeError' && $this->__getAdminMode()) {
			$this->layout = 'admin';
		}
	}

	/**
	 * Returns the plural names of ALL controllers in this application as a list
	 *
	 * @return array
	 * @author Marko
	 * @link http://debuggable.com/posts/quick-dessert-list-all-controllers-of-a-cakephp-application:480f4dd6-adf4-4b18-9fe8-4b99cbdd56cb
	 **/
	function __getControllers() {
		$Configure = &Configure::getInstance();
		return $Configure->listObjects('controller');
	}
}
?>