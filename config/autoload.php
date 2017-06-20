<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2014 Leo Feyer
 *
 * @package Srlayer
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	'ModuleSRLayer' => 'system/modules/srlayer/classes/ModuleSRLayer.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'srl_default' => 'system/modules/srlayer/templates',
));
