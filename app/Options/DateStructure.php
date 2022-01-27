<?php
namespace App\Options;
use Carbon\Carbon;
use Hekmatinasser\Verta\Facades\Verta;
trait DateStructure{
    
    public function getCreatedAtAttribute($value){
        $date = Carbon::parse($value);
        $date = $date->format('Y-m-d H:i');
        $getData = explode('-', explode(' ', $date)[0]);
        $Ndate = Verta::getJalali($getData[0], $getData[1], $getData[2]);
        return implode('-', $Ndate)  .' ' . explode(' ', $date)[1];
    }

    public function getUpdatedAtAttribute($value){
        $date = Carbon::parse($value);
        $date = $date->format('Y-m-d H:i');
        $getData = explode('-', explode(' ', $date)[0]);
        $Ndate = Verta::getJalali($getData[0], $getData[1], $getData[2]);
        return implode('-', $Ndate)  .' ' . explode(' ', $date)[1];
    }

}