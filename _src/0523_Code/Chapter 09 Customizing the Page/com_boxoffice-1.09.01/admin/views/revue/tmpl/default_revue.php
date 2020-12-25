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
<table class="admintable" width="100%">

	<tr>
		<td>
			<?php
				$editor =& JFactory::getEditor();
				$params = array( 'element_path' => '0',
												 'smilies'      => '1',
												 'fullscreen'   => '0',
												 'layer'        => '0',
												 'xhtmlxtras'   => '1' );
				echo $editor->display('revue', $this->revue->revue, '100%', '100%', '70', '20', true, $params );
			?>
		</td>
	</tr>
	
</table>			