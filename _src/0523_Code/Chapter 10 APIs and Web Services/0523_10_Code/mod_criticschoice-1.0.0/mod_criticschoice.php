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
	defined( '_JEXEC' ) or die( 'Restricted access' );
	
	jimport('joomla.application.component.helper');
	
	// Our module needs the table created by the com_boxoffice component
	// so we check to see if the component has been installed and enabled.
	if( !JComponentHelper::isEnabled( 'com_boxoffice', true ) )
	{
		JError::raiseError( '500', JText('COMPONENTMISSING' ));
	}
	
	// Load the helper class
	require_once (dirname(__FILE__).DS.'helper.php');
	
	// Get the list of five star movies   
	$list = modCriticsChoiceHelper::getList($params);
	
	// Set the layout correctly
	if($params->get('show_rating'))
	{
		$params->set('layout', 'ratings');
	}
	else
	{
		$params->def('layout', 'default');
	}
	
	// Get the layout path
	$layout = $params->get('layout', 'default');
	
	require(JModuleHelper::getLayoutPath('mod_criticschoice', $layout));