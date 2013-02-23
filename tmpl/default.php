<?php
 /**
 * @package mod_jlvkgroup
 * @author Kunicin Vadim (vadim@joomline.ru), Anton Voynov (anton@joomline.net)
 * @version 2.4
 * @copyright (C) 2010-2012 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/

$doc = JFactory::getDocument();
$doc->addScriptDeclaration('
	if(!window.VK) {
		document.write(unescape(\'<script type="text/javascript" src="http://vkontakte.ru/js/api/openapi.js">%3C/script%3E\'));
	}
	');
?>

<!-- VK Widget -->
<div  id="jlvkgroup<?=$group_id?>"></div>
<script type="text/javascript">
VK.Widgets.Group("jlvkgroup<?=$group_id?>", {mode: <?=$mode?>, wide: <?=$wide?>, width: "<?=$width?>", height: "<?=$height?>"}, <?=$group_id?>);
</script>
<div style="text-align: right;">
    <a href="http://joomline.ru/rasshirenija/moduli/modul-jlvkgroup.html" target="_blank" style="text-decoration:none; color: #c0c0c0; font-family: arial,helvetica,sans-serif; font-size: 5pt; "><?php echo JText::_( 'MOD_JLVKGROUP_COPIR' )?></a>
</div>