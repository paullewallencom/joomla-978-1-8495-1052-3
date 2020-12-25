<?php
/*****************************************************************
 *	Frontend RAW template: raw.php
 *****************************************************************/
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
?>

	<form id="form1" method="post" action="<?php echo JRoute::_('index.php?option=com_boxoffice'); ?>">
		<input name="id"     type="text" id="id" />
		<input name="format" type="hidden" id="format" value="raw" />
		<input name="view"   type="hidden" id="view"   value="revue" />
		<input name="Submit" type="submit" id="submit" value="Submit" />
	</form>
	
	<div id="update">Update Area</div>

<?php

	// add mootools
	JHTML::_('behavior.mootools');

/*	
// First Example of AJAX return, no formatting
$js = "window.addEvent('domready', function()
{
  $('form1').addEvent('submit', function(e)
  {
	  // Stop the form from submitting
	  new Event(e).stop();
	 
	  // update the page
	  this.send({ update: $('update') });
	 
  });
});";

	// add JavaScript to the page
	$document =& JFactory::getDocument();
	$document->addScriptDeclaration($js);
*/
					 	
/*	
// Second example with formatting. This works in Firefox but not in IE
// due to a undefined element. 
// prepare JavaScript
$js = "window.addEvent('domready', function(){
				 $('form1').addEvent('submit', function(e){
				   // Stop the form from submitting
					 new Event(e).stop();
						
					 // Update the page
					 this.send({onComplete: function(){ 
						 // Get the XML Nodes
						 var film   = this.response.xml.documentElement;
						 var title  = film.childNodes[1];
						 var revuer = film.childNodes[3];
						 var stars  = film.childNodes[5];
						 var revue  = film.childNodes[7];
					 
						 // Prepare the XHTML
						 var updateValue = '<h3>' + title.firstChild.nodeValue  
						                 + ' (' + stars.firstChild.nodeValue + ')</h3>'
														 + '<p>'  + revuer.firstChild.nodeValue + '</p>'
														 + '<p>'  + revue.firstChild.nodeValue  + '</p>';
					 
						 // Update the page element
						 $('update').setStyle('margin-top', '10px'); 
						 $('update').setHTML(updateValue);
					 }});
				 });
			 });";

	// add JavaScript to the page
	$document =& JFactory::getDocument();
	$document->addScriptDeclaration($js);
*/

//
// Third example that works in both Firefox and IE. 
// prepare JavaScript
$js = "window.addEvent('domready', function(){
				 $('form1').addEvent('submit', function(e){
				   // Stop the form from submitting
					 new Event(e).stop();
						
					 // Update the page
					 this.send({onComplete: function(response, responseXML){ 
						 // Get the XML Nodes
						 var film   = responseXML.documentElement;
						 var title  = film.getElementsByTagName('title').item(0);
						 var revuer = film.getElementsByTagName('revuer').item(0);
						 var stars  = film.getElementsByTagName('stars').item(0);
						 var revue  = film.getElementsByTagName('revue').item(0);
					 
						 // Prepare the XHTML
						 var updateValue = '<h3>' + title.firstChild.nodeValue  
						                 + ' (' + stars.firstChild.nodeValue + ')</h3>'
														 + '<p>'  + revuer.firstChild.nodeValue + '</p>'
														 + '<p>'  + revue.firstChild.nodeValue  + '</p>';
					 
						 // Update the page element
						 $('update').setStyle('margin-top', '10px'); 
						 $('update').setHTML(updateValue);
					 }});
				 });
			 });";

	// add JavaScript to the page
	$document =& JFactory::getDocument();
	$document->addScriptDeclaration($js);
?>	
