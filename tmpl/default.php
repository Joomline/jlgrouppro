<?php

/**
 * @package mod_jlgrouppro
 * @author Kunicin Vadim (vadim@joomline.ru)
 * @version 1.7
 * @copyright (C) 2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 */
// No direct access

$doc = JFactory::getDocument();
$doc->addStyleSheet(JURI::root(true) . "/modules/mod_jlgrouppro/css/jlgroupetabs.css");
if ($typeviewerjq == 1) {
	$doc->addCustomTag('<script src="//yandex.st/jquery/1.11.2/jquery.min.js" type="text/javascript"></script>');
}
if ($typeviewernojq == 1) {
	$doc->addCustomTag('<script type="text/javascript">var jqjlpro = jQuery.noConflict();</script>');
}
if ($link == 0) {
	$linknone = 'display:none;';
}
if ($timertrue == 1) {
	$doc->addCustomTag('<script src="' . JURI::root(true) . '/modules/mod_jlgrouppro/js/script.js" type="text/javascript"></script>');
}
else {
}
if ($groupgoogle == 1) {
	$googlegroup = "communities/";
	$gpage = "g-community";
}
if ($groupgoogle == 0) {
	$gpage = "g-page";
}
else {
}
$scriptPage = '';
$checked_vk = '';
?>
<?php if (!$allow) : ?>
<?php
if ($popuptrue == 1) {
	$doc->addStyleSheet(JURI::root(true) . "modules/mod_jlgrouppro/css/popup.css");
	$doc->addCustomTag('<script src="' . JURI::root(true) . 'modules/mod_jlgrouppro/js/jquery.cookie.js" type="text/javascript"></script>');
	?>
<div id="parent_popup">
<div id="popup">
<?php 
}
else {
};
endif; ?>
<div id="jlgroupprocustom<?php echo $module->id; ?>" class="jlgroupprocustom">

<div class="csstabs<?php echo $module->id; ?>">
<?php
$idtab = 1;
foreach ($orders as $order) {
	$checked = ($idtab == 1) ? ' checked ' : '';
	switch ($order) {
		case 1 :
			if ($showvkontakte) {
				$doc->addCustomTag('<script src="//vk.com/js/api/openapi.js?87"></script>');

				$scriptPage .= <<<HTML
	<style>
		#jlvkgrouppro   $module->id, div#jlvkgrouppro   $module->id iframe {height: {$heightvk}px !important;}
	</style>
	<label class="jltab$idtab-   $module->id" for="jltab$idtab-   $module->id"><i class="jlico-vkg"></i> VK</label>
	<input id="jltab$idtab-   $module->id" type="radio" name="   $module->id" $checked $checked_vk name="radiobutton">
		<div  id="vkgroup   $module->id">
		<div class="jltab$idtab-   $module->id"><i class="jlico-vkg"></i> VK</div>
			<div  id="jlvkgrouppro   $module->id"></div>
			<script type="text/javascript">
				VK.Widgets.Group("jlvkgrouppro   $module->id", {mode: $mode, wide: $wide, width: "$widthvk", height: "$heightvk", color1: '$color1', color2: '$color2', color3: '$color3'}, $group_id);
			</script>
		</div>
HTML;

				$idtab++;
			}
			else {
				$scriptPage .= '';
			}
			break;
		case 2 :
			if ($showok) {
				$scriptPage .= <<<HTML
	<label class="jltab$idtab-   $module->id" for="jltab$idtab-   $module->id"><i class="jlico-ok"></i> ОК</label>
	<input id="jltab$idtab-   $module->id" type="radio"  name="   $module->id" $checked name="radiobutton">
		<div id="okgroup   $module->id">
			<div class="jltab$idtab-   $module->id"><i class="jlico-ok"></i> ОК</div>
				<div id="ok_grouppro_widget   $module->id"></div>
				<script>
					!function(d,id,did,st){
					  var js=d.createElement('script');
					  js.src="//connect.ok.ru/connect.js";
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
					(document, "ok_grouppro_widget   $module->id", $group_id_ok, '{width: "$widthok",height: "$heightok"}');
				</script>
		</div>
HTML;
				$idtab++;
			}
			else {
				$scriptPage .= '';
			}
			break;
		case 3 :
			if ($showfacebook) {
				$scriptPage .= <<<HTML
	<label class="jltab$idtab-   $module->id" for="jltab$idtab-   $module->id"><i class="jlico-fbook"></i> FB</label>
	<input id="jltab$idtab-   $module->id" type="radio"  name="   $module->id" $checked name="radiobutton">		
		<div id="fbgroup   $module->id">
		<div class="jltab$idtab-   $module->id"><i class="jlico-fbook"></i> FB</div>
			<div id="fb-root"></div>
				<script>(function(d, s, id) {
					  var js, fjs = d.getElementsByTagName(s)[0];
					  if (d.getElementById(id)) return;
					  js = d.createElement(s); js.id = id;
					  js.src = "//connect.facebook.net/$fblang/all.js#xfbml=1&appId=$fbappid";
					  fjs.parentNode.insertBefore(js, fjs);
					}(document, 'script', 'facebook-jssdk'));
				</script>
			<div class="fb-like-box" data-href="https://www.facebook.com/$group_id_fb" data-width="$widthfb" data-height="$heightfb" data-show-faces="$datashowfacesfb" data-stream="$datastreamfb" data-colorscheme="$colorschemefb" data-header="true"></div>
		</div>
HTML;
				$idtab++;
			}
			else {
				$scriptPage .= '';
			}
			break;
		case 4 :
			if ($showgoogle) {
				$doc->addCustomTag('<link href="https://plus.google.com/' . $googleid . '" rel="publisher" />');
				$scriptPage .= <<<HTML
	<style>
		div[id*=page_] * {min-height:{$heightgp}px !important;}
		#ggroupcontent   $module->id, #div[id*=page_] iframe * {min-height:{$heightgp}px !important;}
		div[id*=community_] * {min-height:{$heightgp}px !important;}
		#ggroupcontent   $module->id, #div[id*=community_] iframe * {min-height:{$heightgp}px !important;}
	</style>	 
	<label class="jltab$idtab-   $module->id" for="jltab$idtab-   $module->id"><i class="jlico-go"></i> G+</label>
	<input id="jltab$idtab-   $module->id" type="radio"  name="   $module->id" $checked name="radiobutton">
		<div id="ggroup   $module->id">
			<div class="jltab$idtab-   $module->id"><i class="jlico-go"></i> G+</div>
			<div id="ggroupcontent   $module->id">
				<script type="text/javascript" src="https://apis.google.com/js/platform.js">
					{lang: '$googlelang'}
				</script>			
				<div  class="$gpage" data-width="$widthgp" data-height="$heightgp" data-href="//plus.google.com/$googlegroup$googleid" data-rel="publisher"></div>
			</div>
		</div>
HTML;
				$idtab++;
			}
			else {
				$scriptPage .= '';
			}
			break;
		case 5 :
			if ($showtwitter) {
				$scriptPage .= <<<HTML
	<label class="jltab$idtab-   $module->id" for="jltab$idtab-   $module->id"><i class="jlico-tw"></i> TW</label>
	<input id="jltab$idtab-   $module->id" type="radio"  name="   $module->id" name="radiobutton">
	<div   id="twittergroup   $module->id">
		<div class="jltab$idtab-   $module->id"><i class="jlico-tw"></i> TW</div>
			<a href="https://twitter.com/$twitterid" class="twitter-follow-button" data-show-count="true" data-size="$twittersize" data-lang="$googlelang">Follow @$twitterid</a>

			<a class="twitter-timeline" data-height="$heighttw" data-theme="light" data-link-color="$colortw" href="https://twitter.com/$twitterid">Tweets by @$twitterid</a> <script async src="//platform.twitter.com/widgets.js" charset="utf-8"></script>			
	</div>
HTML;
				$idtab++;
			}
			else {
				$scriptPage .= '';
			}
			break;
	}
}
echo $scriptPage;
?>
</div>	
	<?php if ($allow) : ?>
	<div style="text-align: right; <?php echo $linknone; ?>">
		<a style="text-decoration:none; color: #c0c0c0; font-family: arial,helvetica,sans-serif; font-size: 5pt; " target="_blank" href="http://joomline.org/">Extension Joomla</a>
	</div>	
	<?php endif; ?>
</div>

<?php if (!$allow) :
	if ($popuptrue == 1) {
	?>
<a id="setCookie" class="close" title="Закрыть" onclick="document.getElementById('parent_popup').style.display='none';">X</a>
</div>
</div>
<?php 
}
else {
};
endif;
?>
<br clear="all">
<script type="text/javascript">
var jlgrouppro = {
id: <?php echo $module->id; ?>,
timeout: <?php echo $timertime; ?>
}
</script>

<?php if (!$allow) :
	if ($popuptrue == 1) {
	?>
<script type="text/javascript">
jQuery(document).ready(function(){

jQuery("#setCookie").click(function () {
jQuery.cookie("popup", "72house", {expires: 5} );
jQuery("#parent_popup").hide();
});

if ( jQuery.cookie("popup") == null )
{
setTimeout(function(){
jQuery("#parent_popup").show();
}, 5000)
}
else { jQuery("#parent_popup").hide();
}

});
</script>
<?php 
}
else {
};
endif;
?>