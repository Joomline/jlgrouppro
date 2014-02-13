<?php
 /**
 * @package mod_jlgrouppro
 * @author Kunicin Vadim (vadim@joomline.ru)
 * @version 1.2
 * @copyright (C) 2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/
// No direct access

$doc = JFactory::getDocument();


If ($typeviewercss==1) {
	$doc->addStyleSheet(JURI::root(true)."modules/mod_jlgrouppro/css/jlgroupetabs.css");
	}

If ($typeviewerjq==1) {
	$doc->addCustomTag('<script src="http://yandex.st/jquery/1.9.1/jquery.min.js"></script>');
	}

If ($typeviewerbs==1) {
	$doc->addCustomTag('<script src="http://yandex.st/bootstrap/2.3.0/js/bootstrap.min.js"></script>');
	}
If ($typeviewernojq==1) {
	$doc->addCustomTag ('<script type="text/javascript">var jqjlpro = jQuery.noConflict();</script>');
	}
if ($link==0){
	$linknone = 'display:none;';
	}
else {}
?>
<div id="jlgroupprocustom<?php echo $module->id; ?>" class="jlgroupprocustom<?php echo $moduleclass_sfx ?>">
<br clear="all"><div id="jlcomments_container<?php echo $module->id; ?>"><ul class="nav nav-tabs" id="jlgrouppro<?php echo $module->id; ?>">
<?php
foreach ($orders as $order) {
			switch($order) {
				case 1:	if ($showvkontakte) { 
					$doc->addCustomTag('<script src="//vk.com/js/api/openapi.js?87"></script>');
					$scriptPage .= <<<HTML
					<style>
					#vkgroup div, #vkgroup$module->id iframe { height: {$height}px!important; }
						</style>
						<li style="list-style-type: none;" class="active"><a data-target="#vkgroup$module->id" href="#" data-toggle="tab">VK</a></li>		
	
					
HTML;
						} else {$scriptPage .='';} break;
				case 2:	if ($showok) { $scriptPage .= <<<HTML
					<li style="list-style-type: none;"><a href="#" data-target="#okgroup$module->id" data-toggle="tab">ОК</a></li>
HTML;
						} else {$scriptPage .='';} break;
				case 3:	if ($showfacebook) { $scriptPage .= <<<HTML
					 <li style="list-style-type: none;"><a href="#" data-target="#fbgroup$module->id" data-toggle="tab">FB</a></li>
HTML;
						} else {$scriptPage .='';} break;
				case 4:	if ($showgoogle) { 
				$scriptPage .= <<<HTML
					 <li style="list-style-type: none;"><a href="#" data-target="#ggroup$module->id" data-toggle="tab">G+</a></li>
					 
HTML;
					} else {$scriptPage .='';} break;
					
				case 5:	if ($showtwitter) { $scriptPage .= <<<HTML
					 <li style="list-style-type: none;"><a href="#" data-target="#twittergroup$module->id" data-toggle="tab">Twitter</a></li>
HTML;
						} else {$scriptPage .='';} break;
			}
		}
echo $scriptPage;
$scriptPage	='';
?>
</ul>

<div class="tab-content">

<?php
foreach ($orders as $order) {		
	switch($order) {		
	case 1:
	if ($showvkontakte) { $scriptPage .= <<<HTML
		<div class="tab-pane active" id="vkgroup$module->id">
			<div  id="jlvkgrouppro$group_id"></div>
			<script type="text/javascript">
				VK.Widgets.Group("jlvkgrouppro$group_id", {mode: $mode, wide: $wide, width: "$widthvk", height: "$heightvk"}, $group_id);
			</script>
		</div>
HTML;
	
						} else {$scriptPage .='';} break;
	case 2:	
	if ($showok) { $scriptPage .= <<<HTML
		<div class="tab-pane" id="okgroup$module->id">
				<div id="ok_grouppro_widget$module->id"></div>
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
					(document, "ok_grouppro_widget$module->id", $group_id_ok, '{width: "$widthok",height: "$heightok"}');
				</script>
		</div>
HTML;
						} else {$scriptPage .='';} break;
	case 3:	
	if ($showfacebook) { $scriptPage .= <<<HTML
		<div class="tab-pane" id="fbgroup$module->id">
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/$fblang/all.js#xfbml=1&appId=$fbappid";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
			<div class="fb-like-box" data-href="http://www.facebook.com/$group_id_fb" data-width="$widthfb" data-height="$heightfb" data-show-faces="true" data-stream="false" data-header="true"></div>
		</div>
HTML;
						} else {$scriptPage .='';} break;
		case 4:	
	if ($showgoogle) { $scriptPage .= <<<HTML
		<div class="tab-pane" id="ggroup$module->id">
			<style>
				div[id*=plus_] * {min-height:{$heightgp}px !important;}
			</style>
			<script type="text/javascript" src="https://apis.google.com/js/platform.js">
				{lang: '$googlelang', parsetags: 'explicit'}
			</script>
			<div  class="g-plus" data-width="$widthgp" data-height="$heightgp" data-href="//plus.google.com/$googleid" data-rel="publisher"></div>
		</div>
HTML;
						} else {$scriptPage .='';} break;
case 5:	
	if ($showtwitter) { $scriptPage .= <<<HTML
	<div class="tab-pane" id="twittergroup$module->id">
		<a href="https://twitter.com/$twitterid" class="twitter-follow-button" data-show-count="true" data-size="$twittersize" data-lang="$googlelang">Follow @$twitterid</a>
		<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>	
    </div>
HTML;
						} else {$scriptPage .='';} break;
}}
echo $scriptPage;
?>
</div>	
	<div style="text-align: right; <?php echo $linknone;?>">
		<a style="text-decoration:none; color: #c0c0c0; font-family: arial,helvetica,sans-serif; font-size: 5pt; " target="_blank" href="http://joomline.org/">Extension Joomla</a>
	</div>	
</div>
</div>

<script type="text/javascript">
jQuery(document).ready(function(){
jQuery('#jlgrouppro a:first').tab('show');
});
</script>