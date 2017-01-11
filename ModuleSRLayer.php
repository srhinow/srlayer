<?php

/**
 * PHP version 5
 *
 * Class ModuleSRLayer
 *
 * @copyright  sr-tag 2014
 * @author     Sven Rhinow <support@sr-tag.de>
 * @package    srlayer
 */
class ModuleSRLayer extends \Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'srl_default';

	/**
	 * Target pages
	 * @var array
	 */
	protected $arrTargets = array();

	/**
	 * Options for JS
	 * @var array
	 */
	protected $optionsArr = array();

	/**
	* show files and layer
	* @var bool
	*/
	protected $show = false;


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new \BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### SR-LAYER ###';

			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'contao/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		if($this->srl_template != '') $this->strTemplate = $this->srl_template;

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		global $objPage;

		//sucht in den Get-Keys nach einer bestimmten Teil-Zeichenkette
		$pos = false;

		if(count($_GET)>0)
		{
	       foreach($_GET AS $k => $v)
			{
				$k = strip_tags(trim($k));
				$getPos = strcmp($k,$this->srl_substr)==0 ? true : false;
			}
		}

		//test Start-Date
		if(strlen($this->srl_start) && ($this->srl_start > time()))
		{
			return false;
		}

		//test Stop-Date
		if(strlen($this->srl_stop) && ($this->srl_stop < time()))
		{
			return false;
		}

		//Modul-Flag fuer "keine Parameter notwendig" pruefen
		if($this->srl_no_param || $getPos)
		{
			$this->optionsArr[] = 'showNow: true';
			$this->show = true;
		}


		//Modul-Flag fuer "Layer per Link öffnen" pruefen
		if($this->srl_set_mkLinkEvents)
		{
			$this->optionsArr[] = 'mkLinkEvents: true';
			$this->show = true;
		}

		//Cookie
		if($this->srl_set_cookie && $this->show)
		{
			//Name des Cookies
			if(!$this->srl_cookie_name) $this->srl_cookie_name = 'LAYER_'.$this->id.'_COOKIE';

			if(!$this->Input->cookie($this->srl_cookie_name))
			{
				if(!$this->srl_cookie_dauer) $this->srl_cookie_dauer = 3600;
				$this->setCookie( $this->srl_cookie_name, 1, time() + $this->srl_cookie_dauer );

			}else $this->show = false;
		}

		//Session
		if($this->srl_set_session && $this->show)
		{
			$this->import('Session');
			$this->srl_session_name = 'LAYER_'.$this->id.'_SESSION';

			if(!$this->Session->get($this->srl_session_name))
			{
				$this->Session->set($this->srl_session_name,'1');

			}else $this->show = false;
		}

		// nur wenn Fund dann CSS, JS und HTML einfuegen
		if($this->show)
		{
			$layerName = $this->srl_substr;

			if(is_numeric($this->srl_option_layerwidth)) $this->optionsArr[] = 'layerWidth:'.$this->srl_option_layerwidth;
			if(is_numeric($this->srl_option_layerheight)) $this->optionsArr[] = 'layerHeight:'.$this->srl_option_layerheight;

			//expert options
			if($this->srl_set_jsoptions == 1)
			{
				if($objPage->hasJQuery)
				{
					if(strlen($this->srl_set_overLayID)) $this->optionsArr[] = "overLayID:'#".$this->srl_set_overLayID."'";
					if(strlen($this->srl_set_layerID)) $this->optionsArr[] = "layerID:'#".$this->srl_set_layerID."'";
					if(strlen($this->srl_set_closeID)) $this->optionsArr[] = "closeID:'#".$this->srl_set_closeID."'";
					if(strlen($this->srl_set_closeClass)) $this->optionsArr[] = "closeClass:'.".$this->srl_set_closeClass."'";

				} else {

					if(strlen($this->srl_set_overLayID)) $this->optionsArr[] = "overLayID:'".$this->srl_set_overLayID."'";
					if(strlen($this->srl_set_layerID)) $this->optionsArr[] = "layerID:'".$this->srl_set_layerID."'";
					if(strlen($this->srl_set_closeID)) $this->optionsArr[] = "closeID:'".$this->srl_set_closeID."'";
					if(strlen($this->srl_set_closeClass)) $this->optionsArr[] = "closeClass:'".$this->srl_set_closeClass."'";

				}

				if(strlen($this->srl_set_overLayOpacity)) $this->optionsArr[] = 'overLayOpacity:'.$this->srl_set_overLayOpacity;
				if(strlen($this->srl_set_duration)) $this->optionsArr[] = 'duration:'.$this->srl_set_duration;
				if(!$this->srl_set_closePerEsc) $this->optionsArr[] = 'closePerEsc:false';
				if(!$this->srl_set_closePerLayerClick) $this->optionsArr[] = 'closePerLayerClick:false';
				if(!$this->srl_set_drawLayerCenterX) $this->optionsArr[] = 'drawLayerCenterX:false';
				if(!$this->srl_set_drawLayerCenterY) $this->optionsArr[] = 'drawLayerCenterY:false';
			}

			$jsOptions = implode(', ',$this->optionsArr);

			//eigene CSS-Auszeichnungen aus CSS-Datei
			if($this->srl_css_file)
			{
				$cssObjFile = \FilesModel::findByPk($this->srl_css_file);

				if(version_compare(VERSION, '3.2','>='))
				{
					if ($cssObjFile === null)
					{
						if (!Validator::isUuid($this->srl_css_file))
						{
						    $this->log($GLOBALS['TL_LANG']['ERR']['version2format'],'ModuleSRLayer.php srl_css_file','TL_ERROR');
						}
					}
					$cssPath = $cssObjFile->path;
				}
				elseif(version_compare(VERSION, '3.2','<'))
				{
					$cssPath = $cssObjFile->path;
				}

			}

			$GLOBALS['TL_CSS'][] = ($cssPath) ? $cssPath : $GLOBALS['SRL_CSS'];

			//wenn jQuery aktiviert ist dann jQuery (vorrangig)
			if($objPage->hasJQuery && is_array($GLOBALS['SRL_JS']['jquery']))
			{
				foreach($GLOBALS['SRL_JS']['jquery'] as $jsSource)
				{
					$GLOBALS['TL_JAVASCRIPT'][] = $jsSource;
				}

				if((int) $this->srl_delay > 0) $GLOBALS['TL_JQUERY'][] = '<script type="text/javascript"> jQuery(document).ready(function() { setTimeout(function(){ var ml = new jQuery.srLayer( { '.$jsOptions.', '.$this->srl_option_other.' } ); }, '.$this->srl_delay.'); });</script>';
				else $GLOBALS['TL_JQUERY'][] = '<script type="text/javascript">jQuery(document).ready(function() { jQuery.srLayer( { '.$jsOptions.', '.$this->srl_option_other.' } ); });</script>';

			}
			// ansonsten Mootools
			else if($objPage->hasMooTools && is_array($GLOBALS['SRL_JS']['mootools']))
			{

				foreach($GLOBALS['SRL_JS']['mootools'] as $jsSource)
				{
					$GLOBALS['TL_JAVASCRIPT'][] = $jsSource;
				}
				if((int) $this->srl_delay > 0) $GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript"> window.addEvent(\'domready\', function() { var ml = new srLayer( { '.$jsOptions.', '.$this->srl_option_other.' } ); }.delay('.$this->srl_delay.'));</script>';
				else $GLOBALS['TL_MOOTOOLS'][] = '<script type="text/javascript"> window.addEvent(\'domready\', function() { var ml = new srLayer( { '.$jsOptions.', '.$this->srl_option_other.' } ); });</script>';
			}

			$this->Template->content = $this->srl_content;
			$this->Template->showLayerHtml = $this->show;
			$this->Template->hideOverlay = ($this->srl_hideOverlay == 1) ? true : false;
		}

	}

}
