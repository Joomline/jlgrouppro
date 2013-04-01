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

require_once dirname(__FILE__).'/helper.php';

require JModuleHelper::getLayoutPath('mod_jlgrouppro', $params->get('layout', 'default'));
