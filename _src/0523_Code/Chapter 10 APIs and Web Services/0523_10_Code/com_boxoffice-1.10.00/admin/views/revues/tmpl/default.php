<?php 
/**
 * 	Boxoffice Component Administrator Revues View
 * 
 * 	@package    	com_boxoffice
 * 	@subpackage 	components
 * 	@link 				http://www.packtpub.com
 * 	@license			GNU/GPL
 */

	// No direct access
	defined('_JEXEC') or die('Restricted access'); 
	
	$ordering = ($this->lists['order'] == 'ordering');
?>
	
	<form action="index.php" method="post" name="adminForm">
	
		<table>
			<tr>
				<td align="left" width="100%">
					<?php echo JText::_('FILTER'); ?>
					<input type="text" name="filter_search" id="search" value="<?php echo $this->lists['search']; ?>" class="text_area" onchange="document.adminForm.submit();" />
					<button onclick="this.form.submit();"><?php echo JText::_('Search'); ?></button>
					<button onclick="document.adminForm.filter_search.value=''; this.form.submit();"><?php echo JText::_('Reset'); ?></button>
				</td>
				<td nowrap="nowrap">
					<?php echo $this->lists['catid']; ?>
					<?php echo $this->lists['state']; ?>
				</td>
			</tr>
		</table>
		
		<table class="adminlist">
			<thead>
				<tr>
					<th width="20" nowrap="nowrap"><?php echo JHTML::_( 'grid.sort', JText::_('ID'), 'id', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th width="20" nowrap="nowrap"><input type="checkbox" name="toggle" value="" onclick="checkAll(<?php echo count( $this->revues ); ?>);" /></th>			
					<th width="40%"><?php echo JHTML::_( 'grid.sort', JText::_('TITLE'), 'title', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th width="20%"><?php echo JHTML::_( 'grid.sort', JText::_('REVUER'), 'revuer', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th width="80" nowrap="nowrap"><?php echo JHTML::_( 'grid.sort', JText::_('REVUED'), 'revued', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th width="80" nowrap="nowrap" align="center"><?php echo JHTML::_('grid.sort', 'ORDER', 'ordering', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th width="10" nowrap="nowrap"><?php if ($ordering) echo JHTML::_('grid.order',  $this->revues); ?></th>
					<th width="50" nowrap="nowrap"><?php echo JText::_( 'HITS' ); ?></th>
					<th width="100" nowrap="nowrap" align="center"><?php echo JHTML::_( 'grid.sort', JText::_('CATEGORY'), 'category', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
					<th width="60" nowrap="nowrap" align="center"><?php echo JHTML::_( 'grid.sort', JText::_('PUBLISHED'), 'published', $this->lists['order_Dir'], $this->lists['order'] ); ?></th>
				</tr>
			</thead>
			
			<tbody>
				
				<?php
				$i = 0;
				
				foreach( $this->revues as $row ) :
				
					$checked 	 = JHTML::_( 'grid.id', ++$i, $row->id );
					$published = JHTML::_( 'grid.published', $row, $i );
					$link 		 = JRoute::_( 'index.php?option='.
																  JRequest::getVar( 'option' ) .
																  '&task=edit&cid[]='. $row->id .
																  '&hidemainmenu=1' ); ?>
																 
					<tr class="<?php echo "row$i%2"; ?>">
						<td><?php echo $row->id; ?></td>
						<td><?php echo $checked; ?></td>
						<td><a href="<?php echo $link; ?>"><?php echo $row->title; ?></a></td>
						<td><?php echo $row->revuer; ?></td>
						<td align="center"><?php echo JHTML::_('date', $row->revued, JTEXT::_('%m/%d/%Y')); ?></td>
						<td class="order" colspan="2">
							<span><?php echo $this->page->orderUpIcon( $i, ($row->position == @$rows[$i-1]->position), 'orderup', 'Move Up', $row->ordering ); ?></span>
							<span><?php echo $this->page->orderDownIcon( $i, $n, ($row->position == @$rows[$i+1]->position),'orderdown', 'Move Down', $row->ordering ); ?></span>
							<?php $disabled = $ordering ?  '' : 'disabled="disabled"'; ?>
							<input type="text" name="order[]" size="5" value="<?php echo $row->ordering; ?>" class="text_area" style="text-align: center" />
						</td>
						<td align="center"><?php echo $row->hits; ?></td>
						<td align="center"><?php echo $row->cat_title; ?></td>
						<td align="center"><?php echo $published;?></td>
					</tr>
					
				<?php 
				endforeach; 
				?>
			
			</tbody>
			
			<tfoot>
				<tr>
					<td colspan="10"><?php echo $this->page->getListFooter(); ?></td>
				</tr>
			</tfoot>
			
		</table>

		<input type="hidden" name="option" value="<?php echo JRequest::getVar( 'option' ); ?>" />
		<input type="hidden" name="task" value="" />
		<input type="hidden" name="boxchecked" value="0" />
		<input type="hidden" name="hidemainmenu" value="0" />
		<input type="hidden" name="filter_order" value="<?php echo $this->lists['order']; ?>" />
		<input type="hidden" name="filter_order_Dir" value="" />
		
	</form>