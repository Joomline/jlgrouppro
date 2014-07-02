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
If ($groupgoogle==1) {
	$googlegroup="communities/";
	$gpage="g-community";
	}
If ($groupgoogle==0) {
	$gpage="g-page";
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
						#vkgroup$module->id div, #jlvkgrouppro$module->id iframe {height: {$heightvk}px !important;}
					</style>
						<li class="active" style="list-style-type: none;"><a  href="#vkgroup$module->id" data-toggle="tab">VK</a></li>		
	
					
HTML;
						} else {$scriptPage .='';} break;
				case 2:	if ($showok) { $scriptPage .= <<<HTML
					<li style="list-style-type: none;"><a href="#okgroup$module->id"  data-toggle="tab">ОК</a></li>
HTML;
						} else {$scriptPage .='';} break;
				case 3:	if ($showfacebook) { $scriptPage .= <<<HTML
					 <li style="list-style-type: none;"><a href="#fbgroup$module->id" data-toggle="tab">FB</a></li>
HTML;
						} else {$scriptPage .='';} break;
				case 4:	if ($showgoogle) { 
				$scriptPage .= <<<HTML
			<style>
				div[id*=page_] * {min-height:{$heightgp}px !important;}
				#ggroup$module->id div, #div[id*=page_] iframe * {min-height:{$heightgp}px !important;}
				div[id*=community_] * {min-height:{$heightgp}px !important;}
				#ggroup$module->id div, #div[id*=community_] iframe * {min-height:{$heightgp}px !important;}
			</style>
					 <li style="list-style-type: none;"><a href="#ggroup$module->id" data-toggle="tab">G+</a></li>
					 
HTML;
					} else {$scriptPage .='';} break;
					
				case 5:	if ($showtwitter) { $scriptPage .= <<<HTML
					 <li style="list-style-type: none;"><a href="#twittergroup$module->id" data-toggle="tab">Twitter</a></li>
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
			<div  id="jlvkgrouppro$module->id"></div>
			<script type="text/javascript">
				VK.Widgets.Group("jlvkgrouppro$module->id", {mode: $mode, wide: $wide, width: "$widthvk", height: "$heightvk"}, $group_id);
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
			<div class="fb-like-box" data-href="http://www.facebook.com/$group_id_fb" data-width="$widthfb" data-height="$heightfb" data-show-faces="$datashowfacesfb" data-stream="$datastreamfb" data-colorscheme="$colorschemefb" data-header="true"></div>
		</div>
HTML;
						} else {$scriptPage .='';} break;
		case 4:	
	if ($showgoogle) { 
	$doc->addCustomTag('<link href="https://plus.google.com/'.$googleid.'" rel="publisher" />');
	$scriptPage .= <<<HTML
		<div class="tab-pane" id="ggroup$module->id">
			<script type="text/javascript" src="https://apis.google.com/js/platform.js">
				{lang: '$googlelang'}
			</script>
			<div  class="$gpage" data-width="$widthgp" data-height="$heightgp" data-href="//plus.google.com/$googlegroup$googleid" data-rel="publisher"></div>
		</div>
HTML;
						} else {$scriptPage .='';} break;
case 5:	
	if ($showtwitter) { $scriptPage .= <<<HTML
	<div class="tab-pane" id="twittergroup$module->id">
		<a href="https://twitter.com/$twitterid" class="twitter-follow-button" data-show-count="true" data-size="$twittersize" data-lang="$googlelang">Follow @$twitterid</a>
		
		<a class="twitter-timeline" height="$heighttw"  data-chrome="nofooter transparent noscrollbar noheader" href="https://twitter.com/$twitterid" data-widget-id="$twitteridwz">Tweets by @$twitterid</a>
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
jQuery('#jlgrouppro<?php echo $module->id; ?> a:first').tab('show');
});
</script>