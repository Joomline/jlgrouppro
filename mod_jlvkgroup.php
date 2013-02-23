<?php
 /**
 * @package mod_jlvkgroup
 * @author Kunicin Vadim (vadim@joomline.ru), Anton Voynov (anton@joomline.net)
 * @version 2.4
 * @copyright (C) 2010-2013 by JoomLine (http://www.joomline.net)
 * @license GNU/GPL: http://www.gnu.org/copyleft/gpl.html
 *
*/
// No direct access
defined('_JEXEC') or die('Restricted access');

require_once( dirname(__FILE__).DS.'helper.php' );

require JModuleHelper::getLayoutPath('mod_jlvkgroup', $params->get('layout', 'default'));
