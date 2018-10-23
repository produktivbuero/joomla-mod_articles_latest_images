<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_articles_latest_images
 *
 * @author     Sebastian Brümmer <sebastian@produktivbuero.de>
 * @copyright  Copyright (C) 2005 - 2017 Open Source Matters. All rights reserved.
 * @license    GNU General Public License version 2 or later
 */

defined('_JEXEC') or die;

// Include the latest functions only once
JLoader::register('ModArticlesLatestImagesHelper', __DIR__ . '/helper.php');

$list            = ModArticlesLatestImagesHelper::getList($params);
$moduleclass_sfx = htmlspecialchars($params->get('moduleclass_sfx'), ENT_COMPAT, 'UTF-8');

require JModuleHelper::getLayoutPath('mod_articles_latest_images', $params->get('layout', 'default'));
