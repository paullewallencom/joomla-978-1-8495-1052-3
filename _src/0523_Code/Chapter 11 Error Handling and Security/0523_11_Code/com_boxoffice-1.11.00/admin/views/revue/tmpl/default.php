<?php 
/**
 * 	Boxoffice Component Administrator Revue View
 * 
 * 	@package    	com_boxoffice
 * 	@subpackage 	components
 * 	@link 				http://www.packtpub.com
 * 	@license			GNU/GPL
 */

	// No direct access
	defined('_JEXEC') or die('Restricted access'); 
	
	// Enable tooltips 
  JHTML::_( 'behavior.tooltip' );	
?>	
	<form action="index.php" method="post" name="adminForm" id="adminForm">		
		<div class="col width-50">
			<fieldset class="adminform">
				<span class="editlinktip hasTip" title="::<?php echo JText::_( 'TIP_010' );?>">
					<legend><?php echo JText::_( 'Details' ); ?></legend>
				</span>
				<?php echo $this->loadTemplate('details'); ?>
			</fieldset>
		</div>

		<div class="col width-50">			
			<fieldset class="adminform">
				<span class="editlinktip hasTip" title="::<?php echo JText::_( 'TIP_008' );?>">
					<legend><?php echo JText::_( 'Revue' ); ?></legend>
				</span>
				<?php echo $this->loadTemplate('revue'); ?>
			</fieldset>
		</div>
		
		<div class="clr"></div>
		
		<input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' ); ?>" />
		<input type="hidden" name="filter_order" value="<?php echo $this->revue->order; ?>" />
		<input type="hidden" name="id" value="<?php echo $this->revue->id; ?>" />
		<input type="hidden" name="task" value="" />
		<?php echo JHTML::_('form.token'); ?>		
	</form>