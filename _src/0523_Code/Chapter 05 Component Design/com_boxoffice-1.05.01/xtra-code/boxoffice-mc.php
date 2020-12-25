<?php
/**
 * Boxoffice frontend entry point for multiple controllers
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
	
	// Require specific controller if requested
	if( $c = JRequest::getVar( 'c' ) ) 
	{
		require_once ( JPATH_COMPONENT.DS.'controllers'.DS.$c.'.php' );
	}

	// Create the controller
	$c	= 'BoxofficeController'.$c;
	$controller = new $c();
	
	// Perform the requested task
	$controller->execute( JRequest::getVar( 'task', 'display' ) );
	
	// Redirect if set by the controller
	$controller->redirect();