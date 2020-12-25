<?php
/**
 * Boxoffice Frontend Feed Revue View
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// No direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Load the base JView class 
	jimport( 'joomla.application.component.view' );
	
	/**
	 *  Revue Feed View
	 */
	class BoxofficeViewRevue extends JView
	{
		/**
		 *	Method to display the feed
		 *
		 *	@access		public 
		 *
		 */
		function display( $tpl = null )
		{
			// Set the basic link
   		$document =& JFactory::getDocument();
   		$document->setLink(JRoute::_('index.php?option=com_boxoffice');

			// Get the items to add to the feed
		  $db =& JFactory::getDBO();
		  $query = 'SELECT * FROM '
			       . $db->nameQuote('#__boxoffice_revues')
						 . ' WHERE '.$db->nameQuote('published')
						 . ' = '.$db->Quote('1');
		  
			$db->setQuery( $query );
		  $rows = $db->loadObjectList();

			foreach ($rows as $row)
			{
				// Create a new feed item
				$item = new JFeedItem();
		
				// Assign values to the item
				$item->title = $row->title;
				$item->date = date('r', strtotime($row->revued));
				$item->author = $row->revuer;
				$item->description = $row->quikquip;
				$item->guid = $row->id;
				$item->link = JRoute::_(JURI::base().'index.php?option=com_boxoffice&id='.$row->id);
				$item->pubDate = date();
		
				$enclosure = new JFeedEnclosure();
				$enclosure->url = JRoute::_(JURI::base().'index.php?option=com_boxoffice&view=video&format=raw&id='.$row->id);
				// Size in bytes of file
				$enclosure->length = $row->length
				$enclosure->type = 'video/mpeg';
		
				$item->enclosure = $enclosure;
		
				// add item to the feed
				$document->addItem($item);
			}
		}
	}