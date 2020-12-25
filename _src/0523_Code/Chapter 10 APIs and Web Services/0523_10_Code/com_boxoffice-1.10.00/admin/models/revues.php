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
		/** @var array of revue objects */
		var $_revues = null;
		/** @var int total number of revues */
		var $_total = null;
		/** @var JPagination object */
		var $_pagination = null;
		
		/**
 		 * Constructor
 		 */
		function __construct()
		{
    	global $mainframe; 
			
   		parent::__construct(); 
			
    	// Get the pagination request variables 
    	$limit      = $mainframe->getUserStateFromRequest( 'global.list.limit', 'limit', $mainframe->getCfg('list_limit') );
    	$limitstart = $mainframe->getUserStateFromRequest( $option.'limitstart', 'limitstart', 0 ); 
			
			// Set the state pagination variables
			$this->setState( 'limit', $limit );
			$this->setState( 'limitstart', $limitstart );
		}
		
		/**
		 *	Get a list of revues
		 *
		 *	@access public
		 *	@return array of objects
		 */
		function getRevues()
		{
			// Get the database connection
			$db =& $this->_db;
			
    	if ( empty($this->_revues) )
    	{
        // Build the query and get the limits from the current state
				$query      = $this->_buildQuery();
        $limitstart = $this->getState('limitstart');
        $limit      = $this->getState('limit');
				
        $this->_revues = $this->_getList($query, $limitstart, $limit);
    	} 
    
			// Return the list of revues
			return $this->_revues;
		}
		
		/**
		 * Get a pagination object
		 * @access public
		 * @return pagination object
		 */
		function getPagination()
		{
			if (empty($this->_pagination))
			{
				// Import the pagination library
				jimport('joomla.html.pagination');
				
				// Prepare the pagination values
				$total = $this->getTotal();
				$limitstart = $this->getState('limitstart');
				$limit = $this->getState('limit');
				
				// Create the pagination object
				$this->_pagination = new JPagination($total, $limitstart, $limit);
			}
	
			return $this->_pagination;
		}

		/**
		 * Get number of items
		 *
		 * @access public
		 * @return integer
		 */
		function getTotal()
		{
			if (empty($this->_total))
			{
				// Build the query
				$query = $this->_buildQuery();
				
				// Get the total number of records 
				$this->_total = $this->_getListCount($query);
			}
		 
			return $this->_total;
		}
		
		/**
 		 * Builds a query to get data from #__boxoffice_revues
 		 * @return string SQL query
 		 */
		function _buildQuery()
		{
    	$db     =& $this->_db;
			$rtable =  $db->nameQuote( '#__boxoffice_revues' );
			$ctable =  $db->nameQuote( '#__categories' );
			$query  =  ' SELECT r.*, cc.title AS cat_title' 
						  .  ' FROM ' . $rtable . ' AS r'
						  .  ' LEFT JOIN ' . $ctable . ' AS cc ON cc.id = r.catid'
						  .  $this->_buildQueryWhere()
						  .  $this->_buildQueryOrderBy();

			return $query;
		}

		/**
		 * Builds the WHERE part of a query
		 *
		 * @return string Part of an SQL query
		 */
		function _buildQueryWhere()
		{
				global $mainframe, $option; 
		
				// Get the filter values
				$filter_state  = $mainframe->getUserStateFromRequest($option.'filter_state',  'filter_state');
				$filter_catid  = $mainframe->getUserStateFromRequest($option.'filter_catid',  'filter_catid');
				$filter_search = $mainframe->getUserStateFromRequest($option.'filter_search', 'filter_search'); 
		
				// Prepare the WHERE clause
				$where = array();
				
				// Determine published state
				if ( $filter_state == 'P' )
				{
						$where[] = 'published = 1';
				}
				elseif($filter_state == 'U')
				{
						$where[] = 'published = 0';
				} 
		
				// Determine category ID
				if ($filter_catid = (int)$filter_catid)
				{
						$where[] = 'catid = '.$filter_catid;
				}
		
				// Determine search terms
				if ($filter_search = trim($filter_search))
				{
						$filter_search = JString::strtolower($filter_search);
						$db =& $this->_db;
						$filter_search = $db->getEscaped($filter_search);
						$where[] = '(LOWER(title) LIKE "%'.$filter_search.'%"'
						         . ' OR LOWER(revuer) LIKE "%'.$filter_search.'%")';
				}
		
				// return the WHERE clause
				return (count($where)) ? ' WHERE '.implode(' AND ', $where) : '';
		}
		
		/**
		 * Build the ORDER part of a query
		 *
		 * @return string part of an SQL query
		 */
		function _buildQueryOrderBy()
		{
				global $mainframe, $option;
		
				// Array of allowable order fields
				$orders = array('title', 'revuer', 'revued', 'category', 'published', 'ordering', 'id');
				 
				// Get the order field and direction, default order field is 'ordering', default direction is ascending
				$filter_order     = $mainframe->getUserStateFromRequest($option.'filter_order', 'filter_order', 'ordering');
				$filter_order_Dir = strtoupper($mainframe->getUserStateFromRequest($option.'filter_order_Dir', 'filter_order_Dir', 'ASC')); 
		
				// Validate the order direction, must be ASC or DESC
				if ($filter_order_Dir != 'ASC' && $filter_order_Dir != 'DESC')
				{
					$filter_order_Dir = 'ASC';
				}
		
				// If order column is unknown use the default
				if (!in_array($filter_order, $orders))
				{
					$filter_order = 'ordering';
				}
				
				$orderby = ' ORDER BY '.$filter_order.' '.$filter_order_Dir;
				
				if ($filter_order != 'ordering')
				{
					$orderby 	.= ' , ordering ';
				}
		
				// Return the ORDER BY clause        
				return $orderby;
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