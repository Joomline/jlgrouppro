<?php
 /**
 * @package mod_jlgrouppro
 * @author Kunicin Vadim (vadim@joomline.ru)
 * @version 1.1
 * @copyright (C) 2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/
// No direct access
defined('_JEXEC') or die('Restricted access');

$group_id 		= $params->get('group_id');
$widthvk 		= $params->get('widthvk');
$heightvk 		= $params->get('heightvk');
$mode 			= $params->get('mode');
$wide 			= $params->get('wide');
$widthok 		= $params->get('widthok');
$heightok 		= $params->get('heightok');
$heightfb 		= $params->get('heightfb');
$widthfb		= $params->get('widthfb');
$heightgp 		= $params->get('heightgp');
$widthgp 		= $params->get('widthgp');
$group_id_ok	= $params->get('group_id_ok');
$fbappid		= $params->get('fbappid');
$group_id_fb	= $params->get('group_id_fb');
$showvkontakte 	= $params->get('showvkontakte');
$showok 		= $params->get('showok');
$showfacebook 	= $params->get('showfacebook');
$orders 		= explode(",",$params->get('orders'));
$typeviewerjq 	= $params->get('typeviewerjq');
$typeviewerbs 	= $params->get('typeviewerbs');
$typeviewernojq = $params->get('typeviewernojq');
$scriptPage='';
$fblang 		= $params->get('fblang');
$googleid		= $params->get('googleid');
$googlelang		= $params->get('googlelang');
$typeviewercss	= $params->get('typeviewercss');
$showgoogle 	= $params->get('showgoogle');
$showtwitter 	= $params->get('showtwitter');
$twitterid 		= $params->get('twitterid');
$twittersize 	= $params->get('twittersize');
$link 			= $params->get('link');
$colorschemefb 	= $params->get('colorschemefb');
$datastreamfb 	= $params->get('datastreamfb');
$datashowfacesfb = $params->get('datashowfacesfb');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));

require_once dirname(__FILE__).'/helper.php';

require JModuleHelper::getLayoutPath('mod_jlgrouppro', $params->get('layout', 'default'));
