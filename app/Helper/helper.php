<?php

use Hekmatinasser\Verta\Verta;
use Carbon\Carbon;

use function GuzzleHttp\json_decode;

define('PREPAGE', 50);


function clearFormat($data, $status = true){
    if($data == null){
        if($status){
            return Carbon::now();
        }else{
            return null;
        }
    }
    $v = new Verta();
    $date = explode(' ', $data)[0];
    $date = explode('-', $date);
    $org = $v->getGregorian($date[0], $date[1], $date[2]); 
    return implode('-', $org) . " {$v->hour}:{$v->minute}:{$v->second}";
}


function toJalali($date, $delimeter = '-', $concater = '-'){
    $de = explode(' ', Carbon::parse($date)->format('Y-m-d H:i:s'));
    $getData = explode($delimeter, $de[0]);
    $Ndate = Verta::getJalali($getData[0], $getData[1], $getData[2]);
    $h = isset($de[1]) ? $de[1] : null;
    return implode($concater, $Ndate)  .' ' . $h;
}

function toGregorian($date, $delimeter = '-', $concater = '-'){
    $de = explode(' ', Carbon::parse($date)->format('Y-m-d H:i:s'));
    $getData = explode($delimeter, $de[0]);
    $Ndate = Verta::getGregorian($getData[0], $getData[1], $getData[2]);
    $h = isset($de[1]) ? $de[1] : null;
    return implode($concater, $Ndate)  .' ' . $h;

}

$GLOBALS['options'] = [];
function getOptions(){
    $GLOBALS['options'] = \App\Models\Option::all();
}

function getOptionSegment($name){
   $filtered = $GLOBALS['options']->filter(function($value, $key) use($name){
        return $value->option_key == $name;
    });
    
    return \App\Http\Resources\OptionResource::collection($filtered);
}
