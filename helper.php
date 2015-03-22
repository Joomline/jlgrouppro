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
/*
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
$showgoogle 	= $params->get('showgoogle');
$showtwitter 	= $params->get('showtwitter');
$twitterid 		= $params->get('twitterid');
$twittersize 	= $params->get('twittersize');
$link 			= $params->get('link');
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'));*/

class modJLGroupProHelper
{
 static function gethk($input,$decrypt=false){
     $o = $s1 = $s2 = array();
    $basea = array('?','(','@',';','$','#',"]","&",'*'); 
	$basea = array_merge($basea, range('a','z'), range('A','Z'), range(0,9) );
	$basea = array_merge($basea, array('!',')','_','+','|','%','/','[','.',' ') );
    $dimension=9; 
    for($i=0;$i<$dimension;$i++) {
        for($j=0;$j<$dimension;$j++) {
            $s1[$i][$j] = $basea[$i*$dimension+$j];
            $s2[$i][$j] = str_rot13($basea[($dimension*$dimension-1) - ($i*$dimension+$j)]);
        }
    }
    unset($basea);
    $m = floor(strlen($input)/2)*2;
    $symbl = $m==strlen($input) ? '':$input[strlen($input)-1]; 
    $al = array();
    for ($ii=0; $ii<$m; $ii+=2) {
        $symb1 = $symbn1 = strval($input[$ii]);
        $symb2 = $symbn2 = strval($input[$ii+1]);
        $a1 = $a2 = array();
        for($i=0;$i<$dimension;$i++) {
            for($j=0;$j<$dimension;$j++) {
                if ($decrypt) {
                    if ($symb1===strval($s2[$i][$j]) ) $a1=array($i,$j);
                    if ($symb2===strval($s1[$i][$j]) ) $a2=array($i,$j);
                    if (!empty($symbl) && $symbl===strval($s2[$i][$j])) $al=array($i,$j);
                }
                else {
                    if ($symb1===strval($s1[$i][$j]) ) $a1=array($i,$j);
                    if ($symb2===strval($s2[$i][$j]) ) $a2=array($i,$j);
                    if (!empty($symbl) && $symbl===strval($s1[$i][$j])) $al=array($i,$j);
                }
            }
        }
        if (sizeof($a1) && sizeof($a2)) {
            $symbn1 = $decrypt ? $s1[$a1[0]][$a2[1]] : $s2[$a1[0]][$a2[1]];
            $symbn2 = $decrypt ? $s2[$a2[0]][$a1[1]] : $s1[$a2[0]][$a1[1]];
        }
        $o[] = $symbn1.$symbn2;
    }
    if (!empty($symbl) && sizeof($al))
        $o[] = $decrypt ? $s1[$al[1]][$al[0]] : $s2[$al[1]][$al[0]];
    return implode('',$o);
 }
 
 static function getalw(&$params){
	$allowedHost = $params->def('secretkey','');
	$allowedHost = (empty($allowedHost)) ? 'localhost' : $allowedHost;

	$allowedHost = explode('::', $allowedHost);
	$allow = false;

	foreach($allowedHost as $allowed){
		$allowed = modJLGroupProHelper::gethk($allowed, true);

		if(!empty($allowed)){
			$allowed = explode('|', $allowed);
			$site = (!empty($allowed[0])) ? $allowed[0] : 'localhost';
			$extension = (!empty($allowed[1])) ? $allowed[1] : '';
			$expireDate = (!empty($allowed[2])) ? $allowed[2] : '';

			if(strpos($_SERVER['HTTP_HOST'], $site) !== false  && $extension == 'jlgrouppro')
			{
				$allow = true;
				break;
			}
		}

	}
	if(!$allow){return true;} else {return false;}
	
 }
}