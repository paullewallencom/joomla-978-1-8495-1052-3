<?php
/**
 * Boxoffice frontend entry point 
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// No direct access 
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Require the base controller
	require_once( JPATH_COMPONENT.DS.'controller.php' );
	 
	// Create the controller
	$controller =  new BoxofficeController();
	
	// Perform the requested task
	$controller->execute( JRequest::getVar( 'task' ) );
	
	// Redirect if set by the controller
	$controller->redirect();