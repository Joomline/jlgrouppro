<?php
 /**
 * @package mod_jlgrouppro
 * @author Kunicin Vadim (vadim@joomline.ru)
 * @version 1.0
 * @copyright (C) 2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/
// No direct access

$doc = JFactory::getDocument();
$doc->addScriptDeclaration('
	if(!window.VK) {
		document.write(unescape(\'<script type="text/javascript" src="http://vkontakte.ru/js/api/openapi.js">%3C/script%3E\'));
	}
	');
?>

<!-- VK Widget -->
<div  id="jlvkgrouppro<?=$group_id?>"></div>
<script type="text/javascript">
VK.Widgets.Group("jlvkgrouppro<?=$group_id?>", {mode: <?=$mode?>, wide: <?=$wide?>, width: "<?=$width?>", height: "<?=$height?>"}, <?=$group_id?>);
</script>

<!-- OK Widget -->
<div id="ok_grouppro_widget"></div>
<script>
!function(d,id,did,st){
  var js=d.createElement('script');
  js.src="http://connect.ok.ru/connect.js";
  js.onload = js.onreadystatechange = function (){
    if(!this.readyState || this.readyState=="loaded" || this.readyState=="complete"){
       if(!this.executed){
         this.executed = true;
         setTimeout(function(){OK.CONNECT.insertGroupWidget(id,did,st);},0);
       }
    }
  }
  d.documentElement.appendChild(js);
}
(document, "ok_grouppro_widget", <?=$group_id_ok?>, '{width: "<?=$width?>",height: "<?=$height?>"}');
</script>
 
