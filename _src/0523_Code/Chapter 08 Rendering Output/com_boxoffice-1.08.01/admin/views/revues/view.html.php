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
			global $mainframe;
			
			JToolBarHelper::title( JText::_( 'Box Office Revues' ), 'generic.png' );
			JToolBarHelper::deleteList();
			JToolBarHelper::editListX();
			JToolBarHelper::addNewX();
			JToolBarHelper::preferences( 'com_boxoffice', '200' );
			JToolBarHelper::help( 'help', true );
	
			// Prepare list array
			$lists = array();
			
			// Force the layout form to submit itself immediately 
			$js = "onchange=\"if (this.options[selectedIndex].value!='') 
												{ document.adminForm.submit(); }\"";
			
			// Get the user state  
			$filter_order     = $mainframe->getUserStateFromRequest($option.'filter_order', 'filter_order', 'published');
			$filter_order_Dir = $mainframe->getUserStateFromRequest($option.'filter_order_Dir', 'filter_order_Dir', 'ASC');
			$filter_state     = $mainframe->getUserStateFromRequest($option.'filter_state', 'filter_state');
			$filter_catid     = $mainframe->getUserStateFromRequest($option.'filter_catid', 'filter_catid');
			$filter_search 		= $mainframe->getUserStateFromRequest($option.'filter_search', 'filter_search');
			
			// Build the list array for use in the layout
			$lists['order'] 		= $filter_order;
			$lists['order_Dir'] = $filter_order_Dir; 
			$lists['state'] 		= JHTML::_('grid.state', $filter_state); 
			$lists['catid'] 		= JHTML::_('list.category', 'filter_catid', 'com_boxoffice', (int)$filter_catid, $js);
			$lists['search'] 		= $filter_search;

			// Get revues  and pagination from the model
			$model  =& $this->getModel( 'revues' );
			$revues =& $model->getRevues();
			$page   =& $model->getPagination();
	
			// Assign references for the layout to use
			$this->assignRef('lists',  $lists);
			$this->assignRef('revues', $revues);
			$this->assignRef('page', $page);
	
			parent::display( $tpl );
		}
	}