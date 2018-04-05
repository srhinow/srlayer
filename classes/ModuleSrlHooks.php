<?php
/**
 * Created by sr-tag_4.4.
 * Developer: Sven Rhinow (sven@sr-tag.de)
 * Date: 05.04.18
 */

class ModuleSrlHooks
{
    public function setSrLayerCookie(&$arrSubmitted, $arrLabels, $objForm)
    {
        // setzt den SRLAYER-Cookie wenn alle Bedingungen aus dem Formular erfüllt sind
        if($arrSubmitted['srlayer_set_cookie'] && strlen($arrSubmitted['srlayer_set_cookie']) > 0)
        {
            //prueft ob es ein Feld "srlayer_check_field" mit Wert im Formular gibt
            if(strlen($arrSubmitted['srlayer_check_field']) < 1) return false;

            $checkField = $arrSubmitted['srlayer_check_field'];

            // prüft ob es ein Formular-Feld mit dem zu pruefenden Namen gibt
            if( !$arrSubmitted[$checkField] || strlen($arrSubmitted[$checkField]) < 1) return false;

            //setzt die Cookie-Dauer
            $duration = ((int) $arrSubmitted['srlayer_cookie_duration']) ?: 3600;

            //setzt den Cookie
            \System::setCookie( $arrSubmitted['srlayer_set_cookie'], 1, time() + $duration);

        }

    }
}