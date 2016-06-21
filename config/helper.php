<?php

/**
 * Copyright (c) 2010-2016 Romain Cottard
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Helper function to encode string
 *
 * @param string $string
 * @param string $charset
 * @param bool   $doubleEncode
 * @return mixed
 */
function htmle($string, $charset = 'UTF-8', $doubleEncode = false)
{
    return htmlentities($string, ENT_COMPAT | ENT_HTML5, $charset, $doubleEncode);
}

/**
 * Translate text into current language
 *
 * @param  string $text
 * @param  string $locale 'fr_FR', 'pt_BR'...
 * @return string
 */
function t($text, $locale = null)
{
    return $text;
}