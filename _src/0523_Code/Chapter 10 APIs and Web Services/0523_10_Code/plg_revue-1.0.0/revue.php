<?php
/**
 * Boxoffice Revue Plugin 
 * 
 * @package    	mod_criticschoice
 * @subpackage 	modules
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// No direct access 
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	// Import the JPlugin class
	jimport('joomla.event.plugin');
	
	/**
	 *  Box Office event listener
	 *
	 */
	class plgBoxofficeRevue extends JPlugin
	{
		/**
		 *  Handle onPrepareRevue
		 *
		 */
		function onPrepareRevue(&$revue)
		{
			// look for images in template if available  
			$starImageOn 	= JHTML::_('image.site',  'rating_star.png', '/images/M_images/' );
			$starImageOff = JHTML::_('image.site',  'rating_star_blank.png', '/images/M_images/' );
			
			$img='';
			
			for ($i=0; $i < strlen($revue->stars); $i++) 
			{
				$img .= $starImageOn;
			}
			
			for ($i=strlen($revue->stars); $i < 5; $i++) 
			{
				$img .= $starImageOff;
			}
			
			$revue->stars = $img;
		}
	}