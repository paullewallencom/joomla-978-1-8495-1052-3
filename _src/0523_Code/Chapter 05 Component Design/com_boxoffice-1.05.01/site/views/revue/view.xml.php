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
			// modify the MIME type
			$document =& JFactory::getDocument(); 
			$document->setMimeEncoding('text/xml');
	 
			// Add XML header
			echo '<?xml version="1.0" encoding="UTF-8" ?>';
	 
	
			// prepare some data
			$xml = new JSimpleXMLElement('element');
			$xml->setData('This is an xml format document');
	
			// Output the data in XML format
			echo $xml->toString();
		}
	}