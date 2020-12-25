<?php
/**
 * Boxoffice Router 
 * 
 * @package    	com_boxoffice
 * @subpackage 	components
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	
/**
 * Builds route for Boxoffice
 *
 * @access public
 * @param array Query associative array
 * @return array SEF URI segments
 */
function boxofficeBuildRoute(&$query)
{
  $segments = array();
  if (isset($query['layout']))
  {
    $segments[] = $query[layout];
    unset($query[layout]);
  }

/**
 * Decodes SEF URI segments for Boxoffice.
 *
 * @access public
 * @param array SEF URI segments array
 * @return array Query associative array
 */
function boxofficeParseRoute($segments)
{
    $query = array();

    if (isset($segments[0])) 
    {
      $query['layout'] = $segments[0];
    }

    return $query;
}
