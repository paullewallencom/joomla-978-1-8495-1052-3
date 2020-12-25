<?php
/**
 * 	Boxoffice Component Administrator Revues View
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
	 * Revues View
	 *
	 * @package    com_boxoffice 
	 * @subpackage components
	 */
	class BoxofficeViewRevues extends JView
	{
		/**
		 * Revues view display method
		 *
		 * @return void
		 **/
		function display( $tpl = null )
		{
			JToolBarHelper::title( JText::_( 'Box Office Revues' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::preferences( 'com_boxoffice', '200' );
			JToolBarHelper::help( 'help', true );
	
			// Get revues from the model
			$model  =& $this->getModel( 'revues' );
			$revues =& $model->getRevues();
	
			$this->assignRef('revues',	$revues);
	
			parent::display( $tpl );
		}
	}