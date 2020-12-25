<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

$query = rawurlencode(JRequest::getString('yahooSearch', 'Joomla!', 'DEFAULT', JREQUEST_ALLOWRAW));
	
// The Yahoo! web services request
$request = 'http://search.yahooapis.com/WebSearchService/V1/webSearch?appid=YahooDemo&query='.$query.'&results=4';

// Make the request
if (!$xml = file_get_contents($request))
{
    JError::raiseError('SOME_ERROR', "Web services request failed");
}

// parse the result
$parser =& JFactory::getXMLParser('Simple');
$parser->loadString($xml);
$results =& $parser->document->Result;

// output the search results
echo '<ol class="yahooSeachResults">';
for ($i = 0, $c = count($results); $i < $c; $i ++)
{
    $result =& $results[$i];
    echo '<li>';
    echo '<strong><a href="'.$result->ClickUrl[0]->data().'" target="_blank">'.$result->Title[0]->data().'</a></strong><br />';
    echo $result->Summary[0]->data().'<br />';
    echo '<em>'.$result->DisplayUrl[0]->data().'</em>';
    echo '</li>';
}
echo '</ol>';

// add CSS to the document
$doc =& JFactory::getDocument();
$doc->addStyleDeclaration('.yahooSeachResults li {
	background-color: #FFFFF0;
	margin: 20px;
	padding: 5px;
	width: 700px;
	list-style: upper-roman;
}

.yahooSeachResults strong
{
	font-size: 18px;
}');

?>