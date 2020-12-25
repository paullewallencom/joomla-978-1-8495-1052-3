<?php
/**
 * Boxoffice Critics Choice Module 
 * 
 * @package    	mod_criticschoice
 * @subpackage 	modules
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// No direct access
	defined('_JEXEC') or die('Restricted access');
	
	
	/**
	 * Retrieves five star revues
	 *
	 * @access public
	 * @param array Query associative array 
	 */
	class modCriticsChoiceHelper
	{
		// Get revues from the database
		function &getList(&$params)
		{
			$db	=& JFactory::getDBO();
			$count = (int) $params->get('count', 5);
			
			$query = modCriticsChoiceHelper::_buildQuery( $count );
			
			$db->setQuery($query);
			$result = $db->loadObjectList();
			
			return $result;
		}
		
		function _buildQuery( $count )
		{
			$db =& JFactory::getDBO();
			$table = $db->nameQuote('#__boxoffice_revues');
			$key   = $db->nameQuote('stars');
			$stars = $db->Quote('*****');
			
			$query = ' SELECT * FROM ' . $table
			       . ' WHERE ' . $key . ' = ' . $stars 
						 . ' LIMIT ' . $count . '';
			
			return $query;
		}
	}
