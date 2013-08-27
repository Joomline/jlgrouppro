<?php
 /**
 * @package mod_jlgrouppro
 * @author Kunicin Vadim (vadim@joomline.ru)
 * @version 1.1
 * @copyright (C) 2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/

// no direct access
defined('_JEXEC') or die;

$group_id 		= $params->get('group_id');
$width 			= $params->get('width');
$mode 			= $params->get('mode');
$height 		= $params->get('height');
$wide 			= $params->get('wide');
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