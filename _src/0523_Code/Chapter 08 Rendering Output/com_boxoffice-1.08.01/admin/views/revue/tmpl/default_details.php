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
	
?>	
	<table class="admintable">
	
		<tr>
			<td width="100" align="right" class="key"><label for="title"><?php echo JText::_( 'Movie Title' ); ?>:</label></td>
			<td><input class="inputbox" type="text" name="title" id="title" size="25" value="<?php echo $this->revue->title;?>" /></td>
		</tr>
		
		<tr>
			<td width="100" align="right" class="key"><label for="catid"><?php echo JText::_( 'Movie Genre' ); ?>:</label></td>
			<td><?php echo JHTML::_('list.category', 'catid', 'com_boxoffice', $this->revue->catid ); ?></td>
		</tr>
		
		<tr>
			<td width="100" align="right" class="key"><label for="rating"><?php echo JText::_( 'Rating' ); ?>:</label></td>
			<td>
			<?php
				$ratings = array();
				$ratings[] =JHTML::_('select.option', JText::_( "MPAA_VK001" ), JText::_( "MPAA_TK001" ));
				$ratings[] =JHTML::_('select.option', JText::_( "MPAA_VK002" ), JText::_( "MPAA_TK002" ));
				$ratings[] =JHTML::_('select.option', JText::_( "MPAA_VK003" ), JText::_( "MPAA_TK003" ));
				$ratings[] =JHTML::_('select.option', JText::_( "MPAA_VK004" ), JText::_( "MPAA_TK004" ));
				$ratings[] =JHTML::_('select.option', JText::_( "MPAA_VK005" ), JText::_( "MPAA_TK005" ));
				$ratings[] =JHTML::_('select.option', JText::_( "MPAA_VK006" ), JText::_( "MPAA_TK006" ));
				
				echo JHTML::_('select.genericlist', 
											$ratings, 
											'rating', 
											null, 
											'value', 
											'text', 
											$this->revue->rating ); 
			?>
			</td>
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
			<td width="100" align="right" class="key"><label for="published"><?php echo JText::_( 'Published' ); ?>:</label></td>
			<td><?php echo JHTML::_('select.booleanlist', 'published', 'class="inputbox"', $this->revue->published ); ?></td>
	 	</tr>
	</table>
