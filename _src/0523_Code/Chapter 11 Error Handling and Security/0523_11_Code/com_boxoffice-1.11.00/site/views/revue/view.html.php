<?php
/*****************************************************************
 *	Frontend default view: view.html.php
 *****************************************************************/
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Load the base JView class 
	jimport( 'joomla.application.component.view' );
	
	/**
	 *  Prevue HTML view class
	 */
	class BoxofficeViewRevue extends JView
	{
		/**
		 *	Method to display the view
		 *
		 *	@access		public 
		 *
		 */
		function display( $tpl = null )
		{
			// Build links to feed view
			$feed = 'index.php?option=com_boxoffice&format=feed';
			$rss  = array( 'type'  => 'application/rss+xml',
										 'title' => 'Box Office RSS Feed' );
			$atom = array( 'type'  => 'application/atom+xml',
										 'title' => 'Box Office Atom Feed' );
			
			// Add the links
			$document =& JFactory::getDocument();
			$document->addHeadLink( JRoute::_( $feed.'&type=rss' ), 'alternate', 'rel', $rss ); 
			$document->addHeadLink( JRoute::_( $feed.'&type=atom' ), 'alternate', 'rel', $atom );
			 
			// Get the model  
			$model =& $this->getModel();
			
			// Get a reference to the component parameters
			global $mainframe;
			$params =& $mainframe->getPageParameters('com_boxoffice');
			$this->assignRef( 'params', $params );
			
			// Make sure the plugin is loaded
			JPluginHelper::importPlugin('boxoffice');
			
			if( $this->getLayout() == 'xml' )
			{
				// Fall through and display the xml layout
			}
			else if( $this->getLayout() == 'list' )
			{
				// Get all of the revues
				$revues = $model->getRevues();
				$this->assignRef( 'revues', $revues );
			}
			else
			{
				// Get the cid array from the default request hash
				// If no cid array in the request, check for id
				$cid = JRequest::getVar('cid', null, 'DEFAULT', 'array'); 
				$id  = $cid ? $cid[0] : JRequest::getInt( 'id', 0 );
				
				$revue =  $model->getRevue( $id );
				
				// Update the hit count
				$model->hit( $id );
				
				$this->assignRef( 'revue', $revue );
			}

			// Display the view
			parent::display( $tpl );
		}
	}