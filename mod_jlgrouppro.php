<?php

/**
 * @package mod_jlgrouppro
 * @author Kunicin Vadim (vadim@joomline.ru)
 * @version 1.8
 * @copyright (C) 2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
 */
// No direct access
defined('_JEXEC') or die('Restricted access');

require_once dirname(__FILE__) . '/helper.php';

$group_id = $params->get('group_id');
$widthvk = $params->get('widthvk');
$heightvk = $params->get('heightvk');
$mode = $params->get('mode');
$wide = $params->get('wide');
$widthok = $params->get('widthok');
$heightok = $params->get('heightok');
$heightfb = $params->get('heightfb');
$widthfb = $params->get('widthfb');
$heightgp = $params->get('heightgp');
$widthgp = $params->get('widthgp');
$group_id_ok = $params->get('group_id_ok');
$fbappid = $params->get('fbappid');
$group_id_fb = $params->get('group_id_fb');
$showvkontakte = $params->get('showvkontakte');
$showok = $params->get('showok');
$showfacebook = $params->get('showfacebook');
$orders = explode(",", $params->get('orders'));
$typeviewerjq = $params->get('typeviewerjq');
$typeviewerbs = $params->get('typeviewerbs');
$typeviewernojq = $params->get('typeviewernojq');
$allow = modJLGroupProHelper::getalw($params);
$scriptPage = '';
$googlegroup = '';
$gpade = '';
$fblang = $params->get('fblang');
$googleid = $params->get('googleid');
$googlelang = $params->get('googlelang');
$typeviewercss = $params->get('typeviewercss');
$showgoogle = $params->get('showgoogle');
$showtwitter = $params->get('showtwitter');
$twitterid = $params->get('twitterid');
$twittersize = $params->get('twittersize');
$link = $params->get('link');
$colorschemefb = $params->get('colorschemefb');
$datastreamfb = $params->get('datastreamfb');
$datashowfacesfb = $params->get('datashowfacesfb');
$heighttw = $params->get('heighttw');
$colortw = $params->get('colortw');
$showtwitterpost = $params->get('showtwitterpost');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));
$groupgoogle = $params->get('groupgoogle');
$color1 = $params->get('color1');
$color2 = $params->get('color2');
$color3 = $params->get('color3');
$timertrue = $params->get('timertrue');
$timertime = $params->get('timertime');
$popuptrue = $params->get('popuptrue');

require JModuleHelper::getLayoutPath('mod_jlgrouppro', $params->get('layout', 'default'));
