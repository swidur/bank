<?php

class HtmlHelper
{
    public static function replaceInHTML($replaceIn, $substArray, $isFile = 1)
    {
        if ($isFile) {
            $html = file_get_contents($replaceIn);
        } else $html = $replaceIn;

        foreach ($substArray as $search => $replace) {
            $html = str_ireplace('#' . $search . '#', $replace, $html);
        }
        return $html;
    }

}