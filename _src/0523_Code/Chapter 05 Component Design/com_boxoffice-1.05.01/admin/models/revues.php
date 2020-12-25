<?php
/**
 * Boxoffice Administrator revues model
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Import the JModel class
	jimport( 'joomla.application.component.model' );
	
	/**
	 *  Boxoffice Revues Model
	 *
 	 * 	@package    	com_boxoffice
   * 	@subpackage 	components
	 */
	class BoxofficeModelRevues extends JModel
	{
		/**
		 *	Revues data array of objects
		 *
		 *	@access	private
		 *	@var 		array
		 */
		var $_revues;
		
		/**
		 *	Method to get a list of revues
		 *
		 *	@access public
		 *	@return array of objects
		 */
		function getRevues()
		{
			$db    =& $this->getDBO();
			$table =  $db->nameQuote( '#__boxoffice_revues' );
			$query =  "SELECT * FROM " . $table;
			
			$db->setQuery( $query );
			$this->_revues = $db->loadObjectList();
			
			// Return the list of revues
			return $this->_revues;
		}
		
		/**
		 * Method to delete record(s)
		 *
		 * @access	public
		 * @param	  array of revue ids
		 */
		function delete( $cids )
		{
			$db = $this->getDBO();
			$table = $db->nameQuote('#__boxoffice_revues');
			$id 	 = $db->nameQuote('id');
			$query = "DELETE FROM " . $table . " WHERE " . $id . "IN (" . implode( ',', $cids ) . ")";
			
			$db->setQuery( $query );
			
			if( !$db->query() )
			{
				$errorMessage = $this->getDBO()->getErrorMsg();
				JError::raiseError( 500, 'Error deleting revues: ' . $errorMessage );
			}
		}
	}