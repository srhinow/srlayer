<?php

/**
 * This file modifies the data container array of table tl_module.
 *
 * @copyright  Sven Rhinow 2014
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    srlayer
 * @license    LGPL
 * @filesource

 */

$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'] = array_merge( $GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'], array('srl_set_cookie', 'srl_set_jsoptions'));

$GLOBALS['TL_DCA']['tl_module']['palettes']['srlayer']  = 'name,type;{layer_legend},srl_content,srl_option_layerwidth,srl_option_layerheight;{htmlcss_legend},srl_template,srl_css_file;{show_legend},srl_no_param,srl_set_mkLinkEvents,srl_substr,srl_delay,srl_start,srl_stop;{session_legend},srl_set_session;{cookie_legend},srl_set_cookie;{expert_legend:hide},srl_hideOverlay;{js_legend:hide},srl_set_jsoptions';

$GLOBALS['TL_DCA']['tl_module']['subpalettes'] = array_merge($GLOBALS['TL_DCA']['tl_module']['subpalettes'], 
	array(
		'srl_set_cookie' => 'srl_cookie_name,srl_cookie_dauer',
		'srl_set_jsoptions' => 'srl_set_overLayID,srl_set_layerID,srl_set_closeID,srl_set_closeClass,srl_set_overLayOpacity,srl_set_duration,srl_set_closePerEsc,srl_set_closePerLayerClick,srl_set_drawLayerCenterX,srl_set_drawLayerCenterY,srl_option_other'
	)
);

array_insert($GLOBALS['TL_DCA']['tl_module']['fields'] , 2, array
(
	'srl_template' 		=> array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_template'],
		'default'       => 'srl_default',
		'exclude'       => true,
		'inputType'     => 'select',
		'options_callback'	=> array('tl_module_srlayer','getLayerTemplate'),
		'sql'			=> "varchar(255) NOT NULL default ''"
	),
	'srl_content'		=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_content'],
	    'exclude' 		=> true,
	    'inputType'  	=> 'textarea',
	    'eval' 			=> array('mandatory'=>false,'rte'=>false,'allowHtml'=>true,'tl_class'=>'clr'),
		'sql'			=> "text NULL"

	),

	'srl_css_file' 		=> array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_css_file'],
	    'exclude'       => true,
	    'inputType'     => 'fileTree',
	    'eval'          => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>false,'extensions'=>'css','tl_class'=>'clr'),
		'sql'			=> "varchar(255) NOT NULL default ''"
	),
	'srl_no_param' => array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_no_param'],
	    'exclude'       => true,
	    'inputType'     => 'checkbox',
	   	'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "char(1) NOT NULL default ''"
	),
	'srl_set_mkLinkEvents' => array
	(
	    'label'       	=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_mkLinkEvents'],
	    'exclude'     	=> true,
	    'default'	  	=> '',
	    'inputType'   	=> 'checkbox',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "char(1) NOT NULL default ''"
	),
	'srl_substr'			=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_substr'],
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>false,'maxlength'=>55, 'tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default ''"
	),
	'srl_delay'			=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_delay'],
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>false,'maxlength'=>10, 'rgxp'=>'digit', 'tl_class'=>'w50'),
		'sql'			=> "varchar(10) NOT NULL default ''"
	),
	'srl_set_session' 	=> array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_set_session'],
	    'exclude'   	=> true,
	    'inputType'     => 'checkbox',
		'sql'			=> "char(1) NOT NULL default ''"
	),
	'srl_set_cookie' 	=> array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_set_cookie'],
	    'exclude'       => true,
	    'inputType'     => 'checkbox',
	    'eval'          => array('submitOnChange'=>true),
		'sql'			=> "char(1) NOT NULL default ''"
	),
	'srl_cookie_name' 	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_cookie_name'],
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>false,'maxlength'=>55, 'tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default ''"
	),
	'srl_cookie_dauer' 	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_cookie_dauer'],
	    'default' 		=> '3600',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>false,'maxlength'=>10,'rgxp'=>'digit', 'tl_class'=>'w50'),
		'sql'			=> "varchar(10) NOT NULL default ''"
	),
	'srl_option_layerwidth'=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_layer_width'],
	    'default' 		=> '600',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>true,'maxlength'=>55,'tl_class'=>'w50','rgxp'=>'digit'),
		'sql'			=> "varchar(55) NOT NULL default ''"
	),
	'srl_option_layerheight' => array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_layer_height'],
	    'default' 		=> '450',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('mandatory'=>true,'maxlength'=>55,'tl_class'=>'w50','rgxp'=>'digit'),
		'sql'			=> "varchar(55) NOT NULL default ''"
	),
	'srl_hideOverlay' => array
	(
	    'label'       	=> &$GLOBALS['TL_LANG']['tl_module']['srl_hideOverlay'],
	    'exclude'     	=> true,
	    'default'	  	=> '',
	    'inputType'   	=> 'checkbox',
	    'eval' 			=> array('tl_class'=>'w50'),
	    'sql'			=> "char(1) NOT NULL default ''"
	),
	'srl_set_jsoptions' 	=> array
	(
	    'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_set_jsoptions'],
	    'exclude'       => true,
	    'inputType'     => 'checkbox',
	    'eval'          => array('submitOnChange'=>true),
		'sql'			=> "char(1) NOT NULL default ''"
	),
	'srl_set_overLayID'	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_overLayID'],
	    'default' 		=> 'srl_overLay',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default 'srl_overLay'"
	),
	'srl_set_layerID'	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_layerID'],
	    'default' 		=> 'srl_layer',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default 'srl_layer'"
	),
	'srl_set_closeID'	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_closeID'],
	    'default' 		=> 'srl_closeBtn',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default 'srl_closeBtn'"
	),
	'srl_set_closeClass'	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_closeClass'],
	    'default' 		=> 'srl_closer',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default 'srl_closer'"
	),
	'srl_set_overLayOpacity' => array
	(
		'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_set_overLayOpacity'],
		'exclude'       => true,
		'filter'        => true,
        'default' 		=> 0.7,
		'inputType'     => 'select',
		'options'       => array('0.0'=>'0.0','0.1'=>'0.1','0.2'=>'0.2','0.3'=>'0.3','0.4'=>'0.4','0.5'=>'0.5','0.6'=>'0.6','0.7'=>'0.7','0.8'=>'0.8','0.9'=>'0.9','1.0'=>'1.0'),
		'eval'			=> array('tl_class'=>'w50'),
		'sql'			=> "char(10) NOT NULL default ''"
	),
	'srl_set_duration'	=> array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_duration'],
	    'default' 		=> '1000',
	    'exclude' 		=> true,
	    'inputType' 	=> 'text',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "varchar(55) NOT NULL default '1000'"
	),
	'srl_set_closePerEsc' => array
	(
	    'label'       	=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_closePerEsc'],
	    'exclude'     	=> true,
	    'default'	  	=> '1',
	    'inputType'   	=> 'checkbox',
	    'eval' 			=> array('tl_class'=>'w50'),
		'sql'			=> "char(1) NOT NULL default '1'"
	),
	'srl_set_closePerLayerClick' => array
	(
	    'label'       	=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_closePerLayerClick'],
	    'exclude'     	=> true,
	    'default'	  	=> '1',
	    'inputType'   	=> 'checkbox',
	    'eval'	 		=> array('tl_class'=>'w50'),
		'sql'			=> "char(1) NOT NULL default '1'"
	),
	'srl_set_drawLayerCenterX' => array
	(
	    'label'     	=> &$GLOBALS['TL_LANG']['tl_module']['srl_set_drawLayerCenterX'],
	    'exclude'   	=> true,
	    'default'		=> '1',
	    'inputType' 	=> 'checkbox',
	    'eval'			=> array('tl_class'=>'w50'),
		'sql'			=> "char(1) NOT NULL default '1'"
	),
	'srl_set_drawLayerCenterY' => array
	(
	    'label'     => &$GLOBALS['TL_LANG']['tl_module']['srl_set_drawLayerCenterY'],
	    'exclude'   => true,
	    'default'	=> '1',
	    'inputType' => 'checkbox',
	    'eval' 		=> array('tl_class'=>'w50'),
		'sql'		=> "char(1) NOT NULL default '1'"
	),
	'srl_option_other' => array
	(
	    'label' 		=> &$GLOBALS['TL_LANG']['tl_module']['srl_option_other'],
	    'exclude' 		=> true,
	    'default' 		=> '',
	    'inputType'  	=> 'textarea',
	    'eval' 			=> array('mandatory'=>false,'rte'=>false,'allowHtml'=>true,'tl_class'=>'clr'),
		'sql'			=> "text NULL"
	),
	'srl_start' => array
	(
		'exclude'       => true,
		'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_start'],
		'inputType'     => 'text',
		'eval'          => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
		'sql'			=> "varchar(10) NOT NULL default ''"
	),
	'srl_stop' => array
	(
		'exclude'       => true,
		'label'         => &$GLOBALS['TL_LANG']['tl_module']['srl_stop'],
		'inputType'     => 'text',
		'eval'          => array('rgxp'=>'datim', 'datepicker'=>true, 'tl_class'=>'w50 wizard'),
		'sql'			=> "varchar(10) NOT NULL default ''"
	)
)
);

/**
 * Class tl_module_srlayer
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Leo Feyer 2008-2009
 * @author     Leo Feyer <leo@typolight.org>
 * @package    Controller
 */
class tl_module_srlayer extends Backend
{
	/**
	 * Return all navigation templates as array
	 * @return array
	 */
    public function getLayerTemplate()
    {
		return $this->getTemplateGroup('srl_');
    }
 }

