<?php
/**
 * 	Boxoffice Component Administrator Revue View
 * 
 * 	@package    	com_boxoffice
 * 	@subpackage 	components
 * 	@link 				http://www.packtpub.com
 * 	@license			GNU/GPL
 */

	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	jimport( 'joomla.application.component.view' );
	
	/**
	 * Revue View
	 *
	 * @package    com_boxoffice
	 * @subpackage components
	 */
	class BoxofficeViewRevue extends JView
	{
		/**
		 * 	Revue view edit method 
		 * 	@return void 
		 **/
		function edit( $id )
		{
			// Build the toolbar for the edit function
			JToolBarHelper::title( JText::_( 'Box Office Revue' ) . ': [<small>Edit</small>]' );
			JToolBarHelper::save();
			JToolBarHelper::cancel( 'cancel', 'Close' ); 
	
			// Get the revue  
			$model =& $this->getModel();
			$revue = $model->getRevue( $id ); 
			$this->assignRef( 'revue',	$revue );

			parent::display();
		}
		
		/**
		 * 	Revue view add method
		 * 	@return void
		 **/
		function add()
		{
			// Build the toolbar for the add function
			JToolBarHelper::title( JText::_( 'Box Office Revue' ) . ': [<small>Add</small>]' );
			JToolBarHelper::save();
			JToolBarHelper::cancel();
	
			// Get a new revue from the model
			$model =& $this->getModel();
			$revue = $model->getNewRevue();
			$this->assignRef( 'revue', $revue );
	
			parent::display();
		}
	}