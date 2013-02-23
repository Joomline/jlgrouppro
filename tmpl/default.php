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
<ul class="nav nav-tabs" id="jlgrouppro">
      <li class="active"><a data-target="#vkgroup" href="#" data-toggle="tab">VK</a></li>
      <li><a href="#" data-target="#okgroup" data-toggle="tab">ОК</a></li>
	  <li><a href="#" data-target="#fbgroup" data-toggle="tab">FB</a></li>
</ul>
	<div class="tab-content">
	<div class="tab-pane active" id="vkgroup">
			<!-- VK Widget -->
			<div  id="jlvkgrouppro<?=$group_id?>"></div>
			<script type="text/javascript">
			VK.Widgets.Group("jlvkgrouppro<?=$group_id?>", {mode: <?=$mode?>, wide: <?=$wide?>, width: "<?=$width?>", height: "<?=$height?>"}, <?=$group_id?>);
			</script>
    </div>
    <div class="tab-pane" id="okgroup">
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
    </div>
	<div class="tab-pane" id="fbgroup">
			<!-- FB Widget -->
			<div id="fb-root"></div>
			<script>(function(d, s, id) {
			  var js, fjs = d.getElementsByTagName(s)[0];
			  if (d.getElementById(id)) return;
			  js = d.createElement(s); js.id = id;
			  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1&appId=<?=$fbappid?>";
			  fjs.parentNode.insertBefore(js, fjs);
			}(document, 'script', 'facebook-jssdk'));</script>

			<div class="fb-like-box" data-href="http://www.facebook.com/<?=$group_id_fb?>" data-width="<?=$width?>" data-height="<?=$height?>" data-show-faces="true" data-stream="false" data-header="true"></div>
    </div>
</div>
<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#jlgrouppro a:first).tab('show');
}
</script>








 
