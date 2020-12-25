<?php
/**
 * Boxoffice Frontend Revue View
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
		 *	Method to display the records in raw/xml format.
		 *
		 *	@access		public 
		 *
		 */
		function display( $tpl = null )
		{
			// Get the model  
			$model =& $this->getModel();
			
			// Get the cid array from the default request hash
			// If no cid array in the request, check for id
			$cid = JRequest::getVar('cid', null, 'DEFAULT', 'array'); 
			$id  = $cid ? $cid[0] : JRequest::getInt( 'id', 0 );
			
			$revue =  $model->getRevue( $id );
				
			// get JSimpleXMLElement class
			jimport('joomla.utilities.simplexml');
			
			// create root node with attibute of id
			$xml = new JSimpleXMLElement('film', array('id' => $revue->id));
			
			// set the document encoding
			$document =& JFactory::getDocument();
			$document->setMimeEncoding('text/xml');

			// add elements to the XML
			$title  	=& $xml->addChild('title');
			$revuer 	=& $xml->addChild('revuer');
			$stars  	=& $xml->addChild('stars');
			$text 		=& $xml->addChild('revue');

			// set element data
			$title->setData($revue->title);
			$revuer->setData($revue->revuer);
			$stars->setData($revue->stars);
			$text->setData($revue->revue);

			// Output the data in XML format
			echo '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
			echo $xml->toString(); 
		}
	}
?>