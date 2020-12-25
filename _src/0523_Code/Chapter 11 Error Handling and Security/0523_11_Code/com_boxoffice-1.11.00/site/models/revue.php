<?php
/**
 * Boxoffice Frontend Model 
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Load the base JView class
	jimport( 'joomla.application.component.model' );
	
	/**
	 *  Revue Model 
	 */
	class BoxofficeModelRevue extends JModel
	{

		/**
		 *	Get the revue
		 *
		 *	@return object
		 */
		function getRevue( $id )
		{
			$db 	 =& JFactory::getDBO();
			$table = $db->nameQuote( '#__boxoffice_revues' );
			$key   = $db->nameQuote( 'id' );
			
			$query = ' SELECT * FROM ' . $table 
						 . ' WHERE ' . $key . ' = ' . $db->Quote( $id );
							 
			$db->setQuery( $query );
			$revue = $db->loadObject();
			
			// Return the revue data
			return $revue;
		}
		
		/**
		 *	Get the revues
		 *
		 *	@return object
		 */
		function getRevues()
		{
			$db 	 =& JFactory::getDBO();
			$table = $db->nameQuote( '#__boxoffice_revues' );
			
			$query = 'SELECT * FROM ' . $table;
			
			$db->setQuery( $query );
			$revues = $db->LoadObjectList();

			// Return the revue data
			return $revues;
		}
		
    /**
     * Increments the hit counter
     * 
     */
    function hit( $id )
    {
      $db    =& JFactory::getDBO();	
			$table = $db->nameQuote( '#__boxoffice_revues' );
			$key   = $db->nameQuote( 'hits' );
			$rid	 = $db->nameQuote( 'id' );
			
			$query = ' UPDATE ' . $table 
			       . ' SET '    . $key . ' = ' . $key . ' + 1 ' 
						 . ' WHERE '  . $rid . ' = ' . $db->Quote( $id );
			
			$db->setQuery( $query );
      $db->query();
    }
	}