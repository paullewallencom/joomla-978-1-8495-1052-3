<?php
/**
 * Boxoffice Administrator revue model
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
	 *  Boxoffice Revue Model
	 *
 	 * 	@package    	com_boxoffice
   * 	@subpackage 	components
	 */
	class BoxofficeModelRevue extends JModel 
	{
		/**
		 *	Method to get a revue 
		 *
		 *	@access public
		 *	@return object 
		 */
		function getRevue( $id )
		{
			$db 	 = $this->getDBO();
			$table = $db->nameQuote( '#__boxoffice_revues' );
			$key   = $db->nameQuote( 'id' );
			$query = "SELECT * FROM " . $table . " WHERE " . $key . " = " . $id;
			$db->setQuery( $query );
			$revue = $db->loadObject();
		
			if( $revue === null )
			{
				JError::raiseError( 500, 'Revue [' .$id.'] not found.' );
			} 
			else
			{
				// Return the revue data
				return $revue;
			}
		}
		
		/**
		 *	Method that returns an empty revue with id of 0
		 *
		 *	@access public
		 *	@return object
		 */
		function getNewRevue()
		{
			$newRevue =& $this->getTable( 'revue' );
			$newRevue->id = 0;
			
			return $newRevue;
		}
				
		/**
		 *	Method to store a revue
		 *
		 *	@access public
		 *	@return Boolean true on success
		 */
		function store()
		{
			// Get the table
			$table =& $this->getTable();	
			$revue = JRequest::get('post');
			
  		// The revue field may contain HTML tags so don't strip these out.
  		$revue['revue'] = JRequest::getVar( 'revue', '', 'post', 'string', JREQUEST_ALLOWHTML );
			
			// Convert the date to a form that the database can understand
			jimport('joomla.utilities.date');
			$date = new JDate( JRequest::getVar( 'revued', '', 'post' ));
			$revue['revued'] = $date->toMySQL();
			
			// Make sure the table buffer is empty
			$table->reset();

			// Close order gaps
			$table->reorder();
						
			// Determine the next order position for the revue
			$table->set( 'ordering', $table->getNextOrder());
			
			// Bind the data to the table
			if( !$table->bind($revue))
			{
				$this->setError( $this->_db->getErrorMsg());
				return false;
			}
			
			// Validate the data
			if( !$table->check())
			{
				$this->setError( $this->_db->getErrorMsg());
				return false;
			}
			
			// Store the revue
			if( !$table->store())
			{
				// An error occurred, update the model error message
				$this->setError( $table->getErrorMsg());
				return false;
			}
			
			// Checkin the revue
			if( !$table->checkin())
			{
				// An error occurred, update the model error message
				$this->setError( $table->getErrorMsg());
				return false;
			}

			return true;
		}
	}
	
	