<?php 
/**
 * Boxoffice Critics Choice default layout 
 * 
 * @package    	mod_criticschoice
 * @subpackage 	modules
 * @link 				http://www.packtpub.com
 * @license			GNU/GPL
 */
	

	// No direct access
	defined('_JEXEC') or die('Restricted access'); ?>
	
	<ul class="criticschoice<?php echo $params->get('moduleclass_sfx'); ?>">
	
	<?php foreach ($list as $item) :  ?>
		<li class="criticschoice<?php echo $params->get('moduleclass_sfx'); ?>">
			<a href="<?php echo JRoute::_('index.php?option=com_boxoffice&cid[]='.$item->id); ?>" class="criticschoice<?php echo $params->get('moduleclass_sfx'); ?>">
				<?php echo $item->title; ?></a>
		</li>
	<?php endforeach; ?>
	</ul>