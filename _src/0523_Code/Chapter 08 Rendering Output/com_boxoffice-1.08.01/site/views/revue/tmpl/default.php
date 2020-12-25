<?php
/*****************************************************************
 *	Frontend default template: default.php
 *****************************************************************/
	
	// no direct access
	defined( '_JEXEC' ) or die( 'Restricted access' );
?>

	<h3 class="componentheading">Box Office Revues</h3>
	
<?php
	if( $this->revue )
	{
		// Trigger the revue plugin onPrepareRevue event
		$dispatcher	=& JDispatcher::getInstance();
		$result = $dispatcher->trigger('onPrepareRevue', array (&$this->revue));
?>	
		<p class="contentheading"><?php echo $this->revue->title."&nbsp;&mdash;&nbsp;".$this->revue->rating; ?></p>
		<p  class="createdate"><?php echo JHTML::Date( $this->revue->revued )."&nbsp;&nbsp;".$revue->revuer; ?></p>
		<p><strong><?php echo $this->revue->stars."&nbsp;&nbsp;".$this->revue->quikquip; ?></strong></p>
		<p><?php echo $this->revue->revue; ?></p>
<?php
	}
	else
	{
		echo "Revue not found...";
	}
?>	