<?php
/**
 * Boxoffice frontend controller 
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Load the base JController class
	jimport( 'joomla.application.component.controller' );
	
	/**
	 *  Boxoffice Frontend Controller
	 */
	class BoxofficeController extends JController
	{
		/**
		 *	Method to display the view
		 *
		 *	@access		public
		 *
		 */ 
		function display() 
		{
			// Set the view and the model 
			$view   = JRequest::getVar( 'view', 'revue' );
			$layout = JRequest::getVar( 'layout', 'default' );
			$format = JRequest::getVar( 'format', 'html' );   
			
			$view  =& $this->getView( $view, $format );
			$model =& $this->getModel( 'revue' );
			$view->setModel( $model, true );
			$view->setLayout( $layout );	

			// Display the revue	 		
			$view->display(); 
		}
	}