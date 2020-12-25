<?php
/**
 * Boxoffice Administrator revues table
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	/**
	 * Revue Table class
	 *
	 * @package    com_boxoffice
	 * @subpackage components
	 */
	class TableRevue extends JTable
	{
		/** @var int Primary key */
		var $id 							= 0;
		/** @var int */
		var $catid 						= 0;
		/** @var string */
		var $title 						= '';
		/** @var string */
		var $rating						= '';
		/** @var string */
		var $quikquip					= '';
		/** @var string */
		var $revuer						= '';
		/** @var datetime */
		var $revued						= '';
		/** @var string */
		var $revue 						= '';
		/** @var string */
		var $stars 						= '';
		/** @var int */
		var $checked_out 			= 0;
		/** @var datetime */
		var $checked_out_time = '';
		/** @var int */
		var $ordering 				= 0;
		/** @var int */
		var $published 				= 0;
		/** @var int */
		var $hits 						= 0;
	
		/**
		* @param database A database connector object
		*/
		function __construct( &$db )
		{
			parent::__construct( '#__boxoffice_revues', 'id', $db );
		}

		/**
		 * Overloaded check function
		 *
		 * @access public
		 * @return boolean
		 * @see JTable::check
		 * @since 1.5
		 */
		function check()
		{
			if( !$this->revue )
			{
				$this->setError( JText::_('No revue submitted' ));
				return false;
			}
			
			if( !$this->revuer )
			{
				$this->setError( JText::_( 'Revuer missing' ));
				return false;
			}
			
			return true;
		}
	}