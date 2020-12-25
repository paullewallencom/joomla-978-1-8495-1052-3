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
	defined('_JEXEC') or die('Restricted access'); ?>
	
	<form action="index.php" method="post" name="adminForm" id="adminForm">
		
		<div class="col100">
		
			<fieldset class="adminform">
			
				<legend><?php echo JText::_( 'Details' ); ?></legend>
		
				<table class="admintable">
				
					<tr>
						<td width="100" align="right" class="key"><label for="title"><?php echo JText::_( 'Movie Title' ); ?>:</label></td>
						<td><input class="inputbox" type="text" name="title" id="title" size="25" value="<?php echo $this->revue->title;?>" /></td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="rating"><?php echo JText::_( 'Rating' ); ?>:</label></td>
						<td><input class="inputbox" type="text" name="rating" id="rating" size="10" value="<?php echo $this->revue->rating;?>" /></td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="quikquip"><?php echo JText::_( 'Quik Quip' ); ?>:</label></td>
						<td><input class="text_area" type="text" name="quikquip" id="quikquip" size="32" maxlength="250" value="<?php echo $this->revue->quikquip;?>" /></td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="revuer"><?php echo JText::_( 'Revuer' ); ?>:</label></td>
						<td><input class="inputbox" type="text" name="revuer" id="revuer" size="50" value="<?php echo $this->revue->revuer;?>" /></td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="stars"><?php echo JText::_( 'Stars' ); ?>:</label></td>
						<td><input class="inputbox" type="text" name="stars" id="stars" size="10" maxlength="5" value="<?php echo $this->revue->stars;?>" /></td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="revued"><?php echo JText::_( 'Date Revued' ); ?>:</label></td>
						<td>
						<?php 
							echo JHTML::_('calendar', 
														JHTML::_('date', $this->revue->revued, JTEXT::_('%m/%d/%Y')), 
														'revued', 
														'revued', 
														'%m/%d/%Y', 
														array('class'=>'inputbox', 
																	'size'=>'25', 
																	'maxlength'=>'19' ) );
							?> 
						</td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="revue"><?php echo JText::_( 'Revue' ); ?>:</label></td>
						<td><input class="text_area" type="text" name="revue" id="revue" size="50" maxlength="250" value="<?php echo $this->revue->revue;?>" /></td>
					</tr>
					
					<tr>
						<td width="100" align="right" class="key"><label for="published"><?php echo JText::_( 'Published' ); ?>:</label></td>
						<td><?php echo JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->revue->published ); ?></td>
					</tr>

				</table>
			
			</fieldset>
			
		</div>
		
		<div class="clr"></div>
		
		<input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' ); ?>" />
		<input type="hidden" name="id" value="<?php echo $this->revue->id; ?>" />
		<input type="hidden" name="task" value="" />
		
	</form>
