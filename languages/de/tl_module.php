<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005-2009 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Leo Feyer 2005-2009
 * @author     Leo Feyer <leo@typolight.org>
 * @package    Language
 * @license    LGPL
 * @filesource
 *
 * @copyright  Sven Rhinow 2010
 * @author     Sven Rhinow <sven@sr-tag.de>
 * @package    Language
 * @license    LGPL
 * @filesource
 */


/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_module']['cl_template']         = array('Layer-Template', 'dieses Template ist der äußere Rand vom Layer und ist für die Funktionstüchtigkeit verantwortich');
$GLOBALS['TL_LANG']['tl_module']['cl_css_file']         = array('CSS-Datei', 'Falls Sie eine seperate CSS-Datei benötigen um nur speziell die Auszeichnung für diesen Layer zu kontrollieren.');
$GLOBALS['TL_LANG']['tl_module']['cl_no_param']         = array('keine Parameter notwendig', 'wenn es keinen Parameter braucht um den Layer aufzurufen');
$GLOBALS['TL_LANG']['tl_module']['cl_substr']         = array('GET-Parameter', 'wenn genau dieser Parameter als GET-Paramter als Key übergeben wurde, wird der Layer angezeigt');
$GLOBALS['TL_LANG']['tl_module']['cl_content']         = array('Layer-Inhalt', 'geben Sie hier den Layer-Inhalt ein. Es ist HTML erlaubt. Sie können aber auch Include-Elemente wie z.B. {{insert_content::23}} eingeben. Weitere wären z.B. {{insert_article::ID}} oder {{insert_module::ID}}.');
$GLOBALS['TL_LANG']['tl_module']['cl_layer_width']         = array('Layer-Breite', '');
$GLOBALS['TL_LANG']['tl_module']['cl_layer_height']         = array('Layer-Höhe', '');
$GLOBALS['TL_LANG']['tl_module']['cl_set_session']         = array('Session-Cookie setzen', 'der Layer wird nur einmal pro Session gezeigt.');
$GLOBALS['TL_LANG']['tl_module']['cl_set_cookie']         = array('ein Cookie setzen', 'um die mehrmalige Anzeige per Cookie zu beschränken');
$GLOBALS['TL_LANG']['tl_module']['cl_cookie_name']         = array('Cookie-Name', 'wenn es leer bleibt wird ein Name generiert.');
$GLOBALS['TL_LANG']['tl_module']['cl_cookie_dauer']         = array('Cookie-Dauer', 'in Millisekunden Standart 3600 = 1 Stunde.');

$GLOBALS['TL_LANG']['tl_module']['cl_set_drawOverLay']         = array('Overlay-Bereich per Javascript anlegen.', 'Standart = false. Dieses Feld nur aktivieren, wenn in ihrem Layout kein Overlay-Bereich vorgesehen ist und einer per Javascript angelegt werden soll.');
$GLOBALS['TL_LANG']['tl_module']['cl_set_overLayID']        = array('OverLay-ID','die ID des Overlay-Bereiches');
$GLOBALS['TL_LANG']['tl_module']['cl_set_drawLayer']         = array('Layer-Bereich per Javascript anlegen.', 'Standart = false. Dieses Feld nur aktivieren, wenn in ihrem Layout kein Layer-Bereich vorgesehen ist und einer per Javascript angelegt werden soll.');
$GLOBALS['TL_LANG']['tl_module']['cl_set_layerID']        = array('Layer-ID','die ID des Layer-Bereiches');
$GLOBALS['TL_LANG']['tl_module']['cl_set_drawCloseBtn']         = array('Schließen-Button per Javascript anlegen.', 'Standart = false. Dieses Feld nur aktivieren, wenn in ihrem Layout kein Schließen-Button vorgesehen ist und einer per Javascript angelegt werden soll.');
$GLOBALS['TL_LANG']['tl_module']['cl_set_closeID']        = array('Schließen-Button-ID','die ID des Schließen-Button-Bereiches');
$GLOBALS['TL_LANG']['tl_module']['cl_set_closeClass']        = array('Schließen-Link-Klasse','alle Links mit dieser Klasse bewirken auch das schließen des Layers. z.B. um innerhalb des Layers dem Kunden einen schließen-Link anzubieten.');
$GLOBALS['TL_LANG']['tl_module']['cl_set_overLayOpacity']        = array('Transparenz des Overlays','1.0 = keine transparent, 0.0 = komplette Transparent');
$GLOBALS['TL_LANG']['tl_module']['cl_set_closePerEsc']        = array('per ESC-Taste schließen des Layers','wenn dieses Feld deaktiviert wird, kann der Besucher den Seite den Layer nicht mehr per ESC-Taste schließen');
$GLOBALS['TL_LANG']['tl_module']['cl_set_closePerLayerClick']        = array('Schließen des Layers per Klick auf den Overlay-Breich ','wenn dieses Feld deaktiviert wird, kann der Besucher den Seite den Layer nicht mehr per Klick auf denOverlay-bereich zu schließen');
$GLOBALS['TL_LANG']['tl_module']['cl_set_drawLayerCenterX']        = array('horizontal Zentrierung des Layers','wenn dieses Feld deaktiviert wird, wird das Layerfeld nicht automatisch beim laden und Größenänderung des Fensters horizontal zentriert ausgerichtet');
$GLOBALS['TL_LANG']['tl_module']['cl_set_drawLayerCenterY']        = array('vertikale Zentrierung des Layers','wenn dieses Feld deaktiviert wird, wird das Layerfeld nicht automatisch beim laden und Größenänderung des Fensters vertikal zentriert ausgerichtet');

$GLOBALS['TL_LANG']['tl_module']['cl_set_mkLinkEvents']         = array('Layer per Link öffnen', 'beim Klick aller Links mit der Klasse "openlayer" wird der Layer geöffnet.');


$GLOBALS['TL_LANG']['tl_module']['cl_option_other']         = array('Optionen', '');
?>