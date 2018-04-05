<?php

/**
 *
 * PHP version 5
 * @copyright 	sr-tag.de 2014
 * @author 		Sven Rhinow
 * @package		srlayer
 * @license 	LGPL
 * @filesource
 */

/**
 * Front end modules
 */
 $GLOBALS['FE_MOD']['srlayer'] = array('srlayer' => 'ModuleSRLayer');


/**
 * Paths of CSS and JS - Resources
 */
 $GLOBALS['SRL_CSS'] = 'system/modules/srlayer/assets/css/srl_default.css';
 $GLOBALS['SRL_JS']['mootools'][] = 'system/modules/srlayer/assets/js/srl_mootools.js';
 $GLOBALS['SRL_JS']['jquery'][] = 'system/modules/srlayer/assets/js/srl_jquery.js';

 /**
  * Hooks
  */
$GLOBALS['TL_HOOKS']['prepareFormData'][] = array('ModuleSrlHooks', 'setSrLayerCookie');