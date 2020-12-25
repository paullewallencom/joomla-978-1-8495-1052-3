<?php
/*****************************************************************
 *	Frontend list template: default.php
 *****************************************************************/
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
?>

	<h3 class="componentheading">Box Office Revues</h3>
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
				<p class="contentheading"><a href="<?php echo $link; ?>"><?php echo $revue->title; ?></a><?php echo "&nbsp;&mdash;&nbsp;".$revue->rating; ?></p>
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