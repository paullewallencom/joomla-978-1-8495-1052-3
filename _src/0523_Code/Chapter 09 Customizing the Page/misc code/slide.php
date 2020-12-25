<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * Handles mootools Fx.Slide
 */
class Slide extends JObject
{
    /**
     * Slider mode: horizontal|vertical
     */
    var $_mode;

    /**
     * Constructor
     *
     * @param string Slide mode: horizontal|vertical
     */
    function __construct($mode = 'vertical')
    {
        $this->_mode = $mode;
	
	// import mootools library
	JHTML::_('behavior.mootools');
    }

    /**
     * Starts a new Slide
     *
     * @param string Slider ID
     * @param string Slider class
     * @return string Slider XHTML
     */
    function startSlider($id, $attributes = '')
    {
        // prepare slider JavaScript
        $js = "var ".$id." = new Fx.Slide('".$id."', {mode: '".$this->_mode."'});";
        Slide::addScript($js);

        // return the slider
        return '<div id="'.$id.'" '.$attributes.'>';
    }

    /**
     * Ends a slide
     *
     * @return string Slider XHTML
     */
    function endSlide()
    {
        // end the slide
        return '</div>';
    }

    /**
     * Creates a slide button
     *
     * @param string Button text
     * @param string Button Id
     * @param string Slider Id
     * @param string Button type: toggle|slideIn|slideOut|hide
     * @return string Slider XHTML action button
     */
    function button($text, $buttonId, $slideId, $type = 'toggle')
    {
        // prepare button JavaScript
        $js = "$('".$buttonId."').addEvent('click', function(e){"
            ."	e = new Event(e);"
            ."	".$slideId.".".$type."();"
            ."	e.stop();"
            ."	});";
        Slide::addScript($js);
		
        // return the button
        return '<a id="'.$buttonId.'" href="#" name="'.$buttonId.'">'.$text.'</a>';
    }
	

    /**
     * Adds the JavaScript to the domready event and adds the event handler to the document
     *
     * @static
     * @param string JavaScript to add to domready event
     */
    function addScript($script = null)
    {
        // domready event handler
        static $js;
		
        if ($script)
        {
            // append script
            $js .= "\n".$script;
        }
        else
        {
            // prepare domready event handler
            $script="window.addEvent('domready', function(){".$js."});"

            // add event handler to document
            $document =& JFactory::getDocument();
            $document->addScriptDeclaration($script);
        }
    }
}

?>