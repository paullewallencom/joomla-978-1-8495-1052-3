<?php
/**
 * Boxoffice Administrator Controller 
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Load the base JController class
	jimport( 'joomla.application.component.controller' );
	
	/**
	 * Boxoffice Component Administrator Controller
	 *
	 * @package    	com_boxoffice
	 * @subpackage 	components
	 */
	class BoxofficeController extends JController
	{
		/**
		 *	Method to display the list view
		 *
		 *	@access		public
		 *
		 */
		function display()
		{
			// We override the JController default display method which expects a view
			// named boxoffice. We want a view of 'revues' that uses the 'default' layout. 
			// Set the view and the model 
			$view =& $this->getView( JRequest::getVar( 'view', 'revues' ), 'html' );
			$model =& $this->getModel( 'revues' );
			$view->setModel( $model, true );
			
			// Use the View display method
			$view->display(); 
		}
		
		/**
		 *	Method to display the edit view
		 *
		 *	@access		public
		 *
		 */
		function edit()
		{
			// Get the requested id(s) as an array of ids
			$cids = JRequest::getVar( 'cid', null, 'default', 'array' );
			
			if( $cids === null )
			{
				// Report an error if there was no cid parameter in the request
				JError::raiseError( 500, 'cid parameter missing from the request' );
			}
			
			// Get the first revue to be edited
			$revueId = (int)$cids[0];
			
			// Set the view for a single revue 
			$view =& $this->getView( JRequest::getVar( 'view', 'revue' ), 'html' );
			$model =& $this->getModel( 'revue' );
			$view->setModel( $model, true );
			
			// Display the edit form for the requested revue
			$view->edit( $revueId );
		}
		
		/**
		 *	Method to save the revue
		 *
		 *	@access		public
		 *
		 */
		function save()
		{
			$model =& $this->getModel( 'revue' );
			$model->store();
			
			$redirectTo = JRoute::_( 'index.php?option=' .
															 JRequest::getVar( 'option' ) .
															 '&task=display' );
			
			$this->setRedirect( $redirectTo, 'Revue Saved' );
		}
		
		/**
		 *	Method to add a new revue
		 *
		 *	@access		public
		 *
		 */
		function add()
		{
			// Set the view for a single revue 
			$view =& $this->getView( JRequest::getVar( 'view', 'revue' ), 'html' );
			$model =& $this->getModel( 'revue' );
			$view->setModel( $model, true );

			$view->add();
		}
		
		/**
		 *	Method to remove one or more revues
		 *
		 *	@access		public
		 *
		 */
		function remove()
		{
			// Retrieve the ids to be removed
			$cids = JRequest::getVar( 'cid', null, 'default', 'array' );
			
			if( $cids === null )
			{
				// Make sure there were records to be removed
				JError::raiseError( 500, 'No revues were selected for removal' );
			}
			
			$model =& $this->getModel( 'revues');
			$model->delete( $cids);
			
			$redirectTo = JRoute::_( 'index.php?option=' .
															 JRequest::getVar( 'option' ) .
															 '&task=display' );
			
			$this->setRedirect( $redirectTo, 'Revues Deleted' );
		}
		
		/**
		 *	Method to cancel
		 *
		 *	@access		public
		 *
		 */
		function cancel()
		{		
			$redirectTo = JRoute::_( 'index.php?option=' .
															 JRequest::getVar( 'option' ) .
															 '&task=display' );
			
			$this->setRedirect( $redirectTo, 'Cancelled' );
		}
	}
	
	