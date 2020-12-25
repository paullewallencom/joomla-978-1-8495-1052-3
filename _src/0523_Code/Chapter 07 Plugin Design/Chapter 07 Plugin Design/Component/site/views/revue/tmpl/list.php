<?php
/**
 * Boxoffice Frontend List Layout
 *
 * @package				com_boxoffice
 * @subpackage		components
 * @link					http://www.packtpub.com
 * @license				GNU/GPL
 */
		
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
?>

	<h3 class="componentheading"><?php echo $this->params->get('title'); ?></h3>
	<p><?php echo $this->params->get('description'); ?></p>
	<hr />
	
<?php
	if( $this->revues )
	{
		foreach( $this->revues as $revue )
		{
			// Trigger the revue plugin onPrepareRevue event.
			$dispatcher	=& JDispatcher::getInstance();
			$result = $dispatcher->trigger('onPrepareRevue', array (&$revue));
			
			$link = JRoute::_('index.php?option=com_boxoffice&task=view&cid[]='.$revue->id); 
?>	
				<p class="contentheading"><?php echo $revue->title."&nbsp;&mdash;&nbsp;".$revue->rating; ?></p>
				<p  class="createdate"><?php echo JHTML::Date( $revue->revued )."&nbsp;&nbsp;".$revue->revuer; ?></p>
				<p><strong><?php echo $revue->stars."&nbsp;&nbsp;".$revue->quikquip; ?></strong></p>
				<hr />
<?php
		}
	}
	else
	{
		echo "No revues found...";
	}
?>	