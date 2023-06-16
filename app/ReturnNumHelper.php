<?php

function getNumToString($string)
{
    preg_match_all('!\d+\.*\d*!', $string, $arrNum);
    return $arrNum;
};

function getWeight($string)
{
    $stringNum = str_replace(" lb.", "", $string);
    return floatval($stringNum);
}

function getCost($string)
{
    if (strpos($string, "gp"))
        $stringNum = str_replace(" gp.", "", $string);
    elseif(strpos($string, "sp")){
        $stringNum = str_replace(" sp.", "", "0." . $string);
    }
    elseif(strpos($string, "cp")){
        $stringNum = str_replace(" cp.", "", "0.0" .$string);
    }
    return floatval($stringNum);
}
