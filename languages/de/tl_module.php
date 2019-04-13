<?php

/**
 *
 * @copyright  Sven Rhinow 2014
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    Language
 * @license    LGPL
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['srl_template']         = array('Layer-Template', 'dieses Template ist der äußere Rand vom Layer und ist für die Funktionstüchtigkeit verantwortich');
$GLOBALS['TL_LANG']['tl_module']['srl_css_file']         = array('CSS-Datei', 'Falls Sie eine seperate CSS-Datei benötigen um nur speziell die Auszeichnung für diesen Layer zu kontrollieren.');
$GLOBALS['TL_LANG']['tl_module']['srl_no_param']         = array('keine Parameter notwendig', 'wenn es keinen Parameter braucht um den Layer aufzurufen');
$GLOBALS['TL_LANG']['tl_module']['srl_substr']         = array('GET-Parameter', 'Der Layer wird angezeigt wenn genau dieser Parameter als GET-Key übergeben wird. z.B. "GET-Parameter = srl" eingeben dann erscheint der Layer wenn die URL so aussieht http://www.example.com?srl=1 oder http://www.example.com/index/srl/1.html');
$GLOBALS['TL_LANG']['tl_module']['srl_delay']         = array('Anzeige-Verzögerung', 'Der Layer wird nach einer Zeit in Milisekunden angezeigt z.B. 2000 = 2 Sekunden. Wenn das Feld leer bleibt wird der Layer unverzüglich angezeigt.');
$GLOBALS['TL_LANG']['tl_module']['srl_content']         = array('Layer-Inhalt', 'geben Sie hier den Layer-Inhalt ein. Es ist HTML erlaubt. Sie können aber auch Include-Elemente wie z.B. {{insert_content::23}} eingeben. Weitere wären z.B. {{insert_article::ID}} oder {{insert_module::ID}}.');
$GLOBALS['TL_LANG']['tl_module']['srl_layer_width']         = array('Layer-Breite', '');
$GLOBALS['TL_LANG']['tl_module']['srl_layer_height']         = array('Layer-Höhe', '');
$GLOBALS['TL_LANG']['tl_module']['srl_set_session']         = array('Sitzungscookie setzen', 'Der Layer wird nur einmal pro Session gezeigt.');
$GLOBALS['TL_LANG']['tl_module']['srl_set_cookie']         = array('ein Domaincookie setzen', 'Um die Anzeige per Cookie-Dauer zu beschränken.');
$GLOBALS['TL_LANG']['tl_module']['srl_cookie_name']         = array('Cookie-Name', 'wenn es leer bleibt wird ein Name generiert.');
$GLOBALS['TL_LANG']['tl_module']['srl_cookie_dauer']         = array('Cookie-Dauer', 'in Sekunden. Standart 3600 = 1Stunde.');

$GLOBALS['TL_LANG']['tl_module']['srl_set_cookieaction']         = array('den Domaincookie auswerten', 'Nur wenn der Haken gesetzt wurde, wird die Anzeige darauf reagieren.');
$GLOBALS['TL_LANG']['tl_module']['srl_cookieaction_name']         = array('Cookie-Name', 'wenn es leer bleibt wird ein Name generiert.');

$GLOBALS['TL_LANG']['tl_module']['srl_start']       = array('Anzeigen ab', 'Den Layer erst ab diesem Tag auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_module']['srl_stop']        = array('Anzeigen bis', 'Den Layer nur bis zu diesem Tag auf der Webseite anzeigen.');
$GLOBALS['TL_LANG']['tl_module']['srl_hideOverlay']        = array('Overlay nicht anzeigen','den Bereich um den Layer der sich über die ganze Seite legt, nicht anzeigen.');

$GLOBALS['TL_LANG']['tl_module']['srl_set_jsoptions']        = array('Javascript-Einstellungen bearbeiten','Hier können die Standartwerte angepasst werden.');
$GLOBALS['TL_LANG']['tl_module']['srl_set_overLayID']        = array('OverLay-ID','die ID des Overlay-Bereiches');
$GLOBALS['TL_LANG']['tl_module']['srl_set_layerID']        = array('Layer-ID','die ID des Layer-Bereiches');
$GLOBALS['TL_LANG']['tl_module']['srl_set_closeID']        = array('Schließen-Button-ID','die ID des Schließen-Button-Bereiches');
$GLOBALS['TL_LANG']['tl_module']['srl_set_closeClass']        = array('Schließen-Link-Klasse','alle Links mit dieser Klasse bewirken auch das schließen des Layers. z.B. um innerhalb des Layers dem Kunden einen schließen-Link anzubieten.');
$GLOBALS['TL_LANG']['tl_module']['srl_set_duration']        = array('Einblend-Geschwindigkeit','Standart = 1000, Angabe in Millisekunden');
$GLOBALS['TL_LANG']['tl_module']['srl_set_overLayOpacity']        = array('Transparenz des Overlays','1.0 = keine transparent, 0.0 = komplette Transparent');
$GLOBALS['TL_LANG']['tl_module']['srl_set_closePerEsc']        = array('per ESC-Taste schließen des Layers','wenn dieses Feld deaktiviert wird, kann der Besucher den Seite den Layer nicht mehr per ESC-Taste schließen');
$GLOBALS['TL_LANG']['tl_module']['srl_set_closePerLayerClick']        = array('Schließen des Layers per Klick auf den Overlay-Breich ','wenn dieses Feld deaktiviert wird, kann der Besucher den Seite den Layer nicht mehr per Klick auf den Overlay-bereich zu schließen');
$GLOBALS['TL_LANG']['tl_module']['srl_set_drawLayerCenterX']        = array('horizontal Zentrierung des Layers','wenn dieses Feld deaktiviert wird, wird das Layerfeld nicht automatisch beim laden und Größenänderung des Fensters horizontal zentriert ausgerichtet');
$GLOBALS['TL_LANG']['tl_module']['srl_set_drawLayerCenterY']        = array('vertikale Zentrierung des Layers','wenn dieses Feld deaktiviert wird, wird das Layerfeld nicht automatisch beim laden und Größenänderung des Fensters vertikal zentriert ausgerichtet');
$GLOBALS['TL_LANG']['tl_module']['srl_set_mkLinkEvents']         = array('Layer per Link öffnen', 'beim Klick aller Links mit der Klasse "openlayer" wird der Layer geöffnet.');
$GLOBALS['TL_LANG']['tl_module']['srl_option_other']         = array('Optionen', '');

$GLOBALS['TL_LANG']['tl_module']['layer_legend'] = 'Layer-Einstellungen';
$GLOBALS['TL_LANG']['tl_module']['htmlcss_legend'] = 'Anpassung der CSS-, und Template-Datei';
$GLOBALS['TL_LANG']['tl_module']['show_legend'] = 'Sichtbarkeits-Einstellungen';
$GLOBALS['TL_LANG']['tl_module']['session_legend'] = 'Sitzungs-Cookie (Session)';
$GLOBALS['TL_LANG']['tl_module']['cookie_legend'] = 'Domain-Cookie (Cookie)';
$GLOBALS['TL_LANG']['tl_module']['js_legend'] = 'Javascript-Einstellungen';

