<?php 
/**
 * Boxoffice Critics Choice _error layout 
 * 
 * @package    	mod_criticschoice
 * @subpackage 	modules
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
	// No direct access
	defined('_JEXEC') or die('Restricted access'); ?>
	
	<p>
		<strong><?php echo $error->code; ?></strong><br />
		<?php echo JText::_($error->message); ?>
	</p>